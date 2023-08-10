<?php /* Template Name: Contact page template */ ?>
<?php get_header(); ?>
<?php if (have_posts()): while (have_posts()): the_post(); ?>

<main class="layout__contact">
    <div class="contact__background background"></div>
    <section aria-labelledby="contact" class="contact">
        <h2 class="contact__title title" aria-level="2"><?= get_the_title(); ?></h2>
        <div id="contact">
            <section aria-labelledby="coordinate" class="coordinates" itemscope itemtype="https://schema.org/Person">
                <h3 id="coordinate" class="coordinates__title hidden" aria-level="3"><?= 'Mes coordonnées' ?></h3>
                <div class="coordinates__content">
                    <section aria-labelledby="mail" class="coordinates__mail">
                        <h4 id="mail" class="coordinates__title bold title" aria-level="4"><?= 'Mail' ?></h4>
                        <p class="coordinates__mail mail" ><a href="mailto:<?= get_field('mail')?>" itemprop="email"><?= get_field('mail')?></a></p>
                    </section>
                    <section aria-labelledby="telephone" class="coordinates__phone">
                        <h4 id="telephone" class="coordinates__title bold title" aria-level="4"><?= 'Téléphone' ?></h4>
                        <p class="coordinates__mail phone" itemprop="telephone"><?= get_field('phone')?></p>
                    </section>
                    <section aria-labelledby="address" class="coordinates__address" itemscope itemtype="https://schema.org/PostalAddress">
                        <h4 id="address" class="coordinates__title bold title" aria-level="4"><?= 'Adresse' ?></h4>
                        <p itemprop="streetAddress" class="coordinates__adress">Rue du canal, 18</p>
                        <p itemprop="postalCode" class="coordinates__postal">4684, HACCOURT</p>
                    </section>
                </div>
            </section>
            <section aria-labelledby="contact" class="contact__content">
                <h3 class="contact__title hidden" aria-level="3">Contactez-moi</h3>
                <div class="page__form">
                    <?php
                    $feedback = hepl_session_get('hepl_contact_form_feedback') ?? false;
                    $errors = hepl_session_get('hepl_contact_form_errors') ?? [];
                    ?>


                    <?php if ($feedback): ?>
                    <div class="success"">
                    <p>Merci&nbsp;! Votre message a bien été envoyé.</p>
                    </div>
                    <?php elseif ($errors): ?>
                    <div class="error">
                        <p>Attention&nbsp;! Merci de corriger les erreurs du formulaire.</p>
                    </div>
                    <?php endif; ?>

                        <form action="<?= esc_url(admin_url('admin-post.php')); ?>" method="POST" class="contact__form">
                            <fieldset class="contact__info">
                                <div class="contact__name">
                                    <div class="contact__field">
                                        <label for="firstname" class="field__label">Prénom</label>
                                        <input type="text" name="firstname" id="firstname" class="field__input" />

                                        <?php if($errors['firstname'] ?? null): ?>
                                            <p class="field__error"><?= $errors['firstname']; ?></p>
                                        <?php endif; ?>
                                    </div>
                                    <div class="contact__field">
                                        <label for="lastname" class="field__label">Nom</label>
                                        <input type="text" name="lastname" id="lastname" class="field__input" />
                                        <?php if($errors['lastname'] ?? null): ?>
                                            <p class="field__error"><?= $errors['lastname']; ?></p>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="contact__field">
                                    <label for="email" class="field__label">Email</label>
                                    <input type="email" name="email" id="email" class="field__input" />
                                    <?php if($errors['email'] ?? null): ?>
                                        <p class="field__error" ><?= $errors['email']; ?></p>
                                    <?php endif; ?>
                                </div>
                                <div class="contact__field">
                                    <label for="message" class="field__label">Message</label>
                                    <textarea name="message" id="message" cols="30" rows="10" class="field__textarea"></textarea>
                                    <?php if($errors['message'] ?? null): ?>
                                        <p class="field__error" ><?= $errors['message']; ?></p>
                                    <?php endif; ?>
                                </div>
                            </fieldset>
                            <div class="contact__footer">
                                <input type="hidden" name="action" value="hepl_contact_form" />
                                <input type="hidden" name="contact_nonce" value="<?= wp_create_nonce('hepl_contact_form'); ?>" />
                                <button class="contact__submit" type="submit">Envoyer</button>
                            </div>
                        </form>
                </div>
            </section>
        </div>
    </section>
</main>
<?php endwhile; endif; ?>
<?php get_footer(); ?>
