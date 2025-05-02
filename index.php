<?php
// index.php - Page d'accueil sans base de données
session_start();
$pageTitle = "Accueil";
include 'includes/header.php';

// Données statiques pour remplacer la base de données
$featuredProjects = [
    [
        'id' => 1,
        'title' => 'Application de gestion d\'inventaire',
        'description' => 'Une application web complète permettant de gérer efficacement l\'inventaire d\'équipements médicaux, avec des fonctionnalités d\'ajout, de recherche, de suivi et de génération de rapports pour l\'établissement public hospitalier SOBHA.',
        'image' => 'projet1/inventaire.jpg',
        'technologies' => ['PHP', 'JavaScript', 'MySQL']
    ],
    [
        'id' => 2,
        'title' => 'Portfolio Personnel',
        'description' => 'Site web portfolio présentant mes compétences et réalisations dans le développement web. Inclut une galerie de projets, un formulaire de contact et un blog.',
        'image' => 'projet2/portfolio.jpg',
        'technologies' => ['PHP', 'JavaScript', 'HTML/CSS']
    ],
    [
        'id' => 3,
        'title' => 'Application desktop de Gestion de Stock',
        'description' => 'Logiciel permettant de gérer le stock, d\'effectuer le suivi des produits et de générer des rapports avec une interface utilisateur intuitive.',
        'image' => 'projet3/stock.jpg',
        'technologies' => ['Python', 'MySQL']
    ]
];

$skillsCategories = [
    [
        'id' => 1,
        'name' => 'Langages de programmation',
        'description' => 'Les langages de programmation que je maîtrise pour différents types de projets',
        'skills' => [
            ['name' => 'PHP', 'proficiency' => 90],
            ['name' => 'JavaScript', 'proficiency' => 85],
            ['name' => 'Python', 'proficiency' => 75],
            ['name' => 'C#', 'proficiency' => 80]
        ]
    ],
    [
        'id' => 2,
        'name' => 'Frameworks & Bibliothèques',
        'description' => 'Les frameworks et bibliothèques que j\'utilise pour accélérer le développement',
        'skills' => [
            ['name' => 'Laravel', 'proficiency' => 85],
            ['name' => 'React', 'proficiency' => 80],
            ['name' => 'Vue.js', 'proficiency' => 75],
            ['name' => '.NET', 'proficiency' => 70]
        ]
    ],
    [
        'id' => 3,
        'name' => 'Outils & Technologies',
        'description' => 'Les outils et technologies que j\'utilise au quotidien',
        'skills' => [
            ['name' => 'Git', 'proficiency' => 90],
            ['name' => 'Docker', 'proficiency' => 65],
            ['name' => 'AWS', 'proficiency' => 60],
            ['name' => 'Visual Studio Code', 'proficiency' => 95]
        ]
    ]
];
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo isset($pageTitle) ? $pageTitle . ' - ' : ''; ?>Portfolio de Développeur</title>
    <link href="assets/assets/fontawesome-free-6.7.1-web/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/gh/devicons/devicon@latest/devicon.min.css" rel="stylesheet">
    <link href="assets/assets/aos/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/haut.css">
    <link rel="stylesheet" href="assets/css/theme-styles.css">
    <script src="assets/assets/aos/aos.js"></script>
    <script src="assets/js/haut.js"></script>
    <style>
        .projects-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
            gap: 30px;
            margin-top: 40px;
        }

        .project-card {
            background-color: var(--bg-color);
            border-radius: 10px;
            box-shadow: var(--shadow);
            transition: var(--transition);
            position: relative;
            overflow: hidden;
        }

        .project-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.15);
        }

        .project-image {
            position: relative;
            height: 220px;
            overflow: hidden;
        }

        .project-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.6s ease;
        }

        .project-card:hover .project-image img {
            transform: scale(1.08);
        }

        .project-overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.7);
            display: flex;
            align-items: center;
            justify-content: center;
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .project-card:hover .project-overlay {
            opacity: 1;
        }

        .project-actions {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 12px;
        }

        .btn-view-project,
        .btn-project-demo {
            display: inline-block;
            padding: 10px 20px;
            border-radius: 25px;
            font-weight: 600;
            text-transform: uppercase;
            transition: all 0.3s ease;
            text-decoration: none;
            font-size: 14px;
        }

        .btn-view-project {
            background: var(--primary-color);
            color: white;
        }

        .btn-project-demo {
            background: transparent;
            color: white;
            border: 2px solid white;
        }

        .btn-view-project:hover,
        .btn-project-demo:hover {
            transform: scale(1.05);
        }

        .project-info {
            padding: 20px;
        }

        .project-info h3 {
            font-size: 20px;
            margin-bottom: 10px;
            color: var(--dark-color);
        }

        .project-description {
            font-size: 15px;
            color: var(--secondary-text-color);
            margin-bottom: 15px;
            line-height: 1.6;
        }

        .project-technologies {
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
            margin-top: 15px;
        }

        .tech-badge {
            display: inline-block;
            padding: 5px 12px;
            background: var(--light-bg-color);
            color: var(--primary-color);
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .tech-badge:hover {
            background: var(--primary-color);
            color: white;
        }

        /* Responsive design pour les projets */
        @media (max-width: 768px) {
            .projects-grid {
                grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
                gap: 20px;
            }

            .project-image {
                height: 180px;
            }
        }

        @media (max-width: 480px) {
            .projects-grid {
                grid-template-columns: 1fr;
            }
        }

        /* Section des compétences avec badges défilants */
        .skills-section {
            background: linear-gradient(135deg, var(--bg-alt), var(--border-color));
            padding: 60px 0;
            position: relative;
            overflow: hidden;
        }

        .skills-container {
            width: 100%;
            overflow: hidden;
            display: flex;
            flex-direction: column;
            gap: 40px;
            margin-top: 30px;
            position: relative;
        }

        .skills-track {
            display: flex;
            gap: 30px;
            white-space: nowrap;
            padding: 15px 0;
            position: relative;
        }

        /* Animation de la première rangée (vers la gauche) */
        .track-left {
            animation: scrollLeft 40s linear infinite;
        }

        /* Animation de la deuxième rangée (vers la droite) */
        .track-right {
            animation: scrollRight 40s linear infinite;
        }

        .skill-badge {
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 12px 20px;
            border-radius: 50px;
            font-weight: 500;
            color: white;
            min-width: 140px;
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
            transition: all 0.4s ease;
        }

        .skill-badge.text-dark {
            color: #333;
        }

        .skill-badge:hover {
            transform: translateY(-8px) scale(1.05);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
            z-index: 10;
        }

        /* Styles pour les icônes */
        .skill-badge i {
            font-size: 20px;
            margin-right: 12px;
            min-width: 24px;
            text-align: center;
            transition: transform 0.3s ease;
        }

        .skill-badge:hover i {
            transform: scale(1.2);
        }

        /* Animations de défilement */
        @keyframes scrollLeft {
            0% {
                transform: translateX(0);
            }

            100% {
                transform: translateX(calc(-170px * 20));
            }

            /* Ajusté pour 9 éléments */
        }

        @keyframes scrollRight {
            0% {
                transform: translateX(calc(-170px * 20));
            }

            /* Ajusté pour 9 éléments */
            100% {
                transform: translateX(0);
            }
        }

        /* Overlay pour effet de fondu aux extrémités */
        .skills-container::before,
        .skills-container::after {
            content: '';
            position: absolute;
            z-index: 2;
            width: 150px;
            height: 100%;
            pointer-events: none;
        }

        .skills-container::before {
            left: 0;
            background: linear-gradient(to right, var(--bg-alt), transparent);
        }

        .skills-container::after {
            right: 0;
            background: linear-gradient(to left, var(--bg-alt), transparent);
        }

        /* Responsive */
        @media (max-width: 768px) {
            .skill-badge {
                min-width: 120px;
                padding: 10px 15px;
                font-size: 0.9rem;
            }

            .skill-badge i {
                font-size: 18px;
                margin-right: 8px;
            }

            @keyframes scrollLeft {
                0% {
                    transform: translateX(0);
                }

                100% {
                    transform: translateX(calc(-170px * 20));
                }
            }

            @keyframes scrollRight {
                0% {
                    transform: translateX(calc(-170px * 20));
                }

                100% {
                    transform: translateX(0);
                }
            }

            .skills-container::before,
            .skills-container::after {
                width: 80px;
            }
        }

        @media (max-width: 480px) {
            .skills-section {
                padding: 40px 0;
            }

            .skills-container {
                gap: 25px;
            }

            .skill-badge {
                min-width: 110px;
                padding: 8px 12px;
                font-size: 0.85rem;
            }

            .skill-badge i {
                font-size: 16px;
                margin-right: 6px;
            }
        }

        .container {
            width: 100%;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
            position: relative;
            z-index: 2;
        }

        /* Hero section avec animation de fond */
        .hero {
            padding: 120px 0;
            position: relative;
            overflow: hidden;
            background: linear-gradient(135deg, var(--bg-alt), var(--border-color));
        }

        /* Canvas pour l'animation de fond avec points et lignes */
        #particles-canvas {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 1;
        }

        .hero .container {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 40px;
        }

        .hero-content {
            flex: 1;
            max-width: 600px;
        }

        .hero-image {
            flex: 1;
            max-width: 500px;
            position: relative;
            z-index: 2;
        }

        .profile-circle {
            width: 350px;
            height: 350px;
            border-radius: 50%;
            overflow: hidden;
            box-shadow: var(--shadow-lg);
            border: 6px solid rgba(255, 255, 255, 0.3);
            transition: var(--transition);
            transform: translateY(0px);
            animation: float 6s ease-in-out infinite;
        }

        @keyframes float {
            0% {
                transform: translateY(0px);
            }

            50% {
                transform: translateY(-15px);
            }

            100% {
                transform: translateY(0px);
            }
        }

        .profile-circle img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .hero h1 {
            font-size: 3.2rem;
            font-weight: 800;
            line-height: 1.2;
            margin-bottom: 24px;
            color: var(--text-color);
        }

        .hero h1 .highlight {
            color: var(--primary-color);
            position: relative;
            display: inline-block;
        }

        .hero h1 .highlight::after {
            content: '';
            position: absolute;
            bottom: 5px;
            left: 0;
            width: 100%;
            height: 10px;
            background-color: rgba(67, 97, 238, 0.15);
            z-index: -1;
            border-radius: 5px;
        }

        /* Styles pour le texte dynamique avec effet de typage */
        .dynamic-text-wrapper {
            position: relative;
            height: 60px;
            display: block;
            overflow: hidden;
        }

        .dynamic-text {
            color: var(--primary-color);
            font-weight: 700;
            position: relative;
            display: inline-block;
            font-size: 34px;
        }

        .dynamic-text::after {
            content: "|";
            position: absolute;
            right: -8px;
            color: var(--primary-color);
            font-weight: 700;
            animation: blink 0.7s infinite;
        }

        @keyframes blink {

            0%,
            100% {
                opacity: 1;
            }

            50% {
                opacity: 0;
            }
        }

        .hero p {
            font-size: 1.25rem;
            margin-bottom: 40px;
            color: var(--text-light);
            max-width: 550px;
        }

        .hero-buttons {
            display: flex;
            gap: 16px;
        }

        .btn {
            display: inline-block;
            padding: 12px 24px;
            border-radius: 6px;
            cursor: pointer;
            transition: var(--transition);
            text-align: center;
            font-weight: 600;
            letter-spacing: 0.5px;
            text-decoration: none;
        }

        .btn-primary {
            background-color: var(--primary-color);
            color: white;
        }

        .btn-primary:hover {
            background-color: var(--primary-dark);
            color: white;
            transform: translateY(-2px);
            box-shadow: var(--shadow-hover);
        }

        .btn-outline {
            background-color: transparent;
            border: 2px solid var(--primary-color);
            color: var(--primary-color);
        }

        .btn-outline:hover {
            background-color: var(--primary-color);
            color: white;
            transform: translateY(-2px);
            box-shadow: var(--shadow-hover);
        }

        /* Animations */
        .fade-in {
            opacity: 0;
            transform: translateY(20px);
            animation: fadeIn 0.6s ease forwards;
        }

        .fade-in-delay-1 {
            animation-delay: 0.3s;
        }

        .fade-in-delay-2 {
            animation-delay: 0.6s;
        }

        @keyframes fadeIn {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Responsive */
        @media (max-width: 992px) {
            .hero .container {
                flex-direction: column;
            }

            .hero-content {
                text-align: center;
                max-width: 100%;
            }

            .hero-buttons {
                justify-content: center;
            }

            .hero h1 {
                font-size: 2.8rem;
            }

            .dynamic-text-wrapper {
                height: 50px;
            }
        }

        @media (max-width: 768px) {
            .hero {
                padding: 80px 0;
            }

            .hero h1 {
                font-size: 2.2rem;
            }

            .hero p {
                font-size: 1.1rem;
            }

            .dynamic-text-wrapper {
                height: 40px;
            }

            .profile-circle {
                width: 250px;
                height: 250px;
            }
        }
    </style>
</head>

<body>
    <!-- Section Hero avec animation et appel à l'action plus visible -->
    <section class="hero">
        <!-- Canvas pour l'animation de fond avec points et lignes connectées -->
        <canvas id="particles-canvas"></canvas>

        <div class="container">
            <div class="hero-content">
                <h1 class="fade-in">Développeur d'Applications<br>
                    <span class="dynamic-text-wrapper">
                        <span class="dynamic-text"></span>
                    </span>
                </h1>
                <p class="fade-in fade-in-delay-1">Bienvenue sur mon portfolio. Je crée des solutions
                    logicielles innovantes, performantes et adaptées à vos besoins.</p>
                <div class="hero-buttons fade-in fade-in-delay-2">
                    <a href="projects.php" class="btn btn-primary">Découvrir mes projets</a>
                    <a href="contact.php" class="btn btn-outline">Me contacter</a>
                </div>
            </div>
            <div class="hero-image">
                <div class="profile-circle">
                    <img src="assets/images/profile.jpg" alt="TAHAR-DJEBBAR MOHAMED">
                </div>
            </div>
        </div>
    </section>

    <!-- Bannière de statistiques -->
    <section class="stats-banner">
        <div class="container">
            <div class="stats-grid">
                <div class="stat-item" data-aos="fade-up">
                    <div class="stat-number" data-count="35">0</div>
                    <div class="stat-label">Projets réalisés</div>
                </div>
                <div class="stat-item" data-aos="fade-up" data-aos-delay="200">
                    <div class="stat-number" data-count="10">0</div>
                    <div class="stat-label">Années d'expérience</div>
                </div>
                <div class="stat-item" data-aos="fade-up" data-aos-delay="400">
                    <div class="stat-number" data-count="8">0</div>
                    <div class="stat-label">Technologies maîtrisées</div>
                </div>
            </div>
        </div>
    </section>

    <!-- Section des services -->
    <section class="services section-padding">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title text-center">Services proposés</h2>
                <p class="section-description">Des solutions adaptées à vos besoins techniques</p>
            </div>

            <div class="services-grid">
                <div class="service-card fade-in">
                    <div class="service-icon">
                        <i class="fas fa-desktop"></i>
                    </div>
                    <h3>Applications Desktop</h3>
                    <p>Développement d'applications bureau performantes et intuitives pour Windows, macOS et Linux.</p>
                </div>

                <div class="service-card fade-in fade-in-delay-1">
                    <div class="service-icon">
                        <i class="fas fa-code"></i>
                    </div>
                    <h3>Sites Web</h3>
                    <p>Création de sites web modernes, responsives et optimisés pour les moteurs de recherche.</p>
                </div>

                <div class="service-card fade-in fade-in-delay-2">
                    <div class="service-icon">
                        <i class="fas fa-mobile-alt"></i>
                    </div>
                    <h3>Applications Web</h3>
                    <p>Développement d'applications web complexes et performantes avec les dernières technologies.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Projets en vedette avec présentation plus attrayante -->
    <section class="featured-projects section-padding">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title text-center">Projets en vedette</h2>
                <p class="section-description">Découvrez une sélection de mes meilleurs travaux récents</p>
            </div>

            <div class="projects-grid">
                <?php
                foreach ($featuredProjects as $key => $project) {
                    $delayValue = ($key % 3) * 100;
                    echo '<div class="project-card" data-aos="fade-up" data-aos-delay="' . $delayValue . '">';
                    echo '<div class="project-image">';
                    echo '<img src="assets/images/projects/' . $project['image'] . '" alt="' . $project['title'] . '">';
                    echo '<div class="project-overlay">';
                    echo '<div class="project-actions">';
                    echo '<a href="project-detail.php?id=' . $project['id'] . '" class="btn-view-project">Voir le détail</a>';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                    echo '<div class="project-info">';
                    echo '<h3>' . $project['title'] . '</h3>';
                    echo '<p class="project-description">' . substr($project['description'], 0, 100) . '...</p>';

                    // Affichage amélioré des technologies utilisées
                    if (!empty($project['technologies'])) {
                        echo '<div class="project-technologies">';
                        foreach ($project['technologies'] as $tech) {
                            echo '<span class="tech-badge">' . $tech . '</span>';
                        }
                        echo '</div>';
                    }

                    echo '</div>';
                    echo '</div>';
                }
                ?>
            </div>

            <div class="section-footer text-center">
                <a href="projects.php" class="btn btn-primary">Voir tous mes projets</a>
            </div>
        </div>
    </section>

    <section class="skills-section">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title text-center" data-aos="fade-up">Technologies maîtrisées</h2>
                <p class="section-description" data-aos="fade-up" data-aos-delay="100">Découvrez les technologies que
                    j'utilise au quotidien</p>
            </div>
            <div class="skills-container" data-aos="fade-up" data-aos-delay="200">
                <!-- Première rangée de badges (défilement vers la gauche) -->
                <div class="skills-track track-left">
                    <?php
                    $leftSkills = [
                        ['name' => 'Vercel', 'icon' => 'fas fa-code-branch', 'color' => '#000000'],
                        ['name' => 'AWS', 'icon' => 'fab fa-aws', 'color' => '#FF9900'],
                        ['name' => 'Automator', 'icon' => 'fas fa-robot', 'color' => '#000000'],
                        ['name' => 'C++', 'icon' => 'fas fa-file-code', 'color' => '#00599C'],
                        ['name' => 'CSS', 'icon' => 'fab fa-css3-alt', 'color' => '#2965f1'],
                        ['name' => 'DynamoDB', 'icon' => 'fas fa-database', 'color' => '#1E88E5'],
                        ['name' => 'HTML5', 'icon' => 'fab fa-html5', 'color' => '#E34F26'],
                        ['name' => 'Heroku', 'icon' => 'fas fa-cloud', 'color' => '#6762A6'],
                        ['name' => 'JavaScript', 'icon' => 'fab fa-js', 'color' => '#F7DF1E', 'text-dark' => true],
                        ['name' => 'Node.js', 'icon' => 'fab fa-node-js', 'color' => '#339933'],
                        ['name' => 'Vue.js', 'icon' => 'fab fa-vuejs', 'color' => '#4FC08D'],
                        ['name' => 'React', 'icon' => 'fab fa-react', 'color' => '#61DAFB', 'text-dark' => true],
                        ['name' => 'Docker', 'icon' => 'fab fa-docker', 'color' => '#2496ED'],
                        ['name' => 'VS Code', 'icon' => 'fas fa-code', 'color' => '#007ACC'],
                        ['name' => 'Figma', 'icon' => 'fab fa-figma', 'color' => '#F24E1E'],
                        ['name' => 'Bootstrap', 'icon' => 'fab fa-bootstrap', 'color' => '#7952B3'],
                        ['name' => 'Electron', 'icon' => 'fas fa-atom', 'color' => '#47848F'],
                        ['name' => 'Redis', 'icon' => 'fas fa-database', 'color' => '#DC382D']
                    ];

                    // Affichage des badges (répétés pour l'animation continue)
                    foreach ($leftSkills as $skill) {
                        echo '<div class="skill-badge" style="background-color: ' . $skill['color'] . '">';
                        echo '<i class="' . $skill['icon'] . '"></i>';
                        echo '<span>' . $skill['name'] . '</span>';
                        echo '</div>';
                    }

                    // Répétition pour l'effet continu
                    foreach ($leftSkills as $skill) {
                        echo '<div class="skill-badge" style="background-color: ' . $skill['color'] . '">';
                        echo '<i class="' . $skill['icon'] . '"></i>';
                        echo '<span>' . $skill['name'] . '</span>';
                        echo '</div>';
                    }
                    ?>
                </div>

                <!-- Deuxième rangée de badges (défilement vers la droite) -->
                <div class="skills-track track-right">
                    <?php
                    $rightSkills = [
                        ['name' => 'Prettier', 'icon' => 'fas fa-code', 'color' => '#56B3B4'],
                        ['name' => 'Shadcn', 'icon' => 'fas fa-palette', 'color' => '#111111'],
                        ['name' => 'Tailwind', 'icon' => 'fab fa-css3', 'color' => '#38B2AC'],
                        ['name' => 'TypeScript', 'icon' => 'fab fa-js-square', 'color' => '#3178C6'],
                        ['name' => 'Webpack', 'icon' => 'fas fa-cube', 'color' => '#8DD6F9', 'text-dark' => true],
                        ['name' => 'ASP.NET', 'icon' => 'fab fa-microsoft', 'color' => '#512BD4'],
                        ['name' => 'Arduino', 'icon' => 'fas fa-microchip', 'color' => '#00979D'],
                        ['name' => 'PHP', 'icon' => 'fab fa-php', 'color' => '#777BB4'],
                        ['name' => 'Laravel', 'icon' => 'fab fa-laravel', 'color' => '#FF2D20'],
                        ['name' => 'Python', 'icon' => 'fab fa-python', 'color' => '#3776AB'],
                        ['name' => 'C#', 'icon' => 'fas fa-code', 'color' => '#68217A'],
                        ['name' => '.NET', 'icon' => 'fab fa-microsoft', 'color' => '#512BD4'],
                        ['name' => 'Java', 'icon' => 'fab fa-java', 'color' => '#007396'],
                        ['name' => 'MySQL', 'icon' => 'fas fa-database', 'color' => '#4479A1'],
                        ['name' => 'MongoDB', 'icon' => 'fas fa-leaf', 'color' => '#47A248'],
                        ['name' => 'Git', 'icon' => 'fab fa-git-alt', 'color' => '#F05032'],
                        ['name' => 'Postman', 'icon' => 'fas fa-paper-plane', 'color' => '#FF6C37'],
                        ['name' => 'PostgreSQL', 'icon' => 'fas fa-database', 'color' => '#336791'],
                        ['name' => 'Next.js', 'icon' => 'fab fa-react', 'color' => '#000000'],
                        ['name' => 'Angular', 'icon' => 'fab fa-angular', 'color' => '#DD0031']
                    ];

                    // Affichage des badges (répétés pour l'animation continue)
                    foreach ($rightSkills as $skill) {
                        $textClass = isset($skill['text-dark']) && $skill['text-dark'] ? 'text-dark' : '';
                        echo '<div class="skill-badge ' . $textClass . '" style="background-color: ' . $skill['color'] . '">';
                        echo '<i class="' . $skill['icon'] . '"></i>';
                        echo '<span>' . $skill['name'] . '</span>';
                        echo '</div>';
                    }

                    // Répétition pour l'effet continu
                    foreach ($rightSkills as $skill) {
                        $textClass = isset($skill['text-dark']) && $skill['text-dark'] ? 'text-dark' : '';
                        echo '<div class="skill-badge ' . $textClass . '" style="background-color: ' . $skill['color'] . '">';
                        echo '<i class="' . $skill['icon'] . '"></i>';
                        echo '<span>' . $skill['name'] . '</span>';
                        echo '</div>';
                    }
                    ?>
                </div>
            </div>
        </div>
    </section>

    <!-- Section CTA -->
    <section class="cta">
        <div class="container">
            <div class="cta-content" data-aos="zoom-in">
                <h2>Vous avez un projet en tête ?</h2>
                <p>Discutons ensemble de vos besoins et trouvons la solution adaptée à votre projet.</p>
                <a href="contact.php" class="btn btn-light">Contactez-moi</a>
            </div>
        </div>
    </section>
    <!-- Bouton de retour en haut -->
    <div id="back-to-top" class="back-to-top">
        <i class="fas fa-arrow-up"></i>
    </div>
    <!-- Script pour l'animation des statistiques -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Initialisation de AOS
            AOS.init({
                easing: 'ease-out-back',
                once: false,
                mirror: false,
                offset: 120
            });

            // Animation des statistiques
            const statNumbers = document.querySelectorAll('.stat-number');

            const animateStats = () => {
                statNumbers.forEach(stat => {
                    const target = parseInt(stat.getAttribute('data-count'));
                    const duration = 2000; // en millisecondes
                    const step = target / (duration / 16);
                    let current = 0;

                    const updateCounter = () => {
                        current += step;
                        if (current < target) {
                            stat.textContent = Math.floor(current);
                            requestAnimationFrame(updateCounter);
                        } else {
                            stat.textContent = target;
                        }
                    };

                    updateCounter();
                });
            };

            // Activer l'animation lorsque l'élément devient visible
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        animateStats();
                        observer.unobserve(entry.target);
                    }
                });
            }, { threshold: 0.5 });

            const statsSection = document.querySelector('.stats-banner');
            if (statsSection) {
                observer.observe(statsSection);
            }

            // Système d'onglets pour les compétences
            const tabButtons = document.querySelectorAll('.tab-btn');
            const tabPanels = document.querySelectorAll('.tab-panel');

            tabButtons.forEach(button => {
                button.addEventListener('click', () => {
                    const targetTab = button.getAttribute('data-tab');

                    // Réinitialiser toutes les classes actives
                    tabButtons.forEach(btn => btn.classList.remove('active'));
                    tabPanels.forEach(panel => panel.classList.remove('active'));

                    // Activer l'onglet sélectionné
                    button.classList.add('active');
                    document.getElementById(targetTab).classList.add('active');
                });
            });
        });
    </script>
    <script>
        // Animation de texte dynamique
        document.addEventListener('DOMContentLoaded', function () {
            const dynamicText = document.querySelector('.dynamic-text');
            const phrases = ["Développement Full Stack", "Applications Web & Bureau", "Solutions Mobiles Multiplateformes", "Architecture Frontend/Backend", "Technologies Cloud & DevOps"];
            let currentPhrase = 0;
            let currentChar = 0;
            let isDeleting = false;
            let typingSpeed = 100; // Vitesse de frappe en millisecondes

            function typeEffect() {
                const phrase = phrases[currentPhrase];

                if (isDeleting) {
                    // Suppression de caractères
                    dynamicText.textContent = phrase.substring(0, currentChar - 1);
                    currentChar--;
                    typingSpeed = 50; // Supprimer plus vite
                } else {
                    // Ajout de caractères
                    dynamicText.textContent = phrase.substring(0, currentChar + 1);
                    currentChar++;
                    typingSpeed = 100; // Taper plus lentement
                }

                // Si nous avons terminé de taper la phrase complète
                if (!isDeleting && currentChar === phrase.length) {
                    isDeleting = true;
                    typingSpeed = 1500; // Pause avant de supprimer
                }
                // Si nous avons supprimé toute la phrase
                else if (isDeleting && currentChar === 0) {
                    isDeleting = false;
                    currentPhrase = (currentPhrase + 1) % phrases.length; // Passer à la phrase suivante
                    typingSpeed = 500; // Pause avant la prochaine phrase
                }

                setTimeout(typeEffect, typingSpeed);
            }

            // Démarrer l'effet de frappe
            setTimeout(typeEffect, 1000);

            // Animation de particules connectées
            const canvas = document.getElementById('particles-canvas');
            const ctx = canvas.getContext('2d');

            // Redimensionner le canvas pour qu'il couvre toute la section
            function resizeCanvas() {
                canvas.width = canvas.parentElement.offsetWidth;
                canvas.height = canvas.parentElement.offsetHeight;
            }

            window.addEventListener('resize', resizeCanvas);
            resizeCanvas();

            // Configuration des particules
            const particlesArray = [];
            const numberOfParticles = 80;
            const maxDistance = 150; // Distance maximale pour connecter les particules

            // Couleurs des particules et lignes
            const particleColor = 'rgba(67, 97, 238, 0.7)'; // Couleur primaire
            const lineColor = 'rgba(67, 97, 238, 0.15)'; // Couleur des lignes connectées

            // Classe Particle
            class Particle {
                constructor() {
                    this.x = Math.random() * canvas.width;
                    this.y = Math.random() * canvas.height;
                    this.size = Math.random() * 3 + 1;
                    this.speedX = Math.random() * 1 - 0.5;
                    this.speedY = Math.random() * 1 - 0.5;
                }

                // Mettre à jour la position de la particule
                update() {
                    this.x += this.speedX;
                    this.y += this.speedY;

                    // Rebondir sur les bords
                    if (this.x > canvas.width || this.x < 0) {
                        this.speedX = -this.speedX;
                    }
                    if (this.y > canvas.height || this.y < 0) {
                        this.speedY = -this.speedY;
                    }
                }

                // Dessiner la particule
                draw() {
                    ctx.fillStyle = particleColor;
                    ctx.beginPath();
                    ctx.arc(this.x, this.y, this.size, 0, Math.PI * 2);
                    ctx.fill();
                }
            }

            // Créer les particules
            function init() {
                for (let i = 0; i < numberOfParticles; i++) {
                    particlesArray.push(new Particle());
                }
            }

            // Connecter les particules proches
            function connect() {
                for (let a = 0; a < particlesArray.length; a++) {
                    for (let b = a; b < particlesArray.length; b++) {
                        const dx = particlesArray[a].x - particlesArray[b].x;
                        const dy = particlesArray[a].y - particlesArray[b].y;
                        const distance = Math.sqrt(dx * dx + dy * dy);

                        if (distance < maxDistance) {
                            // Ajuster l'opacité en fonction de la distance
                            const opacity = 1 - (distance / maxDistance);
                            ctx.strokeStyle = lineColor.replace('0.15', opacity * 0.15);
                            ctx.lineWidth = 1;
                            ctx.beginPath();
                            ctx.moveTo(particlesArray[a].x, particlesArray[a].y);
                            ctx.lineTo(particlesArray[b].x, particlesArray[b].y);
                            ctx.stroke();
                        }
                    }
                }
            }

            // Animer les particules
            function animate() {
                ctx.clearRect(0, 0, canvas.width, canvas.height);

                for (let i = 0; i < particlesArray.length; i++) {
                    particlesArray[i].update();
                    particlesArray[i].draw();
                }

                connect();
                requestAnimationFrame(animate);
            }

            init();
            animate();
        });
    </script>
</body>

</html>
<?php include 'includes/footer.php'; ?>