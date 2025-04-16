<?php
$pretitle = get_field('inside_section_subtitle');
$title = get_field('inside_section_title');
$items = get_field('inside_section_repeater');
?>

<section class="programmes-inside section">
    <div class="container">
        <div class="programmes-inside__holder--titles">
            <?php if ($pretitle): ?>
                <p class="caption-regular-caps"><?php echo esc_html($pretitle); ?></p>
            <?php endif; ?>

            <?php if ($title): ?>
                <h2><?php echo esc_html($title); ?></h2>
            <?php endif; ?>
        </div>

        <?php if ($items): ?>
            <div class="programmes-inside__grid">
                <?php foreach ($items as $item):
                    $icon_id = $item['why_icon'];
                    $icon_url = $icon_id ? wp_get_attachment_image_url($icon_id, 'medium') : '';
                    $item_title = $item['why_title'];
                    $item_desc = $item['why_description'];
                    ?>
                    <div class="programmes-inside__card">
                        <?php if ($icon_url): ?>
                            <div class="programmes-inside__icon">
                                <img src="<?php echo esc_url($icon_url); ?>" alt="">
                            </div>
                        <?php endif; ?>

                        <?php if ($item_title): ?>
                            <span class="title-two"><?php echo esc_html($item_title); ?></span>
                        <?php endif; ?>

                        <?php if ($item_desc): ?>
                            <p class="body-regular-one"><?php echo esc_html($item_desc); ?></p>
                        <?php endif; ?>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</section>