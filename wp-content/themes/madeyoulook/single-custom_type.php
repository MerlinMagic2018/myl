<?php 
/*
 * Custom Post Type Archive Template
 *
 * This is the custom post type archive template. If you edit the custom post type name,
 * you've got to change the name of this template to reflect that name change.
 *
 * For Example, if your custom post type call is "register_post_type( 'staff' )",
 * then your template name should be archive-staff.php
 *
 * For more info: http://codex.wordpress.org/Post_Type_Templates
*/
?>

<?php get_header(); ?>

<div id="inner-content" class="fluid inner-content cf">

	<main id="main" class="main-content" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">

		<h2 class="archive-title h2"><?php post_type_archive_title(); ?></h2>

			<?php // Edit the loop in /templates/archive-loop. Or roll your own. ?>
			<?php get_template_part( 'templates/archive', 'loop'); ?>

	</main>

	<?php get_sidebar(); ?>

</div>

<?php get_footer(); ?>
