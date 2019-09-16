<?php require_once($_SERVER['DOCUMENT_ROOT'].'/style-guide/global-vars.php'); ini_set('display_errors', 1);?>
<!DOCTYPE HTML>
<html class="no-js no-touch" dir="ltr" lang="en-CA" data-off-canvas="" id="site-body" itemscope itemtype="http://schema.org/WebSite">
<!--[if IE]><![endif]-->
<head>
    <link rel="preload" href="/assets/fonts/opensans-regular/os-regular.woff2" as="font" type="font/woff2" crossorigin>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!--[if IE]>
    <meta http-equiv="imagetoolbar" content="false" /><meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" /><meta http-equiv="cleartype" content="on" />
    <![endif]-->

    <title itemprop="name">Style Guide - Made You Look Jewellery</title>

    <?php include "includes/head-setup.php"; ?>
    
    <?php include "includes/head.php"; ?>
    
</head>
<body class="page-body" id="page-body">
<!--<body class="page-body" id="page-body" lang="en" onload="prettyPrint()">-->
    
<?php include "includes/header.php"; ?>
<hr class="hide-divider">

<div class="fluid inner-content">

	<!--start main content-->
	<main class="grid-cell main-content" id="main-content" role="main">
        <section class="region" style="padding-top:2em">
        	<h2 class="feature-title sizes-XLG">Common <abbr title="User Interface">UI</abbr> &mdash; Components</h2>
        	<p class="media-excerpt">This guide acts as a technical reference for all the design elements that make up the Made You Look website. It ensures a consistent design and provides common CSS &amp; HTML used.</p>
        	
        </section>
        

<!-- STYLE GUIDE PATTERN ### ALERTS -->
        <section class="region sg-pattern" id="alerts">
            <h2 class="sg-heading">Alerts</h2>
            <h3 class="sg-subheading">General</h3>
            <div class="region">
                <p>All alert units are marked up using <code>&#8249;div&#8250;</code> tags with an <code>alert</code> class.<br>
                Additional <code>alert--error</code>, <code>alert--info</code> and <code>alert--success</code> modifier classes alters their presentation for respective states.</p>
            </div>

            <h3 class="sg-subheading">Alert Colours</h3>
            <ul class="sg-colors cf">
                <li>
                    <h4 class="sg-tileheading">Alert</h4>
                    <span style="background:#f8d7d4;" class="sg-swatch">&nbsp;</span>
                    <span class="sg-label">#f8d7d4</span>
                </li>
                <li>
                    <h4 class="sg-tileheading">Alert</h4>
                    <span style="background:#dd3829;" class="sg-swatch">&nbsp;</span>
                    <span class="sg-label">#dd3829</span>
                </li>
                <li>
                    <h4 class="sg-tileheading">Caution</h4>
                    <span style="background:#fff2cc;" class="sg-swatch">&nbsp;</span>
                    <span class="sg-label">#fff2cc</span>
                </li>
                <li>
                    <h4 class="sg-tileheading">Caution</h4>
                    <span style="background:#eeb100;" class="sg-swatch">&nbsp;</span>
                    <span class="sg-label">#eeb100</span>
                </li>
                <li>
                    <h4 class="sg-tileheading">Notice</h4>
                    <span style="background:#dfefb7;" class="sg-swatch">&nbsp;</span>
                    <span class="sg-label">#dfefb7</span>
                </li>
                <li>
                    <h4 class="sg-tileheading">Notice</h4>
                    <span style="background:#6fa200;" class="sg-swatch">&nbsp;</span>
                    <span class="sg-label">#6fa200</span>
                </li>
                <li>
                    <h4 class="sg-tileheading">General</h4>
                    <span style="background:#ddd;" class="sg-swatch">&nbsp;</span>
                    <span class="sg-label">#ddd</span>
                </li>
                <li>
                    <h4 class="sg-tileheading">General</h4>
                    <span style="background:#333;" class="sg-swatch">&nbsp;</span>
                    <span class="sg-label">#333</span>
                </li>
            </ul>

            <h3 class="sg-subheading">Alerts</h3>
            <div class="alert alert--block">
                <p class="i-inline i-pl i--block"><strong>Rock Hammer</strong> A geologist&#8217;s hammer, rock hammer, rock pick or geological pick is a hammer used for splitting and breaking rocks.</p>
            </div>
<!-- example -->
<pre class="brush: js; gutter: false; html-script: true; toolbar: false; class-name: 'class_name_demo';">
    <div class="alert alert--block">
        <p class="i-inline i-pl i--block"><strong>Rock Hammer</strong> A geologist&#8217;s hammer, rock hammer, rock pick or geological pick is a hammer used for splitting and breaking rocks.</p>
    </div>
</pre>
            
            <h3 class="sg-subheading">Info</h3>
            <div class="alert alert--caution">
                <p class="i-inline i-pl i--caution"><strong>Rock Hammer</strong> A geologist&#8217;s hammer, rock hammer, rock pick or geological pick is a hammer used for splitting and breaking rocks.</p>
            </div>
<!-- example -->
<pre class="brush: js; gutter: false; html-script: true; toolbar: false; class-name: 'class_name_demo';">
    <div class="alert alert--caution">
        <p class="i-inline i-pl i--caution"><strong>Rock Hammer</strong> A geologist&#8217;s hammer, rock hammer, rock pick or geological pick is a hammer used for splitting and breaking rocks.</p>
    </div>
</pre>

            
            <h3 class="sg-subheading">Error</h3>
            <div class="alert alert--alert">
                <p class="i-inline i-pl i--alert"><strong>Rock Hammer</strong> A geologist&#8217;s hammer, rock hammer, rock pick or geological pick is a hammer used for splitting and breaking rocks.</p>
            </div>
<!-- example -->
<pre class="brush: js; gutter: false; html-script: true; toolbar: false; class-name: 'class_name_demo';">
    <div class="alert alert--alert">
        <p class="i-inline i-pl i--alert"><strong>Rock Hammer</strong> A geologist&#8217;s hammer, rock hammer, rock pick or geological pick is a hammer used for splitting and breaking rocks.</p>
    </div>
</pre>

            
            <h3 class="sg-subheading">Success</h3>
            <div class="alert alert--notice">
                <p class="i-inline i-pl i--notice"><strong>Rock Hammer</strong> A geologist&#8217;s hammer, rock hammer, rock pick or geological pick is a hammer used for splitting and breaking rocks.</p>
            </div>
<!-- example -->
<pre class="brush: js; gutter: false; html-script: true; toolbar: false; class-name: 'class_name_demo';">
    <div class="alert alert--notice">
        <p class="i-inline i-pl i--notice"><strong>Rock Hammer</strong> A geologist&#8217;s hammer, rock hammer, rock pick or geological pick is a hammer used for splitting and breaking rocks.</p>
    </div>
</pre>

        </section>

        
        <section class="region sg-pattern" id="buttons">
        	<h2 class="sg-heading">Buttons</h2>
        		            	
<!-- STYLE GUIDE PATTERN ### Buttons -->
        	<h3 class="sg-subheading sg-toggler">Single Btn</h3>
            <a class="btn btn-default" href="">Standard</a><br>
            <a class="btn btn-cancel" href="">Cancel</a>

        	<p><a class="btn btn-default" href="">Standard</a>
        	<a class="btn btn-secondary" href="">Secondary Colour</a>
            <a class="btn btn-tertiary" href="">Tertiary Colour</a><br>

        	<button class="btn btn-default" href="">Actual Btn</button>
            <button class="btn btn-secondary" href="">Actual Btn</button>
            <button class="btn btn-tertiary" href="">Actual Btn</button>
        </p>
<!-- example -->
<pre class="brush: js; gutter: false; html-script: true; toolbar: false; class-name: 'class_name_demo';">
    <!-- single button -->
    <a class="btn btn-default" href="">Standard</a><br>
    <a class="btn btn-cancel" href="">Cancel</a>

    <!-- or multiple buttons -->
    <p>
        <a class="btn btn-default" href="">Standard</a>
        <a class="btn btn-secondary" href="">Secondary Colour</a>
        <a class="btn btn-tertiary" href="">Tertiary Colour</a>
        <button class="btn btn-default" href="">Actual Btn</button>
        <button class="btn btn-secondary" href="">Actual Btn</button>
        <button class="btn btn-tertiary" href="">Actual Btn</button>
    </p>
</pre>
        	

            <h3 class="sg-subheading sg-toggler">Single Buttons - In the corners</h3>
            <p class="cf"><a class="btn btn-default float-r" href="">Standard</a>
            <button class="btn btn-tertiary float-l" href="">Actual Btn</button></p>
<!-- example -->
<pre class="brush: js; gutter: false; html-script: true; toolbar: false; class-name: 'class_name_demo';">
    <p class="cf">
        <a class="btn btn-default float-r" href="">Standard</a>
        <button class="btn btn-tertiary float-l" href="">Actual Btn</button>
    </p>
</pre>
        	
        	
        	<h3 class="sg-subheading sg-toggler">Button - Full Width</h3>
        	<p><a class="btn btn-default btn-block" href="">Btn full width</a>
            <a class="btn btn-secondary btn-block" href="">Btn full width Secondary Colour</a>
            <button class="btn btn-tertiary btn-block" href="">Standard Btn</button></p>
<!-- example -->
<pre class="brush: js; gutter: false; html-script: true; toolbar: false; class-name: 'class_name_demo';">
    <p>
        <a class="btn btn-default btn-block" href="">Btn full width</a>
        <a class="btn btn-secondary btn-block" href="">Btn full width Secondary Colour</a>
        <button class="btn btn-tertiary btn-block" href="">Standard Btn</button>
    </p>
</pre>
        	
        	
        	<h3 class="sg-subheading sg-toggler">Button Group</h3>
        	<ul class="inline-list btn-group">
        		<li><a class="btn btn-default" href="/">Button</a></li>
        		<li><a class="btn btn-default" href="/">Button</a></li>
        		<li><a class="btn btn-default" href="/">Button</a></li>
        	</ul>
<!-- example -->
<pre class="brush: js; gutter: false; html-script: true; toolbar: false; class-name: 'class_name_demo';">
    <ul class="inline-list btn-group">
        <li><a class="btn btn-default" href="/">Button</a></li>
        <li><a class="btn btn-default" href="/">Button</a></li>
        <li><a class="btn btn-default" href="/">Button</a></li>
    </ul>
</pre>
        	
        	<h3 class="sg-subheading sg-toggler">Button Group - Full Width</h3>
        	<ul class="btn-group-wide">
                <li><a class="btn btn-default" href="/">Button</a></li>
                <li><a class="btn btn-tertiary" href="/">Button</a></li>
            </ul>
<!-- example -->
<pre class="brush: js; gutter: false; html-script: true; toolbar: false; class-name: 'class_name_demo';">
    <ul class="btn-group-wide">
        <li><a class="btn btn-default" href="/">Button</a></li>
        <li><a class="btn btn-tertiary" href="/">Button</a></li>
    </ul>
</pre>

            <ul class="btn-group-wide">
        		<li><a class="btn btn-default" href="/">Button</a></li>
                <li><a class="btn btn-secondary" href="/">Button</a></li>
                <li><a class="btn btn-tertiary" href="/">Button</a></li>
        	</ul>
<!-- example -->
<pre class="brush: js; gutter: false; html-script: true; toolbar: false; class-name: 'class_name_demo';">
    <ul class="btn-group-wide">
        <li><a class="btn btn-default" href="/">Button</a></li>
        <li><a class="btn btn-secondary" href="/">Button</a></li>
        <li><a class="btn btn-tertiary" href="/">Button</a></li>
    </ul>
</pre>

            <h3 class="sg-subheading sg-toggler">Button Group - In the corners</h3>
            <ul class="inline-list btn-group cf">
                <li class="float-r"><a class="btn btn-default" href="/">Button</a></li>
                <li class="float-l"><a class="btn btn-tertiary" href="/">Button</a></li>
            </ul>
<!-- example -->
<pre class="brush: js; gutter: false; html-script: true; toolbar: false; class-name: 'class_name_demo';">
    <ul class="inline-list btn-group cf">
        <li class="float-r"><a class="btn btn-default" href="/">Button</a></li>
        <li class="float-l"><a class="btn btn-tertiary" href="/">Button</a></li>
    </ul>
</pre>
        	
        	
        	<h3 class="sg-subheading sg-toggler">Button MyRogers</h3>
        	<!-- EXAMPLE -->
        	<p>
                <a class="btn btn-default" href="">Standard</a>
            <a class="btn btn-secondary" href="">Secondary Colour</a>
            <a class="btn btn-tertiary" href="">Tertiary Colour</a>


            <a class="btn btn-default btn--myrogers" href="">Sign In with <span class="my-rogers-text">My Rogers</span></a>
            <a class="btn btn-tertiary" href="/">Button</a></p>
<!-- example -->
<pre class="brush: js; gutter: false; html-script: true; toolbar: false; class-name: 'class_name_demo';">
    <p><a class="btn btn-default btn--myrogers" href="">Sign In with <span class="my-rogers-text">My Rogers</span></a></p>
</pre>
        
        </section>

		
        <section id="modals" class="region sg-pattern">
            <h2 class="sg-heading">Modals</h2>

            <h3 class="sg-subheading">Simple Modal</h3>
    		<p><a href="#modal-show" title="Clicking this link shows the modal">Demo Show</a></p>
			<!-- A modal with its content -->
			<div class="modal--show" id="modal-show" tabindex="-1" role="dialog" aria-labelledby="label-show" aria-hidden="true">

				<div class="modal-inner">
					<header class="modal-header">
						<h2 id="label-show" class="modal-heading">A modal</h2>
					</header>

					<div class="modal-content">
						<p>Content.</p>
						<p><a href="#stackable">Stackable Modal</a></p>

						<p>Fap raw denim Marfa, eu lomo artisan jean shorts. Next level YOLO biodiesel PBR. Irure farm-to-table cardigan, culpa helvetica nostrud nulla messenger bag. Leggings gentrify iPhone dreamcatcher dolor. Butcher PBR est scenester McSweeney's, retro et single-origin coffee vegan irony. <a href="#">http://www.thisisalongtestlinkaaaaaaaaaaaaaaaaaaaaaaaaaaaa.com/here-is-our-article-text-url-which-is-very-long</a>. Dolore twee wayfarers beard yr mlkshk biodiesel, art party sint gastropub eiusmod fixie. Banksy sed DIY put a bird on it gentrify raw denim, art party vero keffiyeh cred aesthetic.</p>

						<p>Disrupt brunch keffiyeh chillwave Williamsburg. Excepteur food truck thundercats voluptate ethical, whatever in craft beer leggings proident Vice pour-over polaroid. Terry Richardson hoodie Truffaut Wes Anderson kale chips, synth nostrud elit sint id cillum bespoke. Semiotics synth Cosby sweater brunch beard, lo-fi esse Godard Echo Park sapiente mollit wayfarers. Cillum lomo cliche, YOLO Cosby sweater fixie tumblr eu umami Schlitz assumenda culpa. Chillwave church-key plaid, labore nulla flannel kogi Tonx single-origin coffee cred ex sustainable. Mlkshk ennui polaroid post-ironic sunt, keytar semiotics sriracha fashion axe labore church-key art party.</p>

						<p>McSweeney's ex hashtag, officia beard id voluptate authentic gluten-free fingerstache 90's incididunt keytar butcher. Et meggings put a bird on it, retro yr artisan VHS chillwave ethical fixie culpa cliche wolf organic. Salvia keffiyeh fap Odd Future. Skateboard duis shabby chic put a bird on it. Stumptown flannel Williamsburg sartorial, seitan locavore Wes Anderson typewriter cliche. Elit ea nesciunt, keffiyeh cliche quis put a bird on it. Aesthetic food truck consequat, pop-up do commodo letterpress cornhole proident beard whatever Godard.</p>

						<p>Literally consequat squid, consectetur cred banjo leggings letterpress salvia incididunt semiotics Tonx. Carles et velit letterpress, kale chips quis labore delectus blue bottle irony nesciunt sed. Gastropub sartorial tote bag, non nostrud sriracha Cosby sweater typewriter pour-over lo-fi. Lomo 8-bit skateboard you probably haven't heard of them consequat freegan. Quis accusamus Marfa fanny pack single-origin coffee raw denim. Tumblr food truck ennui Tonx exercitation. Veniam flannel vegan leggings DIY.</p>

						<p>Disrupt brunch keffiyeh chillwave Williamsburg. Excepteur food truck thundercats voluptate ethical, whatever in craft beer leggings proident Vice pour-over polaroid. Terry Richardson hoodie Truffaut Wes Anderson kale chips, synth nostrud elit sint id cillum bespoke. Semiotics synth Cosby sweater brunch beard, lo-fi esse Godard Echo Park sapiente mollit wayfarers. Cillum lomo cliche, YOLO Cosby sweater fixie tumblr eu umami Schlitz assumenda culpa. Chillwave church-key plaid, labore nulla flannel kogi Tonx single-origin coffee cred ex sustainable. Mlkshk ennui polaroid post-ironic sunt, keytar semiotics sriracha fashion axe labore church-key art party.</p>

						<p>McSweeney's ex hashtag, officia beard id voluptate authentic gluten-free fingerstache 90's incididunt keytar butcher. Et meggings put a bird on it, retro yr artisan VHS chillwave ethical fixie culpa cliche wolf organic. Salvia keffiyeh fap Odd Future. Skateboard duis shabby chic put a bird on it. Stumptown flannel Williamsburg sartorial, seitan locavore Wes Anderson typewriter cliche. Elit ea nesciunt, keffiyeh cliche quis put a bird on it. Aesthetic food truck consequat, pop-up do commodo letterpress cornhole proident beard whatever Godard.</p>

						<p>Literally consequat squid, consectetur cred banjo leggings letterpress salvia incididunt semiotics Tonx. Carles et velit letterpress, kale chips quis labore delectus blue bottle irony nesciunt sed. Gastropub sartorial tote bag, non nostrud sriracha Cosby sweater typewriter pour-over lo-fi. Lomo 8-bit skateboard you probably haven't heard of them consequat freegan. Quis accusamus Marfa fanny pack single-origin coffee raw denim. Tumblr food truck ennui Tonx exercitation. Veniam flannel vegan leggings DIY.</p>
					</div>

					<footer class="modal-footert">
						<p>Footer</p>
					</footer>
				</div>

				<a href="#!" class="modal-close" title="Close this modal" data-dismiss="modal" data-close="Close">&times;</a>
			</div>



	</main>
	
</div><!--end site wrapper-->
<hr class="hide-divider">


<!-- start footer -->
<?php include "includes/footer.php"; ?>


<span id="exit-off-canvas" class="exit-offcanvas"></span>

<script src="/assets/js/core/init.js"></script>
<?php include "includes/dev-scripts.php"; ?>
</body>
</html>










