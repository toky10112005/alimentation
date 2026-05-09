<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Profil - Gestion d'alimentation</title>

    <link href="/assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="/assets/css/theme.css" rel="stylesheet">
</head>
<body class="bg-light">
    <main class="container py-5">
        <div class="row justify-content-center">
            <div class="col-12 col-sm-10 col-md-8 col-lg-6">
                <div class="mb-4 text-center">
                    <h1 class="h3 mb-1">Details du profil</h1>
                    <p class="text-muted mb-0">Ces informations aident a estimer tes besoins.</p>
                </div>

                <div class="card shadow-sm">
                    <div class="card-body p-4">
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
                            <div class="col-12 d-flex gap-2">
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