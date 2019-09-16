<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.4.0
 */

defined( 'ABSPATH' ) || exit;

get_header( 'shop' );

//echo '<div class="inner-content fluid">';
/**
 * Hook: woocommerce_before_main_content.
 *
 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
 * @hooked woocommerce_breadcrumb - 20
 * @hooked WC_Structured_Data::generate_website_data() - 30
 */


//do_action( 'woocommerce_before_main_content' );
?>
<div class="inner-content">
	<?php 
	woocommerce_breadcrumb(); 

	echo '<div class="region fluid products-page-header">';
	?>

	<div class="products-header--main">
		<?php if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>
			<h2 class="sizes-LG wfsg title-alpha"><?php woocommerce_page_title(); ?></h2>

			<?php // do_action( 'woocommerce_archive_description' ); ?>

			<!--<div class="primary-filter">
				 <h4 class="title-beta sm--m" style="float: left; margin: 4px 1em 0 0">Choose a Designer</h4> -->
				<?php
					//echo do_shortcode( '[facetwp facet="filter_by_designer"]' );
				?>
			<!-- </div> -->
		<?php endif; ?>
	</div>
	<?php
	/**
	 * Hook: woocommerce_archive_description.
	 *
	 * @hooked woocommerce_taxonomy_archive_description - 10
	 * @hooked woocommerce_product_archive_description - 10
	 */
	do_action( 'woocommerce_archive_description' );

	// end products-page-header	
	echo '</div>';
	?>


<?php
if ( woocommerce_product_loop() ) {

	/**
	 * Hook: woocommerce_before_shop_loop.
	 *
	 * @hooked woocommerce_output_all_notices - 10
	 * @hooked woocommerce_result_count - 20
	 * @hooked woocommerce_catalog_ordering - 30
	 */
	//do_action( 'woocommerce_before_shop_loop' );
	//echo '</div>';

	// start content wrapper
echo '<div class="region fluid">';

	echo '<div class="supplementary-content catalogue-utilities" style=" float: left; padding: 1.5em">
		<noscript>Unfortunately our filtering only works with javascript enabled.</noscript>
		<h3 class="wfl sizes-M2 sm--m">Jewellery Filters</h3>';
		
			//do_action( 'filtering-widget' );

			//dynamic_sidebar( 'Attributes Filters' );

			// echo do_shortcode( '[products limit="2" columns="4" category="engagement-rings"]' );

		echo '<div class="filter-wrap">';
			echo do_shortcode( '[facetwp facet="filter_by_designer"]' );
		echo '</div>';


		echo '<div class="filter-wrap">';
			echo do_shortcode( '[facetwp facet="categories"]' );
		echo '</div>';

		echo '<div class="filter-wrap">';
			echo do_shortcode( '[facetwp facet="filter_by_style"]' );
		echo '</div>';
			//echo '<div class="fancy-select cf">';
			

			//echo '<div class="filters filters--designer med--m">
			//<h4 class="title-beta sm--m">Choose a Designer</h4>';
			//echo do_shortcode( '[facetwp facet="filter_by_designer"]' );
			//echo '</div>';

			// echo '<h4 class="title-beta">Categories</h4>';
			// echo do_shortcode( '[facetwp facet="category_filter"]' );

			//echo '</div>';
			//echo do_shortcode( '[facetwp facet="test_cat"]' );

			//echo do_shortcode( '[facetwp facet="designer_filter"]' );
			
			echo '<button class="form-button button--primary" onclick="FWP.reset()">Reset Filters</button>
				</div>';
		
	//echo ''

	echo '<main class="main-content--catalogue">';

	echo '<div class="facetwp-template product-grouping">';
	woocommerce_product_loop_start();

	

	if ( wc_get_loop_prop( 'total' ) ) {
		while ( have_posts() ) {
			the_post();

			/**
			 * Hook: woocommerce_shop_loop.
			 *
			 * @hooked WC_Structured_Data::generate_product_data() - 10
			 */
			do_action( 'woocommerce_shop_loop' );

			wc_get_template_part( 'content', 'product' );
		}
	}
	
	woocommerce_product_loop_end();
	echo '</div>';

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
echo '</main>';


/**
 * Hook: woocommerce_sidebar.
 *
 * @hooked woocommerce_get_sidebar - 10
 */
do_action( 'woocommerce_sidebar' );

// end main content wrapper
echo '</div>';


//get_footer( 'shop' );
?>
</div>
<?php get_footer( 'shop' );?>

