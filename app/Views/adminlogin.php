<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Administrateur</title>
</head>
<body>
    <a href="/admin/insert">Put admin</a>
    <form action="/admin/login" method="post">
        <?= csrf_field() ?>
        <label for="username">Entrér votre nom:</label>
        <input type="text" name="username" placeholder="username" required>
        <label for="password"></label>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit">Login</button>
    </form>
</body>
</html>