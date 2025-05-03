<?php
// includes/header.php - En-tête du site
?>
<!DOCTYPE html>
<html lang="fr" data-theme="light" data-theme-color="blue">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo isset($pageTitle) ? $pageTitle . ' - ' : ''; ?>Portfolio de Développeur</title>
    <link href="assets/assets/fontawesome-free-6.7.1-web/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/theme-styles.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="icon" href="assets/images/profile.png" type="image/png">
    <style>
        @media (max-width: 768px) {
    /* Menu mobile fermé par défaut */
    .main-nav {
        width: 100%;
        margin-top: 20px;
        display: none; /* Cache le menu par défaut */
        transition: all 0.3s ease;
    }
    
    /* Menu mobile visible lorsque la classe est ajoutée */
    .main-nav.nav-visible {
        display: block;
        animation: slideDown 0.3s ease forwards;
    }
    
    @keyframes slideDown {
        from {
            opacity: 0;
            transform: translateY(-10px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
    
    .main-nav ul {
        flex-direction: column;
        width: 100%;
    }
    
    .main-nav ul li {
        margin: 0;
        width: 100%;
        border-top: 1px solid var(--border-color);
    }
    
    .main-nav ul li a {
        display: block;
        padding: 15px 0;
    }
    
    .mobile-menu-toggle {
        display: block;
        position: absolute;
        top: 20px;
        right: 20px;
        z-index: 1000;
        cursor: pointer;
    }
}
    </style>
</head>
<body>
    <header class="site-header">
        <div class="container">
            <div class="logo">
                <a href="index.php">
                    <span class="logo-text">TAHAR-DJEBBAR MOHAMED</span>
                </a>
            </div>
            <nav class="main-nav">
                <ul>
                    <li><a href="index.php" class="<?php echo $pageTitle === 'Accueil' ? 'active' : ''; ?>">Accueil</a></li>
                    <li><a href="about.php" class="<?php echo $pageTitle === 'À propos de moi' ? 'active' : ''; ?>">À propos</a></li>
                    <li><a href="skills.php" class="<?php echo $pageTitle === 'Mes Compétences' ? 'active' : ''; ?>">Compétences</a></li>
                    <li><a href="projects.php" class="<?php echo $pageTitle === 'Mes Projets' ? 'active' : ''; ?>">Projets</a></li>
                    <li><a href="contact.php" class="<?php echo $pageTitle === 'Me contacter' ? 'active' : ''; ?>">Contact</a></li>
                </ul>
            </nav>
            <div class="mobile-menu-toggle">
                <i class="fas fa-bars"></i>
            </div>
        </div>
    </header>
    
    <!-- Contrôles de thème -->
    <div class="theme-controls">
        <div id="theme-selector" class="theme-dropdown">
            <div class="selector-title">Choisir un thème</div>
            <div class="theme-options">
                <div class="theme-option" data-theme="blue" title="Thème Bleu"></div>
                <div class="theme-option" data-theme="green" title="Thème Vert"></div>
                <div class="theme-option" data-theme="orange" title="Thème Orange"></div>
                <div class="theme-option" data-theme="purple" title="Thème Violet"></div>
                <div class="theme-option" data-theme="red" title="Thème Rouge"></div>
            </div>
        </div>
        <div id="theme-selector-toggle" class="theme-toggle" title="Changer de couleur de thème">
            <i class="fas fa-palette"></i>
        </div>
        <div id="theme-switcher" class="theme-toggle" title="Passer au mode nuit">
            <i class="fas fa-moon"></i>
        </div>
    </div>

    <script>
        // Attendez que le DOM soit complètement chargé
document.addEventListener('DOMContentLoaded', function() {
    // Récupérer les éléments nécessaires
    const mobileMenuToggle = document.querySelector('.mobile-menu-toggle');
    const mainNav = document.querySelector('.main-nav');
    
    // Vérifier si les éléments existent
    if (mobileMenuToggle && mainNav) {
        // Ajouter une classe pour cacher le menu par défaut en mode mobile
        mainNav.classList.add('nav-closed');
        
        // Ajouter un gestionnaire d'événement pour le clic sur le bouton hamburger
        mobileMenuToggle.addEventListener('click', function() {
            // Basculer la classe pour afficher/masquer le menu
            mainNav.classList.toggle('nav-visible');
            
            // Mettre à jour l'icône du bouton (si vous utilisez une icône)
            // Si vous utilisez Font Awesome ou une autre bibliothèque d'icônes :
            if (this.querySelector('i')) {
                this.querySelector('i').classList.toggle('fa-bars');
                this.querySelector('i').classList.toggle('fa-times');
            }
        });
    }
});
    </script>