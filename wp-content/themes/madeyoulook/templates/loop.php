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