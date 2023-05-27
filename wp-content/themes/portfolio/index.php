<?php get_header(); ?>
    <main class="page">
        <section class="page__hero hero">
            <div class="hero__background"></div>
            <div class="hero__content">
                <div class="hero__regroup">
                    <h2 class="hero__title"><?= get_field('hero_titre')?> </h2>
                    <p class="hero__presentation"><?= get_field('hero_presentation')?></p>
                </div>
                <figure class="hero__fig">
                    <img src="<?= get_field('hero_image')?>" alt="" class="hero__img">
                </figure>
            </div>
        </section>

        <section class="page__projects projects">
            <div class="projects__regroup">
                <h2 class="projects__title">Découvrez mes derniers projets </h2>
                <p class="projects__all">Tous mes projets</p>
            </div>
            <div class="projects__articles">
                <?php
                // Faire une requête en DB pour récupérer 3 projets
                $projects = new WP_Query([
                    'post_type' => 'project',
                    'posts_per_page' => 3
                ]);
                if($projects->have_posts()): while($projects->have_posts()): $projects->the_post();?>
                    <article class="project">
                        <a href="<?= get_the_permalink(); ?>">
                        <div class="project__card">
                            <h3 class="project__name hidden"><?= get_the_title(); ?></h3>
                            <figure class="project__fig">
                                <img src="<?= get_field('project_thumbnail')?>" alt="" class="project__img">
                                    <p class="project__link">
                                        <span class="sro"><?= get_the_title(); ?></span>
                                    </p>
                            </figure>
                        </div>
                        </a>
                    </article>
                <?php endwhile; else: ?>
                    <p class="projects__empty">Il n'y a pas de projets pour le moment. </p>
                <?php endif; wp_reset_query(); ?>
            </div>
        </section>

        <section class="page__presentation presentation">
            <div class="presentation__regroup">
                <h2 class="presentation__title"><?= get_field('presentation_titre')?> </h2>
                <p class="presentation__text"><?= get_field('presentation_texte')?></p>
            </div>
            <figure class="presentation__fig">
                <img src="<?= get_field('presentation_image')?>" alt="" class="presentation__img">
            </figure>
        </section>
    </main>
<?php get_footer(); ?>