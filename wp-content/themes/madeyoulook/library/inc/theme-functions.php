<?php

/**
* Plugin Name: MYL Theme Functions
* Description: Made You Look custom functions plugin. Contains all general WP specific, non theme specific, functions.
* Author: Dylan Pitchford
* Version: 0.1
*/


/** ***********************************************************************
 * THEME SPECIFIC - Global Functions
 *********************************************************************** */

// Head Cleanup Reset - Removes all the cruft
require_once( 'head-reset-functions.php' );

// Include Menus and Navigation structure
require_once( 'navigation-functions.php' );

// USE THIS TEMPLATE TO CREATE CUSTOM POST TYPES EASILY
//require_once( 'library/plugins/custom-post-type.php' );


/****************************************
* SCHEMA *
http://www.longren.io/add-schema-org-markup-to-any-wordpress-theme/
****************************************/

// Add support for schema attributes on the markup
function html_schema() {

    $schema = 'http://schema.org/';
 
    // Is single post
    if( is_single()) {
        $type = "Article";
    }
    // Is blog home, archive or category
    else if( is_home() || is_archive() || is_category() ) {
        $type = "Blog";
    }
    // Is static front page
    else if( is_front_page()) {
        $type = "Website";
    }
    // Is a general page
     else {
        $type = 'WebPage';
    }
 
    echo 'itemscope="itemscope" itemtype="' . $schema . $type . '"';
}


if ( ! function_exists( 'myl_custom_init' ) ) :
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     */

    function myl_custom_init () {

        // Support for Excerpts on pages
        add_post_type_support( 'page', 'excerpt' );

        // cleaning up random code around images
        add_filter( 'the_content', 'myl_filter_ptags_on_images' );

        // cleaning up excerpt
        //add_filter( 'excerpt_more', 'myl_excerpt_more' );

        // Remove Commenting completely
        add_action('init','comments_clean_header_hook');

    }
endif;
add_action('after_setup_theme', 'myl_custom_init');


// add_filter( 'post_class', 'be_first_post_class' );
// *
//  * First Post Class
//  * Adds a class of 'first' to the first post
//  *
//  * @author Bill Erickson
//  * @link http://www.billerickson.net/code/first-post-class
//  *
//  * @param array $classes
//  * @return array
 
// function be_first_post_class( $classes ) {
//     global $wp_query;
//     if( 0 == $wp_query->current_post )
//         $classes[] = 'first';
//     return $classes;
// }

/*********************
RANDOM CLEANUP ITEMS
*********************/

/**
 * remove the p from around imgs (http://css-tricks.com/snippets/wordpress/remove-paragraph-tags-from-around-images/)
 */
function myl_filter_ptags_on_images($content){
    return preg_replace('/<p>\s*(<a .*>)?\s*(<img .* \/>)\s*(<\/a>)?\s*<\/p>/iU', '\1\2\3', $content);
}

/**
 * This removes the annoying […] to a Read More link
 */
function myl_excerpt_more($more) {
    global $post;
    // edit here if you like
    return '...  <a class="excerpt-read-more" href="'. get_permalink( $post->ID ) . '">'. __( 'Read more &raquo;', 'myltheme' ) .'</a>';
}

/**
 * Remove Commenting completely
 */
function comments_clean_header_hook(){
    wp_deregister_script( 'comment-reply' );
}


// function custom_the_excerpt( $excerpt ) {
//     global $post;

//     if( $post->post_excerpt ) {
//         // If the post has manual excerpt,
//         // it already has a point to end
//         // the paragraph, so we don't want
//         // the point + the ellipsis: ....
//         // Clean it!
//         $ellipsis = '';
//     } else {
//         $ellipsis = '...';
//     }

//     // Save the link in a variable
//     $link = $ellipsis . ' <a class="cc is--inline" href="' . get_permalink( get_the_ID() ) . '">' . __( 'Read more', 'starion' ) . '</a>  &raquo;';

//     // Concatenate the link to the excerpt
//     return $excerpt . $link;

//     }

// add_filter( 'get_the_excerpt', 'custom_the_excerpt' );

// CHANGE EXCERPT LENGTH FOR DIFFERENT POST TYPES
 
    function isacustom_excerpt_length($length) {
    global $post;
        if ($post->post_type == 'post')
            return 10;
        else if ($post->post_type == 'products')
            return 10;
        else if ($post->post_type == 'designers')
            return 10;
        else
            return 10;
    }
    //add_filter('excerpt_length', 'isacustom_excerpt_length');


/*********************
RELATED POSTS FUNCTION
*********************/

// Related Posts Function (call using myl_related_posts(); )
function myl_related_posts() {
    echo '<ul id="template-related-posts">';
    global $post;
    $tags = wp_get_post_tags( $post->ID );
    if($tags) {
        foreach( $tags as $tag ) {
        $tag_arr .= $tag->slug . ',';
    }
    $args = array(
        'tag' => $tag_arr,
        'numberposts' => 3, /* you can change this to show more */
        'post__not_in' => array($post->ID)
    );
    $related_posts = get_posts( $args );
    if($related_posts) {
        foreach ( $related_posts as $post ) : setup_postdata( $post ); ?>
        <li class="related_post"><a class="entry-unrelated" href="<?php the_permalink() ?>"><?php the_title(); ?></a></li>
    <?php endforeach; }
    else { ?>
    <?php echo '<li class="no_related_post">' . __( 'No Related Posts Yet!', 'templatetheme' ) . '</li>'; ?>
    <?php }
    }
    wp_reset_postdata();
    echo '</ul>';
} /* end template related posts function */


/*********************
MULTIPLE FEATURED IMAGES
*********************/

/* USAGE : 
To create more images you can adjust the$meta_keys-Array in custom_postimage_meta_box_func($post)and custom_postimage_meta_box_save($post)

To get the saved image ID, you can use get_post_meta( $post_id, 'second_featured_image', true);. So maybe like this:

<?php echo wp_get_attachment_image(get_post_meta( $post_id, 'second_featured_image', true),'thumbnail'); ?>
<?php echo wp_get_attachment_image(get_post_meta(get_the_ID(), 'second_featured_image', true),'full'); ?> 
*/

//init the meta box
add_action( 'after_setup_theme', 'custom_postimage_setup' );
function custom_postimage_setup(){
    add_action( 'add_meta_boxes', 'custom_postimage_meta_box' );
    add_action( 'save_post', 'custom_postimage_meta_box_save' );
}

function custom_postimage_meta_box(){

    //on which post types should the box appear?
    $post_types = array('page', 'designers');
    foreach($post_types as $pt){
        add_meta_box('custom_postimage_meta_box',__( 'More Featured Images', 'madeyoulook'),'custom_postimage_meta_box_func',$pt,'side','low');
    }
}

function custom_postimage_meta_box_func($post){

    //an array with all the images (ba meta key). The same array has to be in custom_postimage_meta_box_save($post_id) as well.
    //$meta_keys = array('second_featured_image','third_featured_image');
    $meta_keys = array('second_featured_image');

    foreach($meta_keys as $meta_key){
        $image_meta_val=get_post_meta( $post->ID, $meta_key, true);
        ?>
        <div class="custom_postimage_wrapper" id="<?php echo $meta_key; ?>_wrapper">
            <p><img src="<?php echo ($image_meta_val!=''?wp_get_attachment_image_src( $image_meta_val)[0]:''); ?>" class="attachment-post-thumbnail size-post-thumbnail" style="display: <?php echo ($image_meta_val!=''?'block':'none'); ?>" alt=""></p>
            <p><a href="#" class="addimage button" onclick="custom_postimage_add_image('<?php echo $meta_key; ?>');"><?php _e('add image','madeyoulook'); ?></a></p>
            <p><a href="#" class="removeimage" style="display: <?php echo ($image_meta_val!=''?'block':'none'); ?>" onclick="custom_postimage_remove_image('<?php echo $meta_key; ?>');"><?php _e('remove image','madeyoulook'); ?></a></p>
            <input type="hidden" name="<?php echo $meta_key; ?>" id="<?php echo $meta_key; ?>" value="<?php echo $image_meta_val; ?>" />
        </div>
    <?php } ?>
    <script>
    function custom_postimage_add_image(key){

        var $wrapper = jQuery('#'+key+'_wrapper');

        custom_postimage_uploader = wp.media.frames.file_frame = wp.media({
            title: '<?php _e('select image','madeyoulook'); ?>',
            button: {
                text: '<?php _e('select image','madeyoulook'); ?>'
            },
            multiple: false
        });
        custom_postimage_uploader.on('select', function() {

            var attachment = custom_postimage_uploader.state().get('selection').first().toJSON();
            var img_url = attachment['url'];
            var img_id = attachment['id'];
            $wrapper.find('input#'+key).val(img_id);
            $wrapper.find('img').attr('src',img_url);
            $wrapper.find('img').show();
            $wrapper.find('a.removeimage').show();
        });
        custom_postimage_uploader.on('open', function(){
            var selection = custom_postimage_uploader.state().get('selection');
            var selected = $wrapper.find('input#'+key).val();
            if(selected){
                selection.add(wp.media.attachment(selected));
            }
        });
        custom_postimage_uploader.open();
        return false;
    }

    function custom_postimage_remove_image(key){
        var $wrapper = jQuery('#'+key+'_wrapper');
        $wrapper.find('input#'+key).val('');
        $wrapper.find('img').hide();
        $wrapper.find('a.removeimage').hide();
        return false;
    }
    </script>
    <?php
    wp_nonce_field( 'custom_postimage_meta_box', 'custom_postimage_meta_box_nonce' );
}

function custom_postimage_meta_box_save($post_id){

    if ( ! current_user_can( 'edit_posts', $post_id ) ){ return 'not permitted'; }

    if (isset( $_POST['custom_postimage_meta_box_nonce'] ) && wp_verify_nonce($_POST['custom_postimage_meta_box_nonce'],'custom_postimage_meta_box' )){

        //same array as in custom_postimage_meta_box_func($post)
        //$meta_keys = array('second_featured_image','third_featured_image');
        $meta_keys = array('second_featured_image');
        foreach($meta_keys as $meta_key){
            if(isset($_POST[$meta_key]) && intval($_POST[$meta_key])!=''){
                update_post_meta( $post_id, $meta_key, intval($_POST[$meta_key]));
            }else{
                update_post_meta( $post_id, $meta_key, '');
            }
        }
    }
}

/*********************
Register Designer Custom Fields
*********************/

if( function_exists('acf_add_local_field_group') ):

acf_add_local_field_group(array(
    'key' => 'group_5c5086e60499e',
    'title' => 'Designer Bios',
    'fields' => array(
        array(
            'key' => 'field_5c50871b9a537',
            'label' => 'Featured Products',
            'name' => 'featured_products',
            'type' => 'text',
            'instructions' => 'Featured Products for the designer Bio page',
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => array(
                'width' => '',
                'class' => '',
                'id' => '',
            ),
            'default_value' => '',
            'placeholder' => 'Shortcode Here',
            'prepend' => '',
            'append' => '',
            'maxlength' => '',
        ),
        array(
            'key' => 'field_5c5087ec55981',
            'label' => 'Wedding Products',
            'name' => 'wedding_products',
            'type' => 'text',
            'instructions' => 'Product images for the "Wedding" spot within their profiles - if exists',
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => array(
                'width' => '',
                'class' => '',
                'id' => '',
            ),
            'default_value' => '',
            'placeholder' => 'Shortcode here',
            'prepend' => '',
            'append' => '',
            'maxlength' => '',
        ),
        array(
            'key' => 'field_5c5088239907f',
            'label' => 'Engagement Products',
            'name' => 'engagement_products',
            'type' => 'text',
            'instructions' => 'Product images for the "Engagement" spot within their profiles - if exists',
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => array(
                'width' => '',
                'class' => '',
                'id' => '',
            ),
            'default_value' => '',
            'placeholder' => '',
            'prepend' => '',
            'append' => '',
            'maxlength' => '',
        ),
        array(
            'key' => 'field_5c508853053a8',
            'label' => 'Our Jewellery Products',
            'name' => 'our_jewellery_products',
            'type' => 'text',
            'instructions' => 'Product images for the "Our Jewellery" spot within their profiles - if exists',
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => array(
                'width' => '',
                'class' => '',
                'id' => '',
            ),
            'default_value' => '',
            'placeholder' => 'Shortcode here',
            'prepend' => '',
            'append' => '',
            'maxlength' => '',
        ),
        array(
            'key' => 'field_5c50888e8908e',
            'label' => 'Instagram Profile',
            'name' => 'instagram_profile',
            'type' => 'url',
            'instructions' => 'Link to the Designers Instagram page - If available',
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => array(
                'width' => '',
                'class' => '',
                'id' => '',
            ),
            'default_value' => '',
            'placeholder' => 'https://www.instagram.com/?',
        ),
        array(
            'key' => 'field_5c5088f3b2986',
            'label' => 'Accreditations',
            'name' => 'accreditations',
            'type' => 'textarea',
            'instructions' => 'List any Designer Accreditations here, if available',
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => array(
                'width' => '',
                'class' => '',
                'id' => '',
            ),
            'default_value' => '',
            'placeholder' => '',
            'maxlength' => '',
            'rows' => 3,
            'new_lines' => '',
        ),
        array(
            'key' => 'field_5c50894ca3aa1',
            'label' => 'Alternate Name',
            'name' => 'alternate_name',
            'type' => 'text',
            'instructions' => 'If the Designer has a business name or alternate name, add it here.',
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => array(
                'width' => '',
                'class' => '',
                'id' => '',
            ),
            'default_value' => '',
            'placeholder' => 'My Rings Inc.',
            'prepend' => '',
            'append' => '',
            'maxlength' => '',
        ),
    ),
    'location' => array(
        array(
            array(
                'param' => 'post_type',
                'operator' => '==',
                'value' => 'designers',
            ),
        ),
    ),
    'menu_order' => 0,
    'position' => 'normal',
    'style' => 'default',
    'label_placement' => 'top',
    'instruction_placement' => 'label',
    'hide_on_screen' => array(
        0 => 'discussion',
        1 => 'comments',
        2 => 'send-trackbacks',
    ),
    'active' => 1,
    'description' => '',
));

acf_add_local_field_group(array(
    'key' => 'group_5c5cc96ee73b0',
    'title' => 'Designer Section Except',
    'fields' => array(
        array(
            'key' => 'field_5c5cc9c0bc42d',
            'label' => 'Designer Section Description',
            'name' => 'designer_section_description',
            'type' => 'textarea',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => array(
                'width' => '',
                'class' => '',
                'id' => '',
            ),
            'default_value' => '',
            'placeholder' => 'Description Here',
            'maxlength' => '',
            'rows' => 5,
            'new_lines' => '',
        ),
    ),
    'location' => array(
        array(
            array(
                'param' => 'page',
                'operator' => '==',
                'value' => '911',
            ),
        ),
    ),
    'menu_order' => 0,
    'position' => 'normal',
    'style' => 'default',
    'label_placement' => 'top',
    'instruction_placement' => 'label',
    'hide_on_screen' => array(
        0 => 'discussion',
        1 => 'comments',
        2 => 'revisions',
        3 => 'author',
        4 => 'send-trackbacks',
    ),
    'active' => 1,
    'description' => '',
));

acf_add_local_field_group(array(
    'key' => 'group_5c5a0bbdb790d',
    'title' => 'Wedding Page',
    'fields' => array(
        array(
            'key' => 'field_5c5a0c1698509',
            'label' => 'Featured Wedding Rings',
            'name' => 'featured_wedding_rings',
            'type' => 'text',
            'instructions' => 'Put the shortcode into this box',
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => array(
                'width' => '',
                'class' => '',
                'id' => '',
            ),
            'default_value' => '',
            'placeholder' => '[products ids="123, 456, 789" limit="6"]',
            'prepend' => '',
            'append' => '',
            'maxlength' => '',
        ),
    ),
    'location' => array(
        array(
            array(
                'param' => 'post_type',
                'operator' => '==',
                'value' => 'post',
            ),
        ),
    ),
    'menu_order' => 0,
    'position' => 'normal',
    'style' => 'default',
    'label_placement' => 'top',
    'instruction_placement' => 'label',
    'hide_on_screen' => array(
        0 => 'discussion',
        1 => 'comments',
        2 => 'revisions',
        3 => 'author',
        4 => 'send-trackbacks',
    ),
    'active' => 1,
    'description' => '',
));

endif;


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


/* Your code goes above here. */

?>