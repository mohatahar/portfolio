// Script ultra-moderne pour le bouton de retour en haut
document.addEventListener('DOMContentLoaded', function () {
    const backToTopButton = document.getElementById('back-to-top');
    let lastScrollTop = 0;
    let isVisible = false;

    // Créer les éléments pour l'animation des cercles concentriques
    function createCircleElements() {
        const circlesContainer = document.createElement('div');
        circlesContainer.className = 'circles';
        
        for (let i = 0; i < 3; i++) {
            const circle = document.createElement('div');
            circle.className = 'circle';
            circlesContainer.appendChild(circle);
        }
        
        backToTopButton.appendChild(circlesContainer);
    }
    
    // Créer une variable CSS pour la couleur primaire RGB
    function setupColorVariables() {
        // Obtenir la couleur primaire depuis les variables CSS
        const primaryColor = getComputedStyle(document.documentElement)
            .getPropertyValue('--primary-color').trim();
            
        // Convertir la couleur HEX en RGB
        const rgbColor = hexToRgb(primaryColor) || {r: 67, g: 97, b: 238}; // Valeur par défaut
        
        // Définir la variable RGB
        document.documentElement.style.setProperty(
            '--primary-color-rgb', 
            `${rgbColor.r}, ${rgbColor.g}, ${rgbColor.b}`
        );
    }
    
    // Fonction pour convertir HEX en RGB
    function hexToRgb(hex) {
        // Supprimer le # si présent
        hex = hex.replace(/^#/, '');
        
        // Gérer les formats raccourcis
        if (hex.length === 3) {
            hex = hex[0] + hex[0] + hex[1] + hex[1] + hex[2] + hex[2];
        }
        
        const bigint = parseInt(hex, 16);
        return {
            r: (bigint >> 16) & 255,
            g: (bigint >> 8) & 255,
            b: bigint & 255
        };
    }

    // Fonction pour afficher ou masquer le bouton avec effets avancés
    function toggleBackToTopButton() {
        const scrollTop = window.scrollY || document.documentElement.scrollTop;
        const docHeight = Math.max(
            document.body.scrollHeight,
            document.body.offsetHeight,
            document.documentElement.clientHeight,
            document.documentElement.scrollHeight,
            document.documentElement.offsetHeight
        );
        const winHeight = window.innerHeight;
        const scrollPercent = (scrollTop / (docHeight - winHeight)) * 100;
        
        // Ajuster dynamiquement les effets en fonction du pourcentage de défilement
        if (scrollTop > 300) {
            if (!isVisible) {
                isVisible = true;
                
                // Réinitialiser pour assurer une nouvelle animation
                backToTopButton.classList.remove('visible');
                
                // Appliquer après un court délai pour garantir que la transition fonctionne
                setTimeout(() => {
                    backToTopButton.classList.add('visible');
                    
                    // Son futuriste discret (optionnel)
                    if (window.AudioContext) {
                        playFuturisticSound();
                    }
                }, 50);
            }
        } else {
            if (isVisible) {
                isVisible = false;
                backToTopButton.classList.remove('visible');
            }
        }
    }

    // Effet de défilement fluide avec animation avancée
    backToTopButton.addEventListener('click', function (e) {
        e.preventDefault();
        
        // Effet "click"
        backToTopButton.style.transform = 'scale(0.9)';
        setTimeout(() => {
            backToTopButton.style.transform = '';
        }, 200);
        
        // Position actuelle et temps de début
        const startPosition = window.scrollY || document.documentElement.scrollTop;
        const startTime = performance.now();
        const duration = 1200; // Durée plus longue pour un effet plus dramatique
        
        function scrollToTop(currentTime) {
            const elapsedTime = currentTime - startTime;
            
            // Fonction d'easing avancée pour un mouvement très fluide
            const easeOutExpo = t => (t === 1) ? 1 : 1 - Math.pow(2, -10 * t);
            
            if (elapsedTime < duration) {
                const scrollProgress = elapsedTime / duration;
                const easedProgress = easeOutExpo(scrollProgress);
                const scrollTo = Math.max(0, startPosition * (1 - easedProgress));
                
                window.scrollTo(0, scrollTo);
                requestAnimationFrame(scrollToTop);
            } else {
                window.scrollTo(0, 0);
            }
        }
        
        requestAnimationFrame(scrollToTop);
    });

    // Optimisation des performances
    let ticking = false;
    window.addEventListener('scroll', function() {
        if (!ticking) {
            window.requestAnimationFrame(function() {
                toggleBackToTopButton();
                ticking = false;
            });
            ticking = true;
        }
    });

    // Initialisation
    createCircleElements();
    setupColorVariables();
    toggleBackToTopButton();
});