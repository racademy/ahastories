<?php

use StoutLogic\AcfBuilder\FieldsBuilder;

if (function_exists('acf_register_block_type')) {
    add_action('acf/init', function () {
        acf_register_block_type([
            'name' => 'home-section-want-to-try',
            'title' => __('Home Section Want To Try'),
            'render_callback' => 'render_home_section_want_to_try',
            'category' => 'bp-theme-blocks',
            'icon' => 'block-default',
            'mode' => 'auto'
        ]);

        $PageWantToTryFields = new FieldsBuilder('home_section_want_to_try');

        $PageWantToTryFields
            ->addColorPicker('want_to_try_cta_bg', [
                'label' => 'Background color',
                'required' => 0,
                'conditional_logic' => [],
                'enable_opacity' => 0,
                'return_format' => 'string',
                'wrapper' => [
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ],
                'default_value' => '',
            ])
            ->addText('want_to_try_cta_title', [
                'label' => 'Title',
                'wrapper' => ['width' => '50'],
            ])
            ->addWysiwyg('want_to_try_cta_description', [
                'label' => 'Description',
                'wrapper' => ['width' => '50'],
                'delay' => 1,
            ])
            ->addLink('try_button', [
                'label' => 'Try Button',
                'wrapper' => ['width' => '100'],
            ])
            ->setLocation('block', '==', 'acf/home-section-want-to-try');

        acf_add_local_field_group($PageWantToTryFields->build());
    });
}

function render_home_section_want_to_try($block)
{
    include get_template_directory() . '/template-parts/home-section-want-to-try.php';
}
