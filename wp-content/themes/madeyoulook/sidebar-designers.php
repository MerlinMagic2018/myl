<aside id="sidebar-designers" class="aside aside--designers" role="complementary">
	
	<div class="region aside--region aside--social med--m"> 
		<h3 class="wfsb title-beta">Be social!</h3>
		<p>Love what you see? Feel free to share!</p>

	</div>
	
	<div id="text-3" class="region aside--region">
		<h3 class="wfsb title-beta">Our Designers</h3>            
		<p>Would you like to get to know our designers? Browse their profiles!</p>
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

	

	<?php if ( is_active_sidebar( 'sidebar-designers' ) ) : ?>

		<?php dynamic_sidebar( 'sidebar-designers' ); ?>

	<?php endif; ?>


	<p>Designers sidebar</p>

</aside>
