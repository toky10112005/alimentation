<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Regimes - Gestion d'alimentation</title>

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
                    <span class="badge badge-soft mb-3">Catalogue regimes</span>
                    <h1 class="section-title h3 mb-2">Consulter les regimes</h1>
                    <p class="subtitle mb-0">Choisis un regime adapte a ton objectif et ton rythme.</p>
                </div>
            </div>

            <?php foreach ($regimes as $regime): ?>
                <div class="col-12 col-lg-4">
                    <div class="card shadow-sm h-100">
                        <div class="card-body p-4 d-flex flex-column">
                            <div class="d-flex justify-content-between align-items-start mb-3">
                                <div>
                                    <h2 class="h6 mb-1"><?= esc($regime['name']) ?></h2>
                                    <p class="subtitle mb-0"><?= esc($regime['description']) ?></p>
                                </div>
                                <span class="badge badge-soft"><?= esc($regime['variation']) ?></span>
                            </div>
                            <div class="small text-muted mb-3">Duree: <?= esc($regime['duration']) ?></div>
                            <div class="d-flex justify-content-between mb-3">
                                <span class="fw-semibold"><?= esc($regime['price']) ?></span>
                                <span class="text-muted small">Prix total</span>
                            </div>
                            <div class="mt-auto">
                                <div class="small fw-semibold mb-2">Repartition alimentaire</div>
                                <div class="mb-2">
                                    <div class="d-flex justify-content-between small text-muted"><span>Viande</span><span><?= esc($regime['meat']) ?>%</span></div>
                                    <div class="progress" style="height: 6px;">
                                        <div class="progress-bar" role="progressbar" style="width: <?= esc($regime['meat']) ?>%; background-color: var(--accent-600);"></div>
                                    </div>
                                </div>
                                <div class="mb-2">
                                    <div class="d-flex justify-content-between small text-muted"><span>Poisson</span><span><?= esc($regime['fish']) ?>%</span></div>
                                    <div class="progress" style="height: 6px;">
                                        <div class="progress-bar" role="progressbar" style="width: <?= esc($regime['fish']) ?>%; background-color: var(--accent-600);"></div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <div class="d-flex justify-content-between small text-muted"><span>Volaille</span><span><?= esc($regime['poultry']) ?>%</span></div>
                                    <div class="progress" style="height: 6px;">
                                        <div class="progress-bar" role="progressbar" style="width: <?= esc($regime['poultry']) ?>%; background-color: var(--accent-600);"></div>
                                    </div>
                                </div>
                                <button class="btn btn-outline-secondary w-100" type="button">Voir le programme</button>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </main>

    <script src="/assets/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>
