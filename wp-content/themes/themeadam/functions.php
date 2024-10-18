<?php
// Fonction pour ajouter le support des menus dans le thème
function adambeniflah_theme_setup()
{
    // Support des menus
    register_nav_menus(array(
        'primary' => __('Primary Menu', 'adambeniflah-theme'),
    ));

    // Support des images mises en avant
    add_theme_support('post-thumbnails');
}
add_action('after_setup_theme', 'adambeniflah_theme_setup');

// Chargement des styles
function adambeniflah_enqueue_styles()
{
    wp_enqueue_style('main-styles', get_stylesheet_uri()); // Charger style.css
}
add_action('wp_enqueue_scripts', 'adambeniflah_enqueue_styles');
