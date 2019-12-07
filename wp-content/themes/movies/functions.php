<?php

/**
 * Theme customizations
 *
 * @package      Movies
 * @author       Alex Avz
 * @copyright    Copyright (c) 2019, Alex Avz
 * @license      GPL-2.0+
 */

// Load child theme textdomain.
load_child_theme_textdomain( 'movies' );

add_action( 'genesis_setup', 'movies_setup',15);

function movies_setup() {

	// Define theme constants.
	define( 'CHILD_THEME_NAME', 'Movies' );
	define( 'CHILD_THEME_VERSION', '1.0.0' );

	// Add HTML5 markup structure.
	add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption'  ) );
	
	// Add viewport meta tag for mobile browsers.
	add_theme_support( 'genesis-responsive-viewport' );
	

	// Add theme support for footer widgets.
	//add_theme_support( 'genesis-footer-widgets', 3 );
}

add_action( 'wp_enqueue_scripts', 'movies_stylesheet', 20 );
function movies_stylesheet() {
	wp_enqueue_style( 'custom-style', get_stylesheet_directory_uri() . '/style.css',true );
	wp_enqueue_style( 'custom-style', get_stylesheet_directory_uri() . './css/slick.css',true );
	wp_enqueue_style( 'custom-style', get_stylesheet_directory_uri() . './css/slick-theme.css',true );
	wp_enqueue_script( 'scripts', get_stylesheet_directory_uri() . '/js/slick.min.js',true );
	wp_enqueue_script( 'scripts', get_stylesheet_directory_uri() . '/js/script.js',true );
}

function movies_removing_actions() {
remove_action( 'genesis_entry_content', 'genesis_do_post_content' );
	remove_action( 'genesis_after_header', 'genesis_do_nav' );
	remove_action( 'genesis_site_description', 'genesis_seo_site_description', 10);
}

add_action( 'wp_loaded', 'movies_removing_actions');

function movies_adding_actions(){
}
add_action( 'genesis_header_right', 'genesis_after_header' );
add_action( 'genesis_header_right', 'genesis_do_nav' );
//logo
/*
add_theme_support( 'custom-logo', array(
	'height'      => 100,
	'width'       => 400,
	'flex-height' => true,
	'flex-width'  => true,
	'header-text' => array( 'site-title', 'site-description' ),
) );

<?php 
   $custom_logo_id = get_theme_mod( 'custom_logo' );
   $image = wp_get_attachment_image_src( $custom_logo_id , 'full' );
?>
<img src="<?php echo $image[0]; ?>" alt="">*/
add_theme_support(
	'genesis-menus', array(
		'primary'   => __( 'Left Menu', 'genesis-sample' ),
		'secondary' => __( 'Right Menu', 'genesis-sample' ),
	)
);
remove_action( 'genesis_meta', 'genesis_load_stylesheet' );
//* Add and Enqueue default style at end 
add_action( 'wp_enqueue_scripts', 'genesis_enqueue_main_stylesheet', 20 );