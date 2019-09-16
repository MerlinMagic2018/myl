<aside id="sidebar1" class="aside aside--products" role="complementary">
	
	<div class="region aside--region aside--social med--m"> 
		<h3 class="wfsb title-beta">Be social!</h3>
		<p>Love what you see? Feel free to share!</p>

	</div>

	<div class="region aside--region aside--dropdown">

		<h3 class="wfsb title-beta">Our Designers</h3>
		<p class="copy-S med--m">Would you like to get to know our designers? Browse their profiles!</p>
		<!-- <ul> -->
		<?php 
			// $args = array(
			//     'post_type' => 'designers',
			//     'title_li'  => 'Choose a Designer'
			// );
			// wp_list_pages( $args ); 
		 ?>
		<!-- </ul> -->

		 <?php 
		 // 	$args = array(
			//     'post_type' => 'designers',
			//     'class' => 'test-class',
			//     'selected' => 1,
			//     'echo' => 1,
			//     'option_none_value' => '0',
			// );
			// wp_dropdown_pages( $args );
		  ?>

		<form action="<?php bloginfo('url'); ?>" method="get">
			<fieldset class="fieldset">
				<legend class="hide-text">Choose a designer to view</legend>
				<div class="fancy-select">
		    <?php
		    $select = wp_dropdown_pages(
	            array(
	                'post_type' => 'designers',
	                'show_option_none' => 'Choose a Designer',
	                'echo' => 0
	            )
	        );

		    echo str_replace('<select ', '<select onchange="this.form.submit()" ', $select);
		    ?>
				</div>
		    	<noscript><input type="submit" name="submit" value="View"></noscript>
		    </fieldset>
		</form>

	</div>
	<?php if ( is_active_sidebar( 'sidebar-products' ) ) : ?>

		<?php dynamic_sidebar( 'sidebar-products' ); ?>

	<?php endif; ?>

	<p>Products sidebar</p>

</aside>
