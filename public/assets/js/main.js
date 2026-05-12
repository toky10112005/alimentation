// ============================================
// MAIN.JS - INTERACTIONS & ANIMATIONS
// ============================================

document.addEventListener('DOMContentLoaded', function() {
    initBackToTop();
    initFAQ();
    initScrollAnimations();
    initNavbarEffect();
    initCardHovers();
    initButtonAnimations();
    initParallaxEffect();
    initCounterAnimation();
});

// ============================================
// BACK TO TOP BUTTON
// ============================================
function initBackToTop() {
    const backToTopBtn = document.getElementById('backToTop');
    
    if (!backToTopBtn) return;

    window.addEventListener('scroll', function() {
        if (window.pageYOffset > 300) {
            backToTopBtn.classList.remove('d-none');
        } else {
            backToTopBtn.classList.add('d-none');
        }
    });

    backToTopBtn.addEventListener('click', function() {
        window.scrollTo({
            top: 0,
            behavior: 'smooth'
        });
    });
}

// ============================================
// FAQ ACCORDION
// ============================================
function initFAQ() {
    const faqItems = document.querySelectorAll('.faq-item');
    
    faqItems.forEach(item => {
        const question = item.querySelector('.faq-question');
        
        if (question) {
            question.addEventListener('click', function() {
                // Fermer tous les autres éléments
                faqItems.forEach(otherItem => {
                    if (otherItem !== item) {
                        otherItem.classList.remove('active');
                    }
                });
                
                // Basculer l'élément actuel
                item.classList.toggle('active');
            });
        }
    });
}

// ============================================
// SCROLL ANIMATIONS
// ============================================
function initScrollAnimations() {
    const elements = document.querySelectorAll('[data-animate]');
    
    if (elements.length === 0) return;

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const animationClass = entry.target.getAttribute('data-animate');
                entry.target.classList.add(animationClass);
                observer.unobserve(entry.target);
            }
        });
    }, {
        threshold: 0.1,
        rootMargin: '0px 0px -100px 0px'
    });

    elements.forEach(element => observer.observe(element));
}

// ============================================
// NAVBAR SCROLL EFFECT
// ============================================
function initNavbarEffect() {
    const navbar = document.querySelector('.navbar-premium');
    
    if (!navbar) return;

    window.addEventListener('scroll', function() {
        if (window.pageYOffset > 50) {
            navbar.classList.add('shadow-lg');
            navbar.classList.add('scrolled');
        } else {
            navbar.classList.remove('shadow-lg');
            navbar.classList.remove('scrolled');
        }
    });
}

// ============================================
// CARD HOVER ANIMATIONS
// ============================================
function initCardHovers() {
    const cards = document.querySelectorAll('.card-premium, .feature-box');
    
    cards.forEach(card => {
        card.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-8px)';
        });
        
        card.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0)';
        });

        // Ripple effect
        card.addEventListener('click', function(e) {
            const ripple = document.createElement('span');
            const rect = this.getBoundingClientRect();
            const x = e.clientX - rect.left;
            const y = e.clientY - rect.top;
            
            ripple.style.cssText = `
                position: absolute;
                width: 20px;
                height: 20px;
                left: ${x}px;
                top: ${y}px;
                background: rgba(255, 255, 255, 0.5);
                border-radius: 50%;
                pointer-events: none;
                animation: ripple-animation 0.6s ease-out;
            `;
            
            this.style.position = 'relative';
            this.style.overflow = 'hidden';
            this.appendChild(ripple);
            
            setTimeout(() => ripple.remove(), 600);
        });
    });
}

// ============================================
// BUTTON ANIMATIONS
// ============================================
function initButtonAnimations() {
    const buttons = document.querySelectorAll('.btn-primary-premium, .btn-secondary-premium, .btn-outline-premium');
    
    buttons.forEach(button => {
        button.addEventListener('mousedown', function() {
            this.style.transform = 'scale(0.98)';
        });
        
        button.addEventListener('mouseup', function() {
            this.style.transform = 'translateY(-2px)';
        });
        
        button.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0)';
        });
    });
}

// ============================================
// PARALLAX EFFECT
// ============================================
function initParallaxEffect() {
    const parallaxElements = document.querySelectorAll('[data-parallax]');
    
    if (parallaxElements.length === 0) return;

    const handleParallax = throttle(function() {
        parallaxElements.forEach(element => {
            const scrollPosition = window.pageYOffset;
            const speed = element.getAttribute('data-parallax') || 0.5;
            element.style.transform = `translateY(${scrollPosition * speed}px)`;
        });
    }, 16);

    window.addEventListener('scroll', handleParallax);
}

// ============================================
// COUNTER ANIMATION
// ============================================
function initCounterAnimation() {
    const counters = document.querySelectorAll('[data-counter]');
    
    if (counters.length === 0) return;

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const target = entry.target;
                const finalValue = parseInt(target.getAttribute('data-counter'));
                const duration = 2000; // 2 secondes
                const startValue = 0;
                const startTime = Date.now();
                
                const animate = () => {
                    const elapsed = Date.now() - startTime;
                    const progress = Math.min(elapsed / duration, 1);
                    const currentValue = Math.floor(startValue + (finalValue - startValue) * progress);
                    
                    target.textContent = currentValue + '+';
                    
                    if (progress < 1) {
                        requestAnimationFrame(animate);
                    }
                };
                
                animate();
                observer.unobserve(target);
            }
        });
    }, { threshold: 0.5 });

    counters.forEach(counter => observer.observe(counter));
}

// ============================================
// UTILITAIRES
// ============================================

/**
 * Montre un toast/notification
 */
function showToast(message, type = 'success') {
    const toastHTML = `
        <div class="toast-notification toast-${type}" role="alert">
            <div class="d-flex">
                <div class="toast-body">
                    ${message}
                </div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"></button>
            </div>
        </div>
    `;
    
    const toastContainer = document.getElementById('toastContainer');
    if (!toastContainer) {
        const container = document.createElement('div');
        container.id = 'toastContainer';
        container.style.cssText = 'position: fixed; top: 20px; right: 20px; z-index: 9999;';
        document.body.appendChild(container);
    }
    
    document.getElementById('toastContainer').insertAdjacentHTML('beforeend', toastHTML);
}

/**
 * Formate les prix
 */
function formatPrice(price) {
    return new Intl.NumberFormat('fr-FR', {
        style: 'currency',
        currency: 'EUR'
    }).format(price);
}

/**
 * Debounce pour les événements
 */
function debounce(func, wait) {
    let timeout;
    return function executedFunction(...args) {
        const later = () => {
            clearTimeout(timeout);
            func(...args);
        };
        clearTimeout(timeout);
        timeout = setTimeout(later, wait);
    };
}

/**
 * Throttle pour les événements
 */
function throttle(func, limit) {
    let inThrottle;
    return function(...args) {
        if (!inThrottle) {
            func.apply(this, args);
            inThrottle = true;
            setTimeout(() => inThrottle = false, limit);
        }
    };
}

/**
 * Charge dynamiquement du contenu
 */
async function loadContent(url) {
    try {
        const response = await fetch(url);
        if (!response.ok) throw new Error('Erreur réseau');
        return await response.text();
    } catch (error) {
        console.error('Erreur lors du chargement:', error);
        showToast('Erreur lors du chargement du contenu', 'danger');
        return null;
    }
}

/**
 * Validation basique d'email
 */
function isValidEmail(email) {
    const regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return regex.test(email);
}

// ============================================
// EXPORT POUR UTILISATION GLOBALE
// ============================================
window.NutriLife = {
    showToast,
    formatPrice,
    debounce,
    throttle,
    loadContent,
    isValidEmail
};
