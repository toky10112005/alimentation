<?= $this->extend('layouts/main') ?>

<?= $this->section('title') ?>Inscription - NutriLife<?= $this->endSection() ?>

<?= $this->section('content') ?>

<section class="section" style="min-height: 100vh; display: flex; align-items: center; justify-content: center;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <!-- Card Register -->
                <div class="card-premium">
                    <div class="card-premium-body">
                        <!-- Header -->
                        <div class="text-center mb-4">
                            <div class="mb-3">
                                <i class="bi bi-leaf-fill" style="font-size: 3rem; color: var(--primary-color);"></i>
                            </div>
                            <h1 class="h3 fw-bold mb-2">Créer Votre Compte</h1>
                            <p class="text-muted">Rejoignez NutriLife et transformez votre alimentation</p>
                        </div>

                        <!-- Erreurs -->
                        <?php if (session()->has('errors')): ?>
                            <div class="alert alert-danger alert-dismissible fade show mb-4" role="alert">
                                <i class="bi bi-exclamation-circle me-2"></i>
                                <strong>Erreur lors de l'inscription!</strong>
                                <?php foreach(session('errors') as $error): ?>
                                    <div><?= esc($error) ?></div>
                                <?php endforeach; ?>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        <?php endif; ?>

                        <!-- Form Register -->
                        <form action="<?= base_url('user/register') ?>" method="post" class="needs-validation" novalidate>
                            <?= csrf_field() ?>

                            <div class="row">
                                <!-- Prénom -->
                                <div class="col-md-6 mb-3">
                                    <label for="firstname" class="form-label">Prénom</label>
                                    <input 
                                        type="text" 
                                        class="form-control border-bottom border-0 bg-light" 
                                        id="firstname" 
                                        name="firstname" 
                                        placeholder="Jean"
                                        required
                                        value="<?= old('firstname') ?>"
                                    >
                                </div>

                                <!-- Nom -->
                                <div class="col-md-6 mb-3">
                                    <label for="lastname" class="form-label">Nom</label>
                                    <input 
                                        type="text" 
                                        class="form-control border-bottom border-0 bg-light" 
                                        id="lastname" 
                                        name="lastname" 
                                        placeholder="Dupont"
                                        required
                                        value="<?= old('lastname') ?>"
                                    >
                                </div>
                            </div>

                            <!-- Email -->
                            <div class="mb-3">
                                <label for="email" class="form-label">Adresse Email</label>
                                <div class="input-group">
                                    <span class="input-group-text border-0 bg-light rounded-start">
                                        <i class="bi bi-envelope"></i>
                                    </span>
                                    <input 
                                        type="email" 
                                        class="form-control border-0 border-bottom" 
                                        id="email" 
                                        name="email" 
                                        placeholder="votre.email@example.com"
                                        required
                                        value="<?= old('email') ?>"
                                    >
                                </div>
                            </div>

                            <!-- Mot de Passe -->
                            <div class="mb-3">
                                <label for="password" class="form-label">Mot de Passe</label>
                                <div class="input-group">
                                    <span class="input-group-text border-0 bg-light rounded-start">
                                        <i class="bi bi-lock"></i>
                                    </span>
                                    <input 
                                        type="password" 
                                        class="form-control border-0 border-bottom" 
                                        id="password" 
                                        name="password" 
                                        placeholder="••••••••"
                                        required
                                    >
                                    <span class="input-group-text border-0 bg-light cursor-pointer" onclick="togglePassword('password')">
                                        <i class="bi bi-eye" id="toggleIcon1"></i>
                                    </span>
                                </div>
                                <small class="text-muted d-block mt-1">
                                    <i class="bi bi-info-circle"></i> Au minimum 8 caractères
                                </small>
                            </div>

                            <!-- Confirmer Mot de Passe -->
                            <div class="mb-4">
                                <label for="password_confirm" class="form-label">Confirmer le Mot de Passe</label>
                                <div class="input-group">
                                    <span class="input-group-text border-0 bg-light rounded-start">
                                        <i class="bi bi-lock-check"></i>
                                    </span>
                                    <input 
                                        type="password" 
                                        class="form-control border-0 border-bottom" 
                                        id="password_confirm" 
                                        name="password_confirm" 
                                        placeholder="••••••••"
                                        required
                                    >
                                    <span class="input-group-text border-0 bg-light cursor-pointer" onclick="togglePassword('password_confirm')">
                                        <i class="bi bi-eye" id="toggleIcon2"></i>
                                    </span>
                                </div>
                            </div>

                            <!-- Genre -->
                            <div class="mb-4">
                                <label for="genre" class="form-label">Genre</label>
                                <select class="form-select border-bottom border-0 bg-light" id="genre" name="genre" required>
                                    <option value="">-- Sélectionnez votre genre --</option>
                                    <option value="1">Homme</option>
                                    <option value="2">Femme</option>
                                    <option value="3">Autre</option>
                                </select>
                            </div>

                            <!-- Acceptation des conditions -->
                            <div class="mb-4">
                                <div class="form-check">
                                    <input 
                                        class="form-check-input" 
                                        type="checkbox" 
                                        id="terms" 
                                        name="terms"
                                        required
                                    >
                                    <label class="form-check-label" for="terms">
                                        J'accepte les <a href="<?= base_url('terms') ?>" class="text-success text-decoration-none">conditions d'utilisation</a> et la <a href="<?= base_url('privacy') ?>" class="text-success text-decoration-none">politique de confidentialité</a>
                                    </label>
                                </div>
                            </div>

                            <!-- Bouton S'inscrire -->
                            <button type="submit" class="btn w-100 btn-success fw-600 py-2 rounded-pill mb-3">
                                <i class="bi bi-check-circle me-2"></i> Créer Mon Compte
                            </button>
                        </form>

                        <!-- Divider -->
                        <div class="text-center mb-3">
                            <span class="text-muted small">ou</span>
                        </div>

                        <!-- Social Register -->
                        <div class="d-grid gap-2 mb-4">
                            <button class="btn btn-outline-secondary rounded-pill py-2" type="button">
                                <i class="bi bi-google me-2"></i> S'inscrire avec Google
                            </button>
                            <button class="btn btn-outline-secondary rounded-pill py-2" type="button">
                                <i class="bi bi-facebook me-2"></i> S'inscrire avec Facebook
                            </button>
                        </div>

                        <!-- Login Link -->
                        <div class="text-center pt-3 border-top">
                            <p class="text-muted mb-0">
                                Vous avez déjà un compte? 
                                <a href="<?= base_url('user/login') ?>" class="text-success fw-600 text-decoration-none">
                                    Se connecter
                                </a>
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Info Box -->
                <div class="text-center mt-4 text-muted small">
                    <p class="mb-0">
                        <i class="bi bi-shield-check text-success me-2"></i>
                        Vos données sont entièrement sécurisées et cryptées
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<?= $this->endSection() ?>

<?= $this->section('extra_js') ?>
<script>
function togglePassword(fieldId) {
    const input = document.getElementById(fieldId);
    const iconId = fieldId === 'password' ? 'toggleIcon1' : 'toggleIcon2';
    const icon = document.getElementById(iconId);
    
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

// Validation Bootstrap
(function() {
    'use strict';
    window.addEventListener('load', function() {
        var forms = document.getElementsByClassName('needs-validation');
        var validation = Array.prototype.filter.call(forms, function(form) {
            form.addEventListener('submit', function(event) {
                if (form.checkValidity() === false) {
                    event.preventDefault();
                    event.stopPropagation();
                }
                form.classList.add('was-validated');
            }, false);
        });
    }, false);
})();
</script>
<?= $this->endSection() ?>
