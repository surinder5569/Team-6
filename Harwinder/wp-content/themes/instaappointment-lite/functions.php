<?php
/**
 *  functions and definitions.
 *
 * Sets up the theme and provides some helper functions, which are used in the
 * theme as custom template tags. Others are attached to action and filter
 * hooks in WordPress to change core functionality.
 *
 * When using a child theme (see http://codex.wordpress.org/Theme_Development
 * and http://codex.wordpress.org/Child_Themes), you can override certain
 * functions (those wrapped in a function_exists() call) by defining them first
 * in your child theme's functions.php file. The child theme's functions.php
 * file is included before the parent theme's file, so the child theme
 * functions would be used.
 *
 * Functions that are not pluggable (not wrapped in function_exists()) are
 * instead attached to a filter or action hook.
 *
 *
 */
 
/********************************************************
 INCLUDE REQUIRED FILE FOR THEME (PLEASE DON'T REMOVE IT)
*********************************************************/

/**
 * THEMENAME & SHORTNAME	
 */
$instaapp_shortname = 'instaappointment-lite';	
$instaapp_themename = 'Instaapp';	
require_once(get_template_directory() . '/SketchBoard/functions/admin-init.php');
 

/**
 * FUNTION TO ADD CSS CLASS TO BODY
 */
function instaappointment_lite_add_class( $classes ) {
	if ( 'page' == get_option( 'show_on_front' ) && ( '' != get_option( 'page_for_posts' ) ) && is_front_page() ) {
		$classes[] = 'front-page';
	}
	return $classes;
}
add_filter( 'body_class','instaappointment_lite_add_class' );

 
/**
 * REGISTERS WIDGET AREAS
 */
function instaappointment_lite_widgets_init() {
	register_sidebar(array(
		'name'          => __( 'Page Sidebar', 'instaappointment-lite' ),
		'id'            => 'Page Sidebar',
		'before_widget' => '<li id="%1$s" class="instaapp-container %2$s">',
		'after_widget'  => '</li>',
		'before_title'  => '<h3 class="instaapp-title">',
		'after_title'   => '</h3>',
	));
	register_sidebar(array(
		'name'          => __( 'Blog Sidebar', 'instaappointment-lite' ),
		'id'            => 'Blog Sidebar',
		'before_widget' => '<li id="%1$s" class="instaapp-container %2$s">',
		'after_widget'  => '</li>',
		'before_title'  => '<h3 class="instaapp-title">',
		'after_title'   => '</h3>',
	));
}
add_action( 'widgets_init', 'instaappointment_lite_widgets_init' );

/**
 * Sets up theme defaults and registers the various WordPress features that
 *  supports.
 *
 * @uses load_theme_textdomain() For translation/localization support.
 * @uses add_editor_style() To add Visual Editor stylesheets.
 * @uses add_theme_support() To add support for automatic feed links, post
 * formats, and post thumbnails.
 * @uses register_nav_menu() To add support for a navigation menu.
 * @uses set_post_thumbnail_size() To set a custom post thumbnail size.
 *
*/
function instaappointment_lite_theme_setup() {
	/*
	 * Makes  available for translation.
	 * Translations can be added to the /languages/ directory.
	 */
	load_theme_textdomain( 'instaappointment-lite', get_template_directory() . '/languages' );
	 
	// This theme styles the visual editor with editor-style.css to match the theme style.
	add_editor_style();

	// Adds RSS feed links to <head> for posts and comments.
	add_theme_support( 'automatic-feed-links' );

	add_theme_support('post-thumbnails');
	set_post_thumbnail_size( 770, 348, true );
	add_image_size( 'instaapp_standard_img',770,348,true);  //standard size
	
	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'Header' => __( 'Main Navigation', 'instaappointment-lite' ),
	));
}
add_action( 'after_setup_theme', 'instaappointment_lite_theme_setup' );

/**
 * Filter content with empty post title
 *
 */
add_filter('the_title', 'instaappointment_lite_untitled');
function instaappointment_lite_untitled($title) {
	if ($title == '') {
		return __('Untitled','instaappointment-lite');
	} else {
		return $title;
	}
}