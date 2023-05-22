<?php get_header(); ?>
<?php if(have_posts()): while(have_posts()): the_post(); ?>
    <main class="singleProject">
        <h2 class="singleProject__title hidden">Mon projet <?= get_field('projet_nom')?> </h2>
        <article>
            <h3 class="singleProject__title"><?= get_field('projet_nom')?> </h3>

            <figure class="hero__fig">
                <img src="<?= get_field('projet_img_principale')?>" alt="" class="hero__img">
            </figure>

            <p class="hero__presentation"><?= get_field('projet_presentation_1')?></p>

            <p class="hero__presentation"><?= get_field('projet_presentation_2')?></p>
            <a href="<?= get_field('projet_link')?>">Visiter le site</a>
            <a href="<?= get_field('projet_link_github')?>">Voir sur Github</a>

            <figure class="hero__fig">
                <img src="<?= get_field('projet_img_1')?>" alt="" class="hero__img">
            </figure>
            <figure class="hero__fig">
                <img src="<?= get_field('projet_img_2')?>" alt="" class="hero__img">
            </figure>
            <figure class="hero__fig">
                <img src="<?= get_field('projet_img_3')?>" alt="" class="hero__img">
            </figure>
        </article>
    </main>
<?php endwhile; endif; ?>
<?php get_footer() ?>