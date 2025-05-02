<?php
// projects.php - Page des projets
session_start();
$pageTitle = "Mes Projets";
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
  ['id' => 1, 'name' => 'PHP'],
  ['id' => 2, 'name' => 'JavaScript'],
  ['id' => 3, 'name' => 'HTML/CSS'],
  ['id' => 4, 'name' => 'React'],
  ['id' => 5, 'name' => 'Vue.js'],
  ['id' => 6, 'name' => 'Node.js'],
  ['id' => 7, 'name' => 'Python'],
  ['id' => 8, 'name' => 'Java'],
  ['id' => 9, 'name' => 'C#'],
  ['id' => 10, 'name' => 'MySql'],
  ['id' => 11, 'name' => 'MongoDB']
];

// Définition des projets avec leurs technologies associées
$projects = [
  [
    'id' => 2,
    'title' => 'Portfolio Personnel',
    'description' => 'Site web portfolio présentant mes compétences et réalisations dans le développement web. Inclut une galerie de projets, un formulaire de contact et un blog.',
    'image' => 'projet2/portfolio.jpg',
    'category_id' => 1,
    'category_name' => 'Web',
    'date_created' => '2025-03-15',
    'technologies' => [1, 2, 3]
  ],
  [
    'id' => 1,
    'title' => 'Application de gestion d\'inventaire',
    'description' => 'Une application web complète permettant de gérer efficacement l\'inventaire d\'équipements médicaux, avec des fonctionnalités d\'ajout, de recherche, de suivi et de génération de rapports pour l\'établissement public hospitalier SOBHA.',
    'image' => 'projet1/inventaire.jpg',
    'category_id' => 1,
    'category_name' => 'Web',
    'date_created' => '2025-02-10',
    'technologies' => [1, 2, 10]
  ],
  [
    'id' => 3,
    'title' => 'Application desktop de Gestion de Stock',
    'description' => 'Logiciel permettant de gérer le stock, d\'effectuer le suivi des produits et de générer des rapports avec une interface utilisateur intuitive.',
    'image' => 'projet3/stock.jpg',
    'category_id' => 3,
    'category_name' => 'Bureau',
    'date_created' => '2024-12-05',
    'technologies' => [7, 10]
  ],
  [
    'id' => 4,
    'title' => 'Système de Gestion de vaccination',
    'description' => 'Solution intégrée de gestion hospitalière permettant le suivi des vaccinations du personnel et la gestion des stocks de vaccins avec une interface utilisateur intuitive.',
    'image' => 'projet4/vaccin0.jpg',
    'category_id' => 1,
    'category_name' => 'Web',
    'date_created' => '2024-11-20',
    'technologies' => [1, 2, 3, 10]
  ],
  [
    'id' => 5,
    'title' => 'Application de gestion des stocks alimentaires et des approvisionnements',
    'description' => 'Application complète de gestion de cuisine permettant de suivre les stocks, entrées/sorties et commandes de produits alimentaires.',
    'image' => 'projet5/cuisine0.jpg',
    'category_id' => 1,
    'category_name' => 'Web',
    'date_created' => '2025-03-30',
    'technologies' => [1, 2, 3, 10]
  ],
  [
    'id' => 6,
    'title' => 'Système de Gestion d\'un magasin',
    'description' => 'Système de Gestion d\'un magasin moderne et intuitif permettant de suivre en temps réel les mouvements des produits et d\'alerter sur les ruptures potentielles.',
    'image' => 'projet6/magasin.jpg',
    'category_id' => 1,
    'category_name' => 'Web',
    'date_created' => '2025-02-30',
    'technologies' => [1, 2, 3, 10]
  ],
  [
    'id' => 7,
    'title' => 'Système de Gestion des Protocoles Opératoires',
    'description' => 'Application permettant d\'ajouter et de gérer les protocoles opératoires des patients.',
    'image' => 'projet7/protocole.jpg',
    'category_id' => 1,
    'category_name' => 'Web',
    'date_created' => '2025-01-15',
    'technologies' => [1, 2, 3, 10]
  ],
  [
    'id' => 8,
    'title' => 'Système de Gestion du Matériel Médical',
    'description' => 'Application complète de gestion du matériel médical hospitalier permettant le suivi en temps réel des équipements médicaux.',
    'image' => 'projet8/dmm.jpg',
    'category_id' => 1,
    'category_name' => 'Web',
    'date_created' => '2025-04-15',
    'technologies' => [1, 2, 3, 10]
  ],
  [
    'id' => 9,
    'title' => 'Système de Gestion de Laboratoire Médical',
    'description' => 'Application complète pour la gestion et le suivi des analyses médicales en laboratoire.',
    'image' => 'projet9/labo.jpg',
    'category_id' => 3,
    'category_name' => 'Bureau',
    'date_created' => '2024-04-15',
    'technologies' => [6, 11]
  ],
  [
    'id' => 10,
    'title' => 'Système de Gestion de Banque de Sang',
    'description' => 'Application complète de gestion de banque de sang permettant le suivi des donneurs, des dons, et des demandes de sang.',
    'image' => 'projet10/sang.jpg',
    'category_id' => 1,
    'category_name' => 'Web',
    'date_created' => '2024-07-15',
    'technologies' => [1, 2, 3, 10]
  ],
  [
    'id' => 11,
    'title' => 'Application de Gestion du Service de Prévention',
    'description' => 'Application complète de gestion du Service de Prévention permettant de suivre les demandes de désinfection et les signalements de risques infectieux.',
    'image' => 'projet11/semep.jpg',
    'category_id' => 1,
    'category_name' => 'Web',
    'date_created' => '2024-09-15',
    'technologies' => [1, 2, 3, 10]
  ],
  [
    'id' => 12,
    'title' => 'Site web de l\'EPH SOBHA',
    'description' => 'Un site web moderne et fonctionnel pour EPH SOBHA.',
    'image' => 'projet12/ephsobha.jpg',
    'category_id' => 1,
    'category_name' => 'Web',
    'date_created' => '2025-04-25',
    'technologies' => [1, 2, 3]
  ]
];

// Filtrage par catégorie
$category_filter = isset($_GET['category']) ? intval($_GET['category']) : null;

// Filtrer les projets si une catégorie est sélectionnée
$filtered_projects = $projects;
if (!is_null($category_filter)) {
  $filtered_projects = array_filter($projects, function ($project) use ($category_filter) {
    return $project['category_id'] == $category_filter;
  });
}

// Fonction pour récupérer les technologies d'un projet
function getProjectTechnologies($project_technologies, $all_technologies)
{
  $result = [];
  foreach ($project_technologies as $tech_id) {
    foreach ($all_technologies as $tech) {
      if ($tech['id'] == $tech_id) {
        $result[] = $tech;
        break;
      }
    }
  }
  return $result;
}
?>
<link href="assets/assets/aos/aos.css" rel="stylesheet">
<link rel="stylesheet" href="assets/css/style.css">
<link rel="stylesheet" href="assets/css/theme-styles.css">
<script src="assets/assets/aos/aos.js"></script>
<style>
  /* Hero section */
  .projects-hero {
    background: linear-gradient(135deg, var(--cta-color), var(--cta-dark));
    color: var(--white);
    padding: 60px 0;
    text-align: center;
    margin-bottom: 30px;
  }

  .projects-hero h1 {
    font-size: 2.5rem;
    margin-bottom: 15px;
    font-weight: 700;
  }

  .projects-hero p {
    font-size: 1.2rem;
    max-width: 800px;
    margin: 0 auto;
    opacity: 0.9;
  }

  .projects-grid {
    background: linear-gradient(135deg, var(--bg-alt), var(--border-color));
  }

  /* Section des filtres */
  .project-filters {
    background-color: var(--bg-color);
    padding: 20px 0;
    margin-bottom: 30px;
    box-shadow: var(--shadow);
  }

  .filter-options {
    display: flex;
    justify-content: center;
    flex-wrap: wrap;
    gap: 15px;
  }

  .filter-options a {
    padding: 8px 16px;
    border-radius: 50px;
    color: var(--text-color);
    text-decoration: none;
    font-weight: 500;
    transition: var(--transition);
    border: 1px solid #ddd;
  }

  .filter-options a:hover {
    background-color: rgba(52, 152, 219, 0.1);
    border-color: var(--primary-color);
    color: var(--primary-color);
  }

  .filter-options a.active {
    background-color: var(--primary-color);
    color: var(--white);
    border-color: var(--primary-color);
  }

  /* Grille des projets */
  .projects-container {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 30px;
    margin: 0 auto 50px;
    max-width: 1400px;
  }

  .projects-grid {
    background: linear-gradient(135deg, var(--bg-alt), var(--border-color));
    padding: 40px 20px;
    display: flex;
    justify-content: center;
  }

  .projects-grid .container {
    width: 100%;
    max-width: 1400px;
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
    transform: translateY(-6px);
    box-shadow: var(--shadow-lg);
  }

  .project-image {
    height: 200px;
    overflow: hidden;
  }

  .project-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: var(--transition);
  }

  .project-card:hover .project-image img {
    transform: scale(1.05);
  }

  .project-info {
    padding: 20px;
    display: flex;
    flex-direction: column;
    flex-grow: 1;
  }

  .project-info h3 {
    margin: 0 0 10px;
    font-size: 1.3rem;
    color: var(--dark-gray);
  }

  .project-category {
    display: inline-block;
    background-color: var(--light-gray);
    color: var(--secondary-color);
    padding: 4px 12px;
    border-radius: 20px;
    font-size: 0.8rem;
    margin-bottom: 15px;
    font-weight: 500;
  }

  .project-info p {
    color: var(--text-color);
    margin-bottom: 15px;
    line-height: 1.5;
    flex-grow: 1;
  }

  .project-tech {
    display: flex;
    flex-wrap: wrap;
    gap: 8px;
    margin-bottom: 20px;
  }

  .tech-tag {
    background-color: rgba(52, 152, 219, 0.1);
    color: var(--primary-color);
    padding: 4px 8px;
    border-radius: 4px;
    font-size: 0.8rem;
    font-weight: 500;
  }

  .btn {
    display: inline-block;
    padding: 10px 20px;
    background-color: var(--primary-color);
    color: var(--white);
    border-radius: 5px;
    text-decoration: none;
    font-weight: 500;
    text-align: center;
    transition: var(--transition);
    border: none;
    cursor: pointer;
    align-self: flex-start;
  }

  .btn:hover {
    background-color: #2980b9;
    transform: translateY(-2px);
  }

  .no-results {
    text-align: center;
    grid-column: 1 / -1;
    padding: 50px;
    color: var(--text-color);
    font-size: 1.1rem;
    background-color: var(--light-gray);
    border-radius: 8px;
  }

  /* Responsive design */
  @media (max-width: 768px) {
    .projects-hero {
      padding: 40px 0;
    }

    .projects-hero h1 {
      font-size: 2rem;
    }

    .projects-container {
      grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
      gap: 20px;
    }

    .filter-options {
      overflow-x: auto;
      padding-bottom: 10px;
      justify-content: flex-start;
    }
  }

  @media (max-width: 480px) {
    .projects-container {
      grid-template-columns: 1fr;
    }

    .project-image {
      height: 180px;
    }

    .projects-hero h1 {
      font-size: 1.8rem;
    }

    .projects-hero p {
      font-size: 1rem;
    }
  }

  .image-modal {
    display: none;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.85);
    z-index: 1000;
    justify-content: center;
    align-items: center;
    opacity: 0;
    transition: opacity 0.3s ease;
  }

  .image-modal.active {
    display: flex;
    opacity: 1;
  }

  .modal-content {
    max-width: 90%;
    max-height: 90%;
    position: relative;
  }

  .modal-image {
    max-width: 100%;
    max-height: 90vh;
    border-radius: 5px;
    object-fit: contain;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
  }

  .close-modal {
    position: absolute;
    top: -30px;
    right: -30px;
    width: 40px;
    height: 40px;
    border-radius: 50%;
    background-color: var(--white);
    color: var(--dark-gray);
    display: flex;
    justify-content: center;
    align-items: center;
    cursor: pointer;
    font-size: 1.5rem;
    transition: var(--transition);
    border: none;
  }

  .close-modal:hover {
    background-color: var(--primary-color);
    color: var(--white);
  }

  .project-image {
    cursor: pointer;
  }
</style>
<section class="projects-hero">
  <div class="container">
    <h1 data-aos="fade-down">Mes Projets</h1>
    <p data-aos="fade-up" data-aos-delay="200">Découvrez les applications de bureau et web que j'ai développées</p>
  </div>
</section>

<section class="project-filters" data-aos="fade-up" data-aos-delay="300">
  <div class="container">
    <div class="filter-options">
      <a href="projects.php" class="<?php echo is_null($category_filter) ? 'active' : ''; ?>">Tous</a>
      <?php foreach ($categories as $category): ?>
        <a href="projects.php?category=<?php echo $category['id']; ?>"
          class="<?php echo $category_filter == $category['id'] ? 'active' : ''; ?>">
          <?php echo $category['name']; ?>
        </a>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<section class="projects-grid" data-aos="fade-up" data-aos-delay="400">
  <div class="container">
    <div class="projects-container">
      <?php if (count($filtered_projects) > 0): ?>
        <?php $delay = 100; foreach ($filtered_projects as $project): ?>
          <div class="project-card" data-aos="zoom-in" data-aos="fade-up" data-aos-delay="<?php echo $delay; ?>">
            <div class="project-image" data-image="assets/images/projects/<?php echo $project['image']; ?>">
              <img src="assets/images/projects/<?php echo $project['image']; ?>" alt="<?php echo $project['title']; ?>">
            </div>
            <div class="project-info">
              <h3><?php echo $project['title']; ?></h3>
              <span class="project-category"><?php echo $project['category_name']; ?></span>
              <p><?php echo substr($project['description'], 0, 120); ?>...</p>
              <div class="project-tech">
                <?php
                $project_technologies = getProjectTechnologies($project['technologies'], $technologies);
                foreach ($project_technologies as $tech) {
                  echo '<span class="tech-tag">' . $tech['name'] . '</span>';
                }
                ?>
              </div>
              <a href="project-detail.php?id=<?php echo $project['id']; ?>" class="btn">Voir le détail</a>
            </div>
          </div>
        <?php endforeach; ?>
      <?php else: ?>
        <p class="no-results" data-aos="fade-up">Aucun projet ne correspond à votre recherche.</p>
      <?php endif; ?>
    </div>
  </div>
</section>

<!-- Ajout du modal pour afficher l'image en grand -->
<div class="image-modal" id="imageModal">
  <div class="modal-content" data-aos="zoom-in" data-aos-duration="300">
    <button class="close-modal" id="closeModal">&times;</button>
    <img class="modal-image" id="modalImage" src="" alt="Image du projet">
  </div>
</div>

<!-- Script pour gérer l'ouverture/fermeture du modal -->
<script>
  document.addEventListener('DOMContentLoaded', function () {
    // Initialisation de AOS
    AOS.init({
      easing: 'ease-out-back',
      once: false,
      mirror: false,
      offset: 120
    });

    // Sélection des éléments
    const modal = document.getElementById('imageModal');
    const modalImg = document.getElementById('modalImage');
    const closeModal = document.getElementById('closeModal');
    const projectImages = document.querySelectorAll('.project-image');

    // Ouvrir le modal au clic sur une image
    projectImages.forEach(function (imageContainer) {
      imageContainer.addEventListener('click', function () {
        const imgPath = this.getAttribute('data-image');
        modalImg.src = imgPath;
        modal.classList.add('active');
        document.body.style.overflow = 'hidden'; // Empêcher le défilement
      });
    });

    // Fermer le modal
    function closeImageModal() {
      modal.classList.remove('active');
      document.body.style.overflow = ''; // Réactiver le défilement
    }

    // Événements pour fermer le modal
    closeModal.addEventListener('click', closeImageModal);

    // Fermer en cliquant en dehors de l'image
    modal.addEventListener('click', function (e) {
      if (e.target === modal) {
        closeImageModal();
      }
    });

    // Fermer avec la touche Escape
    document.addEventListener('keydown', function (e) {
      if (e.key === 'Escape' && modal.classList.contains('active')) {
        closeImageModal();
      }
    });
  });
</script>

<?php include 'includes/footer.php'; ?>