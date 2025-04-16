<?php

use StoutLogic\AcfBuilder\FieldsBuilder;

if (function_exists('acf_register_block_type')) {
    add_action('acf/init', function () {
        acf_register_block_type([
            'name' => 'home-section-stats',
            'title' => __('Section Statistics'),
            'render_callback' => 'render_home_section_stats',
            'category' => 'bp-theme-blocks',
            'icon' => 'block-default',
            'mode' => 'auto'
        ]);

        $PageStatsFields = new FieldsBuilder('home_section_stats');

        $PageStatsFields
            ->addRepeater('section_stats', [
                'label' => 'Stats',
                'button_label' => 'Add Stat',
            ])
            ->addText('section_stats_title', [
                'label' => 'Title',
                'wrapper' => ['width' => '50'],
            ])
            ->addTextarea('section-stats-description', [
                'label' => 'Description',
                'wrapper' => ['width' => '50'],
            ])
            ->endRepeater()
            ->setLocation('block', '==', 'acf/home-section-stats');

        acf_add_local_field_group($PageStatsFields->build());
    });
}

function render_home_section_stats($block)
{
    include get_template_directory() . '/template-parts/home-section-stats.php';
}
