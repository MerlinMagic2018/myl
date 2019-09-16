<?php
/**
* Plugin Name: Made You Look Designers
* Description: Designer Listing
* Version: 1.0
* Author: Dylan Pitchford
* Template Post Type: post, page, product
*/


// Register Custom Post Type
function designers_post_type() {

	$labels = array(
		'name'                  => _x( 'Designers', 'Post Type General Name', 'text_domain' ),
		'singular_name'         => _x( 'Designer', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'             => __( 'Designers', 'text_domain' ),
		'name_admin_bar'        => __( 'Designers', 'text_domain' ),
		'archives'              => __( 'Designers Archives', 'text_domain' ),
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
		'items_list'            => __( 'Designers list', 'text_domain' ),
		'items_list_navigation' => __( 'Designers list navigation', 'text_domain' ),
		'filter_items_list'     => __( 'Filter designers list', 'text_domain' ),
	);
	$args = array(
		'label'                 => __( 'Designers', 'text_domain' ),
		'description'           => __( 'Creating unique customized Jewellery is our speciality! Customers meet with our in-house Designers to commission One-of-a-kind pieces that have been made especially for them. This is a great way to bring some of your own spirit into a piece of jewellery and give a gift that is sure to be very well received! Here is a sampling of some of our favourite projects to give you an idea of the range and scope of work that we do.', 'text_domain' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail', 'custom-fields', 'page-attributes', 'post-formats', 'excerpt' ),
		'taxonomies'            => array( 'category'),
		'hierarchical'          => true,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 20,
		'menu_icon'             => 'dashicons-admin-users',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
		'rewrite'               => array( 'slug' => 'designers' ),
	);
	register_post_type( 'designers', $args );

}
add_action( 'init', 'designers_post_type', 0 );



// add_filter( 'manage_designers_posts_columns', 'designers_filter_posts_columns' );
// function designers_filter_posts_columns( $columns ) {
// 	$columns['image'] = __( 'Image' );
// 	$columns['instagram'] = __( 'Instagram', 'madeyoulook' );
// 	//$columns['area'] = __( 'Area', 'smashing' );
// 	return $columns;
// }



// add_filter( 'manage_designers_posts_columns', 'designers_filter_posts_columns' );
// function designers_filter_posts_columns( $columns ) {
//   	$columns = array(
//       'cb' => $columns['cb'],
//       'image' => __( 'Image' ),
//       'title' => __( 'Title' ),
//       'category' => __( 'Categories' ),
//       //'instagram' => __( 'Instagram', 'madeyoulook' ),
//       'date'  => __( 'Date' )
      
//     );
// return $columns;
// }

// add_action( 'manage_designers_posts_custom_column', 'smashing_designers_column', 10, 2);
// function smashing_designers_column( $column, $post_id ) {
// 	// Image column
// 	if ( 'image' === $column ) {
// 		echo get_the_post_thumbnail( $post_id, array(80, 80) );
// 	}

// 	// Monthly price column
//   	// if ( 'instagram' === $column ) {
//    //  	$instagram = get_post_meta( $post_id, 'instagram_profile', true );

//    //  	if ( ! $instagram ) {
//    //    	_e( 'n/a' );  
//    //  } else {
//    //    	echo '$ ' . number_format( $instagram, 0, '.', ',' ) . ' p/m';
//    //  	}
//   	// }
// }




