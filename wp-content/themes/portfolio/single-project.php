<?php get_header(); ?>
<?php if(have_posts()): while(have_posts()): the_post();
$currentID = get_the_ID();?>
    <main class="singleProject">
        <div class="principalContent">
            <h2 aria-level="2" class="singleProject__title hidden">Mon projet <?= get_field('projet_nom')?> </h2>
            <div class="singleProject__background"></div>
            <section class="singleProject__article">
                <h3 aria-level="3" class="singleProject__title midscreen title"><?= get_field('projet_nom')?> </h3>
                <div class="singleProject__hero bigscreen">
                    <figure class="singleProject__hero--fig">
                        <?= get_the_post_thumbnail(null, 'index_thumbnail', ['class' => 'singleProject__hero--img']); ?>
                    </figure>
                    <p class="singleProject__presentation--1"><?= get_field('projet_presentation_1')?></p>
                </div>
                <div class="singleProject__content bigscreen">
                    <div class="singleProject__presentation">
                        <p class="singleProject__presentation--2"><?= get_field('projet_presentation_2')?></p>
                        <div class="singleProject__links">
                            <?php if(get_field('projet_link')):?>
                                <div class="singleProject__link--1">
                                    <a href="<?= get_field('projet_link')?>">Visiter le site</a>
                                </div>
                            <?php endif;?>
                            <div class="singleProject__link--2">
                                <a href="<?= get_field('projet_link_github')?>">Voir sur Github</a>
                            </div>
                        </div>
                    </div>

                    <div class="singleProject__figures">
                        <figure class="singleProject__fig">
                            <img src="<?= get_field('projet_img_1')?>" alt="" class="singleProject__img">
                        </figure>
                        <figure class="singleProject__fig">
                            <img src="<?= get_field('projet_img_2')?>" alt="" class="singleProject__img">
                        </figure>
                    </div>
                </div>
            </section>
        </div>
        <section class="singleProject__projects projectsIndex">
            <div class="projectsIndex__regroup midscreen">
                <h2 aria-level="2" class="projectsIndex__title title bold">À voir aussi</h2></div>
            <div class="projectsIndex__articles bigscreen midscreen">
                <?php
                $projects = new WP_Query([
                    'post_type' => 'project',
                    'posts_per_page' => 3
                ]);
                if($projects->have_posts()): while($projects->have_posts()): $projects->the_post();?>
                <?php if($currentID != get_the_ID()): ?>
                    <article class=" project slide-in">
                        <a href="<?= get_the_permalink(); ?>">
                            <div class="project__card">
                                <h3 aria-level="3" class="project__name hidden"><?= get_the_title(); ?></h3>
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
                    <?php endif;?>
                <?php endwhile; else: ?>
                    <p class="projects__empty">Il n'y a pas de projets pour le moment. </p>
                <?php endif; wp_reset_query(); ?>
            </div>
        </section>
    </main>
<?php endwhile; endif; ?>
<?php get_footer() ?>