<?php
// project-detail.php - Page de détail d'un projet
session_start();
$pageTitle = "Détail du projet";
include 'includes/header.php';

// Définition des catégories
$categories = [
  ['id' => 1, 'name' => 'Web'],
  ['id' => 2, 'name' => 'Mobile'],
  ['id' => 3, 'name' => 'Bureau'],
  ['id' => 4, 'name' => 'Autres']
];

// Définition des technologies
$technologies = [
  1 => ['id' => 1, 'name' => 'PHP'],
  2 => ['id' => 2, 'name' => 'JavaScript'],
  3 => ['id' => 3, 'name' => 'HTML/CSS'],
  4 => ['id' => 4, 'name' => 'React'],
  5 => ['id' => 5, 'name' => 'Vue.js'],
  6 => ['id' => 6, 'name' => 'Node.js'],
  7 => ['id' => 7, 'name' => 'Python'],
  8 => ['id' => 8, 'name' => 'Java'],
  9 => ['id' => 9, 'name' => 'C#'],
  10 => ['id' => 10, 'name' => 'MySql'],
  11 => ['id' => 11, 'name' => 'MongoDB']
];

// Définition des projets avec leurs images et technologies associées
$projects = [
  1 => [
    'id' => 1,
    'title' => 'Application de gestion d\'inventaire',
    'description' => '<p>Application complète de gestion d\'inventaire hospitalier avec fonctionnalités d\'ajout, de recherche, de suivi et d\'export de documents.</p>
                 <p>Elle permet au personnel de l\'EPH SOBHA de gérer efficacement les équipements médicaux, d\'enregistrer leur provenance, leur valeur et leur affectation, tout en gardant une trace complète de l\'historique des mouvements.</p>',

    'challenges' => '<p>La gestion d\'un inventaire médical exigeait une traçabilité parfaite et une interface utilisateur accessible à différents niveaux de personnel. J\'ai également dû concevoir un système robuste de catégorisation et d\'identification unique pour chaque article.</p>
                <p>J\'ai implémenté un système de génération de QR codes pour faciliter le suivi des équipements et développé une architecture de base de données optimisée pour les requêtes fréquentes.</p>',

    'results' => '<p>L\'application est utilisée quotidiennement par l\'ensemble du personnel de l\'EPH SOBHA et a permis d\'améliorer considérablement la gestion des stocks d\'équipements médicaux, avec une réduction des pertes estimée à 15% et un gain significatif en temps de gestion administratif.</p>',
    'image' => 'projet1/inventaire.jpg',
    'category_id' => 1,
    'category_name' => 'Web',
    'date_created' => '2025-02-10',
    'client' => 'Etablissement Public Hospitalier de Sobha "EPH SOBHA"',
    'technologies' => [1, 2, 10],
    'images' => [
      ['filename' => 'projet1/inventaire.jpg', 'display_order' => 1],
      ['filename' => 'projet1/inventaire0.jpg', 'display_order' => 2],
      ['filename' => 'projet1/inventaire1.jpg', 'display_order' => 3],
      ['filename' => 'projet1/inventaire2.jpg', 'display_order' => 4]
    ]
  ],
  2 => [
    'id' => 2,
    'title' => 'Portfolio Personnel',
    'description' => '<p>Site web portfolio présentant mes compétences et réalisations dans le développement web. Ce projet a été créé pour présenter mon travail de manière professionnelle et attrayante.</p>
                         <p>La conception met l\'accent sur une navigation intuitive et une présentation claire des projets, avec un design responsive qui s\'adapte à tous les appareils.</p>',
    'challenges' => '<p>Le principal défi était de créer une galerie de projets interactive qui soit à la fois esthétique et performante. J\'ai dû optimiser le chargement des images et mettre en place un système de filtrage efficace.</p>
                        <p>Pour résoudre ces problèmes, j\'ai implémenté un chargement lazy des images et utilisé JavaScript pour créer une expérience de filtrage fluide sans rechargement de page.</p>',
    'results' => '<p>Le site a permis d\'augmenter ma visibilité en ligne et d\'attirer plusieurs clients potentiels. Il sert désormais de vitrine pour tous mes projets et compétences.</p>',
    'image' => 'projet2/portfolio.jpg',
    'category_id' => 1,
    'category_name' => 'Web',
    'date_created' => '2025-03-15',
    'client' => 'Projet personnel',
    'technologies' => [1, 2, 3],
    'images' => [
      ['filename' => 'projet2/portfolio.jpg', 'display_order' => 1],
      ['filename' => 'projet2/portfolio0.jpg', 'display_order' => 2],
      ['filename' => 'projet2/portfolio1.jpg', 'display_order' => 3],
      ['filename' => 'projet2/portfolio2.jpg', 'display_order' => 4]
    ]
  ],
  3 => [
    'id' => 3,
    'title' => 'Gestion de Stock',
    'description' => '<p>Application complète de gestion de stock hospitalier avec suivi détaillé des biens et équipements de l\'établissement public hospitalier SOBHA.</p>
                      <p>Elle permet au personnel de gérer les produits, leur emplacement, leurs caractéristiques et de suivre les mouvements avec une interface claire et organisée.</p>',

    'challenges' => '<p>La gestion d\'un stock hospitalier nécessitait un système de catégorisation précis et une interface adaptée aux différents types d\'utilisateurs du personnel médical et administratif.</p>
                     <p>J\'ai développé un système de traçabilité complet et conçu une base de données efficace permettant des recherches rapides sur un large inventaire de produits consommables et non consommables.</p>',

    'results' => '<p>L\'application est utilisée quotidiennement par le personnel de l\'EPH SOBHA et a permis une optimisation significative de la gestion des stocks avec un suivi précis des équipements médicaux et mobiliers de l\'établissement.</p>
                  <p>Le système a contribué à une meilleure planification des achats et à la réduction des ruptures de stock des biens essentiels.</p>',
    'image' => 'projet3/stock.jpg',
    'category_id' => 3,
    'category_name' => 'Bureau',
    'date_created' => '2024-12-05',
    'client' => 'Etablissement Public Hospitalier de Sobha "EPH SOBHA"',
    'technologies' => [7, 10],
    'images' => [
      ['filename' => 'projet3/stock.jpg', 'display_order' => 1]
    ]
  ],
  4 => [
    'id' => 4,
    'title' => 'Système de Gestion de vaccination',
    'description' => '<p>Application complète de gestion hospitalière intégrant le suivi des vaccinations du personnel et la gestion des stocks de vaccins de l\'établissement public hospitalier SOBHA.</p>
                      <p>Elle permet aux administrateurs de surveiller les taux de vaccination, gérer les stocks de vaccins et suivre les informations du personnel avec un tableau de bord intuitif et des formulaires dédiés.</p>',

    'challenges' => '<p>La conception d\'un système intégré hospitalier nécessitait une architecture modulaire adaptée aux différents services et types d\'utilisateurs, tout en assurant la cohérence des données entre les modules.</p>
                     <p>J\'ai développé une solution sécurisée pour gérer les informations sensibles du personnel médical, implémenté un système de rappels automatiques pour les vaccinations, et créé une interface utilisateur intuitive accessible aux différents profils d\'utilisateurs.</p>',

    'results' => '<p>Le système est utilisé quotidiennement par l\'administration de l\'EPH SOBHA et a permis d\'atteindre un taux de suivi vaccinal proche de 100% du personnel, avec un système efficace de rappels pour les vaccinations à venir.</p>
                  <p>La solution a contribué à une meilleure gestion du personnel (627 employés), à une traçabilité optimale des lots de vaccins et à une réduction significative des tâches administratives manuelles.</p>',
    'image' => 'projet4/vaccin.jpg',
    'category_id' => 2,
    'category_name' => 'Web',
    'date_created' => '2024-11-20',
    'client' => 'Etablissement Public Hospitalier de Sobha "EPH SOBHA"',
    'technologies' => [1, 2, 3, 10],
    'images' => [
      ['filename' => 'projet4/vaccin.jpg', 'display_order' => 1],
      ['filename' => 'projet4/vaccin0.jpg', 'display_order' => 2],
      ['filename' => 'projet4/vaccin1.jpg', 'display_order' => 3],
      ['filename' => 'projet4/vaccin2.jpg', 'display_order' => 4],
      ['filename' => 'projet4/vaccin3.jpg', 'display_order' => 5]
    ]
  ],
  5 => [
    'id' => 5,
    'title' => 'Application de gestion des stocks alimentaires et des approvisionnements',
    'description' => '<p>Application complète de gestion de cuisine pour l\'établissement public hospitalier SOBHA permettant de suivre les stocks, entrées/sorties et commandes de produits alimentaires.</p>
                      <p>Elle offre un tableau de bord intuitif avec des indicateurs clés, des alertes de stock et un système complet de traçabilité pour optimiser la gestion des ressources alimentaires.</p>',

    'challenges' => '<p>La conception d\'une interface à la fois simple et complète pour gérer efficacement l\'ensemble du cycle d\'approvisionnement était le principal défi technique.</p>                         
                     <p>J\'ai développé un système d\'alerte paramétrable et mis en place une architecture permettant de tracer toutes les opérations avec une haute fiabilité.</p>',

    'results' => '<p>Cette solution a permis à l\'établissement hospitalier de réduire les ruptures de stock de 40%, d\'optimiser les commandes et d\'améliorer significativement la traçabilité des produits alimentaires.</p>',
    'image' => 'projet5/cuisine.jpg',
    'category_id' => 1,
    'category_name' => 'Web',
    'date_created' => '2024-09-30',
    'client' => 'Etablissement Public Hospitalier de Sobha "EPH SOBHA"',
    'technologies' => [1, 2, 3, 10],
    'images' => [
      ['filename' => 'projet5/cuisine.jpg', 'display_order' => 1],
      ['filename' => 'projet5/cuisine0.jpg', 'display_order' => 2],
      ['filename' => 'projet5/cuisine1.jpg', 'display_order' => 3],
      ['filename' => 'projet5/cuisine2.jpg', 'display_order' => 4],
      ['filename' => 'projet5/cuisine3.jpg', 'display_order' => 5],
      ['filename' => 'projet5/cuisine4.jpg', 'display_order' => 6],
      ['filename' => 'projet5/cuisine5.jpg', 'display_order' => 7]
    ]
    ],
    6 => [
      'id' => 6,
      'title' => 'Système de Gestion d\'un magasin',
      'description' => '<p>Système de gestion de stock moderne et intuitif permettant de suivre en temps réel les mouvements des produits et d\'alerter sur les ruptures potentielles.</p>     
                        <p>Il offre un tableau de bord complet avec des indicateurs clés, des rapports personnalisables et une interface utilisateur fluide pour une gestion optimale des ressources matérielles.</p>',
      'challenges' => '<p>La conception d\'une interface utilisateur intuitive tout en garantissant un système robuste de traçabilité des produits était le défi principal de ce projet.</p>     
                       <p>J\'ai développé une architecture modulaire permettant la gestion des différents types de produits et implémenté un système d\'alertes paramétrable pour prévenir les ruptures de stock.</p>',
      'results' => '<p>Cette solution a permis à l\'établissement cliente de réduire de 35% le temps consacré à la gestion des stocks, d\'éliminer quasiment les ruptures de stock et d\'améliorer significativement la visibilité sur l\'utilisation des ressources.</p>',
      'image' => 'projet6/magasin.jpg',
      'category_id' => 1,
      'category_name' => 'Web',
      'date_created' => '2024-09-13',
      'client' => 'Lycée Salah Eddine Alayoubi',
      'technologies' => [1, 2, 3, 10],
      'images' => [
        ['filename' => 'projet6/magasin.jpg', 'display_order' => 1],
        ['filename' => 'projet6/magasin0.jpg', 'display_order' => 2],
        ['filename' => 'projet6/magasin1.jpg', 'display_order' => 3],
        ['filename' => 'projet6/magasin2.jpg', 'display_order' => 4]
      ]
      ],
      7 => [
        'id' => 7,
        'title' => 'Système de Gestion d\'un magasin',
        'description' => '<p>Application permettant d\'ajouter et de gérer les protocoles opératoires des patients. Elle offre une interface pour enregistrer les informations détaillées sur les opérations chirurgicales, incluant les données patient, les détails médicaux et l\'équipe médicale impliquée.</p>     
                          <p>Le système permet de suivre et d\'organiser tous les protocoles opératoires au sein de l\'établissement EPH SOBHA.</p>',
        'challenges' => '<p>La création d\'un système de suivi médical nécessitait une interface intuitive pour différents types d\'utilisateurs médicaux tout en assurant une organisation chronologique et une traçabilité complète des interventions.</p>     
                         <p>Le système devait également permettre une recherche efficace et une catégorisation par périodes (mensuelle, trimestrielle, annuelle) pour faciliter le reporting et l\'analyse des activités chirurgicales.</p>',
        'results' => '<p>L\'application est maintenant en place et utilisée par l\'équipe médicale de l\'EPH SOBHA pour documenter et suivre les interventions chirurgicales.</p>
                      <p>Elle permet un accès rapide aux informations des patients et de leurs protocoles opératoires, avec des fonctionnalités de recherche et de visualisation des statistiques.</p>',
        'image' => 'projet7/protocole.jpg',
        'category_id' => 1,
        'category_name' => 'Web',
        'date_created' => '2024-11-30',
        'client' => 'Etablissement Public Hospitalier de Sobha "EPH SOBHA"',
        'technologies' => [1, 2, 3, 10],
        'images' => [
          ['filename' => 'projet7/protocole.jpg', 'display_order' => 1],
          ['filename' => 'projet7/protocole0.jpg', 'display_order' => 2]
        ]
        ],
        8 => [
          'id' => 8,
          'title' => 'Système de Gestion du Matériel Médical',
          'description' => '<p>Application complète de gestion du matériel médical hospitalier permettant le suivi en temps réel des équipements médicaux de l\'EPH SOBHA. La plateforme offre un tableau de bord intuitif affichant les statistiques essentielles, la gestion détaillée des équipements avec leur distribution par service, ainsi que le suivi des maintenances préventives et correctives. Le système inclut également un module de gestion des pannes permettant de signaler, catégoriser et suivre la résolution des problèmes techniques.</p>',

          'challenges' => '<p>La gestion d\'un parc d\'équipements médicaux critiques nécessitait une interface permettant une visibilité claire sur l\'état opérationnel de chaque appareil. J\'ai dû concevoir un système capable de suivre simultanément l\'inventaire, les maintenances planifiées et les incidents techniques, tout en permettant une répartition efficace entre les différents services hospitaliers. Le défi incluait également la mise en place d\'un système de priorisation des pannes et la traçabilité complète des interventions techniques.</p>',     

          'results' => '<p>L\'application est utilisée quotidiennement par l\'équipe technique et le personnel médical de l\'EPH SOBHA, permettant une gestion optimisée des équipements médicaux répartis entre les différents services. Le système a permis d\'améliorer considérablement le temps de réponse aux pannes signalées et d\'assurer un suivi rigoureux des maintenances préventives, contribuant ainsi à prolonger la durée de vie des équipements. Le tableau de bord offre une vision claire et instantanée de l\'état du parc matériel de l\'établissement.</p>',

          'image' => 'projet8/dmm.jpg',
          'category_id' => 1,
          'category_name' => 'Web',
          'date_created' => '2025-01-30',
          'client' => 'Etablissement Public Hospitalier de Sobha "EPH SOBHA"',
          'technologies' => [1, 2, 3, 10],
          'images' => [
            ['filename' => 'projet8/dmm.jpg', 'display_order' => 1],
            ['filename' => 'projet8/dmm0.jpg', 'display_order' => 2],
            ['filename' => 'projet8/dmm1.jpg', 'display_order' => 3],
            ['filename' => 'projet8/dmm2.jpg', 'display_order' => 4]
          ]
          ],
          9 => [
            'id' => 9,
            'title' => 'Système de Gestion de Laboratoire Médical',
            'description' => '<p>Application complète pour la gestion et le suivi des analyses médicales en laboratoire. L\'application permet d\'enregistrer les patients, de créer des demandes d\'analyses médicales, de suivre leur progression et de générer des rapports détaillés. Conçue pour le laboratoire du Dr. Kaddour Djebbar, l\'application offre une interface intuitive pour visualiser les analyses en attente, en cours et terminées, avec un système de notifications et de gestion des résultats pour l\'ensemble du personnel médical.</p>',
  
            'challenges' => '<p>La conception d\'un système de gestion de laboratoire médical exigeait une architecture capable de traiter différents types d\'analyses tout en maintenant une traçabilité parfaite des examens médicaux. J\'ai dû concevoir un système sécurisé avec connexion authentifiée pour protéger les données sensibles des patients. Le défi principal consistait à créer un flux de travail fluide permettant de suivre visuellement le statut des analyses, de l\'enregistrement de la demande jusqu\'à la génération des résultats, tout en maintenant une interface accessible aux techniciens de laboratoire et aux médecins.</p>',     
  
            'results' => '<p>L\'application est utilisée quotidiennement par l\'équipe du laboratoire et permet de gérer efficacement les analyses médicales des patients. Le tableau de bord principal affiche clairement la répartition des analyses, permettant une meilleure organisation du travail. Le système de génération de rapports journaliers offre des statistiques précises sur les performances du laboratoire, incluant le taux de complétion et des graphiques visuels. La plateforme sécurisée garantit la confidentialité des données patient tout en offrant des fonctionnalités d\'exportation pour faciliter le partage des résultats avec d\'autres professionnels de santé.</p>',
  
            'image' => 'projet9/labo.jpg',
            'category_id' => 3,
            'category_name' => 'Bureau',
            'date_created' => '2024-12-30',
            'client' => 'Laboratoire Médical du Dr. Kaddour Djebbar',
            'technologies' => [6, 11],
            'images' => [
              ['filename' => 'projet9/labo0.jpg', 'display_order' => 1],
              ['filename' => 'projet9/labo.jpg', 'display_order' => 2],
              ['filename' => 'projet9/labo1.jpg', 'display_order' => 3],
              ['filename' => 'projet9/labo2.jpg', 'display_order' => 4]
            ]
            ],
            10 => [
              'id' => 10,
              'title' => 'Système de Gestion de Banque de Sang',
              'description' => '<p>Application complète de gestion de banque de sang permettant le suivi des donneurs, des dons, et des demandes de sang. Elle offre un tableau de bord central montrant les statistiques essentielles (dons totaux, demandes en cours, types de sang disponibles), ainsi que des fonctionnalités de gestion des nouveaux dons avec enregistrement des paramètres médicaux des donneurs.</p>',     
    
              'challenges' => '<p>La gestion d\'une banque de sang hospitalière nécessitait un système précis de suivi des stocks par type sanguin et une interface intuitive pour le personnel médical. J\'ai dû développer un système de gestion des demandes urgentes et mettre en place un mécanisme d\'alerte pour les stocks à expirer. Le système devait également assurer la traçabilité complète des donneurs et de leurs paramètres médicaux (hémoglobine, tension artérielle, poids) pour garantir l\'éligibilité des dons.</p>',

              'results' => '<p>L\'application est utilisée quotidiennement par le personnel de l\'EPH SOBHA et a permis d\'optimiser la gestion des stocks sanguins, d\'accélérer le traitement des demandes urgentes et d\'améliorer le suivi des donneurs.</p>',
    
              'image' => 'projet10/sang.jpg',
              'category_id' => 1,
              'category_name' => 'Web',
              'date_created' => '2025-12-01',
              'client' => 'Etablissement Public Hospitalier de Sobha "EPH SOBHA"',
              'technologies' => [1, 2, 3, 10],
              'images' => [
                ['filename' => 'projet10/sang0.jpg', 'display_order' => 1],
                ['filename' => 'projet10/sang.jpg', 'display_order' => 2],
                ['filename' => 'projet10/sang1.jpg', 'display_order' => 3],
                ['filename' => 'projet10/sang2.jpg', 'display_order' => 4]
              ]
              ],
              11 => [
                'id' => 11,
                'title' => 'Application de Gestion du Service de Prévention',
                'description' => '<p>Application complète de gestion du Service de Prévention pour l\'établissement public hospitalier SOBHA permettant de suivre les demandes de désinfection et les signalements de risques infectieux. L\'application offre un tableau de bord intuitif avec des indicateurs clés, des visualisations de données et un système complet de traçabilité pour optimiser la gestion des interventions de prévention et maintenir les standards d\'hygiène hospitalière.</p>',     
      
                'challenges' => '<p>La conception d\'une interface à la fois simple et complète pour gérer efficacement l\'ensemble du cycle de prévention sanitaire était le principal défi technique.</p>

                 L\'application devait permettre :</p>

                    * Une visualisation claire des priorités pour les équipes d\'intervention.</p>
                    * Un suivi précis des délais de traitement pour les demandes urgentes.</p>
                    * Une traçabilité complète des actions pour les audits de qualité.</p>
                    * Une interface intuitive pour les personnels soignants et administratifs.</p>',
  
                'results' => '<p>Cette solution a permis à l\'établissement hospitalier de :</p>

                              * Réduire significativement les délais d\'intervention sur les zones à risque.</p>
                              * Améliorer le suivi des protocoles de désinfection.</p>
                              * Optimiser l\'allocation des ressources de prévention.</p>
                              * Centraliser la gestion des signalements de risques.</p>
                              * Fournir des données précises pour les audits de qualité et certification.</p>',
      
                'image' => 'projet11/semep.jpg',
                'category_id' => 1,
                'category_name' => 'Web',
                'date_created' => '2024-11-14',
                'client' => 'Etablissement Public Hospitalier de Sobha "EPH SOBHA"',
                'technologies' => [1, 2, 3, 10],
                'images' => [
                  ['filename' => 'projet11/semep.jpg', 'display_order' => 1],
                  ['filename' => 'projet11/semep0.jpg', 'display_order' => 2],
                  ['filename' => 'projet11/semep1.jpg', 'display_order' => 3],
                  ['filename' => 'projet11/semep2.jpg', 'display_order' => 4],
                  ['filename' => 'projet11/semep3.jpg', 'display_order' => 5]
                ]
                ],
                12 => [
                  'id' => 12,
                  'title' => 'Site web de l\'EPH SOBHA',
                  'description' => '<p>On a conçu un site web moderne et fonctionnel pour EPH SOBHA, reflétant l\'excellence de l\'établissement. Ce site web optimisé valorise les services médicaux et facilite la communication avec les patients actuels et futurs de l\'établissement.</p>',     
        
                  'challenges' => '<p>* Besoin de visibilité en ligne : création d\'un site responsive et optimisé pour les moteurs de recherche.</p>
                                      * Nécessité de projeter une image professionnelle : design épuré et médical avec une navigation intuitive.</p>
                                      * Accessibilité aux informations pratiques : intégration des contacts et heures d\'ouverture en évidence.</p>
                                      * Fidélisation des patients : implémentation d\'une section actualités pour partager les nouveautés".</p>',
    
                  'results' => '<p>Ce nouveau site web permet de :</p>
  
                                * Augmenter la visibilité auprès de nouveaux patients potentiels.</p>
                                * Réduire les appels pour les demandes d\'informations basiques.</p>
                                * Renforcer la confiance des patients grâce à une image professionnelle.</p>
                                * Faciliter la prise de contact et les demandes de rendez-vous.</p>
                                * Positionner EPH SOBHA comme établissement de référence dans la région.</p>',
        
                  'image' => 'projet12/ephsobha.jpg',
                  'category_id' => 1,
                  'category_name' => 'Web',
                  'date_created' => '2025-05-01',
                  'client' => 'Etablissement Public Hospitalier de Sobha "EPH SOBHA"',
                  'technologies' => [1, 2, 3, 10],
                  'images' => [
                    ['filename' => 'projet12/ephsobha.jpg', 'display_order' => 1]
                  ]
                ]
];

// Récupération de l'ID du projet à partir de l'URL
if (!isset($_GET['id']) || !is_numeric($_GET['id']) || !isset($projects[intval($_GET['id'])])) {
  header('Location: projects.php');
  exit;
}

$project_id = intval($_GET['id']);
$project = $projects[$project_id];

// Mise à jour du titre de la page
$pageTitle = $project['title'];

// Récupération des technologies du projet
$project_technologies = [];
foreach ($project['technologies'] as $tech_id) {
  if (isset($technologies[$tech_id])) {
    $project_technologies[] = $technologies[$tech_id];
  }
}

// Récupération des images du projet
$images = $project['images'];
usort($images, function ($a, $b) {
  return $a['display_order'] - $b['display_order'];
});

// Fonction pour trouver des projets connexes
function getRelatedProjects($projects, $current_project_id, $category_id, $limit = 3)
{
  $related = [];
  foreach ($projects as $project) {
    if ($project['id'] != $current_project_id && $project['category_id'] == $category_id) {
      $related[] = $project;
      if (count($related) >= $limit) {
        break;
      }
    }
  }
  return $related;
}

// Récupération des projets liés
$relatedProjects = getRelatedProjects($projects, $project_id, $project['category_id']);
?>
<link rel="stylesheet" href="assets/css/style.css">
<link rel="stylesheet" href="assets/css/theme-styles.css">
<style>
  .project-detail {
    background: linear-gradient(135deg, var(--bg-alt), var(--border-color));
  }

  /* Breadcrumb */
  .breadcrumb {
    margin: 20px 0 30px;
    font-size: 0.9rem;
    color: #777;
  }

  .breadcrumb a {
    color: var(--primary-color);
    text-decoration: none;
    margin: 0 5px;
  }

  .breadcrumb a:first-child {
    margin-left: 0;
  }

  .breadcrumb a:hover {
    text-decoration: underline;
  }

  .breadcrumb span {
    margin-left: 5px;
    color: var(--text-color);
  }

  /* En-tête du projet */
  .project-header {
    margin-bottom: 30px;
  }

  .project-header h1 {
    font-size: 2.5rem;
    margin-bottom: 15px;
  }

  .project-meta {
    display: flex;
    flex-wrap: wrap;
    gap: 15px;
    align-items: center;
    margin-bottom: 20px;
  }

  .project-category {
    display: inline-block;
    background-color: var(--light-gray);
    padding: 4px 12px;
    border-radius: 20px;
    font-size: 0.9rem;
    font-weight: 500;
  }

  .project-date {
    color: #666;
    font-size: 0.9rem;
  }

  /* Galerie d'images */
  .project-gallery {
    background-color: var(--bg-color);
    margin-bottom: 40px;
    box-shadow: var(--shadow);
    border-radius: 8px;
    overflow: hidden;
  }

  .main-image {
    width: 100%;
    height: auto;
    position: relative;
    overflow: hidden;
    background-color: #f0f0f0;
    display: flex;
    align-items: center;
    justify-content: center;
  }

  .main-image img {
    width: 100%;
    height: auto;
    display: block;
    transition: transform 0.3s ease;
  }

  .main-image:hover img {
    transform: scale(1.02);
  }

  .thumbnail-gallery {
    display: flex;
    gap: 10px;
    padding: 15px;
    background-color: var(--white);
    flex-wrap: wrap;
  }

  .thumbnail {
    width: 80px;
    height: 60px;
    cursor: pointer;
    border-radius: 4px;
    overflow: hidden;
    opacity: 0.7;
    transition: all 0.2s ease;
    border: 2px solid transparent;
  }

  .thumbnail img {
    width: 100%;
    height: 100%;
    object-fit: cover;
  }

  .thumbnail:hover {
    opacity: 0.9;
  }

  .thumbnail.active {
    opacity: 1;
    border-color: var(--primary-color);
  }

  /* Contenu du projet */
  .project-content {
    display: grid;
    grid-template-columns: 2fr 1fr;
    gap: 40px;
    margin-bottom: 50px;
  }

  .project-description {
    line-height: 1.6;
  }

  .project-description h2 {
    font-size: 1.5rem;
    margin: 30px 0 15px;
    border-bottom: 2px solid var(--light-gray);
    padding-bottom: 10px;
  }

  .project-description h2:first-child {
    margin-top: 0;
  }

  .project-description p {
    margin-bottom: 15px;
  }

  .project-sidebar {
    display: flex;
    flex-direction: column;
    gap: 30px;
  }

  .project-info-box {
    background-color: var(--bg-color);
    border-radius: 8px;
    box-shadow: var(--shadow);
    transition: var(--transition);
    padding: 20px;
    position: relative;
    overflow: hidden;
  }

  .project-info-box:hover {
    transform: translateY(-6px);
    box-shadow: var(--shadow-lg);
  }

  .project-info-box h3 {
    font-size: 1.2rem;
    margin: 0 0 15px;
  }

  .technologies-list {
    display: flex;
    flex-wrap: wrap;
    gap: 8px;
  }

  .tech-tag {
    background-color: rgba(52, 152, 219, 0.1);
    padding: 6px 10px;
    border-radius: 4px;
    font-size: 0.9rem;
    font-weight: 500;
  }

  /* Projets connexes */
  .related-projects {
    margin-top: 60px;
    padding-top: 40px;
    border-top: 1px solid var(--light-gray);
  }

  .related-projects h2 {
    font-size: 1.8rem;
    margin-bottom: 25px;
  }

  .related-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
    gap: 30px;
    margin-top: 20px;
  }

  .related-project {
    background-color: var(--bg-color);
    border-radius: 8px;
    overflow: hidden;
    box-shadow: var(--shadow);
    transition: var(--transition);
    position: relative;
  }

  .related-project:hover {
    transform: translateY(-5px);
    box-shadow: var(--shadow-lg);
  }

  .related-project img {
    width: 100%;
    height: 160px;
    object-fit: cover;
  }

  .related-project h3 {
    padding: 15px 15px 5px;
    font-size: 1.1rem;
    margin: 0;
    color: var(--dark-gray);
  }

  .related-project a {
    display: block;
    padding: 0 15px 15px;
    color: var(--primary-color);
    text-decoration: none;
    font-weight: 500;
  }

  .related-project a:hover {
    text-decoration: underline;
  }

  /* Responsive */
  @media (max-width: 992px) {
    .project-content {
      grid-template-columns: 1fr;
      gap: 30px;
    }

    .project-sidebar {
      display: grid;
      grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
    }
  }

  @media (max-width: 768px) {
    .project-header h1 {
      font-size: 2rem;
    }

    .thumbnail {
      width: 70px;
      height: 50px;
    }

    .related-grid {
      grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
    }
  }

  @media (max-width: 480px) {
    .project-header h1 {
      font-size: 1.8rem;
    }

    .project-meta {
      flex-direction: column;
      align-items: flex-start;
      gap: 10px;
    }

    .thumbnail-gallery {
      justify-content: center;
    }

    .related-grid {
      grid-template-columns: 1fr;
    }
  }

  /* Animation pour le contenu de la page */
  @keyframes fadeIn {
    from {
      opacity: 0;
      transform: translateY(20px);
    }

    to {
      opacity: 1;
      transform: translateY(0);
    }
  }

  .project-gallery,
  .project-description,
  .project-sidebar,
  .related-projects {
    animation: fadeIn 0.5s ease forwards;
  }

  .project-description {
    animation-delay: 0.1s;
  }

  .project-sidebar {
    animation-delay: 0.2s;
  }

  .related-projects {
    animation-delay: 0.3s;
  }
</style>
<section class="project-detail">
  <div class="container">
    <nav class="breadcrumb">
      <a href="index.php">Accueil</a> &gt;
      <a href="projects.php">Projets</a> &gt;
      <span><?php echo $project['title']; ?></span>
    </nav>

    <div class="project-header">
      <h1><?php echo $project['title']; ?></h1>
      <div class="project-meta">
        <span class="project-category"><?php echo $project['category_name']; ?></span>
        <span class="project-date">Réalisé en <?php echo date('Y', strtotime($project['date_created'])); ?></span>
      </div>
    </div>

    <?php if (count($images) > 0): ?>
      <div class="project-gallery">
        <div class="main-image">
          <img src="assets/images/projects/<?php echo $images[0]['filename']; ?>" alt="<?php echo $project['title']; ?>"
            id="mainProjectImage">
        </div>
        <?php if (count($images) > 1): ?>
          <div class="thumbnail-gallery">
            <?php foreach ($images as $index => $image): ?>
              <div class="thumbnail <?php echo $index === 0 ? 'active' : ''; ?>"
                onclick="changeMainImage('assets/images/projects/<?php echo $image['filename']; ?>')">
                <img src="assets/images/projects/<?php echo $image['filename']; ?>" alt="Thumbnail <?php echo $index + 1; ?>">
              </div>
            <?php endforeach; ?>
          </div>
        <?php endif; ?>
      </div>
    <?php endif; ?>

    <div class="project-content">
      <div class="project-description">
        <h2>Description du projet</h2>
        <?php echo $project['description']; ?>

        <?php if (!empty($project['challenges'])): ?>
          <h2>Défis et solutions</h2>
          <?php echo $project['challenges']; ?>
        <?php endif; ?>

        <?php if (!empty($project['results'])): ?>
          <h2>Résultats</h2>
          <?php echo $project['results']; ?>
        <?php endif; ?>
      </div>

      <div class="project-sidebar">
        <div class="project-info-box">
          <h3>Technologies utilisées</h3>
          <div class="technologies-list">
            <?php foreach ($project_technologies as $tech): ?>
              <span class="tech-tag"><?php echo $tech['name']; ?></span>
            <?php endforeach; ?>
          </div>
        </div>

        <?php if (!empty($project['client'])): ?>
          <div class="project-info-box">
            <h3>Client</h3>
            <p><?php echo $project['client']; ?></p>
          </div>
        <?php endif; ?>
      </div>
    </div>

    <div class="related-projects">
      <h2>Projets similaires</h2>
      <?php if (count($relatedProjects) > 0): ?>
        <div class="related-grid">
          <?php foreach ($relatedProjects as $related): ?>
            <div class="related-project">
              <img src="assets/images/projects/<?php echo $related['image']; ?>" alt="<?php echo $related['title']; ?>">
              <h3><?php echo $related['title']; ?></h3>
              <a href="project-detail.php?id=<?php echo $related['id']; ?>">Voir le projet</a>
            </div>
          <?php endforeach; ?>
        </div>
      <?php else: ?>
        <p>Aucun projet similaire trouvé.</p>
      <?php endif; ?>
    </div>
  </div>
</section>

<script>
  function changeMainImage(src) {
    document.getElementById('mainProjectImage').src = src;

    // Update active state on thumbnails
    const thumbnails = document.querySelectorAll('.thumbnail');
    thumbnails.forEach(thumb => {
      if (thumb.querySelector('img').src.includes(src.split('/').pop())) {
        thumb.classList.add('active');
      } else {
        thumb.classList.remove('active');
      }
    });
  }
</script>

<?php include 'includes/footer.php'; ?>