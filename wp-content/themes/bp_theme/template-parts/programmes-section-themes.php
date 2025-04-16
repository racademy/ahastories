<?php
$pretitle = get_field('theme_section_pretitle');
$title = get_field('theme_section_title');
$themes = get_field('theme_rep');
$button = get_field('theme_try_button');
?>

<?php if ($themes): ?>
    <section class="programmes-section-themes">
        <div class="container">
            <div class="programmes-section-themes__header">
                <?php if ($pretitle): ?>
                    <p class="caption-regular-caps"><?php echo esc_html($pretitle); ?></p>
                <?php endif; ?>
                <?php if ($title): ?>
                    <h2><?php echo esc_html($title); ?></h2>
                <?php endif; ?>
            </div>

            <div class="programmes-section-themes__grid">
                <?php foreach ($themes as $index => $item): ?>
                    <?php
                    $question = $item['question'];
                    $number = $item['benefit_sub_title'];
                    $answer = $item['answer'];
                    ?>
                    <div class="theme-item" data-index="<?php echo $index; ?>">
                        <div class="theme-item__head">
                            <div class="theme-item__left">
                                <p class="title_two"><?php echo esc_html($question); ?></p>
                                <p class="theme-item__number"><?php echo esc_html($number); ?></p>
                            </div>
                            <button class="theme-item__toggle" aria-expanded="false">
                                <span class="plus-icon">+</span>
                                <span class="minus-icon">−</span>
                            </button>
                        </div>
                        <div class="theme-item__answer">
                            <p><?php echo esc_html($answer); ?></p>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>

            <?php if ($button): ?>
                <div class="theme-buttons">
                    <a class="theme-buttons__green open-modal" style="cursor:pointer;">
                        <?php echo esc_html($button['title']); ?>
                    </a>
                    <!-- <a class="theme-buttons__green" href="<?php echo esc_url($button['url']); ?>">
                        <?php echo esc_html($button['title']); ?>
                    </a> -->
                </div>
            <?php endif; ?>
        </div>
    </section>
<?php endif; ?>