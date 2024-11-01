<?php
add_action( 'init', 'ghp_create_github_post_type' );
/**
 * Register a repo post type.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_post_type
 */
function ghp_create_github_post_type() {
	$labels = array(
		'name'               => __( 'Repos', 'wp-showcase-for-github' ),
		'singular_name'      => __( 'Repo', 'wp-showcase-for-github' ),
		'menu_name'          => __( 'Repos', 'wp-showcase-for-github' ),
		'name_admin_bar'     => __( 'Repo', 'wp-showcase-for-github' ),
		'add_new'            => __( 'Add New', 'repo', 'wp-showcase-for-github' ),
		'add_new_item'       => __( 'Add New Repo', 'wp-showcase-for-github' ),
		'new_item'           => __( 'New Repo', 'wp-showcase-for-github' ),
		'edit_item'          => __( 'Edit Repo', 'wp-showcase-for-github' ),
		'view_item'          => __( 'View Repo', 'wp-showcase-for-github' ),
		'all_items'          => __( 'All Repos', 'wp-showcase-for-github' ),
		'search_items'       => __( 'Search Repos', 'wp-showcase-for-github' ),
		'parent_item_colon'  => __( 'Parent Repos:', 'wp-showcase-for-github' ),
		'not_found'          => __( 'No repos found.', 'wp-showcase-for-github' ),
		'not_found_in_trash' => __( 'No repos found in Trash.', 'wp-showcase-for-github' )
	);

	$args = array(
		'labels'             => $labels,
		'description'        => __( 'Description.', 'wp-showcase-for-github' ),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'repo' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array( 'title', 'editor' )
	);

	register_post_type( 'repo', $args );
}