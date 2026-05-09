<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Inscription - Gestion d'alimentation</title>

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
            <a class="btn btn-sm btn-outline-secondary" href="/">Retour &agrave; l'accueil</a>
        </div>
    </nav>

    <main class="container py-5">
        <div class="row justify-content-center">
            <div class="col-12 col-sm-10 col-md-8 col-lg-6">
                <div class="mb-4">
                    <span class="badge badge-soft mb-3">Inscription &Eacute;tape 1/2</span>
                    <h1 class="section-title h3 mb-2">Cr&eacute;er un compte</h1>
                    <p class="subtitle mb-0">Renseigne tes informations de base pour commencer.</p>
                </div>

                <?php if (isset($errors)): ?>
                    <div class="alert alert-danger" role="alert">
                        <?php foreach ($errors as $error): ?>
                            <div><?= esc($error) ?></div>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>

                <div class="card auth-card shadow-sm">
                    <div class="card-body p-4 p-md-5">
                        <form action="/user/inscription" method="post" class="row g-3">
                            <?= csrf_field() ?>
                            <div class="col-12">
                                <label class="form-label" for="username">Nom d'utilisateur</label>
                                <input type="text" class="form-control" name="username" id="username" placeholder="ex: Rakoto" required>
                            </div>
                            <div class="col-12">
                                <label class="form-label" for="email">Email</label>
                                <input type="email" class="form-control" name="email" id="email" placeholder="ex: nom@email.com" required>
                            </div>
                            <div class="col-12">
                                <label class="form-label" for="password">Mot de passe</label>
                                <input type="password" class="form-control" name="password" id="password" placeholder="••••••••" required>
                            </div>
                            <div class="col-12 col-md-6">
                                <label class="form-label" for="genre">Genre</label>
                                <select class="form-select" name="genre" id="genre" required>
                                    <option value="Homme">Homme</option>
                                    <option value="Femme">Femme</option>
                                    <option value="Autre">Autre</option>
                                </select>
                            </div>
                            <div class="col-12 col-md-6">
                                <label class="form-label" for="telephone">T&eacute;l&eacute;phone</label>
                                <input type="text" class="form-control" name="telephone" id="telephone" placeholder="ex: 03x xx xxx xx" required>
                            </div>
                            <div class="col-12 d-flex flex-wrap gap-2">
                                <button type="submit" class="btn btn-primary">Suivant</button>
                                <a class="btn btn-outline-secondary" href="/">Annuler</a>
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