<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

	<article class="article--content hentry fluid cf" role="article" itemscope itemprop="blogPost" itemtype="http://schema.org/BlogPosting">

		<!-- <header class="article-header entry-header"> -->

			<?php // get_template_part( 'templates/header', 'title'); ?>

			<?php // Delete or comment out if you don't need this on your page or post. Edit in /templates/byline.php ?>
			<?php // get_template_part( 'templates/byline'); ?>
                  
		<!-- </header> --> <?php // end article header ?>

        <div class="entry-content designer--profile cf" itemprop="articleBody">

        	<?php if ( has_post_format()) { 
        		get_template_part( 'format', get_post_format() ); 
        	}
        	?>
        	<?php echo '<h2 class="title-beta"><span>Designer:</span> ' . get_the_title() . '</h2>'; ?>
        	<figure class="featured-img">
    			<?php the_post_thumbnail(' large ', array('class' => 'img--primary-featured')); ?>
    		</figure>


        	<div class="designer--bio">
				<figure class="profile--img">
	        		<?php echo wp_get_attachment_image(get_post_meta(get_the_ID(), 'second_featured_image', true),'medium'); ?>
	        	</figure>
        		
        		<?php // get_template_part( 'templates/header', 'title'); ?>

        		<!-- <div style="float: left; width: 80%;"> -->
        			<?php the_content(); ?>
        		<!-- </div> -->
        	</div>

        <?php /* Instagram Link */ ?>
        <?php if( get_field('instagram_profile') ): ?>
			<div class="designer--profile-meta">
				<p class="">Find and follow <?php the_title(); ?> <a href="<?php the_field("instagram_profile"); ?>" rel="nofollow" target="blank">on Instagram</a>!</p>
				
			</div>
		<?php endif; ?>

		<?php /* Accreditations */ ?>
        <?php if( get_field('accreditations') ): ?>
			<div class="designer--profile-meta" style="float: right; width: 55%;">
				<h4 class="sizes-SM w-ul">Accreditations</h4>
				
			</div>
		<?php endif; ?>

		
		<?php /* Designer Featured Products */ ?>
		<?php if( get_field('featured_products') ): ?>
		<div class="designer-profile--features med--m">
			<section class="region">
				<h4 class="wfsg">What we're loving from <?php the_title(); ?>!</h4>
				<?php
					$shortcode = get_post_meta($post->ID,'featured_products',true);
					echo do_shortcode($shortcode);
				?>
			</section>
			<?php /*[products ids="2380, 2359" skus="635, 635-A"]
			[products limit="4" visibility="featured" class="product-grouping"]
			*/ ?>
		</div>
		<?php endif; ?>

        </div> <?php // end article section ?>

	</article> <?php // end article ?>

<?php endwhile; endif; ?>