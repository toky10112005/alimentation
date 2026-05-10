<?php

namespace App\Controllers;
use App\Models\ActiviteModel;
use App\Models\RegimeModel;
use App\Models\UserHealthProfileModel;
use App\Models\UserObjectifModel;
use App\Controllers\BaseController;
use Config\Services;


class Activite extends BaseController
{
    protected $activiteModel;
    protected $session;//Ho an ny username
    protected $regimeModel;
    protected $healthProfileModel;
    protected $userObjectifModel;

     public function __construct(){
        $this->activiteModel = new ActiviteModel();
        $this->regimeModel = new RegimeModel();
          $this->healthProfileModel = new UserHealthProfileModel();
          $this->userObjectifModel = new UserObjectifModel();
        $this->session = Services::session();
    }

    private function getDemoDetail(): array
    {
        return [
            'regime' => [
                'name' => 'Perte progressive',
                'poids_minimal_impact' => 0.7,
                'duree_jours' => 56,
                'prix_total' => 120400,
                'p_viande' => 30,
                'p_volaille' => 20,
                'p_poisson' => 25,
            ],
            'activite' => [
                ['name' => 'Course', 'duree' => '30 min/jour'],
                ['name' => 'Natation', 'duree' => '25 min/jour'],
                ['name' => 'Velo', 'duree' => '35 min/jour'],
            ],
        ];
    }

     public function details($id){
        $regime = $this->regimeModel->getById($id);
        if (!$regime) {
            $demo = $this->getDemoDetail();
            return view('details', $demo);
        }

        $userId = (int) $this->session->get('user_id');
        $profile = $userId ? $this->healthProfileModel->getLatestForUser($userId) : null;
        $objectif = $userId ? $this->userObjectifModel->getByUserId($userId) : null;

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

        $activite = $this->activiteModel->getByRegimeId((int) $id);
        $activite = array_map(function ($row) {
            $row['duree'] = $row['duree_minutes_jour'] . ' min/jour';
            return $row;
        }, $activite);

        if (empty($activite)) {
            $demo = $this->getDemoDetail();
            return view('details', $demo + ['regime' => $regime]);
        }

        return view('details', ['activite' => $activite, 'regime' => $regime]);
    }


}