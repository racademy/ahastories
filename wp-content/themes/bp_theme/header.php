<!doctype html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

    <!-- <?php get_template_part('template-parts/section', 'page-top'); ?> -->

    <header>
        <div class="container">
            <div class="site-header">
                <div class="site-header__logo-holder">
                    <?php
                    if (has_custom_logo()) {
                        $logo = get_custom_logo();
                        echo $logo;
                    }
                    ?>
                </div>

                <div class="site-header__menu-holder">
                    <button class="menu-toggle" aria-label="Toggle menu">
                        <span class="menu-toggle__icon"></span>
                    </button>
                    <nav class="main-navigation">
                        <?php
                        wp_nav_menu(array(
                            'theme_location' => 'menu-main',
                            'menu_class' => 'nav-menu',
                            'container' => false,
                            'walker' => new Custom_Two_Level_Walker(),
                        ));
                        ?>
                    </nav>
                </div>
            </div>
        </div>
    </header>