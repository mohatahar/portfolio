<?php
// contact.php - En-tête modifié avec output buffering
// Commencer la mise en tampon de sortie
ob_start();

session_start();
$pageTitle = "Me contacter";
include 'includes/header.php';

// Initialisation des variables
$name = $email = $phone = $subject = $message = '';
$errors = [];
$success = false;
$subjects = [
    'question' => 'Question générale',
    'project' => 'Proposition de projet',
    'collaboration' => 'Opportunité de collaboration',
    'feedback' => 'Commentaires et suggestions',
    'other' => 'Autre sujet'
];

// Traitement du formulaire
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Vérification du honeypot anti-spam (champ caché)
    if (!empty($_POST['website'])) {
        // C'est probablement un bot, on ignore silencieusement
        header('Location: contact.php');
        exit;
    }

    // Récupération et nettoyage des données
    $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_SPECIAL_CHARS);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $phone = filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_SPECIAL_CHARS);
    $subject = filter_input(INPUT_POST, 'subject', FILTER_SANITIZE_SPECIAL_CHARS);
    $message = filter_input(INPUT_POST, 'message', FILTER_SANITIZE_SPECIAL_CHARS);

    // Validation
    if (empty($name)) {
        $errors['name'] = 'Veuillez entrer votre nom';
    } elseif (strlen($name) < 2) {
        $errors['name'] = 'Votre nom est trop court';
    }

    if (empty($email)) {
        $errors['email'] = 'Veuillez entrer votre email';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = 'Email invalide';
    }

    if (!empty($phone) && !preg_match('/^[0-9+\(\)\s.-]{6,20}$/', $phone)) {
        $errors['phone'] = 'Numéro de téléphone invalide';
    }

    if (empty($subject)) {
        $errors['subject'] = 'Veuillez sélectionner un sujet';
    } elseif (!array_key_exists($subject, $subjects)) {
        $errors['subject'] = 'Sujet invalide';
    }

    if (empty($message)) {
        $errors['message'] = 'Veuillez entrer un message';
    } elseif (strlen($message) < 10) {
        $errors['message'] = 'Votre message est trop court (minimum 10 caractères)';
    }

    // Si pas d'erreurs, envoi du message
    if (empty($errors)) {
        // Si vous utilisez la solution de journalisation des messages
        $log_message = "Date: " . date('Y-m-d H:i:s') . "\n";
        $log_message .= "Nom: $name\n";
        $log_message .= "Email: $email\n";
        if (!empty($phone)) {
            $log_message .= "Téléphone: $phone\n";
        }
        $log_message .= "Sujet: " . (isset($subjects[$subject]) ? $subjects[$subject] : $subject) . "\n";
        $log_message .= "Message: $message\n";
        $log_message .= "IP: " . $_SERVER['REMOTE_ADDR'] . "\n";
        $log_message .= "Navigateur: " . $_SERVER['HTTP_USER_AGENT'] . "\n";
        $log_message .= "--------------------------------------------------\n\n";

        // Créer le dossier logs s'il n'existe pas
        if (!file_exists('logs')) {
            mkdir('logs', 0755, true);
        }

        // Tentative d'écriture dans le fichier log
        $log_file = 'logs/contact_messages.log';
        $log_success = file_put_contents($log_file, $log_message, FILE_APPEND);

        // Si vous essayez d'utiliser la fonction mail() (qui peut échouer dans l'environnement local)
        $to = "taharmoha02@gmail.com";
        $subject_text = isset($subjects[$subject]) ? $subjects[$subject] : $subject;
        $subject_email = "Nouveau message de contact: $subject_text";

        $email_content = "Nom: $name\n";
        $email_content .= "Email: $email\n";
        if (!empty($phone)) {
            $email_content .= "Téléphone: $phone\n";
        }
        $email_content .= "\nMessage:\n$message";

        $headers = "From: $email\r\n";
        $headers .= "Reply-To: $email\r\n";
        $headers .= "X-Mailer: PHP/" . phpversion();

        // Essayez d'envoyer l'email, mais ne vous fiez pas à sa réussite en environnement local
        @mail($to, $subject_email, $email_content, $headers);

        // Considérer le message comme envoyé si au moins le log a fonctionné
        if ($log_success) {
            // Réinitialisation des champs et affichage du message de succès
            $name = $email = $phone = $subject = $message = '';
            $success = true;

            // On mémorise le succès dans la session pour pouvoir le montrer après une redirection
            $_SESSION['contact_success'] = true;

            // Redirection pour éviter les soumissions multiples
            header("Location: contact.php?status=success");
            // Vider et terminer la mise en tampon avant de sortir
            ob_end_flush();
            exit;
        } else {
            $errors['mail'] = 'Erreur lors de l\'enregistrement de votre message. Veuillez réessayer.';
        }
    }
}

// Vérifier s'il y a un message de succès dans la session
if (isset($_GET['status']) && $_GET['status'] === 'success' && isset($_SESSION['contact_success'])) {
    $success = true;
    unset($_SESSION['contact_success']); // On supprime pour ne pas réafficher à chaque visite
}
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo isset($pageTitle) ? $pageTitle . ' - ' : ''; ?>Portfolio de Développeur</title>
    <link href="assets/assets/fontawesome-free-6.7.1-web/css/all.min.css" rel="stylesheet">
    <link href="assets/assets/aos/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/theme-styles.css">
    <script src="assets/assets/aos/aos.js"></script>
    <link rel="stylesheet" href="assets/css/haut.css">
    <script src="assets/js/haut.js"></script>

</head>

<body>
    <section class="contact-hero">
        <div class="container">
            <h1 data-aos="fade-down">Me contacter</h1>
            <p data-aos="fade-up" data-aos-delay="200">Vous avez un projet en tête ou une question ? Je suis à votre
                écoute.</p>
        </div>
    </section>

    <section class="contact-content section-padding">
        <div class="container">
            <div class="contact-grid">
                <div class="contact-info" data-aos="fade-right" data-aos-delay="300">
                    <div class="info-box">
                        <h3>Coordonnées</h3>
                        <ul>
                            <li>
                                <i class="fas fa-envelope"></i>
                                <span>taharmoha02@gmail.com</span>
                            </li>
                            <li>
                                <i class="fas fa-phone"></i>
                                <span>+213 5 58 67 10 50</span>
                            </li>
                            <li>
                                <i class="fas fa-map-marker-alt"></i>
                                <span>Chlef, Algérie</span>
                            </li>
                        </ul>
                    </div>

                    <div class="info-box">
                        <h3>Réseaux sociaux</h3>
                        <div class="social-links">
                            <a href="https://github.com/mohatahar" target="_blank" title="GitHub">
                                <i class="fab fa-github"></i>
                            </a>
                            <a href="https://linkedin.com/in/mohamed-tahar-djebbar-5637b6189" target="_blank"
                                title="LinkedIn">
                                <i class="fab fa-linkedin"></i>
                            </a>
                            <a href="https://x.com/taharmoha02?t=OpNK9qV0y1WP6M06w52o9O&s=09" target="_blank"
                                title="Twitter">
                                <i class="fab fa-twitter"></i>
                            </a>
                        </div>
                    </div>

                    <div class="info-box">
                        <h3>Disponibilité</h3>
                        <p>Je suis actuellement disponible pour de nouveaux projets de développement.</p>
                    </div>

                    <!-- Carte interactive -->
                    <div class="info-box map-container">
                        <h3>Localisation</h3>
                        <div class="map">
                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d103261.43490479144!2d1.0059428241004775!3d36.02225081585017!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1283fa22ad06a379%3A0xf43ac1faab332dc6!2sBoukadir%2C%20Alg%C3%A9rie!5e0!3m2!1sfr!2sfr!4v1745326149728!5m2!1sfr!2sfr"
                                width="100%" height="250" style="border:0;" allowfullscreen="" loading="lazy"
                                referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                    </div>
                </div>

                <div class="contact-form" data-aos="fade-left" data-aos-delay="400">
                    <?php if ($success): ?>
                        <div class="success-message">
                            <div class="success-icon">
                                <i class="fas fa-check-circle"></i>
                            </div>
                            <h3>Message envoyé avec succès!</h3>
                            <p>Merci pour votre message. Je vous répondrai dans les plus brefs délais, généralement sous 48
                                heures.</p>
                            <a href="contact.php" class="btn">Envoyer un autre message</a>
                        </div>
                    <?php else: ?>
                        <?php if (isset($errors['mail'])): ?>
                            <div class="error-message global-error"><?php echo $errors['mail']; ?></div>
                        <?php endif; ?>

                        <div class="form-header">
                            <h2>Envoyez-moi un message</h2>
                            <p>Tous les champs marqués d'un * sont obligatoires</p>
                        </div>

                        <form method="post" action="contact.php" id="contactForm" novalidate>
                            <!-- Honeypot anti-spam (champ caché) -->
                            <input type="text" id="website" name="website" style="display:none">

                            <div class="form-row">
                                <div class="form-group <?php echo isset($errors['name']) ? 'has-error' : ''; ?>">
                                    <label for="name">Nom *</label>
                                    <input type="text" id="name" name="name" value="<?php echo $name; ?>"
                                        placeholder="Votre nom" required>
                                    <?php if (isset($errors['name'])): ?>
                                        <span class="error-text"><i class="fas fa-exclamation-circle"></i>
                                            <?php echo $errors['name']; ?></span>
                                    <?php endif; ?>
                                </div>

                                <div class="form-group <?php echo isset($errors['email']) ? 'has-error' : ''; ?>">
                                    <label for="email">Email *</label>
                                    <input type="email" id="email" name="email" value="<?php echo $email; ?>"
                                        placeholder="Votre email" required>
                                    <?php if (isset($errors['email'])): ?>
                                        <span class="error-text"><i class="fas fa-exclamation-circle"></i>
                                            <?php echo $errors['email']; ?></span>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group <?php echo isset($errors['phone']) ? 'has-error' : ''; ?>">
                                    <label for="phone">Téléphone <small>(optionnel)</small></label>
                                    <input type="tel" id="phone" name="phone" value="<?php echo $phone; ?>"
                                        placeholder="Votre numéro de téléphone">
                                    <?php if (isset($errors['phone'])): ?>
                                        <span class="error-text"><i class="fas fa-exclamation-circle"></i>
                                            <?php echo $errors['phone']; ?></span>
                                    <?php endif; ?>
                                </div>

                                <div class="form-group <?php echo isset($errors['subject']) ? 'has-error' : ''; ?>">
                                    <label for="subject">Sujet *</label>
                                    <select id="subject" name="subject" required>
                                        <option value="" disabled <?php if (empty($subject))
                                            echo 'selected'; ?>>Choisir un
                                            sujet</option>
                                        <?php foreach ($subjects as $value => $label): ?>
                                            <option value="<?php echo $value; ?>" <?php if ($subject === $value)
                                                   echo 'selected'; ?>>
                                                <?php echo $label; ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                    <?php if (isset($errors['subject'])): ?>
                                        <span class="error-text"><i class="fas fa-exclamation-circle"></i>
                                            <?php echo $errors['subject']; ?></span>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="form-group <?php echo isset($errors['message']) ? 'has-error' : ''; ?>">
                                <label for="message">Message *</label>
                                <textarea id="message" name="message" rows="6"
                                    placeholder="Détaillez votre projet, question ou commentaire ici..."
                                    required><?php echo $message; ?></textarea>
                                <div class="message-counter">
                                    <span id="charCount">0</span> caractères
                                </div>
                                <?php if (isset($errors['message'])): ?>
                                    <span class="error-text"><i class="fas fa-exclamation-circle"></i>
                                        <?php echo $errors['message']; ?></span>
                                <?php endif; ?>
                            </div>

                            <!-- Intégration reCAPTCHA -->
                            <!-- <div class="form-group <?php echo isset($errors['captcha']) ? 'has-error' : ''; ?>">
                            <div class="g-recaptcha" data-sitekey="VOTRE_CLE_SITE_RECAPTCHA"></div>
                            <?php if (isset($errors['captcha'])): ?>
                                <span class="error-text"><i class="fas fa-exclamation-circle"></i> <?php echo $errors['captcha']; ?></span>
                            <?php endif; ?>
                        </div> -->

                            <div class="form-group form-privacy">
                                <label class="checkbox-container">
                                    <input type="checkbox" id="privacy" name="privacy" required>
                                    <span class="checkmark"></span>
                                    <span class="checkbox-text">J'accepte que mes données soient traitées pour me
                                        recontacter *</span>
                                </label>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-submit" id="submitBtn">
                                    <i class="fas fa-paper-plane"></i> Envoyer le message
                                </button>
                            </div>
                        </form>
                    <?php endif; ?>
                </div>
            </div>

            <!-- FAQ Section -->
            <div class="faq-section" data-aos="fade-up" data-aos-delay="500">
                <h2 class="section-title">Questions fréquentes</h2>

                <div class="faq-container">
                    <div class="faq-item" data-aos="fade-up" data-aos-delay="200">
                        <div class="faq-question">
                            <h3>Quels types de projets acceptez-vous ?</h3>
                            <span class="faq-toggle"><i class="fas fa-plus"></i></span>
                        </div>
                        <div class="faq-answer">
                            <p>Je prends en charge des projets variés allant du développement d'applications web et de
                                sites vitrines au développement d'applications de bureau complexes. Je me spécialise
                                dans les solutions sur mesure pour les petites et moyennes entreprises.</p>
                        </div>
                    </div>

                    <div class="faq-item" data-aos="fade-up" data-aos-delay="300">
                        <div class="faq-question">
                            <h3>Quels sont vos tarifs ?</h3>
                            <span class="faq-toggle"><i class="fas fa-plus"></i></span>
                        </div>
                        <div class="faq-answer">
                            <p>Mes tarifs varient selon la complexité et l'ampleur de votre projet. Je propose des
                                tarifs horaires, forfaitaires ou des contrats de maintenance. Contactez-moi avec les
                                détails de votre projet pour recevoir un devis personnalisé.</p>
                        </div>
                    </div>

                    <div class="faq-item" data-aos="fade-up" data-aos-delay="400">
                        <div class="faq-question">
                            <h3>Quel est votre délai de réalisation habituel ?</h3>
                            <span class="faq-toggle"><i class="fas fa-plus"></i></span>
                        </div>
                        <div class="faq-answer">
                            <p>Les délais dépendent de la complexité du projet, de sa portée et de ma charge de travail
                                actuelle. Pour un site vitrine simple, comptez environ 2-3 semaines. Pour des
                                applications plus complexes, le délai peut aller de 1 à 3 mois. Je vous fournirai
                                toujours un calendrier détaillé au début du projet.</p>
                        </div>
                    </div>

                    <div class="faq-item" data-aos="fade-up" data-aos-delay="500">
                        <div class="faq-question">
                            <h3>Comment se déroule notre collaboration ?</h3>
                            <span class="faq-toggle"><i class="fas fa-plus"></i></span>
                        </div>
                        <div class="faq-answer">
                            <p>Ma méthode de travail suit généralement ces étapes : consultation initiale, analyse des
                                besoins, proposition et devis, développement par sprints avec validations régulières,
                                tests, déploiement et support. Je privilégie une communication transparente tout au long
                                du projet.</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Testimonials -->
            <div class="testimonials-section" data-aos="fade-up" data-aos-delay="600">
                <h2 class="section-title">Ce que disent mes clients</h2>

                <div class="testimonial-slider">
                    <div class="testimonial-item" data-aos="zoom-in" data-aos-delay="300">
                        <div class="testimonial-content">
                            <div class="quote-icon">
                                <i class="fas fa-quote-left"></i>
                            </div>
                            <div class="quote">
                                Un développeur très professionnel et à l'écoute. Le projet a été livré dans les délais
                                avec une qualité exceptionnelle. Je recommande vivement ses services.
                            </div>
                            <div class="client-info">
                                <div class="client-image">
                                    <img src="assets/images/1.jpeg" alt="Said Khaldi">
                                </div>
                                <div class="client-details">
                                    <h4>Said Khaldi</h4>
                                    <p>Administrateur, EPH SOBHA</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="testimonial-item" data-aos="zoom-in" data-aos-delay="500">
                        <div class="testimonial-content">
                            <div class="quote-icon">
                                <i class="fas fa-quote-left"></i>
                            </div>
                            <div class="quote">
                                Collaboration parfaite du début à la fin. Excellente communication et grande réactivité.
                                Notre application fonctionne exactement comme nous le souhaitions.
                            </div>
                            <div class="client-info">
                                <div class="client-image">
                                    <img src="assets/images/1.jpeg" alt="Ali Mostefai">
                                </div>
                                <div class="client-details">
                                    <h4>Ali Mostefai</h4>
                                    <p>Gérant, StartupInnovante</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Bouton de retour en haut -->
    <div id="back-to-top" class="back-to-top">
        <i class="fas fa-arrow-up"></i>
    </div>

    <!-- Script pour la validation front-end et les interactions -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Initialisation de AOS
            AOS.init({
                easing: 'ease-out-back',
                once: false,
                mirror: false,
                offset: 120
            });

            // Compteur de caractères pour le message
            const messageElement = document.getElementById('message');
            const charCount = document.getElementById('charCount');

            if (messageElement && charCount) {
                // Mise à jour initiale du compteur
                charCount.textContent = messageElement.value.length;

                // Mise à jour du compteur lors de la saisie
                messageElement.addEventListener('input', function () {
                    charCount.textContent = this.value.length;
                });
            }

            // Gestion des FAQ
            const faqItems = document.querySelectorAll('.faq-item');

            faqItems.forEach(item => {
                const question = item.querySelector('.faq-question');
                const answer = item.querySelector('.faq-answer');
                const icon = item.querySelector('.faq-toggle i');

                question.addEventListener('click', () => {
                    // Fermer toutes les autres FAQ
                    faqItems.forEach(otherItem => {
                        if (otherItem !== item && otherItem.classList.contains('active')) {
                            otherItem.classList.remove('active');
                            otherItem.querySelector('.faq-answer').style.maxHeight = null;
                            otherItem.querySelector('.faq-toggle i').classList.replace('fa-minus', 'fa-plus');
                        }
                    });

                    // Basculer l'état actuel
                    item.classList.toggle('active');

                    if (item.classList.contains('active')) {
                        answer.style.maxHeight = answer.scrollHeight + 'px';
                        icon.classList.replace('fa-plus', 'fa-minus');
                    } else {
                        answer.style.maxHeight = null;
                        icon.classList.replace('fa-minus', 'fa-plus');
                    }
                });
            });

            // Validation du formulaire côté client
            const form = document.getElementById('contactForm');
            const submitBtn = document.getElementById('submitBtn');

            if (form && submitBtn) {
                form.addEventListener('submit', function (event) {
                    let isValid = true;
                    const requiredFields = form.querySelectorAll('[required]');

                    requiredFields.forEach(field => {
                        if (!field.value.trim()) {
                            isValid = false;
                            field.parentElement.classList.add('has-error');
                        } else {
                            field.parentElement.classList.remove('has-error');
                        }

                        // Validation spécifique pour l'email
                        if (field.type === 'email' && field.value.trim()) {
                            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                            if (!emailRegex.test(field.value.trim())) {
                                isValid = false;
                                field.parentElement.classList.add('has-error');
                            }
                        }
                    });

                    if (!isValid) {
                        event.preventDefault();
                        // Faire défiler jusqu'au premier champ en erreur
                        const firstError = form.querySelector('.has-error');
                        if (firstError) {
                            firstError.scrollIntoView({ behavior: 'smooth', block: 'center' });
                        }
                        // Feedback visuel
                        submitBtn.classList.add('shake');
                        setTimeout(() => {
                            submitBtn.classList.remove('shake');
                        }, 500);
                    } else {
                        // Animation de chargement lors de l'envoi
                        submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Envoi en cours...';
                        submitBtn.disabled = true;
                    }
                });
            }
        });
    </script>
</body>

</html>
<?php include 'includes/footer.php'; ?>