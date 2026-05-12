<?= $this->extend('layouts/main') ?>

<?= $this->section('title') ?>Nos Régimes - NutriLife<?= $this->endSection() ?>

<?= $this->section('content') ?>

<!-- Breadcrumb -->
<div class="bg-white border-bottom py-3 mb-4">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="<?= base_url() ?>" class="text-decoration-none">Accueil</a></li>
                <li class="breadcrumb-item active" aria-current="page">Régimes</li>
            </ol>
        </nav>
    </div>
</div>

<!-- Section Régimes -->
<section class="section">
    <div class="container">
        <!-- Header -->
        <div class="row mb-5">
            <div class="col-lg-8">
                <h1 class="fw-bold mb-3">Nos Régimes Premium</h1>
                <p class="text-muted fs-5">Découvrez notre collection complète de programmes nutritionnels personnalisés, conçus pour vous aider à atteindre vos objectifs de santé.</p>
            </div>
        </div>

        <!-- Filtres -->
        <div class="row mb-4 g-3">
            <div class="col-md-3">
                <input type="text" class="form-control" id="searchInput" placeholder="Rechercher un régime...">
            </div>
            <div class="col-md-3">
                <select class="form-select" id="filterObjective">
                    <option value="">Tous les objectifs</option>
                    <option value="1">Augmenter son poids</option>
                    <option value="2">Réduire son poids</option>
                    <option value="3">Atteindre son IMC idéal</option>
                </select>
            </div>
            <div class="col-md-3">
                <select class="form-select" id="filterPrice">
                    <option value="">Tous les prix</option>
                    <option value="budget">Moins de 5000 Ar/jour</option>
                    <option value="standard">5000-10000 Ar/jour</option>
                    <option value="premium">Plus de 10000 Ar/jour</option>
                </select>
            </div>
            <div class="col-md-3">
                <div class="btn-group w-100" role="group">
                    <input type="radio" class="btn-check" name="view" id="viewGrid" value="grid" checked>
                    <label class="btn btn-outline-success" for="viewGrid">
                        <i class="bi bi-columns-gap"></i>
                    </label>
                    <input type="radio" class="btn-check" name="view" id="viewList" value="list">
                    <label class="btn btn-outline-success" for="viewList">
                        <i class="bi bi-list-ul"></i>
                    </label>
                </div>
            </div>
        </div>

        <!-- Régimes Grid -->
        <div class="row g-4" id="regimesContainer">
            <?php if(isset($regimes) && !empty($regimes)): ?>
                <?php $count = 0; foreach($regimes as $regime): ?>
                    <div class="col-md-6 col-lg-4 regime-item" data-animate="slide-in-up">
                        <div class="card-premium h-100">
                            <img src="<?= base_url('images/r' . (($count % 4) + 1) . '.jpeg') ?>" alt="<?= esc($regime['nom']) ?>" class="regime-card-image">
                            
                            <div class="regime-card-body">
                                <h5 class="card-premium-title"><?= esc($regime['nom'] ?? 'Programme') ?></h5>
                                
                                <p class="card-premium-text"><?= esc(substr($regime['description'] ?? '', 0, 100)) ?>...</p>
                                
                                <!-- Stats -->
                                <div class="mb-3 pb-3 border-bottom">
                                    <div class="d-flex justify-content-between small mb-2">
                                        <span class="text-muted"><i class="bi bi-fire"></i> Calories/jour</span>
                                        <strong><?= isset($regime['prix_journalier']) ? number_format($regime['prix_journalier'] * 500, 0) : 'N/A' ?></strong>
                                    </div>
                                    <div class="d-flex justify-content-between small">
                                        <span class="text-muted"><i class="bi bi-graph-up"></i> Poids/semaine</span>
                                        <strong><?= isset($regime['poids_impact_semaine']) ? number_format($regime['poids_impact_semaine'], 1) : '0' ?> kg</strong>
                                    </div>
                                </div>

                                <!-- Composition -->
                                <div class="mb-3">
                                    <small class="text-muted d-block mb-2">Composition:</small>
                                    <div class="d-flex gap-2 flex-wrap">
                                        <?php if(isset($regime['pourcentage_viande']) && $regime['pourcentage_viande'] > 0): ?>
                                            <span class="badge badge-premium badge-success-premium">
                                                <i class="bi bi-egg"></i> <?= number_format($regime['pourcentage_viande'], 0) ?>% Viande
                                            </span>
                                        <?php endif; ?>
                                        <?php if(isset($regime['pourcentage_poisson']) && $regime['pourcentage_poisson'] > 0): ?>
                                            <span class="badge badge-premium badge-secondary-premium">
                                                <i class="bi bi-fish"></i> <?= number_format($regime['pourcentage_poisson'], 0) ?>% Poisson
                                            </span>
                                        <?php endif; ?>
                                        <?php if(isset($regime['pourcentage_volaille']) && $regime['pourcentage_volaille'] > 0): ?>
                                            <span class="badge badge-premium badge-success-premium">
                                                <i class="bi bi-egg-fried"></i> <?= number_format($regime['pourcentage_volaille'], 0) ?>% Volaille
                                            </span>
                                        <?php endif; ?>
                                    </div>
                                </div>

                                <!-- Footer -->
                                <div class="card-premium-footer mt-auto">
                                    <div>
                                        <div class="h5 mb-0 text-success fw-bold">
                                            Ar <?= number_format($regime['prix_journalier'] ?? 0, 2) ?>/jour
                                        </div>
                                        <small class="text-muted">*Flexible selon le plan</small>
                                    </div>
                                    <a href="<?= base_url('regime/' . ($regime['id'] ?? '#')) ?>" class="btn btn-sm btn-success rounded-pill">
                                        <i class="bi bi-arrow-right"></i> Voir
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php $count++; ?>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="col-12">
                    <div class="alert alert-info text-center py-5">
                        <i class="bi bi-info-circle" style="font-size: 3rem; display: block; margin-bottom: 1rem;"></i>
                        <h4>Aucun régime disponible</h4>
                        <p class="text-muted mb-0">Nous ajoutons régulièrement de nouveaux programmes. Reviens bientôt!</p>
                    </div>
                </div>
            <?php endif; ?>
        </div>

        <!-- Pagination -->
        <?php if(isset($pager)): ?>
            <nav aria-label="Page navigation" class="mt-5">
                <ul class="pagination justify-content-center">
                    <?= $pager->links() ?>
                </ul>
            </nav>
        <?php endif; ?>
    </div>
</section>

<!-- Section CTA -->
<section class="section bg-white">
    <div class="container">
        <div class="text-center" data-animate="slide-in-up">
            <h2 class="mb-3">Pas Sûr de Quel Régime Choisir?</h2>
            <p class="text-muted fs-5 mb-4">Notre quiz personnalisé vous aidera à trouver le programme parfait</p>
            <a href="<?= base_url('quiz') ?>" class="btn-primary-premium">
                <i class="bi bi-question-circle"></i> Faire le Quiz
            </a>
        </div>
    </div>
</section>

<?= $this->endSection() ?>

<?= $this->section('extra_js') ?>
<script>
document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.getElementById('searchInput');
    const filterObjective = document.getElementById('filterObjective');
    const filterPrice = document.getElementById('filterPrice');
    const viewOptions = document.querySelectorAll('input[name="view"]');
    const container = document.getElementById('regimesContainer');
    
    if (searchInput) {
        searchInput.addEventListener('input', filterRegimes);
    }
    if (filterObjective) {
        filterObjective.addEventListener('change', filterRegimes);
    }
    if (filterPrice) {
        filterPrice.addEventListener('change', filterRegimes);
    }
    
    viewOptions.forEach(option => {
        option.addEventListener('change', function() {
            if (this.value === 'list') {
                container.classList.remove('row');
                container.classList.add('list-view');
            } else {
                container.classList.remove('list-view');
                container.classList.add('row');
            }
        });
    });
});

function filterRegimes() {
    // Implémentation du filtrage côté client
    // À adapter selon vos besoins
}
</script>
<?= $this->endSection() ?>
