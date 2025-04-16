<?php

use StoutLogic\AcfBuilder\FieldsBuilder;

if (function_exists('acf_register_block_type')) {
	add_action('acf/init', function () {
		acf_register_block_type([
			'name' => 'home-section-hero',
			'title' => __('Hero Section Home Page'),
			'render_callback' => 'render_home_section_hero',
			'category' => 'bp-theme-blocks',
			'icon' => 'block-default',
			'mode' => 'auto'
		]);

		$PageFields = new FieldsBuilder('home_section_hero');

		$PageFields
			->addText('hero_section_subtitle', [
				'label' => 'Semi title',
				'wrapper' => ['width' => '50'],
			])
			->addWysiwyg('hero_section_title', [
				'label' => 'Title',
				'wrapper' => ['width' => '50'],
			])
			->addRepeater('benefits_section_repeater', [
				'label' => 'Benefits',
				'button_label' => 'Add benefit',
			])
			->addImage('benefit_icon', [
				'label' => 'Icon',
				'return_format' => 'id',
			])
			->addText('benefit_title', [
				'label' => 'Text near icon',
			])
			->endRepeater()
			->addLink('footer_cta_btn1', [
				'label' => 'Try Button',
				'wrapper' => ['width' => '50'],
			])
			->addLink('footer_cta_btn2', [
				'label' => 'Try Test Demo',
				'wrapper' => ['width' => '50'],
			])
			->addGallery('gallery_field', [
				'label' => 'Gallery Field',
				'wrapper' => ['width' => '100'],
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => [],
				'return_format' => 'array',
				'min' => '',
				'max' => '',
				'insert' => 'append',
				'library' => 'all',
				'min_width' => '',
				'min_height' => '',
				'min_size' => '',
				'max_width' => '',
				'max_height' => '',
				'max_size' => '',
				'mime_types' => '',
			])
			->setLocation('block', '==', 'acf/home-section-hero');

		acf_add_local_field_group($PageFields->build());
	});
}

function render_home_section_hero($block)
{
	include get_template_directory() . '/template-parts/home-section-hero.php';
}
