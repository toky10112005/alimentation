<?php

namespace App\Controllers;
use App\Models\RegimeModel;
use App\Models\UserModel;
use App\Models\GenreModel;
use App\Models\ActiviteModel;
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
    protected $activiteModel;

     public function __construct(){
        $this->regimeModel = new RegimeModel();
        $this->userModel = new UserModel();
        $this->genreModel = new GenreModel();
        $this->healthProfileModel = new UserHealthProfileModel();
        $this->userObjectifModel = new UserObjectifModel();
        $this->objectifTypeModel = new ObjectifTypeModel();
        $this->achatRegimeModel = new AchatRegimeModel();
        $this->goldModel = new GoldModel();
        $this->activiteModel = new ActiviteModel();
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

    private function buildSuggestionContext(int $userId): array
    {
        $objectifUser = $this->userObjectifModel->getByUserId($userId);
        $objectifId = $objectifUser ? (int) $objectifUser['id_objectif_type'] : (int) $this->session->get('objectif');

        $objectifLabel = '';
        if ($objectifId > 0) {
            $objectif = $this->objectifTypeModel->find($objectifId);
            if ($objectif && isset($objectif['libelle'])) {
                $objectifLabel = (string) $objectif['libelle'];
            }
        }

        $profile = $this->healthProfileModel->getLatestForUser($userId);
        $poidsActuel = $profile && isset($profile['poids_actuel']) ? (float) $profile['poids_actuel'] : null;
        $poidsCible = $objectifUser && isset($objectifUser['poids_cible']) ? (float) $objectifUser['poids_cible'] : null;

        $maintenance = 0.0;
        if ($profile && isset($profile['poids_actuel'], $profile['taille'])) {
            $user = $this->userModel->find($userId);
            $genreLabel = 'Femme';
            if ($user && isset($user['id_genre'])) {
                $genre = $this->genreModel->find((int) $user['id_genre']);
                $genreLabel = $genre ? $genre['libelle'] : $genreLabel;
            }

            $age = 25;
            $mb = $this->userModel->calculeMB(
                (float) $profile['poids_actuel'],
                (float) $profile['taille'],
                $age,
                $genreLabel
            );
            $maintenance = $this->userModel->calculeMaintenance($mb);
        }

        return [
            'maintenance' => $maintenance,
            'objectifLabel' => $objectifLabel,
            'objectifId' => $objectifId,
            'poidsActuel' => $poidsActuel,
            'poidsCible' => $poidsCible,
        ];
    }

    private function buildSuggestedRegimesData(int $userId): array
    {
        $context = $this->buildSuggestionContext($userId);
        $user = $this->userModel->find($userId);
        $profile = $this->healthProfileModel->getLatestForUser($userId);
        $objectiveData = $this->userObjectifModel->getByUserId($userId);
        $boughtRegimeIds = $this->achatRegimeModel->getRegimeIdsByUser($userId);

        $objective = $context['objectifId'] > 0 ? $this->objectifTypeModel->find($context['objectifId']) : null;

        $genreLabel = 'Femme';
        if ($user && isset($user['id_genre'])) {
            $genre = $this->genreModel->find((int) $user['id_genre']);
            $genreLabel = $genre ? $genre['libelle'] : $genreLabel;
        }

        $maintenance = (float) $context['maintenance'];
        $regimes = $this->regimeModel->getSuggestedRegimes(
            $maintenance,
            $context['objectifLabel'],
            $context['objectifId']
        );

        $regimes = $this->formatRegimesForView(
            $regimes,
            $context['poidsActuel'],
            $context['poidsCible'],
            $context['objectifId'],
            $boughtRegimeIds
        );

        $regimes = $this->attachActivities($regimes);

        $imc = null;
        if ($profile && isset($profile['taille'], $profile['poids_actuel'])) {
            $imc = $this->userModel->calculeIMC((int) $profile['taille'], (int) $profile['poids_actuel']);
        }

        // Filtrer pour exclure les régimes déjà achetés du PDF
        $regimesForPdf = array_filter($regimes, function ($regime) {
            return empty($regime['is_bought']);
        });

        return [
            'user' => $user,
            'genreLabel' => $genreLabel,
            'profile' => $profile,
            'objectif' => $objective,
            'objectifData' => $objectiveData,
            'maintenance' => $maintenance,
            'imc' => $imc,
            'regimes' => $regimesForPdf,
            'generatedAt' => date('d/m/Y H:i'),
        ];
    }

    private function renderRegimePdf(array $data): string
    {
        $html = view('regime_pdf', $data);
        $tempDir = WRITEPATH . 'tmp';

        if (!is_dir($tempDir)) {
            mkdir($tempDir, 0775, true);
        }

        $htmlBase = tempnam($tempDir, 'regime_pdf_');
        $pdfBase = tempnam($tempDir, 'regime_pdf_');

        if ($htmlBase === false || $pdfBase === false) {
            throw new \RuntimeException('Impossible de preparer les fichiers temporaires.');
        }

        $htmlFile = $htmlBase . '.html';
        $pdfFile = $pdfBase . '.pdf';

        file_put_contents($htmlFile, $html);

        $command = sprintf(
            'wkhtmltopdf --enable-local-file-access --page-size A4 %s %s 2>&1',
            escapeshellarg($htmlFile),
            escapeshellarg($pdfFile)
        );

        $output = [];
        $returnCode = 0;
        exec($command, $output, $returnCode);

        if (is_file($htmlFile)) {
            unlink($htmlFile);
        }

        if ($returnCode !== 0 || !is_file($pdfFile) || filesize($pdfFile) === 0) {
            if (is_file($pdfFile)) {
                unlink($pdfFile);
            }

            throw new \RuntimeException('Impossible de generer le PDF des regimes.');
        }

        $pdfContent = file_get_contents($pdfFile);
        unlink($pdfFile);

        return $pdfContent !== false ? $pdfContent : '';
    }

    private function attachActivities(array $regimes): array
    {
        foreach ($regimes as $index => $regime) {
            $regimes[$index]['activites'] = $this->activiteModel->getByRegimeId((int) $regime['id']);
        }

        return $regimes;
    }

    private function groupPlatsByJour(array $plats): array
    {
        $grouped = [];

        foreach ($plats as $row) {
            $jour = (int) ($row['jour_numero'] ?? 0);
            $moment = (string) ($row['moment'] ?? '');

            if (!isset($grouped[$jour])) {
                $grouped[$jour] = [];
            }
            if (!isset($grouped[$jour][$moment])) {
                $grouped[$jour][$moment] = [];
            }

            $grouped[$jour][$moment][] = $row;
        }

        ksort($grouped);

        return $grouped;
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

    $objectif = $this->objectifTypeModel->find($objectifId);

    if (!$objectif) {
        return view('regime', ['regimes' => []]);
    }

    $payload = $this->buildSuggestedRegimesData($userId);

    return view('regime', ['regimes' => $payload['regimes']]);
   }

   public function exportPdf()
   {
        $userId = (int) $this->session->get('user_id');

        if (!$userId) {
            return redirect()->to('/');
        }

        $payload = $this->buildSuggestedRegimesData($userId);

        if (empty($payload['regimes'])) {
            return redirect()->to('/objectif');
        }

        try {
            $pdfContent = $this->renderRegimePdf($payload);
        } catch (\Throwable $exception) {
            return redirect()->back()->with('error', $exception->getMessage());
        }

        $filename = 'regimes-proposes-' . date('Ymd-His') . '.pdf';

        return $this->response
            ->setHeader('Content-Type', 'application/pdf')
            ->setHeader('Content-Disposition', 'attachment; filename="' . $filename . '"')
            ->setBody($pdfContent);
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

    $context = $this->buildSuggestionContext($userId);

     if (in_array($regimeId, $boughtRegimeIds, true)) {
        $regimes = $this->regimeModel->getSuggestedRegimes(
            $context['maintenance'],
            $context['objectifLabel'],
            $context['objectifId']
        );
        $regimes = $this->formatRegimesForView(
            $regimes,
            $context['poidsActuel'],
            $context['poidsCible'],
            $context['objectifId'],
            $boughtRegimeIds
        );
        $regimes = $this->attachActivities($regimes);

        return view('regime', [
            'error' => 'Vous avez déjà acheté ce régime.',
            'regimes' => $regimes,
        ]);
    }

    if ((float) $user['solde_portefeuille'] < $prixTotal) {
        $regimes = $this->regimeModel->getSuggestedRegimes(
            $context['maintenance'],
            $context['objectifLabel'],
            $context['objectifId']
        );
        $regimes = $this->formatRegimesForView(
            $regimes,
            $context['poidsActuel'],
            $context['poidsCible'],
            $context['objectifId'],
            $boughtRegimeIds
        );
        $regimes = $this->attachActivities($regimes);

        return view('regime', [
            'error' => 'Solde insuffisant pour acheter ce régime.',
            'regimes' => $regimes,
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

   public function mesRegimes()
   {
        $userId = (int) $this->session->get('user_id');

        if (!$userId) {
            return redirect()->to('/');
        }

        $regimes = $this->regimeModel->getBoughtRegimesByUser($userId);

        foreach ($regimes as $index => $regime) {
            $plats = $this->regimeModel->getRegimePlats((int) $regime['id']);
            $regimes[$index]['plats_par_jour'] = $this->groupPlatsByJour($plats);
        }

        return view('mes_regimes', ['regimes' => $regimes]);
   }


}