<?php
$display_offer = get_field('display_offer_section', 'option');
$offer_text = get_field('offer_text', 'option');
$button_name = get_field('offer_button_name', 'option');
$action_type = get_field('offer_button_action_type', 'option');
$modal_target = get_field('offer_modal_target', 'option');
$button_url = get_field('offer_button_url', 'option');
?>

<?php if ($display_offer && $offer_text && $button_name): ?>
    <section class="offer-banner">
        <div class="offer-banner__holder body-regular-two">
            <p>
                <?php echo esc_html($offer_text); ?>
            </p>

            <?php if ($action_type === 'modal' && $modal_target): ?>
                <a class="open-modal-button <?php echo esc_attr($modal_target); ?>">
                    <?php echo esc_html($button_name); ?>
                </a>
            <?php elseif ($action_type === 'url' && $button_url): ?>
                <a href="<?php echo esc_url($button_url); ?>" class="offer-button">
                    <?php echo esc_html($button_name); ?>
                </a>
            <?php endif; ?>
        </div>
    </section>
<?php endif; ?>