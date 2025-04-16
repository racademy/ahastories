<?php

use StoutLogic\AcfBuilder\FieldsBuilder;

if (function_exists('acf_register_block_type')) {
    add_action('acf/init', function () {
        acf_register_block_type([
            'name' => 'programmes-section-slider',
            'title' => __('Programmes Section Slider'),
            'render_callback' => 'render_programmes_section_slider',
            'category' => 'bp-theme-blocks',
            'icon' => 'block-default',
            'post_types' => ['programmes'],
            'mode' => 'auto'
        ]);

        $PageFields = new FieldsBuilder('programmes_section_slider');

        $PageFields
            ->addRepeater('sider_rep', [
                'label' => 'Slider Section',
                'button_label' => 'Add slide',
            ])
            ->addImage('slider_moments', [
                'label' => 'Moements from lessons',
                'return_format' => 'id',
            ])
            ->endRepeater()
            ->addText('slider_label', [
                'label' => 'Label on slider pictures',
                'wrapper' => ['width' => '50%'],
            ])
            ->setLocation('block', '==', 'acf/programmes-section-slider');

        acf_add_local_field_group($PageFields->build());
    });
}

function render_programmes_section_slider($block)
{
    include get_template_directory() . '/template-parts/programmes-section-slider.php';
}
