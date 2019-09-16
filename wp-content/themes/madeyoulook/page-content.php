<?php
/*
 Template Name: Content
 
 * This is the base custom page template. 
 * 
 * Change the "Template Name" at the top and save as page-newname.php and it will
 * show up as a template in the Page Templates drop-down on page edit screens in 
 * the admin. 
 * 
 * Then change it as you need for each page or groups of pages. 
 * 
 * Convenience, look it up.
 * 
 * Remember to keep the markup and content separate. 
 * 
 * For more info: http://codex.wordpress.org/Page_Templates
 * 
 * Visual interactive WordPress template hierarchy: https://wphierarchy.com
*/
?>

<?php get_header(); ?>

<div id="inner-content" class="fluid inner-content cf">

	<?php // the_sub_menu() ?>

	<main id="main" class="main-content--general" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">
		<h2 class="hide-text">Main Content</h2>

		<?php // Edit the loop in /templates/loop. Or roll your own. ?>

		<?php the_sub_menu() ?>

		<?php get_template_part( 'templates/loop-content'); ?>

	</main>

	<?php get_sidebar(); ?>

</div>

<?php get_footer(); ?>
