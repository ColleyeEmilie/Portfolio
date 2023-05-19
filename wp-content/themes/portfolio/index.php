<?php get_header(); ?>
<?php if(have_posts()): while(have_posts()): the_post(); ?>
<main class="page">
    <section class="page__hero hero">
        <h2 class="hero__title hidden"><?= get_field('hero_titre')?> </h2>
        <figure class="hero__fig">
            <img src="<?= get_field('hero_image')?>" alt="" class="hero__img">
        </figure>
        <p class="hero__presentation"><?= get_field('hero_presentation')?></p>
    </section>

    <section class="page__projects projects">

    <?php
                // Faire une requête en DB pour récupérer 4 animaux
                $projects = new WP_Query([
                    'post_type' => 'projects',
                    'posts_per_page' => 3
                ]);
    if($projects->have_posts()): while($projects->have_posts()): $projects->the_post();?>
    <article class="project">
        <div class="project__card">
            <h2 class="project__name hidden"><?= get_the_title(); ?></h2>
            <a href="<?= get_the_permalink(); ?>" class="project__link">
                <span class="sro"><?= get_the_title(); ?></span>
            </a>
            <!---<p><?= get_field('projet_presention_1')?></p> -->
            <figure class="project__fig">
                <img src="<?= get_field('project_thumbnail')?>" alt="" class="project__img">
            </figure>
        </div>
    </article>
    <?php endwhile; else: ?>
    <p class="projects__empty">Il n'y a pas de projets pour le moment. </p>
    <?php endif; ?>
</section>
</main>
<?php endwhile; endif; ?>
<?php get_footer(); ?>