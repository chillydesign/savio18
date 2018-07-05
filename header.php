<!doctype html>
<html <?php language_attributes(); ?> class="no-js">
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <title><?php wp_title(''); ?><?php if(wp_title('', false)) { echo ' :'; } ?> <?php bloginfo('name'); ?></title>
        <?php $tdu =  get_template_directory_uri(); ?>
        <?php $site_name = get_bloginfo('site_name'); ?>
        <link href="//www.google-analytics.com" rel="dns-prefetch">

        <link rel="apple-touch-icon" sizes="180x180" href="<?php echo $tdu; ?>/img/favicon/apple-touch-icon.png?v=2">
        <link rel="icon" type="image/png" sizes="32x32" href="<?php echo $tdu; ?>/img/favicon/favicon-32x32.png?v=2">
        <link rel="icon" type="image/png" sizes="16x16" href="<?php echo $tdu; ?>/img/favicon/favicon-16x16.png?v=2">
        <link rel="manifest" href="<?php echo $tdu; ?>/img/favicon/manifest.json?v=2">
        <link rel="mask-icon" href="<?php echo $tdu; ?>/img/favicon/safari-pinned-tab.svg?v=2" color="#005ca9">
        <link rel="shortcut icon" href="/favicon.ico?v=2">
        <meta name="apple-mobile-web-app-title" content="<?php $site_name; ?>">
        <meta name="application-name" content="<?php $site_name; ?>">
        <meta name="theme-color" content="#ffffff">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="<?php bloginfo('description'); ?>">
        <?php wp_head(); ?>

    </head>
    <body <?php body_class(); ?>>

        <header>
            <div class="container">
                <nav>
                    <a href="<?php echo home_url(); ?>" class="branding"><?php echo $site_name; ?></a>
                    <a href="#" id="menu_button">Menu</a>
                    <ul id="menu_navigation">
                        <?php chilly_nav('primary-navigation'); ?>
                    </ul>
                </nav>
            </div>
        </header>
