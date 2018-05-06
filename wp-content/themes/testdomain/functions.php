<?php

function my_theme_enqueue_styles() {
	// styles
    wp_enqueue_style( 'custom', get_stylesheet_directory_uri() . '/css/custom.css', null, null );
    wp_enqueue_style( 'media-screens', get_stylesheet_directory_uri() . '/css/media-screens.css', null, null);

    $parent_style = 'parent-style';
    wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array( $parent_style ),
        wp_get_theme()->get('Version')
    );
    wp_enqueue_style( 'testdomain-styles', get_stylesheet_uri() );
    wp_style_add_data( 'testdomain-styles', 'rtl', 'replace' );

	// scripts
    wp_enqueue_script( 'jquery' );
    wp_enqueue_script( 'global',  get_stylesheet_directory_uri() . '/js/global.js', null, null, true );
}

add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );

// CUSTOM POST TYPES
// Register Custom Post Types
function custom_post_type() {

// Set UI labels for Custom Post Type
    $labels = array(
        'name'                => _x( 'Books', 'sitename' ),
        'singular_name'       => _x( 'Book', 'sitename' ),
        'menu_name'           => __( 'Books', 'sitename' ),
        'all_items'           => __( 'All Books', 'sitename' ),
        'view_item'           => __( 'View Book', 'sitename' ),
        'add_new_item'        => __( 'Add New Book', 'sitename' ),
        'add_new'             => __( 'Add New', 'sitename' ),
        'new_item'              => __( 'New Book', 'text_domain' ),
        'edit_item'           => __( 'Edit Book', 'sitename' ),
    );

    $args = array(
      'label'                 => __( 'Book', 'sitename' ),
   		'description'           => __( 'Description', 'sitename' ),
   		'labels'                => $labels,
   		'supports'            	=> array( 'title', 'editor', 'excerpt', 'thumbnail','revisions' ),
   		'hierarchical'          => true,
   		'public'                => true,
   		'show_ui'               => true,
   		'show_in_menu'          => true,
   		'show_in_admin_bar'     => true,
   		'show_in_nav_menus'     => true,
   		'show_admin_column'		  => true,
   		'can_export'            => true,
   		'has_archive'           => true,
   		'exclude_from_search'   => false,
   		'publicly_queryable'    => true,
   		'capability_type'       => 'page',
      'support'               => array( 'title', 'editor', 'excerpt', 'custom-fields', 'thumbnail','page-attributes' ),
    );

    register_post_type( 'book', $args );
}

add_action( 'init', 'custom_post_type' );

// add taxonomy to book cpt
function create_book_tax() {
	register_taxonomy(
		'genre',
		'book',
		array(
			'label'                => __( 'Genre' ),
			'hierarchical'         => true,
      'show_admin_column'    => true,
      'show_in_nav_menus'     => false,
		)
	);
}
add_action( 'init', 'create_book_tax' );


// WOOCOMMERCE
//declare WC support
function aventurine_child_wc_support() {
  add_theme_support( 'woocommerce' );
}
add_action( 'after_setup_theme', 'aventurine_child_wc_support' );

// SINGLE PRODUCT
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30);
add_action('woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 15);

remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10);
add_action('woocommerce_single_product_summary', 'woocommerce_template_single_rating', 30);

remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40);

// fix brackets bug on titles
add_filter('the_title', function ($title)
{
  return str_replace('(', '&rlm;(', $title);

}, PHP_INT_MAX );

?>
