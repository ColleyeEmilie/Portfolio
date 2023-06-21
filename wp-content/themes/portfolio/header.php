<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, minimum-scale=1">
    <meta name="author" content="Emilie Colleye">
    <meta name="description" content="Portfolio de Emilie Colleye, développeuse web. Découvrez tous mes projets et apprenez-en plus sur moi. N'hésitez pas à me contacter. ">
    <title><?= get_the_title(); ?></title>
    <link rel="stylesheet" href="https://use.typekit.net/bcf2kyi.css">
    <link rel="stylesheet" href="<?= get_stylesheet_directory_uri() . '/public/css/site.css'; ?>" />
</head>
<body>
<?php $isPage = is_page_template( 'template-projects.php'); $isSingle = get_post_type();?>
<header class="header">
    <h1 aria-level="1" class="header__sitename hidden"><?= get_bloginfo('name'); ?></h1>
    <p class="header__tagline hidden"><?= get_bloginfo('description'); ?></p>
    <h2 aria-level="2" class="hidden">Navigation</h2>
    <input class="menu-btn" type="checkbox" id="menu-btn" />
    <label class="menu-icon" for="menu-btn"><span class="navicon"></span></label>
    <a href="https://emilie-colleye.com/" class="logo"></a>
    <ul class="menu">
        <?php foreach(dwp_get_menu('main') as $link): ?>
        <li>
            <a href="<?= $link->href; ?>" class="nav__link">
                <span class="nav__label <?php if($isPage || $isSingle === "project"){
                    echo "true";
                }else{
                    echo "false";
                };?>"><?= $link->label; ?></span>
            </a>
        </li>
        <?php endforeach; ?>
    </ul>
</header>
