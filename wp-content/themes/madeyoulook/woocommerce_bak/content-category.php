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
		$terms = wp_get_post_terms( get_the_id(), 'product_cat', array( 'include_children' => false ) );

		// Get the first main product category (not a child one)
		$term = reset($terms);
		$term_link =  get_term_link( $term->term_id, 'product_cat' ); // The link
		echo '<p class="feature-body-meta">Designer: <a class="cc" href="'.$term_link.'">' . $term->name . '</a></p>';

        $attributes = $product->get_attributes();

        // Loop and display the value
        // var_dump $attributes to see what you can output
        foreach ($attributes as $attribute) {
              echo $attribute['value'];
        }

	   // echo wc_get_product_category_list( $product->get_id(), ', ', '<span class="posted_in">' . _n( 'Category:', 'Categories:', count( $product->get_category_ids() ), 'woocommerce' ) . ' ', '</span>' ); 

	    ?>

        <?php // echo wc_get_product_category_list( get_the_id() ); wc_get_product_terms( $product->get_id(), 'product_cat', array( 'orderby' => 'parent', 'order' => 'DESC' ) ) ?>

    </div>
        
    

</article>


