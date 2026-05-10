<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Accueil - Gestion d'alimentation</title>
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
                <a class="btn btn-sm btn-outline-secondary" href="/profil">Profil</a>
                <a class="btn btn-sm btn-outline-secondary" href="/paiement">Paiement</a>
            </div>
        </div>
    </nav>

    <main class="container py-5">
        <div class="row g-4 align-items-stretch">
            <div class="col-12">
                <div class="p-4 p-md-5 rounded-3 hero-card">
                    <div class="row g-4 align-items-center">
                        <div class="col-12 col-lg-8">
                            <span class="badge badge-soft mb-3">Front office testable</span>
                            <h1 class="section-title h3 mb-2">Bienvenue, <?= esc($username) ?></h1>
                            <p class="subtitle mb-0">Suivi de poids, choix des objectifs, regimes, activites et export PDF dans un style simple et professionnel.</p>
                        </div>
                        <div class="col-12 col-lg-4 text-lg-end">
                            <div class="display-6 fw-bold mb-1" style="color: var(--accent-600);">
                                <?= esc(number_format((float) $IMC, 1)) ?>
                            </div>
                            <div class="subtitle">IMC de demo</div>
                        </div>
                    </div>
                </div>
            </div>

            <?php foreach ($cards as $card): ?>
                <div class="col-12 col-md-6 col-lg-4">
                    <a class="card text-decoration-none h-100" href="<?= esc($card['link']) ?>">
                        <div class="card-body p-4">
                            <h2 class="h5 mb-2"><?= esc($card['title']) ?></h2>
                            <p class="subtitle mb-0"><?= esc($card['desc']) ?></p>
                        </div>
                    </a>
                </div>
            <?php endforeach; ?>
        </div>
    </main>

    <script src="/assets/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>
