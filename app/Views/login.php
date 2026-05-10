<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Connexion - Alimentation Santé</title>

    <link href="/assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="/assets/css/theme.css?v=5" rel="stylesheet">
    <style>
        .login-container {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(180deg, rgba(255, 255, 255, 0.95) 0%, rgba(248, 250, 252, 0.98) 50%, rgba(239, 242, 255, 0.95) 100%);
            background-image: 
                radial-gradient(circle at 20% 10%, rgba(124, 58, 237, 0.25), transparent 45%),
                radial-gradient(circle at 80% 0%, rgba(245, 158, 11, 0.2), transparent 40%),
                radial-gradient(circle at 80% 80%, rgba(168, 85, 247, 0.25), transparent 45%),
                url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%237c3aed' fill-opacity='0.03'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
            background-size: auto, auto, auto, 100px 100px;
            background-attachment: fixed;
            position: relative;
            overflow: hidden;
        }

        .login-container::before {
            content: "";
            position: absolute;
            top: -30%;
            right: -5%;
            width: 500px;
            height: 500px;
            background: radial-gradient(circle, rgba(124, 58, 237, 0.25), transparent 70%);
            border-radius: 50%;
        }

        .login-container::after {
            content: "";
            position: absolute;
            bottom: -20%;
            left: -10%;
            width: 400px;
            height: 400px;
            background: radial-gradient(circle, rgba(245, 158, 11, 0.15), transparent 70%);
            border-radius: 50%;
        }

        .login-content {
            position: relative;
            z-index: 2;
            width: 100%;
            max-width: 420px;
        }

        .login-header {
            text-align: center;
            margin-bottom: 2.5rem;
        }

        .login-brand {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 60px;
            height: 60px;
            border-radius: 16px;
            background: linear-gradient(135deg, rgba(124, 58, 237, 0.2), rgba(245, 158, 11, 0.18));
            color: var(--accent-600);
            font-weight: 800;
            font-size: 1.8rem;
            box-shadow: inset 0 0 0 1.5px rgba(124, 58, 237, 0.2);
            margin-bottom: 1.5rem;
        }

        .login-header h1 {
            font-size: 1.8rem;
            font-weight: 800;
            color: var(--brand-950);
            margin-bottom: 0.5rem;
        }

        .login-header p {
            color: var(--brand-500);
            font-size: 0.95rem;
        }

        .login-card {
            background: rgba(255, 255, 255, 0.95);
            border: 1px solid rgba(124, 58, 237, 0.15);
            border-radius: 20px;
            box-shadow: 0 20px 60px rgba(11, 19, 32, 0.15);
            overflow: hidden;
            backdrop-filter: blur(8px);
        }

        .login-card-body {
            padding: 2.5rem;
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-label {
            display: block;
            font-weight: 600;
            color: var(--brand-950);
            margin-bottom: 0.7rem;
            font-size: 0.95rem;
        }

        .form-input {
            width: 100%;
            padding: 0.75rem 1rem;
            border: 1.5px solid rgba(148, 163, 184, 0.4);
            border-radius: 12px;
            font-size: 1rem;
            transition: all 0.3s ease;
            background-color: rgba(255, 255, 255, 0.98);
        }

        .form-input:focus {
            outline: none;
            border-color: var(--accent-600);
            box-shadow: 0 0 0 3px rgba(124, 58, 237, 0.1);
            background-color: rgba(243, 232, 255, 0.3);
        }

        .btn-login {
            width: 100%;
            padding: 0.85rem 1.5rem;
            background: linear-gradient(135deg, var(--accent-600), var(--accent-800));
            border: none;
            color: white;
            font-weight: 700;
            border-radius: 12px;
            font-size: 1rem;
            box-shadow: 0 12px 30px rgba(124, 58, 237, 0.3);
            transition: all 0.3s ease;
            cursor: pointer;
            margin-top: 0.5rem;
        }

        .btn-login:hover {
            transform: translateY(-2px);
            box-shadow: 0 18px 40px rgba(124, 58, 237, 0.4);
            background: linear-gradient(135deg, var(--accent-700), #3b0f5c);
            color: white;
        }

        .btn-signup {
            width: 100%;
            padding: 0.85rem 1.5rem;
            background: rgba(255, 255, 255, 0.9);
            border: 1.5px solid rgba(124, 58, 237, 0.3);
            color: var(--accent-600);
            font-weight: 700;
            border-radius: 12px;
            font-size: 1rem;
            transition: all 0.3s ease;
            cursor: pointer;
            text-decoration: none;
            display: block;
            text-align: center;
        }

        .btn-signup:hover {
            background: var(--accent-100);
            border-color: var(--accent-600);
            color: var(--accent-700);
            transform: translateY(-2px);
        }

        .login-footer {
            text-align: center;
            padding: 1.5rem 2.5rem;
            border-top: 1px solid rgba(124, 58, 237, 0.1);
            background: rgba(243, 232, 255, 0.3);
        }

        .admin-link {
            display: inline-block;
            margin-top: 1rem;
            color: var(--brand-500);
            text-decoration: none;
            font-size: 0.9rem;
            transition: color 0.3s ease;
        }

        .admin-link:hover {
            color: var(--accent-600);
        }

        .alert-error {
            background: rgba(220, 38, 38, 0.1);
            border: 1.5px solid rgba(220, 38, 38, 0.3);
            color: #991b1b;
            border-radius: 12px;
            padding: 1rem;
            margin-bottom: 1.5rem;
            font-size: 0.95rem;
            animation: slideDown 0.3s ease-out;
        }

        @keyframes slideDown {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>
<body>
    <div class="login-container page-shell">
        <div class="login-content">
            <div class="login-header">
                <div class="login-brand">S4</div>
                <h1>Bienvenue</h1>
                <p>Connecte-toi pour accéder à ton tableau de bord</p>
            </div>

            <?php if (isset($error)): ?>
                <div class="alert-error">
                    🚨 <?= esc($error) ?>
                </div>
            <?php endif ?>

            <div class="login-card">
                <form action="/user/login" method="post" class="login-card-body">
                    <?= csrf_field() ?>
                    
                    <div class="form-group">
                        <label for="email" class="form-label">Adresse Email</label>
                        <input type="email" class="form-input" name="email" id="email" placeholder="nom@email.com" required>
                    </div>

                    <div class="form-group">
                        <label for="password" class="form-label">Mot de passe</label>
                        <input type="password" class="form-input" name="password" id="password" placeholder="••••••••" required>
                    </div>

                    <button type="submit" class="btn-login">Se Connecter</button>
                </form>

                <div class="login-footer">
                    <a href="/user/redirectinscription" class="btn-signup">Créer un compte</a>
                    <a href="/redirectadmin" class="admin-link">Accès Administrateur</a>
                </div>
            </div>
        </div>
    </div>

    <script src="/assets/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>