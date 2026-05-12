<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>S'inscrire - NutriLife</title>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    
    <style>
        :root {
            --primary: #0F766E;
            --primary-light: #14B8A6;
            --accent: #F59E0B;
            --text-dark: #1F2937;
            --text-light: #6B7280;
            --bg-light: #F9FAFB;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
            background: linear-gradient(135deg, #F9FAFB 0%, #ECFDF5 50%, #FFFBEB 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            padding: 2rem 0;
            position: relative;
            overflow-x: hidden;
        }

        body::before {
            content: '';
            position: absolute;
            top: -30%;
            right: -10%;
            width: 700px;
            height: 700px;
            background: radial-gradient(circle, rgba(20, 184, 166, 0.2) 0%, transparent 70%);
            border-radius: 50%;
            z-index: 0;
            animation: float 8s ease-in-out infinite;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-30px); }
        }

        .navbar-top {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            padding: 1rem 2rem;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
            z-index: 100;
        }

        .navbar-brand {
            font-size: 1.5rem;
            font-weight: 800;
            color: var(--primary);
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .navbar-brand i {
            color: var(--accent);
        }

        .container-signup {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 2rem;
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 3rem;
            align-items: center;
            position: relative;
            z-index: 2;
            margin-top: 5rem;
        }

        .signup-form-wrapper {
            background: white;
            border-radius: 2rem;
            padding: 3rem;
            box-shadow: 0 20px 60px rgba(15, 118, 110, 0.1);
        }

        .signup-header {
            text-align: center;
            margin-bottom: 2.5rem;
        }

        .signup-header .logo {
            font-size: 2.5rem;
            color: var(--accent);
            margin-bottom: 0.8rem;
        }

        .signup-header h2 {
            font-size: 1.8rem;
            font-weight: 700;
            color: var(--text-dark);
            margin-bottom: 0.5rem;
        }

        .signup-header p {
            color: var(--text-light);
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-label {
            display: block;
            font-weight: 600;
            color: var(--text-dark);
            margin-bottom: 0.7rem;
            font-size: 0.95rem;
        }

        .form-control,
        .form-select {
            width: 100%;
            padding: 0.9rem 1.2rem;
            border: 2px solid #E5E7EB;
            border-radius: 0.75rem;
            font-size: 1rem;
            transition: all 0.3s ease;
            font-family: inherit;
            background: white;
            color: var(--text-dark);
        }

        .form-control:focus,
        .form-select:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(15, 118, 110, 0.1);
        }

        .form-check {
            display: flex;
            align-items: center;
            margin-bottom: 1rem;
        }

        .form-check-input {
            width: 18px;
            height: 18px;
            margin-right: 0.7rem;
            cursor: pointer;
            accent-color: var(--primary);
            border: 2px solid #E5E7EB;
            border-radius: 0.35rem;
        }

        .form-check-label {
            cursor: pointer;
            color: var(--text-light);
            margin: 0;
            font-size: 0.95rem;
        }

        .btn-submit {
            width: 100%;
            padding: 1rem;
            background: linear-gradient(135deg, var(--primary) 0%, var(--primary-light) 100%);
            color: white;
            border: none;
            border-radius: 0.75rem;
            font-weight: 700;
            font-size: 1rem;
            cursor: pointer;
            transition: all 0.3s;
            box-shadow: 0 4px 15px rgba(15, 118, 110, 0.3);
            margin-bottom: 1rem;
        }

        .btn-submit:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(15, 118, 110, 0.4);
        }

        .btn-cancel {
            width: 100%;
            padding: 1rem;
            background: white;
            color: var(--primary);
            border: 2px solid var(--primary);
            border-radius: 0.75rem;
            font-weight: 700;
            font-size: 1rem;
            cursor: pointer;
            transition: all 0.3s;
            text-decoration: none;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
        }

        .btn-cancel:hover {
            background: var(--primary);
            color: white;
        }

        .login-link {
            text-align: center;
            margin-top: 1.5rem;
            padding-top: 1.5rem;
            border-top: 1px solid #E5E7EB;
            color: var(--text-light);
        }

        .login-link a {
            color: var(--primary);
            text-decoration: none;
            font-weight: 700;
        }

        .signup-image {
            display: flex;
            flex-direction: column;
            gap: 2rem;
        }

        .signup-image img {
            width: 100%;
            border-radius: 2rem;
            box-shadow: 0 20px 60px rgba(15, 118, 110, 0.15);
            animation: slideInRight 0.8s ease-out 0.2s both;
        }

        @keyframes slideInRight {
            from {
                opacity: 0;
                transform: translateX(50px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        .signup-features {
            background: linear-gradient(135deg, rgba(15, 118, 110, 0.05) 0%, rgba(245, 158, 11, 0.05) 100%);
            border-radius: 1.5rem;
            padding: 1.5rem;
        }

        .signup-features h4 {
            color: var(--text-dark);
            margin-bottom: 1rem;
            font-weight: 700;
        }

        .feature-item {
            display: flex;
            align-items: center;
            gap: 0.8rem;
            margin-bottom: 0.8rem;
            color: var(--text-light);
        }

        .feature-item i {
            color: var(--primary);
            font-weight: 700;
        }

        .alert-error {
            background: #FEE2E2;
            border: 1px solid #FECACA;
            color: #991B1B;
            padding: 1rem;
            border-radius: 0.75rem;
            margin-bottom: 1.5rem;
            display: flex;
            gap: 0.8rem;
        }

        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1rem;
        }

        @media (max-width: 768px) {
            .container-signup {
                grid-template-columns: 1fr;
                margin-top: 4rem;
            }

            .signup-image {
                display: none;
            }

            .signup-form-wrapper {
                padding: 2rem;
            }

            body::before {
                display: none;
            }

            .form-row {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <div class="navbar-top">
        <a href="/" class="navbar-brand">
            <i class="bi bi-leaf-fill"></i>
            <span>NutriLife</span>
        </a>
    </div>

    <div class="container-signup">
        <!-- Form Column -->
        <div class="signup-form-wrapper">
            <div class="signup-header">
                <div class="logo">
                    <i class="bi bi-person-plus-fill"></i>
                </div>
                <h2>Créer votre compte</h2>
                <p>Commencez votre transformation nutritionnelle dès aujourd'hui</p>
            </div>

            <!-- Erreurs -->
            <?php if (isset($errors)): ?>
                <div class="alert-error">
                    <i class="bi bi-exclamation-circle"></i>
                    <div>
                        <strong>Erreur d'inscription!</strong>
                        <?php foreach ($errors as $error): ?>
                            <div><?= esc($error) ?></div>
                        <?php endforeach; ?>
                    </div>
                </div>
            <?php endif; ?>

            <!-- Inscription Form -->
            <form action="<?= base_url('user/inscription') ?>" method="post">
                <?= csrf_field() ?>

                <!-- Nom d'utilisateur -->
                <div class="form-group">
                    <label class="form-label">Nom d'utilisateur</label>
                    <input 
                        type="text" 
                        class="form-control" 
                        name="username" 
                        placeholder="ex: Rakoto"
                        required
                    >
                </div>

                <!-- Email -->
                <div class="form-group">
                    <label class="form-label">Adresse Email</label>
                    <input 
                        type="email" 
                        class="form-control" 
                        name="email" 
                        placeholder="ex: nom@email.com"
                        required
                    >
                </div>

                <!-- Mot de passe -->
                <div class="form-group">
                    <label class="form-label">Mot de passe</label>
                    <input 
                        type="password" 
                        class="form-control" 
                        name="password" 
                        placeholder="••••••••"
                        required
                    >
                </div>

                <!-- Genre -->
                <div class="form-group">
                    <label class="form-label">Genre</label>
                    <select class="form-select" name="genre" required>
                        <option value="">Sélectionnez votre genre</option>
                        <option value="Homme">Homme</option>
                        <option value="Femme">Femme</option>
                        <option value="Autre">Autre</option>
                    </select>
                </div>

                <!-- Terms -->
                <div class="form-check">
                    <input 
                        type="checkbox" 
                        class="form-check-input" 
                        id="terms" 
                        name="terms"
                        required
                    >
                    <label class="form-check-label" for="terms">
                        J'accepte les conditions d'utilisation et la politique de confidentialité
                    </label>
                </div>

                <!-- Buttons -->
                <button type="submit" class="btn-submit">
                    <i class="bi bi-play-fill"></i> S'inscrire
                </button>
                <a href="/" class="btn-cancel">
                    <i class="bi bi-arrow-left"></i> Retour
                </a>
            </form>

            <!-- Login Link -->
            <div class="login-link">
                Vous avez déjà un compte? 
                <a href="<?= base_url('user/login') ?>">Se connecter</a>
            </div>
        </div>

        <!-- Image Column -->
        <div class="signup-image">
            <img src="<?= base_url('images/r2.jpeg') ?>" alt="Inscription NutriLife">
            
            <div class="signup-features">
                <h4>Pourquoi s'inscrire?</h4>
                <div class="feature-item">
                    <i class="bi bi-check-circle-fill"></i>
                    <span>Accès illimité aux régimes</span>
                </div>
                <div class="feature-item">
                    <i class="bi bi-check-circle-fill"></i>
                    <span>Suivi personnalisé</span>
                </div>
                <div class="feature-item">
                    <i class="bi bi-check-circle-fill"></i>
                    <span>Communauté active</span>
                </div>
                <div class="feature-item">
                    <i class="bi bi-check-circle-fill"></i>
                    <span>Support prioritaire</span>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>