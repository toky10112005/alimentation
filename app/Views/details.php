<?= $this->extend('layouts/main') ?>

<?= $this->section('title') ?>Détails du régime - NutriLife<?= $this->endSection() ?>

<?= $this->section('content') ?>

<style>
    .details-hero {
        background: linear-gradient(135deg, rgba(15, 118, 110, 0.1) 0%, rgba(245, 158, 11, 0.05) 100%);
        padding: 2.5rem 0;
        margin-bottom: 2.5rem;
    }

    .details-hero h1 {
        font-size: 2rem;
        font-weight: 800;
        color: #1F2937;
        margin-bottom: 0.5rem;
    }

    .gold-badge {
        background: linear-gradient(135deg, #F59E0B 0%, #D97706 100%);
        color: white;
        padding: 0.5rem 1.2rem;
        border-radius: 2rem;
        font-weight: 600;
        font-size: 0.9rem;
        display: inline-block;
    }

    .info-card {
        background: white;
        border-radius: 1.5rem;
        padding: 2.5rem 2rem;
        box-shadow: 0 4px 15px rgba(15, 118, 110, 0.08);
        margin-bottom: 2rem;
    }

    .info-row {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 1.2rem 0;
        border-bottom: 1px solid #E5E7EB;
    }

    .info-row:last-child {
        border-bottom: none;
    }

    .info-label {
        color: #6B7280;
        font-size: 0.95rem;
        font-weight: 500;
    }

    .info-value {
        font-weight: 700;
        color: #1F2937;
        font-size: 1.05rem;
    }

    .price-highlight {
        color: #0F766E;
        font-size: 1.3rem;
    }

    .price-strikethrough {
        color: #9CA3AF;
        text-decoration: line-through;
        font-size: 0.9rem;
    }

    .proportion-bars {
        display: flex;
        flex-direction: column;
        gap: 1.5rem;
    }

    .bar-item {
        display: flex;
        flex-direction: column;
        gap: 0.5rem;
    }

    .bar-label {
        font-size: 0.95rem;
        color: #6B7280;
        font-weight: 500;
    }

    .bar-container {
        height: 8px;
        background: #E5E7EB;
        border-radius: 4px;
        overflow: hidden;
    }

    .bar-fill {
        height: 100%;
        background: linear-gradient(90deg, #0F766E 0%, #14B8A6 100%);
        border-radius: 4px;
    }

    .activities-section {
        background: linear-gradient(135deg, rgba(15, 118, 110, 0.05) 0%, rgba(245, 158, 11, 0.02) 100%);
        border-radius: 1.5rem;
        padding: 2rem;
    }

    .activities-section h3 {
        font-size: 1.1rem;
        font-weight: 700;
        color: #1F2937;
        margin-bottom: 1.5rem;
    }

    .activity-item {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 1rem 0;
        border-bottom: 1px solid rgba(31, 41, 55, 0.1);
    }

    .activity-item:last-child {
        border-bottom: none;
    }

    .activity-name {
        font-weight: 600;
        color: #1F2937;
    }

    .activity-duration {
        color: #6B7280;
        font-size: 0.9rem;
    }

    .action-buttons {
        display: flex;
        gap: 1rem;
        margin-top: 2rem;
    }

    .btn-buy {
        flex: 1;
        padding: 1rem 1.5rem;
        background: linear-gradient(135deg, #0F766E 0%, #14B8A6 100%);
        color: white;
        border: none;
        border-radius: 0.75rem;
        font-weight: 700;
        cursor: pointer;
        text-decoration: none;
        transition: all 0.3s;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 0.5rem;
        box-shadow: 0 4px 15px rgba(15, 118, 110, 0.3);
    }

    .btn-buy:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 25px rgba(15, 118, 110, 0.4);
        color: white;
    }

    .btn-bought {
        background: #10B981;
        box-shadow: 0 4px 15px rgba(16, 185, 129, 0.2);
    }

    .btn-back {
        padding: 1rem 1.5rem;
        background: white;
        color: #0F766E;
        border: 2px solid #0F766E;
        border-radius: 0.75rem;
        font-weight: 700;
        cursor: pointer;
        text-decoration: none;
        transition: all 0.3s;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 0.5rem;
    }

    .btn-back:hover {
        background: #0F766E;
        color: white;
    }

    @media (max-width: 768px) {
        .details-hero h1 {
            font-size: 1.5rem;
        }
        .action-buttons {
            flex-direction: column;
        }
    }
</style>

<div class="details-hero">
    <div class="container">
        <div style="display: flex; justify-content: space-between; align-items: start; flex-wrap: wrap; gap: 1.5rem;">
            <div>
                <h1><?= esc($regime['name'] ?? 'Régime') ?></h1>
            </div>
            <div style="display: flex; gap: 1rem; flex-wrap: wrap;">
                <?php if (!empty($isGold)): ?>
                    <div class="gold-badge">
                        <i class="bi bi-star-fill" style="margin-right: 0.5rem;"></i>
                        Remise GOLD -<?= esc($remisePercentage) ?>%
                    </div>
                <?php endif; ?>
                <a href="<?= base_url('portefeuille') ?>" style="padding: 0.5rem 1.2rem; background: linear-gradient(135deg, #F59E0B 0%, #D97706 100%); color: white; border-radius: 2rem; font-weight: 600; font-size: 0.9rem; display: inline-flex; align-items: center; gap: 0.5rem; text-decoration: none;">
                    <i class="bi bi-wallet2"></i> Mon Portefeuille
                </a>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <?php if (isset($error)): ?>
        <div style="background: #FEE2E2; border: 1px solid #FECACA; color: #991B1B; padding: 1.5rem; border-radius: 1rem; display: flex; gap: 1rem; margin-bottom: 2rem;">
            <i class="bi bi-exclamation-circle" style="flex-shrink: 0; font-size: 1.2rem;"></i>
            <div><?= esc($error) ?></div>
        </div>
    <?php else: ?>
        <div class="row g-4">
            <div class="col-12 col-lg-7">
                <div class="info-card">
                    <div class="info-row">
                        <span class="info-label"><i class="bi bi-weight" style="color: #0F766E; margin-right: 0.5rem;"></i>Poids minimal d'impact</span>
                        <span class="info-value"><?= esc($regime['poids_minimal_impact']) ?> kg</span>
                    </div>
                    <div class="info-row">
                        <span class="info-label"><i class="bi bi-calendar-event" style="color: #0F766E; margin-right: 0.5rem;"></i>Durée</span>
                        <span class="info-value"><?= esc($regime['duree_jours']) ?> jours</span>
                    </div>
                    <div class="info-row">
                        <span class="info-label"><i class="bi bi-cash-coin" style="color: #0F766E; margin-right: 0.5rem;"></i>Prix total</span>
                        <div style="text-align: right;">
                            <?php if (!empty($isGold)): ?>
                                <div class="price-strikethrough"><?= esc(number_format((float) $regime['prix_total'], 2)) ?> Ar</div>
                                <div class="price-highlight"><?= esc(number_format((float) $prixRemise, 2)) ?> Ar</div>
                            <?php else: ?>
                                <div class="price-highlight"><?= esc(number_format((float) $regime['prix_total'], 2)) ?> Ar</div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>

                <div class="info-card">
                    <h3 style="font-size: 1.1rem; font-weight: 700; color: #1F2937; margin-bottom: 1.5rem;">
                        <i class="bi bi-pie-chart" style="color: #F59E0B; margin-right: 0.5rem;"></i>
                        Composition nutritionnelle
                    </h3>
                    <div class="proportion-bars">
                        <div class="bar-item">
                            <div style="display: flex; justify-content: space-between;">
                                <span class="bar-label">Viande</span>
                                <span style="color: #1F2937; font-weight: 600;"><?= esc($regime['p_viande']) ?>%</span>
                            </div>
                            <div class="bar-container">
                                <div class="bar-fill" style="width: <?= esc($regime['p_viande']) ?>%"></div>
                            </div>
                        </div>
                        <div class="bar-item">
                            <div style="display: flex; justify-content: space-between;">
                                <span class="bar-label">Volaille</span>
                                <span style="color: #1F2937; font-weight: 600;"><?= esc($regime['p_volaille']) ?>%</span>
                            </div>
                            <div class="bar-container">
                                <div class="bar-fill" style="width: <?= esc($regime['p_volaille']) ?>%"></div>
                            </div>
                        </div>
                        <div class="bar-item">
                            <div style="display: flex; justify-content: space-between;">
                                <span class="bar-label">Poisson</span>
                                <span style="color: #1F2937; font-weight: 600;"><?= esc($regime['p_poisson']) ?>%</span>
                            </div>
                            <div class="bar-container">
                                <div class="bar-fill" style="width: <?= esc($regime['p_poisson']) ?>%"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="action-buttons">
                    <?php if (isset($regimeBought) && $regimeBought): ?>
                        <button class="btn-buy btn-bought" disabled>
                            <i class="bi bi-check-circle"></i>
                            Régime acheté
                        </button>
                    <?php else: ?>
                        <a href="/acheterRegime/<?= esc($regime['id']) ?>" class="btn-buy">
                            <i class="bi bi-bag-check"></i>
                            Acheter ce régime
                        </a>
                    <?php endif; ?>
                    <button class="btn-back" onclick="history.back()">
                        <i class="bi bi-arrow-left"></i>
                        Retour
                    </button>
                </div>
            </div>

            <div class="col-12 col-lg-5">
                <div class="activities-section">
                    <h3><i class="bi bi-lightning-fill" style="color: #F59E0B;"></i> Activités conseillées</h3>
                    <div>
                        <?php foreach ($activite as $act): ?>
                            <div class="activity-item">
                                <span class="activity-name"><?= esc($act['name']) ?></span>
                                <span class="activity-duration"><?= esc($act['duree']) ?> min/jour</span>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>
</div>

<?= $this->endSection() ?>