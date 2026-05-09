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
            <a class="navbar-brand d-flex align-items-center gap-2" href="/">
                <span class="brand-mark">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-egg-fried" viewBox="0 0 16 16">
                        <path d="M8 0a3 3 0 0 0-3 3c0 .342.023.674.065.993v.5H2a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-1a1 1 0 0 0-1-1h-3v-.5c.042-.32.065-.65.065-.993a3 3 0 0 0-3-3zm.5 3a.5.5 0 0 1 0 1 .5.5 0 0 1 0-1z"/>
                    </svg>
                </span>
                <span>Alimentation <span>Sant&eacute;</span></span>
            </a>
            <a class="btn btn-sm btn-outline-secondary" href="/user/redirectinscription">Retour &agrave; l'&eacute;tape 1</a>
        </div>
    </nav>

    <main class="container py-5">
        <div class="row justify-content-center">
            <div class="col-12 col-sm-10 col-md-8 col-lg-6">
                <div class="mb-4">
                    <span class="badge badge-soft mb-3">Inscription &Eacute;tape 2/2</span>
                    <h1 class="section-title h3 mb-2">D&eacute;tails du profil</h1>
                    <p class="subtitle mb-0">Ces informations aident &agrave; estimer tes besoins.</p>
                </div>

                <div class="card auth-card shadow-sm">
                    <div class="card-body p-4 p-md-5">
                        <form action="/user/put" method="post" class="row g-3">
                            <?= csrf_field() ?>
                            <div class="col-12 col-md-6">
                                <label for="taille" class="form-label">Taille (cm)</label>
                                <input type="number" class="form-control" name="taille" id="taille" placeholder="ex: 170" min="1" step="1" required>
                            </div>
                            <div class="col-12 col-md-6">
                                <label for="poids" class="form-label">Poids (kg)</label>
                                <input type="number" class="form-control" name="poids" id="poids" placeholder="ex: 65" min="1" step="0.1" required>
                            </div>
                            <div class="col-12 d-flex flex-wrap gap-2">
                                <button type="submit" class="btn btn-primary">Terminer</button>
                                <a class="btn btn-outline-secondary" href="/user/redirectinscription">Retour</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script src="/assets/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>