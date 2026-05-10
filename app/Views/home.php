<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Alimentation Santé - Gestion d'Alimentation Intelligente</title>
    <link href="/assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="/assets/css/theme.css?v=5" rel="stylesheet">
    <link href="/assets/css/backgrounds.css" rel="stylesheet">
    <style>
        .hero-section {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(180deg, rgba(255, 255, 255, 0.95) 0%, rgba(248, 250, 252, 0.98) 50%, rgba(239, 242, 255, 0.95) 100%);
            background-image: 
                radial-gradient(circle at 20% 10%, rgba(124, 58, 237, 0.25), transparent 45%),
                radial-gradient(circle at 80% 0%, rgba(245, 158, 11, 0.2), transparent 40%),
                radial-gradient(circle at 80% 80%, rgba(168, 85, 247, 0.25), transparent 45%),
                url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%237c3aed' fill-opacity='0.04'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
            background-size: auto, auto, auto, 100px 100px;
            background-attachment: fixed;
            position: relative;
            overflow: hidden;
        }

        .hero-section::before {
            content: "";
            position: absolute;
            top: -50%;
            right: -10%;
            width: 600px;
            height: 600px;
            background: radial-gradient(circle, rgba(124, 58, 237, 0.3), transparent 70%);
            border-radius: 50%;
            animation: float 20s infinite ease-in-out;
        }

        .hero-section::after {
            content: "";
            position: absolute;
            bottom: -20%;
            left: -5%;
            width: 500px;
            height: 500px;
            background: radial-gradient(circle, rgba(245, 158, 11, 0.2), transparent 70%);
            border-radius: 50%;
            animation: float 25s infinite ease-in-out reverse;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(30px); }
        }

        .hero-content {
            position: relative;
            z-index: 2;
            text-align: center;
            max-width: 800px;
        }

        .hero-content h1 {
            font-size: 3.5rem;
            font-weight: 800;
            letter-spacing: -2px;
            margin-bottom: 1.5rem;
            background: linear-gradient(135deg, var(--accent-600), var(--accent-700));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            animation: fadeInUp 0.8s ease-out;
        }

        .hero-content p {
            font-size: 1.3rem;
            color: var(--brand-500);
            margin-bottom: 2.5rem;
            animation: fadeInUp 0.8s ease-out 0.2s both;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .cta-buttons {
            display: flex;
            gap: 1rem;
            justify-content: center;
            flex-wrap: wrap;
            animation: fadeInUp 0.8s ease-out 0.4s both;
        }

        .btn-hero-primary {
            background: linear-gradient(135deg, var(--accent-600), var(--accent-800));
            border: none;
            color: white;
            padding: 0.75rem 2.5rem;
            font-weight: 700;
            border-radius: 999px;
            font-size: 1.1rem;
            box-shadow: 0 20px 40px rgba(124, 58, 237, 0.3);
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            text-decoration: none;
            display: inline-block;
        }

        .btn-hero-primary:hover {
            transform: translateY(-4px);
            box-shadow: 0 30px 60px rgba(124, 58, 237, 0.4);
            color: white;
        }

        .btn-hero-secondary {
            background: rgba(255, 255, 255, 0.95);
            border: 2px solid var(--accent-600);
            color: var(--accent-600);
            padding: 0.65rem 2.4rem;
            font-weight: 700;
            border-radius: 999px;
            font-size: 1.1rem;
            box-shadow: 0 10px 30px rgba(11, 19, 32, 0.1);
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            text-decoration: none;
            display: inline-block;
        }

        .btn-hero-secondary:hover {
            transform: translateY(-4px);
            background: var(--accent-100);
            color: var(--accent-700);
            box-shadow: 0 20px 40px rgba(124, 58, 237, 0.2);
        }

        .features-section {
            padding: 6rem 0;
            background: linear-gradient(180deg, rgba(255,255,255,0) 0%, rgba(124,58,237,0.03) 100%);
            background-image: 
                repeating-linear-gradient(90deg, transparent, transparent 50px, rgba(124, 58, 237, 0.02) 50px, rgba(124, 58, 237, 0.02) 100px),
                repeating-linear-gradient(0deg, transparent, transparent 50px, rgba(245, 158, 11, 0.02) 50px, rgba(245, 158, 11, 0.02) 100px);
            position: relative;
        }

        .feature-item {
            text-align: center;
            padding: 2rem;
            animation: fadeInUp 0.8s ease-out;
        }

        .feature-item:nth-child(1) { animation-delay: 0.1s; }
        .feature-item:nth-child(2) { animation-delay: 0.2s; }
        .feature-item:nth-child(3) { animation-delay: 0.3s; }
        .feature-item:nth-child(4) { animation-delay: 0.4s; }

        .feature-icon-large {
            width: 80px;
            height: 80px;
            margin: 0 auto 1.5rem;
            border-radius: 20px;
            background: linear-gradient(135deg, rgba(124, 58, 237, 0.2), rgba(245, 158, 11, 0.15));
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2.5rem;
            box-shadow: 0 12px 24px rgba(124, 58, 237, 0.15);
            transition: all 0.3s ease;
        }

        .feature-item:hover .feature-icon-large {
            transform: translateY(-8px);
            box-shadow: 0 20px 40px rgba(124, 58, 237, 0.25);
        }

        .feature-item h3 {
            font-size: 1.3rem;
            font-weight: 700;
            margin-bottom: 0.8rem;
            color: var(--brand-950);
        }

        .feature-item p {
            color: var(--brand-500);
            line-height: 1.6;
        }

        .stats-section {
            padding: 4rem 0;
            background: linear-gradient(135deg, rgba(124, 58, 237, 0.08), rgba(245, 158, 11, 0.05));
            background-image: 
                url("data:image/svg+xml,%3Csvg width='100' height='100' viewBox='0 0 100 100' xmlns='http://www.w3.org/2000/svg'%3E%3Ccircle cx='50' cy='50' r='40' fill='none' stroke='%237c3aed' stroke-width='0.5' opacity='0.1'/%3E%3Ccircle cx='50' cy='50' r='25' fill='none' stroke='%237c3aed' stroke-width='0.3' opacity='0.08'/%3E%3C/svg%3E"),
                linear-gradient(135deg, rgba(124, 58, 237, 0.08), rgba(245, 158, 11, 0.05));
            background-size: 150px 150px, auto;
            background-position: 0 0, 0 0;
            background-attachment: fixed;
            position: relative;
        }

        .stat-box {
            text-align: center;
            padding: 2rem;
            background: rgba(255, 255, 255, 0.8);
            border-radius: 20px;
            border: 1px solid rgba(124, 58, 237, 0.1);
            box-shadow: 0 8px 16px rgba(11, 19, 32, 0.08);
            transition: all 0.3s ease;
        }

        .stat-box:hover {
            transform: translateY(-4px);
            box-shadow: 0 16px 32px rgba(124, 58, 237, 0.15);
        }

        .stat-number {
            font-size: 2.5rem;
            font-weight: 800;
            background: linear-gradient(135deg, var(--accent-600), var(--gold-500));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .stat-label {
            color: var(--brand-500);
            font-weight: 600;
            margin-top: 0.5rem;
        }

        .navbar-landing {
            backdrop-filter: blur(10px);
            background: rgba(255, 255, 255, 0.95);
            border-bottom: 2px solid rgba(124, 58, 237, 0.15);
            padding: 1rem 0;
            position: sticky;
            top: 0;
            z-index: 100;
        }

        .navbar-landing .brand-mark {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 40px;
            height: 40px;
            border-radius: 12px;
            background: linear-gradient(135deg, rgba(124, 58, 237, 0.2), rgba(245, 158, 11, 0.18));
            color: var(--accent-800);
            font-weight: 800;
            box-shadow: inset 0 0 0 1px rgba(124, 58, 237, 0.2);
        }

        .navbar-landing .navbar-brand {
            font-weight: 800;
            font-size: 1.3rem;
            color: var(--brand-950);
        }

        .navbar-landing .navbar-brand span {
            color: var(--accent-600);
        }

        .footer-landing {
            background: linear-gradient(135deg, var(--brand-950) 0%, #0a0d14 100%);
            color: white;
            padding: 4rem 0 2rem;
            margin-top: 4rem;
        }

        .footer-landing h5 {
            font-weight: 700;
            margin-bottom: 1.5rem;
            color: white;
        }

        .footer-landing a {
            color: rgba(255, 255, 255, 0.7);
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .footer-landing a:hover {
            color: var(--accent-600);
        }

        .footer-landing p {
            opacity: 0.6;
            line-height: 1.8;
        }

        .divider-gold {
            width: 60px;
            height: 3px;
            background: linear-gradient(90deg, var(--accent-600), var(--gold-500));
            margin: 1rem auto;
            border-radius: 999px;
        }

        .benefits-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 2rem;
            margin: 3rem 0;
        }

        .benefit-card {
            background: rgba(255, 255, 255, 0.9);
            padding: 2rem;
            border-radius: 18px;
            border: 1px solid rgba(124, 58, 237, 0.15);
            box-shadow: 0 10px 25px rgba(11, 19, 32, 0.08);
            transition: all 0.3s ease;
        }

        .benefit-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 40px rgba(124, 58, 237, 0.2);
            border-color: rgba(124, 58, 237, 0.3);
        }

        .benefit-card h4 {
            font-weight: 700;
            color: var(--brand-950);
            margin-bottom: 1rem;
        }

        .benefit-card p {
            color: var(--brand-500);
            line-height: 1.6;
        }
    </style>
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-landing">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center gap-2" href="/">
                <span class="brand-mark">S4</span>
                <span>Alimentation <span>Santé</span></span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <div class="ms-auto d-flex gap-2">
                    <a class="btn btn-outline-secondary btn-sm" href="/user/redirectinscription">Inscription</a>
                    <a class="btn btn-primary btn-sm" href="/">Connexion</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero-section page-shell">
        <div class="hero-content">
            <h1>Transforme ton Alimentation</h1>
            <p>Suivi intelligent de poids, programmes personnalisés et activités sportives adaptées à tes objectifs</p>
            <div class="cta-buttons">
                <a href="/user/redirectinscription" class="btn-hero-primary">Commencer Gratuit</a>
                <a href="/" class="btn-hero-secondary">Se Connecter</a>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="features-section">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="section-title mb-3">Pourquoi Nous Choisir ?</h2>
                <div class="divider-gold"></div>
            </div>
            <div class="row g-4">
                <div class="col-md-6 col-lg-3">
                    <div class="feature-item">
                        <div class="feature-icon-large">📊</div>
                        <h3>Suivi en Temps Réel</h3>
                        <p>Suivez votre poids et vos progrès avec un tableau de bord intuitif et détaillé.</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="feature-item">
                        <div class="feature-icon-large">🎯</div>
                        <h3>Objectifs Personnalisés</h3>
                        <p>Choisissez parmi 3 objectifs principaux adaptés à votre situation.</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="feature-item">
                        <div class="feature-icon-large">🍽️</div>
                        <h3>Programmes Alimentaires</h3>
                        <p>Accédez à des régimes professionnels avec répartition nutritionnelle détaillée.</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="feature-item">
                        <div class="feature-icon-large">🏃</div>
                        <h3>Activités Sportives</h3>
                        <p>Découvrez les meilleures activités pour atteindre vos objectifs rapidement.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Benefits Section -->
    <section class="stats-section">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="section-title mb-3">Nos Avantages</h2>
                <div class="divider-gold"></div>
            </div>
            <div class="benefits-grid">
                <div class="benefit-card">
                    <h4>✨ Interface Moderne</h4>
                    <p>Design épuré et intuitif pour une expérience utilisateur optimale sur tous les appareils.</p>
                </div>
                <div class="benefit-card">
                    <h4>💳 Abonnement Gold</h4>
                    <p>Débloquez des fonctionnalités premium avec notre option Gold à prix avantageux.</p>
                </div>
                <div class="benefit-card">
                    <h4>📱 Accessible Partout</h4>
                    <p>Accédez à votre compte depuis n'importe quel appareil, n'importe où, n'importe quand.</p>
                </div>
                <div class="benefit-card">
                    <h4>📄 Export PDF</h4>
                    <p>Téléchargez vos programmes et progrès au format PDF pour les consulter hors ligne.</p>
                </div>
                <div class="benefit-card">
                    <h4>🔐 Données Sécurisées</h4>
                    <p>Vos informations personnelles et de santé sont protégées avec les plus hauts standards.</p>
                </div>
                <div class="benefit-card">
                    <h4>🎓 Guidance Complète</h4>
                    <p>Suivez un parcours complet du profil jusqu'à l'export, guidé étape par étape.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Stats Section -->
    <section style="padding: 4rem 0;">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="section-title mb-3">Nos Chiffres</h2>
                <div class="divider-gold"></div>
            </div>
            <div class="row g-4">
                <div class="col-md-3 col-6">
                    <div class="stat-box">
                        <div class="stat-number">1200+</div>
                        <div class="stat-label">Utilisateurs Actifs</div>
                    </div>
                </div>
                <div class="col-md-3 col-6">
                    <div class="stat-box">
                        <div class="stat-number">50+</div>
                        <div class="stat-label">Programmes</div>
                    </div>
                </div>
                <div class="col-md-3 col-6">
                    <div class="stat-box">
                        <div class="stat-number">98%</div>
                        <div class="stat-label">Satisfaction</div>
                    </div>
                </div>
                <div class="col-md-3 col-6">
                    <div class="stat-box">
                        <div class="stat-number">24h</div>
                        <div class="stat-label">Support</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section style="padding: 4rem 0; background: linear-gradient(135deg, var(--accent-600) 0%, var(--accent-800) 100%); text-align: center;">
        <div class="container">
            <h2 style="color: white; font-size: 2.5rem; font-weight: 800; margin-bottom: 1.5rem;">Prêt à Commencer ?</h2>
            <p style="color: rgba(255,255,255,0.9); font-size: 1.2rem; margin-bottom: 2rem;">Rejoins des milliers d'utilisateurs qui transforment leur alimentation</p>
            <div class="cta-buttons">
                <a href="/user/redirectinscription" class="btn-hero-primary">S'inscrire Maintenant</a>
                <a href="/" style="background: rgba(255,255,255,0.95); color: var(--accent-600); padding: 0.75rem 2.5rem; font-weight: 700; border-radius: 999px; text-decoration: none; display: inline-block; transition: all 0.3s ease;" onmouseover="this.style.background='white'; this.style.transform='translateY(-4px)';" onmouseout="this.style.background='rgba(255,255,255,0.95)'; this.style.transform='translateY(0)';">Se Connecter</a>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer-landing">
        <div class="container">
            <div class="row g-5 mb-4">
                <div class="col-md-3">
                    <h5>Alimentation Santé</h5>
                    <p>Votre partenaire pour une meilleure alimentation et un mode de vie sain.</p>
                </div>
                <div class="col-md-3">
                    <h5>Navigation</h5>
                    <ul style="list-style: none; padding: 0;">
                        <li><a href="#features">Fonctionnalités</a></li>
                        <li><a href="#benefits">Avantages</a></li>
                        <li><a href="/">Connexion</a></li>
                    </ul>
                </div>
                <div class="col-md-3">
                    <h5>Légal</h5>
                    <ul style="list-style: none; padding: 0;">
                        <li><a href="#">Conditions d'utilisation</a></li>
                        <li><a href="#">Politique de confidentialité</a></li>
                        <li><a href="#">Mentions légales</a></li>
                    </ul>
                </div>
                <div class="col-md-3">
                    <h5>Contact</h5>
                    <ul style="list-style: none; padding: 0;">
                        <li><a href="mailto:info@alimentation.mg">info@alimentation.mg</a></li>
                        <li><a href="tel:+261912345678">+261 91 234 5678</a></li>
                    </ul>
                </div>
            </div>
            <div style="border-top: 1px solid rgba(255,255,255,0.1); padding-top: 2rem; text-align: center;">
                <p>&copy; 2026 Alimentation Santé. Tous droits réservés.</p>
            </div>
        </div>
    </footer>

    <script src="/assets/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>
