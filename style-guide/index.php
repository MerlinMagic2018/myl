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
<body class="page-body development" data-off-screen="hidden" id="page-body">
<!--<body class="page-body" id="page-body" lang="en" onload="prettyPrint()">-->
 
<?php include "includes/header.php"; ?>

<hr class="hide-divider">

<div class="inner-content">
	<nav class="global-breadcrumb">
		<ul class="breadcrumb-list cf">
			<li>Breadcrumb</li>
			<li>Or Feature Callout CTA</li>
		</ul>
	</nav>

	<!--start main content-->
	<main class="grid-cell main-content" id="main-content" role="main">
        <section class="region">
        	<h2 class="wfsb sizes-XLG">Common <abbr title="User Interface">UI</abbr></h2>
        	<p class="media-excerpt">This guide acts as a technical reference for all the design elements that make up the Made You Look website. It ensures a consistent design and provides common CSS &amp; HTML used.</p>
        	
        </section>
        
<!-- STYLE GUIDE PATTERN ### COLOURS -->
        <section class="region sg-pattern" id="colours">
        	<h2 class="sg-heading">Colours</h2>
        	<h3 class="sg-subheading" id="backgrounds">Backgrounds &amp; Body</h3>
        	<ul class="sg-colors">
        		<li>
        			<h4 class="sg-tileheading">Body BG</h4>
        			<span style="background:#fff;" class="sg-swatch">&nbsp;</span>
        			<span class="sg-label">#fff</span>
        		</li>
        		<li>
        			<h4 class="sg-tileheading">Body Copy</h4>
        			<span style="background:#3b3a3f;" class="sg-swatch">&nbsp;</span>
        			<span class="sg-label">#3b3a3f</span>
        		</li>
        		<li>
        			<h4 class="sg-tileheading">Link</h4>
        			<span style="background:#000;" class="sg-swatch">&nbsp;</span>
        			<span class="sg-label">#000</span>
        		</li>
        		<li>
        			<h4 class="sg-tileheading">Link:hover</h4>
        			<span style="background:#666;" class="sg-swatch">&nbsp;</span>
        			<span class="sg-label">#666</span>
        		</li>
        		<li>
        			<h4 class="sg-tileheading">Blue - Teal</h4>
        			<span style="background:#06435b;" class="sg-swatch">&nbsp;</span>
        			<span class="sg-label">#06435b</span>
        		</li>
        		<li>
        			<h4 class="sg-tileheading">Callout Red</h4>
        			<span style="background:#88090d;" class="sg-swatch">&nbsp;</span>
        			<span class="sg-label">#88090d</span>
        		</li>

        		<li>
        			<h4 class="sg-tileheading">Light Grey</h4>
        			<span style="background:#e4e6e5;" class="sg-swatch">&nbsp;</span>
        			<span class="sg-label">#e4e6e5</span>
        		</li>

        		<li>
        			<h4 class="sg-tileheading">Callout</h4>
        			<span style="background:#f1b33b;" class="sg-swatch">&nbsp;</span>
        			<span class="sg-label">#f1b33b</span>
        		</li>
        	</ul>
        	
        	<h3 class="sg-subheading" id="headings">Headings and Titles</h3>
        	<ul class="sg-colors">
        		<li>
        			<!--<h4 class="sg-tileheading">Body BG</h4>-->
        			<span style="background:#0e0e0e;" class="sg-swatch">&nbsp;</span>
        			<span class="sg-label">#0e0e0e</span>
        		</li>
        		<li>
        			<!--<h4 class="sg-tileheading">Body Copy</h4>-->
        			<span style="background:#333;" class="sg-swatch">&nbsp;</span>
        			<span class="sg-label">#333</span>
        		</li>
        		<li>
        			<!--<h4 class="sg-tileheading">Headings</h4>-->
        			<span style="background:#666;" class="sg-swatch">&nbsp;</span>
        			<span class="sg-label">#666</span>
        		</li>
        		<li>
        			<!--<h4 class="sg-tileheading">Links</h4>-->
        			<span style="background:#999;" class="sg-swatch">&nbsp;</span>
        			<span class="sg-label">#999</span>
        		</li>
        	</ul>
        	
        </section>


		<section class="region sg-pattern">
			<h2 class="sg-heading">Simple Grid</h2>

			<h3 class="sg-subheading">No need to complicate the layout!</h3>

			<div class="row cf">
				<div class="col span-1">1 of 6</div>
				<div class="col span-5">5 of 6</div>
			</div>

			<div class="row cf">
				<div class="col span-2">2 of 6</div>
				<div class="col span-4">4 of 6</div>
			</div>

			<div class="row cf">
				<div class="col span-3">3 of 6</div>
				<div class="col span-3">3 of 6</div>
			</div>

			<div class="row cf">
				<div class="col span-4">4 of 6</div>
				<div class="col span-2">2 of 6</div>
			</div>

			<div class="row cf">
				<div class="col span-5">5 of 6</div>
				<div class="col span-1">1 of 6</div>
			</div>

			<div class="row cf">
				<div class="col span-6">6 of 6</div>
			</div>
			
			<div class="row cf">
				<div class="col span-3">By 2</div>
				<div class="col span-3">By 2</div>
			</div>

			<div class="row cf">
				<div class="col span-2">By 3</div>
				<div class="col span-2">By 3</div>
				<div class="col span-2">By 3</div>
			</div>

			<div class="row cf">
				<div class="col span-2-5">By 4</div>
				<div class="col span-2-5">By 4</div>
				<div class="col span-2-5">By 4</div>
				<div class="col span-2-5">By 4</div>
			</div>

			<div class="row cf">
				<div class="col span-1-5">By 5</div>
				<div class="col span-1-5">By 5</div>
				<div class="col span-1-5">By 5</div>
				<div class="col span-1-5">By 5</div>
				<div class="col span-1-5">By 5</div>
			</div>
			
			<div class="row cf">
				<div class="col span-1">By 6</div>
				<div class="col span-1">By 6</div>
				<div class="col span-1">By 6</div>
				<div class="col span-1">By 6</div>
				<div class="col span-1">By 6</div>
				<div class="col span-1">By 6</div>
			</div>


		</section>
		
		<section id="blocks" class="sg-pattern">
			<h2 class="sg-heading">Building Blocks</h2>
			<h3 class="sg-subheading">A listing of features -- With first feature larger than the rest</h3>
				
			<section class="region list-of-features has--main-feature">
				
				<article role="article" class="feature is--main-feature">
					<h4 class="wfl sizes-M3">Three Stone Saffire Ring</h4>
        		 	<a class="feature-img img--is-main-feature" href="link.html" tabindex="-1" aria-hidden="true"><img src="/assets/img/content/deco-ring.jpg" alt="" role="presentation" /></a>

        		 	<div class="feature-body">
        		 		<!-- <p class="source-org vcard copyright">from <span class="org fn webicon i-chatelaine" itemprop="sourceOrganization">Chatelaine</span></p> -->
        		 		<h3 class="feature-label sf">featured:</h3>
        		 		<h4 class="wfl sizes-LG" itemprop="name">sexy fall fashions</h4>
        		 		<p class="author pf-i" itemprop="author" itemscope itemtype="http://schema.org/Person">
        		 			by <span itemprop="name">Emma Reddington</span>
        		 		</p>
        		 		<p class="summary" itemprop="description">
        		 			 Whether you have your own summer cabin or not, these idyllic homes are sure to inspire
        		 			<a href="link.html" class="sf cc">...continue reading</a> 
        		 		</p>
        		 	</div>
        		 </article>
				
				<article class="feature is--listing">
					<figure class="img--is-feature">
						<a href="?1234" class="img--is-listing" tabindex="-1" aria-hidden="true"><img alt="Placeholder" src="/assets/img/content/deco-ring.jpg"></a>
						<figcaption class="listing-meta cf"><span class="promo-meta">14k gold</span> <span class="promo-price float-r">$1395</span></figcaption>
					</figure>
					
					<div class="feature-body">
						<h4 class="wfsb sizes-S"><a href="?1234">Three Stone Saffire Ring</a></h4>
						<h4 class="wfl sizes-S">Designer: <a href="?1234" class="cc">Aimee Kennedy</a></h4>
						<!-- <p class="feature-excerpt no-ss">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p> -->
					</div>
				</article>
				
				<article class="feature is--listing">
					<figure class="img--is-feature">
						<a href="?1234" class="img--is-listing" tabindex="-1" aria-hidden="true"><img alt="Placeholder" src="/assets/img/content/deco-ring.jpg"></a>
						<figcaption class="listing-meta cf"><span class="promo-meta">14k gold</span> <span class="promo-price float-r">$1395</span></figcaption>
					</figure>
					
					<div class="feature-body">
						<h4 class="wfsb sizes-S"><a href="?1234">Three Stone Saffire Ring</a></h4>
						<h4 class="wfl sizes-S">Designer: <a href="?1234" class="cc">Aimee Kennedy</a></h4>
						<!-- <p class="feature-excerpt no-ss">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p> -->
					</div>
				</article>

				<article class="feature is--listing">
					<figure class="img--is-feature">
						<a href="?1234" class="img--is-listing" tabindex="-1" aria-hidden="true"><img alt="Placeholder" src="/assets/img/content/deco-ring.jpg"></a>
						<figcaption class="listing-meta cf"><span class="promo-meta">14k gold</span> <span class="promo-price float-r">$1395</span></figcaption>
					</figure>
					
					<div class="feature-body">
						<h4 class="wfsb sizes-S"><a href="?1234">Three Stone Saffire Ring</a></h4>
						<h4 class="wfl sizes-S">Designer: <a href="?1234" class="cc">Aimee Kennedy</a></h4>
						<!-- <p class="feature-excerpt no-ss">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p> -->
					</div>
				</article>

				<article class="feature is--listing">
					<figure class="img--is-feature">
						<a href="?1234" class="img--is-listing" tabindex="-1" aria-hidden="true"><img alt="Placeholder" src="/assets/img/content/deco-ring.jpg"></a>
						<figcaption class="listing-meta cf"><span class="promo-meta">14k gold</span> <span class="promo-price float-r">$1395</span></figcaption>
					</figure>
					
					<div class="feature-body">
						<h4 class="wfsb sizes-S"><a href="?1234">Three Stone Saffire Ring</a></h4>
						<h4 class="wfl sizes-S">Designer: <a href="?1234" class="cc">Aimee Kennedy</a></h4>
						<!-- <p class="feature-excerpt no-ss">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p> -->
					</div>
				</article>
				
			</section>
				
			
			<section class="region list-of-features is--feature-list cf">
				<h3 class="sg-subheading">A listing of features</h3>

				<article class="feature is--listing">
					<figure class="img--is-feature">
						<a href="?1234" class=" img--is-listing" tabindex="-1" aria-hidden="true"><img alt="Placeholder" src="/assets/img/content/deco-ring.jpg"></a>
						<figcaption class="listing-meta cf"><span class="promo-meta">14k gold</span> <span class="promo-price float-r">$1395</span></figcaption>
					</figure>
					
					<div class="feature-body">
						<h4 class="wfsb sizes-S"><a href="?1234">Three Stone Saffire Ring</a></h4>
						<p class="feature-excerpt no-ss">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
						
					</div>
				</article>
				
				<article class="feature is--listing">
					<figure class="img--is-feature">
						<a href="?1234" class=" img--is-listing" tabindex="-1" aria-hidden="true"><img alt="Placeholder" src="/assets/img/content/deco-ring.jpg"></a>
						<figcaption class="listing-meta cf"><span class="promo-meta">14k gold</span> <span class="promo-price float-r">$1395</span></figcaption>
					</figure>
					
					<div class="feature-body">
						<h4 class="wfsb sizes-S"><a href="?1234">Three Stone Saffire Ring</a></h4>
						<p class="feature-excerpt no-ss">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
						
					</div>
				</article>
				
				<article class="feature is--listing">
					<figure class="img--is-feature">
						<a href="?1234" class=" img--is-listing" tabindex="-1" aria-hidden="true"><img alt="Placeholder" src="/assets/img/content/deco-ring.jpg"></a>
						<figcaption class="listing-meta cf"><span class="promo-meta">14k gold</span> <span class="promo-price float-r">$1395</span></figcaption>
					</figure>
					
					<div class="feature-body">
						<h4 class="wfsb sizes-S"><a href="?1234">Three Stone Saffire Ring</a></h4>
						<p class="feature-excerpt no-ss">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
						
					</div>
				</article>

				<article class="feature is--listing">
					<figure class="img--is-feature">
						<a href="?1234" class=" img--is-listing" tabindex="-1" aria-hidden="true"><img alt="Placeholder" src="/assets/img/content/deco-ring.jpg"></a>
						<figcaption class="listing-meta cf"><span class="promo-meta">14k gold</span> <span class="promo-price float-r">$1395</span></figcaption>
					</figure>
					
					<div class="feature-body">
						<h4 class="wfsb sizes-S"><a href="?1234">Three Stone Saffire Ring</a></h4>
						<p class="feature-excerpt no-ss">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
						
					</div>
				</article>
			</section>	
				
			<div class="region">
				<h3 class="sg-subheading">A listing of features -- 2 in line block</h3>

				<section class="region promo-grouping group-of-2" id="group-of-2">

					<article class="feature is--promo">
						<figure class="img--is-feature">
							<a href="?1234" class="img--is-promo" tabindex="-1" aria-hidden="true"><img alt="Placeholder" src="/assets/img/content/deco-ring.jpg"></a>
							<figcaption class="listing-meta cf"><span class="promo-meta">14k gold</span> <span class="promo-price float-r">$1395</span></figcaption>
						</figure>
						
						<div class="feature-body">
							<h4 class="wfsb sizes-S"><a href="?1234">Three Stone Saffire Ring</a></h4>
							<h5 class="wfl sizes-S">Designer: <a href="?1234" class="cc">Aimee Kennedy</a></h5>
							<!-- <p class="feature-excerpt no-ss">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p> -->
							
						</div>
					</article>

					<article class="feature is--promo">
						<figure class="img--is-feature">
							<a href="?1234" class="img--is-promo" tabindex="-1" aria-hidden="true"><img alt="Placeholder" src="/assets/img/content/deco-ring.jpg"></a>
							<figcaption class="listing-meta cf"><span class="promo-meta">14k gold</span> <span class="promo-price float-r">$1395</span></figcaption>
						</figure>
						
						<div class="feature-body">
							<h4 class="wfsb sizes-S"><a href="?1234">Three Stone Saffire Ring</a></h4>
							<h5 class="wfl sizes-S">Designer: <a href="?1234" class="cc">Aimee Kennedy</a></h5>
							<!-- <p class="feature-excerpt no-ss">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p> -->
							
						</div>
					</article>

				</section>
			</div>


			<div class="region">
				<h3 class="sg-subheading">A listing of features -- 3 in line block</h3>

				<section class="region promo-grouping group-of-3">
					
					
					<article class="feature is--promo">
						<figure class="img--is-feature">
							<a href="?1234" class="img--is-promo" tabindex="-1" aria-hidden="true"><img alt="Placeholder" src="/assets/img/content/deco-ring.jpg"></a>
							<figcaption class="listing-meta cf"><span class="promo-meta">14k gold</span> <span class="promo-price float-r">$1395</span></figcaption>
						</figure>
						
						<div class="feature-body">
							<h4 class="wfsb sizes-S"><a href="?1234">Three Stone Saffire Ring</a></h4>
							<p class="feature-excerpt no-ss">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
							
						</div>
					</article>

					<article class="feature is--promo">
						<figure class="img--is-feature">
							<a href="?1234" class="img--is-promo" tabindex="-1" aria-hidden="true"><img alt="Placeholder" src="/assets/img/content/deco-ring.jpg"></a>
							<figcaption class="listing-meta cf"><span class="promo-meta">14k gold</span> <span class="promo-price float-r">$1395</span></figcaption>
						</figure>
						
						<div class="feature-body">
							<h4 class="wfsb sizes-S"><a href="?1234">Three Stone Saffire Ring</a></h4>
							<p class="feature-excerpt no-ss">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
							
						</div>
					</article>

					<article class="feature is--promo">
						<figure class="img--is-feature">
							<a href="?1234" class="img--is-promo" tabindex="-1" aria-hidden="true"><img alt="Placeholder" src="/assets/img/content/deco-ring.jpg"></a>
							<figcaption class="listing-meta cf"><span class="promo-meta">14k gold</span> <span class="promo-price float-r">$1395</span></figcaption>
						</figure>
						
						<div class="feature-body">
							<h4 class="wfsb sizes-S"><a href="?1234">Three Stone Saffire Ring</a></h4>
							<p class="feature-excerpt no-ss">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
							
						</div>
					</article>
					
				</section>
			</div>

			<div class="region">
				<h3 class="sg-subheading block" style="display:block !important; width: 100%;">A listing of features -- 4 in line block</h3>

				<section class="region promo-grouping group-of-4">
					
					<article class="feature is--promo">
						<figure class="img--is-feature">
							<a href="?1234" class="img--is-promo" tabindex="-1" aria-hidden="true"><img alt="Placeholder" src="/assets/img/content/deco-ring.jpg"></a>
							<figcaption class="listing-meta cf"><span class="promo-meta">14k gold</span> <span class="promo-price float-r">$1395</span></figcaption>
						</figure>
						
						<div class="feature-body">
							<h4 class="wfsb sizes-S"><a href="?1234">Three Stone Saffire Ring</a></h4>
							<p class="feature-excerpt no-ss">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
							
						</div>
					</article>

					<article class="feature is--promo">
						<figure class="img--is-feature">
							<a href="?1234" class="img--is-promo" tabindex="-1" aria-hidden="true"><img alt="Placeholder" src="/assets/img/content/deco-ring.jpg"></a>
							<figcaption class="listing-meta cf"><span class="promo-meta">14k gold</span> <span class="promo-price float-r">$1395</span></figcaption>
						</figure>
						
						<div class="feature-body">
							<h4 class="wfsb sizes-S"><a href="?1234">Three Stone Saffire Ring</a></h4>
							<p class="feature-excerpt no-ss">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
							
						</div>
					</article>

					<article class="feature is--promo">
						<figure class="img--is-feature">
							<a href="?1234" class="img--is-promo" tabindex="-1" aria-hidden="true"><img alt="Placeholder" src="/assets/img/content/deco-ring.jpg"></a>
							<figcaption class="listing-meta cf"><span class="promo-meta">14k gold</span> <span class="promo-price float-r">$1395</span></figcaption>
						</figure>
						
						<div class="feature-body">
							<h4 class="wfsb sizes-S"><a href="?1234">Three Stone Saffire Ring</a></h4>
							<p class="feature-excerpt no-ss">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
							
						</div>
					</article>

					<article class="feature is--promo">
						<figure class="img--is-feature">
							<a href="?1234" class="img--is-promo" tabindex="-1" aria-hidden="true"><img alt="Placeholder" src="/assets/img/content/deco-ring.jpg"></a>
							<figcaption class="listing-meta cf"><span class="promo-meta">14k gold</span> <span class="promo-price float-r">$1395</span></figcaption>
						</figure>
						
						<div class="feature-body">
							<h4 class="wfsb sizes-S"><a href="?1234">Three Stone Saffire Ring</a></h4>
							<p class="feature-excerpt no-ss">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
							
						</div>
					</article>
					
				</section>

			</div>
					
			
			<section class="region span-of-5 cf">
				<h3 class="sg-subheading">A listing of features -- 5 in line block</h3>
				
				<article class="feature is--listing">
					<figure class="img--is-feature">
						<a href="?1234" class=" img--isListing" tabindex="-1" aria-hidden="true"><img alt="Placeholder" src="/assets/img/content/deco-ring.jpg"></a>
						<figcaption class="listing-meta cf"><span class="promo-meta">14k gold</span> <span class="promo-price float-r">$1395</span></figcaption>
					</figure>
					
					<div class="feature-body">
						<h4 class="wfsb sizes-S"><a href="?1234">Three Stone Saffire Ring</a></h4>
						<p class="feature-excerpt no-ss">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
						
					</div>
				</article>

				<article class="feature is--listing">
					<figure class="img--is-feature">
						<a href="?1234" class=" img--isListing" tabindex="-1" aria-hidden="true"><img alt="Placeholder" src="/assets/img/content/deco-ring.jpg"></a>
						<figcaption class="listing-meta cf"><span class="promo-meta">14k gold</span> <span class="promo-price float-r">$1395</span></figcaption>
					</figure>
					
					<div class="feature-body">
						<h4 class="wfsb sizes-S"><a href="?1234">Three Stone Saffire Ring</a></h4>
						<p class="feature-excerpt no-ss">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
						
					</div>
				</article>

				<article class="feature is--listing">
					<figure class="img--is-feature">
						<a href="?1234" class=" img--isListing" tabindex="-1" aria-hidden="true"><img alt="Placeholder" src="/assets/img/content/deco-ring.jpg"></a>
						<figcaption class="listing-meta cf"><span class="promo-meta">14k gold</span> <span class="promo-price float-r">$1395</span></figcaption>
					</figure>
					
					<div class="feature-body">
						<h4 class="wfsb sizes-S"><a href="?1234">Three Stone Saffire Ring</a></h4>
						<p class="feature-excerpt no-ss">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
						
					</div>
				</article>

				<article class="feature is--listing">
					<figure class="img--is-feature">
						<a href="?1234" class=" img--isListing" tabindex="-1" aria-hidden="true"><img alt="Placeholder" src="/assets/img/content/deco-ring.jpg"></a>
						<figcaption class="listing-meta cf"><span class="promo-meta">14k gold</span> <span class="promo-price float-r">$1395</span></figcaption>
					</figure>
					
					<div class="feature-body">
						<h4 class="wfsb sizes-S"><a href="?1234">Three Stone Saffire Ring</a></h4>
						<p class="feature-excerpt no-ss">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
						
					</div>
				</article>

				<article class="feature is--listing">
					<figure class="img--is-feature">
						<a href="?1234" class=" img--isListing" tabindex="-1" aria-hidden="true"><img alt="Placeholder" src="/assets/img/content/deco-ring.jpg"></a>
						<figcaption class="listing-meta cf"><span class="promo-meta">14k gold</span> <span class="promo-price float-r">$1395</span></figcaption>
					</figure>
					
					<div class="feature-body">
						<h4 class="wfsb sizes-S"><a href="?1234">Three Stone Saffire Ring</a></h4>
						<p class="feature-excerpt no-ss">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
						
					</div>
				</article>
				
			</section>
			
		</section>

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










