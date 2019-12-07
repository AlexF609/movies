<?php
/**
 * Genesis Sample.
 *
 * This file adds functions to the Genesis Sample Theme.
 *
 * @package Genesis Sample
 * @author  StudioPress
 * @license GPL-2.0-or-later
 * @link    https://www.studiopress.com/
 */

// Starts the engine.
require_once get_template_directory() . '/lib/init.php';

// Defines constants to help enqueue scripts and styles.
define( 'CHILD_THEME_HANDLE', sanitize_title_with_dashes( wp_get_theme()->get( 'Name' ) ) );
define( 'CHILD_THEME_VERSION', wp_get_theme()->get( 'Version' ) );

// Sets up the Theme.
require_once get_stylesheet_directory() . '/lib/theme-defaults.php';

add_action( 'after_setup_theme', 'genesis_sample_localization_setup' );
/**
 * Sets localization (do not remove).
 *
 * @since 1.0.0
 */
function genesis_sample_localization_setup() {

	load_child_theme_textdomain( 'genesis-sample', get_stylesheet_directory() . '/languages' );

}

// Adds helper functions.
require_once get_stylesheet_directory() . '/lib/helper-functions.php';

// Adds image upload and color select to Customizer.
require_once get_stylesheet_directory() . '/lib/customize.php';

// Includes Customizer CSS.
require_once get_stylesheet_directory() . '/lib/output.php';

// Adds WooCommerce support.
require_once get_stylesheet_directory() . '/lib/woocommerce/woocommerce-setup.php';

// Adds the required WooCommerce styles and Customizer CSS.
require_once get_stylesheet_directory() . '/lib/woocommerce/woocommerce-output.php';

// Adds the Genesis Connect WooCommerce notice.
require_once get_stylesheet_directory() . '/lib/woocommerce/woocommerce-notice.php';

add_action( 'after_setup_theme', 'genesis_child_gutenberg_support');
/**
 * Adds Gutenberg opt-in features and styling.
 *
 * @since 2.7.0
 */
function genesis_child_gutenberg_support() { // phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedFunctionFound -- using same in all child themes to allow action to be unhooked.
	require_once get_stylesheet_directory() . '/lib/gutenberg/init.php';
}

add_action( 'wp_enqueue_scripts', 'genesis_sample_enqueue_scripts_styles' );
/**
 * Enqueues scripts and styles."
 *
 * @since 1.0.0
 */
function genesis_sample_enqueue_scripts_styles() {

	//css
	wp_enqueue_style('genesis-sample-fonts','https://fonts.googleapis.com/css?family=Dosis:300,400,500,600,700,800|Open+Sans');
	wp_enqueue_style('Ionicons','https://unpkg.com/ionicons@4.5.5/dist/css/ionicons.min.css');
	wp_enqueue_style('slick-css', get_stylesheet_directory_uri() . '/css/slick.css',array());
	wp_enqueue_style('slick-theme', get_stylesheet_directory_uri() . '/css/slick-theme.css',array('slick-css'));
	wp_enqueue_style( 'dashicons' );

	$suffix = ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) ? '' : '.min';
	wp_enqueue_script('genesis-sample-responsive-menu',get_stylesheet_directory_uri() . "/js/responsive-menus{$suffix}.js",array( 'jquery' ),CHILD_THEME_VERSION,true);

	wp_localize_script('genesis-sample-responsive-menu','genesis_responsive_menu',genesis_sample_responsive_menu_settings()
	);
	
	//js
	wp_enqueue_script('slick-js', get_stylesheet_directory_uri() . '/js/slick.min.js',array( 'jquery' ),CHILD_THEME_VERSION,true);
	wp_enqueue_script('sample-genesis', get_stylesheet_directory_uri() . '/js/genesis-sample.js',array( 'jquery' ),CHILD_THEME_VERSION,true);
	wp_enqueue_script('custom', get_stylesheet_directory_uri() . '/js/custom.js',array( 'jquery' ),CHILD_THEME_VERSION,true);

}

/**
 * Defines responsive menu settings.
 *
 * @since 2.3.0
 */
function genesis_sample_responsive_menu_settings() {

	$settings = array(
		'mainMenu'         => __( 'Menu', 'genesis-sample' ),
		'menuIconClass'    => 'dashicons-before dashicons-menu',
		'subMenu'          => __( 'Submenu', 'genesis-sample' ),
		'subMenuIconClass' => 'dashicons-before dashicons-arrow-down-alt2',
		'menuClasses'      => array(
			'combine' => array(
				'.nav-primary',
			),
			'others'  => array(),
		),
	);

	return $settings;

}

// Adds support for HTML5 markup structure.
add_theme_support( 'html5', genesis_get_config( 'html5' ) );

// Adds support for accessibility.
add_theme_support( 'genesis-accessibility', genesis_get_config( 'accessibility' ) );

// Adds viewport meta tag for mobile browsers.
add_theme_support( 'genesis-responsive-viewport' );

// Adds custom logo in Customizer > Site Identity.
add_theme_support( 'custom-logo', genesis_get_config( 'custom-logo' ) );

add_filter( 'genesis_seo_title', 'genesis_sample_header_title', 10, 3 );
/**
 * Removes the link from the hidden site title if a custom logo is in use.
 *
 * Without this filter, the site title is hidden with CSS when a custom logo
 * is in use, but the link it contains is still accessible by keyboard.
 *
 * @since 1.2.0
 *
 * @param string $title  The full title.
 * @param string $inside The content inside the title element.
 * @param string $wrap   The wrapping element name, such as h1.
 * @return string The site title with anchor removed if a custom logo is active.
 */
function genesis_sample_header_title( $title, $inside, $wrap ) {

	if ( has_custom_logo() ) {
		$inside = get_bloginfo( 'name' );
	}

	return sprintf( '<%1$s class="site-title">%2$s</%1$s>', $wrap, $inside );

}

// Renames primary and secondary navigation menus.
add_theme_support( 'genesis-menus', genesis_get_config( 'menus' ) );

// Adds image sizes.
add_image_size( 'sidebar-featured', 75, 75, true );

// Adds support for after entry widget.
add_theme_support( 'genesis-after-entry-widget-area' );

// Adds support for 3-column footer widgets.
add_theme_support( 'genesis-footer-widgets', 3 );

// Removes header right widget area.
unregister_sidebar( 'header-right' );

// Removes secondary sidebar.
unregister_sidebar( 'sidebar-alt' );

// Removes site layouts.
genesis_unregister_layout( 'content-sidebar-sidebar' );
genesis_unregister_layout( 'sidebar-content-sidebar' );
genesis_unregister_layout( 'sidebar-sidebar-content' );

// Removes output of primary navigation right extras.
//remove_filter( 'genesis_nav_items', 'genesis_nav_right', 10, 2 );
//remove_filter( 'wp_nav_menu_items', 'genesis_nav_right', 10, 2 );

add_action( 'genesis_theme_settings_metaboxes', 'genesis_sample_remove_metaboxes' );
/**
 * Removes output of unused admin settings metaboxes.
 *
 * @since 2.6.0
 *
 * @param string $_genesis_admin_settings The admin screen to remove meta boxes from.
 */
function genesis_sample_remove_metaboxes( $_genesis_admin_settings ) {

	remove_meta_box( 'genesis-theme-settings-header', $_genesis_admin_settings, 'main' );
	remove_meta_box( 'genesis-theme-settings-nav', $_genesis_admin_settings, 'main' );

}

add_filter( 'genesis_customizer_theme_settings_config', 'genesis_sample_remove_customizer_settings' );
/**
 * Removes output of header and front page breadcrumb settings in the Customizer.
 *
 * @since 2.6.0
 *
 * @param array $config Original Customizer items.
 * @return array Filtered Customizer items.
 */
function genesis_sample_remove_customizer_settings( $config ) {

	unset( $config['genesis']['sections']['genesis_header'] );
	unset( $config['genesis']['sections']['genesis_breadcrumbs']['controls']['breadcrumb_front_page'] );
	return $config;

}

// Displays custom logo.
add_action( 'genesis_site_title', 'the_custom_logo', 0 );

// Repositions primary navigation menu.
remove_action( 'genesis_after_header', 'genesis_do_nav' );
add_action( 'genesis_header', 'genesis_do_nav', 12 );

// Repositions the secondary navigation menu.
remove_action( 'genesis_after_header', 'genesis_do_subnav' );
add_action( 'genesis_footer', 'genesis_do_subnav', 10 );

add_filter( 'wp_nav_menu_args', 'genesis_sample_secondary_menu_args' );
/**
 * Reduces secondary navigation menu to one level depth.
 *
 * @since 2.2.3
 *
 * @param array $args Original menu options.
 * @return array Menu options with depth set to 1.
 */
function genesis_sample_secondary_menu_args( $args ) {

	if ( 'secondary' !== $args['theme_location'] ) {
		return $args;
	}

	$args['depth'] = 1;
	return $args;

}

add_filter( 'genesis_author_box_gravatar_size', 'genesis_sample_author_box_gravatar' );
/**
 * Modifies size of the Gravatar in the author box.
 *
 * @since 2.2.3
 *
 * @param int $size Original icon size.
 * @return int Modified icon size.
 */
function genesis_sample_author_box_gravatar( $size ) {

	return 90;

}

add_filter( 'genesis_comment_list_args', 'genesis_sample_comments_gravatar' );
/**
 * Modifies size of the Gravatar in the entry comments.
 *
 * @since 2.2.3
 *
 * @param array $args Gravatar settings.
 * @return array Gravatar settings with modified size.
 */
function genesis_sample_comments_gravatar( $args ) {

	$args['avatar_size'] = 60;
	return $args;

}
//--------------------Search header
add_action( 'genesis_after_header', 'my_search_form');

function my_search_form() {
 ?>
 
 	<div class="wrapper custom-form-seach">
		<form role="search" method="get" id="searchform" class="searchform" action="">
			<select>
				<option value="volvo">Option 1</option>
				<option value="saab">Option 2</option>
				<option value="mercedes">Option 3</option>
				<option value="audi">Option 4</option>
			</select>
				<label class="screen-reader-text" for="s">Search for:</label>
				<input class="search-input" type="text" value="" name="s" id="s">
				<input class="search-submit" type="hidden" id="searchsubmit" value="Search">
		</form>	
	</div>
	<?php 
}

/****************************************************************** Right Menu*/
add_action( 'genesis_header_right', 'add_right_menu_genesis' ); 

function add_right_menu_genesis() {

wp_nav_menu( array( 'theme_location' => 'right-menu' ) );

}

//--------------------Custom post type MOVIES

if ( ! function_exists('wp_movies') ) {

// Register Custom Post Type
function wp_movies() {

	$labels = array(
		'name'                  => _x( 'Movies', 'Post Type General Name', 'movies_text' ),
		'singular_name'         => _x( 'Movie', 'Post Type Singular Name', 'movies_text' ),
		'menu_name'             => __( 'Movies', 'movies_text' ),
		'name_admin_bar'        => __( 'Movies', 'movies_text' ),
		'archives'              => __( 'Item Archives', 'movies_text' ),
		'attributes'            => __( 'Item Attributes', 'movies_text' ),
		'parent_item_colon'     => __( 'Parent Movies:', 'movies_text' ),
		'all_items'             => __( 'All Movies', 'movies_text' ),
		'add_new_item'          => __( 'Add New Movie', 'movies_text' ),
		'add_new'               => __( 'Add New', 'movies_text' ),
		'new_item'              => __( 'New Movies', 'movies_text' ),
		'edit_item'             => __( 'Edit Movie', 'movies_text' ),
		'update_item'           => __( 'Update Movie', 'movies_text' ),
		'view_item'             => __( 'View Movie', 'movies_text' ),
		'view_items'            => __( 'View Movies', 'movies_text' ),
		'search_items'          => __( 'Search Movie', 'movies_text' ),
		'not_found'             => __( 'Not found', 'movies_text' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'movies_text' ),
		'featured_image'        => __( 'Featured Image', 'movies_text' ),
		'set_featured_image'    => __( 'Set featured image', 'movies_text' ),
		'remove_featured_image' => __( 'Remove featured image', 'movies_text' ),
		'use_featured_image'    => __( 'Use as featured image', 'movies_text' ),
		'insert_into_item'      => __( 'Insert into movie', 'movies_text' ),
		'uploaded_to_this_item' => __( 'Uploaded to this movie', 'movies_text' ),
		'items_list'            => __( 'Movies list', 'movies_text' ),
		'items_list_navigation' => __( 'Movies list navigation', 'movies_text' ),
		'filter_items_list'     => __( 'Filter movies list', 'movies_text' ),
	);
	$args = array(
		'label'                 => __( 'Movie', 'movies_text' ),
		'description'           => __( 'Movies Entry', 'movies_text' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail', 'custom-fields' ),
		'taxonomies'            => array( 'category', 'post_tag' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-format-video',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'Movies', $args );

}
add_action( 'init', 'wp_movies', 0 );

}

// Register Custom Taxonomy
function movie_genres() {

	$labels = array(
		'name'                       => _x( 'Genre', 'Taxonomy General Name', 'text_domain' ),
		'singular_name'              => _x( 'Genre', 'Taxonomy Singular Name', 'text_domain' ),
		'menu_name'                  => __( 'Genres', 'text_domain' ),
		'all_items'                  => __( 'All genres', 'text_domain' ),
		'parent_item'                => __( 'Parent genre', 'text_domain' ),
		'parent_item_colon'          => __( 'Parent genre:', 'text_domain' ),
		'new_item_name'              => __( 'New Genre Name', 'text_domain' ),
		'add_new_item'               => __( 'Add New Genre', 'text_domain' ),
		'edit_item'                  => __( 'Edit Genre', 'text_domain' ),
		'update_item'                => __( 'Update Genre', 'text_domain' ),
		'view_item'                  => __( 'View Genre', 'text_domain' ),
		'separate_items_with_commas' => __( 'Separate genre with commas', 'text_domain' ),
		'add_or_remove_items'        => __( 'Add or remove genre', 'text_domain' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'text_domain' ),
		'popular_items'              => __( 'Popular Genre', 'text_domain' ),
		'search_items'               => __( 'Search Items', 'text_domain' ),
		'not_found'                  => __( 'Not Found', 'text_domain' ),
		'no_terms'                   => __( 'No items', 'text_domain' ),
		'items_list'                 => __( 'Items list', 'text_domain' ),
		'items_list_navigation'      => __( 'Items list navigation', 'text_domain' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);
	register_taxonomy( 'Genre', array( 'movies' ), $args );

}
add_action( 'init', 'movie_genres', 0 );


// Register Custom Taxonomy
function movie_languages() {

	$labels = array(
		'name'                       => _x( 'Language', 'Taxonomy General Name', 'text_domain' ),
		'singular_name'              => _x( 'Language', 'Taxonomy Singular Name', 'text_domain' ),
		'menu_name'                  => __( 'Languages', 'text_domain' ),
		'all_items'                  => __( 'All languages', 'text_domain' ),
		'parent_item'                => __( 'Parent language', 'text_domain' ),
		'parent_item_colon'          => __( 'Parent language:', 'text_domain' ),
		'new_item_name'              => __( 'New Language Name', 'text_domain' ),
		'add_new_item'               => __( 'Add New Language', 'text_domain' ),
		'edit_item'                  => __( 'Edit Language', 'text_domain' ),
		'update_item'                => __( 'Update Language', 'text_domain' ),
		'view_item'                  => __( 'View Language', 'text_domain' ),
		'separate_items_with_commas' => __( 'Separate language with commas', 'text_domain' ),
		'add_or_remove_items'        => __( 'Add or remove language', 'text_domain' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'text_domain' ),
		'popular_items'              => __( 'Popular Language', 'text_domain' ),
		'search_items'               => __( 'Search Languages', 'text_domain' ),
		'not_found'                  => __( 'Not Found', 'text_domain' ),
		'no_terms'                   => __( 'No Languages', 'text_domain' ),
		'items_list'                 => __( 'Languages list', 'text_domain' ),
		'items_list_navigation'      => __( 'Languages list navigation', 'text_domain' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);
	register_taxonomy( 'Language', array( 'movies' ), $args );

}
add_action( 'init', 'movie_languages', 0 );
//shortcode iframe
add_shortcode('iframe', array('iframe_shortcode', 'shortcode'));
class iframe_shortcode {
    function shortcode($atts, $content=null) {
          extract(shortcode_atts(array(
               'url'      => '',
               'scrolling'      => 'no',
               'width'      => '100%',
               'height'      => '500',
               'frameborder'      => '0',
               'marginheight'      => '0',
          ), $atts));
 
          if (empty($url)) return '<!-- Iframe: You did not enter a valid URL -->';
 
     return '<iframe src="'.$url.'" title="" width="'.$width.'" height="'.$height.'" scrolling="'.$scrolling.'" frameborder="'.$frameborder.'" marginheight="'.$marginheight.'"><a href="'.$url.'" target="_blank">'.$url.'</a></iframe>';
   }
}