<?php
$cta_title = get_field('want_to_try_cta_title');
$cta_description = get_field('want_to_try_cta_description');
$footer_cta_btn = get_field('try_button');

if ($cta_title || $cta_description || $cta_btn_text): ?>
    <section class="want-to-try">
        <div class="container">
            <div class="want-to-try__holder">
                <div class="want-to-try__holder--titles">
                    <?php if ($cta_title): ?>
                        <h2 class="want-to-try__holder--title"><?php echo esc_html($cta_title); ?></h2>
                    <?php endif; ?>

                    <?php if ($cta_description): ?>
                        <div class="want-to-try__holder--description"><?php echo wp_kses_post($cta_description); ?></div>
                    <?php endif; ?>
                </div>

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
        </div>
    </section>
<?php endif; ?>