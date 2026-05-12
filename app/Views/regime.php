<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Liste des regimes • Gestion d'alimentation</title>

    <link href="/assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="/assets/css/theme.css" rel="stylesheet">
</head>
<body class="bg-light">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="/">Gestion d'alimentation</a>
        </div>
        <div class="d-flex gap-2">
            <a href="/mes-regimes" class="btn btn-outline-light">Mes regimes</a>
            <a href="/acheterGold" class="btn btn-outline-light">Acheter Offre Gold</a>
            <a href="/portefeuille" class="btn btn-primary">Consulter Portefeuille</a>
        </div>
    </nav>

    <main class="container py-4">
        <div class="p-4 p-md-5 rounded-3 bg-white border mb-4">
            <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3">
                <div>
                    <h1 class="h3 mb-2">Regimes proposes</h1>
                    <p class="text-muted mb-0">Choisis le regime qui correspond a ton objectif.</p>
                </div>
                <div>
                    <a href="/regime/export-pdf" class="btn btn-outline-primary">
                        Exporter PDF
                    </a>
                </div>
            </div>
        </div>

        <?php $exportError = session()->getFlashdata('error'); ?>
        <?php if ($exportError): ?>
            <div class="alert alert-danger" role="alert">
                <?= esc($exportError) ?>
            </div>
        <?php endif; ?>

        <?php if (session('IMC') !== null): ?>
            <div class="alert alert-info" role="alert">
                IMC actuel : <strong><?= esc(number_format((float) session('IMC'), 1)) ?></strong>
            </div>
        <?php endif; ?>

        <div class="row g-4">
            <?= $this->extend('layouts/main') ?>

<?= $this->section('title') ?>Nos Régimes - NutriLife<?= $this->endSection() ?>

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

    .regime-card-modern {
        background: white;
        border-radius: 1.5rem;
        padding: 2rem;
        box-shadow: 0 4px 15px rgba(15, 118, 110, 0.08);
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        height: 100%;
        display: flex;
        flex-direction: column;
        position: relative;
        overflow: hidden;
    }

    .regime-card-modern:hover {
        transform: translateY(-10px);
        box-shadow: 0 15px 40px rgba(15, 118, 110, 0.15);
    }

    .regime-badge {
        position: absolute;
        top: 1.5rem;
        right: 1.5rem;
        background: linear-gradient(135deg, #0F766E 0%, #14B8A6 100%);
        color: white;
        padding: 0.5rem 1rem;
        border-radius: 2rem;
        font-size: 0.85rem;
        font-weight: 600;
    }

    .regime-title {
        font-size: 1.3rem;
        font-weight: 700;
        color: #1F2937;
        margin-bottom: 1.5rem;
        margin-top: 0.5rem;
    }

    .regime-stat {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 0.8rem 0;
        border-bottom: 1px solid #E5E7EB;
    }

    .regime-stat:last-child {
        border-bottom: none;
    }

    .regime-stat-label {
        color: #6B7280;
        font-size: 0.95rem;
    }

    .regime-stat-value {
        font-weight: 700;
        color: #1F2937;
        font-size: 1.05rem;
    }

    .regime-stat-value.price {
        color: #0F766E;
        font-size: 1.3rem;
    }

    .regime-activities {
        background: linear-gradient(135deg, rgba(15, 118, 110, 0.05) 0%, rgba(245, 158, 11, 0.02) 100%);
        border-radius: 1rem;
        padding: 1.2rem;
        margin-bottom: 1.5rem;
    }

    .regime-activities h5 {
        color: #1F2937;
        font-size: 0.9rem;
        font-weight: 700;
        margin-bottom: 0.8rem;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .activity-item {
        color: #6B7280;
        font-size: 0.9rem;
        padding: 0.4rem 0;
    }

    .activity-item i {
        color: #0F766E;
        margin-right: 0.5rem;
    }

    .regime-buttons {
        display: flex;
        gap: 1rem;
        margin-top: auto;
    }

    .btn-regime {
        flex: 1;
        padding: 1rem;
        border: none;
        border-radius: 0.75rem;
        font-weight: 700;
        text-decoration: none;
        cursor: pointer;
        transition: all 0.3s;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 0.5rem;
    }

    .btn-regime-primary {
        background: linear-gradient(135deg, #0F766E 0%, #14B8A6 100%);
        color: white;
        box-shadow: 0 4px 15px rgba(15, 118, 110, 0.3);
    }

    .btn-regime-primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 25px rgba(15, 118, 110, 0.4);
        color: white;
    }

    .btn-regime-disabled {
        background: #E5E7EB;
        color: #9CA3AF;
        cursor: not-allowed;
    }

    .imc-banner {
        background: linear-gradient(135deg, #0F766E 0%, #14B8A6 100%);
        color: white;
        padding: 1.5rem;
        border-radius: 1.5rem;
        margin-bottom: 2rem;
        box-shadow: 0 10px 30px rgba(15, 118, 110, 0.2);
    }

    .imc-value {
        font-size: 2rem;
        font-weight: 800;
        color: #FCD34D;
    }

    .export-btn {
        background: linear-gradient(135deg, #F59E0B 0%, #D97706 100%);
        color: white;
        padding: 0.8rem 1.5rem;
        border-radius: 0.75rem;
        text-decoration: none;
        font-weight: 600;
        transition: all 0.3s;
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        border: none;
        cursor: pointer;
    }

    .export-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(245, 158, 11, 0.3);
        color: white;
    }

    .back-btn {
        color: #0F766E;
        text-decoration: none;
        font-weight: 600;
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        transition: color 0.3s;
    }

    .back-btn:hover {
        color: #14B8A6;
    }
</style>

<div class="regimes-hero">
    <div class="container">
        <div class="d-flex justify-content-between align-items-start gap-3 flex-wrap">
            <div>
                <h1>Nos Régimes Premium</h1>
                <p>Choisissez le régime qui correspond à votre objectif</p>
            </div>
            <a href="<?= base_url('regime/export-pdf') ?>" class="export-btn" title="Exporter les régimes en PDF">
                <i class="bi bi-file-pdf"></i> Exporter PDF
            </a>
        </div>
    </div>
</div>

<div class="container">
    <!-- Erreur d'export -->
    <?php $exportError = session()->getFlashdata('error'); ?>
    <?php if ($exportError): ?>
        <div style="background: #FEE2E2; border: 1px solid #FECACA; color: #991B1B; padding: 1rem; border-radius: 0.75rem; margin-bottom: 2rem; display: flex; gap: 0.8rem;">
            <i class="bi bi-exclamation-circle" style="flex-shrink: 0;"></i>
            <div><?= esc($exportError) ?></div>
        </div>
    <?php endif; ?>

    <!-- IMC Actuel -->
    <?php if (session('IMC') !== null): ?>
        <div class="imc-banner">
            <div style="display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap;">
                <div>
                    <div style="opacity: 0.9; margin-bottom: 0.3rem;">Votre IMC actuel</div>
                    <div class="imc-value"><?= number_format((float) session('IMC'), 1) ?></div>
                </div>
                <div style="opacity: 0.9;">
                    <p style="margin: 0; font-size: 0.9rem;"><i class="bi bi-heart-fill"></i> Continuez vos efforts pour atteindre votre objectif!</p>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <!-- Grid des Régimes -->
    <div class="row g-4 mb-4">
        <?php foreach ($regimes as $regime): ?>
            <div class="col-12 col-md-6 col-lg-4">
                <div class="regime-card-modern">
                    <?php if (!empty($regime['is_bought'])): ?>
                        <div class="regime-badge">
                            <i class="bi bi-check-circle-fill"></i> Acheté
                        </div>
                    <?php endif; ?>

                    <h3 class="regime-title"><?= esc($regime['nom'] ?? 'Programme') ?></h3>

                    <div style="margin-bottom: 1.5rem;">
                        <div class="regime-stat">
                            <span class="regime-stat-label"><i class="bi bi-speedometer2"></i> Impact/semaine</span>
                            <span class="regime-stat-value"><?= esc($regime['poids_impact_semaine'] ?? '0') ?> kg</span>
                        </div>
                        <div class="regime-stat">
                            <span class="regime-stat-label"><i class="bi bi-calendar-event"></i> Durée</span>
                            <span class="regime-stat-value"><?= esc($regime['duree_jours'] ?? '0') ?> jours</span>
                        </div>
                        <div class="regime-stat">
                            <span class="regime-stat-label"><i class="bi bi-cash-coin"></i> Prix/jour</span>
                            <span class="regime-stat-value"><?= number_format((float) ($regime['prix_journalier'] ?? 0), 2) ?> Ar</span>
                        </div>
                        <div class="regime-stat">
                            <span class="regime-stat-label"><i class="bi bi-tag"></i> Prix total</span>
                            <span class="regime-stat-value price"><?= number_format((float) ($regime['prix_total'] ?? 0), 2) ?> Ar</span>
                        </div>
                    </div>

                    <?php if (!empty($regime['activites'])): ?>
                        <div class="regime-activities">
                            <h5><i class="bi bi-lightning-fill" style="color: #F59E0B;"></i> Activités conseillées</h5>
                            <?php foreach ($regime['activites'] as $act): ?>
                                <div class="activity-item">
                                    <i class="bi bi-check-circle"></i>
                                    <strong><?= esc($act['name'] ?? 'Activité') ?></strong> - <?= esc($act['duree_minutes_jour'] ?? '0') ?> min/jour
                                </div>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>

                    <div class="regime-buttons">
                        <?php if (!empty($regime['is_bought'])): ?>
                            <button class="btn-regime btn-regime-disabled" disabled>
                                <i class="bi bi-check-lg"></i> Régime acheté
                            </button>
                        <?php else: ?>
                            <a href="<?= base_url('details/' . ($regime['id'] ?? '#')) ?>" class="btn-regime btn-regime-primary">
                                <i class="bi bi-arrow-right"></i> Voir détails
                            </a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

    <!-- Bouton Retour -->
    <div class="mb-4">
        <a href="<?= base_url('objectif') ?>" class="back-btn">
            <i class="bi bi-arrow-left"></i> Retour aux objectifs
        </a>
    </div>
</div>

<?= $this->endSection() ?>
        </div>

        <div class="mt-4">
            <a href="/objectif" class="btn btn-outline-secondary">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left me-2" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M12 8a.5.5 0 0 1-.5.5H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5a.5.5 0 0 1 .5.5z"/>
                </svg>
                Retour
            </a>
        </div>
    </main>

    <script src="/assets/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>