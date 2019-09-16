<?php

/*********************
WP_HEAD GOODNESS
The default wordpress head is
a mess. Let's clean it up by
removing all the junk we don't
need.
*********************/

if ( ! function_exists( 'myl_head_cleanup' ) ) :
    function myl_head_cleanup() {
      // Remove junk from the head
        add_filter( 'feed_links_show_comments_feed', '__return_false' );
        // remove WP version from RSS
        add_filter( 'the_generator', 'myl_rss_version' );
        remove_action('wp_head', 'wlwmanifest_link');
        remove_action('wp_head', 'wp_generator');
        remove_action('wp_head', 'feed_links', 2);
        remove_action('wp_head', 'feed_links_extra', 3);
        remove_action('wp_head', 'start_post_rel_link', 10, 0);
        remove_action('wp_head', 'parent_post_rel_link', 10, 0);
        remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0);
        remove_action('wp_head', 'wp_shortlink_wp_head');

        remove_action( 'wp_head', 'wp_oembed_add_host_js' );
        remove_filter('oembed_dataparse', 'wp_filter_oembed_result', 10);

        // disable REST API
        add_filter('rest_enabled', '__return_false');

        // REST API
        remove_action( 'init', 'rest_api_init' );
        remove_action( 'rest_api_init', 'rest_api_default_filters', 10, 1 );
        remove_action( 'parse_request', 'rest_api_loaded' );

        // disable Embeds for REST API
        remove_action( 'rest_api_init', 'wp_oembed_register_route' );
        remove_filter( 'rest_pre_serve_request', '_oembed_rest_pre_serve_request', 10, 4 );

        // disable filters REST API
        remove_action( 'xmlrpc_rsd_apis', 'rest_output_rsd' );
        remove_action( 'wp_head', 'rest_output_link_wp_head', 10, 0 );
        remove_action( 'template_redirect', 'rest_output_link_header', 11, 0 );
        remove_action( 'auth_cookie_malformed', 'rest_cookie_collect_status' );
        remove_action( 'auth_cookie_expired', 'rest_cookie_collect_status' );
        remove_action( 'auth_cookie_bad_username', 'rest_cookie_collect_status' );
        remove_action( 'auth_cookie_bad_hash', 'rest_cookie_collect_status' );
        remove_action( 'auth_cookie_valid', 'rest_cookie_collect_status' );
        remove_filter( 'rest_authentication_errors', 'rest_cookie_check_errors', 100 );

        // disable oEmbed discovery links
        remove_action( 'wp_head', 'wp_oembed_add_discovery_links' );
        remove_action( 'wp_head', 'wp_oembed_add_discovery_links', 10 );

        // disable REST API link tag
        remove_action( 'wp_head', 'rest_output_link_wp_head' );

        // disable REST API link in HTTP headers
        remove_action( 'template_redirect', 'rest_output_link_header', 11, 0 );

        // Disable converting :) to smileys
        remove_filter('the_content', 'convert_smilies');

        // Disable cookies for comments
        remove_action('set_comment_cookies', 'wp_set_comment_cookies');


    } /* end template head cleanup */
endif;
add_action( 'init', 'myl_head_cleanup' );


/**
 * Disable Heartbeat API
 */
function stop_heartbeat() {
    wp_deregister_script('heartbeat');
}
add_action( 'init', 'stop_heartbeat', 1 );

/**
 * remove WP version from RSS
 */
function myl_rss_version() { return ''; }


/****************************************
* REMOVE WP EXTRAS *
****************************************/

// Remove emojis: because WordPress is serious business.
// But, if you want emojis, don't let me stop you from having a good time. 
// To enable emojis, comment these functions out or just delete them.

/**
 * Disable the emoji's
 */
function disable_emojis() {
    remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
    remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
    remove_action( 'wp_print_styles', 'print_emoji_styles' );
    remove_action( 'admin_print_styles', 'print_emoji_styles' ); 
    remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
    remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
    remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
    add_filter( 'tiny_mce_plugins', 'disable_emojis_tinymce' );
    add_filter( 'wp_resource_hints', 'disable_emojis_remove_dns_prefetch', 10, 2 );
    add_filter( 'emoji_svg_url', '__return_false' );
}
add_action( 'init', 'disable_emojis' );

/**
 * Filter function used to remove the tinymce emoji plugin.
 * 
 * @param array $plugins 
 * @return array Difference betwen the two arrays
 */
function disable_emojis_tinymce( $plugins ) {
    if ( is_array( $plugins ) ) {
        return array_diff( $plugins, array( 'wpemoji' ) );
        } else {
            return array();
        }
}

/**
 * Remove emoji CDN hostname from DNS prefetching hints.
 *
 * @param array $urls URLs to print for resource hints.
 * @param string $relation_type The relation type the URLs are printed for.
 * @return array Difference betwen the two arrays.
 */
function disable_emojis_remove_dns_prefetch( $urls, $relation_type ) {
    if ( 'dns-prefetch' == $relation_type ) {
        /** This filter is documented in wp-includes/formatting.php */
        $emoji_svg_url = apply_filters( 'emoji_svg_url', 'https://s.w.org/images/core/emoji/2/svg/' );

        $urls = array_diff( $urls, array( $emoji_svg_url ) );
    }
return $urls;
}




/**
    Functions for Assets Cleanup 
**************************************************************************************/

if ( ! function_exists( 'myl_assets_cleanup' ) ) :
    function myl_assets_cleanup() {

        // remove WP version from css
        add_filter( 'style_loader_src', 'myl_remove_wp_ver_css_js', 9999 );

        // remove WP version from scripts
        add_filter( 'script_loader_src', 'myl_remove_wp_ver_css_js', 9999 );
        
        // Get rid of jquery Migrate
        //add_action( 'wp_default_scripts', 'myl_dequeue_jquery_migrate' );

        // remove pesky injected css for recent comments widget
        add_filter( 'wp_head', 'myl_remove_wp_widget_recent_comments_style', 1 );

        // clean up comment styles in the head
        add_action( 'wp_head', 'myl_remove_recent_comments_style', 1 );

        // clean up gallery output in wp
        add_filter( 'gallery_style', 'myl_gallery_style' );

        // dequeue styles
        add_action( 'wp_enqueue_scripts', 'myl_dequeue_unnecessary_styles' );

        //add_action( 'wp_enqueue_scripts', 'myl_dequeue_unnecessary_scripts' );


    } /* end template head cleanup */
endif;
add_action( 'init', 'myl_assets_cleanup' );


/**
 * remove WP version from scripts
 */
function myl_remove_wp_ver_css_js( $src ) {
    if ( strpos( $src, 'ver=' ) )
        $src = remove_query_arg( 'ver', $src );
    return $src;
}

/**
 * remove injected CSS for recent comments widget
 */
function myl_remove_wp_widget_recent_comments_style() {
    if ( has_filter( 'wp_head', 'wp_widget_recent_comments_style' ) ) {
        remove_filter( 'wp_head', 'wp_widget_recent_comments_style' );
    }
}

/**
 * remove injected CSS from recent comments widget
 */
function myl_remove_recent_comments_style() {
    global $wp_widget_factory;
        if (isset($wp_widget_factory->widgets['WP_Widget_Recent_Comments'])) {
        remove_action( 'wp_head', array($wp_widget_factory->widgets['WP_Widget_Recent_Comments'], 'recent_comments_style') );
    }
}

/**
 * remove injected CSS from gallery
 */
function myl_gallery_style($css) {
    return preg_replace( "!<style type='text/css'>(.*?)</style>!s", '', $css );
}


/**
 * Dequeue Styles
 */
function myl_dequeue_unnecessary_styles() {
    
    // Gutenberg styles
    wp_dequeue_style( 'wp-block-library' );
    wp_deregister_style( 'wp-block-library' );

    // Glossary styles
    wp_dequeue_style( 'myl-glossary-style' );
    wp_deregister_style( 'myl-glossary-style' );

    // Dashicons
    wp_dequeue_style( 'dashicons' );
    wp_deregister_style( 'dashicons' );
}

/**
 * Dequeue Scripts
 */
function myl_dequeue_unnecessary_scripts() {

    // Start with Jquery Migrate
    if (! empty( $scripts->registered['jquery'] ) ) {
        $jquery_dependencies = $scripts->registered['jquery']->deps;
        $scripts->registered['jquery']->deps = array_diff( $jquery_dependencies, array( 'jquery-migrate' ) );
    }

    // wp_dequeue_script( 'modernizr-js' );
    // wp_deregister_script( 'modernizr-js' );
}

/**
 * Dequeue jQuery Migrate
 */
// function myl_dequeue_jquery_migrate( $scripts ) {
//     if (! empty( $scripts->registered['jquery'] ) ) {
//         $jquery_dependencies = $scripts->registered['jquery']->deps;
//         $scripts->registered['jquery']->deps = array_diff( $jquery_dependencies, array( 'jquery-migrate' ) );
//     }
// }


// Generating a meta description using standard WP components
// function meta_description( $char_limit ) {
//         $tagline = get_bloginfo ( 'description' );
//         $post_object = get_post();
//         $excerpt = $post_object->post_excerpt; // Get the raw excerpt, warts (tags) and all.
//         $content = $post_object->post_content; // Get the raw content.
//         if ( !empty( $excerpt ) ) { // If there is an excerpt lets use it to generate a meta description
//                 $excerpt_stripped = strip_tags( $excerpt ); // Remove any tags using the PHP function strip_tags.
//                 $excerpt_length = strlen( $excerpt_stripped ); // Now lets count the characters
//                 if ( $excerpt_length > $char_limit ) { // Now work out if we need to trim the character length.
//                         $offset = $char_limit - $excerpt_length; // This gives us a negative value.
//                         $position = strrpos( $excerpt_stripped, ' ', $offset ); // This starts looking for a space backwards from the offset
//                         $description = substr( $excerpt_stripped, 0, $position ); // Trim up until the point of the last space.
//               } else {
//                         $description = $excerpt_stripped; // The excerpt must be less than the char_limit so lets just print it.
//                 }
//         } elseif( !empty( $content ) ) {
//                 // If no excerpt exists we use the content, note the use of get_post as we are outside the loop.
//                 $content_stripped = strip_tags( $content );
//                 $content_length = strlen( $content_stripped );
//                 if ( $content_length > $char_limit ) {
//                     $content_trimmed = substr( $content_stripped, 0, $char_limit ); // Trim the raw content back to the character limit
//                     $last_space = strrpos( $content_trimmed, ' ' ); // Find the last space in the trimmed content which could include incomplete words
//                         $description = substr( $content_trimmed, 0, $last_space ); // Re-trim the content to the point of the last space.
//               } else {
//                         $description = $content_stripped;
//                 }
//         } else {
//             $description = $tagline; // If the page is empty we can use the tagline to prevent emptiness.
//         }
//         return $description;
// }


?>