<?php
$slides = get_field('sider_rep');
$labelSlides = get_field('slider_label');

if ($slides):
    ?>

    <section class="programmes-slider-section">
        <div class="splide" id="programmes-splide-slider" aria-label="Programmes Slides">
            <div class="splide__track">
                <ul class="splide__list">
                    <?php foreach ($slides as $slide):
                        $img_url = wp_get_attachment_image_url($slide['slider_moments'], 'full');
                        ?>
                        <li class="splide__slide">
                            <div class="slider-image-wrapper">
                                <span
                                    class="slider-image-wrapper__label body-regular-three"><?php echo esc_html($labelSlides); ?></span>
                                <img src="<?php echo esc_url($img_url); ?>" alt="Slide image" />
                            </div>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </section>
<?php endif; ?>