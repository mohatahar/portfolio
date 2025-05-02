<?php
// about.php - Page À propos améliorée (version statique sans base de données)
session_start();
$pageTitle = "À propos de moi";
include 'includes/header.php';

// Données statiques pour la page "À propos"
$about = [
    'title' => 'Développeur d\'Applications Passionné',
    'bio' => '<p>Bonjour ! Je suis un développeur d\'applications avec plus de 15 ans d\'expérience dans la création de solutions logicielles innovantes et efficaces. Passionné par les nouvelles technologies, j\'aime relever des défis techniques et transformer des idées en applications fonctionnelles.</p>
    <p>Mon parcours m\'a permis d\'acquérir une solide expertise en développement web et desktop, ainsi qu\'une bonne compréhension des besoins des utilisateurs. Je m\'engage à créer des applications intuitives, performantes et esthétiques, en utilisant les meilleures pratiques du développement logiciel.</p>
    <p>En constante évolution, je me forme régulièrement aux nouvelles technologies pour rester à la pointe de mon domaine. Mon objectif est de vous aider à concrétiser vos projets avec des solutions sur mesure.</p>'
];

// Expériences professionnelles
$experiences = [
    [
        'position' => 'Ingénieur d\'état en informatique',
        'company' => 'Établissement Public Hospitalier de Sobha, Chlef',
        'start_date' => '2018-03-01',
        'end_date' => '',
        'description' => 'Gestion de l\'infrastructure informatique et réseau de l\'établissement hospitalier.',
        'achievements' => 'Mise en place d\'une infrastructure cloud pour la gestion des données médicales|Implémentation de solutions DevOps pour automatiser les déploiements d\'applications|Configuration et maintenance des systèmes de sécurité informatique',
        'technologies' => 'Kubernetes|Docker|Jenkins|Ansible|Linux|Windows Server'
    ],
    [
        'position' => 'Ingénieur d\'état en informatique',
        'company' => 'Direction d\'administration Local, Ain Defla',
        'start_date' => '2012-12-01',
        'end_date' => '2016-06-30',
        'description' => 'Gestion de l\'infrastructure réseau et assistance technique pour les services de l\'administration.',
        'achievements' => 'Déploiement et administration du réseau local de l\'institution|Mise en place de solutions VPN pour les connexions à distance|Gestion de la sécurité informatique de l\'infrastructure',
        'technologies' => 'CISCO|TCP/IP|VPN|Firewalling|Linux|Windows'
    ],
    [
        'position' => 'Stage - Ingénieur réseaux et protocoles',
        'company' => 'Algérie Télécoms',
        'start_date' => '2012-02-01',
        'end_date' => '2012-03-31',
        'description' => 'Stage au niveau du centre RMS pour étudier le réseau multiservices de nouvelle génération NGN.',
        'achievements' => 'Étude de la technologie MPLS (TE, QoS, VPN)|Configuration et mise en place d\'un VPN dans un backbone IP/MPLS|Utilisation de routeurs Cisco pour les configurations réseau',
        'technologies' => 'MPLS|Cisco|NGN|IP/MPLS|VPN|QoS'
    ]
];

// Formation
$education = [
    [
        'degree' => 'Master en informatique, option : Réseaux et systèmes répartis',
        'institution' => 'Université d\'Oran',
        'graduation_year' => '2011',
        'description' => 'Spécialisation en réseaux informatiques et systèmes distribués avec projet de fin d\'études sur l\'équilibrage de charge dans les grilles de calcul.',
        'honors' => ''
    ],
    [
        'degree' => 'Licence en informatique, option : Intelligence Artificielle',
        'institution' => 'Université de Hassiba Ben Bouali, Chlef',
        'graduation_year' => '2009',
        'description' => 'Formation en intelligence artificielle et fondamentaux de l\'informatique.',
        'honors' => ''
    ]
];

// Centres d'intérêt
$interests = [
    [
        'name' => 'Technologie',
        'icon' => 'fas fa-microchip',
        'description' => 'Toujours à l’affût des dernières innovations en informatique et en intelligence artificielle.'
    ],
    [
        'name' => 'Veille informatique',
        'icon' => 'fas fa-newspaper',
        'description' => 'J’aime suivre l’évolution des langages, frameworks et outils open source.'
    ],
    [
        'name' => 'Gaming',
        'icon' => 'fas fa-gamepad',
        'description' => 'Amateur de jeux vidéo, notamment ceux qui mêlent stratégie et logique.'
    ],
    [
        'name' => 'Séries & streaming',
        'icon' => 'fas fa-tv',
        'description' => 'Toujours à la recherche de la prochaine série à binge-watcher sur Netflix ou Prime.'
    ],
    [
        'name' => 'Football',
        'icon' => 'fas fa-futbol',
        'description' => 'Supporter passionné et joueur amateur, je suis de près les grands championnats.'
    ],
    [
        'name' => 'Randonnée',
        'icon' => 'fas fa-hiking',
        'description' => 'J\'aime explorer de nouveaux sentiers et découvrir la nature.'
    ]
];
?>
<link href="assets/assets/aos/aos.css" rel="stylesheet">
<link rel="stylesheet" href="assets/css/style.css">
<link rel="stylesheet" href="assets/css/theme-styles.css">
<script src="assets/assets/aos/aos.js"></script>
<style>
    /* Style pour les timeline-item comme skill-item */
    .timeline-content {
        background-color: var(--bg-color);
        padding: 30px;
        border-radius: 12px;
        box-shadow: var(--shadow-md);
        transition: var(--transition);
        position: relative;
        overflow: hidden;
        margin-bottom: 30px;
        margin-left: 30px;
    }

    .timeline-content:hover {
        transform: translateY(-6px);
        box-shadow: var(--shadow-lg);
    }

    .timeline-content::after {
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

    .timeline-date {
        color: var(--primary-color);
        font-weight: 700;
        position: relative;
        padding-bottom: 12px;
        display: inline-block;
        margin-bottom: 15px;
    }

    .timeline-date::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        width: 50px;
        height: 4px;
        border-radius: 2px;
        background-color: var(--primary-color);
    }

    .timeline-content h3 {
        color: var(--primary-color);
        font-size: 1.35rem;
        font-weight: 700;
        margin-bottom: 10px;
    }

    .timeline {
        position: relative;
        padding-left: 20px;
    }

    /* Ajout de la ligne verticale */
    .timeline::before {
        content: '';
        position: absolute;
        top: 0;
        bottom: 0;
        left: 0;
        width: 4px;
        background-color: var(--primary-color);
        border-radius: 2px;
        display: block;
    }

    .timeline-item {
        position: relative;
    }

    .timeline-item::before {
        content: '';
        position: absolute;
        left: -24px;
        top: 15px;
        width: 16px;
        height: 16px;
        border-radius: 50%;
        background: var(--primary-color);
        border: 4px solid var(--bg-color);
        z-index: 1;
    }

    .skills-content {
        background: linear-gradient(135deg, var(--bg-alt), var(--border-color));
    }

    .skills-content {
        background: linear-gradient(135deg, var(--bg-alt), var(--border-color));
    }
</style>

<section class="about-hero">
    <div class="container">
        <h1 data-aos="fade-up">À propos de moi</h1>
        <p data-aos="fade-up" data-aos-delay="100">Mon parcours, mes compétences et ma passion pour ce que je fais.</p>
    </div>
</section>

<!-- Section Hero avec animation -->
<section class="skills-content section-padding">
    <div class="container">
        <div class="about-content">
            <div class="profile-image" data-aos="fade-right" data-aos-delay="100">
                <img src="assets/images/profile.jpg" alt="Photo de profil">
            </div>
            <div class="about-text" data-aos="fade-left" data-aos-delay="200">
                <h2><?php echo htmlspecialchars($about['title']); ?></h2>
                <div class="bio"><?php echo $about['bio']; ?></div>

                <div class="about-buttons">
                    <a href="assets/documents/cv.pdf" class="btn btn-primary" download>Télécharger mon CV</a>
                    <a href="contact.php" class="btn btn-outline">Me contacter</a>
                </div>
            </div>
        </div>
    </div>
</section>

    <!-- Nouvelle section "Résumé" avec statistiques -->
    <section class="stats-banner">
        <div class="container">
            <div class="stats-grid">
                <div class="stat-item" data-aos="fade-up">
                    <div class="stat-number" data-count="15">0</div>
                    <div class="stat-label">Années d'expérience</div>
                </div>
                <div class="stat-item" data-aos="fade-up" data-aos-delay="200">
                    <div class="stat-number" data-count="2">0</div>
                    <div class="stat-label">Diplômes obtenus</div>
                </div>
                <div class="stat-item" data-aos="fade-up" data-aos-delay="400">
                    <div class="stat-number" data-count="220">0</div>
                    <div class="stat-label">Projets réalisés</div>
                </div>
            </div>
        </div>
    </section>

    <!-- Section Expérience professionnelle améliorée -->
    <section class="skills-content section-padding">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title" data-aos="fade-up">Expérience professionnelle</h2>
                <p class="section-description" data-aos="fade-up" data-aos-delay="100">Mon parcours professionnel au fil
                    des années</p>
            </div>

            <div class="timeline">
                <?php
                foreach ($experiences as $index => $exp) {
                    $startDate = date('Y', strtotime($exp['start_date']));
                    $endDate = empty($exp['end_date']) ? 'Présent' : date('Y', strtotime($exp['end_date']));
                    $duration = $endDate == 'Présent'
                        ? floor((time() - strtotime($exp['start_date'])) / (60 * 60 * 24 * 30)) . ' mois'
                        : floor((strtotime($exp['end_date']) - strtotime($exp['start_date'])) / (60 * 60 * 24 * 30)) . ' mois';
                    $delay = $index * 100;
                    ?>
                    <div class="timeline-item" data-aos="fade-up" data-aos-delay="<?php echo $delay; ?>">
                        <div class="timeline-date"><?php echo $startDate . ' - ' . $endDate; ?></div>
                        <div class="timeline-content">
                            <h3><?php echo htmlspecialchars($exp['position']); ?></h3>
                            <h4><?php echo htmlspecialchars($exp['company']) . ' • ' . $duration; ?></h4>
                            <p><?php echo $exp['description']; ?></p>

                            <?php if (!empty($exp['achievements'])): ?>
                                <div class="exp-achievements">
                                    <h5>Réalisations clés :</h5>
                                    <ul>
                                        <?php
                                        $achievementsArray = explode('|', $exp['achievements']);
                                        foreach ($achievementsArray as $achievement) {
                                            echo '<li>' . htmlspecialchars($achievement) . '</li>';
                                        }
                                        ?>
                                    </ul>
                                </div>
                            <?php endif; ?>

                            <?php if (!empty($exp['technologies'])): ?>
                                <div class="exp-technologies">
                                    <div class="project-tags">
                                        <?php
                                        $technologiesArray = explode('|', $exp['technologies']);
                                        foreach ($technologiesArray as $tech) {
                                            echo '<span class="tag">' . htmlspecialchars($tech) . '</span>';
                                        }
                                        ?>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </section>


    <!-- Section Formation améliorée -->
    <section class="skills-content section-padding">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title" data-aos="fade-up">Formation</h2>
                <p class="section-description" data-aos="fade-up" data-aos-delay="100">Mon parcours académique et mes
                    certifications</p>
            </div>

            <div class="timeline">
                <?php
                foreach ($education as $edu) {
                    ?>
                    <div class="timeline-item" data-aos="fade-up" data-aos-delay="<?php echo $delay; ?>">
                        <div class="timeline-date"><?php echo $edu['graduation_year']; ?></div>
                        <div class="timeline-content">
                            <h3><?php echo htmlspecialchars($edu['degree']); ?></h3>
                            <h4><?php echo htmlspecialchars($edu['institution']); ?></h4>
                            <p><?php echo $edu['description']; ?></p>

                            <?php if (!empty($edu['honors'])): ?>
                                <div class="edu-honors">
                                    <h5>Distinctions :</h5>
                                    <p><?php echo htmlspecialchars($edu['honors']); ?></p>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </section>

    <!-- Section intérêts personnels -->
    <section class="skills-content section-padding">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">Centres d'intérêt</h2>
                <p class="section-description">Ce qui me passionne en dehors du travail</p>
            </div>

            <div class="interests-content">
                <div class="interests-grid">
                    <?php foreach ($interests as $index => $interest):
                        $delay = $index * 100;
                        ?>
                        <div class="interest-item" data-aos="zoom-in" data-aos-delay="<?php echo $delay; ?>">
                            <div class="interest-icon">
                                <i class="<?php echo $interest['icon']; ?>"></i>
                            </div>
                            <h3><?php echo htmlspecialchars($interest['name']); ?></h3>
                            <p><?php echo htmlspecialchars($interest['description']); ?></p>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </section>
    
    <!-- Section CTA -->
    <section class="cta">
        <div class="container">
            <div class="cta-content" data-aos="zoom-in">
                <h2>Intéressé(e) par une collaboration ?</h2>
                <p>Si vous souhaitez discuter d'un projet ou en savoir plus sur mes services, n'hésitez pas à me
                    contacter.</p>
                <div class="cta-buttons">
                    <a href="contact.php" class="btn btn-light">Me contacter</a>
                </div>
            </div>
        </div>
    </section>
    
    <!-- Script pour l'animation des compteurs et la gestion des onglets -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Initialisation de AOS
            AOS.init({
                easing: 'ease-out-back',
                once: false,
                mirror: false,
                offset: 120
            });

            // Animation des compteurs
            const counters = document.querySelectorAll('.stat-number');
            const speed = 200; // Plus le nombre est petit, plus c'est rapide

            counters.forEach(counter => {
                const updateCount = () => {
                    const target = +counter.getAttribute('data-count');
                    const count = +counter.innerText;
                    const increment = target / speed;

                    if (count < target) {
                        counter.innerText = Math.ceil(count + increment);
                        setTimeout(updateCount, 1);
                    } else {
                        counter.innerText = target;
                    }
                };

                // Démarrer l'animation uniquement lorsque l'élément est visible
                const observer = new IntersectionObserver((entries) => {
                    if (entries[0].isIntersecting) {
                        updateCount();
                        observer.disconnect();
                    }
                });

                observer.observe(counter);
            });

            // Gestion des onglets
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