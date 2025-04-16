<?php
$pretitle = get_field('home_page_testimonials_section_pretitle');
$title = get_field('home_page_testimonials_section_title');
$testimonials = get_field('testimonial_section_repeater');
$bg_image_one_id = get_field('bg_image_one');
$bg_image_two_id = get_field('bg_image_two');

$bg_image_one_url = $bg_image_one_id ? wp_get_attachment_image_url($bg_image_one_id, 'full') : '';
$bg_image_two_url = $bg_image_two_id ? wp_get_attachment_image_url($bg_image_two_id, 'full') : '';

if ($pretitle || $title || $testimonials):
    ?>
    <section class="home-section-testimonials" id="atsiliepimai">
        <div class="container">
            <div class="home-section-testimonials__holder">
                <div class="home-section-testimonials__holder--titles">
                    <?php if ($bg_image_one_url): ?>
                        <img src="<?php echo esc_url($bg_image_one_url); ?>" alt="" class="background-element-one"
                            class="background-element-one">
                    <?php endif; ?>

                    <?php if ($pretitle): ?>
                        <p class="caption-regular-caps"><?php echo esc_html($pretitle); ?></p>
                    <?php endif; ?>

                    <?php if ($title): ?>
                        <h2><?php echo esc_html($title); ?></h2>
                    <?php endif; ?>
                </div>
                <?php if ($testimonials): ?>
                    <div class="testimonials-slider splide" aria-label="Testimonials Slider">
                        <div class="splide__track">
                            <ul class="splide__list">
                                <?php foreach ($testimonials as $testimonial):
                                    $text = $testimonial['testimonial_text'];
                                    $author = $testimonial['author_name'];
                                    ?>
                                    <li class="splide__slide testimonial-slide">
                                        <div class="body-regular-one">
                                            <?php echo wp_kses_post($text); ?>
                                        </div>
                                        <?php if ($author): ?>
                                            <p class="body-regular-two"><?php echo esc_html($author); ?></p>
                                        <?php endif; ?>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
        <?php if ($bg_image_two_url): ?>
            <img src="<?php echo esc_url($bg_image_two_url); ?>" alt="Background circles figures"
                class="background-element-two">
        <?php endif; ?>
    </section>
<?php endif; ?>