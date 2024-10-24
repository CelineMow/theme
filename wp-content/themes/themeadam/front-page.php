<?php get_header(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>ADAM BENIFLAH</title>
    <script src="https://www.youtube.com/iframe_api"></script> <!-- Chargement de l'API YouTube -->
</head>

<body <?php body_class(); ?>>
    <div id="page" class="site">
        <header id="masthead" class="site-header">
            <div class="image-section">
                <div class="title" id="accueil">
                    <div class="name">
                        <h4>REALISATEUR</h4>
                        <h4>METTEUR EN SCENE</h4>
                        <h4>PHOTOGRAPHE</h4>
                    </div>
                    <h1>ADAM BENIFLAH</h1>
                </div>
                <img class="background_img" src="<?php echo get_template_directory_uri(); ?>/assets/461083913_1570972900520624_68239866152562579_n.jpg" alt="background">
            </div>
        </header>
        <div class="content-section" id="a-propos">
            <div class="video-container">
                <video class="video" autoplay muted loop>
                    <source src="<?php echo get_template_directory_uri(); ?>/assets/videoAdam.mp4" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
            </div>
            <div class="details">
                <span class="glow-filter" data-text="Réalisateur - Metteur en scène - Photographe">Réalisateur - Metteur en scène - Photographe </span>
                <p>Après mes études de réalisation, j'ai appris la direction d'acteurs aux États-Unis. J'ai aussi intégré une équipe
                    de post production documentaire.
                    <br><br>
                    Aujourd'hui je propose mes services de réalisation pour des productions audiovisuelles à Paris, New York, Rio
                    et à travers le monde. Je comptabilise aujourd'hui plusieurs récompenses et nominations en festival.
                    <br><br>
                    Je vous accompagne dans l'écriture, la production, la réalisation et le montage de vos contenus vidéos
                    destinés au web, réseaux sociaux et grand écran, sur la base de votre stratégie de communication.
                    <br><br>
                    Chaque projet étant unique, je m'adapte et m'entoure des meilleurs techniciens pour vous délivrer une vidéo
                    attirante et inspirante.
                </p>
            </div>
        </div>
        <!-- Filtre SVG pour l'effet "glow" -->
        <svg class="filters">
            <defs>
                <filter id="glow-4" x="-50%" y="-50%" width="200%" height="200%">
                    <feGaussianBlur in="SourceGraphic" stdDeviation="6" result="blur"></feGaussianBlur>
                    <feMerge>
                        <feMergeNode in="blur"></feMergeNode>
                        <feMergeNode in="blur"></feMergeNode>
                        <feMergeNode in="blur"></feMergeNode>
                        <feMergeNode in="SourceGraphic"></feMergeNode>
                    </feMerge>
                </filter>
            </defs>
        </svg>
        <div class="contact-video-container">
            <video class="contact-video" autoplay muted loop>
                <source src="<?php echo get_template_directory_uri(); ?>/assets/contact.mp4" type="video/mp4">
                Your browser does not support the video tag.
            </video>
            <form class="contact-form" action="#" method="post">
                <h3 id="contact">ME CONTACTER</h3>
                <label for="name">NOM</label>
                <input type="text" id="name" name="name" required>

                <label for="email">EMAIL</label>
                <input type="email" id="email" name="email" required>

                <label for="message">MESSAGE</label>
                <textarea id="message" name="message" required></textarea>
                <div class="button-container">
                    <button type="submit">Envoyer</button>
                </div>
            </form>
        </div>

        <?php get_footer(); ?>