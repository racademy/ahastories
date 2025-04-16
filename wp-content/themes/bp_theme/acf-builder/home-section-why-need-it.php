<?php

use StoutLogic\AcfBuilder\FieldsBuilder;

if (function_exists('acf_register_block_type')) {
    add_action('acf/init', function () {
        acf_register_block_type([
            'name' => 'home-section-why-need-it',
            'title' => __('Home section why need video lessons ?'),
            'render_callback' => 'render_home_section_why_need_it',
            'category' => 'bp-theme-blocks',
            'icon' => 'block-default',
            'mode' => 'auto'
        ]);

        $PageFields = new FieldsBuilder('home_section_why_need_it');

        $PageFields
            ->addText('why_section_subtitle', [
                'label' => 'Semi title',
                'wrapper' => ['width' => '50'],
            ])
            ->addText('why_section_title', [
                'label' => 'Title',
                'wrapper' => ['width' => '50'],
            ])
            ->addRepeater('why_section_repeater', [
                'label' => '',
                'button_label' => 'Add reasons',
            ])
            ->addImage('why_icon', [
                'label' => 'Reason Icon',
                'return_format' => 'id',
            ])
            ->addText('why_title', [
                'label' => 'Reason title',
            ])
            ->endRepeater()
            ->addImage('bg_image_three', [
                'label' => 'Bg element parallax three',
                'return_format' => 'id',
            ])
            ->setLocation('block', '==', 'acf/home-section-why-need-it');

        acf_add_local_field_group($PageFields->build());
    });
}

function render_home_section_why_need_it($block)
{
    include get_template_directory() . '/template-parts/home-section-why-need-it.php';
}
