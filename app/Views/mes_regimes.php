<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Mes regimes • Gestion d'alimentation</title>

    <link href="/assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="/assets/css/theme.css" rel="stylesheet">
</head>
<body class="bg-light">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="/">Gestion d'alimentation</a>
        </div>
        <div class="d-flex gap-2">
            <a href="/objectif" class="btn btn-outline-light">Voir les regimes</a>
            <a href="/portefeuille" class="btn btn-primary">Consulter Portefeuille</a>
        </div>
    </nav>

    <main class="container py-4">
        <div class="p-4 p-md-5 rounded-3 bg-white border mb-4">
            <h1 class="h3 mb-2">Mes regimes achetes</h1>
            <p class="text-muted mb-0">Retrouve tes regimes achetes avec les plats et le plan par jour.</p>
        </div>

        <?php if (empty($regimes)): ?>
            <div class="alert alert-info" role="alert">
                Aucun regime achete pour le moment.
            </div>
        <?php else: ?>
            <div class="accordion" id="regimesAchetes">
                <?php foreach ($regimes as $index => $regime): ?>
                    <?php $collapseId = 'regime-' . $regime['id'] . '-' . $index; ?>
                    <div class="accordion-item mb-3">
                        <h2 class="accordion-header" id="heading-<?= esc($collapseId) ?>">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#<?= esc($collapseId) ?>" aria-expanded="false" aria-controls="<?= esc($collapseId) ?>">
                                <div class="d-flex flex-column">
                                    <span class="fw-semibold"><?= esc($regime['nom']) ?></span>
                                    <small class="text-muted">Achete le <?= esc(date('d/m/Y', strtotime($regime['date_achat']))) ?></small>
                                </div>
                            </button>
                        </h2>
                        <div id="<?= esc($collapseId) ?>" class="accordion-collapse collapse" aria-labelledby="heading-<?= esc($collapseId) ?>" data-bs-parent="#regimesAchetes">
                            <div class="accordion-body">
                                <div class="row g-3 mb-4">
                                    <div class="col-12 col-md-4">
                                        <div class="border rounded-3 p-3 h-100">
                                            <div class="text-muted small">Duree</div>
                                            <div class="fs-5 fw-semibold"><?= esc((int) $regime['duree_jours']) ?> jours</div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-4">
                                        <div class="border rounded-3 p-3 h-100">
                                            <div class="text-muted small">Prix total</div>
                                            <div class="fs-5 fw-semibold text-primary"><?= esc(number_format((float) $regime['prix_total'], 2)) ?> €</div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-4">
                                        <div class="border rounded-3 p-3 h-100">
                                            <div class="text-muted small">Prix journalier</div>
                                            <div class="fs-5 fw-semibold"><?= esc(number_format((float) $regime['prix_journalier'], 2)) ?> €</div>
                                        </div>
                                    </div>
                                </div>

                                <?php if (empty($regime['plats_par_jour'])): ?>
                                    <div class="alert alert-warning" role="alert">
                                        Aucun plat defini pour ce regime.
                                    </div>
                                <?php else: ?>
                                    <?php foreach ($regime['plats_par_jour'] as $jour => $moments): ?>
                                        <div class="mb-4">
                                            <h3 class="h6 text-uppercase text-muted">Jour <?= esc($jour) ?></h3>
                                            <div class="row g-3">
                                                <?php foreach ($moments as $moment => $plats): ?>
                                                    <div class="col-12 col-lg-4">
                                                        <div class="border rounded-3 p-3 h-100 bg-white">
                                                            <div class="fw-semibold mb-2"><?= esc($moment) ?></div>
                                                            <ul class="list-unstyled mb-0">
                                                                <?php foreach ($plats as $plat): ?>
                                                                    <li class="d-flex justify-content-between">
                                                                        <span><?= esc($plat['plat']) ?></span>
                                                                        <span class="text-muted small"><?= esc(number_format((float) $plat['calories'], 0)) ?> kcal</span>
                                                                    </li>
                                                                <?php endforeach; ?>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                <?php endforeach; ?>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                <?php endif; ?>

                                <div class="mt-3">
                                    <a href="/details/<?= esc($regime['id']) ?>" class="btn btn-outline-primary">Voir les details du regime</a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </main>

    <script src="/assets/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>
