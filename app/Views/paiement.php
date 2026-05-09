<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Paiement - Gestion d'alimentation</title>

    <link href="/assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="/assets/css/theme.css" rel="stylesheet">
</head>
<body class="page-shell">
    <nav class="navbar navbar-expand-lg bg-white border-bottom">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center gap-2" href="/accueil">
                <span class="brand-mark">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-egg-fried" viewBox="0 0 16 16">
                        <path d="M8 0a3 3 0 0 0-3 3c0 .342.023.674.065.993v.5H2a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-1a1 1 0 0 0-1-1h-3v-.5c.042-.32.065-.65.065-.993a3 3 0 0 0-3-3zm.5 3a.5.5 0 0 1 0 1 .5.5 0 0 1 0-1z"/>
                    </svg>
                </span>
                <span>Alimentation <span>Sante</span></span>
            </a>
            <a class="btn btn-sm btn-outline-secondary" href="/accueil">Tableau de bord</a>
        </div>
    </nav>

    <main class="container py-5">
        <div class="row g-4">
            <div class="col-12 col-lg-7">
                <div class="card shadow-sm">
                    <div class="card-body p-4 p-md-5">
                        <span class="badge badge-soft mb-3">Paiement</span>
                        <h1 class="section-title h4 mb-3">Finaliser ton abonnement</h1>

                        <div class="mb-4">
                            <label class="form-label">Code portefeuille</label>
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="EX: ABC123">
                                <button class="btn btn-outline-secondary" type="button">Valider</button>
                            </div>
                            <div class="form-text">Ajoute un code pour alimenter ton portefeuille.</div>
                        </div>

                        <div class="mb-4">
                            <label class="form-label">Mode de paiement</label>
                            <div class="d-flex flex-column gap-2">
                                <label class="card p-3 border-0 shadow-sm">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="payment" checked>
                                        <span class="form-check-label fw-semibold">Portefeuille virtuel</span>
                                    </div>
                                </label>
                                <label class="card p-3 border-0 shadow-sm">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="payment">
                                        <span class="form-check-label fw-semibold">Carte bancaire</span>
                                    </div>
                                </label>
                            </div>
                        </div>

                        <div class="d-flex flex-wrap gap-2">
                            <button class="btn btn-primary" type="button">Payer maintenant</button>
                            <a class="btn btn-outline-secondary" href="/regimes">Retour</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-lg-5">
                <div class="card shadow-sm h-100">
                    <div class="card-body p-4">
                        <h2 class="h6 mb-3">Recapitulatif</h2>
                        <div class="d-flex justify-content-between mb-2">
                            <span class="text-muted">Programme</span>
                            <span class="fw-semibold"><?= esc($summary['plan']) ?></span>
                        </div>
                        <div class="d-flex justify-content-between mb-2">
                            <span class="text-muted">Prix</span>
                            <span><?= esc($summary['price']) ?></span>
                        </div>
                        <div class="d-flex justify-content-between mb-2">
                            <span class="text-muted">Reduction Gold</span>
                            <span>-<?= esc($summary['discount']) ?></span>
                        </div>
                        <hr>
                        <div class="d-flex justify-content-between mb-4">
                            <span class="fw-semibold">Total</span>
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
