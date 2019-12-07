<?php //---------------------- Custom post type MOVIES

// Register Custom Post Type
if ( ! function_exists('wp_movies') ) {

	function wp_movies() {

		$labels = array(
			'name'                  => _x( 'Movies', 'Post Type General Name', 'movies_text' ),
			'singular_name'         => _x( 'Movie', 'Post Type Singular Name', 'movies_text' ),
			'menu_name'             => __( 'Movies', 'movies_text' ),
			'name_admin_bar'        => __( 'Movies', 'movies_text' ),
			'archives'              => __( 'Item Archives', 'movies_text' ),
			'attributes'            => __( 'Movie Attributes', 'movies_text' ),
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
			'supports'              => array( 'title', 'editor', 'thumbnail', 'custom-fields','author' ),
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