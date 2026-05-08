<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <?php if(isset($error)): ?>
        <p style="color: red;"><?php echo $error; ?></p>
    <?php endif?>

    <form action="/user/login" method="post">
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" placeholder="Email" required>
        <label for="password">Password:</label>
        <input type="password" name="password" id="password" placeholder="Password" required>
        <button type="submit">Login</button>
    </form>

    <a href="/user/redirectinscription">Inscription</a>
</body>
</html>