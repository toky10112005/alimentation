<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $this->renderSection('title') ?? 'NutriLife - Gestion Alimentaire Premium' ?></title>
    <meta name="description" content="<?= $this->renderSection('meta_description') ?? 'Transformez votre alimentation avec nos programmes personnalisés premium de nutrition et fitness.' ?>">
    
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- CSS Global -->
    <link href="<?= base_url('assets/css/style.css') ?>" rel="stylesheet">
    
    <?= $this->renderSection('extra_css') ?>
</head>
<body>
    <style>
        /* Navbar Amélioré */
        .navbar-premium {
            border-bottom: 3px solid #0F766E !important;
            box-shadow: 0 2px 12px rgba(15, 118, 110, 0.1) !important;
            padding: 0.5rem 0;
        }

        .navbar-brand {
            font-size: 1.3rem;
            letter-spacing: -0.5px;
        }

        .nav-link-premium {
            transition: all 0.3s ease;
            position: relative;
            padding-bottom: 0.3rem;
            padding-top: 0.3rem;
            font-size: 0.95rem;
        }

        .nav-link-premium::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 0;
            height: 2px;
            background: linear-gradient(90deg, #0F766E, #14B8A6);
            transition: width 0.3s ease;
        }

        .nav-link-premium:hover::after {
            width: 100%;
        }

        /* Footer Amélioré */
        .footer-premium {
            background: #1F2937 !important;
            position: relative;
            overflow: hidden;
            margin-top: 5rem;
            padding-top: 3rem !important;
            padding-bottom: 1.5rem;
        }

        .footer-premium::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 3px;
            background: linear-gradient(90deg, transparent, #F59E0B, transparent);
        }

        .footer-premium h5,
        .footer-premium h6 {
            letter-spacing: 0.5px;
        }

        .footer-premium a {
            transition: all 0.3s ease;
        }

        .footer-premium a:hover {
            color: #F59E0B !important;
            transform: translateX(4px);
        }

        .footer-premium .social-links a {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 40px;
            height: 40px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            transition: all 0.3s ease;
            transform: translateX(0);
        }

        .footer-premium .social-links a:hover {
            background: #F59E0B;
            transform: translateY(-3px);
        }

        /* Hero sections */
        .regimes-hero,
        .details-hero,
        .wallet-hero {
            background: linear-gradient(135deg, rgba(15, 118, 110, 0.08) 0%, rgba(245, 158, 11, 0.04) 100%);
            padding: 2.5rem 0;
            margin-bottom: 2.5rem;
            border-bottom: 2px solid rgba(15, 118, 110, 0.1);
        }

        .regimes-hero h1,
        .details-hero h1,
        .wallet-hero h1 {
            font-size: 2rem;
            font-weight: 800;
            color: #1F2937;
            margin-bottom: 0.3rem;
        }

        .regimes-hero p,
        .details-hero p,
        .wallet-hero p {
            color: #6B7280;
            font-size: 0.95rem;
        }

        @media (max-width: 768px) {
            .regimes-hero h1,
            .details-hero h1,
            .wallet-hero h1 {
                font-size: 1.5rem;
            }

            .regimes-hero,
            .details-hero,
            .wallet-hero {
                padding: 1.5rem 0;
            }
        }
    </style>
    <!-- Navbar Sticky Moderne -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white sticky-top navbar-premium">
        <div class="container">
            <a class="navbar-brand fw-bold" href="<?= base_url() ?>" style="color: #0F766E !important;">
                <i class="bi bi-leaf-fill me-2" style="color: #F59E0B;"></i>
                <span class="brand-text">NutriLife</span>
            </a>
            
            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto gap-2">
                    <li class="nav-item">
                        <a class="nav-link nav-link-premium" href="<?= base_url() ?>" style="color: #1F2937; font-weight: 500;">Accueil</a>
                    </li>
                    
                    <?php if (session()->get('user_id')): ?>
                        <li class="nav-item">
                            <a class="nav-link nav-link-premium" href="<?= base_url('objectif') ?>" style="color: #1F2937; font-weight: 500;">Régimes</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link nav-link-premium" href="<?= base_url('mes-regimes') ?>" style="color: #1F2937; font-weight: 500;">Mes Régimes</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link nav-link-premium" href="<?= base_url('portefeuille') ?>" style="color: #1F2937; font-weight: 500;">
                                <i class="bi bi-wallet2 me-1" style="color: #0F766E;"></i>Portefeuille
                            </a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle nav-link-premium" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="color: #1F2937; font-weight: 500;">
                                <i class="bi bi-person-circle" style="color: #0F766E;"></i> Compte
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                                <li><a class="dropdown-item" href="<?= base_url('user/logout') ?>"><i class="bi bi-box-arrow-right me-2" style="color: #0F766E;"></i>Déconnexion</a></li>
                            </ul>
                        </li>
                    <?php else: ?>
                        <li class="nav-item">
                            <a class="nav-link nav-link-premium" href="<?= base_url('user/login') ?>" style="color: #1F2937; font-weight: 500;">Connexion</a>
                        </li>
                        <li class="nav-item">
                            <a class="btn btn-sm" href="<?= base_url('user/register') ?>" style="background: linear-gradient(135deg, #0F766E 0%, #14B8A6 100%); color: white; border: none; font-weight: 600; transition: all 0.3s; box-shadow: 0 4px 12px rgba(15, 118, 110, 0.25);">S'inscrire</a>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Contenu Principal -->
    <main class="main-content">
        <?= $this->renderSection('content') ?>
    </main>

    <!-- Footer Premium -->
    <footer class="footer-premium">
        <div class="container">
            <div class="row mb-5">
                <!-- À Propos -->
                <div class="col-md-3 mb-4 mb-md-0">
                    <h5 class="fw-bold mb-3">
                        <i class="bi bi-leaf-fill me-2" style="color: #FCD34D;"></i>NutriLife
                    </h5>
                    <p class="text-white small mb-3" style="opacity: 0.95; line-height: 1.6;">
                        La plateforme premium de gestion alimentaire et nutrition pour transformer votre mode de vie.
                    </p>
                    <div class="social-links">
                        <a href="#" class="text-white me-3 text-decoration-none" title="Facebook"><i class="bi bi-facebook"></i></a>
                        <a href="#" class="text-white me-3 text-decoration-none" title="Twitter"><i class="bi bi-twitter"></i></a>
                        <a href="#" class="text-white me-3 text-decoration-none" title="Instagram"><i class="bi bi-instagram"></i></a>
                        <a href="#" class="text-white text-decoration-none" title="LinkedIn"><i class="bi bi-linkedin"></i></a>
                    </div>
                </div>

                <!-- Produit -->
                <div class="col-md-3 mb-4 mb-md-0">
                    <h6 class="fw-bold mb-3" style="color: #FCD34D; text-transform: uppercase; letter-spacing: 0.5px; font-size: 0.95rem;">Produit</h6>
                    <ul class="list-unstyled small">
                        <li class="mb-2"><a href="<?= base_url() ?>" class="text-decoration-none footer-link" style="color: rgba(255,255,255,0.85);">Accueil</a></li>
                        <?php if (session()->get('user_id')): ?>
                            <li class="mb-2"><a href="<?= base_url('objectif') ?>" class="text-decoration-none footer-link" style="color: rgba(255,255,255,0.85);">Régimes</a></li>
                            <li class="mb-2"><a href="<?= base_url('mes-regimes') ?>" class="text-decoration-none footer-link" style="color: rgba(255,255,255,0.85);">Mes Régimes</a></li>
                            <li class="mb-2"><a href="<?= base_url('portefeuille') ?>" class="text-decoration-none footer-link" style="color: rgba(255,255,255,0.85);">Portefeuille</a></li>
                        <?php endif; ?>
                    </ul>
                </div>

                <!-- À Propos -->
                <div class="col-md-3 mb-4 mb-md-0">
                    <h6 class="fw-bold mb-3" style="color: #FCD34D; text-transform: uppercase; letter-spacing: 0.5px; font-size: 0.95rem;">Informations</h6>
                    <ul class="list-unstyled small">
                        <li class="mb-2"><a href="#" class="text-decoration-none footer-link" style="color: rgba(255,255,255,0.85);">À Propos</a></li>
                        <li class="mb-2"><a href="#" class="text-decoration-none footer-link" style="color: rgba(255,255,255,0.85);">Conditions d'utilisation</a></li>
                        <li class="mb-2"><a href="#" class="text-decoration-none footer-link" style="color: rgba(255,255,255,0.85);">Politique de confidentialité</a></li>
                        <li class="mb-2"><a href="#" class="text-decoration-none footer-link" style="color: rgba(255,255,255,0.85);">Contact</a></li>
                    </ul>
                </div>

                <!-- Contact -->
                <div class="col-md-3">
                    <h6 class="fw-bold mb-3" style="color: #FCD34D; text-transform: uppercase; letter-spacing: 0.5px; font-size: 0.95rem;">Contact</h6>
                    <div class="mb-3">
                        <p class="text-white small mb-2" style="opacity: 0.95;">
                            <i class="bi bi-envelope me-2" style="color: #FCD34D;"></i>
                            <a href="mailto:contact@nutrilife.fr" class="text-decoration-none" style="color: rgba(255,255,255,0.85);">contact@nutrilife.fr</a>
                        </p>
                        <p class="text-white small" style="opacity: 0.95;">
                            <i class="bi bi-telephone me-2" style="color: #FCD34D;"></i>
                            <a href="tel:+33101234567" class="text-decoration-none" style="color: rgba(255,255,255,0.85);">+33 (0)1 23 45 67 89</a>
                        </p>
                    </div>
                </div>
            </div>

            <div style="border-top: 1px solid rgba(252, 211, 77, 0.2); padding-top: 2rem;">
                <!-- Copyright -->
                <div class="row py-3 align-items-center">
                    <div class="col-md-6">
                        <p class="text-white small mb-0" style="opacity: 0.85;">
                            &copy; 2026 <strong>NutriLife</strong>. Tous droits réservés.
                        </p>
                    </div>
                    <div class="col-md-6 text-md-end">
                        <p class="text-white small mb-0" style="opacity: 0.85;">
                            Fait avec <i class="bi bi-heart-fill" style="color: #FCD34D;"></i> pour votre santé
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- Bouton Retour en Haut -->
    <button id="backToTop" class="btn btn-success btn-circle back-to-top d-none">
        <i class="bi bi-chevron-up"></i>
    </button>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- JS Global -->
    <script src="<?= base_url('assets/js/main.js') ?>"></script>
    
    <?= $this->renderSection('extra_js') ?>
</body>
</html>
