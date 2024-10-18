<?php
/* Theme Name: Adam Beniflah Theme */
?>

<?php get_header(); ?>

<div class="content-section" id="a-propos">
    <?php the_content(); ?>
</div>

<div class="contact-video-container">
    <video class="contact-video" autoplay muted loop>
        <source src="<?php echo get_template_directory_uri(); ?>/assets/contact.mp4" type="video/mp4">
        Your browser does not support the video tag.
    </video>
    <form class="contact-form" action="#" method="post">
        <h3 id="contact">ME CONTACTER</h3>
        <?php the_content(); ?>
        <div class="button-container">
            <button type="submit">Envoyer</button>
        </div>
    </form>
</div>

<?php get_footer(); ?>