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

    private function getDemoRegimes(): array
    {
        return [
            [
                'id' => 1,
                'name' => 'Perte progressive',
                'poids_minimal_impact' => 0.7,
                'duree_jours' => 56,
                'prix_journalier' => 2150,
                'prix_total' => 120400,
                'variation' => '-5 kg',
                'pourcentage_viande' => 30,
                'pourcentage_poisson' => 25,
                'pourcentage_volaille' => 20,
            ],
            [
                'id' => 2,
                'name' => 'Prise de masse douce',
                'poids_minimal_impact' => 0.5,
                'duree_jours' => 70,
                'prix_journalier' => 2100,
                'prix_total' => 147000,
                'variation' => '+4 kg',
                'pourcentage_viande' => 35,
                'pourcentage_poisson' => 15,
                'pourcentage_volaille' => 25,
            ],
            [
                'id' => 3,
                'name' => 'IMC ideal',
                'poids_minimal_impact' => 0.0,
                'duree_jours' => 42,
                'prix_journalier' => 2380,
                'prix_total' => 99960,
                'variation' => 'Stable',
                'pourcentage_viande' => 25,
                'pourcentage_poisson' => 25,
                'pourcentage_volaille' => 25,
            ],
        ];
    }
    
   public function objectif(){
    $objectifId = (int) $this->request->getGet('objectif');
    $userId = (int) $this->session->get('user_id');

    if (!$userId) {
        return view('regime', ['regimes' => $this->getDemoRegimes()]);
    }

    $this->session->set('objectif', $objectifId);

    $profile = $this->healthProfileModel->getLatestForUser($userId);
    $user = $this->userModel->find($userId);
    $objectif = $this->objectifTypeModel->find($objectifId);

    if (!$profile || !$user || !$objectif) {
        return view('regime', ['regimes' => $this->getDemoRegimes()]);
    }

    $genre = $this->genreModel->find((int) $user['id_genre']);
    $genreLabel = $genre ? $genre['libelle'] : 'Femme';

    $age = 25;
    $mb = $this->userModel->calculeMB(
        (float) $profile['poids_actuel'],
        (float) $profile['taille'],
        $age,
        $genreLabel
    );
    $maintenance = $this->userModel->calculeMaintenance($mb);

    $regimes = $this->regimeModel->getSuggestedRegimes($maintenance, $objectif['libelle']);
    $objectifUser = $this->userObjectifModel->getByUserId($userId);

    if ($profile && $objectifUser) {
        $poidsActuel = (float) $profile['poids_actuel'];
        $poidsCible = (float) $objectifUser['poids_cible'];

        $regimes = array_map(function ($regime) use ($poidsActuel, $poidsCible) {
            $impactSemaine = (float) $regime['poids_impact_semaine'];
            $dureeJours = 0;
            if ($impactSemaine != 0.0) {
                $dureeJours = (int) round((abs($poidsCible - $poidsActuel) / abs($impactSemaine)) * 7);
            }

            $regime['name'] = $regime['nom'];
            $regime['poids_minimal_impact'] = $regime['poids_impact_semaine'];
            $regime['duree_jours'] = $dureeJours;
            $regime['prix_total'] = $dureeJours > 0
                ? ((float) $regime['prix_journalier'] * $dureeJours)
                : (float) $regime['prix_journalier'];

            return $regime;
        }, $regimes);
    }

    return view('regime', ['regimes' => $regimes]);
   }


}