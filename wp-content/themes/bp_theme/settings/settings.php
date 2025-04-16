<?php
//Disable Emoji Script:
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');

//Remove Unnecessary Header Tags:
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'start_post_rel_link');
remove_action('wp_head', 'index_rel_link');
remove_action('wp_head', 'adjacent_posts_rel_link');
remove_action('wp_head', 'wp_shortlink_wp_head');
remove_action('wp_head', 'feed_links', 2);
remove_action('wp_head', 'feed_links_extra', 3);

//Remove jQuery Migrate:
function remove_jquery_migrate($scripts)
{
    if (!is_admin() && isset($scripts->registered['jquery'])) {
        $script = $scripts->registered['jquery'];
        if ($script->deps) { // Check whether the script has any dependencies
            $script->deps = array_diff($script->deps, array('jquery-migrate'));
        }
    }
}
add_action('wp_default_scripts', 'remove_jquery_migrate');

//To dequeue these stylesheets from your WordPress theme, you can use the
function remove_default_stylesheets()
{
    wp_dequeue_style('dashicons');
}
add_action('wp_enqueue_scripts', 'remove_default_stylesheets', 100);

//allow SVG uploads:
function allow_svg_upload($mimes)
{
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}
add_filter('upload_mimes', 'allow_svg_upload');

/*remove comments*/
add_action('init', function () {
    // Remove support for comments and trackbacks in post types
    foreach (get_post_types() as $post_type) {
        if (post_type_supports($post_type, 'comments')) {
            remove_post_type_support($post_type, 'comments');
            remove_post_type_support($post_type, 'trackbacks');
        }
    }
});

add_filter('comments_open', '__return_false', 20, 2);
add_filter('pings_open', '__return_false', 20, 2);
add_filter('comments_array', '__return_empty_array', 10, 2);
add_action('admin_menu', function () {
    remove_menu_page('edit-comments.php');
});
add_action('wp_dashboard_setup', function () {
    remove_meta_box('dashboard_recent_comments', 'dashboard', 'normal');
});
add_action('wp_before_admin_bar_render', function () {
    global $wp_admin_bar;
    $wp_admin_bar->remove_menu('comments');
});


/*enable custom logo*/
add_theme_support('custom-logo');

// MENUS
function _custom_theme_register_menu()
{
    register_nav_menus(
        array(
            'menu-main' => __('Header'),
            'menu-footer' => __('Footer'),
            'menu-footer-two' => __('Footer Bottom Menu'),

        )
    );
}

add_action('init', '_custom_theme_register_menu');


function remove_default_image_sizes($sizes)
{
    unset($sizes['large']);
    unset($sizes['medium']);
    unset($sizes['medium_large']);
    return $sizes;
}

add_filter('intermediate_image_sizes_advanced', 'remove_default_image_sizes');

// disabling big image sizes scaled
add_filter('big_image_size_threshold', '__return_false');



function custom_setup()
{
    // Images
    add_theme_support('post-thumbnails');

    // Title tags
    add_theme_support('title-tag');

    // Languages
    load_theme_textdomain('textdomaintomodify', get_template_directory() . '/languages');

    // HTML 5 - Example : deletes type="*" in scripts and style tags
    add_theme_support('html5', ['script', 'style']);

    // Remove SVG and global styles
    remove_action('wp_enqueue_scripts', 'wp_enqueue_global_styles');
    remove_action('wp_body_open', 'wp_global_styles_render_svg_filters');

    // Remove wp_footer actions which add's global inline styles
    remove_action('wp_footer', 'wp_enqueue_global_styles', 1);

    // Remove render_block filters which adds unnecessary stuff
    remove_filter('render_block', 'wp_render_duotone_support');
    remove_filter('render_block', 'wp_restore_group_inner_container');
    remove_filter('render_block', 'wp_render_layout_support_flag');

    // Remove useless WP image sizes
    remove_image_size('1536x1536');
    remove_image_size('2048x2048');

    // Custom image sizes
    // add_image_size( '424x424', 424, 424, true );
    // add_image_size( '1920', 1920, 9999 );
}

add_action('after_setup_theme', 'custom_setup');


/*enable only those blocks*/


add_filter('allowed_block_types', 'restrict_blocks_by_category', 10, 2);

function restrict_blocks_by_category($allowed_blocks, $post)
{
    // Get all available blocks
    $all_blocks = WP_Block_Type_Registry::get_instance()->get_all_registered();

    // Category slug to allow
    $category_slug = 'bp-theme-blocks';

    // Filter blocks by the 'bp-theme-blocks' category
    $allowed_blocks = array_filter($all_blocks, function ($block) use ($category_slug) {
        return isset($block->category) && $block->category === $category_slug;
    });

    // Extract only the block names (as the `allowed_block_types` filter requires an array of block names)
    return array_keys($allowed_blocks);
}


add_filter('block_categories_all', 'my_custom_block_category', 10, 2);
function my_custom_block_category($categories, $post)
{
    return array_merge(
        [
            [
                'slug' => 'bp-theme-blocks',
                'title' => __('BP Theme Blocks', 'text-domain'),
                'icon' => null,
            ],
        ],
        $categories
    );
}
