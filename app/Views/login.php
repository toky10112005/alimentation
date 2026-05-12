<?= $this->extend('layouts/main') ?>

<?= $this->section('title') ?>Connexion - NutriLife<?= $this->endSection() ?>

<?= $this->section('content') ?>

<style>
    .auth-wrapper {
        min-height: 100vh;
        display: flex;
        align-items: center;
        background: linear-gradient(135deg, #F9FAFB 0%, #ECFDF5 50%, #FFFBEB 100%);
        position: relative;
        overflow: hidden;
    }

    .auth-wrapper::before {
        content: '';
        position: absolute;
        top: -30%;
        right: -10%;
        width: 700px;
        height: 700px;
        background: radial-gradient(circle, rgba(20, 184, 166, 0.2) 0%, transparent 70%);
        border-radius: 50%;
        animation: float 8s ease-in-out infinite;
    }

    @keyframes float {
        0%, 100% { transform: translateY(0px); }
        50% { transform: translateY(-30px); }
    }

    .auth-container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 2rem;
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 3rem;
        align-items: center;
        position: relative;
        z-index: 2;
    }

    .auth-form-wrapper {
        background: white;
        border-radius: 2rem;
        padding: 3rem;
        box-shadow: 0 20px 60px rgba(15, 118, 110, 0.1);
    }

    .auth-form-header {
        text-align: center;
        margin-bottom: 2.5rem;
    }

    .auth-form-header .logo {
        font-size: 3rem;
        color: #F59E0B;
        margin-bottom: 1rem;
    }

    .auth-form-header h2 {
        font-size: 1.8rem;
        font-weight: 700;
        color: #1F2937;
        margin-bottom: 0.5rem;
    }

    .auth-form-header p {
        color: #6B7280;
        font-size: 0.95rem;
    }

    .form-group {
        margin-bottom: 1.5rem;
    }

    .form-label {
        display: block;
        font-weight: 600;
        color: #1F2937;
        margin-bottom: 0.7rem;
        font-size: 0.95rem;
    }

    .form-control {
        width: 100%;
        padding: 0.9rem 1.2rem;
        border: 2px solid #E5E7EB;
        border-radius: 0.75rem;
        font-size: 1rem;
        transition: all 0.3s ease;
        font-family: inherit;
    }

    .form-control:focus {
        outline: none;
        border-color: #0F766E;
        box-shadow: 0 0 0 3px rgba(15, 118, 110, 0.1);
    }

    .input-group {
        position: relative;
    }

    .toggle-password {
        position: absolute;
        right: 1.2rem;
        top: 50%;
        transform: translateY(-50%);
        cursor: pointer;
        color: #6B7280;
        background: none;
        border: none;
        font-size: 1.1rem;
    }

    .form-control-password {
        padding-right: 2.8rem;
    }

    .checkbox-group {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 1.5rem;
    }

    .form-check {
        display: flex;
        align-items: center;
    }

    .form-check-input {
        width: 18px;
        height: 18px;
        margin-right: 0.5rem;
        cursor: pointer;
        accent-color: #0F766E;
    }

    .form-check-label {
        cursor: pointer;
        color: #6B7280;
        margin: 0;
    }

    .forgot-password {
        color: #0F766E;
        text-decoration: none;
        font-weight: 600;
        font-size: 0.95rem;
        transition: color 0.3s;
    }

    .forgot-password:hover {
        color: #14B8A6;
    }

    .btn-submit {
        width: 100%;
        padding: 1rem;
        background: linear-gradient(135deg, #0F766E 0%, #14B8A6 100%);
        color: white;
        border: none;
        border-radius: 0.75rem;
        font-weight: 700;
        font-size: 1rem;
        cursor: pointer;
        transition: all 0.3s;
        box-shadow: 0 4px 15px rgba(15, 118, 110, 0.3);
    }

    .btn-submit:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 25px rgba(15, 118, 110, 0.4);
    }

    .divider {
        text-align: center;
        margin: 2rem 0;
        color: #9CA3AF;
        font-size: 0.9rem;
    }

    .divider::before,
    .divider::after {
        content: '';
        position: absolute;
        top: 50%;
        width: calc(50% - 1.5rem);
        height: 1px;
        background: #E5E7EB;
    }

    .divider::before {
        left: 0;
    }

    .divider::after {
        right: 0;
    }

    .divider {
        position: relative;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .social-buttons {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 1rem;
        margin-bottom: 1.5rem;
    }

    .btn-social {
        padding: 0.85rem;
        border: 2px solid #E5E7EB;
        background: white;
        border-radius: 0.75rem;
        cursor: pointer;
        font-weight: 600;
        color: #1F2937;
        transition: all 0.3s;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 0.5rem;
    }

    .btn-social:hover {
        border-color: #0F766E;
        background: #F0F9FF;
    }

    .auth-signup-link {
        text-align: center;
        padding-top: 1.5rem;
        border-top: 1px solid #E5E7EB;
        color: #6B7280;
    }

    .auth-signup-link a {
        color: #0F766E;
        text-decoration: none;
        font-weight: 700;
        transition: color 0.3s;
    }

    .auth-signup-link a:hover {
        color: #14B8A6;
    }

    .auth-image {
        display: flex;
        flex-direction: column;
        gap: 2rem;
    }

    .auth-image img {
        width: 100%;
        border-radius: 2rem;
        box-shadow: 0 20px 60px rgba(15, 118, 110, 0.15);
        animation: slideInRight 0.8s ease-out 0.2s both;
    }

    @keyframes slideInRight {
        from {
            opacity: 0;
            transform: translateX(50px);
        }
        to {
            opacity: 1;
            transform: translateX(0);
        }
    }

    .auth-benefits {
        background: linear-gradient(135deg, rgba(15, 118, 110, 0.05) 0%, rgba(245, 158, 11, 0.05) 100%);
        border-radius: 1.5rem;
        padding: 1.5rem;
    }

    .auth-benefits h4 {
        color: #1F2937;
        margin-bottom: 1rem;
        font-weight: 700;
    }

    .benefit-item {
        display: flex;
        align-items: center;
        gap: 0.8rem;
        margin-bottom: 0.8rem;
        color: #6B7280;
    }

    .benefit-item i {
        color: #0F766E;
        font-weight: 700;
    }

    .alert-error {
        background: #FEE2E2;
        border: 1px solid #FECACA;
        color: #991B1B;
        padding: 1rem;
        border-radius: 0.75rem;
        margin-bottom: 1.5rem;
        display: flex;
        gap: 0.8rem;
    }

    @media (max-width: 768px) {
        .auth-container {
            grid-template-columns: 1fr;
        }

        .auth-image {
            display: none;
        }

        .auth-form-wrapper {
            padding: 2rem;
        }

        .auth-wrapper::before {
            display: none;
        }
    }
</style>

<div class="auth-wrapper">
    <div class="auth-container">
        <!-- Form Column -->
        <div class="auth-form-wrapper">
            <div class="auth-form-header">
                <div class="logo">
                    <i class="bi bi-leaf-fill"></i>
                </div>
                <h2>Bon Retour!</h2>
                <p>Connectez-vous pour accéder à votre compte</p>
            </div>

            <!-- Erreurs -->
            <?php if (!empty($error) || (session()->has('errors') && session('errors'))): ?>
                <div class="alert-error">
                    <i class="bi bi-exclamation-circle"></i>
                    <div>
                        <strong>Erreur de Connexion!</strong>
                        <?php if (!empty($error)): ?>
                            <div><?= esc($error) ?></div>
                        <?php endif; ?>
                        <?php if (session()->has('errors')): ?>
                            <?php foreach(session('errors') as $err): ?>
                                <div><?= esc($err) ?></div>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endif; ?>

            <!-- Login Form -->
            <form action="<?= base_url('user/login') ?>" method="post">
                <?= csrf_field() ?>

                <div class="form-group">
                    <label class="form-label">Adresse Email</label>
                    <input 
                        type="email" 
                        class="form-control" 
                        name="email" 
                        placeholder="votre.email@example.com"
                        required
                        value="<?= old('email') ?>"
                    >
                </div>

                <div class="form-group">
                    <label class="form-label">Mot de Passe</label>
                    <div class="input-group">
                        <input 
                            type="password" 
                            class="form-control form-control-password" 
                            id="password"
                            name="password" 
                            placeholder="••••••••"
                            required
                        >
                        <button type="button" class="toggle-password" onclick="togglePassword()">
                            <i class="bi bi-eye" id="toggleIcon"></i>
                        </button>
                    </div>
                </div>

                <div class="checkbox-group">
                    <div class="form-check">
                        <input 
                            class="form-check-input" 
                            type="checkbox" 
                            id="remember" 
                            name="remember"
                        >
                        <label class="form-check-label" for="remember">
                            Se souvenir de moi
                        </label>
                    </div>
                    <a href="#" class="forgot-password">Mot de passe oublié?</a>
                </div>

                <button type="submit" class="btn-submit">
                    <i class="bi bi-box-arrow-in-right"></i> Se Connecter
                </button>
            </form>

            <!-- Divider -->
            <div class="divider">ou</div>

            <!-- Social Login -->
            <div class="social-buttons">
                <button class="btn-social">
                    <i class="bi bi-google"></i> Google
                </button>
                <button class="btn-social">
                    <i class="bi bi-facebook"></i> Facebook
                </button>
            </div>

            <!-- Signup Link -->
            <div class="auth-signup-link">
                Pas encore de compte? 
                <a href="<?= base_url('user/register') ?>">S'inscrire maintenant</a>
            </div>
        </div>

        <!-- Image Column -->
        <div class="auth-image">
            <img src="<?= base_url('images/r1.jpeg') ?>" alt="Nutrition et bien-être">
            
            <div class="auth-benefits">
                <h4>Bienvenue sur NutriLife!</h4>
                <div class="benefit-item">
                    <i class="bi bi-check-circle-fill"></i>
                    <span>Accès aux meilleurs régimes</span>
                </div>
                <div class="benefit-item">
                    <i class="bi bi-check-circle-fill"></i>
                    <span>1000+ recettes délicieuses</span>
                </div>
                <div class="benefit-item">
                    <i class="bi bi-check-circle-fill"></i>
                    <span>Suivi de votre progression</span>
                </div>
                <div class="benefit-item">
                    <i class="bi bi-check-circle-fill"></i>
                    <span>Support 24/7 disponible</span>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>

<?= $this->section('extra_js') ?>
<script>
function togglePassword() {
    const input = document.getElementById('password');
    const icon = document.getElementById('toggleIcon');
    
    if (input.type === 'password') {
        input.type = 'text';
        icon.classList.remove('bi-eye');
        icon.classList.add('bi-eye-slash');
    } else {
        input.type = 'password';
        icon.classList.remove('bi-eye-slash');
        icon.classList.add('bi-eye');
    }
}
</script>
<?= $this->endSection() ?>