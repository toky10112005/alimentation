<?php

namespace App\Controllers;
use App\Models\RegimeModel;
use App\Models\UserModel;
use App\Models\GenreModel;
use App\Models\AchatRegimeModel;
use App\Models\UserHealthProfileModel;
use App\Models\UserObjectifModel;
use App\Models\ObjectifTypeModel;
use App\Models\GoldModel;
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
    protected $achatRegimeModel;
    protected $goldModel;

     public function __construct(){
        $this->regimeModel = new RegimeModel();
        $this->userModel = new UserModel();
        $this->genreModel = new GenreModel();
        $this->healthProfileModel = new UserHealthProfileModel();
        $this->userObjectifModel = new UserObjectifModel();
        $this->objectifTypeModel = new ObjectifTypeModel();
        $this->achatRegimeModel = new AchatRegimeModel();
        $this->goldModel = new GoldModel();
        $this->session = Services::session();
    }

    private function calculatePurchaseTotals(array $regime, int $userId): array
    {
        $dureeJours = 0;

        $profile = $userId ? $this->healthProfileModel->getLatestForUser($userId) : null;
        $objectif = $userId ? $this->userObjectifModel->getByUserId($userId) : null;

        if ($profile && $objectif && isset($profile['poids_actuel'], $objectif['poids_cible'], $regime['poids_impact_semaine'])) {
            $poidsActuel = (float) $profile['poids_actuel'];
            $poidsCible = (float) $objectif['poids_cible'];
            $impactSemaine = (float) $regime['poids_impact_semaine'];

            if ($impactSemaine != 0.0) {
                $dureeJours = (int) round((abs($poidsCible - $poidsActuel) / abs($impactSemaine)) * 7);
            }
        }

        $prixJournalier = (float) ($regime['prix_journalier'] ?? 0);
        $prixTotal = $dureeJours > 0 ? ($prixJournalier * $dureeJours) : $prixJournalier;

        return [$dureeJours, $prixTotal];
    }

    private function applyGoldDiscount(float $prixTotal, bool $isGold, float $remisePercentage = 15.0): float
    {
        if (!$isGold) {
            return $prixTotal;
        }
        $coefficient = (100 - $remisePercentage) / 100;
        return $prixTotal * $coefficient;
    }

    private function formatRegimesForView(array $regimes, ?float $poidsActuel = null, ?float $poidsCible = null, int $objectifId = 0, array $boughtRegimeIds = []): array
    {
        return array_map(function ($regime) use ($poidsActuel, $poidsCible, $objectifId, $boughtRegimeIds) {
            $impactSemaine = isset($regime['poids_impact_semaine']) ? (float) $regime['poids_impact_semaine'] : 0.0;
            $dureeJours = 0;

            if ($poidsActuel !== null && $poidsCible !== null && $impactSemaine != 0.0) {
                $dureeJours = (int) round((abs($poidsCible - $poidsActuel) / abs($impactSemaine)) * 7);
            }

            $prixJournalier = (float) ($regime['prix_journalier'] ?? 0);

            $regime['name'] = $regime['nom'];
            $regime['objectif_type_id'] = isset($regime['objectif_type_id']) ? (int) $regime['objectif_type_id'] : $objectifId;
            $regime['poids_minimal_impact'] = $impactSemaine;
            $regime['duree_jours'] = $dureeJours;
            $regime['prix_total'] = $dureeJours > 0 ? ($prixJournalier * $dureeJours) : $prixJournalier;
            $regime['is_bought'] = in_array((int) $regime['id'], $boughtRegimeIds, true);

            return $regime;
        }, $regimes ?: []);
    }

     public function index(){
        return view('regime');
    }

    public function retourRegimes(){
        $userId = (int) $this->session->get('user_id');
        $objectifId = (int) $this->session->get('objectif');

        if (!$userId || !$objectifId) {
            return redirect()->to('/');
        }

        return redirect()->to(site_url('/objectif?objectif=' . $objectifId));
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
    $boughtRegimeIds = $this->achatRegimeModel->getRegimeIdsByUser($userId);

    $poidsActuel = isset($profile['poids_actuel']) ? (float) $profile['poids_actuel'] : null;
    $poidsCible = ($objectifUser && isset($objectifUser['poids_cible'])) ? (float) $objectifUser['poids_cible'] : null;

    $regimes = $this->formatRegimesForView($regimes, $poidsActuel, $poidsCible, $objectifId, $boughtRegimeIds);

    return view('regime', ['regimes' => $regimes]);
   }

   public function achat($regimeId){
    $userId = (int) $this->session->get('user_id');

    if (!$userId) {
        return redirect()->to('/');
    }

    $regime = $this->regimeModel->find($regimeId);

    if (!$regime) {
        dd('Régime non trouvé');
        return redirect()->to('/regime');
    }

    $user = $this->userModel->find($userId);
    if (!$user) {
        return redirect()->to('/');
    }

    $boughtRegimeIds = $this->achatRegimeModel->getRegimeIdsByUser($userId);

    [$dureeJours, $prixTotal] = $this->calculatePurchaseTotals($regime, $userId);

    $remisePercentage = 15.0;
    if ((int) ($user['is_gold'] ?? 0) === 1) {
        $goldOffres = $this->goldModel->getAll();
        if (!empty($goldOffres)) {
            $remisePercentage = (float) $goldOffres[0]['remise'];
        }
    }

    $prixTotal = $this->applyGoldDiscount($prixTotal, (int) ($user['is_gold'] ?? 0) === 1, $remisePercentage);

     if (in_array($regimeId, $boughtRegimeIds, true)) {
        return view('regime', [
            'error' => 'Vous avez déjà acheté ce régime.',
            'regimes' => $this->formatRegimesForView(
                $this->regimeModel->getSuggestedRegimes(0, '', 0),
                null,
                null,
                0,
                $boughtRegimeIds
            ),
        ]);
    }

    if ((float) $user['solde_portefeuille'] < $prixTotal) {
        return view('regime', [
            'error' => 'Solde insuffisant pour acheter ce régime.',
            'regimes' => $this->formatRegimesForView(
                $this->regimeModel->getSuggestedRegimes(0, '', 0),
                null,
                null,
                0,
                $boughtRegimeIds
            ),
        ]);
    }

    $achatData = [
        'user_id' => $userId,
        'regime_id' => $regimeId,
        'date_achat' => date('Y-m-d H:i:s'),
        'duree_jours' => $dureeJours,
        'prix_total' => $prixTotal,
    ];

    $this->achatRegimeModel->createAchat($achatData);

    $nouveauSolde = (float) $user['solde_portefeuille'] - $prixTotal;
    $this->userModel->update($userId, ['solde_portefeuille' => $nouveauSolde]);

    // return redirect()->to('/portefeuille');
    return view('portefeuille', ['success' => 'Régime acheté avec succès ! Votre solde a été mis à jour.', 'solde' => $nouveauSolde]);  

   }


}