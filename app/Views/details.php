<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Details du regime • Gestion d'alimentation</title>

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
            <a class="btn btn-sm btn-outline-secondary" href="/regimes">Retour aux regimes</a>
        </div>
    </nav>

    <main class="container py-5">
        <div class="row g-4">
            <div class="col-12">
                <div class="p-4 p-md-5 rounded-3 hero-card">
                    <span class="badge badge-soft mb-3">Details du regime</span>
                    <h1 class="section-title h3 mb-2"><?= esc($regime['name']) ?></h1>
                    <p class="subtitle mb-0">Vue detaillee du programme et des activites associees.</p>
                </div>
            </div>

            <div class="col-12 col-lg-7">
                <div class="card h-100">
                    <div class="card-body p-4">
                        <div class="row g-3">
                            <div class="col-12 col-md-6">
                                <div class="p-3 rounded-3" style="background-color: var(--brand-100);">
                                    <div class="small text-muted">Impact minimal</div>
                                    <div class="h5 mb-0"><?= esc($regime['poids_minimal_impact']) ?> kg</div>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="p-3 rounded-3" style="background-color: var(--brand-100);">
                                    <div class="small text-muted">Duree</div>
                                    <div class="h5 mb-0"><?= esc($regime['duree_jours']) ?> jours</div>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="p-3 rounded-3" style="background-color: var(--brand-100);">
                                    <div class="small text-muted">Prix total</div>
                                    <div class="h5 mb-0" style="color: var(--accent-600);">
                                        <?= esc(number_format((float) $regime['prix_total'], 0, ',', ' ')) ?> Ar
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="p-3 rounded-3" style="background-color: var(--brand-100);">
                                    <div class="small text-muted">Variation</div>
                                    <div class="h5 mb-0"><?= esc($regime['variation'] ?? 'Programme test') ?></div>
                                </div>
                            </div>
                        </div>

                        <hr class="my-4">

                        <div class="row g-3">
                            <div class="col-12 col-md-4">
                                <div class="small text-muted">Viande</div>
                                <div class="fw-semibold"><?= esc($regime['p_viande']) ?>%</div>
                            </div>
                            <div class="col-12 col-md-4">
                                <div class="small text-muted">Volaille</div>
                                <div class="fw-semibold"><?= esc($regime['p_volaille']) ?>%</div>
                            </div>
                            <div class="col-12 col-md-4">
                                <div class="small text-muted">Poisson</div>
                                <div class="fw-semibold"><?= esc($regime['p_poisson']) ?>%</div>
                            </div>
                        </div>

                        <div class="d-flex flex-wrap gap-2 mt-4">
                            <a href="/paiement" class="btn btn-primary">Acheter</a>
                            <a href="javascript:history.back()" class="btn btn-outline-secondary">Retour</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-lg-5">
                <div class="card h-100">
                    <div class="card-body p-4">
                        <h2 class="h5 mb-3">Activites conseillees</h2>
                        <ul class="list-group list-group-flush">
                            <?php foreach ($activite as $act): ?>
                                <li class="list-group-item px-0 d-flex justify-content-between align-items-center">
                                    <span><?= esc($act['name']) ?></span>
                                    <span class="badge badge-soft"><?= esc($act['duree']) ?></span>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script src="/assets/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>