<?php
$contact_form_id = get_field('contact_form_shortcode', 'options');
?>

<div id="open-modal" style="display: none;">
    <div class="modal-content">
        <span id="close-modal" class="close-button">&times;</span>
        <?php echo do_shortcode('[contact-form-7 title="' . esc_attr($contact_form_id) . '"]'); ?>

        <div id="modal-success-message" style="display: none; text-align: center; padding: 40px 20px;">
            <div class="modal-success">
                <div class="completed">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M9.5501 18.0001L3.8501 12.3001L5.2751 10.8751L9.5501 15.1501L18.7251 5.9751L20.1501 7.4001L9.5501 18.0001Z"
                            fill="black" />
                    </svg>
                    <p class="title-two"><?php echo get_field('modal_message', 'options') ?></p>
                </div>
                <div class="theme-buttons">
                    <button class="modal-close theme-buttons__transparent">
                        <?php echo get_field('modal_button_title', 'options') ?>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>