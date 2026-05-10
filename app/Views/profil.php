<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Profil - Gestion d'alimentation</title>
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
            <a class="btn btn-sm btn-outline-secondary" href="/accueil">Retour</a>
        </div>
    </nav>

    <main class="container py-5">
        <div class="row g-4">
            <div class="col-12 col-lg-4">
                <div class="card h-100">
                    <div class="card-body p-4">
                        <span class="badge badge-soft mb-3">Profil utilisateur</span>
                        <h1 class="section-title h4 mb-2"><?= esc($user['nom']) ?></h1>
                        <p class="subtitle mb-4">Visualisation du profil front office.</p>
                        <div class="d-flex flex-wrap gap-2">
                            <span class="stat-chip">IMC suivi</span>
                            <span class="stat-chip"><?= esc($user['objectif']) ?></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-8">
                <div class="card">
                    <div class="card-body p-4 p-md-5">
                        <div class="row g-3">
                            <div class="col-12 col-md-6">
                                <label class="form-label">Nom</label>
                                <input class="form-control" value="<?= esc($user['nom']) ?>" readonly>
                            </div>
                            <div class="col-12 col-md-6">
                                <label class="form-label">Email</label>
                                <input class="form-control" value="<?= esc($user['email']) ?>" readonly>
                            </div>
                            <div class="col-12 col-md-6">
                                <label class="form-label">Genre</label>
                                <input class="form-control" value="<?= esc($user['genre']) ?>" readonly>
                            </div>
                            <div class="col-12 col-md-6">
                                <label class="form-label">Telephone</label>
                                <input class="form-control" value="<?= esc($user['telephone']) ?>" readonly>
                            </div>
                            <div class="col-12 col-md-6">
                                <label class="form-label">Taille</label>
                                <input class="form-control" value="<?= esc($user['taille']) ?>" readonly>
                            </div>
                            <div class="col-12 col-md-6">
                                <label class="form-label">Poids</label>
                                <input class="form-control" value="<?= esc($user['poids']) ?>" readonly>
                            </div>
                            <div class="col-12">
                                <label class="form-label">Objectif choisi</label>
                                <input class="form-control" value="<?= esc($user['objectif']) ?>" readonly>
                            </div>
                        </div>
                        <div class="d-flex flex-wrap gap-2 mt-4">
                            <button type="button" class="btn btn-primary">Modifier le profil</button>
                            <a class="btn btn-outline-secondary" href="/objectifs">Choisir un objectif</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script src="/assets/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>
