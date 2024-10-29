<?php get_header(); ?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adam Beniflah - Réalisations</title>
</head>
<style>

</style>

<body>

    <div class="video-gallery">
        <h1>Réalisations Vidéos</h1>
        <ul class="menu">
            <li data-filter="all"><a href="#">ALL</a></li>
            <li data-filter="clip-video"><a href="#">CLIP VIDEO</a></li>
            <li data-filter="court-metrage"><a href="#">COURT MÉTRAGE</a></li>
            <li data-filter="evenementiel"><a href="#">ÉVÉNEMENTIEL</a></li>
            <li data-filter="interview"><a href="#">INTERVIEW</a></li>
            <li data-filter="publicite"><a href="#">PUBLICITÉ</a></li>
            <li data-filter="theatre"><a href="#">THÉÂTRE</a></li>
        </ul>

        <div class="video-grid">
            <?php
            // La requête pour récupérer toutes les vidéos
            $args = array(
                'post_type' => 'video', // Utilise le CPT 'video'
                'posts_per_page' => -1, // Récupère toutes les vidéos
                'order' => 'DESC', // Trie par date de publication (la plus récente en premier)
                'orderby' => 'date'
            );
            $video_query = new WP_Query($args);

            if ($video_query->have_posts()) :
                while ($video_query->have_posts()) : $video_query->the_post();
                    // Récupère l'URL de la vidéo
                    $video_url = get_post_meta(get_the_ID(), 'video_url', true);
                    // Récupère les catégories de chaque vidéo
                    $video_category = get_the_terms(get_the_ID(), 'category');
                    $video_classes = ''; // Réinitialise les classes pour chaque vidéo

                    if ($video_category && !is_wp_error($video_category)) {
                        foreach ($video_category as $cat) {
                            $video_classes .= ' ' . $cat->slug;
                        }
                    }
            ?>
                    <div class="video-item <?php echo esc_attr(trim($video_classes)); ?>">
                        <h3><?php the_title(); ?></h3>
                        <iframe src="<?php echo esc_url($video_url); ?>" frameborder="0" allowfullscreen></iframe>
                    </div>
                <?php endwhile;
                // Réinitialise la requête
                wp_reset_postdata();
            else : ?>
                <p>Aucune vidéo trouvée.</p>
            <?php endif; ?>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Sélectionne tous les éléments de menu et de vidéos
            const menuItems = document.querySelectorAll('.menu li');
            const videoItems = document.querySelectorAll('.video-item');

            // Fonction de filtrage avec vérification par console.log
            function filterVideos(category) {
                console.log("Filtrage des vidéos pour la catégorie :", category);
                videoItems.forEach(item => {
                    if (category === 'all' || item.classList.contains(category)) {
                        item.style.display = 'block';
                    } else {
                        item.style.display = 'none';
                    }
                });
            }

            // Ajoute un écouteur d'événement à chaque élément de menu
            menuItems.forEach(menu => {
                menu.addEventListener('click', function(e) {
                    // Empêche le comportement de lien par défaut
                    e.preventDefault();
                    // Récupère la catégorie
                    let filter = this.getAttribute('data-filter');
                    // Applique le filtre
                    filterVideos(filter);
                });
            });

            // Affiche toutes les vidéos au chargement
            filterVideos('all');
        });

        function filterVideos(category) {
            let count = 0; // Compteur de vidéos affichées
            videoItems.forEach(item => {
                console.log("Classes de la vidéo :", item.className); // Affiche les classes de chaque vidéo
                if (category === 'all' || item.classList.contains(category)) {
                    item.style.display = 'block';
                    count++; // Incrémente le compteur si l'élément est affiché
                } else {
                    item.style.display = 'none';
                }
            });
            console.log(`Nombre de vidéos affichées pour la catégorie ${category} :`, count);
        }
    </script>

</body>

</html>

<?php get_footer(); ?>