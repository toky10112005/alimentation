<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des régimes</title>
</head>
<body>
    <h1>Voici la liste des régimes proposé pour toi</h1>
    <ul>
        <?php foreach ($regimes as $regime): ?>
            <li>
                <h2><?= esc($regime['name']) ?></h2>
                <p>Poids minimal d'impact : <?= esc($regime['poids_minimal_impact']) ?> kg</p>
                <p>Durée : <?= esc($regime['duree_jours']) ?> jours</p>
                <p>Prix journalier : <?= esc($regime['prix_journalier']) ?> €</p>
                <p>Proportion viande : <?= esc($regime['p_viande']) ?>%</p>
                <p>Proportion volaille : <?= esc($regime['p_volaille']) ?>%</p>
                <p>Proportion poisson : <?= esc($regime['p_poisson']) ?>%</p>
            </li>
        <?php endforeach; ?>
    </ul>
</body>
</html>