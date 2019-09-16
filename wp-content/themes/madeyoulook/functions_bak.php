<?php
/*------------------------------------
 * Theme: Made You Look 
 * File: Main functions file
 * Author: Dylan Pitchford
 * URI: 
 *------------------------------------
 *
 *
 * Extra development and debugging functions can be found
 * in template.php. Uncomment the below require_once below.
 *
 */

// LOAD TEMPLATE DEVELOPMENT FUNCTIONS (not required but helper stuff for debugging and development)
require_once( 'library/inc/template.php' );


if ( ! function_exists( 'myl_setup' ) ) :
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     */
    function myl_setup() {

        // Add default posts and comments RSS feed links to head.
        //add_theme_support( 'automatic-feed-links' );

        /*
         * Let WordPress manage the document title.
         * By adding theme support, we declare that this theme does not use a
         * hard-coded <title> tag in the document head, and expect WordPress to
         * provide it for us.
         */
        //add_theme_support( 'title-tag' );

        // A better title
        add_filter( 'wp_title', 'rw_title', 10, 3 );

        /*
         * Enable support for Post Thumbnails on posts and pages.
         *
         * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
         */
        add_theme_support( 'post-thumbnails' );
        set_post_thumbnail_size( 1568, 9999 );
        //set_post_thumbnail_size(150, 150, true);


        // wp menus
        add_theme_support( 'menus' );

        // This theme uses wp_nav_menu() in two locations.
        // register_nav_menus(
        //     array(
        //         'menu-1' => __( 'Primary', 'twentynineteen' ),
        //         'footer' => __( 'Footer Menu', 'twentynineteen' ),
        //         'social' => __( 'Social Links Menu', 'twentynineteen' ),
        //     )
        // );
        register_nav_menus(
            array(
                'main-nav' => __( 'Main Menu', 'madeyoulook' ),   // main nav in header
                'utility-nav' => __( 'Utility Menu', 'madeyoulook' ),   // secondary nav in header
                'other-links' => __( 'General Links', 'madeyoulook' ), // secondary nav in footer
                'fyi-links' => __( 'FYI', 'madeyoulook' ) // tertiary nav in footer
            )
        );

        /*
         * Switch default core markup for search form, comment form, and comments to output valid HTML5.
         */
        add_theme_support( 'html5', 
            array(  
                'search-form', 
                'gallery', 
                'caption' 
            ) 
        );

        /**
         * Add support for core custom logo.
         *
         * @link https://codex.wordpress.org/Theme_Logo
         */
        add_theme_support(
            'custom-logo',
            array(
                'height'      => 190,
                'width'       => 190,
                'flex-width'  => false,
                'flex-height' => false,
            )
        );

        // Disable the new Guttenberg Editor
        add_filter('use_block_editor_for_post', '__return_false', 5);

        // Add support for Block Styles.
        //add_theme_support( 'wp-block-styles' );

        // Add support for full and wide align images.
        add_theme_support( 'align-wide' );

        // Add support for editor styles.
        add_theme_support( 'editor-styles' );

        // Enqueue editor styles.
        //add_editor_style( 'style-editor.css' );
        add_editor_style( get_stylesheet_directory_uri() . '/library/css/editor-style.css?v=0.23' );

        // Add support for responsive embedded content.
        //add_theme_support( 'responsive-embeds' );

        // adding sidebars to Wordpress (these are created lower down in functions.php)
        add_action( 'widgets_init', 'myl_register_sidebars' );

        /* Post Formats
        Ahhhh yes, the wild and wonderful world of Post Formats. 
        I've never really gotten into them but I could see some
        situations where they would come in handy. Here's a few
        examples: https://www.competethemes.com/blog/wordpress-post-format-examples/

        This theme doesn't use post formats per se but we need this 
        to pass the theme check.

        We may add better support for post formats in the future.

        If you want to use them in your project, do so by all means. 
        We won't judge you.
        */

        add_theme_support( 'post-formats',
            array(
                'aside',             // title less blurb
                'gallery',           // gallery of images
                //'link',              // quick link to other site
                'image',             // an image
                'quote'             // a quick quote
                //'status',            // a Facebook like status update
                //'video'             // video
                //'audio',             // audio
                //'chat'               // chat transcript
            )
        );

    }
endif;
add_action( 'after_setup_theme', 'myl_setup' );



// A better title
// http://www.deluxeblogtips.com/2012/03/better-title-meta-tag.html
function rw_title( $title, $sep, $seplocation ) {
    global $page, $paged, $post;

    // Don't affect in feeds.
    if ( is_feed() ) return $title;

    // Add the blog's name
    if ( 'right' == $seplocation ) {
        $title .= 'Made You Look Jewellery';
    } else {
        $title = 'Made You Look Jewellery' . $title;
    }

    // if ( 'right' !== $parent_cats = parent_cat_names( $sep ) ){
    //     $title .= '{$parent_cats} {$sep} ';
    // }

    // Add the blog description for the home/front page.
    $site_description = get_bloginfo( 'description', 'display' );

    // if ( $site_description && ( is_home() || is_front_page() ) ) {
    //     $title .= " {$sep} {$site_description}";
    // }

    // Add a page number if necessary:
    if ( $paged >= 2 || $page >= 2 ) {
        $title .= " {$sep} " . sprintf( __( 'Page %s', 'dbt' ), max( $paged, $page, $post ) );
    }

  return $title;

} // end better title


/**
 * Remove Default Widgets
 */
function myl_register_widget() {
    //Remove Defaults
    unregister_widget('WP_Widget_Pages');
    unregister_widget('WP_Widget_Calendar');
    unregister_widget('WP_Widget_Archives');
    unregister_widget('WP_Widget_Links');
    unregister_widget('WP_Widget_Meta');
    unregister_widget('WP_Widget_Search');
    unregister_widget('WP_Widget_Categories');
    unregister_widget('WP_Widget_Recent_Comments');
    unregister_widget('WP_Widget_Tag_Cloud');
    unregister_widget('WP_Widget_RSS');
    unregister_widget('WP_Widget_Akismet');
    unregister_widget('WP_Widget_Recent_Posts');
    unregister_widget('WP_Nav_Menu_Widget');
    unregister_widget('WP_Widget_Custom_HTML');
    unregister_widget('WP_Widget_Media_Audio');
    unregister_widget('WP_Widget_Media_Image');
    unregister_widget('WP_Widget_Media_Video');
 
    //unregister_widget('WP_Widget_Text');
    //unregister_widget('PD_Top_Rated');
        
}
add_action( 'widgets_init', 'myl_register_widget');


/************* ACTIVE SIDEBARS ********************/

// Sidebars & Widgetizes Areas
function myl_register_sidebars() {
    register_sidebar(array(
        'id' => 'sidebar1',
        'name' => __( 'Sidebar 1', 'madeyoulook' ),
        'description' => __( 'The first (primary) sidebar.', 'madeyoulook' ),
        'before_widget' => '<div id="%1$s" class="region aside--region">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="wfsb title-beta">',
        'after_title' => '</h3>',
    ));

    //add_action(‘widget_init’, ‘slug_widgets_init’);

//function slug_widgets_init() {

    register_sidebar( array (
        // 'name' => 'Attributes Filters',
        // 'id' => 'attributes-filters',
        // 'description' => 'Widgets placed here will show up in the Attributes Filtering box.',
        // 'before_widget' => '<div id="product-filters-%1$s" class="product-filters attributes--filters">',
        // 'after_widget' => '</div>',
        // 'before_title' => '<h3 class="wfsb widget-title">',
        // 'after_title' => '</h3>'

        'id' => 'attributes-filters',
        'name' => __( 'Attributes Filters', 'madeyoulook' ),
        'description' => __( 'Widgets placed here will show up in the Attributes Filtering box.', 'madeyoulook' ),
        'before_widget' => '<div id="product-filters-%1$s" class="product-filters attributes--filters">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="wfsb title-beta">',
        'after_title' => '</h3>',
    ));

    register_sidebar( array (
        'id' => 'products-sidebar',
        'name' => __( 'Products Sidebar', 'madeyoulook' ),
        'description' => __( 'The Products sidebar.', 'madeyoulook' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="wfsb title-beta">',
        'after_title' => '</h3>',
    ));

    register_sidebar( array (
        'id' => 'general-sidebar',
        'name' => __( 'General Sidebar', 'madeyoulook' ),
        'description' => __( 'The General sidebar.', 'madeyoulook' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="wfsb title-beta">',
        'after_title' => '</h3>',
    ));

    register_sidebar( array (
        'id' => 'designers-sidebar',
        'name' => __( 'Designers Sidebar', 'madeyoulook' ),
        'description' => __( 'The Designer sidebar.', 'madeyoulook' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="wfsb widget-title">',
        'after_title' => '</h3>',
    ));

//}

    /*
    to add more sidebars or widgetized areas, just copy and edit the above sidebar code. In order to call your new sidebar just use the following code:

    Just change the name to whatever your new sidebar's id is, for example:

    register_sidebar(array(
        'id' => 'sidebar2',
        'name' => __( 'Sidebar 2', 'madeyoulook' ),
        'description' => __( 'The second (secondary) sidebar.', 'madeyoulook' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h4 class="widgettitle">',
        'after_title' => '</h4>',
    ));

    To call the sidebar in your template, you can just copy the sidebar.php file and rename it to your sidebar's name.
    So using the above example, it would be:
    sidebar-sidebar2.php

    */
} // don't remove this bracket!


function disable_self_pingbacks( &$links ) {
  foreach ( $links as $l => $link )
        if ( 0 === strpos( $link, get_option( 'home' ) ) )
            unset($links[$l]);
}

add_action( 'pre_ping', 'disable_self_pingbacks' );

/*
*   Admin Setup
*/
add_filter( 'show_admin_bar', '__return_false' );
add_action('get_header', 'remove_admin_login_header');

// Remove toolbar
function remove_admin_login_header() {
    remove_action('wp_head', '_admin_bar_bump_cb');
}

// MYL Custom Functions 
require_once( 'library/inc/theme-functions.php' );

// MYL Custom Functions 
require_once( 'library/inc/media-functions.php' );

// MYL Catalogue Functions 
//if ( is_woocommerce() ) {
    require_once( 'library/inc/catalogue-functions.php' );
//}

// MYL Admin Functions --- to bring the Admin interface back to a default state, comment this file out.
if ( is_admin() ) {
    require_once( 'library/inc/admin-functions.php' );
}



?>