<?php /* Template Name: Projects page template */ ?>
<?php get_header(); ?>
<?php if(have_posts()): while(have_posts()): the_post(); ?>
<main class="projects">
    <h2 class="projects__title title">Découvrez toutes mes <b>réalisations !</b></h2>
    <div class="projects__background"></div>
    <div class="projects__wrapper">
        <?php
        $projects = new WP_Query([
            'post_type' => 'project',
            'posts_per_page' => 20
        ]);
        if($projects->have_posts()): while($projects->have_posts()): $projects->the_post();?>
            <section class="projects__content">
                <a href="<?= get_the_permalink(); ?>">
                    <figure class="projects__fig">
                        <img src="<?= get_field('project_thumbnail')?>" alt="" class="projects__img">
                    </figure>
                    <div class="projects__regroup">
                        <h3 class="projects__name title"><?= get_the_title(); ?></h3>
                        <p class="projects__desc"><?= get_field('project_description'); ?></p>
                        <p class="projects__link">Découvrir le projet</p>
                    </div>
                </a>
            </section>
        <?php endwhile; else: ?>
            <p class="projects__empty">Il n'y a pas de projets pour le moment. </p>
        <?php endif; wp_reset_query(); ?>
    </div>
</main>
<?php endwhile; endif; ?>
<?php get_footer(); ?>
