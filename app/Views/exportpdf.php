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
                <span class="brand-mark">S4</span>
                <span>Alimentation <span>Sante</span></span>
            </a>
            <a class="btn btn-sm btn-outline-secondary" href="/paiement">Paiement</a>
        </div>
    </nav>

    <main class="container py-5">
        <div class="row g-4">
            <div class="col-12 col-lg-7">
                <div class="card">
                    <div class="card-body p-4 p-md-5">
                        <span class="badge badge-soft mb-3">Export PDF</span>
                        <h1 class="section-title h4 mb-3">Resume du programme</h1>

                        <div class="row g-3">
                            <div class="col-12 col-md-6">
                                <label class="form-label">Nom</label>
                                <input class="form-control" value="<?= esc($recap['nom']) ?>" readonly>
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
                                <textarea class="form-control" rows="3" readonly><?= esc($recap['activites']) ?></textarea>
                            </div>
                            <div class="col-12 col-md-6">
                                <label class="form-label">Duree</label>
                                <input class="form-control" value="<?= esc($recap['duree']) ?>" readonly>
                            </div>
                            <div class="col-12 col-md-6">
                                <label class="form-label">Prix</label>
                                <input class="form-control" value="<?= esc($recap['prix']) ?>" readonly>
                            </div>
                        </div>

                        <div class="d-flex flex-wrap gap-2 mt-4">
                            <button type="button" class="btn btn-primary">Telecharger le PDF</button>
                            <a class="btn btn-outline-secondary" href="/accueil">Retour</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-lg-5">
                <div class="card h-100">
                    <div class="card-body p-4">
                        <h2 class="h6 mb-3">Contenu du PDF</h2>
                        <ul class="list-unstyled mb-0">
                            <li class="mb-2">Informations utilisateur</li>
                            <li class="mb-2">Objectif choisi</li>
                            <li class="mb-2">Regime propose</li>
                            <li class="mb-2">Activites sportives</li>
                            <li class="mb-2">Duree et prix</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script src="/assets/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>
