<?php
/*
Template Name: Theatre Page
*/
get_header(); ?>

<div class="content-section">
        <h1>Théâtre</h1>
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                        <h2><?php the_title(); ?></h2>
                        <div><?php the_content(); ?></div>
        <?php endwhile;
        endif; ?>
</div>

<?php get_footer(); ?>