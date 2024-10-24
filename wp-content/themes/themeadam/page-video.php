<?php get_header(); ?>

<div class="video-gallery">
    <h1>Réalisations Vidéos</h1>
    <div class="category-filter">
        <a href="#" data-filter="*" class="active">All</a>
        <a href="#" data-filter=".clip-videos">Clip vidéos</a>
        <a href="#" data-filter=".court-metrage">Court métrage</a>
        <a href="#" data-filter=".evenementiel">Événementiel</a>
        <a href="#" data-filter=".interview">Interview</a>
        <a href="#" data-filter=".pub">Pub</a>
        <a href="#" data-filter=".theatre">Théâtre</a>
    </div>

    <div class="video-grid">
        <div class="video-item court-metrage">
            <h3>Court Métrage 1</h3>
            <iframe src="https://www.youtube.com/embed/bCMBDbOaOjI?si=ND3AqhZyuUjOkoPa"></iframe>
        </div>
    </div>
</div>


<?php get_footer(); ?>