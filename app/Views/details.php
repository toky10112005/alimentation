<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Details du regime • Gestion d'alimentation</title>

    <link href="/assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="/assets/css/theme.css" rel="stylesheet">
</head>
<body class="bg-light">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="/">Gestion d'alimentation</a>
        </div>
    </nav>

    <main class="container py-4">
        <?php if (isset($error)): ?>
            <div class="alert alert-danger" role="alert">
                <?= esc($error) ?>
            </div>
        <?php else: ?>
            <div class="row g-4">
                <div class="col-12 col-lg-7">
                    <div class="card shadow-sm h-100">
                        <div class="card-body p-4">
                            <h1 class="h3 mb-4"><?= esc($regime['name']) ?></h1>

                            <div class="list-group list-group-flush">
                                <div class="list-group-item d-flex justify-content-between px-0">
                                    <span class="text-muted">Poids minimal d'impact</span>
                                    <strong><?= esc($regime['poids_minimal_impact']) ?> kg</strong>
                                </div>
                                <div class="list-group-item d-flex justify-content-between px-0">
                                    <span class="text-muted">Duree</span>
                                    <strong><?= esc($regime['duree_jours']) ?> jours</strong>
                                </div>
                                <div class="list-group-item d-flex justify-content-between px-0">
                                    <span class="text-muted">Prix total</span>
                                    <strong class="text-primary"><?= esc(number_format((float) $regime['prix_total'], 2)) ?> €</strong>
                                </div>
                                <div class="list-group-item d-flex justify-content-between px-0">
                                    <span class="text-muted">Proportion viande</span>
                                    <strong><?= esc($regime['p_viande']) ?>%</strong>
                                </div>
                                <div class="list-group-item d-flex justify-content-between px-0">
                                    <span class="text-muted">Proportion volaille</span>
                                    <strong><?= esc($regime['p_volaille']) ?>%</strong>
                                </div>
                                <div class="list-group-item d-flex justify-content-between px-0">
                                    <span class="text-muted">Proportion poisson</span>
                                    <strong><?= esc($regime['p_poisson']) ?>%</strong>
                                </div>
                            </div>

                            <div class="d-flex gap-2 mt-4">
                                <a href="" class="btn btn-primary">Acheter</a>
                                <a href="javascript:history.back()" class="btn btn-outline-secondary">Retour</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-lg-5">
                    <div class="card shadow-sm h-100">
                        <div class="card-body p-4">
                            <h2 class="h5 mb-3">Activites conseillees</h2>
                            <ul class="list-group list-group-flush">
                                <?php foreach ($activite as $act): ?>
                                    <li class="list-group-item px-0 d-flex justify-content-between">
                                        <span><?= esc($act['name']) ?></span>
                                        <span class="text-muted"><?= esc($act['duree']) ?></span>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </main>

    <script src="/assets/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>