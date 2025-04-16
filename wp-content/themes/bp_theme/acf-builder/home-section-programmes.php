<?php

use StoutLogic\AcfBuilder\FieldsBuilder;

if (function_exists('acf_register_block_type')) {
    add_action('acf/init', function () {
        acf_register_block_type([
            'name' => 'home-section-programmes',
            'title' => __('Home Section Programmes', 'bp_theme'),
            'render_callback' => 'render_home_section_programmes',
            'category' => 'bp-theme-blocks',
            'icon' => 'block-default',
            'mode' => 'auto'
        ]);

        $PageProgrammesFields = new FieldsBuilder('home_section_programmes');

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
            ->setLocation('block', '==', 'acf/home-section-programmes');

        acf_add_local_field_group($PageProgrammesFields->build());
    });
}

function render_home_section_programmes($block)
{
    include get_template_directory() . '/template-parts/home-section-programmes.php';
}
