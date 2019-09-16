<?php

/** CLEANS UP THE GENERATED MARKUP FOR THE SITE MENUS */
/** removes id's, classes but keeps logic for selected states (could still be cleaner). */
class MV_Cleaner_Walker_Nav_Menu extends Walker {
    var $tree_type = array( 'post_type', 'taxonomy', 'custom', 'page' );
    var $db_fields = array( 'parent' => 'menu_item_parent', 'id' => 'db_id' );

    function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
        global $wp_query;
        $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
        $class_names = $value = '';
        $classes = empty( $item->classes ) ? array() : (array) $item->classes;
        $classes = in_array( 'current-menu-item', $classes ) ? array( 'current-menu-item' ) : array();
        $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
        $class_names = strlen( trim( $class_names ) ) > 0 ? ' class="' . esc_attr( $class_names ) . '"' : '';
        $id = apply_filters( 'nav_menu_item_id', '', $item, $args );
        $id = strlen( $id ) ? ' id="' . esc_attr( $id ) . '"' : '';
        $output .= $indent . '<li itemprop="name"' . $id . $value . $class_names .'>';

        $attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
        $attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
        $attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
        $attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';
        $attributes .= ! empty( $item->name )        ? ' name="'   . esc_attr( $item->name        ) .'"' : '';
                       
        
        $item_output = empty($args->before) ? "": $args->before;
        $item_output .= '<a itemprop="url"'. $attributes .'>';
        $item_output .= (empty($args->link_before) ? "" : $args->link_before)  . apply_filters( 'the_title', empty($item->title) ? "" : $item->title , $item->ID ) . (empty($args->link_before) ? "" : $args->link_before);
        $item_output .= '</a>';
        $item_output .= empty($args->after) ? "" : $args->after;
        $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
    }
    function end_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
        $output .= "</li>\n";
    }
}

// Mark (highlight) custom post type parent as active item in Wordpress Navigation
function add_current_nav_class($classes, $item) {

    // Getting the current post details
    global $post;

    // Get post ID, if nothing found set to NULL
    $id = ( isset( $post->ID ) ? get_the_ID() : NULL );

    // Checking if post ID exist...
    if (isset( $id )){

        // Getting the post type of the current post
        $current_post_type = get_post_type_object(get_post_type($post->ID));

        // Getting the rewrite slug containing the post type's ancestors
        $ancestor_slug = $current_post_type->rewrite['slug'];

        // Split the slug into an array of ancestors and then slice off the direct parent.
        $ancestors = explode('/',$ancestor_slug);
        $parent = array_pop($ancestors);

        // Getting the URL of the menu item
        $menu_slug = strtolower(trim($item->url));

        // If the menu item URL contains the post type's parent
        if (!empty($menu_slug) && !empty($parent) && strpos($menu_slug,$parent) !== false) {
            $classes[] = 'current-menu-item';
        }

        // If the menu item URL contains any of the post type's ancestors
        foreach ( $ancestors as $ancestor ) {
            if (strpos($ancestor, $menu_slug) !== false) {
                $classes[] = 'current-page-ancestor';
            }
        }
    }
    // Return the corrected set of classes to be added to the menu item
    return $classes;

} 
add_action('nav_menu_css_class', 'add_current_nav_class', 10, 2 );




/* 
 * Customize Menu Item Classes
 * @author Bill Erickson
 * @link http://www.billerickson.net/customize-which-menu-item-is-marked-active/
 *
 * @param array $classes, current menu classes
 * @param object $item, current menu item
 * @param object $args, menu arguments
 * @return array $classes
 */
function menu_item_classes( $classes, $item, $args ) {
    if( 'main-nav' !== $args->theme_location )
        return $classes;

    // if( ( is_singular( 'post' ) || is_category() || is_tag() ) && 'Blog' == $item->title )
    //     $classes[] = 'current-menu-item';
        
    // if( ( is_singular( 'code' ) || is_tax( 'code-tag' ) ) && 'Code' == $item->title )
    //     $classes[] = 'current-menu-item';
        
    // if( is_singular( 'projects' ) && 'Case Studies' == $item->title )
    //     $classes[] = 'current-menu-item';

    // if( is_product_category('wedding-rings') && 'Wedding' == $item->title )
    //     $classes[] = 'current-menu-item';

    // if( $term == 'wedding' || $term == 'Intermediate Level' || $term == 'Advanced Level' && 'Wedding' == $item->title )

    // if( is_product_category( 'designer' ) && 'Designers' == $item->title )
    //     $classes[] = 'current-menu-item';

    //has_term( 'mattress', 'product_cat' )

    // if ( is_product_category() ) {
  
    //   if ( is_product_category( 'amy-kovach' ) ) {
    //     echo 'Hi! Take a look at our sweet wedding rings below.';
    //   } else if ( is_product_category( 'wedding-bands' ) ) {
    //     echo 'Hi! Hungry for some gaming?';
    //   } else {
    //     echo 'Hi! Check our our products below.';
    //   }

    // }

    if ( has_term( 'wedding', 'pa_occasions' ) && 'Wedding' == $item->title )  {
        $classes[] = 'current-menu-item';
    }
    if ( has_term( 'engagement', 'pa_occasions' ) && 'Engagement' == $item->title )  {
        $classes[] = 'current-menu-item';
    }
    if ( has_term( 'our-designers', 'pa_our-designers' ) && 'Designers' == $item->title )  {
        $classes[] = 'current-menu-item';
    }
    if ( has_term( 'style', 'pa_style' ) && 'Wedding' == $item->title )  {
        $classes[] = 'current-menu-item';
    }

    // if( is_product_category( 'designer' ) && 'Designers' == $item->title )
    //     $classes[] = 'current-menu-item';


        
    return array_unique( $classes );
}
add_filter( 'nav_menu_css_class', 'menu_item_classes', 10, 3 );



function specials_nav_class($classes, $item){
    if( in_array('current-menu-item', $classes) || in_array('current-menu-ancestor', $classes) ){
        //$classes[] = 'active hhhh';
    }
    return $classes;
}
add_filter('nav_menu_css_class' , 'specials_nav_class' , 10 , 2);


/*****
This gets placed in your functions.php file of your theme.
Change the menu-item-# to your specific menu class identifier
***********/


// function special_nav_class($classes, $item) {
//     if (in_array('menu-item-195', $classes)) {
//         $classes[] = 'current-menu-item current_page_item';
//     }
//     return $classes;
// }
// add_filter('nav_menu_css_class', 'special_nav_class', 10, 2);


/******************************
THE SUB MENU STRUCTURE
******************************/
function tree(){
    $class = '';
    if( is_page() ) { 
        global $post;
        /* Get an array of Ancestors and Parents if they exist */
        $parents = get_post_ancestors( $post->ID );
        /* Get the top Level page->ID count base 1, array base 0 so -1 */ 
        $id = ($parents) ? $parents[count($parents)-1]: $post->ID;
        /* Get the parent and set the $class with the page slug (post_name) */
        $parent = get_page( $id );
        $class = $parent->post_name;
    }
    return $class;
}

function the_sub_menu(){
    global $post;

    //echo '<nav class="sub-menus cf">';
    $parent = get_post( $post->post_parent );

    if ( $post->post_parent ) {
        # Parent post name/slug
        //$parent = get_post( $post->post_parent );
        echo '<nav class="sub-menus cf ' . $parent->post_name . '-menu" itemscope itemtype="http://www.schema.org/SiteNavigationElement">';

        # Parent template name
        $parent_template = get_post_meta( $parent->ID, '_wp_page_template', true);
        
        // if ( !empty($parent_template) )
        //     echo '<nav class="sub-menus cf ' . $parent->post_name . '">';
            
    }
    else{
        echo '<nav class="sub-menus cf" itemscope itemtype="http://www.schema.org/SiteNavigationElement">';
        echo '<h3 class="hide-text">More in: '. $parent->post_title .'</h3>';
    }
    
    // Wrapper
    //echo '<nav class="sub-menus cf">';

    if(tree()=="fyi"){ echo '<h3 class="submenu-heading">More FYI:</h3>'; };

    if(tree()=="services-repairs"){ echo '<h3 class="submenu-heading">More Services:</h3>'; };

    // if (is_page(FYI) || in_array(FYI, $post->ancestors))
    // {
    //    echo '<h3 class="submenu-heading">FYI:</h3>';
    // }

    // Open list
    echo '<ul class="sub-menu-list">';

    // Sub page
    if($post->post_parent) {

        // Load parent
        $parent = get_post($post->post_parent);

        // Add parent to list
        echo '<li class="is-parent-item" itemprop="name"><a href="' . get_permalink($parent->ID) . '" itemprop="url">' . $parent->post_title . '</a></li>';

        // Add children to list
        wp_list_pages('title_li=&child_of=' . $post->post_parent);

    // Parent page
    } else {

        // Add parent to list
        echo '<li class="current_page_item is-parent-item" itemprop="name"><a class="is-selected" href="' . get_permalink($post->ID) . '" itemprop="url">' . $post->post_title . '</a></li>';

        // Add children to list
        wp_list_pages('title_li=&child_of=' . $post->ID);
    }

    // Close list
    echo '</ul>';

    // Close wrapper
    echo '</nav>';
}


// function and action to order Designers alphabetically
function alpha_order_designers( $query ) {
    if ( $query->is_post_type_archive('designers') && $query->is_main_query() ) {
        $query->set( 'orderby', 'title' );
        $query->set( 'order', 'ASC' );
    }
}
add_action( 'pre_get_posts', 'alpha_order_designers' );


// Disable Pagination on Designers page
function no_nopaging($query) {
    if (is_post_type_archive()) {
    $query->set('nopaging', 1);
    }
}
add_action('parse_query', 'no_nopaging');



/*********************
PAGE NAVI
*********************/

// Numeric Page Navi (built into the theme by default)
function myl_page_navi() {
    global $wp_query;
    $bignum = 999999999;
    if ( $wp_query->max_num_pages <= 1 )
        return;
        echo '<nav class="pagination">';
        echo paginate_links( array(
        'base'         => str_replace( $bignum, '%#%', esc_url( get_pagenum_link($bignum) ) ),
        'format'       => '',
        'current'      => max( 1, get_query_var('paged') ),
        'total'        => $wp_query->max_num_pages,
        'prev_text'    => '&larr;',
        'next_text'    => '&rarr;',
        'type'         => 'list',
        'end_size'     => 3,
        'mid_size'     => 3
        ) 
    );
    echo '</nav>';
} /* end page navi */




?>