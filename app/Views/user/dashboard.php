<?= $this->extend('layouts/main') ?>

<?= $this->section('title') ?>Tableau de Bord - NutriLife<?= $this->endSection() ?>

<?= $this->section('content') ?>

<div class="container-fluid">
    <div class="row">
        <!-- Sidebar Navigation -->
        <div class="col-lg-3 mb-4 mb-lg-0">
            <div class="card-premium">
                <div class="card-premium-body">
                    <div class="text-center mb-4">
                        <div style="width: 80px; height: 80px; margin: 0 auto 1rem; border-radius: 50%; background: linear-gradient(135deg, var(--primary-color), var(--secondary-color)); display: flex; align-items: center; justify-content: center; color: white; font-size: 2rem; font-weight: bold;">
                            <?php 
                            $user = session()->get('user');
                            echo strtoupper(substr($user['nom'] ?? 'U', 0, 1)) . strtoupper(substr($user['email'] ?? '', 0, 1));
                            ?>
                        </div>
                        <h5 class="fw-bold"><?= esc($user['nom'] ?? 'Utilisateur') ?></h5>
                        <p class="text-muted small mb-0"><?= esc($user['email'] ?? '') ?></p>
                    </div>

                    <nav class="nav flex-column gap-2">
                        <a href="<?= base_url('user/dashboard') ?>" class="nav-link active fw-600 text-dark d-flex align-items-center gap-2 rounded px-3 py-2" style="background: rgba(34, 197, 94, 0.1);">
                            <i class="bi bi-speedometer2"></i> Dashboard
                        </a>
                        <a href="<?= base_url('user/profile') ?>" class="nav-link text-dark d-flex align-items-center gap-2 rounded px-3 py-2">
                            <i class="bi bi-person"></i> Profil
                        </a>
                        <a href="<?= base_url('user/planning') ?>" class="nav-link text-dark d-flex align-items-center gap-2 rounded px-3 py-2">
                            <i class="bi bi-calendar-check"></i> Planning
                        </a>
                        <a href="<?= base_url('user/regimes') ?>" class="nav-link text-dark d-flex align-items-center gap-2 rounded px-3 py-2">
                            <i class="bi bi-book"></i> Mes Régimes
                        </a>
                        <a href="<?= base_url('user/stats') ?>" class="nav-link text-dark d-flex align-items-center gap-2 rounded px-3 py-2">
                            <i class="bi bi-graph-up"></i> Statistiques
                        </a>
                        <a href="<?= base_url('user/settings') ?>" class="nav-link text-dark d-flex align-items-center gap-2 rounded px-3 py-2">
                            <i class="bi bi-gear"></i> Paramètres
                        </a>
                        <hr class="my-2">
                        <a href="<?= base_url('user/logout') ?>" class="nav-link text-danger d-flex align-items-center gap-2 rounded px-3 py-2">
                            <i class="bi bi-box-arrow-right"></i> Déconnexion
                        </a>
                    </nav>
                </div>
            </div>
        </div>

        <!-- Main Content -->
        <div class="col-lg-9">
            <!-- Welcome Section -->
            <div class="card-premium mb-4">
                <div class="card-premium-body">
                    <div class="d-flex align-items-center justify-content-between">
                        <div>
                            <h2 class="fw-bold mb-2">Bienvenue, <?= esc($user['nom'] ?? 'Utilisateur') ?>!</h2>
                            <p class="text-muted mb-0">Voici un résumé de votre progression aujourd'hui</p>
                        </div>
                        <div class="text-muted d-none d-md-block">
                            <i class="bi bi-emoji-smile" style="font-size: 3rem;"></i>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Stats Cards -->
            <div class="row g-4 mb-4">
                <div class="col-md-6 col-lg-4" data-animate="slide-in-up">
                    <div class="card-premium">
                        <div class="card-premium-body">
                            <div class="d-flex align-items-center justify-content-between">
                                <div>
                                    <p class="text-muted small mb-1">Poids Actuel</p>
                                    <h4 class="fw-bold mb-0">75 kg</h4>
                                </div>
                                <div style="width: 60px; height: 60px; border-radius: 50%; background: rgba(34, 197, 94, 0.1); display: flex; align-items: center; justify-content: center; color: var(--primary-color); font-size: 1.5rem;">
                                    <i class="bi bi-speedometer2"></i>
                                </div>
                            </div>
                            <small class="text-success mt-3 d-block"><i class="bi bi-arrow-down-short"></i> -5 kg depuis le début</small>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4" data-animate="slide-in-up">
                    <div class="card-premium">
                        <div class="card-premium-body">
                            <div class="d-flex align-items-center justify-content-between">
                                <div>
                                    <p class="text-muted small mb-1">Calories Aujourd'hui</p>
                                    <h4 class="fw-bold mb-0">1500 / 2000</h4>
                                </div>
                                <div style="width: 60px; height: 60px; border-radius: 50%; background: rgba(249, 115, 22, 0.1); display: flex; align-items: center; justify-content: center; color: var(--secondary-color); font-size: 1.5rem;">
                                    <i class="bi bi-fire"></i>
                                </div>
                            </div>
                            <div class="progress mt-3" style="height: 4px;">
                                <div class="progress-bar bg-warning" role="progressbar" style="width: 75%;" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4" data-animate="slide-in-up">
                    <div class="card-premium">
                        <div class="card-premium-body">
                            <div class="d-flex align-items-center justify-content-between">
                                <div>
                                    <p class="text-muted small mb-1">Jours Actifs</p>
                                    <h4 class="fw-bold mb-0">24 / 30</h4>
                                </div>
                                <div style="width: 60px; height: 60px; border-radius: 50%; background: rgba(34, 197, 94, 0.1); display: flex; align-items: center; justify-content: center; color: var(--primary-color); font-size: 1.5rem;">
                                    <i class="bi bi-calendar-check"></i>
                                </div>
                            </div>
                            <small class="text-success mt-3 d-block"><i class="bi bi-star-fill"></i> Excellente consistance!</small>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Current Regime -->
            <div class="row g-4 mb-4">
                <div class="col-md-6" data-animate="slide-in-up">
                    <div class="card-premium">
                        <div class="card-premium-body">
                            <h5 class="fw-bold mb-3">Régime Actif</h5>
                            <div style="padding: 1rem; background: linear-gradient(135deg, rgba(34, 197, 94, 0.2) 0%, rgba(249, 115, 22, 0.1) 100%); border-radius: 10px; margin-bottom: 1rem;">
                                <h6 class="fw-bold">Détox Océane</h6>
                                <p class="text-muted small mb-0">Régime léger basé sur les produits de la mer</p>
                            </div>
                            <div class="d-flex justify-content-between align-items-center small mb-2">
                                <span class="text-muted">Progression</span>
                                <strong>15 / 30 jours</strong>
                            </div>
                            <div class="progress" style="height: 8px;">
                                <div class="progress-bar" role="progressbar" style="width: 50%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <a href="<?= base_url('regime/1') ?>" class="btn btn-sm btn-outline-success w-100 mt-3">
                                <i class="bi bi-eye"></i> Voir les détails
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-md-6" data-animate="slide-in-up">
                    <div class="card-premium">
                        <div class="card-premium-body">
                            <h5 class="fw-bold mb-3">Prochains Repas</h5>
                            <div class="list-group list-group-flush">
                                <div class="list-group-item px-0 py-2 border-0 d-flex justify-content-between align-items-center">
                                    <div>
                                        <strong class="d-block small">Déjeuner</strong>
                                        <span class="text-muted small">Filet de saumon grillé</span>
                                    </div>
                                    <span class="badge badge-success-premium">12:00</span>
                                </div>
                                <div class="list-group-item px-0 py-2 border-0 d-flex justify-content-between align-items-center">
                                    <div>
                                        <strong class="d-block small">Goûter</strong>
                                        <span class="text-muted small">Fruit + Yaourt</span>
                                    </div>
                                    <span class="badge badge-success-premium">16:00</span>
                                </div>
                                <div class="list-group-item px-0 py-2 border-0 d-flex justify-content-between align-items-center">
                                    <div>
                                        <strong class="d-block small">Dîner</strong>
                                        <span class="text-muted small">Blanc de poulet rôti</span>
                                    </div>
                                    <span class="badge badge-success-premium">19:30</span>
                                </div>
                            </div>
                            <a href="<?= base_url('user/planning') ?>" class="btn btn-sm btn-outline-success w-100 mt-3">
                                <i class="bi bi-calendar2"></i> Voir le planning
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Recent Activity -->
            <div class="card-premium" data-animate="slide-in-up">
                <div class="card-premium-body">
                    <h5 class="fw-bold mb-3">Activité Récente</h5>
                    <div class="timeline">
                        <div class="d-flex gap-3 pb-3 mb-3 border-bottom">
                            <div>
                                <div style="width: 40px; height: 40px; border-radius: 50%; background: rgba(34, 197, 94, 0.2); display: flex; align-items: center; justify-content: center; color: var(--primary-color);">
                                    <i class="bi bi-check-circle"></i>
                                </div>
                            </div>
                            <div>
                                <strong class="d-block small">Repas Enregistré</strong>
                                <span class="text-muted small">Filet de Colin - 220 kcal</span>
                                <small class="text-muted">Il y a 2 heures</small>
                            </div>
                        </div>

                        <div class="d-flex gap-3 pb-3 mb-3 border-bottom">
                            <div>
                                <div style="width: 40px; height: 40px; border-radius: 50%; background: rgba(34, 197, 94, 0.2); display: flex; align-items: center; justify-content: center; color: var(--primary-color);">
                                    <i class="bi bi-activity"></i>
                                </div>
                            </div>
                            <div>
                                <strong class="d-block small">Activité Enregistrée</strong>
                                <span class="text-muted small">Course à pied - 45 minutes</span>
                                <small class="text-muted">Aujourd'hui à 07:00</small>
                            </div>
                        </div>

                        <div class="d-flex gap-3">
                            <div>
                                <div style="width: 40px; height: 40px; border-radius: 50%; background: rgba(34, 197, 94, 0.2); display: flex; align-items: center; justify-content: center; color: var(--primary-color);">
                                    <i class="bi bi-graph-up"></i>
                                </div>
                            </div>
                            <div>
                                <strong class="d-block small">Poids Enregistré</strong>
                                <span class="text-muted small">75 kg</span>
                                <small class="text-muted">Hier à 08:30</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
