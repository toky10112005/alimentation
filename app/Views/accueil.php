<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Accueil • Gestion d'alimentation</title>

    <link href="/assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="/assets/css/theme.css" rel="stylesheet">
</head>
<body class="page-shell">
    <nav class="navbar navbar-expand-lg bg-white border-bottom">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center gap-2" href="/">
                <span class="brand-mark">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-egg-fried" viewBox="0 0 16 16">
                        <path d="M8 0a3 3 0 0 0-3 3c0 .342.023.674.065.993v.5H2a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-1a1 1 0 0 0-1-1h-3v-.5c.042-.32.065-.65.065-.993a3 3 0 0 0-3-3zm.5 3a.5.5 0 0 1 0 1 .5.5 0 0 1 0-1z"/>
                    </svg>
                </span>
                <span>Alimentation <span>Sant&eacute;</span></span>
            </a>
            <div class="ms-auto d-flex align-items-center gap-3">
                <span class="small text-muted">Connect&eacute; : <strong><?= esc(session('username')) ?></strong></span>
                <a class="btn btn-sm btn-outline-secondary" href="/">Accueil</a>
            </div>
        </div>
    </nav>

    <main class="container py-4">
        <div class="row g-4">
            <div class="col-12">
                <div class="p-4 p-md-5 rounded-3 hero-card">
                    <div class="row align-items-center g-4">
                        <div class="col-12 col-lg-8">
                            <span class="badge badge-soft mb-3">Tableau de bord</span>
                            <h1 class="section-title h3 mb-2">Bienvenue, <?= esc(session('username')) ?>.</h1>
                            <p class="subtitle mb-0">
                                Choisis ton objectif pour personnaliser ton suivi alimentaire et sportif.
                            </p>
                        </div>
                        <div class="col-12 col-lg-4 d-flex flex-wrap gap-2 justify-content-lg-end">
                            <span class="stat-chip">R&eacute;gime personnalis&eacute;</span>
                            <span class="stat-chip">Suivi poids</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12">
                <div class="row g-3">
                    <div class="col-12 col-md-6 col-lg-4">
                        <a class="card text-decoration-none h-100" href="/profil">
                            <div class="card-body p-4">
                                <h3 class="h6 mb-2">Profil</h3>
                                <p class="subtitle mb-0">Consulte et complete tes informations personnelles.</p>
                            </div>
                        </a>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4">
                        <a class="card text-decoration-none h-100" href="/objectifs">
                            <div class="card-body p-4">
                                <h3 class="h6 mb-2">Objectifs</h3>
                                <p class="subtitle mb-0">Choisis un objectif et ajuste ton programme.</p>
                            </div>
                        </a>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4">
                        <a class="card text-decoration-none h-100" href="/regimes">
                            <div class="card-body p-4">
                                <h3 class="h6 mb-2">R&eacute;gimes</h3>
                                <p class="subtitle mb-0">Parcours les regimes et leurs details.</p>
                            </div>
                        </a>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4">
                        <a class="card text-decoration-none h-100" href="/paiement">
                            <div class="card-body p-4">
                                <h3 class="h6 mb-2">Paiement</h3>
                                <p class="subtitle mb-0">Paye ton programme et utilise le portefeuille.</p>
                            </div>
                        </a>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4">
                        <a class="card text-decoration-none h-100" href="/export-pdf">
                            <div class="card-body p-4">
                                <h3 class="h6 mb-2">Export PDF</h3>
                                <p class="subtitle mb-0">Telecharge un resume de ton programme.</p>
                            </div>
                        </a>
                    </div>
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
                                <span class="display-4 fw-bold" style="color: var(--accent-600);">
                                    <?= number_format($imc, 1) ?>
                                </span>
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
                                    <div class="progress-bar" role="progressbar" style="width: <?= $progress ?>%; background-color: var(--accent-600);"></div>
                                </div>
                            </div>
                        <?php else: ?>
                            <p class="text-muted mb-0">IMC non calcul&eacute;.</p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            <div class="col-12 col-lg-8">
                <div class="card shadow-sm h-100">
                    <div class="card-body p-4">
                        <h2 class="h5 mb-1">Ton objectif</h2>
                        <p class="subtitle mb-4">S&eacute;lectionne un objectif parmi les 3 ci-dessous.</p>

                        <form>
                            <div class="row g-3">
                                <div class="col-12 col-md-4">
                                    <label class="d-block rounded-3 p-3 h-100 objectif-card" for="objectif-prise">
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
                                    <label class="d-block rounded-3 p-3 h-100 objectif-card" for="objectif-reduire">
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
                                    <label class="d-block rounded-3 p-3 h-100 objectif-card" for="objectif-imc">
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