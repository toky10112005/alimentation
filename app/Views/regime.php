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
        <div class="d-flex gap-2">
            <a href="/mes-regimes" class="btn btn-outline-light">Mes regimes</a>
            <a href="/acheterGold" class="btn btn-outline-light">Acheter Offre Gold</a>
            <a href="/portefeuille" class="btn btn-primary">Consulter Portefeuille</a>
        </div>
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
                        <div class="card-body d-flex flex-column p-4 position-relative">
                            <?php if (!empty($regime['is_bought'])): ?>
                                <span class="badge text-bg-success position-absolute top-0 end-0 m-3">Régime déjà acheté</span>
                            <?php endif; ?>

                            <h2 class="h5 mb-3 pe-5"><?= esc($regime['nom']) ?></h2>

                            <dl class="mb-4">
                                <div class="d-flex justify-content-between mb-2">
                                    <dt class="text-muted fw-normal">Impact minimal</dt>
                                    <dd class="mb-0 fw-semibold"><?= esc($regime['poids_impact_semaine']) ?> kg</dd>
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

                            <?php if (!empty($regime['activites'])): ?>
                                <div class="mb-3">
                                    <div class="text-muted small mb-2">Activites conseillees</div>
                                    <ul class="list-unstyled small mb-0">
                                        <?php foreach ($regime['activites'] as $act): ?>
                                            <li><?= esc($act['name']) ?> • <?= esc($act['duree_minutes_jour']) ?> min/jour</li>
                                        <?php endforeach; ?>
                                    </ul>
                                </div>
                            <?php endif; ?>

                            <div class="mt-auto">
                                <?php if (!empty($regime['is_bought'])): ?>
                                    <button class="btn btn-outline-success w-100" disabled>Régime déjà acheté</button>
                                <?php else: ?>
                                    <a href="/details/<?= esc($regime['id']) ?>" class="btn btn-primary w-100">Voir les details</a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </article>
                </div>
            <?php endforeach; ?>
        </div>

        <div class="mt-4">
            <a href="/objectif" class="btn btn-outline-secondary">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left me-2" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M12 8a.5.5 0 0 1-.5.5H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5a.5.5 0 0 1 .5.5z"/>
                </svg>
                Retour
            </a>
        </div>
    </main>

    <script src="/assets/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>