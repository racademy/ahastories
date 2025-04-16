<?php
$hero_subtitle = get_field('hero_section_subtitle');
$hero_title = get_field('hero_section_title');
$benefits = get_field('benefits_section_repeater');
$footer_cta_btn1 = get_field('footer_cta_btn1');
$footer_cta_btn2 = get_field('footer_cta_btn2');
?>

<div class="hero">
    <div class="container">
        <div class="hero__holder">
            <div class="hero__left">
                <?php if ($hero_subtitle): ?>
                    <span class="hero__subtitle caption-bold-caps"><?php echo esc_html($hero_subtitle); ?></span>
                <?php endif; ?>

                <?php if ($hero_title): ?>
                    <h1 class="hero__title"><?php echo $hero_title; ?></h1>
                <?php endif; ?>

                <div class="hero__benefits">
                    <?php if ($benefits): ?>
                        <ul class="hero__benefits-list">
                            <?php foreach ($benefits as $benefit): ?>
                                <li class="hero__benefit-item">
                                    <?php if ($benefit['benefit_icon']): ?>
                                        <img src="<?php echo esc_url(wp_get_attachment_url($benefit['benefit_icon'])); ?>"
                                            alt="Benefit Icon" class="hero__benefit-icon">
                                    <?php endif; ?>
                                    <?php if ($benefit['benefit_title']): ?>
                                        <p class="hero__benefit-title body-regular-one ">
                                            <?php echo esc_html($benefit['benefit_title']); ?>
                                        </p>
                                    <?php endif; ?>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    <?php endif; ?>
                </div>

                <div class="theme-buttons">
                    <?php if ($footer_cta_btn1):
                        $link1_url = $footer_cta_btn1['url'];
                        $link1_title = $footer_cta_btn1['title']; ?>
                        <a href="<?php echo esc_url($link1_url); ?>" class="theme-buttons__green">
                            <?php echo esc_html($link1_title); ?>
                        </a>
                    <?php endif; ?>

                    <?php if ($footer_cta_btn2):
                        $link2_url = $footer_cta_btn2['url'];
                        $link2_title = $footer_cta_btn2['title']; ?>
                        <a href="<?php echo esc_url($link2_url); ?>" class="theme-buttons__transparent">
                            <?php echo esc_html($link2_title); ?>
                        </a>
                    <?php endif; ?>
                </div>
            </div>

            <div class="hero__right">
                <div class="hero__gallery-sliders">
                    <?php
                    $images = get_field('gallery_field');

                    if (is_array($images) && !empty($images)) {
                        $half_images = ceil(count($images) / 2);
                        $first_half_images = array_slice($images, 0, $half_images);
                        $second_half_images = array_slice($images, $half_images);
                    } else {
                        echo 'No images found for the slider.';
                    }
                    ?>

                    <div class="hero__sliders">
                        <div class="hero__slider1 splide">
                            <div class="splide__track">
                                <ul class="splide__list">
                                    <?php
                                    if (isset($first_half_images)) {
                                        foreach ($first_half_images as $image): ?>
                                            <li class="splide__slide">
                                                <img src="<?php echo esc_url($image['sizes']['large']); ?>"
                                                    alt="<?php echo esc_attr($image['alt']); ?>" class="hero__slider-image">
                                            </li>
                                        <?php endforeach;
                                    }
                                    ?>
                                </ul>
                            </div>
                        </div>

                        <div class="hero__slider2 splide">
                            <div class="splide__track">
                                <ul class="splide__list">
                                    <?php
                                    if (isset($second_half_images)) {
                                        foreach ($second_half_images as $image): ?>
                                            <li class="splide__slide">
                                                <img src="<?php echo esc_url($image['sizes']['large']); ?>"
                                                    alt="<?php echo esc_attr($image['alt']); ?>" class="hero__slider-image">
                                            </li>
                                        <?php endforeach;
                                    }
                                    ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>