<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Regimes - Gestion d'alimentation</title>
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
            <div class="d-flex gap-2">
                <a class="btn btn-sm btn-outline-secondary" href="/objectifs">Objectifs</a>
                <a class="btn btn-sm btn-outline-secondary" href="/activites">Activites</a>
            </div>
        </div>
    </nav>

    <main class="container py-5">
        <div class="section-container">
            <div class="row g-4">
                <div class="col-12">
                    <div class="p-4 p-md-5 rounded-3 hero-card">
                        <span class="badge badge-soft mb-3">🍽️ Programmes alimentaires</span>
                        <h1 class="section-title mb-2">Choisis ton régime idéal</h1>
                        <p class="subtitle mb-0">Sélectionne un programme adapté à tes objectifs avec répartition nutritionnelle.</p>
                    </div>
                </div>

                <?php foreach ($regimes as $regime): ?>
                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="card h-100">
                            <div class="card-body p-4 d-flex flex-column">
                                <div class="mb-3">
                                    <h2 class="h5 mb-1 fw-700"><?= esc($regime['nom']) ?></h2>
                                    <p class="subtitle mb-3"><?= esc($regime['description']) ?></p>
                                    <span class="badge badge-soft"><?= esc($regime['variation']) ?></span>
                                </div>

                                <div class="divider"></div>

                                <div class="d-flex justify-content-between mb-3">
                                    <div>
                                        <div class="text-muted small mb-1">Durée</div>
                                        <strong class="text-gradient"><?= esc($regime['duree']) ?></strong>
                                    </div>
                                    <div class="text-end">
                                        <div class="text-muted small mb-1">Prix</div>
                                        <strong class="text-gradient"><?= esc($regime['prix']) ?></strong>
                                    </div>
                                </div>

                                <div class="mt-auto">
                                    <div class="small fw-700 mb-3 text-gradient">Répartition nutritionnelle</div>
                                    <div class="mb-3">
                                        <div class="d-flex justify-content-between small text-muted mb-1"><span>Viande</span><span><?= esc($regime['viande']) ?>%</span></div>
                                        <div class="progress"><div class="progress-bar" style="width: <?= esc($regime['viande']) ?>%;"></div></div>
                                    </div>
                                    <div class="mb-3">
                                        <div class="d-flex justify-content-between small text-muted mb-1"><span>Poisson</span><span><?= esc($regime['poisson']) ?>%</span></div>
                                        <div class="progress"><div class="progress-bar" style="width: <?= esc($regime['poisson']) ?>%;"></div></div>
                                    </div>
                                    <div class="mb-4">
                                        <div class="d-flex justify-content-between small text-muted mb-1"><span>Volaille</span><span><?= esc($regime['volaille']) ?>%</span></div>
                                        <div class="progress"><div class="progress-bar" style="width: <?= esc($regime['volaille']) ?>%;"></div></div>
                                    </div>
                                    <a href="/details/1" class="btn btn-primary w-100">Voir le programme</a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </main>

    <script src="/assets/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>
