<?php


/*acf builder*/
require_once __DIR__ . '/vendor/autoload.php';

// Define the main ACF Builder path
$acf_builder_path = get_stylesheet_directory() . '/acf-builder/';

// Function to recursively get all PHP files in a directory and its subdirectories
function get_php_files($directory)
{
	$files = [];
	foreach (glob($directory . '*.php') as $file) {
		$files[] = $file;
	}
	foreach (glob($directory . '*/', GLOB_ONLYDIR) as $sub_dir) {
		$files = array_merge($files, get_php_files($sub_dir));
	}

	return $files;
}

// Get all PHP files in the main ACF Builder directory and its subdirectories
$all_files = get_php_files($acf_builder_path);

// Include each file
foreach ($all_files as $file) {
	include_once $file;
}
/*acf builder*/

include('settings/js-css.php');
include('settings/settings.php');
include('settings/woocommerce.php');
include('settings/cpt.php');
include('settings/duplicate-page.php');
include('settings/navwalker.php');