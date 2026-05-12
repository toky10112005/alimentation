<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Complétez votre profil - NutriLife</title>

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
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
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

        .container-profile {
            max-width: 900px;
            margin: 0 auto;
            padding: 0 2rem;
            position: relative;
            z-index: 2;
            margin-top: 5rem;
        }

        .profile-form-wrapper {
            background: white;
            border-radius: 2rem;
            padding: 3rem;
            box-shadow: 0 20px 60px rgba(15, 118, 110, 0.1);
        }

        .profile-header {
            text-align: center;
            margin-bottom: 2.5rem;
        }

        .profile-header .logo {
            font-size: 2.5rem;
            color: var(--accent);
            margin-bottom: 0.8rem;
        }

        .profile-header h2 {
            font-size: 1.8rem;
            font-weight: 700;
            color: var(--text-dark);
            margin-bottom: 0.5rem;
        }

        .profile-header p {
            color: var(--text-light);
        }

        .progress-bar-wrapper {
            margin-bottom: 2rem;
            display: flex;
            gap: 1rem;
            justify-content: space-around;
        }

        .step-indicator {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 0.5rem;
        }

        .step-circle {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: #E5E7EB;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            color: var(--text-light);
        }

        .step-circle.active {
            background: linear-gradient(135deg, var(--primary) 0%, var(--primary-light) 100%);
            color: white;
        }

        .step-label {
            font-size: 0.85rem;
            color: var(--text-light);
            font-weight: 600;
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

        .form-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 1.5rem;
        }

        .btn-submit {
            padding: 1rem 2rem;
            background: linear-gradient(135deg, var(--primary) 0%, var(--primary-light) 100%);
            color: white;
            border: none;
            border-radius: 0.75rem;
            font-weight: 700;
            font-size: 1rem;
            cursor: pointer;
            transition: all 0.3s;
            box-shadow: 0 4px 15px rgba(15, 118, 110, 0.3);
        }

        .btn-submit:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(15, 118, 110, 0.4);
        }

        .btn-back {
            padding: 1rem 2rem;
            background: white;
            color: var(--primary);
            border: 2px solid var(--primary);
            border-radius: 0.75rem;
            font-weight: 700;
            font-size: 1rem;
            cursor: pointer;
            transition: all 0.3s;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
        }

        .btn-back:hover {
            background: var(--primary);
            color: white;
        }

        .buttons-wrapper {
            display: flex;
            gap: 1rem;
            margin-top: 2rem;
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

        @media (max-width: 768px) {
            .container-profile {
                margin-top: 4rem;
            }

            .profile-form-wrapper {
                padding: 2rem;
            }

            .form-grid {
                grid-template-columns: 1fr;
            }

            .buttons-wrapper {
                flex-direction: column;
            }

            .btn-submit,
            .btn-back {
                width: 100%;
                justify-content: center;
            }

            body::before {
                display: none;
            }

            .progress-bar-wrapper {
                flex-wrap: wrap;
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

    <div class="container-profile">
        <div class="profile-form-wrapper">
            <div class="profile-header">
                <div class="logo">
                    <i class="bi bi-heart-pulse-fill"></i>
                </div>
                <h2>Complétez votre profil</h2>
                <p>Ces informations nous aident à estimer vos besoins nutritionnels</p>
            </div>

            <!-- Progress -->
            <div class="progress-bar-wrapper">
                <div class="step-indicator">
                    <div class="step-circle active">1</div>
                    <div class="step-label">Inscription</div>
                </div>
                <div style="flex: 1; align-self: center; height: 2px; background: #E5E7EB;"></div>
                <div class="step-indicator">
                    <div class="step-circle active">2</div>
                    <div class="step-label">Profil</div>
                </div>
                <div style="flex: 1; align-self: center; height: 2px; background: #E5E7EB;"></div>
                <div class="step-indicator">
                    <div class="step-circle">3</div>
                    <div class="step-label">Objectifs</div>
                </div>
            </div>

            <!-- Erreurs -->
            <?php if (isset($errors)): ?>
                <div class="alert-error">
                    <i class="bi bi-exclamation-circle"></i>
                    <div>
                        <strong>Erreur!</strong>
                        <?php foreach ($errors as $error): ?>
                            <div><?= esc($error) ?></div>
                        <?php endforeach; ?>
                    </div>
                </div>
            <?php endif; ?>

            <!-- Profile Form -->
            <form action="<?= base_url('user/put') ?>" method="post">
                <?= csrf_field() ?>

                <div class="form-grid">
                    <div class="form-group">
                        <label class="form-label">
                            <i class="bi bi-ruler"></i> Taille (cm)
                        </label>
                        <input 
                            type="number" 
                            class="form-control" 
                            name="taille" 
                            placeholder="ex: 170"
                            min="100"
                            max="250"
                            step="1"
                            required
                        >
                    </div>

                    <div class="form-group">
                        <label class="form-label">
                            <i class="bi bi-weight"></i> Poids actuel (kg)
                        </label>
                        <input 
                            type="number" 
                            class="form-control" 
                            name="poids" 
                            placeholder="ex: 75"
                            min="20"
                            max="300"
                            step="0.1"
                            required
                        >
                    </div>
                </div>

                <div class="form-group">
                    <label class="form-label">
                        <i class="bi bi-target"></i> Votre objectif principal
                    </label>
                    <select class="form-select" name="objectif_type" required>
                        <option value="">Sélectionnez votre objectif</option>
                        <?php if (isset($objectifs)): ?>
                            <?php foreach ($objectifs as $objectif): ?>
                                <option value="<?= esc($objectif['id']) ?>">
                                    <?= esc($objectif['name'] ?? 'Objectif inconnu') ?>
                                </option>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </select>
                </div>

                <div class="form-group">
                    <label class="form-label">
                        <i class="bi bi-target"></i> Poids cible (kg)
                    </label>
                    <input 
                        type="number" 
                        class="form-control" 
                        name="poids_cible" 
                        placeholder="ex: 65"
                        min="20"
                        max="300"
                        step="0.1"
                        required
                    >
                </div>

                <div class="buttons-wrapper">
                    <button type="submit" class="btn-submit">
                        <i class="bi bi-check-circle"></i> Terminer l'inscription
                    </button>
                    <a href="<?= base_url('user/register') ?>" class="btn-back">
                        <i class="bi bi-arrow-left"></i> Retour
                    </a>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>