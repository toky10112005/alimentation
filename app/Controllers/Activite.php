<?php

namespace App\Controllers;
use App\Models\ActiviteModel;
use App\Models\RegimeModel;
use App\Models\UserModel;
use App\Models\UserHealthProfileModel;
use App\Models\UserObjectifModel;
use App\Models\AchatRegimeModel;
use App\Models\GoldModel;
use App\Controllers\BaseController;
use Config\Services;


class Activite extends BaseController
{
    protected $activiteModel;
    protected $session;//Ho an ny username
    protected $regimeModel;
    protected $userModel;
    protected $healthProfileModel;
    protected $userObjectifModel;
    protected $achatRegimeModel;
    protected $goldModel;

     public function __construct(){
        $this->activiteModel = new ActiviteModel();
        $this->regimeModel = new RegimeModel();
        $this->userModel = new UserModel();
        $this->healthProfileModel = new UserHealthProfileModel();
        $this->userObjectifModel = new UserObjectifModel();
        $this->achatRegimeModel = new AchatRegimeModel();
        $this->goldModel = new GoldModel();
        $this->session = Services::session();
    }

     public function details($id){
        $regime = $this->regimeModel->getById($id);
        if (!$regime) {
            return view('details', ['error' => 'id non trouvé']);
        }

        $userId = (int) $this->session->get('user_id');
        $profile = $userId ? $this->healthProfileModel->getLatestForUser($userId) : null;
        $objectif = $userId ? $this->userObjectifModel->getByUserId($userId) : null;
        $user = $userId ? $this->userModel->find($userId) : null;

        // Check if user has already bought this regime
        $regimeBought = false;
        if ($userId) {
            $regimeBought = $this->achatRegimeModel->isRegimeBoughtByUser($userId, (int) $id);
        }

        $dureeJours = 0;
        if ($profile && $objectif) {
            $poidsActuel = (float) $profile['poids_actuel'];
            $poidsCible = (float) $objectif['poids_cible'];
            $impactSemaine = (float) $regime['poids_impact_semaine'];

            if ($impactSemaine != 0.0) {
                $dureeJours = (int) round((abs($poidsCible - $poidsActuel) / abs($impactSemaine)) * 7);
            }
        }

        $regime['name'] = $regime['nom'];
        $regime['poids_minimal_impact'] = $regime['poids_impact_semaine'];
        $regime['duree_jours'] = $dureeJours;
        $regime['p_viande'] = $regime['pourcentage_viande'];
        $regime['p_volaille'] = $regime['pourcentage_volaille'];
        $regime['p_poisson'] = $regime['pourcentage_poisson'];
        $regime['prix_total'] = $dureeJours > 0
            ? ((float) $regime['prix_journalier'] * $dureeJours)
            : (float) $regime['prix_journalier'];

        $isGold = $user && (int) ($user['is_gold'] ?? 0) === 1;
        
        $remisePercentage = 15.0;
        if ($isGold) {
            $goldOffres = $this->goldModel->getAll();
            if (!empty($goldOffres)) {
                $remisePercentage = (float) $goldOffres[0]['remise'];
            }
        }
        
        $coefficient = (100 - $remisePercentage) / 100;
        $prixRemise = $isGold ? ($regime['prix_total'] * $coefficient) : $regime['prix_total'];

        $activite = $this->activiteModel->getByRegimeId((int) $id);
        $activite = array_map(function ($row) {
            $row['duree'] = $row['duree_minutes_jour'] . ' min/jour';
            return $row;
        }, $activite);

        return view('details', [
            'activite' => $activite,
            'regime' => $regime,
            'regimeBought' => $regimeBought,
            'userId' => $userId,
            'isGold' => $isGold,
            'prixRemise' => $prixRemise,
            'remisePercentage' => $remisePercentage,
        ]);
    }


}