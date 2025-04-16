<?php

use StoutLogic\AcfBuilder\FieldsBuilder;

if (function_exists('acf_register_block_type')) {
    add_action('acf/init', function () {
        acf_register_block_type([
            'name' => 'home-section-about-us',
            'title' => __('Home Section About Us'),
            'render_callback' => 'render_home_section_about_us',
            'category' => 'bp-theme-blocks',
            'icon' => 'block-default',
            'mode' => 'auto'
        ]);

        $PageAboutUsFields = new FieldsBuilder('home_section_about_us');

        $PageAboutUsFields
            ->addText('about_us_section_subtitle', [
                'label' => 'Subtitle',
                'wrapper' => ['width' => '50'],
            ])
            ->addText('about_us_section_title', [
                'label' => 'Title',
                'wrapper' => ['width' => '50'],
            ])
            ->addTextarea('about_us_section_description', [
                'label' => 'Description',
                'wrapper' => ['width' => '50'],
            ])
            ->addLink('try_button', [
                'label' => 'Try Button',
                'wrapper' => ['width' => '50'],
            ])
            ->addImage('about_us_section_image_left', [
                'label' => 'Image',
                'return_format' => 'id',
                'wrapper' => ['width' => '100'],
            ])
            ->setLocation('block', '==', 'acf/home-section-about-us');

        acf_add_local_field_group($PageAboutUsFields->build());
    });
}

function render_home_section_about_us($block)
{
    include get_template_directory() . '/template-parts/home-section-about-us.php';
}
