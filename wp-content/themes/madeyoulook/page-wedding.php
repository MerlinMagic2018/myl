<?php
/*
 Template Name: Jewellery Landing
 * 
 * Use this template for a static home page. 
 * If you don't need the main loop, remove it
 * and get busy.
*/
?>

<?php get_header(); ?>

<div id="inner-content" class="fluid inner-content cf">

	<main id="main" class="main-content" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">

		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		
		<article id="post-<?php the_ID(); ?>" class="article--content hentry cf" role="article" itemscope itemtype="http://schema.org/BlogPosting">

			<?php get_template_part( 'templates/header', 'title'); ?>

			<?php // Delete or comment out if you don't need this on your page or post. Edit in /templates/byline.php ?>
			<?php // get_template_part( 'templates/byline'); ?>

			<div class="entry-content cf" itemprop="articleBody">
				
				<?php the_content(); ?>
			
			</div> <?php // end article section ?>

		</article>

		<?php endwhile; endif; ?>
		
		<section class="">
			<!-- <h3>Featured Wedding Rings</h3> -->

			<?php
				//$field = get_sub_field_object( $key );

					if( have_rows('featured_wedding_designer') ):

						while( have_rows('featured_wedding_designer') ) : the_row(); 

						    ?>
						    <p><?php the_sub_field('designer_name'); ?></p>
						    <?php the_sub_field('designer_name'); ?>
						    <?php

						endwhile;

					endif;

					if( have_rows('featured_wedding_designer') ):
					    while( have_rows('featured_wedding_designer') ): the_row();

						 //    $name = get_sub_field('designer-name');
							// $prod = get_sub_field('designer-products');

							?>
							<p>Designer: <?php the_sub_field('designer_name'); ?></p>

						<?php 
					    if( $subfields = get_row() ) { ?>
					    	<?php 
							$name = the_sub_field('designer-name');
							$prod = the_sub_field('designer-products');
							?>
					    	<?php // echo $field['label']; ?>
					    	<p>Designer: <?php echo $name ?></p>
					    <ul>
					        <?php
					        foreach ($subfields as $key => $value) {
					        if ( !empty($value) ) { $field = get_sub_field_object( $key ); ?>
					        <li><?php echo $field['label']; ?> : <?php echo $value; ?></li>
					        <?php }
					        } ?>
					    </ul>
					    <?php }
					    endwhile;
					endif;




			// vars
			$hero = get_field('featured_wedding_designer');	

			if( $hero ): ?>
				<div id="hero">

					<?php echo $hero['designer-name']; ?>
					<?php echo $hero['designer-products']; ?>

					<?php // echo $hero['image']['alt']; ?>

					
				</div>
			<?php endif; ?>


		</section>



		<section class="">
			<!-- <h3>Featured Wedding Rings</h3> -->


			<?php if( get_field('featured_wedding_rings') ): ?>
				<section class="region med--m">
					<h2 class="wfl sizes-M2 w-ul">Our Featured Wedding Rings</h2>
					<?php
						$shortcode = get_post_meta($post->ID,'featured_wedding_rings',true);
						echo do_shortcode($shortcode);
					?>
				</section>
			<?php endif; ?>


		</section>

		<section class="">
			<h3>Featured Wedding Bands</h3>


		</section>

		<div>
			<?php 

// 			$args = array(
//     'order'      => 'ASC',
//     'hide_empty' => $hide_empty,
//     'include'    => $ids,
//     'posts_per_page' =>'-1'
// );
// $product_categories = get_terms( 'wedding-rings', $args );
// echo "<select>";
// foreach( $product_categories as $category ){
//     echo "<option value = '" . esc_attr( $category->slug ) . "'>" . esc_html( $category->name ) . "</option>";
// }
// echo "</select>";


			?>
		</div>
	
		<?php // Edit the loop in /templates/loop. Or roll your own. ?>
		<?php // get_template_part( 'templates/loop'); ?>

	</main>

	<?php get_sidebar('designers'); ?>

</div>


<?php get_footer(); ?>
