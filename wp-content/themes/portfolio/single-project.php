<?php get_header(); ?>
<?php if(have_posts()): while(have_posts()): the_post(); ?>
    <main class="singleProject">
        <h2 aria-level="2" class="singleProject__title hidden">Mon projet <?= get_field('projet_nom')?> </h2>
        <div class="singleProject__background"></div>
        <section class="singleProject__article">
            <h3 aria-level="3" class="singleProject__title title"><?= get_field('projet_nom')?> </h3>
            <div class="singleProject__hero">
                <figure class="singleProject__hero--fig">
                    <img src="<?= get_field('projet_img_principale')?>" alt="" class="singleProject__hero--img">
                </figure>
                <p class="singleProject__presentation--1"><?= get_field('projet_presentation_1')?></p>
            </div>

            <div class="singleProject__content">
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
                    <figure class="singleProject__fig">
                        <img src="<?= get_field('projet_img_3')?>" alt="" class="singleProject__img">
                    </figure>
                </div>
            </div>
        </section>
    </main>
<?php endwhile; endif; ?>
<?php get_footer() ?>