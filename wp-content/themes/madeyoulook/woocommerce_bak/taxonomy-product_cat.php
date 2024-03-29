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

get_header( 'shop' );

// wc_get_template( 'archive-product.php' );

//do_action( 'woocommerce_before_main_content' );

?>

<div class="inner-content">
	<?php woocommerce_breadcrumb(); ?>

<div class="region fluid">
	<?php if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>
		<h2 class="sizes-LG heading-alpha"><?php woocommerce_page_title(); ?></h2>
	<?php endif; ?>

	<?php
	/**
	 * Hook: woocommerce_archive_description.
	 *
	 * @hooked woocommerce_taxonomy_archive_description - 10
	 * @hooked woocommerce_product_archive_description - 10
	 */
	do_action( 'woocommerce_archive_description' );
	?>
	<!-- <p>I'm here</p> -->
</div>
<?php
if ( woocommerce_product_loop() ) {

	/**
	 * Hook: woocommerce_before_shop_loop.
	 *
	 * @hooked woocommerce_output_all_notices - 10
	 * @hooked woocommerce_result_count - 20
	 * @hooked woocommerce_catalog_ordering - 30
	 */

	echo '<div class="region fluid catalogue-utilities">';

	//echo do_shortcode( '[facetwp facet="designer_filter"]' );

	echo do_shortcode( '[facetwp facet="category_filter"]' );

	do_action( 'woocommerce_before_shop_loop' );

	echo '</div>';


	echo '<main class="main-content--full-width fluid">
			<section class="region product-grouping">';

	//woocommerce_product_loop_start();

	if ( wc_get_loop_prop( 'total' ) ) {
		while ( have_posts() ) {
			the_post();

			/**
			 * Hook: woocommerce_shop_loop.
			 *
			 * @hooked WC_Structured_Data::generate_product_data() - 10
			 */
			//do_action( 'woocommerce_shop_loop' );

			wc_get_template_part( 'content', 'category' );
		}
	}

	// woocommerce_product_loop_end();
	echo '</section>
				</main>';

	//woocommerce_product_loop_end();

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
do_action( 'woocommerce_after_main_content' );

/**
 * Hook: woocommerce_sidebar.
 *
 * @hooked woocommerce_get_sidebar - 10
 */
//do_action( 'woocommerce_sidebar' );
get_sidebar('products');

//get_footer( 'shop' );

?>
</div>

<?php
get_footer( 'shop' );
?>






