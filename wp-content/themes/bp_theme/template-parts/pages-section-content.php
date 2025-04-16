<?php
$contentField = get_field('default_description');
?>
<section class="default-hero">
    <div class="container">
        <div class="default-hero__holder">
            <h1 class="default-hero__title">
                <?php
                $words = explode(' ', get_the_title());
                foreach ($words as $word) {
                    echo '<span class="default-hero__word">' . esc_html($word) . '</span><br>';
                }
                ?>
            </h1>
        </div>
    </div>
</section>

<section class="default-template">
    <div class="container">
        <div class="default-template__holder">
            <?php if ($contentField): ?>
                <?php echo wp_kses_post($contentField); ?>
            <?php endif; ?>
        </div>
    </div>
</section>