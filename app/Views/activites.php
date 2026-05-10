<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Activites - Gestion d'alimentation</title>
    <link href="/assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="/assets/css/theme.css?v=5" rel="stylesheet">
</head>
<body class="page-shell">
    <nav class="navbar navbar-expand-lg bg-white border-bottom">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center gap-2" href="/accueil">
                <span class="brand-mark">S4</span>
                <span>Alimentation <span>Sante</span></span>
            </a>
            <a class="btn btn-sm btn-outline-secondary" href="/regimes">Regimes</a>
        </div>
    </nav>

    <main class="container py-5">
        <div class="section-container">
            <div class="row g-4">
                <div class="col-12">
                    <div class="p-4 p-md-5 rounded-3 hero-card">
                        <span class="badge badge-soft mb-3">🏃 Activités sportives</span>
                        <h1 class="section-title mb-2">Découvre tes activités idéales</h1>
                        <p class="subtitle mb-0">Course, natation, vélo et musculation avec niveaux d'intensité variés.</p>
                    </div>
                </div>

                <div class="col-12">
                    <div class="grid-modern cols-4">
                        <?php foreach ($activites as $activite): ?>
                            <div class="card">
                                <div class="card-body p-4 text-center">
                                    <div class="feature-icon mx-auto mb-3">
                                        <?= $activite['icon'] ?? '💪' ?>
                                    </div>
                                    <span class="badge badge-soft mb-3 d-inline-block"><?= esc($activite['intensite']) ?></span>
                                    <h2 class="h5 mb-2 fw-700"><?= esc($activite['nom']) ?></h2>
                                    <p class="subtitle mb-0"><?= esc($activite['desc']) ?></p>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>

                <div class="col-12">
                    <div class="divider"></div>
                    <div class="d-flex flex-wrap gap-2 justify-content-center">
                        <a class="btn btn-primary" href="/paiement">Continuer vers le paiement →</a>
                        <a class="btn btn-outline-secondary" href="/accueil">← Retour</a>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script src="/assets/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>
