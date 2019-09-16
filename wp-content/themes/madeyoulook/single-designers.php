<?php 
/*
 * Custom Post Type Single Template
 *
 * This is the custom post type single template. If you edit the custom post type name,
 * you've got to change the name of this template to reflect that name change.
 *
 * For Example, if your custom post type call is "register_post_type( 'staff' )",
 * then your template name should be single-staff.php
 *
 * For more info: http://codex.wordpress.org/Post_Type_Templates

Template Name: Designers
Template Post Type: post, page, product, shop, designers
*/
?>

<?php get_header(); ?>

<div id="inner-content" class="inner-content cf">

	<main id="main" class="main-content--full-width has--standard-pad" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">

		<div class="hero cf has-bg-gradient--dots">
			<!-- <h2>Hero block</h2> -->
			<?php get_template_part( 'templates/single', 'designers'); ?>
		</div>
		<?php // Edit the loop in /templates/single-loop. Or roll your own. ?>
		
	</main>
	<div class="fluid general-supplementary">
		<div class="supplementary-wrapper">

	<?php if( get_field('wedding_products') ): ?>
		<section class="region med--m">
			<h4 class="wfl sizes-M2 w-ul">Wedding Rings from <?php the_title(); ?> </h4>
			<?php
				$shortcode = get_post_meta($post->ID,'wedding_products',true);
				echo do_shortcode($shortcode);
			?>
		</section>
	<?php endif; ?>

	<?php if( get_field('engagement_products') ): ?>
		<section class="region med--m">
			<h4 class="wfl sizes-M2 w-ul">Engagement Rings from <?php the_title(); ?> </h4>
			<?php
				$shortcode = get_post_meta($post->ID,'engagement_products',true);
				echo do_shortcode($shortcode);
			?>
		</section>
	<?php endif; ?>

	<?php if( get_field('our_jewellery_products') ): ?>
		<section class="region med--m">
			<h4 class="wfl sizes-M2 w-ul">Our Jewellery from <?php the_title(); ?> </h4>
			<?php
				$shortcode = get_post_meta($post->ID,'our_jewellery_products',true);
				echo do_shortcode($shortcode);
			?>
		</section>
	<?php endif; ?>

	<!-- [product_attribute limit="4" orderby="id" order="DESC" attribute="occasions" filter="engagement" class="product-grouping"] -->
		</div>
		<?php get_sidebar('designers'); ?>
	</div>
</div>

<?php get_footer(); ?>
