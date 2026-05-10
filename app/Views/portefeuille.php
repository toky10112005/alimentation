<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portefeuille • Gestion d'alimentation</title>
    <link href="/assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="/assets/css/theme.css" rel="stylesheet">
</head>
<body class="bg-light">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="/">Gestion d'alimentation</a>
        </div>
    </nav>

    <main class="container py-4">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8 col-lg-6">
                <div class="card shadow-sm">
                    <div class="card-body p-4">
                        <h1 class="h4 mb-4">Gestion du Portefeuille</h1>

                        <div id="wallet-alerts">

                        <?php if (isset($success)): ?>
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-circle me-2" viewBox="0 0 16 16">
                                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                    <path d="m10.97 4.97-.02.02-3.6 3.85-1.74-1.885a.5.5 0 0 0-.712.712l2.55 2.75a.5.5 0 0 0 .74-.037l4.005-4.287a.5.5 0 0 0-.738-.847z"/>
                                </svg>
                                <?= esc($success) ?>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        <?php endif; ?>

                        <?php if (isset($error)): ?>
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-exclamation-circle me-2" viewBox="0 0 16 16">
                                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                    <path d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/>
                                </svg>
                                <?= esc($error) ?>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        <?php endif; ?>

                        </div>

                        <div class="bg-light p-3 rounded mb-4">
                            <p class="text-muted mb-1">Solde du portefeuille</p>
                            <h2 id="wallet-balance" class="h3 mb-0 text-primary fw-bold"><?= esc(number_format((float) ($solde ?? 0), 2)) ?> €</h2>
                        </div>

                        <div class="card border-0 bg-white mb-4">
                            <div class="card-body p-0">
                                <h3 class="h6 text-muted mb-3">Ajouter des fonds</h3>
                                <form id="recharge-form" action="/saisisCode" method="post" data-ajax-url="/saisisCode">
                                    <?= csrf_field() ?>
                                    <div class="mb-3">
                                        <label for="code" class="form-label">Code de recharge</label>
                                        <input type="text" class="form-control" name="code" id="code" placeholder="Saisir le code" required>
                                    </div>
                                    <button type="submit" class="btn btn-primary w-100">Valider</button>
                                </form>
                            </div>
                        </div>

                        <div class="d-grid gap-2">
                            <a href="/retourRegimes" class="btn btn-outline-secondary">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left me-2" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M12 8a.5.5 0 0 1-.5.5H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5a.5.5 0 0 1 .5.5z"/>
                                </svg>
                                Retour
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script src="/assets/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="/assets/js/portefeuille.js"></script>
</body>
</html>