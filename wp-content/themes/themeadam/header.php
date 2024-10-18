<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php bloginfo('name'); ?></title>
    <?php wp_head(); ?>
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