<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Paiement - Gestion d'alimentation</title>
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
            <a class="btn btn-sm btn-outline-secondary" href="/export-pdf">Export PDF</a>
        </div>
    </nav>

    <main class="container py-5">
        <div class="row g-4">
            <div class="col-12 col-lg-7">
                <div class="card">
                    <div class="card-body p-4 p-md-5">
                        <span class="badge badge-soft mb-3">Portefeuille et Gold</span>
                        <h1 class="section-title h4 mb-3">Paiement de test</h1>

                        <div class="mb-4">
                            <label class="form-label">Code portefeuille</label>
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="ABC123">
                                <button class="btn btn-outline-secondary" type="button">Verifier</button>
                            </div>
                            <div class="form-text">Exemple: ABC123 = 50 000 Ar.</div>
                        </div>

                        <div class="mb-4">
                            <label class="form-label">Option Gold</label>
                            <div class="card p-3 border-0 mb-2" style="background-color: var(--accent-100);">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <div class="fw-semibold">Reduction 15%</div>
                                        <div class="small text-muted">Appliquee a tous les regimes.</div>
                                    </div>
                                    <span class="badge text-bg-success">Actif</span>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex flex-wrap gap-2">
                            <button type="button" class="btn btn-primary">Payer maintenant</button>
                            <a class="btn btn-outline-secondary" href="/activites">Retour</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-lg-5">
                <div class="card h-100">
                    <div class="card-body p-4">
                        <h2 class="h6 mb-3">Recapitulatif</h2>
                        <div class="d-flex justify-content-between mb-2">
                            <span class="text-muted">Regime</span>
                            <strong><?= esc($summary['regime']) ?></strong>
                        </div>
                        <div class="d-flex justify-content-between mb-2">
                            <span class="text-muted">Prix initial</span>
                            <span><?= esc($summary['price']) ?></span>
                        </div>
                        <div class="d-flex justify-content-between mb-2">
                            <span class="text-muted">Reduction Gold</span>
                            <span>-<?= esc($summary['gold']) ?></span>
                        </div>
                        <hr>
                        <div class="d-flex justify-content-between mb-3">
                            <span class="fw-semibold">Total a payer</span>
                            <span class="fw-semibold"><?= esc($summary['total']) ?></span>
                        </div>
                        <div class="p-3 rounded-3" style="background-color: var(--accent-100);">
                            <div class="small text-muted">Solde portefeuille</div>
                            <div class="h5 mb-0"><?= esc($summary['wallet']) ?></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script src="/assets/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>
