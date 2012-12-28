<?php
/**
 * web2feel functions and definitions
 *
 * @package web2feel
 * @since web2feel 1.0
 */

$edds_options = get_option('edds_theme_settings');

if(!defined('EDDS_THEME_DIR')) {
	define('EDDS_THEME_DIR', dirname(__FILE__));
}
if(!defined('EDDS_THEME_URL')) {
	define('EDDS_THEME_URL', get_bloginfo('template_directory'));
}

// extra theme files
include(EDDS_THEME_DIR . '/inc/scripts.php');
include(EDDS_THEME_DIR . '/inc/edd-config.php');
include(EDDS_THEME_DIR . '/inc/aq_resizer.php');
include(EDDS_THEME_DIR . '/inc/paginate.php');
include(EDDS_THEME_DIR . '/inc/template-tags.php');


define( 'RWMB_URL', trailingslashit( get_stylesheet_directory_uri() . '/meta-box' ) );
define( 'RWMB_DIR', trailingslashit( STYLESHEETPATH . '/meta-box' ) );  
  
require_once RWMB_DIR . 'meta-box.php';
require_once RWMB_DIR . 'setup.php';
 
  
/**
 * Set the content width based on the theme's design and stylesheet.
 *
 * @since web2feel 1.0
 */
 
if ( ! isset( $content_width ) )
	$content_width = 620; /* pixels */

if ( ! function_exists( 'web2feel_setup' ) ):
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 *
 * @since web2feel 1.0
 */
function web2feel_setup() {

	load_theme_textdomain( 'web2feel', get_template_directory() . '/languages' );

	add_theme_support( 'automatic-feed-links' );

	add_theme_support( 'post-thumbnails' );

	if(!function_exists('edds_image_sizes')) {
		function edds_image_sizes() {
			set_post_thumbnail_size( 649, 245, true ); // default post thumbnail size
			add_image_size( 'product-image',  199, 245, true ); // product thumbnail
			add_image_size( 'product-image-large',  627, 400, true ); // main product image
		}
	}
	add_action('init', 'edds_image_sizes');

	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'web2feel' ),
	) );

}
endif; // web2feel_setup
add_action( 'after_setup_theme', 'web2feel_setup' );

/**
 * Register widgetized area and update sidebar with default widgets
 *
 * @since web2feel 1.0
 */
function web2feel_widgets_init() {
	register_sidebar( array(
		'name' => __( 'Sidebar', 'web2feel' ),
		'id' => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h1 class="widget-title">',
		'after_title' => '</h1>',
	));
	register_sidebar(array(
		'name' => 'Footer',
		'before_widget' => '<li class="botwid grid_3 %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="bothead">',
		'after_title' => '</h3>',
	));		
}
add_action( 'widgets_init', 'web2feel_widgets_init' );



/* FLush rewrite */

function my_rewrite_flush() {
    flush_rewrite_rules();
}
add_action( 'after_switch_theme', 'my_rewrite_flush' );

