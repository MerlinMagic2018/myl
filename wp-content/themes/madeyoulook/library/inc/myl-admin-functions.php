<?php
/*------------------------------------
 * Theme: Made You Look 
 * File: Admin custom functions
 * Author: Dylan Pitchford
 * E: pitchford.dylan@gmail.com
 *------------------------------------
 *
 * This file handles the admin area and functions.
 * You can use this file to make changes to the
 * dashboard and other adminifications.
 *
 */

if ( ! function_exists( 'admin_setup' ) ) :

    function admin_setup() {
        /*
        *   MYL Custom Tweaks
        */

        // replace WordPress Howdy in WordPress 3.3+
        add_filter( 'admin_bar_menu', 'replace_howdy',25 );

        // adding it to the admin area
        add_filter( 'admin_footer_text', 'template_custom_admin_footer' );

        // Hide WordPress Update Nag to All But Admins
        add_action( 'admin_head', 'hide_update_notice_to_all_but_admin', 1 );

        // Hide Submenus
        add_action('admin_menu', 'hide_unnecessary_wordpress_menus', 999);

        // Remove H1 from editor
        add_filter('tiny_mce_before_init', 'cleanup_mce' );

        // Remove Dashboard Widgets
        add_action('wp_dashboard_setup', 'myl_remove_dashboard_widgets');

        // Style the Dashboard Admin
        add_action('admin_enqueue_scripts', 'admin_style');
        add_action('admin_enqueue_scripts', 'admin_style1');

    }

endif;
add_action( 'after_setup_theme', 'admin_setup' );


/*
*   Update CSS within in Admin
*/
function admin_style() {
    wp_enqueue_style('admin-styles1', get_template_directory_uri() . '/library/css/admin.css?v=001');
}
function admin_style1() {
    wp_enqueue_style('admin-styles', '/assets/css/core/fonts.css?v=001');
}


/*
*   Custom Login Logo
*/
function custom_loginlogo() {
    echo '<style type="text/css">
    h1 a {background-image: url('.get_bloginfo('template_directory').'/images/login_logo.png) !important; }
    </style>';
    }
add_action('login_head', 'custom_loginlogo');

/*
*   replace WordPress Howdy
*/
function replace_howdy( $wp_admin_bar ) {
    $my_account=$wp_admin_bar->get_node('my-account');
    $newtitle = str_replace( 'Howdy,', 'Logged in as:', $my_account->title );            
    $wp_admin_bar->add_node( array(
        'id' => 'my-account',
        'title' => $newtitle,
      ) 
  );
}

/*
*   Custom Backend Footer
*/
function template_custom_admin_footer() {
    _e( '<span id="footer-thankyou">Made You Look Custom Jewellery.', 'templatetheme' );
}

/*
*   Hide WordPress Update Nag to All But Admins
*/
function hide_update_notice_to_all_but_admin() {
    if ( !current_user_can( 'update_core' ) ) {
        remove_action( 'admin_notices', 'update_nag', 3 );
    }
}


/*
*   Hide Unnecessary Menus and Sub Menus
*/
function hide_unnecessary_wordpress_menus(){
    global $submenu;
    global $current_user;
    wp_get_current_user();

    foreach($submenu['themes.php'] as $menu_index => $theme_menu){
        if($theme_menu[0] == 'Header' || $theme_menu[0] == 'Background' || $theme_menu[0] == 'Customize' || $theme_menu[0] == 'Editor')
        unset($submenu['themes.php'][$menu_index]);
    };

    if(!$current_user->user_login == 'myl_overlord'){

        // Hide Comments
        remove_menu_page( 'edit-comments.php' );

        // remove_menu_page( 'add-post-type-post' );

        remove_menu_page( 'edit.php?post_type=shop_order' );

        remove_menu_page('edit.php');

        remove_menu_page( 'woocommerce');

        remove_menu_page( 'plugins.php');

        remove_menu_page( 'tools.php');

        remove_menu_page( 'options-general.php');

        remove_menu_page( 'edit.php?post_type=acf-field-group');

        // Hide Woocommerce
        // If the current user is not an admin - currently off for everyone
        // if ( !current_user_can('manage_options') ) {
             remove_menu_page( 'woocommerce' ); // WooCommerce admin menu slug
        // }

    }


}

/*
*   Remove H1 from editor
*/
function cleanup_mce($args) {
// Just omit h1 from the list
    $args['block_formats'] = 'Paragraph=p;Heading 3=h3;Heading 4=h4; Heading 5=h5; Heading 6=h6';
    return $args;
}


/*
*   This cleans up a lot of the widgets on the Dashboard page. If you want to have any of these back, comment them out.
*/
function myl_remove_dashboard_widgets() {
    remove_meta_box('dashboard_quick_press','dashboard','side'); // Quick Press widget
    remove_meta_box('dashboard_recent_drafts','dashboard','side'); // Recent Drafts
    remove_meta_box('dashboard_primary','dashboard','side'); // WordPress.com Blog
    remove_meta_box('dashboard_secondary','dashboard','side'); // Other WordPress News
    remove_meta_box('dashboard_incoming_links','dashboard','normal'); // Incoming Links
    remove_meta_box('dashboard_plugins','dashboard','normal'); // Plugins
    remove_meta_box('dashboard_right_now','dashboard', 'normal'); // Right Now
    remove_meta_box('rg_forms_dashboard','dashboard','normal'); // Gravity Forms
    remove_meta_box('dashboard_recent_comments','dashboard','normal'); // Recent Comments
    remove_meta_box('icl_dashboard_widget','dashboard','normal'); // Multi Language Plugin
    // remove_meta_box('dashboard_activity','dashboard', 'normal'); // Activity
    remove_action('welcome_panel','wp_welcome_panel');

    // woocommerce widgets
    remove_meta_box( 'woocommerce_network_orders', 'dashboard-network', 'normal' );
    remove_meta_box( 'woocommerce_dashboard_status', 'dashboard', 'normal');
    remove_meta_box( 'woocommerce_dashboard_recent_reviews', 'dashboard', 'normal');
}


/*
*   Custom Dashboard widget
*/
// function my_custom_dashboard_widgets() {
//     global $wp_meta_boxes;
//     wp_add_dashboard_widget('custom_help_widget', 'Theme Support', 'custom_dashboard_help');
// }
// function custom_dashboard_help() {
// echo '<p>Welcome to Custom Blog Theme! Need help? Contact the developer <a href="mailto:yourusername@gmail.com">here</a>. For WordPress Tutorials visit: <a href="https://www.wpbeginner.com" target="_blank">WPBeginner</a></p>';
// }
// add_action('wp_dashboard_setup', 'my_custom_dashboard_widgets');


/* Automatically set the image Title, Alt-Text, Caption & Description upon upload
--------------------------------------------------------------------------------------*/
add_action( 'add_attachment', 'myl_set_image_meta_upon_image_upload' );
function myl_set_image_meta_upon_image_upload( $post_ID ) {

    // Check if uploaded file is an image, else do nothing

    if ( wp_attachment_is_image( $post_ID ) ) {

        $my_image_title = get_post( $post_ID )->post_title;

        // Sanitize the title:  remove hyphens, underscores & extra spaces:
        $my_image_title = preg_replace( '%\s*[-_\s]+\s*%', ' ',  $my_image_title );

        // Sanitize the title:  capitalize first letter of every word (other letters lower case):
        $my_image_title = ucwords( strtolower( $my_image_title ) );

        // Create an array with the image meta (Title, Caption, Description) to be updated
        // Note:  comment out the Excerpt/Caption or Content/Description lines if not needed
        $my_image_meta = array(
            'ID'        => $post_ID,            // Specify the image (ID) to be updated
            'post_title'    => '',      // Set image Title to sanitized title
            //'post_excerpt'    => $my_image_title,     // Set image Caption (Excerpt) to sanitized title
            //'post_content'    => $my_image_title,     // Set image Description (Content) to sanitized title
        );

        // Set the image Alt-Text
        update_post_meta( $post_ID, '_wp_attachment_image_alt', 'Photo of ' . $my_image_title );

        //$my_image_title . ‘ | ‘ . get_bloginfo( ‘name’ ) );

        // Set the image meta (e.g. Title, Excerpt, Content)
        wp_update_post( $my_image_meta );

    } 
}


/**
 * Filter image alt & title attributes to ensure they aren't image paths
 *
 * @param array $attr
 * @return array
 */
function myl_filter_wp_get_attachment_image_attributes( $attr ) {
    # If alt attr is an image path, set to an empty string
    // if ( isset( $attr['alt'] ) && false !== preg_match( '/\.(jpe?g|gif|png)$/i', $attr['alt'] ) )
    //  $attr['alt'] = '';

    # If title attr is an image path, set to alt
    if ( isset( $attr['title'] ) && false !== preg_match( '/\.(jpe?g|gif|png)$/i', $attr['title'] ) )
        $attr['title'] = isset( $attr['alt'] ) ? $attr['alt'] : '';

    # If alt is empty but title is not, then set alt to title
    if ( isset( $attr['alt'], $attr['title'] ) && empty( $attr['alt'] ) && !empty( $attr['title'] ) )
        $attr['alt'] = $attr['title'];
    return $attr;
}
add_filter( 'wp_get_attachment_image_attributes', 'myl_filter_wp_get_attachment_image_attributes' );


// function myl_custom_image_sizes( $sizes ) {
//     return array_merge( $sizes, array(
//         //'myl-product-sm' => __('Product - 75px by 75px', 'myltheme'),
//         //'myl-product-med' => __('Product - 150px by 150px', 'myltheme'),
//         'myl-product-large' => __('Product - 300px by 300px', 'myltheme'),
//         'myl-product-xlarge' => __('Product - 550px by 550px', 'myltheme'),
//         //'myl-product-feature' => __('Product - 750px by 750px', 'myltheme')
//     ) );
// }
// add_filter( 'image_size_names_choose', 'myl_custom_image_sizes' );


/*
*   Show image names in media library
*/
// Add the column
function filename_column( $cols ) {
        $cols["filename"] = "Filename";
        return $cols;
}

// Display filenames
function filename_value( $column_name, $id ) {
    $meta = wp_get_attachment_metadata($id);
           echo substr( strrchr($meta['file'], '/' ), 1); 
          //Used a few PHP functions cause 'file' stores local url to file not filename
}

// Register the column as sortable & sort by name
function filename_column_sortable( $cols ) {
    $cols["filename"] = "name";

    return $cols;
}

// Hook actions to admin_init
function hook_new_media_columns() {
    add_filter( 'manage_media_columns', 'filename_column' );
    add_action( 'manage_media_custom_column', 'filename_value', 10, 2 );
    add_filter( 'manage_upload_sortable_columns', 'filename_column_sortable' );
}
add_action( 'admin_init', 'hook_new_media_columns' );


/*
*   Disable autosave
*/
function DisableAutoSave() {
    wp_deregister_script('autosave');
}
add_action( 'wp_print_scripts', 'DisableAutoSave' );


/*
*   Remove Transients on publish
*/
function remove_transient_on_publish( $new, $old, $post ) {
    if( 'publish' == $new )
        delete_transient( 'recent_posts_query_results' );
}
add_action('transition_post_status', 'remove_transient_on_publish', 10, 3 );



?>