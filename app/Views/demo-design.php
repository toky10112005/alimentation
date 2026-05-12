<!-- ============================================
     DEMO PAGE - Voir les améliorations de design
     ============================================ 

Pour voir cette démo, ajoutez cette route à app/Config/Routes.php:
$routes->get('/demo/design', 'Home::designDemo');

Puis créez app/Views/demo.php

-->

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NutriLife - Démo Design Amélioré</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&family=Inter:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">
    <style>
        .demo-section {
            padding: 4rem 0;
            border-top: 1px solid var(--border-color);
        }
        .demo-title {
            font-size: 2rem;
            font-weight: 700;
            margin-bottom: 2rem;
            color: var(--primary-color);
        }
        .demo-subtitle {
            font-size: 1rem;
            color: var(--text-muted);
            margin-bottom: 3rem;
        }
        .demo-code {
            background: #f5f5f5;
            border-left: 4px solid var(--primary-color);
            padding: 1rem;
            border-radius: 0.5rem;
            overflow-x: auto;
            font-size: 0.85rem;
            margin-top: 1rem;
            font-family: 'Courier New', monospace;
        }
    </style>
</head>
<body>
    <!-- ============================================
         HEADER
         ============================================ -->
    <nav class="navbar navbar-expand-lg navbar-premium sticky-top">
        <div class="container">
            <a class="navbar-brand brand-text" href="<?= base_url() ?>">
                <i class="bi bi-heart-pulse"></i> NutriLife
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link active" href="#">Accueil</a></li>
                    <li class="nav-item"><a class="nav-link" href="#backgrounds">Backgrounds</a></li>
                    <li class="nav-item"><a class="nav-link" href="#glassmorphism">Glassmorphism</a></li>
                    <li class="nav-item"><a class="nav-link" href="#animations">Animations</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- ============================================
         HERO
         ============================================ -->
    <section class="hero-section">
        <div class="container">
            <div class="hero-content">
                <h1 class="hero-title">Améliorations de Design</h1>
                <p class="hero-subtitle">
                    Découvrez les effets visuels modernes, les backgrounds animés, et les micro-animations qui font de NutriLife une expérience premium
                </p>
                <div class="hero-cta">
                    <a href="<?= base_url() ?>" class="btn-primary-premium">
                        <i class="bi bi-house-fill"></i> Retour à l'Accueil
                    </a>
                    <a href="#backgrounds" class="btn-secondary-premium">
                        <i class="bi bi-arrow-down"></i> Voir la Démo
                    </a>
                </div>
            </div>
        </div>
    </section>

    <main class="container py-5">
        <!-- ============================================
             SECTION BACKGROUNDS
             ============================================ -->
        <section class="demo-section" id="backgrounds">
            <h2 class="demo-title">
                <i class="bi bi-image"></i> Backgrounds SVG Patterns
            </h2>
            <p class="demo-subtitle">
                Patterns SVG intégrés directement en CSS pour des performances optimales
            </p>

            <div class="row g-4">
                <div class="col-lg-6">
                    <div class="card-premium bg-pattern-dots" style="height: 300px; display: flex; align-items: center; justify-content: center;">
                        <div class="text-center">
                            <h4>Pattern Dots</h4>
                            <p class="text-muted">.bg-pattern-dots</p>
                        </div>
                    </div>
                    <div class="demo-code">
&lt;div class="card-premium bg-pattern-dots"&gt;
    Contenu avec motif pointillé
&lt;/div&gt;
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="card-premium bg-pattern-grid" style="height: 300px; display: flex; align-items: center; justify-content: center;">
                        <div class="text-center">
                            <h4>Pattern Grid</h4>
                            <p class="text-muted">.bg-pattern-grid</p>
                        </div>
                    </div>
                    <div class="demo-code">
&lt;div class="card-premium bg-pattern-grid"&gt;
    Contenu avec grille
&lt;/div&gt;
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="card-premium bg-pattern-waves" style="height: 300px; display: flex; align-items: center; justify-content: center;">
                        <div class="text-center">
                            <h4>Pattern Waves</h4>
                            <p class="text-muted">.bg-pattern-waves</p>
                        </div>
                    </div>
                    <div class="demo-code">
&lt;div class="card-premium bg-pattern-waves"&gt;
    Contenu avec vagues
&lt;/div&gt;
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="card-premium bg-pattern-mesh" style="height: 300px; display: flex; align-items: center; justify-content: center;">
                        <div class="text-center">
                            <h4>Pattern Mesh</h4>
                            <p class="text-muted">.bg-pattern-mesh</p>
                        </div>
                    </div>
                    <div class="demo-code">
&lt;div class="card-premium bg-pattern-mesh"&gt;
    Contenu avec mesh gradient
&lt;/div&gt;
                    </div>
                </div>
            </div>
        </section>

        <!-- ============================================
             SECTION GLASSMORPHISM
             ============================================ -->
        <section class="demo-section" id="glassmorphism">
            <h2 class="demo-title">
                <i class="bi bi-window"></i> Glassmorphism Effects
            </h2>
            <p class="demo-subtitle">
                Effets de vitre gelée avec backdrop-filter, parfait pour les couches d'interface modernes
            </p>

            <div class="row g-4">
                <div class="col-md-6 col-lg-3">
                    <div class="card-premium">
                        <div class="card-icon">
                            <i class="bi bi-lightning-fill"></i>
                        </div>
                        <h5>Carte Premium</h5>
                        <p class="text-muted">Passez la souris pour voir l'effet</p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3">
                    <div class="feature-box">
                        <h5>Feature Box</h5>
                        <p class="text-muted">Autre style de glassmorphism</p>
                        <i class="bi bi-star-fill" style="font-size: 2rem; color: var(--secondary-color);"></i>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3">
                    <div class="glass-effect" style="padding: 2rem; text-align: center;">
                        <h5>Glass Effect</h5>
                        <p class="text-muted">Classe réutilisable</p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3">
                    <div class="card-premium" style="background: rgba(34, 197, 94, 0.1); border-color: var(--primary-color);">
                        <h5>Variant Colored</h5>
                        <p class="text-muted">Version colorée</p>
                    </div>
                </div>
            </div>

            <div class="demo-code mt-4">
&lt;div class="card-premium"&gt;
    &lt;div class="card-icon"&gt;&lt;i class="bi bi-star"&gt;&lt;/i&gt;&lt;/div&gt;
    &lt;h5&gt;Titre&lt;/h5&gt;
    &lt;p&gt;Description&lt;/p&gt;
&lt;/div&gt;
            </div>
        </section>

        <!-- ============================================
             SECTION BUTTONS
             ============================================ -->
        <section class="demo-section">
            <h2 class="demo-title">
                <i class="bi bi-hand-index"></i> Buttons with Animations
            </h2>
            <p class="demo-subtitle">
                Boutons interactifs avec ripple effect et animations au clic
            </p>

            <div class="row g-3">
                <div class="col-md-4">
                    <button class="btn-primary-premium w-100">
                        <i class="bi bi-play-fill"></i> Bouton Primary
                    </button>
                </div>
                <div class="col-md-4">
                    <button class="btn-secondary-premium w-100">
                        <i class="bi bi-arrow-right"></i> Bouton Secondary
                    </button>
                </div>
                <div class="col-md-4">
                    <button class="btn-outline-premium w-100">
                        <i class="bi bi-heart"></i> Bouton Outline
                    </button>
                </div>
            </div>

            <div class="demo-code mt-4">
&lt;button class="btn-primary-premium"&gt;
    &lt;i class="bi bi-play-fill"&gt;&lt;/i&gt; Cliquez-moi
&lt;/button&gt;
            </div>
        </section>

        <!-- ============================================
             SECTION ANIMATIONS
             ============================================ -->
        <section class="demo-section" id="animations">
            <h2 class="demo-title">
                <i class="bi bi-film"></i> Micro-Animations
            </h2>
            <p class="demo-subtitle">
                Animations au scroll, parallax, et compteurs pour une expérience dynamique
            </p>

            <h4 class="mt-4 mb-3">Scroll Animations</h4>
            <div class="row g-4 mb-5">
                <div class="col-md-6 col-lg-3" data-animate="slide-in-up">
                    <div class="feature-box">
                        <i class="bi bi-check-circle-fill" style="font-size: 2rem; color: var(--primary-color);"></i>
                        <h5 class="mt-2">Slide In Up</h5>
                        <p class="text-muted">Entrée par le bas</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3" data-animate="slide-in-up">
                    <div class="feature-box">
                        <i class="bi bi-star-fill" style="font-size: 2rem; color: var(--secondary-color);"></i>
                        <h5 class="mt-2">Fade In</h5>
                        <p class="text-muted">Apparition douce</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3" data-animate="slide-in-up">
                    <div class="feature-box">
                        <i class="bi bi-lightning-fill" style="font-size: 2rem; color: #f59e0b;"></i>
                        <h5 class="mt-2">Slide In Left</h5>
                        <p class="text-muted">Entrée par la gauche</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3" data-animate="slide-in-up">
                    <div class="feature-box">
                        <i class="bi bi-heart-fill" style="font-size: 2rem; color: #ec4899;"></i>
                        <h5 class="mt-2">Slide In Right</h5>
                        <p class="text-muted">Entrée par la droite</p>
                    </div>
                </div>
            </div>

            <h4 class="mt-4 mb-3">Counter Animations (Compteurs Statistiques)</h4>
            <div class="row g-4">
                <div class="col-md-3 col-6">
                    <div class="stats-card">
                        <div class="stats-number" data-counter="1000">0+</div>
                        <div class="stats-label">Lignes CSS</div>
                    </div>
                </div>
                <div class="col-md-3 col-6">
                    <div class="stats-card">
                        <div class="stats-number" data-counter="290">0+</div>
                        <div class="stats-label">Lignes JS</div>
                    </div>
                </div>
                <div class="col-md-3 col-6">
                    <div class="stats-card">
                        <div class="stats-number" data-counter="8">0+</div>
                        <div class="stats-label">Animations</div>
                    </div>
                </div>
                <div class="col-md-3 col-6">
                    <div class="stats-card">
                        <div class="stats-number" data-counter="60">0%</div>
                        <div class="stats-label">FPS Target</div>
                    </div>
                </div>
            </div>

            <div class="demo-code mt-4">
&lt;div data-counter="1000"&gt;0+&lt;/div&gt;
&lt;!-- Comptera jusqu'à 1000 au scroll --&gt;
            </div>
        </section>

        <!-- ============================================
             SECTION UTILITIES
             ============================================ -->
        <section class="demo-section">
            <h2 class="demo-title">
                <i class="bi bi-tools"></i> Utilities & Classes
            </h2>
            <p class="demo-subtitle">
                Classes CSS utiles pour accélérer le développement
            </p>

            <div class="row g-4">
                <div class="col-md-6">
                    <h5>Text Gradient</h5>
                    <p class="text-gradient" style="font-size: 1.5rem; font-weight: 700;">
                        Texte avec gradient coloré
                    </p>
                    <div class="demo-code">
&lt;p class="text-gradient"&gt;Texte&lt;/p&gt;
                    </div>
                </div>

                <div class="col-md-6">
                    <h5>Badges</h5>
                    <div>
                        <span class="badge-primary-premium">Primary</span>
                        <span class="badge-secondary-premium">Secondary</span>
                    </div>
                    <div class="demo-code">
&lt;span class="badge-primary-premium"&gt;
    Badge
&lt;/span&gt;
                    </div>
                </div>

                <div class="col-md-6">
                    <h5>Divider</h5>
                    <p>Texte avant</p>
                    <div class="divider"></div>
                    <p>Texte après</p>
                    <div class="demo-code">
&lt;div class="divider"&gt;&lt;/div&gt;
                    </div>
                </div>

                <div class="col-md-6">
                    <h5>Glow Border</h5>
                    <div class="glow-border" style="padding: 2rem; text-align: center;">
                        Élément avec aura lumineuse
                    </div>
                    <div class="demo-code">
&lt;div class="glow-border"&gt;
    Contenu
&lt;/div&gt;
                    </div>
                </div>
            </div>
        </section>

        <!-- ============================================
             SECTION CODE
             ============================================ -->
        <section class="demo-section">
            <h2 class="demo-title">
                <i class="bi bi-code-slash"></i> CSS Variables
            </h2>
            <p class="demo-subtitle">
                Variables CSS personnalisables pour une cohérence de design
            </p>

            <div class="demo-code">
:root {
    --primary-color: #22c55e;
    --primary-dark: #16a34a;
    --primary-light: #86efac;
    --secondary-color: #f97316;
    --secondary-light: #fed7aa;
    --bg-light: #f9fafb;
    --bg-white: #ffffff;
    --text-dark: #1f2937;
    --text-muted: #6b7280;
    --border-color: #e5e7eb;
    --shadow-sm: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
    --shadow-md: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
    --shadow-lg: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
    --shadow-xl: 0 20px 25px -5px rgba(0, 0, 0, 0.1);
    --transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
}
            </div>
        </section>

        <!-- ============================================
             SECTION PERFORMANCE
             ============================================ -->
        <section class="demo-section">
            <h2 class="demo-title">
                <i class="bi bi-speedometer2"></i> Performance Metrics
            </h2>
            <p class="demo-subtitle">
                Optimisations pour une expérience utilisateur fluide
            </p>

            <div class="row g-4">
                <div class="col-md-4">
                    <div class="card-premium">
                        <h5><i class="bi bi-lightning"></i> SVG Inline</h5>
                        <p class="text-muted">0 HTTP requests supplémentaires pour les patterns</p>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card-premium">
                        <h5><i class="bi bi-gpu"></i> GPU Accelerated</h5>
                        <p class="text-muted">Animations CSS transforms pour 60 FPS</p>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card-premium">
                        <h5><i class="bi bi-eye"></i> Observer API</h5>
                        <p class="text-muted">Animations déclenchées au scroll viewport</p>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <!-- ============================================
         FOOTER
         ============================================ -->
    <footer class="footer-premium mt-5">
        <div class="container py-4">
            <div class="row g-4 mb-3">
                <div class="col-md-3">
                    <h6 class="footer-title">NutriLife</h6>
                    <p class="text-muted" style="font-size: 0.85rem;">Transformez votre alimentation avec nos programmes premium.</p>
                </div>
                <div class="col-md-3">
                    <h6 class="footer-title">Produit</h6>
                    <ul class="list-unstyled">
                        <li><a href="#" class="footer-link">Régimes</a></li>
                        <li><a href="#" class="footer-link">Recettes</a></li>
                        <li><a href="#" class="footer-link">Tarifs</a></li>
                    </ul>
                </div>
                <div class="col-md-3">
                    <h6 class="footer-title">Support</h6>
                    <ul class="list-unstyled">
                        <li><a href="#" class="footer-link">FAQ</a></li>
                        <li><a href="#" class="footer-link">Contact</a></li>
                        <li><a href="#" class="footer-link">Documentation</a></li>
                    </ul>
                </div>
                <div class="col-md-3">
                    <h6 class="footer-title">Social</h6>
                    <div>
                        <a href="#" class="footer-link me-3"><i class="bi bi-facebook"></i></a>
                        <a href="#" class="footer-link me-3"><i class="bi bi-twitter"></i></a>
                        <a href="#" class="footer-link"><i class="bi bi-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="divider"></div>
            <div class="text-center text-muted" style="font-size: 0.85rem;">
                <p>&copy; 2024 NutriLife. Tous droits réservés.</p>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url('assets/js/main.js') ?>"></script>
</body>
</html>
