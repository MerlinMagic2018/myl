<?php

/** CLEANS UP THE GENERATED MARKUP FOR THE SITE MENUS */
/** removes id's, classes but keeps logic for selected states (could still be cleaner). */
class MV_Cleaner_Walker_Nav_Menu extends Walker {
    var $tree_type = array( 'post_type', 'taxonomy', 'custom', 'page', 'product' );
    var $db_fields = array( 'parent' => 'menu_item_parent', 'id' => 'db_id' );
    // function start_lvl( &$output, $depth = 0, $args = array() ) {
    //     $indent = str_repeat("\t", $depth);
    //     $output .= "\n$indent<ul class=\"sub-menu\">\n";
    // }
    // function end_lvl( &$output, $depth = 0, $args = array() ) {
    //     $indent = str_repeat("\t", $depth);
    //     $output .= "$indent</ul>\n";
    // }
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
    if( 'primary-menu' !== $args->theme_location )
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

    if ( has_term( 'wedding', 'pa_occasions' ) && 'Wedding' == $item->title ){
        $classes[] = 'current-menu-item';
    }
    if ( has_term( 'engagement', 'pa_occasions' ) && 'Engagement' == $item->title ){
        $classes[] = 'current-menu-item ttttt';
    }
    if ( has_term( 'our-designers', 'pa_our-designers' ) && 'Designers' == $item->title ){
        $classes[] = 'current-menu-item ttt';
    }
    if ( has_term( 'style', 'pa_style' ) && 'Style' == $item->title ){
        $classes[] = 'current-menu-item ggg';
    }

    //if( is_product_category( 'our-designers' ) && 'Designers' == $item->title )
        //$classes[] = 'current-menu-item';


        
    return array_unique( $classes );
}
add_filter( 'nav_menu_css_class', 'menu_item_classes', 10, 3 );



function specials_nav_class($classes, $item){
    if( in_array('current-menu-item', $classes) || in_array('current-menu-ancestor', $classes) ){
        $classes[] = 'active';
    }
    return $classes;
}
add_filter('nav_menu_css_class' , 'specials_nav_class' , 10 , 2);



// add_filter('woocommerce_product_categories_widget_args', 'woorei_product_categories_widget_args', 10, 1);
// function woorei_product_categories_widget_args($args) {
//     $args['walker'] = new My_WC_Product_Cat_List_Walker;
//     return $args;
// }

// class My_WC_Product_Cat_List_Walker extends WC_Product_Cat_List_Walker {
//     public $tree_type = 'product_cat';
//     public $db_fields = array ( 'parent' => 'parent', 'id' => 'term_id', 'slug' => 'slug' );

//     public function start_el( &$output, $cat, $depth = 0, $args = array(), $current_object_id = 0 ) {
//         $output .= '<li class="cat-item cat-item-' . $cat->term_id;

//         if ( $args['current_category'] == $cat->term_id ) {
//             $output .= ' current-cat';
//         }

//         if ( $args['has_children'] && $args['hierarchical'] ) {
//             $output .= ' cat-parent';
//         }

//         if ( $args['current_category_ancestors'] && $args['current_category'] && in_array( $cat->term_id, $args['current_category_ancestors'] ) ) {
//             $output .= ' current-cat-parent';
//         }

//         $output .=  '"><a href="' . get_term_link( (int) $cat->term_id, $this->tree_type ) . '">' . __( $cat->name, 'woocommerce' ) . '</a>';

//         if ( $args['show_count'] ) {
//             $output .= ' <span class="count">(' . $cat->count . ')</span>';
//         }
//     }

// }





/**
 * Category ID on Menu 
 * 
 * @author Bill Erickson
 * @link http://www.billerickson.net/code/category-id-on-menu-items
 *
 * @param array $classes
 * @param object $item
 * @return array $classes
 */
// function category_id_on_menu( $classes, $item ) {
//   if( $item->object !== 'category' )
//         return $classes;
        
//     $classes[] = 'menu-item-category-' . $item->object_id;
//     return $classes;
// }
// add_filter( 'nav_menu_css_class', 'category_id_on_menu', 10, 2 );







/**
 * Cleaner wp_nav_menu output
 */
// class Clean_Walker_Nav_Menu extends Walker_Nav_Menu {

//     /**
//      * @see Walker_Page::start_lvl()
//      * @since 1.0
//      *
//      * @param string $output Passed by reference. Used to append additional content.
//      * @param int $depth Depth of page. Used for padding.
//      * @param array $args
//      */
//     public function start_lvl( &$output, $depth = 0, $args = array() ) {
//         $indent = str_repeat("\t", $depth);
//         $output .= "\n$indent<ul class='c-nav__submenu'>\n";
//     }

//     /**
//      * Start the element output.
//      *
//      * @see Walker_Nav_Menu::start_el()
//      *
//      * @since 1.0
//      *
//      * @param string $output Passed by reference. Used to append additional content.
//      * @param object $item   Menu item data object.
//      * @param int    $depth  Depth of menu item. Used for padding.
//      * @param array  $args   An array of arguments. @see wp_nav_menu().
//      * @param int    $id     Current item ID.
//      */
//     public function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
//         $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
//         $classes = empty( $item->classes ) ? array() : (array) $item->classes;

//         // Cleaner class array to replace default.
//         $new_classes = array();
//         if ( in_array( 'menu-item-has-children', $classes ) )
//             $new_classes[] = 'c-nav__item--has-children';
//         if ( in_array( 'current-menu-item', $classes ) )
//             $new_classes[] = 'c-nav__item--active';
//         if ( in_array( 'current-menu-parent', $classes ) )
//             $new_classes[] = 'c-nav__item--active-parent';
//         $classes = $new_classes;
//         $classes[] = 'c-nav__item';

//         /**
//          * Filter the CSS class(es) applied to a menu item's list item element.
//          *
//          * @since 1.0
//          *
//          * @param array  $classes The CSS classes that are applied to the menu item's `<li>` element.
//          * @param object $item    The current menu item.
//          * @param array  $args    An array of {@see wp_nav_menu()} arguments.
//          * @param int    $depth   Depth of menu item. Used for padding.
//          */
//         $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args, $depth ) );
//         $class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';

//         // removed the ID.
//         $output .= $indent . '<li' . $class_names .'>';

//         $atts = array();
//         $atts['title']  = ! empty( $item->attr_title ) ? $item->attr_title : '';
//         $atts['target'] = ! empty( $item->target )     ? $item->target     : '';
//         $atts['rel']    = ! empty( $item->xfn )        ? $item->xfn        : '';
//         $atts['href']   = ! empty( $item->url )        ? $item->url        : '';

//         /**
//          * Filter the HTML attributes applied to a menu item's anchor element.
//          *
//          * @since 1.0
//          *
//          * @param array $atts {
//          *     The HTML attributes applied to the menu item's `<a>` element, empty strings are ignored.
//          *
//          *     @type string $title  Title attribute.
//          *     @type string $target Target attribute.
//          *     @type string $rel    The rel attribute.
//          *     @type string $href   The href attribute.
//          * }
//          * @param object $item  The current menu item.
//          * @param array  $args  An array of {@see wp_nav_menu()} arguments.
//          * @param int    $depth Depth of menu item. Used for padding.
//          */
//         $atts = apply_filters( 'nav_menu_link_attributes', $atts, $item, $args, $depth );

//         $attributes = '';
//         foreach ( $atts as $attr => $value ) {
//             if ( ! empty( $value ) ) {
//                 $value = ( 'href' === $attr ) ? esc_url( $value ) : esc_attr( $value );
//                 $attributes .= ' ' . $attr . '="' . $value . '"';
//             }
//         }

//         $item_output = $args->before;
//         $item_output .= '<a' . $attributes . '>';
//         /** This filter is documented in wp-includes/post-template.php */
//         $item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
//         $item_output .= '</a>';
//         $item_output .= $args->after;

//         /**
//          * Filter a menu item's starting output.
//          *
//          * The menu item's starting output only includes `$args->before`, the opening `<a>`,
//          * the menu item's title, the closing `</a>`, and `$args->after`. Currently, there is
//          * no filter for modifying the opening and closing `<li>` for a menu item.
//          *
//          * @since 1.0
//          *
//          * @param string $item_output The menu item's starting HTML output.
//          * @param object $item        Menu item data object.
//          * @param int    $depth       Depth of menu item. Used for padding.
//          * @param array  $args        An array of {@see wp_nav_menu()} arguments.
//          */
//         $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
//     }
// }


/*****
This gets placed in your functions.php file of your theme.
Change the menu-item-# to your specific menu class identifier
***********/

add_filter('nav_menu_css_class', 'special_nav_class', 10, 2);
function special_nav_class($classes, $item) {
    if (in_array('menu-item-195', $classes)) {
        $classes[] = 'current-menu-item current_page_item';
    }
    return $classes;
}


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
        
        if ( !empty($parent_template) )
            echo '<nav class="sub-menus cf ' . $parent->post_name . '">';
            
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