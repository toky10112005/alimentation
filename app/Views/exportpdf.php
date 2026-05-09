<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Export PDF - Gestion d'alimentation</title>

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
                        <span class="badge badge-soft mb-3">Export PDF</span>
                        <h1 class="section-title h4 mb-3">Recapitulatif du programme</h1>

                        <div class="row g-3">
                            <div class="col-12 col-md-6">
                                <label class="form-label">Nom</label>
                                <input class="form-control" value="<?= esc($recap['name']) ?>" readonly>
                            </div>
                            <div class="col-12 col-md-6">
                                <label class="form-label">Objectif</label>
                                <input class="form-control" value="<?= esc($recap['objectif']) ?>" readonly>
                            </div>
                            <div class="col-12">
                                <label class="form-label">Regime</label>
                                <input class="form-control" value="<?= esc($recap['regime']) ?>" readonly>
                            </div>
                            <div class="col-12">
                                <label class="form-label">Activites</label>
                                <textarea class="form-control" rows="3" readonly><?= esc(implode(', ', $recap['activites'])) ?></textarea>
                            </div>
                            <div class="col-12 col-md-6">
                                <label class="form-label">Duree</label>
                                <input class="form-control" value="<?= esc($recap['duration']) ?>" readonly>
                            </div>
                            <div class="col-12 col-md-6">
                                <label class="form-label">Prix</label>
                                <input class="form-control" value="<?= esc($recap['price']) ?>" readonly>
                            </div>
                        </div>

                        <div class="d-flex flex-wrap gap-2 mt-4">
                            <button class="btn btn-primary" type="button">Telecharger le PDF</button>
                            <a class="btn btn-outline-secondary" href="/accueil">Retour</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-lg-5">
                <div class="card shadow-sm h-100">
                    <div class="card-body p-4">
                        <h2 class="h6 mb-3">Conseil</h2>
                        <p class="subtitle">Le PDF contient tes informations clefs pour suivre ton programme.</p>
                        <div class="mt-4">
                            <div class="small text-muted">Derniere mise a jour</div>
                            <div class="fw-semibold">Aujourd'hui</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script src="/assets/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>
