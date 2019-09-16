<?php

/**
* Plugin Name: MYL Custom Functions
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

    add_theme_support('woocommerce');
    

}
add_action('after_setup_theme', 'myl_catalogue_init');




/** ***********************************************************************
 * THEME SPECIFIC - WOOCOMMERCE CUSTOM FUNCTIONS
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


/**
* Things for the Woocommerce Admin Only
*/
if ( is_admin() ) {

    /**
    * Add attributes to menus and menu options
    */
    add_filter('woocommerce_attribute_show_in_nav_menus', 'wc_reg_for_menus', 1, 2);
    function wc_reg_for_menus( $register, $name = '' ) {
         if ( $name == 'pa_occasions' ) $register = true;
         if ( $name == 'pa_collections' ) $register = true;
         return $register;
        }


    /**
    * Remove Tabs on Product Page Details
    */
    add_filter('woocommerce_product_data_tabs', 'remove_linked_products', 10, 1);
    function remove_linked_products($tabs){
        unset($tabs['general']);
        unset($tabs['inventory']);
        unset($tabs['shipping']);
        unset($tabs['linked_product']);
        //unset($tabs['attribute']);
        unset($tabs['advanced']);
        return($tabs);
    }
    


}


/*
 * Woocommerce Remove excerpt from single product
 */
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20 );
add_action( 'woocommerce_single_product_summary', 'the_content', 20 );


add_filter( 'facetwp_template_use_archive', '__return_true' );


function my_facetwp_is_main_query( $is_main_query, $query ) {
    if ( isset( $query->query_vars['facetwp'] ) ) {
        $is_main_query = true;
    }
    return $is_main_query;
}
add_filter( 'facetwp_is_main_query', 'my_facetwp_is_main_query', 10, 2 );


// add_filter( 'wc_attribute_label', 'custom_attribute_label', 10, 3 );
// function custom_attribute_label( $label, $name, $product ) {
//     $taxonomy = 'pa_'.$name;

//     if( $taxonomy == 'pa_our-designers' )
//         $label .= '<span>' . __('Designer', 'woocommerce') . '</span>';

//     return $label;
// }



/**
* @snippet Hide Price & Add to Cart for Logged Out Users
*/
add_action( 'after_setup_theme', 'catalogue_mode_only' );
function catalogue_mode_only() {
    remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10 );
    remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30 );
    //remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 10 );
    //remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10 );
}


// function prefix_category_title( $title ) {
//     if ( is_category() ) {
//         $title = single_cat_title( '', false );
//     }
//     return $title;
// }
// add_filter( 'get_the_archive_title', 'prefix_category_title' );


/** Disable Ajax Call from WooCommerce */
// add_action( 'wp_enqueue_scripts', 'dequeue_woocommerce_cart_fragments', 11);
// function dequeue_woocommerce_cart_fragments() { if (is_front_page()) wp_dequeue_script('wc-cart-fragments'); }
 
/** Disable Ajax Call from WooCommerce on front page and posts*/
// add_action( 'wp_enqueue_scripts', 'dequeue_woocommerce_cart_fragments', 11);
// function dequeue_woocommerce_cart_fragments() {
//     if (is_front_page() || is_single() ) wp_dequeue_script('wc-cart-fragments');
// }


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



/*
*   Modify Single Page Product Wrappers
*   Change wrappers
*   Move Breadcrumb Out
*/
// First remove default wrapper
remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);

// Then add new wrappers
add_action('woocommerce_before_main_content', 'myl_theme_wrapper_start', 10);
add_action('woocommerce_after_main_content', 'myl_theme_wrapper_end', 10);

function myl_theme_wrapper_start() {
    
    // echo '<div id="inner-content" class="fluid inner-content cf"> ' do_action('woo_custom_breadcrumb'); '
    //<main id="main" class="main-content" role="main" itemscope="" itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">';

    echo '<div id="inner-content" class="inner-content cf">';
    do_action('woo_custom_breadcrumb');
    echo '<main id="main" class="main-content--full-width" role="main">';
}

function myl_theme_wrapper_end() {
  echo '</main>
            </div>';
}


/*
*   Output Category Name into Single Product meta
*/
function wpa89819_wc_single_product(){

    $product_cats = wp_get_post_terms( get_the_ID(), 'product_cat' );

    if ( $product_cats && ! is_wp_error ( $product_cats ) ){
        $single_cat = array_shift( $product_cats ); ?>
        <h3 class="wfsb product-category-title"><?php echo $single_cat->name; ?></h3>
<?php }
}
add_action( 'woocommerce_single_product_summary', 'wpa89819_wc_single_product', 55 );


/**
 * Remove the description tab in woocommerce
 */
add_filter( 'woocommerce_product_tabs', 'sd_remove_product_tabs', 98 );
function sd_remove_product_tabs( $tabs ) {
    unset( $tabs['description'] );
    return $tabs;
}






/**
 * Reposition the breadcrumb above the main content wrappers
 */
function woocommerce_remove_breadcrumb(){
    remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20 );
}
add_action( 'woocommerce_before_main_content', 'woocommerce_remove_breadcrumb' );

function woocommerce_custom_breadcrumb(){
    woocommerce_breadcrumb();
}
add_action( 'woo_custom_breadcrumb', 'woocommerce_custom_breadcrumb' );

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
 * Add the ability to sort by oldest to newest
 */
function woo_catalog_orderby( $orderby ) {
    // Add "Sort by date: oldest to newest" to the menu
    // We still need to add the functionality that actually does the sorting
    $orderby['oldest_to_recent'] = __( 'Sort by date: oldest to newest', 'woocommerce' );

    // Change the default "Sort by newness" to "Sort by date: newest to oldest"
    $orderby["date"] = __('Sort by date: newest to oldest', 'woocommerce');

    // Remove price & price-desc
    // Options: menu_order, popularity, rating, date, price, price-desc
    //unset($orderby["price"]);
    unset($orderby["price-desc"]);
    unset($orderby["rating"]);

    return $orderby;
}
add_filter( 'woocommerce_catalog_orderby', 'woo_catalog_orderby', 20 );


/**
 * Add the ability to sort by oldest to newest
 */
function woo_get_catalog_ordering_args( $args ) {
    $orderby_value = isset( $_GET['orderby'] ) ? woocommerce_clean( $_GET['orderby'] ) : apply_filters( 'woocommerce_default_catalog_orderby', get_option( 'woocommerce_default_catalog_orderby' ) );

    if ( 'oldest_to_recent' == $orderby_value ) {
        $args['orderby'] = 'date';
        $args['order']   = 'ASC';
    }

    return $args;
}
//add_filter( 'woocommerce_get_catalog_ordering_args', 'woo_commerce_get_catalog_ordering_args', 20 );


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



/**
 * Remove Add to Cart messaging
 */
add_filter( 'wc_add_to_cart_message', 'remove_add_to_cart_message' );
function remove_add_to_cart_message() {
    return;
}



//custom get price html
//add_filter( 'woocommerce_get_price_html', 'custom_price_html', 100, 2 );
// function custom_price_html( $price, $product ){
//     return str_replace( '</span>', '<span class="del-img"></span></span>', $price );
// }

// function custom_price_html($price, $product) { 
//     echo '<p>', $price, '</p>';
// };     
// add_action( 'woocommerce_get_price_html', 'custom_price_html', 100, 2 );



// remove ratings
// remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10 );

// add_action( 'woocommerce_single_product_summary', 'my_woocommerce_template_single_rating', 10 );

// function my_woocommerce_template_single_rating() {
//     global $product;

//     if ( $product->post->comment_status === 'open' )
//         wc_get_template( 'single-product/rating.php' );

//     return true;
// }


// function sv_add_text_above_wc_shop_image() {
    
//     echo '<h4 style="text-align: center;">Some sample text</h4>';
// }
// add_action( 'woocommerce_before_shop_loop_item_title', 'sv_add_text_above_wc_shop_image', 11 );


// remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10 );
// add_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10 );



// // First remove default wrapper
// remove_action( 'woocommerce_before_shop_loop_item', 'woocommerce_output_content_wrapper', 10);
// remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_output_content_wrapper_end', 10);

// // Then add new wrappers
// add_action('woocommerce_before_main_content', 'myl_theme_wrapper_start', 10);
// add_action('woocommerce_after_main_content', 'myl_theme_wrapper_end', 10);

/* Your code goes above here. */

?>