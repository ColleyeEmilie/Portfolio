
<footer class="footer" aria-labelledby="footer">
    <?php $isPage = is_front_page();?>
    <h2 class="footer__title hidden" id="footer" aria-level="2"><?= __('Pied de page', 'prt'); ?></h2>
<div class="footer__all flex <?php if($isPage){
    echo "isGreen";
}else{
    echo "isWhite";
};?>">
    <a href="<?= get_the_permalink(portfolio_get_template_page('template-legals')); ?>"
       class="footer__left">Mentions légales</a>
    <div class="footer__right">
        <ul class="footer__socials flex">
            <?php $socials = new WP_Query([
            'post_type' => 'network',
            'posts_per_page' => 3
            ]);?>
            <?php if ($socials->have_posts()):while ($socials->have_posts()): $socials->the_post(); ?>
                <li class="footer__item">
                    <figure class="footer__fig">
                        <a href="<?= get_field('network_link') ?>" class="footer__link" target="_blank">
                            <img src="<?php the_post_thumbnail_url(); ?>"
                                 class="footer__img style-svg <?= get_post_field('post_name', get_post()); ?>"
                                 alt="<?= get_post_meta(get_post_thumbnail_id(), '_wp_attachment_image_alt', true) ?>">
                        </a>
                    </figure>
                </li>
            <?php endwhile; ?>
            <?php endif; ?>
        </ul>
    </div>
</div>
</footer>
<script  src="./resources/js/main.js"></script>
</body>
</html>