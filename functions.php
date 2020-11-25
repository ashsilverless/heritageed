<?php
/**
 * heritageed functions and definitions
 *
 * @package heritageed
 */

/****************************************************/
/*                       Hooks                       /
/****************************************************/

/* Enqueue scripts and styles */
add_action('wp_enqueue_scripts', 'heritageed_scripts');

/* Add Menus */
add_action('init', 'heritageed_custom_menu');

/* Dashboard Config */
add_action('wp_dashboard_setup', 'heritageed_dashboard_widget');

/* Dashboard Style */
add_action('admin_head', 'heritageed_custom_fonts');

/* Remove Default Menu Items */
add_action('admin_menu', 'heritageed_remove_menus');

/* Change Posts Columns */
add_filter('manage_posts_columns', 'heritageed_manage_columns');

/* Reorder Admin Menu */
add_filter('custom_menu_order', 'heritageed_reorder_menu');
add_filter('menu_order', 'heritageed_reorder_menu');

/* Remove Comments Link */
add_action('wp_before_admin_bar_render', 'heritageed_manage_admin_bar');

/* Remove Admin Bar */
add_action('after_setup_theme', 'heritageed_remove_admin_bar');

/****************************************************/
/*                     Functions                     /
/****************************************************/

function heritageed_scripts() {
	wp_enqueue_style( 'heritageed-style', get_stylesheet_uri() );
	wp_enqueue_script( 'heritageed-core-js', get_template_directory_uri() . '/inc/js/compiled.js', array('jquery'), true);
	wp_enqueue_script( 'heritageed-owl-js', get_template_directory_uri() . '/inc/js/owl.carousel.min.js', array('jquery'), true);
}

// add async and defer attributes to enqueued scripts
function shapeSpace_script_loader_tag($tag, $handle, $src) {
	if ($handle === 'my-plugin-javascript-handle') {
		if (false === stripos($tag, 'async')) {
			$tag = str_replace(' src', ' async="async" src', $tag);
		}
		if (false === stripos($tag, 'defer')) {
			$tag = str_replace('<script ', '<script defer ', $tag);
		}
	}
	return $tag;
}
add_filter('script_loader_tag', 'shapeSpace_script_loader_tag', 10, 3);

function heritageed_custom_menu() {
	register_nav_menus(array(
		//'upper-menu' => __( 'Main Menu' ),
		'footer-menu' => __( 'Footer Menu' ),
	));
}
add_action( 'init', 'heritageed_custom_menu' );

function heritageed_dashboard_widget() {
	global $wp_meta_boxes;
	wp_add_dashboard_widget('custom_help_widget', 'heritageed Support', 'heritageed_dashboard_help');
}

function heritageed_dashboard_help() {
	echo file_get_contents(__DIR__ . "/admin-settings/dashboard.html");
}

function heritageed_custom_fonts() {
	echo '<style type="text/css">' . file_get_contents(__DIR__ . "/admin-settings/style-admin.css") . '</style>';

	if(function_exists('acf_add_options_page')) {
		acf_add_options_page(array(
			'page_title' 	=> 'Theme Settings',
			'menu_title'	=> 'Theme Settings',
			'menu_slug' 	=> 'site-general-settings',
			'capability'	=> 'edit_posts',
			'redirect'		=> false
		));
	}
}

function my_login_stylesheet() {
	wp_enqueue_style( 'custom-login', get_stylesheet_directory_uri() . '/style.css' );
}
add_action( 'login_enqueue_scripts', 'my_login_stylesheet' );

function heritageed_remove_menus(){
	remove_menu_page( 'edit-comments.php' ); //Comments
}

function heritageed_manage_columns($columns) {
	unset($columns["comments"]);
	return $columns;
}

function heritageed_reorder_menu() {
    return array(
		'index.php',                        // Dashboard
		'separator1',                       // --Space--
		'edit.php',                         // Posts
		'edit.php?post_type=page',          // Pages
		'upload.php',                       // Media
		'separator2',                       // --Space--
		'themes.php',                       // Appearance
		'plugins.php',                      // Plugins
		'users.php',                        // Users
		'tools.php',                        // Tools
		'options-general.php',              // Settings
		'wpcf7',                            // Contact Form 7
   );
}

function heritageed_manage_admin_bar(){
	global $wp_admin_bar;
	$wp_admin_bar->remove_menu('comments');
}


if(function_exists('acf_add_options_page')) {
	acf_add_options_page(array(
		'page_title' 	=> 'Theme Settings',
		'menu_title'	=> 'Theme Settings',
		'menu_slug' 	=> 'site-general-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));
}

function heritageed_remove_admin_bar() {
	show_admin_bar(false);
}

