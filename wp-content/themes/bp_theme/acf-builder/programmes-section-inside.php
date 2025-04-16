<?php

use StoutLogic\AcfBuilder\FieldsBuilder;

if (function_exists('acf_register_block_type')) {
    add_action('acf/init', function () {
        acf_register_block_type([
            'name' => 'programmes-section-inside',
            'title' => __('Programmes Section Inside Lessons'),
            'render_callback' => 'render_programmes_section_inside',
            'category' => 'bp-theme-blocks',
            'icon' => 'block-default',
            'post_types' => ['programmes'],
            'mode' => 'auto'
        ]);

        $PageFields = new FieldsBuilder('programmes_section_inside');

        $PageFields
            ->addText('inside_section_subtitle', [
                'label' => 'Semi title',
                'wrapper' => ['width' => '50'],
            ])
            ->addText('inside_section_title', [
                'label' => 'Title',
                'wrapper' => ['width' => '50'],
            ])
            ->addRepeater('inside_section_repeater', [
                'label' => 'What you will find inside lessons',
                'button_label' => 'Add info',
            ])
            ->addImage('why_icon', [
                'label' => 'Icon',
                'return_format' => 'id',
            ])
            ->addText('why_title', [
                'label' => 'Title',
            ])
            ->addText('why_description', [
                'label' => 'Description',
            ])
            ->endRepeater()
            ->setLocation('block', '==', 'acf/programmes-section-inside');

        acf_add_local_field_group($PageFields->build());
    });
}

function render_programmes_section_inside($block)
{
    include get_template_directory() . '/template-parts/programmes-section-inside.php';
}
