<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Objectifs - Gestion d'alimentation</title>
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
            <a class="btn btn-sm btn-outline-secondary" href="/regimes">Voir les regimes</a>
        </div>
    </nav>

    <main class="container py-5">
        <div class="section-container">
            <div class="row g-4">
                <div class="col-12">
                    <div class="p-4 p-md-5 rounded-3 hero-card">
                        <span class="badge badge-soft mb-3">🎯 Tes objectifs</span>
                        <h1 class="section-title mb-2">Définis ton objectif</h1>
                        <p class="subtitle mb-0">Chaque objectif propose un parcours alimentaire et sportif personnalisé.</p>
                    </div>
                </div>

                <div class="col-12">
                    <div class="grid-modern cols-3">
                        <?php foreach ($objectifs as $objectif): ?>
                            <div class="objectif-card">
                                <div class="mb-3">
                                    <span class="badge badge-soft"><?= esc($objectif['badge']) ?></span>
                                </div>
                                <h2 class="h5 mb-2 fw-700"><?= esc($objectif['title']) ?></h2>
                                <p class="subtitle"><?= esc($objectif['text']) ?></p>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>

                <div class="col-12">
                    <div class="divider"></div>
                    <div class="d-flex flex-wrap gap-2 justify-content-center">
                        <a class="btn btn-primary" href="/regimes">Continuer vers les régimes →</a>
                        <a class="btn btn-outline-secondary" href="/accueil">← Retour</a>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script src="/assets/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>
