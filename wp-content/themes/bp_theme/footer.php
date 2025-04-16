<?php
$footer_img_id = get_field('footer_img', 'option');
$footer_img_url = wp_get_attachment_image_url($footer_img_id, 'full');
$cta_bg_id = get_field('footer_cta_bg', 'option');
$cta_bg_url = wp_get_attachment_image_url($cta_bg_id, 'full');
$cta_title = get_field('footer_cta_title', 'option');
$cta_description = get_field('footer_cta_description', 'option');
$footer_cta_btn = get_field('footer_cta_btn', 'option');
?>

<?php if ($cta_title || $cta_description || $cta_btn_text): ?>
    <section class="footer-cta" style="background-image: url('<?php echo esc_url($cta_bg_url); ?>');">
        <div class="overlay"></div>
        <div class="container">
            <?php if ($cta_title): ?>
                <h2 class="footer-cta__title"><?php echo esc_html($cta_title); ?></h2>
            <?php endif; ?>

            <?php if ($cta_description): ?>
                <div class="footer-cta__description"><?php echo wp_kses_post($cta_description); ?></div>
            <?php endif; ?>

            <?php if ($footer_cta_btn):
                $link_url = $footer_cta_btn['url'];
                $link_title = $footer_cta_btn['title']; ?>
                <div class="theme-buttons">
                    <a href="<?php echo esc_url($link_url); ?>" class="theme-buttons__black">
                        <?php echo esc_html($link_title); ?>
                    </a>
                </div>
            <?php endif; ?>
        </div>
    </section>
<?php endif; ?>

<footer class="site-footer">
    <div class="container">
        <div class="site-footer__wrapper">
            <div class="site-footer__top">
                <div class="site-footer__left-side">
                    <div class="site-footer__top-logo">
                        <?php
                        $custom_logo_id = get_theme_mod('custom_logo');
                        if ($custom_logo_id) {
                            $logo = wp_get_attachment_image($custom_logo_id, 'full');
                            echo $logo;
                        }
                        ?>
                    </div>
                    <div class="site-footer__bottom-nav-menu">
                        <?php
                        wp_nav_menu(array(
                            'theme_location' => 'menu-footer',
                            'menu_class' => 'nav-menu-footer',
                            'container' => false,
                        ));
                        ?>
                    </div>
                </div>

                <div class="site-footer__right-side">
                    <?php if ($footer_img_url): ?>
                        <div class="footer-logo">
                            <img src="<?php echo esc_url($footer_img_url); ?>" alt="Footer Logo">
                        </div>
                    <?php endif; ?>
                </div>
            </div>

            <div class="site-footer__bottom">
                <div class="site-footer__bottom-left-side body-regular-three">
                    <p>&copy; <?php echo date('Y'); ?> AHA stories. <?php _e('Visos teisės saugomos.') ?></p>
                </div>
                <div class="site-footer__bottom-left-side">
                    <?php
                    wp_nav_menu(array(
                        'theme_location' => 'menu-footer-two',
                        'menu_class' => 'nav-menu-footer',
                        'container' => false,
                    ));
                    ?>
                </div>
            </div>
        </div>
    </div>
</footer>

<?php get_template_part('template-parts/modals/modal', 'contact'); ?>

<?php wp_footer(); ?>
</body>

</html>