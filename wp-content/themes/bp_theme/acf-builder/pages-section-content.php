<?php

use StoutLogic\AcfBuilder\FieldsBuilder;

if (function_exists('acf_register_block_type')) {
    add_action('acf/init', function () {
        acf_register_block_type([
            'name' => 'pages-section-content',
            'title' => __('Default Layout'),
            'render_callback' => 'render_pages_section_content',
            'category' => 'bp-theme-blocks',
            'icon' => 'block-default',
            'mode' => 'auto',
        ]);

        $PageFields = new FieldsBuilder('pages_section_content');

        $PageFields
            ->addWysiwyg('default_description', [
                'label' => 'Page content',
                'wrapper' => ['width' => '100'],
            ])
            ->setLocation('block', '==', 'acf/pages-section-content');

        acf_add_local_field_group($PageFields->build());
    });
}

function render_pages_section_content($block)
{
    include get_template_directory() . '/template-parts/pages-section-content.php';
}
