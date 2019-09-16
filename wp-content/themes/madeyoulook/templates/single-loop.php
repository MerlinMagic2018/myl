<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

	<article id="post-<?php the_ID(); ?>" class="article--content hentry cf" role="article" itemscope itemprop="blogPost" itemtype="http://schema.org/BlogPosting">

		<header class="article-header entry-header">

			<?php get_template_part( 'templates/header', 'title'); ?>

			<?php // Delete or comment out if you don't need this on your page or post. Edit in /templates/byline.php ?>
			<?php // get_template_part( 'templates/byline'); ?>
                  
		</header> <?php // end article header ?>

        <div class="entry-content cf" itemprop="articleBody">

        	<?php if ( has_post_format()) { 
        		get_template_part( 'format', get_post_format() ); 
        	}
        	?>
        	<?php the_post_thumbnail('post'); ?>
        	<?php the_content(); ?>

        </div> <?php // end article section ?>

		<footer class="article-footer">

			<?php get_template_part( 'templates/category-tags'); ?>

		</footer> <?php // end article footer ?>

	</article> <?php // end article ?>

<?php endwhile; endif; ?>