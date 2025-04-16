<?php
$subtitle = get_field('why_section_subtitle');
$title = get_field('why_section_title');
$reasons = get_field('why_section_repeater');
$bg_image_three_id = get_field('bg_image_three');

$bg_image_three_url = $bg_image_three_id ? wp_get_attachment_image_url($bg_image_three_id, 'full') : '';

if ($subtitle || $title || $reasons): ?>
    <section class="home-why-need-it" id="why-need-it">
        <div class="container">
            <div class="home-why-need-it__holder">
                <div class="home-why-need-it__holder--titles">
                    <?php if ($bg_image_three_url): ?>
                        <img src="<?php echo esc_url($bg_image_three_url); ?>" alt="" alt="Background triangle figure"
                            class="background-element-three">
                    <?php endif; ?>

                    <?php if ($subtitle): ?>
                        <p class="caption-regular-caps"><?php echo esc_html($subtitle); ?></p>
                    <?php endif; ?>

                    <?php if ($title): ?>
                        <h2><?php echo esc_html($title); ?></h2>
                    <?php endif; ?>
                </div>

                <?php if ($reasons): ?>
                    <div class="home-why-need-it__reasons">
                        <?php foreach ($reasons as $item):
                            $icon_id = $item['why_icon'];
                            $icon_url = $icon_id ? wp_get_attachment_image_url($icon_id, 'full') : '';
                            $reason_title = $item['why_title'];
                            ?>
                            <div class="home-why-need-it__reasons--reason">
                                <?php if ($icon_url): ?>
                                    <div class="reason-icon">
                                        <img src="<?php echo esc_url($icon_url); ?>" alt="<?php echo esc_attr($reason_title); ?>">
                                    </div>
                                <?php endif; ?>
                                <?php if ($reason_title): ?>
                                    <span class="body-bold-one-120">
                                        <?php echo esc_html($reason_title); ?>
                                    </span>
                                <?php endif; ?>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>

            </div>
        </div>
    </section>
<?php endif; ?>