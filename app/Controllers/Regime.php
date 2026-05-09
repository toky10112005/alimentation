<?php

namespace App\Controllers;
use App\Models\RegimeModel;
use App\Models\UserModel;
use App\Models\GenreModel;
use App\Models\UserHealthProfileModel;
use App\Models\UserObjectifModel;
use App\Models\ObjectifTypeModel;
use App\Controllers\BaseController;
use Config\Services;


class Regime extends BaseController
{
    protected $regimeModel;
    protected $session;//Ho an ny username
    protected $userModel;
    protected $genreModel;
    protected $healthProfileModel;
    protected $userObjectifModel;
    protected $objectifTypeModel;

     public function __construct(){
        $this->regimeModel = new RegimeModel();
        $this->userModel = new UserModel();
        $this->genreModel = new GenreModel();
        $this->healthProfileModel = new UserHealthProfileModel();
        $this->userObjectifModel = new UserObjectifModel();
        $this->objectifTypeModel = new ObjectifTypeModel();
        $this->session = Services::session();
    }

     public function index(){
        return view('regime');
    }
    
   public function objectif(){
    $objectifId = (int) $this->request->getGet('objectif');
    $userId = (int) $this->session->get('user_id');

    if (!$userId) {
        return redirect()->to('/');
    }

    $this->session->set('objectif', $objectifId);

    $profile = $this->healthProfileModel->getLatestForUser($userId);
    $user = $this->userModel->find($userId);
    $objectif = $this->objectifTypeModel->find($objectifId);

    // If the objectif itself doesn't exist, nothing to show
    if (!$objectif) {
        return view('regime', ['regimes' => []]);
    }

    // Determine genre label if user exists
    $genreLabel = 'Femme';
    if ($user && isset($user['id_genre'])) {
        $genre = $this->genreModel->find((int) $user['id_genre']);
        $genreLabel = $genre ? $genre['libelle'] : $genreLabel;
    }

    // Compute maintenance only if a health profile exists
    $maintenance = 0.0;
    if ($profile && isset($profile['poids_actuel'], $profile['taille'])) {
        $age = 25;
        $mb = $this->userModel->calculeMB(
            (float) $profile['poids_actuel'],
            (float) $profile['taille'],
            $age,
            $genreLabel
        );
        $maintenance = $this->userModel->calculeMaintenance($mb);
    }

    $regimes = $this->regimeModel->getSuggestedRegimes($maintenance, $objectif['libelle'], $objectifId);
    $objectifUser = $this->userObjectifModel->getByUserId($userId);

    $poidsActuel = isset($profile['poids_actuel']) ? (float) $profile['poids_actuel'] : null;
    $poidsCible = ($objectifUser && isset($objectifUser['poids_cible'])) ? (float) $objectifUser['poids_cible'] : null;

    // Always enrich regimes list; compute duration only when poids cible is available
    $regimes = array_map(function ($regime) use ($poidsActuel, $poidsCible, $objectifId) {
        $impactSemaine = isset($regime['poids_impact_semaine']) ? (float) $regime['poids_impact_semaine'] : 0.0;
        $dureeJours = 0;

        if ($poidsActuel !== null && $poidsCible !== null && $impactSemaine != 0.0) {
            $dureeJours = (int) round((abs($poidsCible - $poidsActuel) / abs($impactSemaine)) * 7);
        }

        $regime['name'] = $regime['nom'];
        $regime['objectif_type_id'] = isset($regime['objectif_type_id']) ? (int) $regime['objectif_type_id'] : $objectifId;
        $regime['poids_minimal_impact'] = $impactSemaine;
        $regime['duree_jours'] = $dureeJours;
        $regime['prix_total'] = $dureeJours > 0
            ? ((float) ($regime['prix_journalier'] ?? 0) * $dureeJours)
            : (float) ($regime['prix_journalier'] ?? 0);

        return $regime;
    }, $regimes ?: []);

    return view('regime', ['regimes' => $regimes]);
   }


}