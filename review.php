<?php
/*
Plugin Name: Review Post
Plugin URI: https://pankajbca.wordpress.com/
Description: An example plugin to demonstrate the basics of putting together a plugin in WordPress
Version: 0.1
Author: Pankaj Panchal
Author URI: https://pankajbca.wordpress.com/
License: GPL2
*/
?>
<?php
add_action('init', 'review_register');

function review_register() {

	$labels = array(
		'name' => _x('Reviews', 'post type general name'),
		'singular_name' => _x('Review', 'post type singular name'),
		'add_new' => _x('Add New', 'review'),
		'add_new_item' => __('Add New Review'),
		'edit_item' => __('Edit Review'),
		'new_item' => __('New Review'),
		'view_item' => __('View Review'),
		'search_items' => __('Search Review'),
		'not_found' =>  __('Nothing found'),
		'not_found_in_trash' => __('Nothing found in Trash'),
		'parent_item_colon' => ''
	);

	$args = array(
		'labels' => $labels,
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true,
		'query_var' => true,
		'menu_icon' => 'dashicons-smiley',
		'rewrite' => true,
		'capability_type' => 'post',
		'hierarchical' => false,
		'menu_position' => null,
		'supports' => array('title','editor','thumbnail')
	  ); 

	register_post_type( 'review' , $args );
}

// Custom Taxonomy

function add_review_taxonomies() {

	register_taxonomy('review', 'review', array(
		// Hierarchical taxonomy (like categories)
		'hierarchical' => true,
		// This array of options controls the labels displayed in the WordPress Admin UI
		'labels' => array(
			'name' => _x( 'Review Category', 'taxonomy general name' ),
			'singular_name' => _x( 'Review-Category', 'taxonomy singular name' ),
			'search_items' =>  __( 'Search Review-Categories' ),
			'all_items' => __( 'All Review-Categories' ),
			'parent_item' => __( 'Parent Review-Category' ),
			'parent_item_colon' => __( 'Parent Review-Category:' ),
			'edit_item' => __( 'Edit Review-Category' ),
			'update_item' => __( 'Update Review-Category' ),
			'add_new_item' => __( 'Add New Review-Category' ),
			'new_item_name' => __( 'New Review-Category Name' ),
			'menu_name' => __( 'Review Categories' ),
		),

		// Control the slugs used for this taxonomy
		'rewrite' => array(
			'slug' => 'review', // This controls the base slug that will display before each term
			'with_front' => false, // Don't display the category base before "/locations/"
			'hierarchical' => true // This will allow URL's like "/locations/boston/cambridge/"
		),
	));
}
add_action( 'init', 'add_review_taxonomies', 0 );
?>