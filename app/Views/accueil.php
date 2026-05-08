<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Accueil • Gestion d'alimentation</title>

    <link href="/assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="/assets/css/theme.css" rel="stylesheet">
</head>
<body class="bg-light">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-egg-fried me-2" viewBox="0 0 16 16">
                    <path d="M8 0a3 3 0 0 0-3 3c0 .342.023.674.065.993v.5H2a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-1a1 1 0 0 0-1-1h-3v-.5c.042-.32.065-.65.065-.993a3 3 0 0 0-3-3zm.5 3a.5.5 0 0 1 0 1 .5.5 0 0 1 0-1z"/>
                </svg>
                Gestion d'alimentation
            </a>
            <div class="ms-auto text-white-50 small">
                Connecte : <span class="text-white fw-semibold"><?= esc(session('username')) ?></span>
            </div>
        </div>
    </nav>

    <main class="container py-4">
        <div class="row g-4">
            <div class="col-12">
                <div class="p-4 p-md-5 rounded-3 bg-white border mb-4">
                    <h1 class="h3 mb-2">Bienvenue, <?= esc(session('username')) ?>.</h1>
                    <p class="text-muted mb-0">
                        Choisis ton objectif pour personnaliser ton suivi alimentaire.
                    </p>
                </div>
            </div>

            <div class="col-12 col-lg-4">
                <div class="card shadow-sm h-100">
                    <div class="card-header">
                        <h2 class="h5 mb-0">Ton IMC</h2>
                    </div>
                    <div class="card-body p-4 d-flex flex-column">
                        <?php if (isset($IMC)): 
                            $imc = $IMC;
                            $categorie = '';
                            $badgeClass = '';
                            if ($imc < 18.5): 
                                $categorie = 'Insuffisance ponderee';
                                $badgeClass = 'bg-info';
                            elseif ($imc < 25): 
                                $categorie = 'Poids ideal';
                                $badgeClass = 'bg-success';
                            elseif ($imc < 30): 
                                $categorie = 'Surpoids';
                                $badgeClass = 'bg-warning text-dark';
                            else: 
                                $categorie = 'Obesite';
                                $badgeClass = 'bg-danger';
                            endif;
                        ?>
                            <div class="text-center mb-3">
                                <span class="display-4 fw-bold text-primary"><?= number_format($imc, 1) ?></span>
                            </div>
                            <div class="text-center mb-3">
                                <span class="badge <?= $badgeClass ?> px-3 py-2"><?= esc($categorie) ?></span>
                            </div>
                            <div class="mt-auto">
                                <div class="d-flex justify-content-between small text-muted mb-1">
                                    <span>18.5</span>
                                    <span>25</span>
                                    <span>30</span>
                                </div>
                                <div class="progress" style="height: 8px;">
                                    <?php 
                                    $progress = min(100, max(0, ($imc - 15) * 5));
                                    ?>
                                    <div class="progress-bar bg-success" role="progressbar" style="width: <?= $progress ?>%"></div>
                                </div>
                            </div>
                        <?php else: ?>
                            <p class="text-muted mb-0">IMC non calcule.</p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            <div class="col-12 col-lg-8">
                <div class="card shadow-sm h-100">
                    <div class="card-body p-4">
                        <h2 class="h5 mb-1">Ton objectif</h2>
                        <p class="text-muted mb-4">Selectionne un objectif parmi les 3 ci-dessous.</p>

                        <form>
                            <div class="row g-3">
                                <div class="col-12 col-md-4">
                                    <label class="d-block border rounded-3 p-3 h-100 bg-white objectif-card" for="objectif-prise">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="objectif" id="objectif-prise" value="augmenter_poids">
                                            <span class="form-check-label fw-semibold">Augmenter son poids</span>
                                        </div>
                                        <div class="text-muted small mt-2">
                                            Ciblage calorique legerement au-dessus de tes besoins.
                                        </div>
                                    </label>
                                </div>

                                <div class="col-12 col-md-4">
                                    <label class="d-block border rounded-3 p-3 h-100 bg-white objectif-card" for="objectif-reduire">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="objectif" id="objectif-reduire" value="reduire_poids">
                                            <span class="form-check-label fw-semibold">Reduire son poids</span>
                                        </div>
                                        <div class="text-muted small mt-2">
                                            Deficit calorique modere et repas equilibres.
                                        </div>
                                    </label>
                                </div>

                                <div class="col-12 col-md-4">
                                    <label class="d-block border rounded-3 p-3 h-100 bg-white objectif-card" for="objectif-imc">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="objectif" id="objectif-imc" value="imc_ideal">
                                            <span class="form-check-label fw-semibold">Atteindre son IMC ideal</span>
                                        </div>
                                        <div class="text-muted small mt-2">
                                            Ajustement progressif pour viser une zone IMC saine.
                                        </div>
                                    </label>
                                </div>
                            </div>

                            <div class="d-flex flex-wrap gap-2 mt-4">
                                <button type="button" class="btn btn-primary">Valider l'objectif</button>
                                <a class="btn btn-outline-secondary" href="/">Retour</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script src="/assets/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>