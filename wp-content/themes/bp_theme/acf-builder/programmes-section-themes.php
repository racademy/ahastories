<?php

use StoutLogic\AcfBuilder\FieldsBuilder;

if (function_exists('acf_register_block_type')) {
    add_action('acf/init', function () {
        acf_register_block_type([
            'name' => 'programmes-section-themes',
            'title' => __('Programmes Section Themes'),
            'render_callback' => 'render_programmes_section_themes',
            'category' => 'bp-theme-blocks',
            'icon' => 'block-default',
            'post_types' => ['programmes'],
            'mode' => 'auto'
        ]);

        $PageFields = new FieldsBuilder('programmes_section_themes');

        $PageFields
            ->addText('theme_section_pretitle', [
                'label' => 'Pre Title',
                'wrapper' => ['width' => '50'],
            ])
            ->addText('theme_section_title', [
                'label' => 'Title',
                'wrapper' => ['width' => '50'],
            ])
            ->addRepeater('theme_rep', [
                'label' => 'Theme Section',
                'button_label' => 'Add theme',
            ])
            ->addText('question', [
                'label' => 'Question',
                'wrapper' => ['width' => '33'],

            ])
            ->addText('benefit_sub_title', [
                'label' => 'Themes number',
                'wrapper' => ['width' => '33'],
            ])
            ->addTextarea('answer', [
                'label' => 'Answer',
                'wrapper' => ['width' => '33'],
            ])
            ->endRepeater()
            ->addLink('theme_try_button', [
                'label' => 'Try Button',
            ])
            ->setLocation('block', '==', 'acf/programmes-section-themes');

        acf_add_local_field_group($PageFields->build());
    });
}

function render_programmes_section_themes($block)
{
    include get_template_directory() . '/template-parts/programmes-section-themes.php';
}
