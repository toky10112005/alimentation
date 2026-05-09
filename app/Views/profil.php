<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Profil - Gestion d'alimentation</title>

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
            <div class="col-12 col-lg-4">
                <div class="card shadow-sm h-100">
                    <div class="card-body p-4">
                        <span class="badge badge-soft mb-3">Profil utilisateur</span>
                        <h1 class="section-title h4 mb-2"><?= esc($user['username']) ?></h1>
                        <p class="subtitle mb-3">Informations personnelles et sante.</p>
                        <div class="d-flex flex-wrap gap-2">
                            <span class="stat-chip">IMC suivi</span>
                            <span class="stat-chip">Objectif actif</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-8">
                <div class="card shadow-sm">
                    <div class="card-body p-4 p-md-5">
                        <h2 class="h5 mb-3">Coordonnees</h2>
                        <div class="row g-3">
                            <div class="col-12 col-md-6">
                                <label class="form-label">Nom d'utilisateur</label>
                                <input class="form-control" value="<?= esc($user['username']) ?>" readonly>
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
                        </div>

                        <hr class="my-4">

                        <h3 class="h6 mb-3">Informations physiques</h3>
                        <div class="row g-3">
                            <div class="col-12 col-md-6">
                                <label class="form-label">Taille (cm)</label>
                                <input class="form-control" value="<?= esc($user['taille']) ?>" readonly>
                            </div>
                            <div class="col-12 col-md-6">
                                <label class="form-label">Poids (kg)</label>
                                <input class="form-control" value="<?= esc($user['poids']) ?>" readonly>
                            </div>
                        </div>

                        <div class="d-flex flex-wrap gap-2 mt-4">
                            <button class="btn btn-primary" type="button">Modifier le profil</button>
                            <a class="btn btn-outline-secondary" href="/accueil">Retour</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script src="/assets/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>
