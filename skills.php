<?php
// skills.php - Page des compétences adaptée selon la page about.php
session_start();
$pageTitle = "Mes Compétences";
include 'includes/header.php';

// Utilisation des catégories et descriptions tirées de about.php
$categoryDescriptions = [
    'Développement Web' => 'Langages de programmation et technologies web que je maîtrise',
    'Développement Desktop' => 'Technologies pour créer des applications de bureau performantes',
    'Bases de Données' => 'Systèmes de gestion de données relationnelles et NoSQL',
    'Design' => 'Compétences en design UX/UI et outils graphiques',
    'Langues' => 'Langues étrangères que je parle',
    'Cloud & DevOps' => 'Maîtrise des technologies d\'orchestration, de conteneurisation et d\'automatisation',
    'Systèmes d\'exploitation' => 'Administration et configuration de systèmes Linux et Windows',
    'Réseaux' => 'Configuration et maintenance d\'infrastructures réseau complexes',
    'Télécommunication' => 'Connaissance approfondie des technologies de communication'
];

// Définition des compétences par catégorie avec ajout des icônes
$skills = [
    // Développement Web
    [
        'skill_name' => 'PHP',
        'skill_level' => 90,
        'category' => 'Développement Web',
        'description' => 'Développement d\'applications web avec PHP 7/8, POO, MVC',
        'icon' => 'fab fa-php'
    ],
    [
        'skill_name' => 'JavaScript',
        'skill_level' => 85,
        'category' => 'Développement Web',
        'description' => 'ES6+, développement frontend et backend avec Node.js',
        'icon' => 'fab fa-js'
    ],
    [
        'skill_name' => 'TypeScript',
        'skill_level' => 70,
        'category' => 'Développement Web',
        'description' => 'JavaScript typé pour des applications robustes et maintenables',
        'icon' => 'fab fa-js-square'
    ],
    [
        'skill_name' => 'Tailwind CSS',
        'skill_level' => 80,
        'category' => 'Développement Web',
        'description' => 'Framework CSS utilitaire pour design rapide et personnalisé',
        'icon' => 'fab fa-css3-alt'
    ],
    [
        'skill_name' => 'Next.js',
        'skill_level' => 75,
        'category' => 'Développement Web',
        'description' => 'Framework React pour applications web performantes et SEO-friendly',
        'icon' => 'fab fa-react'
    ],
    [
        'skill_name' => 'HTML/CSS',
        'skill_level' => 95,
        'category' => 'Développement Web',
        'description' => 'Maîtrise des standards modernes du web, responsive design',
        'icon' => 'fab fa-html5'
    ],
    [
        'skill_name' => 'React.js',
        'skill_level' => 80,
        'category' => 'Développement Web',
        'description' => 'Développement d\'interfaces utilisateur interactives, Redux, Hooks',
        'icon' => 'fab fa-react'
    ],
    [
        'skill_name' => 'Node.js',
        'skill_level' => 75,
        'category' => 'Développement Web',
        'description' => 'Développement backend JavaScript, API RESTful, Express',
        'icon' => 'fab fa-node-js'
    ],
    [
        'skill_name' => 'Vue.js',
        'skill_level' => 70,
        'category' => 'Développement Web',
        'description' => 'Création d\'interfaces réactives avec Vue 3, Composition API',
        'icon' => 'fab fa-vuejs'
    ],
    [
        'skill_name' => 'Laravel',
        'skill_level' => 85,
        'category' => 'Développement Web',
        'description' => 'Framework PHP pour le développement rapide d\'applications sécurisées',
        'icon' => 'fab fa-laravel'
    ],
    [
        'skill_name' => 'Angular',
        'skill_level' => 80,
        'category' => 'Développement Web',
        'description' => 'Développement d\'applications web dynamiques avec Angular',
        'icon' => 'fab fa-angular'
    ],
    [
        'skill_name' => 'Bootstrap',
        'skill_level' => 75,
        'category' => 'Développement Web',
        'description' => 'Création d\'interfaces réactives et modernes avec Bootstrap 4/5',
        'icon' => 'fab fa-bootstrap'
    ],
    
    // Développement Desktop
    [
        'skill_name' => 'C#',
        'skill_level' => 90,
        'category' => 'Développement Desktop',
        'description' => 'Développement d\'applications Windows, WPF, .NET Core',
        'icon' => 'fas fa-code'
    ],
    [
        'skill_name' => '.NET',
        'skill_level' => 85,
        'category' => 'Développement Desktop',
        'description' => 'Framework .NET, applications d\'entreprise, services Windows',
        'icon' => 'fas fa-window-restore'
    ],
    [
        'skill_name' => 'Python',
        'skill_level' => 95,
        'category' => 'Développement Desktop',
        'description' => 'Développement d\'applications, scripts d\'automation, analyse de données',
        'icon' => 'fab fa-python'
    ],
    [
        'skill_name' => 'Java',
        'skill_level' => 90,
        'category' => 'Développement Desktop',
        'description' => 'Développement d\'applications desktop et web avec Spring',
        'icon' => 'fab fa-java'
    ],
    [
        'skill_name' => 'C++',
        'skill_level' => 75,
        'category' => 'Développement Desktop',
        'description' => 'Programmation de systèmes performants et applications embarquées',
        'icon' => 'fas fa-laptop-code'
    ],
    [
        'skill_name' => 'Electron.js',
        'skill_level' => 70,
        'category' => 'Développement Desktop',
        'description' => 'Création d\'applications multiplateformes avec des technologies web',
        'icon' => 'fas fa-atom'
    ],
    
    // Bases de Données
    [
        'skill_name' => 'MySQL',
        'skill_level' => 90,
        'category' => 'Bases de Données',
        'description' => 'Conception et optimisation de bases de données relationnelles',
        'icon' => 'fas fa-database'
    ],
    [
        'skill_name' => 'DynamoDB',
        'skill_level' => 65,
        'category' => 'Bases de Données',
        'description' => 'Modélisation de données NoSQL et optimisation des performances avec Amazon DynamoDB',
        'icon' => 'fas fa-server'
    ],
    [
        'skill_name' => 'PostgreSQL',
        'skill_level' => 85,
        'category' => 'Bases de Données',
        'description' => 'Administration et utilisation avancée de PostgreSQL',
        'icon' => 'fas fa-database'
    ],
    [
        'skill_name' => 'MongoDB',
        'skill_level' => 70,
        'category' => 'Bases de Données',
        'description' => 'Conception de bases de données NoSQL, utilisation avec Node.js',
        'icon' => 'fas fa-leaf'
    ],
    [
        'skill_name' => 'Redis',
        'skill_level' => 75,
        'category' => 'Bases de Données',
        'description' => 'In-memory data structure store, caching et messaging',
        'icon' => 'fas fa-bolt'
    ],
    [
        'skill_name' => 'SQL Server',
        'skill_level' => 80,
        'category' => 'Bases de Données',
        'description' => 'Administration et optimisation de bases Microsoft SQL Server',
        'icon' => 'fab fa-microsoft'
    ],
    [
        'skill_name' => 'Elasticsearch',
        'skill_level' => 65,
        'category' => 'Bases de Données',
        'description' => 'Moteur de recherche distribué pour le Big Data',
        'icon' => 'fas fa-search'
    ],
    
    // Design
    [
        'skill_name' => 'Figma',
        'skill_level' => 65,
        'category' => 'Design',
        'description' => 'Conception d\'interfaces utilisateur, prototypage et collaboration',
        'icon' => 'fab fa-figma'
    ],
    [
        'skill_name' => 'Adobe XD',
        'skill_level' => 60,
        'category' => 'Design',
        'description' => 'Design d\'interfaces, wireframing et prototypage interactif',
        'icon' => 'fab fa-adobe'
    ],
    [
        'skill_name' => 'Photoshop',
        'skill_level' => 70,
        'category' => 'Design',
        'description' => 'Édition et retouche d\'images pour les projets web',
        'icon' => 'fas fa-image'
    ],
    [
        'skill_name' => 'UI/UX Design',
        'skill_level' => 75,
        'category' => 'Design',
        'description' => 'Conception centrée utilisateur, tests d\'utilisabilité',
        'icon' => 'fas fa-palette'
    ],
    [
        'skill_name' => 'Sketch',
        'skill_level' => 55,
        'category' => 'Design',
        'description' => 'Création d\'interfaces pour applications mobile et web',
        'icon' => 'fas fa-bezier-curve'
    ],
    
    // Cloud & DevOps
    [
        'skill_name' => 'AWS',
        'skill_level' => 70,
        'category' => 'Cloud & DevOps',
        'description' => 'Services AWS, EC2, S3, Lambda, déploiement cloud',
        'icon' => 'fab fa-aws'
    ],
    [
        'skill_name' => 'Kubernetes',
        'skill_level' => 85,
        'category' => 'Cloud & DevOps',
        'description' => 'Orchestration de conteneurs, déploiement et scaling',
        'icon' => 'fas fa-dharmachakra'
    ],
    [
        'skill_name' => 'Docker',
        'skill_level' => 90,
        'category' => 'Cloud & DevOps',
        'description' => 'Conteneurisation et virtualisation d\'applications',
        'icon' => 'fab fa-docker'
    ],
    [
        'skill_name' => 'Jenkins',
        'skill_level' => 80,
        'category' => 'Cloud & DevOps',
        'description' => 'Intégration continue et déploiement automatisé',
        'icon' => 'fas fa-cogs'
    ],
    [
        'skill_name' => 'Ansible',
        'skill_level' => 85,
        'category' => 'Cloud & DevOps',
        'description' => 'Automation d\'infrastructure, configuration as code',
        'icon' => 'fas fa-network-wired'
    ],
    [
        'skill_name' => 'Git/GitHub',
        'skill_level' => 90,
        'category' => 'Cloud & DevOps',
        'description' => 'Gestion de versions, branches, workflows collaboratifs',
        'icon' => 'fab fa-git-alt'
    ],
    [
        'skill_name' => 'ELK Stack',
        'skill_level' => 75,
        'category' => 'Cloud & DevOps',
        'description' => 'Monitoring, logging et analytics',
        'icon' => 'fas fa-chart-line'
    ],
    [
        'skill_name' => 'Azure',
        'skill_level' => 80,
        'category' => 'Cloud & DevOps',
        'description' => 'Services cloud Microsoft, App Service, Azure Functions',
        'icon' => 'fab fa-microsoft'
    ],
    [
        'skill_name' => 'Terraform',
        'skill_level' => 75,
        'category' => 'Cloud & DevOps',
        'description' => 'Infrastructure as code, provisionnement de ressources cloud',
        'icon' => 'fas fa-cubes'
    ],
    [
        'skill_name' => 'CI/CD',
        'skill_level' => 85,
        'category' => 'Cloud & DevOps',
        'description' => 'Pipelines d\'intégration et déploiement continus',
        'icon' => 'fas fa-sync-alt'
    ],
    [
        'skill_name' => 'Vercel',
        'skill_level' => 70,
        'category' => 'Cloud & DevOps',
        'description' => 'Déploiement et hébergement d\'applications front-end avec Vercel, intégration continue et gestion de domaines',
        'icon' => 'fas fa-cloud-upload-alt' // ou 'fab fa-vercel' si disponible dans ta version de Font Awesome
    ],

    // Systèmes d'exploitation
    [
        'skill_name' => 'Linux',
        'skill_level' => 85,
        'category' => 'Systèmes d\'exploitation',
        'description' => 'Administration de systèmes Linux, shell scripting, sécurité',
        'icon' => 'fab fa-linux'
    ],
    [
        'skill_name' => 'Windows',
        'skill_level' => 95,
        'category' => 'Systèmes d\'exploitation',
        'description' => 'Administration Windows Server, Active Directory, PowerShell',
        'icon' => 'fab fa-windows'
    ],
    [
        'skill_name' => 'macOS',
        'skill_level' => 70,
        'category' => 'Systèmes d\'exploitation',
        'description' => 'Configuration et maintenance des environnements Apple',
        'icon' => 'fab fa-apple'
    ],
    [
        'skill_name' => 'Shell Scripting',
        'skill_level' => 80,
        'category' => 'Systèmes d\'exploitation',
        'description' => 'Automatisation avec Bash, PowerShell et Python',
        'icon' => 'fas fa-terminal'
    ],
    
    // Réseaux
    [
        'skill_name' => 'CISCO',
        'skill_level' => 90,
        'category' => 'Réseaux',
        'description' => 'Configuration d\'équipements Cisco, routeurs et switches',
        'icon' => 'fas fa-server'
    ],
    [
        'skill_name' => 'TCP/IP',
        'skill_level' => 95,
        'category' => 'Réseaux',
        'description' => 'Protocoles réseau, troubleshooting, analyse de paquets',
        'icon' => 'fas fa-network-wired'
    ],
    [
        'skill_name' => 'VPN/IPsec',
        'skill_level' => 85,
        'category' => 'Réseaux',
        'description' => 'Mise en place de tunnels VPN sécurisés, cryptographie',
        'icon' => 'fas fa-shield-alt'
    ],
    [
        'skill_name' => 'MPLS',
        'skill_level' => 80,
        'category' => 'Réseaux',
        'description' => 'Configuration et gestion de réseaux MPLS',
        'icon' => 'fas fa-project-diagram'
    ],
    [
        'skill_name' => 'QoS',
        'skill_level' => 75,
        'category' => 'Réseaux',
        'description' => 'Mise en place de qualité de service sur les réseaux',
        'icon' => 'fas fa-tachometer-alt'
    ],
    [
        'skill_name' => 'Routing & Switching',
        'skill_level' => 90,
        'category' => 'Réseaux',
        'description' => 'Configuration de routeurs et switches, OSPF, BGP',
        'icon' => 'fas fa-route'
    ],
    [
        'skill_name' => 'SD-WAN',
        'skill_level' => 75,
        'category' => 'Réseaux',
        'description' => 'Implémentation et gestion de réseaux définis par logiciel',
        'icon' => 'fas fa-sitemap'
    ],
    [
        'skill_name' => 'Wireshark',
        'skill_level' => 85,
        'category' => 'Réseaux',
        'description' => 'Analyse approfondie du trafic réseau et dépannage',
        'icon' => 'fas fa-microscope'
    ],
    
    // Télécommunication
    [
        'skill_name' => 'Réseaux mobiles',
        'skill_level' => 80,
        'category' => 'Télécommunication',
        'description' => 'Compréhension des réseaux 4G/5G, architectures et protocoles',
        'icon' => 'fas fa-broadcast-tower'
    ],
    [
        'skill_name' => 'Fibre optique',
        'skill_level' => 75,
        'category' => 'Télécommunication',
        'description' => 'Installation et maintenance des réseaux fibre optique',
        'icon' => 'fas fa-exchange-alt'
    ],
    [
        'skill_name' => 'VoIP',
        'skill_level' => 70,
        'category' => 'Télécommunication',
        'description' => 'Implémentation de solutions voix sur IP, SIP, Asterisk',
        'icon' => 'fas fa-phone-alt'
    ],
    
    // Langues
    [
        'skill_name' => 'Arabe',
        'skill_level' => 100,
        'category' => 'Langues',
        'description' => 'Langue maternelle',
        'icon' => 'fas fa-language'
    ],
    [
        'skill_name' => 'Français',
        'skill_level' => 90,
        'category' => 'Langues',
        'description' => 'Niveau professionnel avancé, écrit et oral',
        'icon' => 'fas fa-language'
    ],
    [
        'skill_name' => 'Anglais',
        'skill_level' => 65,
        'category' => 'Langues',
        'description' => 'Niveau intermédiaire, technique et professionnel',
        'icon' => 'fas fa-language'
    ]
];

// Extraire les catégories uniques
$categories = [];
foreach ($skills as $skill) {
    if (!in_array($skill['category'], $categories)) {
        $categories[] = $skill['category'];
    }
}
// Trier les catégories selon l'ordre de priorité
$categoryOrder = [
    'Développement Web',
    'Développement Desktop',
    'Bases de Données',
    'Design',
    'Cloud & DevOps',
    'Systèmes d\'exploitation',
    'Réseaux',
    'Télécommunication',
    'Langues'
];
usort($categories, function ($a, $b) use ($categoryOrder) {
    return array_search($a, $categoryOrder) - array_search($b, $categoryOrder);
});
?>
<link rel="stylesheet" href="assets/css/style.css">
<link rel="stylesheet" href="assets/css/theme-styles.css">
<link href="assets/assets/aos/aos.css" rel="stylesheet">
<script src="assets/assets/aos/aos.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<link rel="stylesheet" href="assets/css/haut.css">
<script src="assets/js/haut.js"></script>

<style>
    .skills-content {
        background: linear-gradient(135deg, var(--bg-alt), var(--border-color));
    }

    .skill-item {
        background-color: var(--bg-color);
        padding: 30px;
        border-radius: 12px;
        box-shadow: var(--shadow-md);
        transition: var(--transition);
        position: relative;
        overflow: hidden;
        margin-bottom: 20px;
    }

    .skill-item:hover {
        transform: translateY(-6px);
        box-shadow: var(--shadow-lg);
    }

    .skill-item::after {
        content: '';
        position: absolute;
        top: 0;
        right: 0;
        width: 60px;
        height: 60px;
        border-radius: 0 0 0 80%;
        background-color: rgba(67, 97, 238, 0.08);
        z-index: 0;
    }

    .skill-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 15px;
        position: relative;
        z-index: 1;
    }

    .skill-header h3 {
        color: var(--primary-color);
        font-size: 1.35rem;
        font-weight: 700;
        position: relative;
        padding-bottom: 12px;
        margin-right: 15px;
    }

    .skill-header h3::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        width: 50px;
        height: 4px;
        background: linear-gradient(to right, var(--primary-color), var(--accent-color));
        border-radius: 2px;
    }

    .skill-icon {
        font-size: 2.5rem;
        color: var(--primary-color);
        opacity: 0.8;
        margin-right: 10px;
        transition: var(--transition);
        flex-shrink: 0;
    }

    .skill-item:hover .skill-icon {
        transform: scale(1.1);
        opacity: 1;
    }

    .skill-description {
        margin-bottom: 15px;
        position: relative;
        z-index: 1;
    }

    .progress-bar {
        height: 8px;
        background-color: rgba(255, 255, 255, 0.1);
        border-radius: 4px;
        overflow: hidden;
        margin-top: 10px;
    }

    .progress {
        height: 100%;
        background: linear-gradient(to right, var(--primary-color), var(--accent-color));
        border-radius: 4px;
    }

    .skill-info {
        display: flex;
        justify-content: space-between;
        margin-bottom: 5px;
    }

    .skill-percentage {
        font-weight: bold;
        color: var(--primary-color);
    }

    .category-description {
        margin-bottom: 30px;
    }

    .skills-tabs {
        margin-bottom: 30px;
    }

    .tabs-nav {
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
        margin-bottom: 30px;
    }

    .tab-btn {
        padding: 12px 24px;
        background-color: var(--bg-color);
        border: 2px solid var(--border-color);
        border-radius: 30px;
        font-weight: 600;
        cursor: pointer;
        transition: var(--transition);
    }

    .tab-btn.active {
        background-color: var(--primary-color);
        color: white;
        border-color: var(--primary-color);
    }

    .tab-btn:hover {
        background-color: var(--primary-color);
        color: white;
        border-color: var(--primary-color);
    }

    .tab-panel {
        display: none;
    }

    .tab-panel.active {
        display: block;
    }

    .skills-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
        gap: 20px;
    }

    .skill-header-content {
        display: flex;
        align-items: center;
        flex: 1;
    }

    @media (max-width: 768px) {
        .skills-grid {
            grid-template-columns: 1fr;
        }
    }
</style>

<section class="skills-hero">
    <div class="container">
        <h1 data-aos="fade-down">Mes Compétences Techniques</h1>
        <p data-aos="fade-up" data-aos-delay="300">Expertise en développement, réseaux et technologies de l'information</p>
    </div>
</section>

<section class="skills-content section-padding">
    <div class="container">
        <div class="skills-tabs">
            <div class="tabs-nav" data-aos="fade-up">
                <?php foreach ($categories as $index => $category): ?>
                    <button class="tab-btn <?php echo $index === 0 ? 'active' : ''; ?>" 
                            data-tab="tab-<?php echo $index; ?>">
                        <?php echo htmlspecialchars($category); ?>
                    </button>
                <?php endforeach; ?>
            </div>

            <?php foreach ($categories as $index => $category): ?>
                <div class="tab-panel <?php echo $index === 0 ? 'active' : ''; ?>" 
                     id="tab-<?php echo $index; ?>" 
                     data-aos="fade-up" 
                     data-aos-delay="200">
                    <p class="category-description">
                        <?php echo isset($categoryDescriptions[$category]) ? $categoryDescriptions[$category] : ''; ?>
                    </p>

                    <div class="skills-grid">
                        <?php
                        // Filtrer les compétences par catégorie
                        $filteredSkills = array_filter($skills, function ($skill) use ($category) {
                            return $skill['category'] === $category;
                        });

                        // Trier par niveau de compétence (décroissant)
                        usort($filteredSkills, function ($a, $b) {
                            return $b['skill_level'] - $a['skill_level'];
                        });

                        foreach ($filteredSkills as $skillIndex => $skill):
                            $delay = $skillIndex * 50 + 300;
                        ?>
                            <div class="skill-item" data-aos="fade-up" data-aos-delay="<?php echo $delay; ?>">
                                <div class="skill-header">
                                    <div class="skill-header-content">
                                        <i class="skill-icon <?php echo $skill['icon']; ?>"></i>
                                        <h3><?php echo htmlspecialchars($skill['skill_name']); ?></h3>
                                    </div>
                                </div>
                                <?php if (isset($skill['description']) && !empty($skill['description'])): ?>
                                    <p class="skill-description"><?php echo htmlspecialchars($skill['description']); ?></p>
                                <?php endif; ?>
                                <div class="skill-info">
                                    <span class="skill-name">Niveau de maîtrise</span>
                                    <span class="skill-percentage"><?php echo $skill['skill_level']; ?>%</span>
                                </div>
                                <div class="progress-bar">
                                    <div class="progress" style="width: <?php echo $skill['skill_level']; ?>%"></div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<section class="cta">
    <div class="container">
        <div class="cta-content">
            <h2>Intéressé(e) par mes compétences ?</h2>
            <p>N'hésitez pas à me contacter pour discuter de votre projet ou de vos besoins en développement.</p>
            <div class="cta-buttons">
                <a href="contact.php" class="btn btn-light">Me contacter</a>
                <a href="about.php" class="btn btn-outline-light">En savoir plus sur moi</a>
            </div>
        </div>
    </div>
</section>

<!-- Bouton de retour en haut -->
<div id="back-to-top" class="back-to-top">
    <i class="fas fa-arrow-up"></i>
</div>

<script>
    // Initialisation de AOS
    AOS.init({
        easing: 'ease-in-back',
        once: false,
        mirror: false,
        offset: 100
    });

    // Gestion des onglets
    document.addEventListener('DOMContentLoaded', function() {
        const tabButtons = document.querySelectorAll('.tab-btn');
        const tabPanels = document.querySelectorAll('.tab-panel');

        tabButtons.forEach(button => {
            button.addEventListener('click', () => {
                const targetTab = button.getAttribute('data-tab');

                // Désactiver tous les onglets
                tabButtons.forEach(btn => btn.classList.remove('active'));
                tabPanels.forEach(panel => panel.classList.remove('active'));

                // Activer l'onglet sélectionné
                button.classList.add('active');
                document.getElementById(targetTab).classList.add('active');
            });
        });
    });
</script>

<?php include 'includes/footer.php'; ?>