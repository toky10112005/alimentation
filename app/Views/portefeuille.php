<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Suivis Wallet</title>
</head>
<body>

    <?php if (isset($success)): ?>
        <p style="color: green;"><?= esc($success) ?></p>
    <?php endif; ?>

    <?php if (isset($error)): ?>
        <p style="color: red;"><?= esc($error) ?></p>
    <?php endif; ?>

    <a href="/objectif">Retour</a>

    <p>Solde du portefeuille : <?= esc(number_format((float) ($solde ?? 0), 2)) ?> €</p>

    <form action="/saisisCode" method="post">
        <?= csrf_field() ?>
        <label for="code">Code :</label>
        <input type="text" name="code" id="code" placeholder="Saisir le code" required>
        <button type="submit">Valider</button>
    </form>
</body>
</html>