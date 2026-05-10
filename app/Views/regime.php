<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Liste des regimes • Gestion d'alimentation</title>

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
        <div class="row g-4">
            <div class="col-12">
                <div class="p-4 p-md-5 rounded-3 hero-card">
                    <span class="badge badge-soft mb-3">Regimes proposes</span>
                    <h1 class="section-title h3 mb-2">Choisis un regime adapte</h1>
                    <p class="subtitle mb-0">Chaque carte affiche la duree, le prix et la repartition alimentaire.</p>
                </div>
            </div>

            <?php if (session('IMC') !== null): ?>
                <div class="col-12">
                    <div class="alert alert-info border-0 shadow-sm" role="alert">
                        IMC actuel : <strong><?= esc(number_format((float) session('IMC'), 1)) ?></strong>
                    </div>
                </div>
            <?php endif; ?>

            <?php foreach ($regimes as $regime): ?>
                <div class="col-12 col-md-6 col-xl-4">
                    <article class="card h-100">
                        <div class="card-body d-flex flex-column p-4">
                            <div class="d-flex justify-content-between align-items-start gap-2 mb-3">
                                <div>
                                    <h2 class="h5 mb-1"><?= esc($regime['name']) ?></h2>
                                    <p class="subtitle mb-0">
                                        <?= esc($regime['variation'] ?? 'Programme test') ?>
                                    </p>
                                </div>
                                <span class="badge badge-soft">Top</span>
                            </div>

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
                                    <dd class="mb-0 fw-semibold"><?= esc(number_format((float) $regime['prix_journalier'], 0, ',', ' ')) ?> Ar</dd>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <dt class="text-muted fw-normal">Prix total</dt>
                                    <dd class="mb-0 fw-bold" style="color: var(--accent-600);"><?= esc(number_format((float) $regime['prix_total'], 0, ',', ' ')) ?> Ar</dd>
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