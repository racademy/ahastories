<?php

use StoutLogic\AcfBuilder\FieldsBuilder;

if (function_exists('acf_register_block_type')) {
    add_action('acf/init', function () {
        acf_register_block_type([
            'name' => 'programmes-section-hero',
            'title' => __('Programmes Section Hero'),
            'render_callback' => 'render_programmes_section_hero',
            'category' => 'bp-theme-blocks',
            'icon' => 'block-default',
            'post_types' => ['programmes'],
            'mode' => 'auto'
        ]);

        $ProgrammeSection = new FieldsBuilder('programmes_section_hero');

        $ProgrammeSection
            ->addText('programmes_section_title', [
                'label' => 'Title',
                'wrapper' => ['width' => '50'],
            ])
            ->addText('programmes_section_subtitle', [
                'label' => 'Description',
                'wrapper' => ['width' => '50'],
            ])
            ->addImage('programmes_image', [
                'label' => 'Image on video',
                'wrapper' => [
                    'width' => '50',
                ],
                'return_format' => 'id',
            ])
            ->addFile('programmes_video', [
                'label' => 'Programmes Video',
                'wrapper' => [
                    'width' => '50',
                ],
                'return_format' => 'array',
                'library' => 'all',
            ])
            ->addText('programmes_label', [
                'label' => 'Label on hero image pictures',
                'wrapper' => ['width' => '100%'],
            ])
            ->addRepeater('programmes_benefits', [
                'label' => 'Programme summary',
                'button_label' => 'Add',
            ])
            ->addImage('benefits_icon', [
                'label' => 'Icon',
                'return_format' => 'id',
            ])
            ->addText('benefit_title', [
                'label' => 'Title',
            ])
            ->addText('benefit_text', [
                'label' => 'Description',
            ])
            ->endRepeater()

            ->addLink('benefit_try_button', [
                'label' => 'Try Button',
            ])
            ->addImage('bg_image_fourth', [
                'label' => 'Bg element parallax fourth',
                'return_format' => 'id',
            ])
            ->setLocation('block', '==', 'acf/programmes-section-hero');

        acf_add_local_field_group($ProgrammeSection->build());
    });
}

// Block render callback
function render_programmes_section_hero($block)
{
    include get_template_directory() . '/template-parts/programmes-section-hero.php';
}
