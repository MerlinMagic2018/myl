<?php get_header(); ?>
	
<div id="inner-content" class="inner-content cf">

	<main id="main" class="main-content--full-width fluid has--standard-pad main--designers" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">
		<!-- <p>archive designers</p> -->
		<?php // Edit the loop in /templates/archive-loop. Or roll your own. ?>
		<?php get_template_part( 'templates/archive', 'designers'); ?>

	</main>

	<?php // get_sidebar(); ?>

</div>

<?php get_footer(); ?>
