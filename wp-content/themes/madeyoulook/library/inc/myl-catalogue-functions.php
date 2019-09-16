<?php

/**
* MYL Custom Catalogue Functions
* Description: Made You Look custom functions plugin. Contains all general WP specific, non theme specific, functions.
* Author: Dylan Pitchford
* Version: 0.1
*/


/** ***********************************************************************
 * THEME SPECIFIC - Global Functions
 *********************************************************************** */

// Head Cleanup Reset
//require_once( 'head-reset.php' );

// Include Menus and Navigation structure
//require_once( 'navigation.php' );


// USE THIS TEMPLATE TO CREATE CUSTOM POST TYPES EASILY
//require_once( 'library/plugins/custom-post-type.php' );


function myl_catalogue_init () {
    // Turn on MYL Theme for Woocommerce
    add_theme_support('woocommerce');

    // Only if it's the admin execute these
    if ( is_admin() ) {

        // Add attributes to menus and menu options
        add_filter('woocommerce_attribute_show_in_nav_menus', 'wc_add_menus', 1, 2);

        // Remove Tabs on Product Page Details
        add_filter('woocommerce_product_data_tabs', 'remove_linked_products', 10, 1);
    }
}
add_action('after_setup_theme', 'myl_catalogue_init');



/** ***********************************************************************
 * ADMIN SPECIFIC - CATALOGUE CUSTOM FUNCTIONS
 *********************************************************************** */

/**
* Things for the Admin Only
*/
if ( is_admin() ) {
    /**
        * Add attributes to menus and menu options
    */
    function wc_add_menus( $register, $name = '' ) {
         if ( $name == 'pa_occasions' ) $register = true;
         if ( $name == 'pa_collections' ) $register = true;
         return $register;
        }

    /**
        * Remove Tabs on Product Page Details
    */
    function remove_linked_products($tabs){
        unset($tabs['general']);
        unset($tabs['inventory']);
        unset($tabs['shipping']);
        unset($tabs['linked_product']);
        //unset($tabs['attribute']);
        unset($tabs['advanced']);
        return($tabs);
    }

    add_filter( 'woocommerce_products_admin_list_table_filters', 'remove_products_admin_list_table_filters', 10, 1 );
    function remove_products_admin_list_table_filters( $filters ){
        // Remove "Product type" dropdown filter
        if( isset($filters['product_type']))
            unset($filters['product_type']);

        // Remove "Product stock status" dropdown filter
        if( isset($filters['stock_status']))
            unset($filters['stock_status']);

        return $filters;
    }
}


/** ***********************************************************************
 * CATALOGUE SCRIPTS AND STYLES SET UP REORG
 *********************************************************************** */
// Clean up woocommerce assets output - what and when gets loaded
function woocommerce_script_cleaner() {
    
    // Remove the generator tag
    remove_action( 'wp_head', array( $GLOBALS['woocommerce'], 'generator' ) );

    remove_theme_support( 'wc-product-gallery-lightbox' );
    remove_theme_support( 'wc-product-gallery-zoom' );
    remove_theme_support( 'wc-product-gallery-slider' );

    // wp_deregister_script( 'js-cookie' );
    // wp_dequeue_script( 'js-cookie' );

    // Unless we're in the store, remove all the cruft!
    if ( ! is_woocommerce() && ! is_cart() && ! is_checkout() ) {

        wp_dequeue_style( 'woocommerce_frontend_styles' );
        wp_dequeue_style( 'woocommerce-general');
        wp_dequeue_style( 'woocommerce-layout' );
        wp_dequeue_style( 'woocommerce-smallscreen' );
        wp_dequeue_style( 'woocommerce_fancybox_styles' );
        wp_dequeue_style( 'woocommerce_chosen_styles' );
        wp_dequeue_style( 'woocommerce_prettyPhoto_css' );
        wp_dequeue_style( 'woocommerce-inline-inline' );

        //wp_dequeue_style( 'facetwp_load_css' );

        wp_dequeue_script( 'wc_price_slider' );
        wp_dequeue_script( 'wc-single-product' );
        wp_dequeue_script( 'woocommerce' );

        wp_dequeue_script( 'prettyPhoto' );
        wp_dequeue_script( 'prettyPhoto-init' );

        //wp_dequeue_script( 'jquery-blockui' );
        wp_dequeue_script( 'fancybox' );
        wp_dequeue_script( 'wc-chosen' );       
    }
}
add_action( 'wp_enqueue_scripts', 'woocommerce_script_cleaner', 99 );

/**
 * Dequeue Styles
 */
function wc_dequeue_unnecessary_styles() {

    wp_deregister_script('jquery');
    wp_dequeue_script( 'jquery' );

    wp_dequeue_script( 'wc-cart-fragments' );
    wp_deregister_script( 'wc-cart-fragments' );

    wp_dequeue_script( 'wc-cart' );
    wp_deregister_script( 'wc-cart' );

    wp_dequeue_script( 'wc-add-to-cart' );
    wp_deregister_script( 'wc-add-to-cart' );

    wp_dequeue_script( 'wc-checkout' );
    wp_deregister_script( 'wc-checkout' );

    wp_dequeue_script( 'wc-credit-card-form' );
    wp_deregister_script( 'wc-credit-card-form' );

    wp_dequeue_script( 'selectWoo' );
    wp_deregister_script( 'selectWoo' );

    wp_dequeue_script( 'jquery-placeholder' );
    wp_deregister_script( 'jquery-placeholder' );

    wp_dequeue_script( 'jquery-payment' );
    wp_deregister_script( 'jquery-payment' );

    wp_dequeue_script( 'jqueryui' );
    wp_deregister_script( 'jqueryui' );

    wp_dequeue_script( 'wc-checkout' );
    wp_deregister_script( 'wc-checkout' );

    wp_dequeue_script( 'wc-add-to-cart-variation' );
    wp_deregister_script( 'wc-add-to-cart-variation' );

    wp_dequeue_script( 'wc-add-payment-method' );
    wp_deregister_script( 'wc-add-payment-method' );

    wp_dequeue_script( 'wc-lost-password' );
    wp_deregister_script( 'wc-lost-password' );
}
add_action( 'wp_enqueue_scripts', 'wc_dequeue_unnecessary_styles' );




/** ***********************************************************************
 * CATALOGUE Globals
 *********************************************************************** */

/**
    * Remove Add to cart button globally - possible to turn off prices as well
*/
add_action( 'after_setup_theme', 'catalogue_mode_only' );
function catalogue_mode_only() {
    remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10 );
    remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30 );
    //remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 10 );
    //remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10 );
}

/**
  * Remove link wrapping main product image in single product view.
  * @param $html
  * @param $post_id
  * @return string
*/
add_filter('woocommerce_single_product_image_thumbnail_html','wc_remove_link_on_thumbnails' );

function wc_remove_link_on_thumbnails( $html ) {
    return strip_tags( $html,'<img>' );
}

/**
 * Remove Add to Cart messaging
 */
add_filter( 'wc_add_to_cart_message', 'remove_add_to_cart_message' );
function remove_add_to_cart_message() {
    return;
}


/** ***********************************************************************
 * CATALOGUE THEME SPECIFIC FUNCTIONS AND TEMPLATE MODS
 *********************************************************************** */
/**
 * Change several of the breadcrumb defaults - remove delimiter, change html structure
 */
add_filter( 'woocommerce_breadcrumb_defaults', 'myl_woocommerce_breadcrumbs' );
function myl_woocommerce_breadcrumbs() {
    return array(
            'delimiter'   => '',
            'wrap_before' => '<nav class="global-breadcrumb" role="navigation"><ul class="breadcrumb-list fluid cf" itemscope itemtype="http://schema.org/BreadcrumbList">',
            'wrap_after'  => '</ul></nav>',
            'before'      => '<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">',
            'after'       => '</li>',
            'home'        => _x( 'Home', 'breadcrumb', 'woocommerce' ),
        );
}


add_filter('breadcrumbs_trail', 'breadcrumbs_args_mod', 10, 2);
function breadcrumbs_args_mod($trail, $args){
    unset($trail[0]);
    return $trail;
}

/**
 * Adjust thumbnail sizing
 */
remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10 );
add_action( 'woocommerce_before_shop_loop_item_title', 'custom_loop_product_thumbnail', 10 );
function custom_loop_product_thumbnail() {
    global $product;
    $size = 'woocommerce_thumbnail';

    $image_size = apply_filters( 'single_product_archive_thumbnail_size', $size );

    return $product ? $product->get_image( $image_size ) : '';
}


add_filter( 'woocommerce_product_tabs', 'woo_remove_product_tabs', 98 );

function woo_remove_product_tabs( $tabs ) {

    unset( $tabs['description'] );          // Remove the description tab
    unset( $tabs['reviews'] );          // Remove the reviews tab
    //unset( $tabs['additional_information'] );   // Remove the additional information tab

    return $tabs;

}

// if we're not on the shop page or the individual product pages override the excerpt
if ( !is_shop() && !is_product() ) {
  remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20 );
  add_action( 'woocommerce_single_product_summary', 'the_content', 20 );
}
//add_action('woocommerce_after_shop_loop_item_title','woocommerce_template_single_excerpt', 5);

remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );
add_action( 'woocommerce_after_single_product', 'woocommerce_output_related_products', 30 );


remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_title', 5 );
add_action( 'woocommerce_before_single_product_summary', 'woocommerce_template_single_title', 5 );

/** ***********************************************************************
 * FACETWP Filtering Specific functions
 *********************************************************************** */

/**
    * Turn on FacetWP for Archive pages
*/
// add_filter( 'facetwp_template_use_archive', '__return_true' );



?>