<?php

use StoutLogic\AcfBuilder\FieldsBuilder;

if (function_exists('acf_register_block_type')) {
    add_action('acf/init', function () {
        acf_register_block_type([
            'name' => 'home-section-testimonials',
            'title' => __('Home Section Testimonials'),
            'render_callback' => 'render_home_section_testimonials',
            'category' => 'bp-theme-blocks',
            'icon' => 'block-default',
            'mode' => 'auto'
        ]);

        $PageTestimonialsFields = new FieldsBuilder('home_section_testimonials');

        $PageTestimonialsFields
            ->addText('home_page_testimonials_section_pretitle', [
                'label' => 'Pre title',
                'wrapper' => [
                    'width' => '50',
                ]
            ])
            ->addText('home_page_testimonials_section_title', [
                'label' => 'Title',
                'wrapper' => [
                    'width' => '50',
                ]
            ])
            ->addRepeater('testimonial_section_repeater', [
                'label' => 'Testimonials',
                'button_label' => 'Add testimonial',
            ])
            ->addWysiwyg('testimonial_text', [
                'label' => 'Testimonial',
                'wrapper' => [
                    'width' => '50',
                ]
            ])
            ->addText('author_name', [
                'label' => 'Author',
                'wrapper' => [
                    'width' => '50',
                ]
            ])
            ->endRepeater()
            ->addImage('bg_image_one', [
                'label' => 'Bg element parallax one',
                'return_format' => 'id',
            ])
            ->addImage('bg_image_two', [
                'label' => 'Bg element parallax two',
                'return_format' => 'id',
            ])
            ->setLocation('block', '==', 'acf/home-section-testimonials');

        acf_add_local_field_group($PageTestimonialsFields->build());
    });
}

function render_home_section_testimonials($block)
{
    include get_template_directory() . '/template-parts/home-section-testimonials.php';
}
