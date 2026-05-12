<?= $this->extend('layouts/main') ?>

<?= $this->section('title') ?>Portefeuille - NutriLife<?= $this->endSection() ?>

<?= $this->section('content') ?>

<style>
    .wallet-hero {
        background: linear-gradient(135deg, rgba(15, 118, 110, 0.1) 0%, rgba(245, 158, 11, 0.05) 100%);
        padding: 3rem 0;
        margin-bottom: 3rem;
    }

    .wallet-hero h1 {
        font-size: 2.5rem;
        font-weight: 800;
        color: #1F2937;
        margin-bottom: 0.5rem;
    }

    .wallet-hero p {
        color: #6B7280;
        font-size: 1.1rem;
    }

    .wallet-container {
        max-width: 600px;
        margin: 0 auto;
    }

    .balance-card {
        background: linear-gradient(135deg, #0F766E 0%, #14B8A6 100%);
        color: white;
        border-radius: 1.5rem;
        padding: 2.5rem;
        margin-bottom: 2rem;
        box-shadow: 0 10px 40px rgba(15, 118, 110, 0.2);
        text-align: center;
    }

    .balance-label {
        opacity: 0.9;
        font-size: 0.95rem;
        margin-bottom: 0.5rem;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 0.5rem;
    }

    .balance-amount {
        font-size: 3rem;
        font-weight: 800;
        color: #FCD34D;
    }

    .recharge-card {
        background: white;
        border-radius: 1.5rem;
        padding: 2.5rem 2rem;
        box-shadow: 0 4px 15px rgba(15, 118, 110, 0.08);
        margin-bottom: 2rem;
    }

    .recharge-card h3 {
        font-size: 1.1rem;
        font-weight: 700;
        color: #1F2937;
        margin-bottom: 1.5rem;
    }

    .form-group {
        margin-bottom: 1.5rem;
    }

    .form-label {
        display: block;
        font-weight: 600;
        color: #1F2937;
        margin-bottom: 0.5rem;
        font-size: 0.95rem;
    }

    .form-input {
        width: 100%;
        padding: 1rem;
        border: 2px solid #E5E7EB;
        border-radius: 0.75rem;
        font-size: 1rem;
        transition: all 0.3s;
        font-family: 'Inter', sans-serif;
    }

    .form-input:focus {
        outline: none;
        border-color: #0F766E;
        box-shadow: 0 0 0 3px rgba(15, 118, 110, 0.1);
    }

    .btn-validate {
        width: 100%;
        padding: 1rem;
        background: linear-gradient(135deg, #0F766E 0%, #14B8A6 100%);
        color: white;
        border: none;
        border-radius: 0.75rem;
        font-weight: 700;
        cursor: pointer;
        transition: all 0.3s;
        box-shadow: 0 4px 15px rgba(15, 118, 110, 0.3);
    }

    .btn-validate:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 25px rgba(15, 118, 110, 0.4);
    }

    .btn-back {
        width: 100%;
        padding: 1rem;
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

    .alert-success {
        background: #D1FAE5;
        border: 1px solid #A7F3D0;
        color: #065F46;
        padding: 1rem;
        border-radius: 0.75rem;
        display: flex;
        gap: 0.8rem;
        margin-bottom: 1.5rem;
    }

    .alert-error {
        background: #FEE2E2;
        border: 1px solid #FECACA;
        color: #991B1B;
        padding: 1rem;
        border-radius: 0.75rem;
        display: flex;
        gap: 0.8rem;
        margin-bottom: 1.5rem;
    }
</style>

<div class="wallet-hero">
    <div class="container">
        <div style="display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 1.5rem;">
            <div>
                <h1>Gestion du Portefeuille</h1>
                <p>Recharge et manage ton solde facilement</p>
            </div>
            <a href="<?= base_url('objectif') ?>" style="padding: 0.8rem 1.5rem; background: linear-gradient(135deg, #0F766E 0%, #14B8A6 100%); color: white; border-radius: 0.75rem; font-weight: 600; display: inline-flex; align-items: center; gap: 0.5rem; text-decoration: none; white-space: nowrap;">
                <i class="bi bi-bag-check"></i> Voir les régimes
            </a>
        </div>
    </div>
</div>

<div class="container">
    <div class="wallet-container">
        <?php if (isset($success)): ?>
            <div class="alert-success">
                <i class="bi bi-check-circle-fill" style="flex-shrink: 0;"></i>
                <div><?= esc($success) ?></div>
            </div>
        <?php endif; ?>

        <?php if (isset($error)): ?>
            <div class="alert-error">
                <i class="bi bi-exclamation-circle-fill" style="flex-shrink: 0;"></i>
                <div><?= esc($error) ?></div>
            </div>
        <?php endif; ?>

        <div class="balance-card">
            <div class="balance-label">
                <i class="bi bi-wallet-fill"></i>
                Solde actuel
            </div>
            <div class="balance-amount" id="wallet-balance"><?= esc(number_format((float) ($solde ?? 0), 2)) ?> Ar</div>
        </div>

        <div class="recharge-card">
            <h3><i class="bi bi-gift-fill" style="color: #F59E0B; margin-right: 0.5rem;"></i>Ajouter des fonds</h3>
            <form id="recharge-form" action="/saisisCode" method="post" data-ajax-url="/saisisCode">
                <?= csrf_field() ?>
                <div class="form-group">
                    <label for="code" class="form-label">Code de recharge</label>
                    <input type="text" class="form-input" name="code" id="code" placeholder="Entrez votre code de recharge" required>
                </div>
                <button type="submit" class="btn-validate">Valider le code</button>
            </form>
        </div>

        <a href="/retourRegimes" class="btn-back">
            <i class="bi bi-arrow-left"></i>
            Retour aux régimes
        </a>
    </div>
</div>

<?= $this->endSection() ?>