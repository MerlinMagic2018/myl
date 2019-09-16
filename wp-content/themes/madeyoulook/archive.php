<?php get_header(); ?>
	
<div id="inner-content" class="fluid inner-content cf">

	<main id="main" class="main-content" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">

		<?php // Edit the loop in /templates/archive-loop. Or roll your own. ?>
		<?php get_template_part( 'templates/archive', 'loop'); ?>

	</main>

	<?php get_sidebar(); ?>

</div>

<?php get_footer(); ?>
