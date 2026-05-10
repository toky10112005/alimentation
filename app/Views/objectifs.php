<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Objectifs - Gestion d'alimentation</title>
    <link href="/assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="/assets/css/theme.css" rel="stylesheet">
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
        <div class="row g-4">
            <div class="col-12">
                <div class="p-4 p-md-5 rounded-3 hero-card">
                    <span class="badge badge-soft mb-3">Choix des objectifs</span>
                    <h1 class="section-title h3 mb-2">Choisir ton objectif</h1>
                    <p class="subtitle mb-0">Chaque objectif propose un parcours alimentaire et sportif different.</p>
                </div>
            </div>

            <?php foreach ($objectifs as $objectif): ?>
                <div class="col-12 col-md-4">
                    <div class="card h-100 objectif-card">
                        <div class="card-body p-4">
                            <span class="badge badge-soft mb-3"><?= esc($objectif['badge']) ?></span>
                            <h2 class="h5 mb-2"><?= esc($objectif['title']) ?></h2>
                            <p class="subtitle mb-0"><?= esc($objectif['text']) ?></p>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>

            <div class="col-12">
                <div class="d-flex flex-wrap gap-2">
                    <a class="btn btn-primary" href="/regimes">Valider et voir les regimes</a>
                    <a class="btn btn-outline-secondary" href="/accueil">Retour</a>
                </div>
            </div>
        </div>
    </main>

    <script src="/assets/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>
