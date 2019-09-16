<?php
/*
Plugin Name:        Meta Descriptions
Plugin URI:         
Description:        Robust Meta Descriptions
Version:            1.0.0
Author:             Dylan Pitchford
Author URI:         
*/

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
    die;
}


// Generating a meta description using standard WP components
function meta_description( $char_limit ) {
        $tagline = get_bloginfo ( 'description' );
        $post_object = get_post();
        $excerpt = $post_object->post_excerpt; // Get the raw excerpt, warts (tags) and all.
        $content = $post_object->post_content; // Get the raw content.
        if ( !empty( $excerpt ) ) { // If there is an excerpt lets use it to generate a meta description
                $excerpt_stripped = strip_tags( $excerpt ); // Remove any tags using the PHP function strip_tags.
                $excerpt_length = strlen( $excerpt_stripped ); // Now lets count the characters
                if ( $excerpt_length > $char_limit ) { // Now work out if we need to trim the character length.
                        $offset = $char_limit - $excerpt_length; // This gives us a negative value.
                        $position = strrpos( $excerpt_stripped, ' ', $offset ); // This starts looking for a space backwards from the offset
                        $description = substr( $excerpt_stripped, 0, $position ); // Trim up until the point of the last space.
              } else {
                        $description = $excerpt_stripped; // The excerpt must be less than the char_limit so lets just print it.
                }
        } elseif( !empty( $content ) ) {
                // If no excerpt exists we use the content, note the use of get_post as we are outside the loop.
                $content_stripped = strip_tags( $content );
                $content_length = strlen( $content_stripped );
                if ( $content_length > $char_limit ) {
                    $content_trimmed = substr( $content_stripped, 0, $char_limit ); // Trim the raw content back to the character limit
                    $last_space = strrpos( $content_trimmed, ' ' ); // Find the last space in the trimmed content which could include incomplete words
                        $description = substr( $content_trimmed, 0, $last_space ); // Re-trim the content to the point of the last space.
              } else {
                        $description = $content_stripped;
                }
        } else {
            $description = $tagline; // If the page is empty we can use the tagline to prevent emptiness.
        }
        return $description;
}
?>