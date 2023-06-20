<?php get_header(); ?>
    <main class="page">
        <section class="page__hero hero">
            <div class="hero__background background"></div>
            <div class="hero__content">
                <div class="hero__regroup">
                    <h2 class="hero__title title"><?= get_field('hero_titre')?> </h2>
                    <p class="hero__presentation"><?= get_field('hero_presentation')?></p>
                </div>
                <figure class="hero__fig">
                    <?= get_the_post_thumbnail(null, 'index_thumbnail', ['class' => 'hero__img']); ?>
                </figure>
            </div>
        </section>

        <section class="page__projects projectsIndex">
            <div class="projectsIndex__regroup">
                <h2 class="projectsIndex__title title bold">Découvrez mes derniers projets </h2>
                <p class="projectsIndex__all">Tous mes projets</p>
            </div>
            <div class="projectsIndex__articles">
                <?php
                $projects = new WP_Query([
                    'post_type' => 'project',
                    'posts_per_page' => 3
                ]);
                if($projects->have_posts()): while($projects->have_posts()): $projects->the_post();?>
                    <article class=" project">
                        <a href="<?= get_the_permalink(); ?>">
                        <div class="project__card">
                            <h3 class="project__name hidden"><?= get_the_title(); ?></h3>
                            <div class="project__content">
                                <figure class="project__fig">
                                    <?= get_the_post_thumbnail(null, 'index_projects_thumbnail', ['class' => 'project__img']); ?>
                                </figure>
                                <p class="project__link">
                                    <span class="title"><?= get_the_title(); ?></span>
                                </p>
                            </div>
                        </div>
                        </a>
                    </article>
                <?php endwhile; else: ?>
                    <p class="projects__empty">Il n'y a pas de projets pour le moment. </p>
                <?php endif; wp_reset_query(); ?>
            </div>
        </section>

        <section class="page__presentation presentation">
            <div class="presentation__background background"></div>
            <div class="presentation__content">
                <div class="presentation__regroup">
                    <h2 class="presentation__title title bold"><?= get_field('presentation_titre')?> </h2>
                    <div class="presentation__text">
                        <?= get_field('presentation_texte')?>
                    </div>
                </div>
                <figure class="presentation__fig">
                    <img src="<?= get_field('presentation_image')?>" alt="" class="presentation__img">
                </figure>
            </div>
        </section>

        <section class="page__footer footer">
            <div class="footer__regroup">
                <h2 class="footer__title title bold">Vous avez envie de discuter ? </h2>
                <a href="<?= get_the_permalink(portfolio_get_template_page('template-contact')) ?>" class="footer__contact title"> Contactez-moi !</a>
            </div>

        </section>
    </main>
<?php get_footer(); ?>