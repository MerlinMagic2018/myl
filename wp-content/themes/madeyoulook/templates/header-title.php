<?php // WordPress custom title script

if ( function_exists('is_tag') && is_tag() || is_category() || is_tax() ) { ?>

	<h2 class="archive-title"><span><?php _e( 'Posts Categorized:', 'templatetheme' ); ?></span> <?php single_cat_title(); ?> tag, cat, tax</h2>

<?php } elseif ( is_archive() ) { ?>

	<h3 class="wfsb sizes-S entry-title"><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h3>

<?php } elseif ( is_search() ) { ?>

	<h2 class="search-title entry-title">

		<a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a> search
									
	</h2>

<?php } elseif ( !(is_404() ) && ( is_single() ) || ( is_page() )) { ?>

	<h2 class="title-alpha wfsg" itemprop="headline"><?php the_title(); ?></h2>


<?php } elseif ( is_404() ) { ?>

	<h2><?php _e( '404', 'templatetheme' ); ?></h2>

<?php } elseif ( is_home() ) { ?>

	<h2 class="h2 entry-title">

		<a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a> home

	</h2>

<?php } else { ?>

	<h2 class="page-title" itemprop="headline"><?php the_title(); ?></h2> everything else

<?php }


?>