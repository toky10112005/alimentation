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
        <div class="row g-4">
            <div class="col-12">
                <div class="p-4 p-md-5 rounded-3 hero-card">
                    <span class="badge badge-soft mb-3">Consultation des regimes</span>
                    <h1 class="section-title h3 mb-2">Choisis un regime adapte</h1>
                    <p class="subtitle mb-0">Liste testable avec prix, duree et repartition alimentaire.</p>
                </div>
            </div>

            <?php foreach ($regimes as $regime): ?>
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="card h-100">
                        <div class="card-body p-4 d-flex flex-column">
                            <div class="d-flex justify-content-between align-items-start gap-2 mb-3">
                                <div>
                                    <h2 class="h5 mb-1"><?= esc($regime['nom']) ?></h2>
                                    <p class="subtitle mb-0"><?= esc($regime['description']) ?></p>
                                </div>
                                <span class="badge badge-soft"><?= esc($regime['variation']) ?></span>
                            </div>

                            <div class="d-flex justify-content-between mb-2">
                                <span class="text-muted">Duree</span>
                                <strong><?= esc($regime['duree']) ?></strong>
                            </div>
                            <div class="d-flex justify-content-between mb-3">
                                <span class="text-muted">Prix</span>
                                <strong><?= esc($regime['prix']) ?></strong>
                            </div>

                            <div class="mt-auto">
                                <div class="small fw-semibold mb-2">Repartition alimentaire</div>
                                <div class="mb-2">
                                    <div class="d-flex justify-content-between small text-muted"><span>Viande</span><span><?= esc($regime['viande']) ?>%</span></div>
                                    <div class="progress" style="height: 6px;"><div class="progress-bar" style="width: <?= esc($regime['viande']) ?>%; background-color: var(--accent-600);"></div></div>
                                </div>
                                <div class="mb-2">
                                    <div class="d-flex justify-content-between small text-muted"><span>Poisson</span><span><?= esc($regime['poisson']) ?>%</span></div>
                                    <div class="progress" style="height: 6px;"><div class="progress-bar" style="width: <?= esc($regime['poisson']) ?>%; background-color: var(--accent-600);"></div></div>
                                </div>
                                <div class="mb-3">
                                    <div class="d-flex justify-content-between small text-muted"><span>Volaille</span><span><?= esc($regime['volaille']) ?>%</span></div>
                                    <div class="progress" style="height: 6px;"><div class="progress-bar" style="width: <?= esc($regime['volaille']) ?>%; background-color: var(--accent-600);"></div></div>
                                </div>
                                <a href="/details/1" class="btn btn-outline-secondary w-100">Voir le programme</a>
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
