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
                <span class="brand-mark">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-egg-fried" viewBox="0 0 16 16">
                        <path d="M8 0a3 3 0 0 0-3 3c0 .342.023.674.065.993v.5H2a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-1a1 1 0 0 0-1-1h-3v-.5c.042-.32.065-.65.065-.993a3 3 0 0 0-3-3zm.5 3a.5.5 0 0 1 0 1 .5.5 0 0 1 0-1z"/>
                    </svg>
                </span>
                <span>Alimentation <span>Sante</span></span>
            </a>
            <a class="btn btn-sm btn-outline-secondary" href="/accueil">Tableau de bord</a>
        </div>
    </nav>

    <main class="container py-5">
        <div class="row g-4">
            <div class="col-12">
                <div class="p-4 p-md-5 rounded-3 hero-card">
                    <span class="badge badge-soft mb-3">Objectifs personnels</span>
                    <h1 class="section-title h3 mb-2">Choisir un objectif</h1>
                    <p class="subtitle mb-0">Selectionne l'objectif qui correspond a ta situation actuelle.</p>
                </div>
            </div>

            <div class="col-12 col-lg-8">
                <div class="card shadow-sm">
                    <div class="card-body p-4">
                        <form class="row g-3">
                            <?php foreach ($objectifs as $index => $objectif): ?>
                                <div class="col-12 col-md-4">
                                    <label class="d-block rounded-3 p-3 h-100 objectif-card" for="objectif-<?= $index ?>">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="objectif" id="objectif-<?= $index ?>" <?= $index === 0 ? 'checked' : '' ?>>
                                            <span class="form-check-label fw-semibold"><?= esc($objectif['title']) ?></span>
                                        </div>
                                        <div class="text-muted small mt-2"><?= esc($objectif['description']) ?></div>
                                        <div class="mt-3 small fw-semibold">Duree: <?= esc($objectif['duration']) ?></div>
                                    </label>
                                </div>
                            <?php endforeach; ?>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-12 col-lg-4">
                <div class="card shadow-sm h-100">
                    <div class="card-body p-4">
                        <h2 class="h6 mb-3">Conseil du jour</h2>
                        <p class="subtitle">Un objectif clair aide a maintenir la motivation. Commence petit, progresse chaque semaine.</p>
                        <div class="d-flex flex-column gap-2 mt-4">
                            <button class="btn btn-primary" type="button">Valider l'objectif</button>
                            <a class="btn btn-outline-secondary" href="/accueil">Retour</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script src="/assets/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>
