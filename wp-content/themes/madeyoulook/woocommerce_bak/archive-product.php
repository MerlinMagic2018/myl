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
	<?php woocommerce_breadcrumb(); ?>

<!-- <ul class="products"> -->
    <?php
        // $args = array( 'post_type' => 'product', 'posts_per_page' => 6, 'parent_cat' => 'engagement-rings', 'orderby' => 'rand' );
        // $loop = new WP_Query( $args );
        // $title = array('product', 'parent_cat');

        // echo $product->get_attribute( 'designer', '<h2>' . _n( 'Engagement:' ) . ' ', '</h2>' ); 
    ?>
    <?php // echo '<h2>', ' $product->parent_cat()', '</h2>'; ?>
    <?php // echo "<h1>  $title; </h1>"; ?>
    
    <?php 
        // echo '<input type="text">';

        // while ( $loop->have_posts() ) : $loop->the_post(); global $product; ?>

            	<!-- <h2>Engagement Rings</h2> -->

                <!-- <li class="product">    

                    <a href="<?php // echo get_permalink( $loop->post->ID ) ?>"> -->

                        <?php // woocommerce_show_product_sale_flash( $post, $product ); ?>

                        <?php // if (has_post_thumbnail( $loop->post->ID )) echo get_the_post_thumbnail($loop->post->ID, 'shop_catalog'); else echo '<img src="'.woocommerce_placeholder_img_src().'" alt="Placeholder">'; ?>

                        <!-- <h3><?php // the_title(); ?></h3>

                        <span class="price"><?php // echo $product->get_price_html(); ?></span>                    

                    </a> -->

                    <?php // woocommerce_template_loop_add_to_cart( $loop->post, $product ); ?>

                <!-- </li> -->

    <?php // endwhile; ?>
    <?php // wp_reset_query(); ?>
<!--</ul>/.products-->


<div class="region fluid" style="padding-top: 1.5em">

	<?php if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>
		<h2 class="sizes-LG heading-alpha" style="width: 60%"><?php woocommerce_page_title(); ?></h2>
	<?php endif; ?>


	<?php if ( apply_filters( 'woocommerce_taxonomy_archive_description', true ) ) : ?>
		<div style="float: right; width: 30%;"><?php woocommerce_taxonomy_archive_description(); ?></div>

	<?php
	/**
	 * Hook: woocommerce_archive_description.
	 *
	 * @hooked woocommerce_taxonomy_archive_description - 10
	 * @hooked woocommerce_product_archive_description - 10
	 */
	//do_action( 'woocommerce_archive_description' );
	?>
	<?php endif; ?>

<?php
// if ( woocommerce_taxonomy_archive_description() ) {
//     echo 'Hi! Take a look at our sweet tshirts below.';
// }
?>






	<?php

	echo '<div class="region catalogue-utilities" style="background-color:#dafcfe; float: left; width: 65%; padding: 1.5em">';

	// default woo sorting
	//do_action( 'woocommerce_before_shop_loop' );

	//echo do_shortcode( '[facetwp facet="categories"]' );

	echo do_shortcode( '[facetwp facet="test_cat"]' );

	echo do_shortcode( '[facetwp facet="designer_filter"]' );

	echo '<button onclick="FWP.reset()">Reset Filters</button>';

	echo '</div>';
	?>


	<!-- <p>I'm here</p> -->

	<?php
	// echo do_shortcode( '[facetwp facet="categories"]' );

	// echo do_shortcode( '[facetwp facet="test_cat"]' );
	?>

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
	// do_action( 'woocommerce_before_shop_loop' );

	//woocommerce_product_loop_start();

	echo '<main class="main-content--full-width fluid">
			
			<section class="region product-grouping">
			<div class="facetwp-template">';
	if ( wc_get_loop_prop( 'total' ) ) {
		while ( have_posts() ) {
			the_post();

			/**
			 * Hook: woocommerce_shop_loop.
			 *
			 * @hooked WC_Structured_Data::generate_product_data() - 10
			 */
			//do_action( 'woocommerce_shop_loop' );

			wc_get_template_part( 'content', 'product' );
		}
	}

	//woocommerce_product_loop_end();

	// new loop end
	echo '</div>
	</section>
			
				</main>';

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

	echo '<main class="main-content--full-width fluid">
			<div class="facetwp-template">
			<section class="region">';
	do_action( 'woocommerce_no_products_found' );

	echo '</section>
			</div>
				</main>';

	
}

/**
 * Hook: woocommerce_after_main_content.
 *
 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
 */
//do_action( 'woocommerce_after_main_content' );

/**
 * Hook: woocommerce_sidebar.
 *
 * @hooked woocommerce_get_sidebar - 10
 */
//do_action( 'woocommerce_sidebar' );


?>
</div>




<?php
get_footer( 'shop' );
?>
