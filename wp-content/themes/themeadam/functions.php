<?php
function adambeniflah_enqueue_styles()
{
    // Charger le style principal
    wp_enqueue_style('main-styles', get_stylesheet_uri());

    // Charger les styles spécifiques selon les pages
    if (is_page('photographie')) { // Si la page est "photographie"
        wp_enqueue_style('page-photographie', get_template_directory_uri() . '/style/page-photographie.css');
    }

    if (is_page('theatre')) { // Si la page est "théâtre"
        wp_enqueue_style('page-theatre', get_template_directory_uri() . '/style/page-theatre.css');
    }

    if (is_page('video')) { // Si la page est "vidéo"
        wp_enqueue_style('page-videos', get_template_directory_uri() . '/style/page-videos.css');
    }

    // Charger les styles d'en-tête et de pied de page
    wp_enqueue_style('header-style', get_template_directory_uri() . '/style/header.css');
    wp_enqueue_style('footer-style', get_template_directory_uri() . '/style/footer.css');
}
add_action('wp_enqueue_scripts', 'adambeniflah_enqueue_styles');

function adambeniflah_enqueue_scripts()
{
    // Charger le fichier JavaScript
    wp_enqueue_script('main-scripts', get_template_directory_uri() . '/script.js', array('jquery'), null, true);
}
add_action('wp_enqueue_scripts', 'adambeniflah_enqueue_scripts');

// Custon Post Type
function adambeniflah_create_video_post_type()
{
    $labels = array(
        'name' => __('Vidéos'),
        'singular_name' => __('Vidéo'),
        'menu_name' => __('Vidéos'),
        'name_admin_bar' => __('Vidéo'),
        'add_new' => __('Ajouter Nouveau'),
        'add_new_item' => __('Ajouter une Vidéo'),
        'new_item' => __('Nouvelle Vidéo'),
        'edit_item' => __('Modifier Vidéo'),
        'view_item' => __('Voir Vidéo'),
        'all_items' => __('Toutes les Vidéos'),
        'search_items' => __('Chercher Vidéos'),
        'not_found' => __('Aucune vidéo trouvée.'),
        'not_found_in_trash' => __('Aucune vidéo trouvée dans la corbeille.')
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'has_archive' => true,
        'supports' => array('title', 'editor', 'thumbnail'), // 'editor' pour le contenu, 'thumbnail' pour la miniatures
        'rewrite' => array('slug' => 'videos'), // Slug de l'URL
        'show_in_rest' => true, // Activer le bloc éditeur (Gutenberg)
        'taxonomies' => array('category')
    );

    register_post_type('video', $args);
}
add_action('init', 'adambeniflah_create_video_post_type');
