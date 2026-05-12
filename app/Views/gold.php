<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Offres GOLD • Gestion d'alimentation</title>

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
        <div class="mb-4">
            <h1 class="h3 mb-4">Offres GOLD</h1>
            <p class="text-muted">Profitez de nos offres premium avec jusqu'à <strong><?php if (!empty($listeGold)): ?><?= esc($listeGold[0]['remise']) ?><?php endif; ?>%</strong> de remise sur tous nos régimes.</p>
        </div>

        <?php if (isset($error)): ?>
            <div class="alert alert-danger" role="alert">
                <?= esc($error) ?>
            </div>
        <?php endif; ?>

        <div class="row g-4">
            <?php if (!empty($listeGold)): ?>
                <?php foreach ($listeGold as $gold): ?>
                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="card shadow-sm h-100 border-warning">
                            <div class="card-header bg-warning text-dark">
                                <span class="badge text-bg-danger">-<?= esc($gold['remise']) ?>%</span>
                            </div>
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title"><?= esc($gold['description']) ?></h5>
                                
                                <div class="my-3 flex-grow-1">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <span class="text-muted">Prix</span>
                                        <strong class="text-primary fs-5"><?= esc(number_format((float) $gold['prix'], 2)) ?> Ar</strong>
                                    </div>
                                </div>

                                <div class="d-grid gap-2">
                                    <a href="/acheterGold/<?= esc($gold['id']) ?>" class="btn btn-warning text-dark">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star me-2" viewBox="0 0 16 16">
                                            <path d="M2.866 14.85c-.078.444.36.791.746.584l4.915-2.904 4.915 2.905c.386.227.824-.14.746-.584l-.83-4.73 3.522-3.356c.33-.314.16-.888-.282-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm2.905-4.32c.283-.084.565.074.738.413l.552 1.107 1.226.178c.31.045.547.29.56.644l.052 1.231-1.08-.798c-.23-.17-.556-.17-.786 0l-1.08.798.052-1.23c.013-.355.25-.6.56-.644l1.226-.179.551-1.107c.173-.34.455-.497.738-.413z"/>
                                        </svg>
                                        Devenir GOLD
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="col-12">
                    <div class="alert alert-info" role="alert">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-circle me-2" viewBox="0 0 16 16">
                            <path d="m8.93.456-6.933 3.349A1 1 0 0 0 .646 4.97v6.07a1 1 0 0 0 .654.964l6.933 3.347a.5.5 0 0 0 .434 0l6.933-3.347a1 1 0 0 0 .654-.964V4.97a1 1 0 0 0-.654-.964L8.93.456zM8 1.068L14.236 4.5 8 7.932 1.764 4.5 8 1.068z"/>
                        </svg>
                        Aucune offre GOLD disponible pour le moment.
                    </div>
                </div>
            <?php endif; ?>
        </div>

        <div class="mt-4">
            <a href="/retourRegimes" class="btn btn-outline-secondary">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left me-2" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M12 8a.5.5 0 0 1-.5.5H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5a.5.5 0 0 1 .5.5z"/>
                </svg>
                Retour
            </a>
        </div>
    </main>

    <script src="/assets/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>
