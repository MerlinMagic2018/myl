<?php

//post_type_archive_title( '<h2 class="page-title">', '</h2>' );
//the_archive_description( '<div class="taxonomy-description">', '</div>' );

global $post;
   //if (is_single()) {
      echo get_the_excerpt('$page->ID');
   //}
?>

<div class="page-header--standard">
	<h2 class="wfsg title-alpha">Our <?php post_type_archive_title(); ?></h2>
	<?php the_archive_description(); ?>
</div>

<?php if( get_field('designer_section_description') ): ?>
		<section class="region med--m">
			<h3 class="wfl sizes-M2 w-ul">About Our Designers</h4>
			<?php
				$shortcode = get_ppage_meta($page->ID,'designer_section_description',true);
				echo do_shortcode($shortcode);
			?>
		</section>
	<?php endif; ?>
<?php // the_excerpt(); ?>
							
<!-- <div class="list-of-features is--feature-list">	 -->
<div class="product-grouping">
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

	<article class="feature is--listing hentry cf" role="article">

		<?php // get_template_part( 'templates/byline'); ?>

		<figure class="img--is-feature">

			<?php // the_post_thumbnail( 'template-thumb-300' ); ?>
			<?php // the_post_thumbnail('post'); ?>
			<?php if ( has_post_thumbnail() ) : ?>
			    <a href="<?php the_permalink(); ?>" class="img--is-listing">
			    <?php the_post_thumbnail( 'large' ); ?>
			    </a>
			<?php endif; ?>
			<?php 
				// if ( has_post_thumbnail() ) {
				//     the_post_thumbnail( 'large' );
				// 	} 

			//the_post_thumbnail( $page->ID, 'medium' ); 
					?>
			<?php // the_post_thumbnail( 'post', array( 150, 150) ); ?>

		</figure>
		<div class="feature-body">
			<?php get_template_part( 'templates/header', 'title'); ?>
			<?php // the_excerpt(10); ?>
			<?php // get_template_part( 'templates/category-tags'); ?>
		</div>

	</article>
<?php endwhile; endif; ?>
</div>
<?php // get_template_part( 'templates/post-navigation'); ?>