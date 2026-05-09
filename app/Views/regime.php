<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Liste des regimes • Gestion d'alimentation</title>

    <link href="/assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="/assets/css/theme.css" rel="stylesheet">
</head>
<body class="bg-light">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="/">Gestion d'alimentation</a>
        </div>

        <div><a href="/portefeuille" class="btn btn-primary">Consulter Portefeuille</a></div>
    </nav>

    <main class="container py-4">
        <div class="p-4 p-md-5 rounded-3 bg-white border mb-4">
            <h1 class="h3 mb-2">Regimes proposes</h1>
            <p class="text-muted mb-0">Choisis le regime qui correspond a ton objectif.</p>
        </div>

        <?php if (session('IMC') !== null): ?>
            <div class="alert alert-info" role="alert">
                IMC actuel : <strong><?= esc(number_format((float) session('IMC'), 1)) ?></strong>
            </div>
        <?php endif; ?>

        <div class="row g-4">
            <?php foreach ($regimes as $regime): ?>
                <div class="col-12 col-md-6 col-xl-4">
                    <article class="card shadow-sm h-100">
                        <div class="card-body d-flex flex-column p-4">
                            <h2 class="h5 mb-3"><?= esc($regime['name']) ?></h2>

                            <dl class="mb-4">
                                <div class="d-flex justify-content-between mb-2">
                                    <dt class="text-muted fw-normal">Impact minimal</dt>
                                    <dd class="mb-0 fw-semibold"><?= esc($regime['poids_minimal_impact']) ?> kg</dd>
                                </div>
                                <div class="d-flex justify-content-between mb-2">
                                    <dt class="text-muted fw-normal">Duree</dt>
                                    <dd class="mb-0 fw-semibold"><?= esc($regime['duree_jours']) ?> jours</dd>
                                </div>
                                <div class="d-flex justify-content-between mb-2">
                                    <dt class="text-muted fw-normal">Prix journalier</dt>
                                    <dd class="mb-0 fw-semibold"><?= esc(number_format((float) $regime['prix_journalier'], 2)) ?> €</dd>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <dt class="text-muted fw-normal">Prix total</dt>
                                    <dd class="mb-0 fw-bold text-primary"><?= esc(number_format((float) $regime['prix_total'], 2)) ?> €</dd>
                                </div>
                            </dl>

                            <div class="mt-auto">
                                <a href="/details/<?= esc($regime['id']) ?>" class="btn btn-primary w-100">Voir les details</a>
                            </div>
                        </div>
                    </article>
                </div>
            <?php endforeach; ?>
        </div>
    </main>

    <script src="/assets/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>