// assets/js/theme-switcher.js

document.addEventListener('DOMContentLoaded', function() {
    console.log("DOM Content Loaded - Initialisation du changeur de thème");
    
    // Récupération des éléments DOM
    const themeSwitcher = document.getElementById('theme-switcher');
    const themeSelector = document.getElementById('theme-selector');
    const themeSelectorToggle = document.getElementById('theme-selector-toggle');
    const themeOptions = document.querySelectorAll('.theme-option');
    
    // Vérification des éléments
    if (!themeSwitcher) {
        console.error("Élément #theme-switcher non trouvé");
        return;
    }
    
    if (!themeSelector) {
        console.error("Élément #theme-selector non trouvé");
        return;
    }
    
    if (!themeSelectorToggle) {
        console.error("Élément #theme-selector-toggle non trouvé");
        return;
    }
    
    if (themeOptions.length === 0) {
        console.error("Aucun élément .theme-option trouvé");
        return;
    }
    
    // Initialisation des thèmes
    const defaultTheme = 'light';
    const defaultColor = 'blue';
    
    // Charger les préférences utilisateur depuis localStorage
    let currentTheme = localStorage.getItem('theme') || defaultTheme;
    let currentColor = localStorage.getItem('themeColor') || defaultColor;
    
    console.log(`Thème chargé: ${currentTheme}, Couleur: ${currentColor}`);
    
    // Appliquer les préférences au chargement
    applyTheme(currentTheme);
    applyThemeColor(currentColor);
    
    // Mise à jour de l'état du bouton de basculement
    updateThemeSwitcherState();
    
    // Marquer l'option active
    updateActiveThemeOption();
    
    // Gérer le clic sur le bouton de basculement jour/nuit
    themeSwitcher.addEventListener('click', function() {
        console.log(`Changement de thème: ${currentTheme} -> ${currentTheme === 'light' ? 'dark' : 'light'}`);
        currentTheme = currentTheme === 'light' ? 'dark' : 'light';
        applyTheme(currentTheme);
        updateThemeSwitcherState();
        localStorage.setItem('theme', currentTheme);
    });
    
    // Gérer l'ouverture/fermeture du sélecteur de thème
    themeSelectorToggle.addEventListener('click', function(e) {
        e.stopPropagation(); // Empêcher la propagation pour éviter la fermeture immédiate
        console.log("Toggle du sélecteur de thème");
        themeSelector.classList.toggle('open');
    });
    
    // Gérer le changement de thème de couleur
    themeOptions.forEach(option => {
        option.addEventListener('click', function(e) {
            e.stopPropagation(); // Empêcher la fermeture immédiate du sélecteur
            const color = this.getAttribute('data-theme');
            console.log(`Changement de couleur: ${currentColor} -> ${color}`);
            currentColor = color;
            applyThemeColor(color);
            localStorage.setItem('themeColor', color);
            
            // Mise à jour visuelle du sélecteur actif
            updateActiveThemeOption();
        });
    });
    
    // Fonction pour appliquer le thème jour/nuit
    function applyTheme(theme) {
        document.documentElement.setAttribute('data-theme', theme);
        console.log(`Thème appliqué: ${theme}`);
    }
    
    // Fonction pour appliquer le thème de couleur
    function applyThemeColor(color) {
        document.documentElement.setAttribute('data-theme-color', color);
        console.log(`Couleur de thème appliquée: ${color}`);
    }
    
    // Mettre à jour l'état du bouton de basculement
    function updateThemeSwitcherState() {
        if (currentTheme === 'dark') {
            themeSwitcher.innerHTML = '<i class="fas fa-sun"></i>';
            themeSwitcher.title = "Passer au mode jour";
        } else {
            themeSwitcher.innerHTML = '<i class="fas fa-moon"></i>';
            themeSwitcher.title = "Passer au mode nuit";
        }
    }
    
    // Mettre à jour l'option de thème active
    function updateActiveThemeOption() {
        themeOptions.forEach(opt => {
            if (opt.getAttribute('data-theme') === currentColor) {
                opt.classList.add('active');
            } else {
                opt.classList.remove('active');
            }
        });
    }
    
    // Fermer le sélecteur de thème en cliquant à l'extérieur
    document.addEventListener('click', function(event) {
        if (themeSelector.classList.contains('open')) {
            const isClickInsideSelector = themeSelector.contains(event.target);
            const isClickOnToggle = themeSelectorToggle.contains(event.target);
            
            if (!isClickInsideSelector && !isClickOnToggle) {
                console.log("Clic à l'extérieur - fermeture du sélecteur");
                themeSelector.classList.remove('open');
            }
        }
    });
});

// Vérification supplémentaire une fois que la page est complètement chargée
window.onload = function() {
    console.log("Fenêtre chargée - Vérification finale des éléments de thème");
    console.log("theme-switcher existe:", document.getElementById('theme-switcher') !== null);
    console.log("theme-selector existe:", document.getElementById('theme-selector') !== null);
    console.log("theme-selector-toggle existe:", document.getElementById('theme-selector-toggle') !== null);
    console.log("theme-options trouvés:", document.querySelectorAll('.theme-option').length);
};