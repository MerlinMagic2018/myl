<?php
/**
 * Single Product Meta
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/meta.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     3.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

global $product;
//$terms = get_the_terms($product->id, $attribute['designer']);
?>
<div class="product_meta">

	<?php do_action( 'woocommerce_product_meta_start' ); ?>

	<?php if ( wc_product_sku_enabled() && ( $product->get_sku() || $product->is_type( 'variable' ) ) ) : ?>

		<!-- <span class="sku_wrapper"><?php esc_html_e( 'SKU:', 'woocommerce' ); ?> <span class="sku"><?php echo ( $sku = $product->get_sku() ) ? $sku : esc_html__( 'N/A', 'woocommerce' ); ?></span></span> -->

	<?php endif; ?>

	<?php echo wc_get_product_category_list( $product->get_id(), ', ', '<p class="posted_in">' . _n( 'Category:', 'Categories:', count( $product->get_category_ids() ), 'woocommerce' ) . ' ', '</p>' ); ?>

	<?php // echo $product->get_attribute( 'designer' ); ?>

	<?php // echo $product->get_attribute( 'designer', '<p class="tagged_as">' . _n( 'Designer:' ) . ' ', '</p>' ); ?>

	<?php // echo '<p class="city">Designer: <a href="'.$term_link.'">' . $product->get_attribute( 'designer' ) . '</a></p>';?>


	<?php // echo wc_get_product_category_list( get_the_id() ); wc_get_product_terms( $product->get_id(), 'product_cat', array( 'orderby' => 'parent', 'order' => 'DESC' ) ) ?>

	<?php
		// $parentcats = get_ancestors($product_cat_id, 'product_cat');

		// foreach($parentcat as $parentcats){
		//     echo $parentcat;
		// }


// 		global $post;
// $prod_terms = get_the_terms( $post->ID, 'product_cat' );
// foreach ($prod_terms as $prod_term) {

//     // gets product cat id
//     $product_cat_id = $prod_term->term_id;

//     // gets an array of all parent category levels
//     $product_parent_categories_all_hierachy = get_ancestors( $product_cat_id, 'product_cat' );  



//     // This cuts the array and extracts the last set in the array
//     $last_parent_cat = array_slice($product_parent_categories_all_hierachy, -1, 1, true);
//     foreach($last_parent_cat as $last_parent_cat_value){
//         // $last_parent_cat_value is the id of the most top level category, can be use whichever one like
//         echo '<strong>' . $last_parent_cat_value . '</strong>';
//     }

// }
// if ( is_product() ) {
//     global $post;
//     $terms = wc_get_product_terms( $post->ID, 'product_cat', array( 'orderby' => 'parent', 'order' => 'DESC' ) );
//     if ( ! empty( $terms ) ) {
//         $main_term = $terms[0];
//         $ancestors = get_ancestors( $main_term->term_id, 'product_cat' );
//         if ( ! empty( $ancestors ) ) {
//             $ancestors = array_reverse( $ancestors );
//             // first element in $ancestors has the root category ID
//             // get root category object
//             $root_cat = get_term( $ancestors[0], 'product_cat' );
//         }
//         else {
//             // root category would be $main_term if no ancestors exist
//         }
//     }
//     else {
//         // no category assigned to the product
//     }
// }


	?>

	<?php echo wc_get_product_tag_list( $product->get_id(), ', ', '<p class="tagged_as">' . _n( 'Tag:', 'Tags:', count( $product->get_tag_ids() ), 'woocommerce' ) . ' ', '</p>' ); ?>

	<?php do_action( 'woocommerce_product_meta_end' ); ?>

</div>
