<?php
function adambeniflah_enqueue_styles()
{
    // Charger le style principal
    wp_enqueue_style('main-styles', get_stylesheet_uri());

    // Charger les styles spécifiques selon les pages
    if (is_page('photographie')) {
        wp_enqueue_style('page-photographie', get_template_directory_uri() . '/style/page-photographie.css');
    }

    if (is_page('theatre')) {
        wp_enqueue_style('page-theatre', get_template_directory_uri() . '/style/page-theatre.css');
    }

    if (is_page('video')) {
        wp_enqueue_style('page-videos', get_template_directory_uri() . '/style/page-videos.css');
    }

    // Charger les styles d'en-tête et de pied de page
    wp_enqueue_style('header-style', get_template_directory_uri() . '/style/header.css');
    wp_enqueue_style('footer-style', get_template_directory_uri() . '/style/footer.css');

    // Charger le CSS et le JS uniquement pour la page avec le template `page-video.php`
    if (is_page_template('page-video.php')) {
        wp_enqueue_style('page-video-css', get_template_directory_uri() . '/page-video.css');
        wp_enqueue_script('video-page-js', get_template_directory_uri() . '/script.js', array('jquery'), null, true);
    }
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
        'supports' => array('title', 'editor', 'thumbnail'),
        'rewrite' => array('slug' => 'videos'),
        'show_in_rest' => true,
        'taxonomies' => array('category')
    );

    register_post_type('video', $args);
}
add_action('init', 'adambeniflah_create_video_post_type');

// Ajouter un champ pour l'URL de la vidéo
function adambeniflah_video_meta_box()
{
    add_meta_box(
        'video_url_meta_box',
        'URL de la vidéo',
        'adambeniflah_render_video_url_meta_box',
        'video',
        'normal',
        'high'
    );
}

function adambeniflah_render_video_url_meta_box($post)
{
    wp_nonce_field('save_video_url', 'video_url_nonce');
    $value = get_post_meta($post->ID, 'video_url', true);
    echo '<label for="video_url">URL de la vidéo:</label>';
    echo '<input type="text" id="video_url" name="video_url" value="' . esc_attr($value) . '" size="25" />';
}

// Sauvegarder l'URL de la vidéo
function adambeniflah_save_video_url($post_id)
{
    if (!isset($_POST['video_url_nonce']) || !wp_verify_nonce($_POST['video_url_nonce'], 'save_video_url')) {
        return;
    }

    if (array_key_exists('video_url', $_POST)) {
        $url = sanitize_text_field($_POST['video_url']);

        // Convertir l'URL standard de YouTube en URL d'intégration
        if (preg_match('/(?:https?:\/\/)?(?:www\.)?(?:youtube\.com\/(?:[^\/\n\s]+\/\S+\/|(?:v|e(?:mbed)?)\/|.*[?&]v=)|youtu\.be\/)([a-zA-Z0-9_-]{11})/', $url, $matches)) {
            // Construire l'URL d'intégration
            $video_id = $matches[1];
            $embed_url = 'https://www.youtube.com/embed/' . $video_id;
            update_post_meta($post_id, 'video_url', $embed_url);
        } else {
            // Si l'URL ne correspond pas, ne pas enregistrer
            update_post_meta($post_id, 'video_url', ''); // Pour éviter d'avoir une URL invalide
        }
    }
}
add_action('add_meta_boxes', 'adambeniflah_video_meta_box');
add_action('save_post', 'adambeniflah_save_video_url');
