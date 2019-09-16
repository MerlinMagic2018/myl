<?php
/*------------------------------------
 * Theme: Template by studio.bio 
 * File: Admin custom functions
 * Author: Joshua Michaels
 * URI: https://studio.bio/template
 *------------------------------------
 *
 * This file handles the admin area and functions.
 * You can use this file to make changes to the
 * dashboard and other adminifications.
 *
 */


/*********************
CUSTOM LOGIN PAGE
Customize it, we don't criticize it.
*********************/

// calling your own login css so you can style it

//Updated to proper 'enqueue' method
//http://codex.wordpress.org/Plugin_API/Action_Reference/login_enqueue_scripts
function template_login_css() {
    wp_enqueue_style( 'template_login_css', get_template_directory_uri() . '/library/css/login.css', false );
}

// changing the logo link from wordpress.org to your site
function template_login_url() {  return home_url(); }

// changing the alt text on the logo to show your site name
function template_login_title() { return get_option( 'blogname' ); }

// calling it only on the login page
add_action( 'login_enqueue_scripts', 'template_login_css', 10 );
add_filter( 'login_headerurl', 'template_login_url' );
add_filter( 'login_headertitle', 'template_login_title' );



/*********************
REMOVE DASHBOARD WIDGETS
Clean up the Dashboard, yo.
*********************/

/*
Eddie's old function wasn't working on some widgets so I've updated it
This cleans up a lot of the widgets on the Dashboard page. If you want
to have any of these back, comment them out.
*/

/** Global Admin Function */
function myl_admin_setup () {


    add_action('wp_dashboard_setup', 'myl_remove_dashboard_widgets');

    function myl_remove_dashboard_widgets() {
        remove_meta_box('dashboard_quick_press','dashboard','side'); //Quick Press widget
        remove_meta_box('dashboard_recent_drafts','dashboard','side'); //Recent Drafts
        remove_meta_box('dashboard_primary','dashboard','side'); //WordPress.com Blog
        remove_meta_box('dashboard_secondary','dashboard','side'); //Other WordPress News
        remove_meta_box('dashboard_incoming_links','dashboard','normal'); //Incoming Links
        remove_meta_box('dashboard_plugins','dashboard','normal'); //Plugins
        remove_meta_box('dashboard_right_now','dashboard', 'normal'); //Right Now
        remove_meta_box('rg_forms_dashboard','dashboard','normal'); //Gravity Forms
        remove_meta_box('dashboard_recent_comments','dashboard','normal'); //Recent Comments
        remove_meta_box('icl_dashboard_widget','dashboard','normal'); //Multi Language Plugin
        // remove_meta_box('dashboard_activity','dashboard', 'normal'); //Activity
        remove_action('welcome_panel','wp_welcome_panel');
    }


    // Hide WordPress Update Nag to All But Admins
    add_action( 'admin_head', 'hide_update_notice_to_all_but_admin', 1 );

    // replace WordPress Howdy in WordPress 3.3+
    add_filter( 'admin_bar_menu', 'replace_howdy',25 );

    // Remove toolbar
    add_filter( 'show_admin_bar', '__return_false' );
    add_action('get_header', 'remove_admin_login_header');

    /*********************
    REMOVE ADMIN MENU ITEMS
    *********************/
    add_action('admin_menu', 'remove_sub_menus');
    add_action('admin_menu', 'remove_unnecessary_wordpress_menus', 999);

    // Custom Backend Footer
    // adding it to the admin area
    add_filter( 'admin_footer_text', 'template_custom_admin_footer' );


    // Remove H1 from editor
    add_filter('tiny_mce_before_init', 'cleanup_mce' );

}
add_action('after_setup_theme', 'myl_admin_setup');


/*********************
The functions for init
*********************/

// Hide WordPress Update Nag to All But Admins
function hide_update_notice_to_all_but_admin() {
    if ( !current_user_can( 'update_core' ) ) {
        remove_action( 'admin_notices', 'update_nag', 3 );
    }
}


// replace WordPress Howdy in WordPress 3.3+
function replace_howdy( $wp_admin_bar ) {
    $my_account=$wp_admin_bar->get_node('my-account');
    $newtitle = str_replace( 'Howdy,', 'Logged in as:', $my_account->title );            
    $wp_admin_bar->add_node( array(
        'id' => 'my-account',
        'title' => $newtitle,
      ) 
  );
}


// Remove toolbar
function remove_admin_login_header() {
    remove_action('wp_head', '_admin_bar_bump_cb');
}


// Remove Admin comments
function remove_sub_menus () {
  remove_menu_page( 'edit-comments.php' );
}

// Remove Admin editor stuff
function remove_unnecessary_wordpress_menus(){
    global $submenu;
    foreach($submenu['themes.php'] as $menu_index => $theme_menu){
        if($theme_menu[0] == 'Header' || $theme_menu[0] == 'Background' || $theme_menu[0] == 'Customize' || $theme_menu[0] == 'Editor')
        unset($submenu['themes.php'][$menu_index]);
    }
}


// Custom Backend Footer
function template_custom_admin_footer() {
    _e( '<span id="footer-thankyou">Made You Look Custom Jewellery.', 'templatetheme' );
}


// Remove H1 from editor
function cleanup_mce($args) {
// Just omit h1 from the list
    $args['block_formats'] = 'Paragraph=p;Heading 3=h3;Heading 4=h4; Heading 5=h5; Heading 6=h6';
    return $args;
}


/*********************
CUSTOMIZE ADMIN
Customize it, and I'll advertise it.
*********************/

/*
I don't really recommend editing the admin too much
as things may get funky if WordPress updates. Here
are a few funtions which you can choose to use if
you like.
*/

// function template_admin_css() {
//   wp_enqueue_style( 'template_admin_css', get_template_directory_uri() . '/library/css/admin.css', false );
// }
// add_action( 'login_enqueue_scripts', 'template_admin_css', 10 );


?>