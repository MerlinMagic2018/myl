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
$attributes = $product->get_attributes();
$style = $product->get_attribute( 'pa_style' );

// Ensure visibility.
if ( empty( $product ) || ! $product->is_visible() ) {
	return;
}
?>

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
		 
			<?php
				//$attribute_values = wc_get_product_terms( $product->get_id(), $attribute->get_name(), array( 'fields' => 'all' ) );
            	$hello = $product->get_attribute( 'pa_our-designers' );
	            //echo $hello;
	            //echo '<p class="feature-body-meta">Designer: ' . $hello . '</p>';
	            //echo '<p class="feature-body-meta">Designer: <a class="cc" href="' . esc_url( get_term_link( $attribute_value->term_id ) ) . '" rel="tag">' . $hello . '</a></p>';
	        ?>

	        <?php 
	        	do_action( 'woocommerce_product_additional_information', $product );
	        ?>

			<?php foreach ( $attributes as $attribute ) : ?>

            <?php
            //do_action( 'woocommerce_after_single_product_summary' );
            //do_action( 'woocommerce_product_additional_information', $product );

                // $values = array();

                // if ( $attribute->is_taxonomy() ) {
                //     $attribute_taxonomy = $attribute->get_taxonomy_object();
                //     $attribute_values = wc_get_product_terms( $product->get_id(), $attribute->get_name(), array( 'fields' => 'all' ) );

                //     foreach ( $attribute_values as $attribute_value ) {
                //         $value_name = esc_html( $attribute_value->name );

                //         if ( $attribute_taxonomy->attribute_public ) {
                //             //echo wc_attribute_label( $attribute->get_name() );
                //             $values[] = '<p class="feature-body-meta">' . wc_attribute_label( $attribute->get_name() ) . ': <a class="cc" href="' . esc_url( get_term_link( $attribute_value->term_id, $attribute->get_name() ) ) . '" rel="tag">' . $value_name . '</a></p>';
                //         } 
                //         // else {
                //         //     $values[] = $value_name;
                //         // }
                //     }
                // } 
                // else {
                //     $values = $attribute->get_options();

                //     foreach ( $values as &$value ) {
                //         $value = make_clickable( esc_html( $value ) );
                //     }
                // }

                // echo apply_filters( 'woocommerce_attribute', wpautop( wptexturize( implode( ', ', $values ) ) ), $attribute, $values );
            ?>
        
    	<?php endforeach; ?>

    	<?php
	        //echo wc_get_product_category_list( $product->get_id(), ', ', '<p class="feature-body-meta">' . _n( 'Category:', 'Categories:', count( $product->get_category_ids() ), 'woocommerce' ) . ' ', '</p>' );

	        $productTerms = get_the_terms( $post->ID, 'product_cat' );
	 
	        if ( $productTerms && ! is_wp_error( $productTerms ) ) {
	            echo '<p class="feature-body-meta">See All ' . $hello ;
	            foreach ($productTerms as $productTerm) {
	                //if ($productTerm === reset($productTerms)) {
	                echo ' <a class="" href="' .  esc_url( get_term_link( $productTerm->term_id ) ) . $productTerm->slug . '" rel="tag">' . $productTerm->name . '</a> ';
	                // echo $productTerm->name;
	                // echo '</a>';
	            }
	            echo '</p>';
	            //}
	        }
	    ?>
		
	</div>

	<?php
	/**
	 * Hook: woocommerce_before_shop_loop_item.
	 *
	 * @hooked woocommerce_template_loop_product_link_open - 10
	 */
	//do_action( 'woocommerce_before_shop_loop_item' );

	/**
	 * Hook: woocommerce_before_shop_loop_item_title.
	 *
	 * @hooked woocommerce_show_product_loop_sale_flash - 10
	 * @hooked woocommerce_template_loop_product_thumbnail - 10
	 */
	//do_action( 'woocommerce_before_shop_loop_item_title' );

	/**
	 * Hook: woocommerce_shop_loop_item_title.
	 *
	 * @hooked woocommerce_template_loop_product_title - 10
	 */
	//do_action( 'woocommerce_shop_loop_item_title' );

	/**
	 * Hook: woocommerce_after_shop_loop_item_title.
	 *
	 * @hooked woocommerce_template_loop_rating - 5
	 * @hooked woocommerce_template_loop_price - 10
	 */
	//do_action( 'woocommerce_after_shop_loop_item_title' );

	/**
	 * Hook: woocommerce_after_shop_loop_item.
	 *
	 * @hooked woocommerce_template_loop_product_link_close - 5
	 * @hooked woocommerce_template_loop_add_to_cart - 10
	 */
	//do_action( 'woocommerce_after_shop_loop_item' );
	?>
</article>
