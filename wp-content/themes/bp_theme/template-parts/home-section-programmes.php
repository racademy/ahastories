<?php
$pretitle = get_field('home_page_programmes_section_pretitle');
$title = get_field('home_page_programmes_section_title');
$programmes = get_field('selected_programmes');
?>

<section class="home-section-programmes" id="programos">
    <div class="container">
        <div class="home-section-programmes__holder">
            <div class="home-section-programmes__holder--titles">
                <?php if ($pretitle): ?>
                    <p class="caption-regular-caps"><?php echo esc_html($pretitle); ?></p>
                <?php endif; ?>

                <?php if ($title): ?>
                    <h2><?php echo esc_html($title); ?></h2>
                <?php endif; ?>
            </div>

            <?php if ($programmes): ?>
                <div class="home-section-programmes__holder--programmes">
                    <?php foreach ($programmes as $post):
                        setup_postdata($post);
                        $link = get_permalink($post->ID);
                        ?>
                        <a href="<?php echo esc_url($link); ?>" class="programme-card">
                            <div class="programme-card__content">
                                <?php
                                $terms = get_the_terms($post->ID, 'programme_category');
                                if ($terms && !is_wp_error($terms)): ?>
                                    <span class="programme-card__content--category">
                                        <?php echo esc_html($terms[0]->name); ?>
                                    </span>
                                <?php endif; ?>

                                <span class="title-one">
                                    <?php echo get_the_title($post->ID); ?>
                                </span>
                            </div>

                            <div class="theme-buttons">
                                <span class="theme-buttons__transparent"><?php _e('View Programme', 'bp_theme'); ?></span>
                            </div>
                        </a>
                    <?php endforeach;
                    wp_reset_postdata(); ?>
                </div>
            <?php else: ?>
                <p><?php _e('No programmes found.', 'bp_theme'); ?></p>
            <?php endif; ?>
        </div>
    </div>
</section>