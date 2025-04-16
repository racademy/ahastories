<?php
$subtitle = get_field('about_us_section_subtitle');
$title = get_field('about_us_section_title');
$description = get_field('about_us_section_description');
$try_button = get_field('try_button');
$image_left_id = get_field('about_us_section_image_left');

$image_left_url = $image_left_id ? wp_get_attachment_image_url($image_left_id, 'full') : '';

if ($subtitle || $title || $description || $try_button || $image_left_url): ?>
    <section class="home-section__about-us" id="produktas">
        <div class="container">
            <div class="home-section__about-us--content <?php echo $image_left_url ? '' : ' full-width'; ?>">
                <?php if ($subtitle): ?>
                    <span
                        class="home-section__about-us--subtitle caption-regular-caps"><?php echo esc_html($subtitle); ?></span>
                <?php endif; ?>

                <?php if ($title): ?>
                    <h2><?php echo esc_html($title); ?></h2>
                <?php endif; ?>

                <?php if ($description): ?>
                    <p class="body-regular-one"><?php echo esc_html($description); ?></p>
                <?php endif; ?>

                <div class="theme-buttons">
                    <?php if ($try_button):
                        $link_url = $try_button['url'];
                        $link_title = $try_button['title'];
                        ?>
                        <a class="theme-buttons__green" href="<?php echo esc_url($link_url); ?>">
                            <?php echo esc_html($link_title); ?>
                        </a>
                    <?php endif; ?>
                </div>
            </div>

            <?php if ($image_left_url): ?>
                <div class="home-section__about-us--image-left">
                    <img src="<?php echo esc_url($image_left_url); ?>" alt="<?php echo esc_attr($title); ?>">
                </div>
            <?php endif; ?>
        </div>
    </section>
<?php endif; ?>