<?php
/**
 * The Template for displaying products in a product category. Simply includes the archive template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/taxonomy-product_cat.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

$args = array(
    //'post_type' => 'event',
    //'posts_per_page' => 10,
    'facetwp' => true, // we added this
);
$query = new WP_Query( $args );

get_header( 'shop' );

?>
<div class="inner-content">
<?php woocommerce_breadcrumb(); ?>

<div class="region fluid" style="padding-top: 1.5em">
	<?php if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>
		<h2 class="sizes-LG heading-alpha" style="width: 60%"><?php woocommerce_page_title(); ?></h2>
	<?php endif; ?>

	<?php

	echo '<div style="width: 60%;">';

	/**
	 * Hook: woocommerce_archive_description.
	 *
	 * @hooked woocommerce_taxonomy_archive_description - 10
	 * @hooked woocommerce_product_archive_description - 10
	 */
	do_action( 'woocommerce_archive_description' );

	echo '</div>';

	//echo '<div class="region catalogue-utilities" style="background-color:#dafcfe; float: right; width: 35%; padding: 1.5em">';

	//echo do_shortcode( '[woocommerce_product_filter_attribute attribute=”style”]' );

	/**
	 * Hook: woocommerce_before_shop_loop.
	 *
	 * @hooked woocommerce_output_all_notices - 10
	 * @hooked woocommerce_result_count - 20
	 * @hooked woocommerce_catalog_ordering - 30
	 */
	//do_action( 'woocommerce_before_shop_loop' );

	

	
	

	//echo '</div>';
	?>

	<?php if ( is_active_sidebar( 'filtering-widget' ) ) : ?>
	    <!-- <ul id="sidebar"> -->
	        <?php // dynamic_sidebar( 'Filtering Widget' ); ?>
	    <!-- </ul> -->
	<?php endif; ?>
	<!-- <p>I'm here</p> -->


<div class="supplementary-content catalogue-utilities" style=" float: left; padding: 1.5em">
	<h3 class="wfl sizes-M2 sm--m">Product Filters</h3>
	<?php 
		//do_action( 'filtering-widget' );

		dynamic_sidebar( 'Attributes Filters' );

		// echo do_shortcode( '[products limit="2" columns="4" category="engagement-rings"]' );

		//echo '<div class="fancy-select cf">';
		echo '<h3 class="wfsb title-beta">Categories</h3>';
		echo do_shortcode( '[facetwp facet="category_filter"]' );
		//echo '</div>';
		echo do_shortcode( '[facetwp facet="test_cat"]' );

		echo do_shortcode( '[facetwp facet="designer_filter"]' );
		
		echo '<button class="form-button" onclick="FWP.reset()">Get me back!</button>';
	?>
</div>
<?php
if ( woocommerce_product_loop() ) {

	// woocommerce_product_loop_start();
	echo '<main class="main-content">
			
			<section class="region">
			<div class="facetwp-template product-grouping">';

	if ( wc_get_loop_prop( 'total' ) ) {
		while ( have_posts() ) {
			the_post();

			/**
			 * Hook: woocommerce_shop_loop.
			 *
			 * @hooked WC_Structured_Data::generate_product_data() - 10
			 */
			//do_action( 'woocommerce_shop_loop' );
			wc_get_template_part( 'content', 'general' );
		}
	}

	// woocommerce_product_loop_end();
	echo '</div></section>
			
				</main>';

	get_sidebar( 'filtering' );

	/**
	 * Hook: woocommerce_after_shop_loop.
	 *
	 * @hooked woocommerce_pagination - 10
	 */
	do_action( 'woocommerce_after_shop_loop' );
} else {
	/**
	 * Hook: woocommerce_no_products_found.
	 *
	 * @hooked wc_no_products_found - 10
	 */
	do_action( 'woocommerce_no_products_found' );
}

/**
 * Hook: woocommerce_after_main_content.
 *
 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
 */
//do_action( 'woocommerce_after_main_content' );

	


?>
</div>
</div>

<?php
get_footer( 'shop' );
?>


