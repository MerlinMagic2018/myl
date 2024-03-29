<?php
/**
 * Designers
 *
 * Snippet by GenerateWP.com
 * Generated on December 14, 2018 19:28:04
 * @link https://generatewp.com/snippet/8XobD2w/
 */


// Register Custom Post Type
function designer_post_type() {

	$labels = array(
		'name'                  => _x( 'Designers', 'Post Type General Name', 'text_domain' ),
		'singular_name'         => _x( 'Designer', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'             => __( 'Designers', 'text_domain' ),
		'name_admin_bar'        => __( 'Designers', 'text_domain' ),
		'archives'              => __( 'Designer Archives', 'text_domain' ),
		'attributes'            => __( 'Designer Attributes', 'text_domain' ),
		'parent_item_colon'     => __( 'Parent Item: Designers', 'text_domain' ),
		'all_items'             => __( 'All Designers', 'text_domain' ),
		'add_new_item'          => __( 'Add New Designer', 'text_domain' ),
		'add_new'               => __( 'Add New Designer', 'text_domain' ),
		'new_item'              => __( 'New Designer', 'text_domain' ),
		'edit_item'             => __( 'Edit Designer', 'text_domain' ),
		'update_item'           => __( 'Update Designer', 'text_domain' ),
		'view_item'             => __( 'View Designer', 'text_domain' ),
		'view_items'            => __( 'View Designers', 'text_domain' ),
		'search_items'          => __( 'Search Designer', 'text_domain' ),
		'not_found'             => __( 'Designer Not found', 'text_domain' ),
		'not_found_in_trash'    => __( 'Designer Not found in Trash', 'text_domain' ),
		'featured_image'        => __( 'Featured Image', 'text_domain' ),
		'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
		'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
		'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
		'insert_into_item'      => __( 'Insert into Designer', 'text_domain' ),
		'uploaded_to_this_item' => __( 'Uploaded to this Designer', 'text_domain' ),
		'items_list'            => __( 'Designer list', 'text_domain' ),
		'items_list_navigation' => __( 'Designers list navigation', 'text_domain' ),
		'filter_items_list'     => __( 'Filter designers list', 'text_domain' ),
	);
	$args = array(
		'label'                 => __( 'Designer', 'text_domain' ),
		'description'           => __( 'List of MYL Designers', 'text_domain' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail', 'custom-fields', 'page-attributes', 'post-formats' ),
		'taxonomies'            => array( 'category', 'post_tag' ),
		'hierarchical'          => true,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-admin-users',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'designer', $args );

}
add_action( 'init', 'designer_post_type', 0 );
