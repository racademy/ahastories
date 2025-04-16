<?php

use StoutLogic\AcfBuilder\FieldsBuilder;

if (function_exists('acf_register_block_type')) {
    add_action('acf/init', function () {
        acf_register_block_type([
            'name' => 'programmes-section-other',
            'title' => __('Section other programmes', 'bp_theme'),
            'render_callback' => 'render_programmes_section_other',
            'category' => 'bp-theme-blocks',
            'icon' => 'block-default',
            'post_types' => ['programmes'],
            'mode' => 'auto'
        ]);

        $PageProgrammesFields = new FieldsBuilder('programmes_section_other');

        $PageProgrammesFields
            ->addText('home_page_programmes_section_pretitle', [
                'label' => 'Pre title',
                'wrapper' => ['width' => '50'],
            ])
            ->addText('home_page_programmes_section_title', [
                'label' => 'Title',
                'wrapper' => ['width' => '50'],
            ])

            ->addRelationship('selected_programmes', [
                'label' => 'Select Programmes',
                'post_type' => ['programmes'],
                'filters' => ['search'],
                'min' => 1,
                'max' => 2,
                'return_format' => 'object',
            ])
            ->setLocation('block', '==', 'acf/programmes-section-other');

        acf_add_local_field_group($PageProgrammesFields->build());
    });
}

function render_programmes_section_other($block)
{
    include get_template_directory() . '/template-parts/programmes-section-other.php';
}
