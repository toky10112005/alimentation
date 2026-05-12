<?= $this->extend('layouts/main') ?>

<?= $this->section('title') ?>Accueil - NutriLife Premium<?= $this->endSection() ?>

<?= $this->section('meta_description') ?>Transformez votre alimentation avec nos programmes personnalisés premium de nutrition et fitness.<?= $this->endSection() ?>

<?= $this->section('content') ?>

<!-- ============================================
     HERO SECTION
     ============================================ -->
<section class="hero-section">
    <div class="container-fluid" style="padding: 0 2rem;">
        <div class="hero-content">
            <h1 class="hero-title">Transformez votre Alimentation</h1>
            <p class="hero-subtitle">
                Découvrez nos programmes personnalisés de nutrition et fitness conçus pour vous par des experts en santé et bien-être.
            </p>
            
            <div class="hero-cta">
                <a href="<?= base_url('user/register') ?>" class="btn-primary-premium">
                    <i class="bi bi-play-fill"></i> Commencer Gratuitement
                </a>
                <a href="<?= base_url('regime') ?>" class="btn-secondary-premium">
                    <i class="bi bi-arrow-right"></i> Découvrir nos régimes
                </a>
            </div>
        </div>
        <div class="hero-image">
            <img src="<?= base_url('images/r1.jpeg') ?>" alt="Alimentation saine et équilibrée">
        </div>
    </div>
</section>

<!-- ============================================
     SECTION STATISTIQUES
     ============================================ -->
<section class="section bg-white">
    <div class="container">
        <div class="row g-4">
            <div class="col-md-3 col-6" data-animate="slide-in-up">
                <div class="stats-card">
                    <div class="stats-number" data-counter="5000">0+</div>
                    <div class="stats-label">Utilisateurs Actifs</div>
                </div>
            </div>
            <div class="col-md-3 col-6" data-animate="slide-in-up">
                <div class="stats-card">
                    <div class="stats-number" data-counter="50">0+</div>
                    <div class="stats-label">Régimes Uniques</div>
                </div>
            </div>
            <div class="col-md-3 col-6" data-animate="slide-in-up">
                <div class="stats-card">
                    <div class="stats-number" data-counter="1000">0+</div>
                    <div class="stats-label">Recettes</div>
                </div>
            </div>
            <div class="col-md-3 col-6" data-animate="slide-in-up">
                <div class="stats-card">
                    <div class="stats-number" data-counter="95">0%</div>
                    <div class="stats-label">Satisfaction</div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ============================================
     SECTION POURQUOI NOUS CHOISIR
     ============================================ -->
<section class="section">
    <div class="container">
        <div class="section-title" data-animate="slide-in-up">
            <h2>Pourquoi Choisir NutriLife?</h2>
            <p class="section-subtitle">Une solution complète pour transformer votre mode de vie</p>
        </div>

        <div class="row g-4">
            <div class="col-md-6 col-lg-4" data-animate="slide-in-up">
                <div class="feature-box">
                    <div class="feature-icon">
                        <i class="bi bi-person-check-fill"></i>
                    </div>
                    <h4 class="mt-3 mb-2">Programmes Personnalisés</h4>
                    <p class="text-muted mb-0">Adaptés à votre profil, vos objectifs et vos préférences alimentaires</p>
                </div>
            </div>

            <div class="col-md-6 col-lg-4" data-animate="slide-in-up">
                <div class="feature-box">
                    <div class="feature-icon">
                        <i class="bi bi-shield-check-fill"></i>
                    </div>
                    <h4 class="mt-3 mb-2">100% Sécurisé</h4>
                    <p class="text-muted mb-0">Vos données sont protégées avec les meilleures normes de sécurité</p>
                </div>
            </div>

            <div class="col-md-6 col-lg-4" data-animate="slide-in-up">
                <div class="feature-box">
                    <div class="feature-icon">
                        <i class="bi bi-graph-up-arrow"></i>
                    </div>
                    <h4 class="mt-3 mb-2">Résultats Prouvés</h4>
                    <p class="text-muted mb-0">95% de nos utilisateurs atteignent leurs objectifs en 3 mois</p>
                </div>
            </div>

            <div class="col-md-6 col-lg-4" data-animate="slide-in-up">
                <div class="feature-box">
                    <div class="feature-icon">
                        <i class="bi bi-chat-dots-fill"></i>
                    </div>
                    <h4 class="mt-3 mb-2">Support 24/7</h4>
                    <p class="text-muted mb-0">Notre équipe d'experts est disponible pour vous aider</p>
                </div>
            </div>

            <div class="col-md-6 col-lg-4" data-animate="slide-in-up">
                <div class="feature-box">
                    <div class="feature-icon">
                        <i class="bi bi-book-fill"></i>
                    </div>
                    <h4 class="mt-3 mb-2">Contenu Riche</h4>
                    <p class="text-muted mb-0">Des guides complets, recettes et conseils nutritionnels</p>
                </div>
            </div>

            <div class="col-md-6 col-lg-4" data-animate="slide-in-up">
                <div class="feature-box">
                    <div class="feature-icon">
                        <i class="bi bi-phone-fill"></i>
                    </div>
                    <h4 class="mt-3 mb-2">Application Mobile</h4>
                    <p class="text-muted mb-0">Suivez votre progression partout avec notre app mobile</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ============================================
     SECTION RÉGIMES POPULAIRES
     ============================================ -->
<section class="section bg-white">
    <div class="container">
        <div class="section-title" data-animate="slide-in-up">
            <h2>Nos Régimes Populaires</h2>
            <p class="section-subtitle">Choisissez le programme qui vous convient</p>
        </div>

        <div class="row g-4">
            <?php if(isset($regimes) && !empty($regimes)): ?>
                <?php $count = 0; foreach($regimes as $regime): ?>
                    <?php if($count++ >= 6) break; ?>
                    <div class="col-md-6 col-lg-4" data-animate="slide-in-up">
                        <div class="card-premium">
                            <div class="card-premium-img" style="background: linear-gradient(135deg, <?= ['#22c55e', '#f97316', '#3b82f6', '#ec4899', '#8b5cf6', '#06b6d4'][$count % 6] ?> 0%, <?= ['#16a34a', '#d97706', '#1d4ed8', '#be185d', '#6d28d9', '#0891b2'][$count % 6] ?> 100%);">
                                <div class="d-flex align-items-center justify-content-center h-100">
                                    <i class="bi bi-egg-fried" style="font-size: 3rem; color: white;"></i>
                                </div>
                            </div>
                            <div class="card-premium-body">
                                <h5 class="card-premium-title"><?= esc($regime['nom'] ?? 'Programme') ?></h5>
                                <p class="card-premium-text"><?= esc(substr($regime['description'] ?? '', 0, 120)) ?>...</p>
                                <div class="card-premium-footer">
                                    <span class="badge badge-premium badge-success-premium">
                                        <?= isset($regime['prix_journalier']) ? NutriLife.formatPrice($regime['prix_journalier']) . '/jour' : 'Premium' ?>
                                    </span>
                                    <a href="<?= base_url('regime/' . ($regime['id'] ?? '#')) ?>" class="btn btn-sm btn-outline-success rounded-pill">
                                        <i class="bi bi-arrow-right"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="col-12">
                    <div class="alert alert-info text-center">
                        <i class="bi bi-info-circle me-2"></i> Aucun régime disponible pour le moment
                    </div>
                </div>
            <?php endif; ?>
        </div>

        <div class="text-center mt-5" data-animate="slide-in-up">
            <a href="<?= base_url('regime') ?>" class="btn-primary-premium">
                <i class="bi bi-collection"></i> Voir tous nos régimes
            </a>
        </div>
    </div>
</section>

<!-- ============================================
     SECTION REPAS POPULAIRES
     ============================================ -->
<section class="section">
    <div class="container">
        <div class="section-title" data-animate="slide-in-up">
            <h2>Repas Populaires</h2>
            <p class="section-subtitle">Découvrez nos recettes délicieuses et nutritives</p>
        </div>

        <div class="row g-4">
            <?php if(isset($plats) && !empty($plats)): ?>
                <?php $count = 0; foreach($plats as $plat): ?>
                    <?php if($count++ >= 6) break; ?>
                    <div class="col-md-6 col-lg-4" data-animate="slide-in-up">
                        <div class="card-premium">
                            <div class="card-premium-img" style="background: linear-gradient(135deg, #f97316 0%, #d97706 100%); display: flex; align-items: center; justify-content: center;">
                                <i class="bi bi-cup-hot" style="font-size: 3rem; color: white;"></i>
                            </div>
                            <div class="card-premium-body">
                                <h5 class="card-premium-title"><?= esc($plat['nom'] ?? 'Plat') ?></h5>
                                <p class="card-premium-text mb-3">
                                    <i class="bi bi-fire"></i> <?= $plat['calories'] ?? '0' ?> kcal
                                </p>
                                <div class="card-premium-footer">
                                    <span class="badge badge-premium badge-secondary-premium">Délicieux</span>
                                    <a href="<?= base_url('plat/' . ($plat['id'] ?? '#')) ?>" class="btn btn-sm btn-outline-secondary rounded-pill">
                                        <i class="bi bi-arrow-right"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="col-12">
                    <div class="alert alert-info text-center">
                        <i class="bi bi-info-circle me-2"></i> Aucun plat disponible pour le moment
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>

<!-- ============================================
     SECTION TÉMOIGNAGES
     ============================================ -->
<section class="section bg-white">
    <div class="container">
        <div class="section-title" data-animate="slide-in-up">
            <h2>Ce que Disent Nos Utilisateurs</h2>
            <p class="section-subtitle">Des histoires vraies de transformation</p>
        </div>

        <div class="row g-4">
            <div class="col-md-6 col-lg-4" data-animate="slide-in-up">
                <div class="testimonial-card">
                    <div class="testimonial-stars">
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                    </div>
                    <p class="testimonial-text">
                        "J'ai perdu 10kg en 3 mois avec NutriLife. Les programmes sont vraiment adaptés et faciles à suivre. Merci!"
                    </p>
                    <div class="testimonial-author">
                        <div class="testimonial-avatar">MJ</div>
                        <div>
                            <div class="testimonial-name">Marie Jean</div>
                            <div class="testimonial-role">Utilisateur Premium</div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-4" data-animate="slide-in-up">
                <div class="testimonial-card">
                    <div class="testimonial-stars">
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                    </div>
                    <p class="testimonial-text">
                        "La meilleure application de nutrition que j'ai essayée. Le support client est excellent!"
                    </p>
                    <div class="testimonial-author">
                        <div class="testimonial-avatar">PR</div>
                        <div>
                            <div class="testimonial-name">Pierre Roux</div>
                            <div class="testimonial-role">Fitness Enthusiast</div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-4" data-animate="slide-in-up">
                <div class="testimonial-card">
                    <div class="testimonial-stars">
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                    </div>
                    <p class="testimonial-text">
                        "Enfin une plateforme qui comprend vraiment mes besoins nutritionnels. Recommandé vivement!"
                    </p>
                    <div class="testimonial-author">
                        <div class="testimonial-avatar">SL</div>
                        <div>
                            <div class="testimonial-name">Sophie Leclerc</div>
                            <div class="testimonial-role">Coach Sportive</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ============================================
     SECTION ÉTAPES FONCTIONNEMENT
     ============================================ -->
<section class="section">
    <div class="container">
        <div class="section-title" data-animate="slide-in-up">
            <h2>Comment ça Marche?</h2>
            <p class="section-subtitle">3 étapes simples pour commencer votre transformation</p>
        </div>

        <div class="row g-4">
            <div class="col-md-4" data-animate="slide-in-up">
                <div class="text-center">
                    <div class="bg-success bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px;">
                        <span class="display-6 fw-bold text-success">1</span>
                    </div>
                    <h4 class="mb-2">Créez Votre Profil</h4>
                    <p class="text-muted">Inscrivez-vous et définissez vos objectifs de santé</p>
                </div>
            </div>

            <div class="col-md-4" data-animate="slide-in-up">
                <div class="text-center">
                    <div class="bg-success bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px;">
                        <span class="display-6 fw-bold text-success">2</span>
                    </div>
                    <h4 class="mb-2">Choisissez Votre Plan</h4>
                    <p class="text-muted">Sélectionnez un régime adapté à vos besoins</p>
                </div>
            </div>

            <div class="col-md-4" data-animate="slide-in-up">
                <div class="text-center">
                    <div class="bg-success bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px;">
                        <span class="display-6 fw-bold text-success">3</span>
                    </div>
                    <h4 class="mb-2">Transformez-Vous</h4>
                    <p class="text-muted">Suivez votre progression et atteignez vos objectifs</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ============================================
     SECTION FAQ
     ============================================ -->
<section class="section bg-white" id="faq">
    <div class="container">
        <div class="section-title" data-animate="slide-in-up">
            <h2>Questions Fréquemment Posées</h2>
            <p class="section-subtitle">Trouvez les réponses à vos questions</p>
        </div>

        <div class="row" data-animate="slide-in-up">
            <div class="col-lg-8 mx-auto">
                <div class="faq-item">
                    <div class="faq-question">
                        <span>Est-ce que NutriLife est adapté à mon régime alimentaire?</span>
                        <i class="bi bi-chevron-down faq-icon"></i>
                    </div>
                    <div class="faq-answer">
                        <p>Oui! NutriLife propose des programmes pour tous les régimes alimentaires: végétariens, végan, sans gluten, et plus encore.</p>
                    </div>
                </div>

                <div class="faq-item">
                    <div class="faq-question">
                        <span>Combien de temps avant de voir les résultats?</span>
                        <i class="bi bi-chevron-down faq-icon"></i>
                    </div>
                    <div class="faq-answer">
                        <p>La plupart de nos utilisateurs commencent à voir les résultats après 2 à 3 semaines. La constance est clé!</p>
                    </div>
                </div>

                <div class="faq-item">
                    <div class="faq-question">
                        <span>Les repas proposés sont-ils délicieux?</span>
                        <i class="bi bi-chevron-down faq-icon"></i>
                    </div>
                    <div class="faq-answer">
                        <p>Absolument! Tous nos repas sont élaborés par des chefs nutritionnistes pour être à la fois délicieux et nutritifs.</p>
                    </div>
                </div>

                <div class="faq-item">
                    <div class="faq-question">
                        <span>Y a-t-il une garantie de remboursement?</span>
                        <i class="bi bi-chevron-down faq-icon"></i>
                    </div>
                    <div class="faq-answer">
                        <p>Oui, nous offrons une garantie de satisfaction de 30 jours. Si vous n'êtes pas satisfait, nous remboursons 100%.</p>
                    </div>
                </div>

                <div class="faq-item">
                    <div class="faq-question">
                        <span>Puis-je personnaliser mon régime?</span>
                        <i class="bi bi-chevron-down faq-icon"></i>
                    </div>
                    <div class="faq-answer">
                        <p>Bien sûr! Vous pouvez adapter chaque repas selon vos préférences et restrictions alimentaires.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ============================================
     SECTION CTA FINALE
     ============================================ -->
<section class="section">
    <div class="container">
        <div class="cta-section">
            <div class="cta-content">
                <h2>Prêt à Transformer Votre Vie?</h2>
                <p>Rejoignez des milliers d'utilisateurs qui ont déjà atteint leurs objectifs avec nos programmes personnalisés. Commencez votre transformation dès aujourd'hui!</p>
                <a href="<?= base_url('user/register') ?>" class="btn-primary-premium">
                    <i class="bi bi-play-fill"></i> Commencer Maintenant - Gratuit!
                </a>
            </div>
            <div class="cta-image">
                <img src="<?= base_url('images/r3.jpeg') ?>" alt="Commencer votre transformation nutritionnelle">
            </div>
        </div>
    </div>
</section>

<?= $this->endSection() ?>
