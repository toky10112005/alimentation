<?= $this->extend('layouts/main') ?>

<?= $this->section('title') ?><?= esc($regime['nom'] ?? 'Régime') ?> - NutriLife<?= $this->endSection() ?>

<?= $this->section('content') ?>

<!-- Breadcrumb -->
<div class="bg-white border-bottom py-3 mb-4">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="<?= base_url() ?>" class="text-decoration-none">Accueil</a></li>
                <li class="breadcrumb-item"><a href="<?= base_url('regime') ?>" class="text-decoration-none">Régimes</a></li>
                <li class="breadcrumb-item active" aria-current="page"><?= esc($regime['nom'] ?? 'Programme') ?></li>
            </ol>
        </nav>
    </div>
</div>

<?php if(isset($regime)): ?>
<!-- Hero Section -->
<section style="background: linear-gradient(135deg, rgba(34, 197, 94, 0.1) 0%, rgba(249, 115, 22, 0.05) 100%); padding: 3rem 0;">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 mb-4 mb-lg-0" data-animate="slide-in-up">
                <h1 class="display-4 fw-bold mb-3"><?= esc($regime['nom'] ?? 'Programme') ?></h1>
                <p class="lead text-muted mb-4"><?= esc($regime['description'] ?? '') ?></p>
                
                <div class="d-flex gap-3 flex-wrap mb-4">
                    <div>
                        <h6 class="text-muted small mb-1">Prix journalier</h6>
                        <h3 class="text-success fw-bold mb-0">Ar <?= number_format($regime['prix_journalier'] ?? 0, 2) ?></h3>
                    </div>
                    <div>
                        <h6 class="text-muted small mb-1">Impact/semaine</h6>
                        <h3 class="fw-bold mb-0"><?= number_format($regime['poids_impact_semaine'] ?? 0, 1) ?> kg</h3>
                    </div>
                </div>

                <?php if(session()->get('user_id')): ?>
                    <button class="btn btn-success btn-lg rounded-pill me-2">
                        <i class="bi bi-cart-check me-2"></i> Souscrire Maintenant
                    </button>
                <?php else: ?>
                    <a href="<?= base_url('user/register') ?>" class="btn btn-success btn-lg rounded-pill me-2">
                        <i class="bi bi-play-fill me-2"></i> Commencer Maintenant
                    </a>
                <?php endif; ?>
                <button class="btn btn-outline-success btn-lg rounded-pill">
                    <i class="bi bi-heart me-2"></i> Ajouter aux Favoris
                </button>
            </div>

            <div class="col-lg-6" data-animate="slide-in-up">
                <div style="width: 100%; height: 400px; background: linear-gradient(135deg, rgba(34, 197, 94, 0.2) 0%, rgba(249, 115, 22, 0.1) 100%); border-radius: 15px; display: flex; align-items: center; justify-content: center;">
                    <i class="bi bi-egg-fried" style="font-size: 150px; color: rgba(34, 197, 94, 0.3);"></i>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Composition Section -->
<section class="section">
    <div class="container">
        <h2 class="fw-bold mb-4">Composition Nutritionnelle</h2>

        <div class="row g-4 mb-5">
            <?php if(isset($regime['pourcentage_viande']) && $regime['pourcentage_viande'] > 0): ?>
                <div class="col-md-6 col-lg-3" data-animate="slide-in-up">
                    <div class="feature-box">
                        <div class="feature-icon">
                            <i class="bi bi-egg"></i>
                        </div>
                        <h5 class="mt-3 mb-2">Viande</h5>
                        <div class="h4 text-success fw-bold mb-1"><?= number_format($regime['pourcentage_viande'], 0) ?>%</div>
                        <p class="text-muted small mb-0">Protéines complètes et fer</p>
                    </div>
                </div>
            <?php endif; ?>

            <?php if(isset($regime['pourcentage_poisson']) && $regime['pourcentage_poisson'] > 0): ?>
                <div class="col-md-6 col-lg-3" data-animate="slide-in-up">
                    <div class="feature-box">
                        <div class="feature-icon">
                            <i class="bi bi-fish"></i>
                        </div>
                        <h5 class="mt-3 mb-2">Poisson</h5>
                        <div class="h4 text-success fw-bold mb-1"><?= number_format($regime['pourcentage_poisson'], 0) ?>%</div>
                        <p class="text-muted small mb-0">Oméga-3 et protéines</p>
                    </div>
                </div>
            <?php endif; ?>

            <?php if(isset($regime['pourcentage_volaille']) && $regime['pourcentage_volaille'] > 0): ?>
                <div class="col-md-6 col-lg-3" data-animate="slide-in-up">
                    <div class="feature-box">
                        <div class="feature-icon">
                            <i class="bi bi-egg-fried"></i>
                        </div>
                        <h5 class="mt-3 mb-2">Volaille</h5>
                        <div class="h4 text-success fw-bold mb-1"><?= number_format($regime['pourcentage_volaille'], 0) ?>%</div>
                        <p class="text-muted small mb-0">Protéines maigres</p>
                    </div>
                </div>
            <?php endif; ?>

            <div class="col-md-6 col-lg-3" data-animate="slide-in-up">
                <div class="feature-box">
                    <div class="feature-icon">
                        <i class="bi bi-leaf"></i>
                    </div>
                    <h5 class="mt-3 mb-2">Végétaux</h5>
                    <div class="h4 text-success fw-bold mb-1"><?= number_format(100 - (($regime['pourcentage_viande'] ?? 0) + ($regime['pourcentage_poisson'] ?? 0) + ($regime['pourcentage_volaille'] ?? 0)), 0) ?>%</div>
                    <p class="text-muted small mb-0">Fibres et micronutriments</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Avantages Section -->
<section class="section bg-white">
    <div class="container">
        <h2 class="fw-bold mb-4">Les Avantages de ce Programme</h2>

        <div class="row g-4">
            <div class="col-md-6" data-animate="slide-in-up">
                <div class="d-flex gap-3">
                    <div class="flex-shrink-0">
                        <div class="d-flex align-items-center justify-content-center h-100">
                            <i class="bi bi-check-circle-fill text-success" style="font-size: 1.5rem;"></i>
                        </div>
                    </div>
                    <div>
                        <h5 class="fw-bold mb-2">Résultats Rapides</h5>
                        <p class="text-muted mb-0">Observez des changements visibles en quelques semaines seulement</p>
                    </div>
                </div>
            </div>

            <div class="col-md-6" data-animate="slide-in-up">
                <div class="d-flex gap-3">
                    <div class="flex-shrink-0">
                        <div class="d-flex align-items-center justify-content-center h-100">
                            <i class="bi bi-check-circle-fill text-success" style="font-size: 1.5rem;"></i>
                        </div>
                    </div>
                    <div>
                        <h5 class="fw-bold mb-2">Facile à Suivre</h5>
                        <p class="text-muted mb-0">Repas délicieux et simples à préparer au quotidien</p>
                    </div>
                </div>
            </div>

            <div class="col-md-6" data-animate="slide-in-up">
                <div class="d-flex gap-3">
                    <div class="flex-shrink-0">
                        <div class="d-flex align-items-center justify-content-center h-100">
                            <i class="bi bi-check-circle-fill text-success" style="font-size: 1.5rem;"></i>
                        </div>
                    </div>
                    <div>
                        <h5 class="fw-bold mb-2">Nutritionnellement Équilibré</h5>
                        <p class="text-muted mb-0">Conçu par des nutritionnistes professionnels</p>
                    </div>
                </div>
            </div>

            <div class="col-md-6" data-animate="slide-in-up">
                <div class="d-flex gap-3">
                    <div class="flex-shrink-0">
                        <div class="d-flex align-items-center justify-content-center h-100">
                            <i class="bi bi-check-circle-fill text-success" style="font-size: 1.5rem;"></i>
                        </div>
                    </div>
                    <div>
                        <h5 class="fw-bold mb-2">Personnalisable</h5>
                        <p class="text-muted mb-0">Adaptez les repas à vos préférences et allergies</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Repas Inclus -->
<?php if(isset($detailsRegime) && !empty($detailsRegime)): ?>
    <section class="section">
        <div class="container">
            <h2 class="fw-bold mb-4">Exemples de Repas Inclus</h2>

            <div class="row g-4">
                <?php $count = 0; foreach($detailsRegime as $detail): ?>
                    <?php if($count++ >= 6) break; ?>
                    <div class="col-md-6 col-lg-4" data-animate="slide-in-up">
                        <div class="card-premium">
                            <div class="card-premium-img" style="background: linear-gradient(135deg, #f97316 0%, #d97706 100%); display: flex; align-items: center; justify-content: center;">
                                <i class="bi bi-cup-hot" style="font-size: 2rem; color: white;"></i>
                            </div>
                            <div class="card-premium-body">
                                <h5 class="card-premium-title"><?= esc($detail['nom_plat'] ?? 'Plat') ?></h5>
                                <p class="card-premium-text mb-3">
                                    <i class="bi bi-fire"></i> <?= $detail['calories'] ?? '0' ?> kcal
                                </p>
                                <div class="small mb-3 pb-3 border-bottom">
                                    <span class="badge badge-secondary-premium">
                                        <i class="bi bi-calendar-event"></i> Jour <?= $detail['jour_numero'] ?? '1' ?>
                                    </span>
                                    <span class="badge badge-success-premium">
                                        <?= $detail['moment'] ?? 'Repas' ?>
                                    </span>
                                </div>
                                <a href="<?= base_url('plat/' . ($detail['plat_id'] ?? '#')) ?>" class="btn btn-sm btn-outline-secondary w-100">
                                    Voir Détails
                                </a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>

            <div class="text-center mt-5">
                <a href="<?= base_url('regime/' . ($regime['id'] ?? '#') . '/plats') ?>" class="btn-primary-premium">
                    <i class="bi bi-collection"></i> Voir tous les repas (<?= count($detailsRegime) ?? 0 ?> repas)
                </a>
            </div>
        </div>
    </section>
<?php endif; ?>

<!-- Activités Associées -->
<?php if(isset($activites) && !empty($activites)): ?>
    <section class="section bg-white">
        <div class="container">
            <h2 class="fw-bold mb-4">Activités Recommandées</h2>

            <div class="row g-4">
                <?php foreach($activites as $activite): ?>
                    <div class="col-md-6 col-lg-4" data-animate="slide-in-up">
                        <div class="card-premium">
                            <div class="card-premium-body">
                                <div class="d-flex align-items-start">
                                    <div class="feature-icon me-3">
                                        <i class="bi bi-activity"></i>
                                    </div>
                                    <div class="flex-grow-1">
                                        <h5 class="fw-bold mb-2"><?= esc($activite['nom'] ?? 'Activité') ?></h5>
                                        <p class="text-muted small mb-3"><?= esc($activite['description'] ?? '') ?></p>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <span class="badge badge-success-premium">
                                                <i class="bi bi-fire"></i> <?= $activite['calories_brules_heure'] ?? '0' ?> cal/h
                                            </span>
                                            <span class="text-success fw-bold"><?= $activite['duree_minutes_jour'] ?? '30' ?> min/jour</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
<?php endif; ?>

<!-- Section CTA -->
<section class="section" style="background: linear-gradient(135deg, rgba(34, 197, 94, 0.1) 0%, rgba(249, 115, 22, 0.05) 100%);">
    <div class="container">
        <div class="text-center" data-animate="slide-in-up">
            <h2 class="mb-3">Prêt à Commencer?</h2>
            <p class="text-muted fs-5 mb-4">Rejoignez les milliers d'utilisateurs satisfaits</p>
            <?php if(session()->get('user_id')): ?>
                <button class="btn-primary-premium">
                    <i class="bi bi-cart-check me-2"></i> Souscrire à ce Programme
                </button>
            <?php else: ?>
                <a href="<?= base_url('user/register') ?>" class="btn-primary-premium">
                    <i class="bi bi-play-fill me-2"></i> S'inscrire Maintenant
                </a>
            <?php endif; ?>
        </div>
    </div>
</section>

<?php else: ?>
    <div class="section">
        <div class="container">
            <div class="alert alert-warning text-center py-5">
                <h4><i class="bi bi-exclamation-triangle me-2"></i>Régime Non Trouvé</h4>
                <p class="mb-0">Nous n'avons pas trouvé le régime que vous recherchez.</p>
            </div>
        </div>
    </div>
<?php endif; ?>

<?= $this->endSection() ?>
