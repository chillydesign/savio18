<!doctype html>
<html <?php language_attributes(); ?> class="no-js">

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <title><?php wp_title(''); ?><?php if (wp_title('', false)) {
                                        echo ' :';
                                    } ?> <?php bloginfo('name'); ?></title>
    <?php $tdu =  get_template_directory_uri(); ?>
    <?php $site_name = get_bloginfo('site_name'); ?>
    <link href="//www.google-analytics.com" rel="dns-prefetch">

    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo $tdu; ?>/images/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo $tdu; ?>/images/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo $tdu; ?>/images/favicon/favicon-16x16.png">
    <link rel="manifest" href="<?php echo $tdu; ?>/images/favicon/site.webmanifest">
    <meta name="msapplication-TileColor" content="#00aba9">
    <meta name="theme-color" content="#ffffff">

    <?php $smp = social_meta_properties(); ?>
    <!-- Open Graph -->
    <meta property="og:url" content="<?php echo $smp->url; ?>">
    <meta property="og:type" content="article" />
    <meta property="og:site_name" content="<?php echo $smp->title; ?>" />
    <meta property="og:title" content="<?php echo $smp->title; ?>">
    <meta property="og:description" content="<?php echo $smp->description; ?>">
    <meta property="og:img" content="<?php echo $smp->image; ?>">
    <meta property="og:image" content="<?php echo $smp->image; ?>">
    <!-- <meta property="fb:admins" content="" /> -->

    <!-- TWITTER -->
    <meta name="twitter:card" value="<?php echo $smp->description; ?>">
    <meta name="twitter:title" content="<?php echo $smp->title; ?>">
    <meta name="twitter:description" content="<?php echo $smp->description; ?>">
    <meta name="twitter:image" content="<?php echo $smp->image; ?>">
    <!-- GOOGLE -->
    <meta itemprop="name" content="<?php echo $smp->title; ?>">
    <meta itemprop="description" content="<?php echo $smp->description; ?>">
    <meta itemprop="image" content="<?php echo $smp->image; ?>">


    <meta name="apple-mobile-web-app-title" content="<?php $site_name; ?>">
    <meta name="application-name" content="<?php $site_name; ?>">
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


                <ul id="menu_navigation" class="menu_navigation">

                    <?php if (is_user_logged_in()) : ?>
                        <?php chilly_nav('extra-menu'); ?>
                    <?php else : ?>
                        <?php chilly_nav('primary-navigation'); ?>
                    <?php endif; ?>
                </ul>



            </nav>


        </div>


    </header>