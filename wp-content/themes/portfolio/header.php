<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= get_bloginfo('name'); ?></title>
    <link rel="stylesheet" href="https://use.typekit.net/bcf2kyi.css">
    <link rel="stylesheet" href="https://use.typekit.net/bcf2kyi.css">
    <link rel="stylesheet" href="<?= get_stylesheet_directory_uri() . '/public/css/site.css'; ?>" />
</head>
<body>

<header class="header">
    <h1 class="header__sitename hidden"><?= get_bloginfo('name'); ?></h1>
    <p class="header__tagline hidden"><?= get_bloginfo('description'); ?></p>
    <h2 class="hidden">Navigation</h2>
    <input class="menu-btn" type="checkbox" id="menu-btn" />
    <label class="menu-icon" for="menu-btn"><span class="navicon"></span></label>
    <ul class="menu">
        <?php foreach(dwp_get_menu('main') as $link): ?>
        <li>
            <a href="<?= $link->href; ?>" class="nav__link">
                <span class="nav__label"><?= $link->label; ?></span>
            </a>
        </li>
        <?php endforeach; ?>
    </ul>
</header>
