<?php

// Disable Wordpress' default Gutenberg Editor:
add_filter('use_block_editor_for_post', '__return_false', 10);

// Register existing navigation menus
register_nav_menu('main', 'Navigation principale du site web (en-tête)');
register_nav_menu('social-media', 'Liens vers les réseaux sociaux');

function dwp_get_menu(string $location, ?array $attributes = []): array
{
    // 1. Récupérer les liens en base de données pour la location $location
    $locations = get_nav_menu_locations();
    $menuId = $locations[$location];
    $items = wp_get_nav_menu_items($menuId);

    // 2. Formater les liens récupérés en objets qui contiennent les attributs suivants :
    // - href : l'URL complète pour ce lien
    // - label : le libellé affichable pour ce lien
    $links = [];

    foreach ($items as $item) {
        $link = new stdClass();
        $link->href = $item->url;
        $link->label = $item->title;

        foreach($attributes as $attribute) {
            $link->$attribute = get_field($attribute, $item->ID);
        }

        $links[] = $link;
    }

    // 3. Retourner l'ensemble des liens formatés en un seul tableau non-associatif
    return $links;
}

// Activer les images "thumbnail" sur nos posts
add_theme_support('post-thumbnails');
add_image_size('project_thumbnail', 400, 400, true);

// Enregistrer un custom post type :
register_post_type('project', [
        'label' => 'Projets',
        'description' => 'Mes projets',
        'public' => true,
        'menu_position' => 5,
        'hierarchical' => true,
        'menu_icon' => 'dashicons-art', // https://developer.wordpress.org/resource/dashicons/#pets,
        'supports' => ['title','thumbnail', 'page-attributes'],
]);

function dwp_get_projets($count = 20){
    //1. on instancie l'objet WP_Query
    $projects = new WP_Query([
        //arguments
        'post_type' => 'project',
        'orderby' =>'date',
        'order'=>'ASC',
        'posts_per_page' => $count,
    ]);
    //2. on retourne l'objet WP_Query
    return $projects;
}
