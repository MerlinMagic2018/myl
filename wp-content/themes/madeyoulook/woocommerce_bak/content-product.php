<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.4.0
 */

defined( 'ABSPATH' ) || exit;

global $product;

// Ensure visibility.
if ( empty( $product ) || ! $product->is_visible() ) {
	return;
}
?>
<?php // do_action( 'woocommerce_before_shop_loop_item' ); ?>

<article class="feature is--listing">
            <figure class="img--is-feature">
            	<a href="<?php the_permalink(); ?>" class="img--is-listing"><?php echo custom_loop_product_thumbnail(); ?></a>
                <figcaption class="listing-meta cf">
                    <?php // if ( function_exists('woocommerce_template_loop_price' ) ) echo woocommerce_template_loop_price(); ?>
                    <?php if ( $price_html = $product->get_price_html() ) : ?>
                        <span class="promo-price float-r"><?php echo $price_html; ?></span>
                    <?php endif; ?>
                </figcaption>
            </figure>
            <div class="feature-body">
                <h3 class="wfsb sizes-S"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>

                <?php // echo apply_filters( 'woocommerce_short_description', $post->post_excerpt ) ?>

            	<?php 

        // Taxonomy for product categories
// $taxonomy = 'product_cat';

// // Get parent product categories
// $parent_product_cats = get_terms( $taxonomy, array( 'parent' => 0, 'orderby' => 'slug', 'hide_empty' => false, 'include_children' => false ) );

// // Iterating through each parent categories (WP_Term Objects)
// foreach ( $parent_product_cats as $product_cat_obj ) {
//     $term_id = $product_cat_obj->term_id; // term ID
//     $term_name = $product_cat_obj->name; // term Name
//     $term_slug = $product_cat_obj->slug; // term slug
// }

// Testing the output
//echo "<pre>All Product Parent categories "; print_r($parent_product_cats); echo "</pre>";


            // Get parent product categories on single product pages
            //$terms = wp_get_post_terms( get_the_id(), 'product_cat', array( 'include_children' => false ) );

            // Get the first main product category (not a child one)
            //$term = reset($terms);
            //$term_link =  get_term_link( $term->term_id, 'product_cat' ); // The link
            //echo '<p>Designer: <a class="cc" href="'.$term_link.'">' . $term->name . '</a></p>';

            $attributes = $product->get_attributes();

            //$attributesss = $product->get_attributes( array ('pa_our-designers', 'pa_finnish') );

            // // Loop and display the value
            // // var_dump $attributes to see what you can output
            // foreach ($attributesss as $attribute) {

            //     echo wc_attribute_label( $attribute->get_name('pa_finnish') );
            //     echo '<p>' . $attribute['value'] . '</p>';
            // }

            //$hello = $product->get_attribute( 'pa_our-designers' );
            //echo $hello;
            //echo '<p>Designer: ' . $hello . '</p>';

        // echo wc_get_product_category_list( $product->get_id(), ', ', '<span class="posted_in">' . _n( 'Category:', 'Categories:', count( $product->get_category_ids() ), 'woocommerce' ) . ' ', '</span>' ); 

        ?>

        <?php // echo wc_get_product_category_list( get_the_id() ); wc_get_product_terms( $product->get_id(), 'product_cat', array( 'orderby' => 'parent', 'order' => 'DESC' ) ) ?>

        <?php

        // foreach ($attributes as $attribute) {
        //       echo $attribute['value'];
        // }
        ?>

       <?php foreach ( $attributes as $attribute ) : ?>
        <!-- <div> -->
            <!-- <h4> -->
            <?php // echo wc_attribute_label( $attribute->get_name() ); 

            // if ( $product->get_attribute( 'pa_our-designers' ) ){
            //     echo 'Designer';
            // }

            //do_action( 'woocommerce_after_single_product_summary' );
            //do_action( 'woocommerce_product_additional_information', $product );
            ?>
           <!-- </h4> -->
            <?php

                // if ( $product->get_attribute( 'pa_our-designers' ) ) {
                //     echo 'Designer';
                //   } 

                //$attribute_taxonomy_name

                $values = array();

                if ( $attribute->is_taxonomy() ) {
                    $attribute_taxonomy = $attribute->get_taxonomy_object();
                    $attribute_values = wc_get_product_terms( $product->get_id(), $attribute->get_name(), array( 'fields' => 'all' ) );

                    foreach ( $attribute_values as $attribute_value ) {
                        $value_name = esc_html( $attribute_value->name );

                        if ( $attribute_taxonomy->attribute_public ) {
                            //echo wc_attribute_label( $attribute->get_name() );
                            $values[] = '<p class="feature-body-meta">' . wc_attribute_label( $attribute->get_name() ) . ': <a class="cc" href="' . esc_url( get_term_link( $attribute_value->term_id, $attribute->get_name() ) ) . '" rel="tag">' . $value_name . '</a></p>';
                        } 
                        // else {
                        //     $values[] = $value_name;
                        // }
                    }
                } 
                else {
                    $values = $attribute->get_options();

                    foreach ( $values as &$value ) {
                        $value = make_clickable( esc_html( $value ) );
                    }
                }

                echo apply_filters( 'woocommerce_attribute', wpautop( wptexturize( implode( ', ', $values ) ) ), $attribute, $values );
            ?>
        <!-- </div> -->
    <?php endforeach; ?>

    <?php
        //echo wc_get_product_category_list( $product->get_id(), ', ', '<p class="feature-body-meta">' . _n( 'Category:', 'Categories:', count( $product->get_category_ids() ), 'woocommerce' ) . ' ', '</p>' );

        $productTerms = get_the_terms( $post->ID, 'product_cat' );
 
        if ( $productTerms && ! is_wp_error( $productTerms ) ) {
            echo '<p class="feature-body-meta product-meta--list">See All: ';
            foreach ($productTerms as $productTerm) {
                //if ($productTerm === reset($productTerms)) {
                echo '<a class="cc" href="' .  esc_url( get_term_link( $productTerm->term_id ) ) . $productTerm->slug . '" rel="tag">' . $productTerm->name . '</a> ';
                // echo $productTerm->name;
                // echo '</a>';
            }
            echo '</p>';
            //}
        }
    ?>

    <?php

    //Grabs the Primary Category of the Product
    // $primary_term_product_id = get_the_terms( $post->ID, 'product_cat' );
    // $postProductTerm = get_term( $primary_term_product_id );

    // //If the post type is a product, display the Primary Category Link
    // if ( 'product' === get_post_type() ) { 
    //     echo '<div class="">';
      
    //     if ( $postProductTerm && ! is_wp_error( $postProductTerm ) ) {       
    //         echo '<a href="' .  esc_url( get_term_link( $postProductTerm->term_id ) ) . $postProductTerm->slug . '">';
    //         echo $postProductTerm->name;
    //         echo '</a>';
    //     }

    //     echo '</div>';
    // }
    ?>

            </div>
        
    

</article>


