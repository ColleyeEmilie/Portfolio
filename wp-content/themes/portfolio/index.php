<?php get_header(); ?>
    <main class="page">
        <section class="page__hero hero">
            <h2 class="hero__title hidden"><?= get_field('hero_titre')?> </h2>
            <figure class="hero__fig">
                <img src="<?= get_field('hero_image')?>" alt="" class="hero__img">
            </figure>
            <p class="hero__presentation"><?= get_field('hero_presentation')?></p>
        </section>

        <section class="page__projects projects">
            <h2 class="projects__title">Découvrez mes derniers projets </h2>
            <p class="projects__all">Tous mes projets</p>
            <?php
            // Faire une requête en DB pour récupérer 3 projets
            $projects = new WP_Query([
                'post_type' => 'project',
                'posts_per_page' => 3
            ]);
            if($projects->have_posts()): while($projects->have_posts()): $projects->the_post();?>
                <article class="project">
                    <div class="project__card">
                        <h3 class="project__name hidden"><?= get_the_title(); ?></h3>
                        <a href="<?= get_the_permalink(); ?>" class="project__link">
                            <span class="sro"><?= get_the_title(); ?></span>
                        </a>
                        <figure class="project__fig">
                            <img src="<?= get_field('project_thumbnail')?>" alt="" class="project__img">
                        </figure>
                    </div>
                </article>
            <?php endwhile; else: ?>
                <p class="projects__empty">Il n'y a pas de projets pour le moment. </p>
            <?php endif; wp_reset_query(); ?>
        </section>

        <section class="page__presentation presentation">
            <h2 class="presentation__title hidden"><?= get_field('presentation_titre')?> </h2>
            <figure class="presentation__fig">
                <img src="<?= get_field('presentation_image')?>" alt="" class="presentation__img">
            </figure>
            <p class="presentation__text"><?= get_field('presentation_texte')?></p>
        </section>
    </main>
<?php get_footer(); ?>