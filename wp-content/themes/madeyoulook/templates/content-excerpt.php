<?php if ( has_post_thumbnail() ) { ?>

<?php the_excerpt(); ?>

<div class="post-thumbnail">

	<?php // the_post_thumbnail( 'template-thumb-300' ); ?>

	<?php the_post_thumbnail('post'); ?>

</div>

<?php } ?>

