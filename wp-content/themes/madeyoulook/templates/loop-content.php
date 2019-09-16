<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

	<?php // Include the sub menu! ?>
	<?php // the_sub_menu() ?>
	
	<article id="post-<?php the_ID(); ?>" class="article--content hentry cf" role="article" itemscope itemtype="http://schema.org/BlogPosting">

		<?php get_template_part( 'templates/header', 'title'); ?>

		<?php // the_excerpt(); ?>

		<?php // get_template_part( 'templates/content', 'excerpt'); ?>

		<?php the_post_thumbnail('post'); ?>

		<?php // Delete or comment out if you don't need this on your page or post. Edit in /templates/byline.php ?>
		<?php // get_template_part( 'templates/byline'); ?>

		<div class="entry-content cf" itemprop="articleBody">
			
			<?php the_content(); ?>
		
		</div> <?php // end article section ?>

		<!-- <footer class="article-footer cf"></footer> -->

	</article>

<?php endwhile; endif; ?>