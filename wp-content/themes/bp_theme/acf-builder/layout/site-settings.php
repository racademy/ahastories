<?php

use StoutLogic\AcfBuilder\FieldsBuilder;

$optionsPage = new FieldsBuilder('options_page');

if (function_exists('acf_add_options_page')) {
    acf_add_options_page([
        'page_title' => 'Site settings',
        'menu_title' => 'Site settings',
        'menu_slug' => 'acf-options',
        'capability' => 'edit_posts',
        'redirect' => false
    ]);
}

add_action('acf/init', function () use ($optionsPage) {
    acf_add_local_field_group($optionsPage->build());
});

$optionsPage
    ->addAccordion('footer', [
        'label' => 'Footer',
        'open' => 0,
    ])
    ->addImage('footer_img', [
        'label' => 'Kuriame Lietuvos Ateitį (Logotipas)',
        'return_format' => 'id',
        'wrapper' => ['width' => '100'],
    ])
    ->addAccordion('footer_cta', [
        'label' => 'Footer CTA',
    ])
    ->addImage('footer_cta_bg', [
        'label' => 'CTA background',
        'return_format' => 'id',
        'wrapper' => ['width' => '100'],
    ])
    ->addText('footer_cta_title', [
        'label' => 'Title',
        'wrapper' => ['width' => '50'],
    ])
    ->addWysiwyg('footer_cta_description', [
        'label' => 'Description',
        'wrapper' => ['width' => '50'],
    ])
    ->addLink('footer_cta_btn', [
        'label' => 'Try Button',
        'wrapper' => ['width' => '50'],
    ])
    ->addAccordion('modal', [
        'label' => 'Modal Contact Us CF7 selection',
        'open' => 0,
    ])
    ->addSelect('contact_form_shortcode', [
        'label' => 'Select Contact Form',
        'choices' => get_contact_form_7_forms(),
        'allow_null' => 1,
        'wrapper' => ['width' => '100'],
    ])
    ->addText('modal_message', [
        'label' => 'Modal success message',
        'wrapper' => ['width' => '50'],
    ])
    ->addText('modal_button_title', [
        'label' => 'Modal button name',
        'wrapper' => ['width' => '50'],
    ])
    ->addAccordion('offer_block', [
        'label' => 'Offer on top of the page',
        'open' => 1,
    ])
    ->addTrueFalse('display_offer_section', [
        'label' => 'Display Offer Section',
        'message' => 'Enable Offer Section',
        'default_value' => 1,
        'ui' => 1,
    ])
    ->addText('offer_text', [
        'label' => 'Offer text',
        'wrapper' => ['width' => '50'],
        'conditional_logic' => [
            [['field' => 'display_offer_section', 'operator' => '==', 'value' => '1']],
        ],
    ])
    ->addText('offer_button_name', [
        'label' => 'Button name',
        'wrapper' => ['width' => '50'],
        'conditional_logic' => [
            [['field' => 'display_offer_section', 'operator' => '==', 'value' => '1']],
        ],
    ])
    ->addSelect('offer_button_action_type', [
        'label' => 'Button action type',
        'choices' => [
            'modal' => 'Open modal',
            'url' => 'Go to URL',
        ],
        'default_value' => 'modal',
        'wrapper' => ['width' => '50'],
        'conditional_logic' => [
            [['field' => 'display_offer_section', 'operator' => '==', 'value' => '1']],
        ],
    ])
    ->addSelect('offer_modal_target', [
        'label' => 'Select modal to open',
        'choices' => [
            'open-modal' => 'Susisiekti su mumis'
        ],
        'wrapper' => ['width' => '50'],
        'conditional_logic' => [
            [['field' => 'offer_button_action_type', 'operator' => '==', 'value' => 'modal']],
        ],
    ])
    ->addText('offer_button_url', [
        'label' => 'Link URL',
        'wrapper' => ['width' => '50'],
        'conditional_logic' => [
            [['field' => 'offer_button_action_type', 'operator' => '==', 'value' => 'url']],
        ],
    ])
    ->setLocation('options_page', '==', 'acf-options');

function get_contact_form_7_forms()
{
    $forms = get_posts(['post_type' => 'wpcf7_contact_form', 'numberposts' => -1]);
    $form_choices = [];
    if ($forms) {
        foreach ($forms as $form) {
            $form_choices[$form->ID] = $form->post_title;
        }
    }
    return $form_choices;
}