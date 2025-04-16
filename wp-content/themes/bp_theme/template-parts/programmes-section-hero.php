<?php
$title = get_field('programmes_section_title');
$subtitle = get_field('programmes_section_subtitle');
$image_id = get_field('programmes_image');
$image_url = $image_id ? wp_get_attachment_image_url($image_id, 'full') : '';
$video = get_field('programmes_video');
$video_url = $video ? $video['url'] : '';
$benefits = get_field('programmes_benefits');
$button = get_field('benefit_try_button');
$bg_image_id = get_field('bg_image_fourth');
$bg_image_url = $bg_image_id ? wp_get_attachment_image_url($bg_image_id, 'full') : '';
$categories = get_the_terms(get_the_ID(), 'programme_category');
$labelHero = get_field('programmes_label');
?>

<section class="programmes-hero">
    <div class="container">
        <div class="programmes-hero__holder">
            <div class="programmes-hero__content">
                <div class="programmes-hero__content--titles">
                    <?php
                    if ($categories && !is_wp_error($categories)) {
                        foreach ($categories as $category) {
                            echo '<span class="programme-category">' . esc_html($category->name) . '</span>';
                        }
                    }
                    ?>
                    <?php if ($title): ?>
                        <h1><?php echo esc_html($title); ?></h1>
                    <?php endif; ?>

                    <?php if ($subtitle): ?>
                        <p class="body-regular-one"><?php echo esc_html($subtitle); ?></p>
                    <?php endif; ?>
                </div>
                <?php if ($benefits): ?>
                    <ul class="programmes-hero__benefits">
                        <?php foreach ($benefits as $item):
                            $icon = $item['benefits_icon'];
                            $icon_url = $icon ? wp_get_attachment_image_url($icon, 'thumbnail') : '';
                            ?>
                            <li class="programmes-hero__benefits--item">
                                <?php if ($icon_url): ?>
                                    <img src="<?php echo esc_url($icon_url); ?>" alt="" class="benefit-icon">
                                <?php endif; ?>
                                <strong><?php echo esc_html($item['benefit_title']); ?></strong>
                                <span class="body-regular-one"><?php echo esc_html($item['benefit_text']); ?></span>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?>

                <?php if ($button): ?>
                    <div class="theme-buttons">
                        <a href="<?php echo esc_url($button['url']); ?>" class="theme-buttons__green">
                            <?php echo esc_html($button['title']); ?>
                        </a>
                    </div>
                <?php endif; ?>
            </div>

            <div class="programmes-hero__image-wrapper">
                <?php if ($image_url): ?>
                    <div class="programmes-hero__image"
                        style="background-image: url('<?php echo esc_url($image_url); ?>');">
                        <?php if ($video_url): ?>
                            <a href="<?php echo esc_url($video_url); ?>" data-lity class="play-button">
                                <img src="/wp-content/uploads/2025/04/Group-6258.svg" alt="Play Video">
                            </a>
                        <?php endif; ?>
                        <span class="programmes-hero__image--label body-bold-one-120">
                            <?php echo esc_html($labelHero); ?>
                        </span>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <?php if ($bg_image_url): ?>
        <img src="<?php echo esc_url($bg_image_url); ?>" alt="" class="background-element-fourth">
    <?php endif; ?>
</section>