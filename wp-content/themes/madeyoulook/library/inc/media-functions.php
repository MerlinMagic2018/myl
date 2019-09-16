<?php
/**
 * Add image presets, some image API functions
 *
 * @package MYL
 */

// add_filter( 'intermediate_image_sizes', function( $sizes )
// {
//     return array_filter( $sizes, function( $val )
//     {
//         return 'medium_large' !== $val; // Filter out 'medium_large'
//     } );
// } );


if ( ! function_exists( 'myl_media_init' ) ) :
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     */

    function myl_media_init () {

    	// Add new Mime types
    	add_filter('upload_mimes', 'my_myme_types', 1, 1);

    	// Remove links around images
		add_filter( 'the_content', 'myl_remove_image_link' );
        
		// Remove image dimentions
        add_filter( 'post_thumbnail_html', 'myl_remove_image_dimensions', 10, 3 );
		add_filter( 'image_send_to_editor', 'myl_remove_image_dimensions', 10 );

    }
endif;
add_action('after_setup_theme', 'myl_media_init');



/**
 * Add new mime types
 */
function my_myme_types($mime_types){
    $mime_types['svg'] = 'image/svg+xml'; //Adding svg extension
    //$mime_types['psd'] = 'image/vnd.adobe.photoshop'; //Adding photoshop files
    return $mime_types;
}


/**
 * Remove links around images
 */
function myl_remove_image_link( $content ) {
    $content =
        preg_replace(
            array('{<a(.*?)(wp-att|wp-content\/uploads)[^>]*><img}',
                '{ wp-image-[0-9]*" /></a>}'),
            array('<img','" />'),
            $content
        );
    return $content;
}


/**
 * myl_remove_image_dimensions
 * Removes Hardcoded Height which cause issues with scaling breakpoints
 * @param string
 * @param int
 * @param int
 * @param int
 * @return string
 */
function myl_remove_image_dimensions( $html, $post_id, $post_image_id ) {
    $html = preg_replace( '/(width|height)=[\"\']\d*[\"\']\s/', "", $html );
    return $html;
}


// add_filter( 'post_thumbnail_html', 'remove_thumbnail_dimensions', 10 );
// add_filter( 'image_send_to_editor', 'remove_thumbnail_dimensions', 10 );
// add_filter( 'the_content', 'remove_thumbnail_dimensions', 10 );
// function remove_thumbnail_dimensions( $html ) {
//     $html = preg_replace( '/(width|height)=\"\d*\"\s/', "", $html );
//     return $html;
// }


function myl_custom_product_sizes(){
	//These are used for the images found in the product template.

	// product sm       - 75 x 75
	// product med      - 150 x 150
	// product large    - 300 x 300
	// product xlarge   - 600 x 600
	// product feature  - 800 x 800

	// profile sm       - 75w x 9999
	// profile med      - 150w x 9999
	// profile large    - 300w x 9999


	// content sm 		- 400w x 9999
	// content med 		- 800w x 9999
	// content large 	- 1200w x 9999

	//add_image_size( 'myl-product-sm', 75, 75, true ); // product shot sm
	//add_image_size( 'myl-product-med', 150, 150, true ); // product shot medium
	add_image_size( 'myl-product-large', 600, 600, true ); // product shot large
	//add_image_size( 'myl-product-xlarge', 550, 550, true ); // product shot xlarge
	//add_image_size( 'myl-product-feature', 750, 750, true ); // product shot feature

	// add_image_size( 'myl-profile-sm', 75, 9999, true ); // product shot sm
	// add_image_size( 'myl-product-med', 150, 9999, true ); // product shot medium
	// add_image_size( 'myl-product-large', 300, 9999, true ); // product shot large

}
//add_action('init','myl_custom_product_sizes');


function myl_custom_image_sizes( $sizes ) {
    return array_merge( $sizes, array(
        'myl-product-large' => __('Product - 300px by 300px', 'myltheme')
        //'myl-product-xlarge' => __('Product - 550px by 550px', 'myltheme')
    ) );
}
add_filter( 'image_size_names_choose', 'myl_custom_image_sizes' );


// Disable WordPRess responsive srcset images
//add_filter('max_srcset_image_width', create_function('', 'return 1;'));


/**
 * Require a featured image to be set before a post can be published.
 */






?>
