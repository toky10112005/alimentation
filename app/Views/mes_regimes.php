<?= $this->extend('layouts/main') ?>

<?= $this->section('title') ?>Mes régimes - NutriLife<?= $this->endSection() ?>

<?= $this->section('content') ?>

<style>
    .regimes-hero {
        background: linear-gradient(135deg, rgba(15, 118, 110, 0.1) 0%, rgba(245, 158, 11, 0.05) 100%);
        padding: 3rem 0;
        margin-bottom: 3rem;
    }

    .regimes-hero h1 {
        font-size: 2.5rem;
        font-weight: 800;
        color: #1F2937;
        margin-bottom: 0.5rem;
    }

    .regimes-hero p {
        color: #6B7280;
        font-size: 1.1rem;
    }

    .accordion-item {
        border: 1px solid #E5E7EB;
        border-radius: 1rem;
        margin-bottom: 1.5rem;
        box-shadow: 0 2px 8px rgba(15, 118, 110, 0.05);
        background: white;
        overflow: hidden;
    }

    .accordion-button {
        padding: 1.5rem;
        font-weight: 600;
        background: white;
        border: none;
        color: #1F2937;
    }

    .accordion-button:not(.collapsed) {
        background: linear-gradient(135deg, rgba(15, 118, 110, 0.05) 0%, rgba(245, 158, 11, 0.02) 100%);
        box-shadow: none;
    }

    .accordion-button:focus {
        border-color: #0F766E;
        box-shadow: 0 0 0 3px rgba(15, 118, 110, 0.1);
    }

    .accordion-body {
        padding: 2rem;
        background: white;
    }

    .regime-stat-box {
        background: linear-gradient(135deg, rgba(15, 118, 110, 0.05) 0%, rgba(245, 158, 11, 0.02) 100%);
        border-radius: 1rem;
        padding: 1.5rem;
        text-align: center;
        border: 1px solid rgba(15, 118, 110, 0.1);
    }

    .stat-label {
        color: #6B7280;
        font-size: 0.9rem;
        margin-bottom: 0.5rem;
    }

    .stat-value {
        font-size: 1.5rem;
        font-weight: 800;
        color: #0F766E;
    }

    .day-section {
        margin-bottom: 2.5rem;
    }

    .day-title {
        font-size: 1rem;
        font-weight: 700;
        color: #1F2937;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        margin-bottom: 1.5rem;
        padding-bottom: 1rem;
        border-bottom: 2px solid #0F766E;
    }

    .meal-card {
        background: white;
        border-radius: 1rem;
        padding: 1.5rem;
        border: 2px solid #E5E7EB;
        transition: all 0.3s;
    }

    .meal-card:hover {
        border-color: #0F766E;
        box-shadow: 0 4px 15px rgba(15, 118, 110, 0.1);
    }

    .meal-title {
        font-weight: 700;
        color: #1F2937;
        margin-bottom: 1rem;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    .dish-item {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 0.7rem 0;
        border-bottom: 1px solid #E5E7EB;
    }

    .dish-item:last-child {
        border-bottom: none;
    }

    .dish-name {
        color: #1F2937;
        font-weight: 500;
    }

    .dish-calories {
        color: #6B7280;
        font-size: 0.9rem;
        background: #F3F4F6;
        padding: 0.3rem 0.8rem;
        border-radius: 0.5rem;
    }

    .btn-details {
        padding: 1rem 2rem;
        background: linear-gradient(135deg, #0F766E 0%, #14B8A6 100%);
        color: white;
        border: none;
        border-radius: 0.75rem;
        font-weight: 600;
        cursor: pointer;
        text-decoration: none;
        transition: all 0.3s;
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
    }

    .btn-details:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(15, 118, 110, 0.3);
        color: white;
    }

    .empty-state {
        background: linear-gradient(135deg, rgba(15, 118, 110, 0.05) 0%, rgba(245, 158, 11, 0.02) 100%);
        border: 2px dashed #0F766E;
        border-radius: 1.5rem;
        padding: 3rem;
        text-align: center;
        color: #6B7280;
    }

    .empty-state i {
        font-size: 3rem;
        color: #0F766E;
        margin-bottom: 1rem;
    }
</style>

<div class="regimes-hero">
    <div class="container">
        <div style="display: flex; justify-content: space-between; align-items: start; flex-wrap: wrap; gap: 1.5rem;">
            <div>
                <h1>Mes régimes achetés</h1>
                <p>Retrouve tous tes régimes avec les plats et le plan par jour</p>
            </div>
            <div style="display: flex; gap: 1rem; flex-wrap: wrap;">
                <a href="<?= base_url('portefeuille') ?>" style="padding: 0.8rem 1.5rem; background: linear-gradient(135deg, #F59E0B 0%, #D97706 100%); color: white; border-radius: 0.75rem; font-weight: 600; display: inline-flex; align-items: center; gap: 0.5rem; text-decoration: none; white-space: nowrap;">
                    <i class="bi bi-wallet2"></i> Portefeuille
                </a>
                <a href="<?= base_url('objectif') ?>" style="padding: 0.8rem 1.5rem; background: linear-gradient(135deg, #0F766E 0%, #14B8A6 100%); color: white; border-radius: 0.75rem; font-weight: 600; display: inline-flex; align-items: center; gap: 0.5rem; text-decoration: none; white-space: nowrap;">
                    <i class="bi bi-arrow-right"></i> Voir d'autres régimes
                </a>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <?php if (empty($regimes)): ?>
        <div class="empty-state">
            <i class="bi bi-inbox"></i>
            <h3 style="color: #1F2937; margin-bottom: 0.5rem;">Aucun régime acheté</h3>
            <p>Explore nos régimes disponibles pour commencer ta transformation.</p>
            <a href="/objectif" style="display: inline-block; margin-top: 1rem; padding: 0.8rem 2rem; background: linear-gradient(135deg, #0F766E 0%, #14B8A6 100%); color: white; border-radius: 0.75rem; text-decoration: none; font-weight: 600;">
                <i class="bi bi-arrow-right"></i> Voir les régimes
            </a>
        </div>
    <?php else: ?>
        <div class="accordion" id="regimesAchetes">
            <?php foreach ($regimes as $index => $regime): ?>
                <?php $collapseId = 'regime-' . $regime['id'] . '-' . $index; ?>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="heading-<?= esc($collapseId) ?>">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#<?= esc($collapseId) ?>" aria-expanded="false" aria-controls="<?= esc($collapseId) ?>">
                            <div style="width: 100%;">
                                <div style="font-weight: 700; color: #1F2937; font-size: 1.05rem;"><?= esc($regime['nom']) ?></div>
                                <div style="color: #6B7280; font-size: 0.9rem; margin-top: 0.25rem;"><i class="bi bi-calendar"></i> Acheté le <?= esc(date('d/m/Y', strtotime($regime['date_achat']))) ?></div>
                            </div>
                        </button>
                    </h2>
                    <div id="<?= esc($collapseId) ?>" class="accordion-collapse collapse" aria-labelledby="heading-<?= esc($collapseId) ?>" data-bs-parent="#regimesAchetes">
                        <div class="accordion-body">
                            <div class="row g-3 mb-4">
                                <div class="col-12 col-md-4">
                                    <div class="regime-stat-box">
                                        <div class="stat-label"><i class="bi bi-calendar-event"></i> Durée</div>
                                        <div class="stat-value"><?= esc((int) $regime['duree_jours']) ?></div>
                                        <div style="color: #6B7280; font-size: 0.85rem;">jours</div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-4">
                                    <div class="regime-stat-box">
                                        <div class="stat-label"><i class="bi bi-cash-coin"></i> Prix total</div>
                                        <div class="stat-value"><?= esc(number_format((float) $regime['prix_total'], 2)) ?></div>
                                        <div style="color: #6B7280; font-size: 0.85rem;">Ar</div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-4">
                                    <div class="regime-stat-box">
                                        <div class="stat-label"><i class="bi bi-cash"></i> Prix/jour</div>
                                        <div class="stat-value"><?= esc(number_format((float) $regime['prix_journalier'], 2)) ?></div>
                                        <div style="color: #6B7280; font-size: 0.85rem;">Ar</div>
                                    </div>
                                </div>
                            </div>

                            <?php if (empty($regime['plats_par_jour'])): ?>
                                <div class="empty-state" style="padding: 2rem;">
                                    <i class="bi bi-exclamation-triangle"></i>
                                    <p style="margin: 0; color: #6B7280;">Aucun plat défini pour ce régime.</p>
                                </div>
                            <?php else: ?>
                                <?php foreach ($regime['plats_par_jour'] as $jour => $moments): ?>
                                    <div class="day-section">
                                        <div class="day-title">
                                            <i class="bi bi-calendar-day" style="color: #0F766E;"></i>
                                            Jour <?= esc($jour) ?>
                                        </div>
                                        <div class="row g-3">
                                            <?php foreach ($moments as $moment => $plats): ?>
                                                <div class="col-12 col-lg-4">
                                                    <div class="meal-card">
                                                        <div class="meal-title">
                                                            <?php
                                                                $icons = [
                                                                    'petit-déjeuner' => 'bi-sunrise',
                                                                    'déjeuner' => 'bi-sun',
                                                                    'goûter' => 'bi-cloud-sun',
                                                                    'dîner' => 'bi-moon-stars',
                                                                ];
                                                                $icon = $icons[strtolower($moment)] ?? 'bi-utensils';
                                                            ?>
                                                            <i class="bi <?= $icon ?>"></i>
                                                            <?= esc($moment) ?>
                                                        </div>
                                                        <div>
                                                            <?php foreach ($plats as $plat): ?>
                                                                <div class="dish-item">
                                                                    <span class="dish-name"><?= esc($plat['plat']) ?></span>
                                                                    <span class="dish-calories"><?= esc(number_format((float) $plat['calories'], 0)) ?> kcal</span>
                                                                </div>
                                                            <?php endforeach; ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            <?php endif; ?>

                            <div style="margin-top: 2rem; padding-top: 2rem; border-top: 1px solid #E5E7EB;">
                                <a href="/details/<?= esc($regime['id']) ?>" class="btn-details">
                                    <i class="bi bi-arrow-right"></i> Voir les détails du régime
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</div>

<?= $this->endSection() ?>
