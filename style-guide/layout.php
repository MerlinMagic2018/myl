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
<body class="page-body body-home development" data-off-screen="hidden" id="page-body">
<!--<body class="page-body" id="page-body" lang="en" onload="prettyPrint()">-->
 
<?php include "includes/header.php"; ?>

<div class="hero cf has-bg-gradient--dots">
    <section class="fluid hero-standard">
        <h2>Level 1</h2>
        <p>split 50% - has gradient and dotted bg</p>

        <div class="row cf">
            <div class="col span-3">3 of 6</div>
            <div class="col span-3">3 of 6</div>
        </div>
    </section>
</div>


<div class="hero cf has-bg--solid">
    <section class="fluid hero-standard">
        <h2>Level 2</h2>
        <p>Split 33% - has basic grey BG</p>

        <div class="row cf">
            <div class="col span-2">2 of 6</div>
            <div class="col span-2">2 of 6</div>
            <div class="col span-2">2 of 6</div>
        </div>
    </section>
</div>

<div class="hero cf has-bg--solid-alt">
    <section class="fluid hero-standard">
        <h2>Level 2</h2>
        <p>Split 33% - has basic grey BG</p>

        <div class="row cf">
            <div class="col span-2">2 of 6</div>
            <div class="col span-2">2 of 6</div>
            <div class="col span-2">2 of 6</div>
        </div>
    </section>
</div>

<div class="hero cf has-bg--gradient">
    <section class="fluid hero-standard">
        <h2>Level 3</h2>
        <p>Split 25% - has gradient grey BG</p>

        <div class="row cf">
            <div class="col span-2-5">By 4</div>
            <div class="col span-2-5">By 4</div>
            <div class="col span-2-5">By 4</div>
            <div class="col span-2-5">By 4</div>
        </div>
    </section>
</div>



<div class="fluid inner-content">

	<!--start main content-->
	<main class="grid-cell main-content" id="main-content" role="main">
        <div class="bg-img">
            <p>hello</p>
        </div>

        <section id="info-tables" class="sg-pattern">
            <h2 class="sg-heading">Fancy Promos</h2>

            <h3 class="sg-subheading">Standard 3 promos</h3>

            <section class="fancy-promos span-of-3 has--ul-fancy bg-img">
                <h2 class="h-b uc-center size-L">How to start watching today:</h2>

                <article class="feature is--fancy">
                    <h3 class="h-b size-M-alt uc"><span class="i-inline i-pt i--wifi">Are you a Rogers wireless data or internet customer?</span></h3>
                    <div class="feature-body">
                        <p class="feature-excerpt">Enjoy a free subscription until December 31, 2014.<sup title="See Terms">1</sup></p>
                        <p><button class="btn btn-default btn-block btn--myrogers" data-target="#new_session_modal" data-toggle="modal" href="#new_session_modal" id="btn-signin">Sign in with <span class="my-rogers-text">MyRogers&trade;</span></button></p>

                        <p class="small-text">New to <em>MyRogers</em>? <a href="/profiles/new">Register Now</a></p>
                    </div>
                </article>

                <article class="feature is--fancy">
                    <h3 class="h-b size-M-alt uc"><span class="i-inline i-pt i--phone">Get a Rogers wireless or internet plan today.</span></h3>
                    <div class="feature-body">
                        <p class="feature-excerpt">Enjoy a free subscription until December 31, 2014.<sup title="See Terms">1</sup></p>
                        <p><a href="http://www.rogers.com/web/content/share-everything" rel="external" title="Will be taken to rogers.com">View Wireless Plans</a><br>
                        <a href="http://www.rogers.com/web/link/hispeedBrowseFlowDefaultPlans" rel="external" title="Will be taken to rogers.com">View Internet Packages</a></p>
                    </div>
                </article>

                <article class="feature is--fancy">
                    <h3 class="h-b size-M-alt uc"><span class="i-inline i-pt i--logo-nhl-light">Subscribe to Rogers NHL GameCentre <span class="uppercase">Live</span>&trade; Today.</span></h3>
                    <div class="feature-body">
                        <p class="feature-excerpt">
                            Subscribe to a Season&#39;s Pass for
                            <span class="buy-price">
                                <span class="price wfsb">
                                    <sup class="wfsb">$</sup>199<sup class="wfsb">99</sup>
                                </span>
                                <span class="block">Earlybird<sup title="See Terms">2</sup></span>
                            </span>
                        </p>
                        <p><a class="btn btn-default btn-block" href="/profiles/new">Subscribe</a></p>
                        <!--<p class="small-text">Available in October</p>-->
                    </div>
                </article>
                <p class="clear cf"><small>Standard data overage/roaming rates apply when using Rogers NHL GameCentre LIVE&trade;.<sup>1</sup></small></p>
            </section>

            <h3 class="sg-subheading">3 Promos with Promo code form</h3>
            <section class="fancy-promos span-of-3 has--ul-fancy">

                <h2 class="h-sb size-L2 lg-m">Other options to watch Rogers NHL GameCentre <span class="uppercase">Live</span>&trade; today:</h2>

                <article class="feature is--fancy">
                    <h3 class="h-b size-M-alt uc"><span class="i-inline i-pt i--phone">Get a Rogers wireless or internet plan today.</span></h3>
                    <div class="feature-body">
                        <p class="feature-excerpt">Enjoy a free subscription until December 31, 2014.<sup title="See Terms">1</sup></p>
                        <p><a href="http://www.rogers.com/web/content/share-everything" rel="external" title="Will be taken to rogers.com">View Wireless Plans</a><br>
                        <a href="http://www.rogers.com/web/link/hispeedBrowseFlowDefaultPlans" rel="external" title="Will be taken to rogers.com">View Internet Packages</a></p>
                    </div>
                </article>

                <article class="feature is--fancy">
                    <h3 class="h-b size-M-alt uc"><span class="i-inline i-pt i--logo-nhl-light">Subscribe to Rogers NHL GameCentre <span class="uppercase">Live</span>&trade; Today.</span></h3>
                    <div class="feature-body">
                        <p class="feature-excerpt">
                            Subscribe to a Season&#39;s Pass for
                            <span class="buy-price">
                                <span class="price wfsb">
                                    <sup class="wfsb">$</sup>199<sup class="wfsb">99</sup>
                                </span>
                                <span class="block">Earlybird<sup title="See Terms">2</sup></span>
                            </span>
                        </p>
                        <p><a class="btn btn-default btn-block" href="/orders">Subscribe</a></p>
                        <!--<p class="small-text">Available in October</p>-->
                    </div>
                </article>

                <article class="feature is--fancy text-center">
                    <form accept-charset="UTF-8" action="/profiles/promo_code" class="simple_form promo-form cf" method="post" novalidate="novalidate"><div style="display:none"><input name="utf8" type="hidden" value="&#x2713;" /><input name="authenticity_token" type="hidden" value="Wp9diLWv5qEVcRhZIkxj2UpWPyhI4/JDdVKYkpEbAxw=" /></div>
                        <fieldset>
                            <legend class="h-b size-L uc">Use a <span>Promo Code</span></legend>
                            <div class="form-row string required promo_code_code"><label class="string required form-label form-label" for="promo_code_code"><abbr title="required">*</abbr> Have a promo code? Redeem it here:</label><div class="controls"><input class="string required text-field" id="promo_code_code" name="promo_code[code]" placeholder="promo" type="text" /></div></div>
                            <input class="btn btn-default btn btn-secondary" name="commit" type="submit" value="Submit" />
                        </fieldset>
                    </form>
                </article>

            </section>

            

        </section>


        <section id="info" class="sg-pattern">
            <h2 class="sg-heading">Info Boxes</h2>

            <h3 class="sg-subheading">General Info Box Large</h3>
            <section class="info info-lg info--primary">
                <h3 class="section-title">Did you know?</h3>
                <p>1 hour of video = XGB of data</p>
                <p>We recommend packages with at least XGB to watch 4 live games a month</p>
                <p><a href="http://www.rogers.com" class="btn btn-tertiary" rel="external">View Rogers Offers</a></p>
            </section>

            <h3 class="sg-subheading">General Info Box Medium</h3>
            <section class="info info-m info--primary">
                <h3 class="section-title">Did you know?</h3>
                <p>1 hour of video = XGB of data</p>
                <p>We recommend packages with at least XGB to watch 4 live games a month</p>
                <p><a href="http://www.rogers.com" class="btn btn-tertiary" rel="external">View Rogers Offers</a></p>
            </section>

            <h3 class="sg-subheading">General Info Box Small</h3>
            <section class="info info-sm info--primary">
                <h3 class="section-title">Did you know?</h3>
                <p>1 hour of video = XGB of data</p>
                <p>We recommend packages with at least XGB to watch 4 live games a month</p>
                <p><a href="http://www.rogers.com" class="btn btn-tertiary" rel="external">View Rogers Offers</a></p>
            </section>

            <h3 class="sg-subheading">Info Box with Tables</h3>

        </section>


        <section id="info-tables" class="sg-pattern">
            <h2 class="sg-heading">App downloads</h2>

            <aside class="app-downloads" role="complementary">
                <h2 class="h-b size-L uc">Get the app and experience all the jaw-dropping action <small>starting October 8.</small></h2>
            <p class="app-buttons">
                <a href="/" class="ico i-apps i--google">Andriod App on Google Play</a> <a href="/" class="ico i-apps i--apple">Download on the App Store</a> 
            </p>
            </aside>
        </section>

        <section id="info-tables" class="sg-pattern">
            <h2 class="sg-heading">Features</h2>

            <section class="span-of-4 has--ul-fancy" id="gcl-features">
                <h2 class="h-b size-L uc-center">Rogers NHL GameCentre <span class="uppercase">Live</span>&trade; features:</h2>

                <article class="feature is--promo">
                    <span class="feature-img img--isPromo" aria-hidden="true" data-src="/assets/content/feature-1.jpg" data-alt="Live Games" data-width="220" data-height="119"></span>
                    
                    <div class="feature-body">
                        <h3 class="h-b size-SM uc">Live Games</h3>
                        <p class="promo-excerpt">Live stream over 1,000 games, including national and out-of-market, and catch the 2015 Stanley Cup&reg; Playoffs, the NHL Winter Classic&reg; and the NHL&reg; All-Star Game</p>
                    </div>
                </article>
                <article class="feature is--promo">
                    <span href="?1234" class="feature-img img--isPromo" aria-hidden="true" data-src="/assets/content/feature-2.jpg" data-alt="Multi-Game Views" data-width="200" data-height="119"></span>
                    
                    <div class="feature-body">
                        <h3 class="h-b size-SM uc">Multi-Game Views</h3>
                        <p class="promo-excerpt">No need to channel surf&mdash;catch all the action at once.<sup>3</sup></p>
                    </div>
                </article>
                <article class="feature is--promo">
                    <span href="?1234" class="feature-img img--isPromo" aria-hidden="true" data-src="/assets/content/feature-3.jpg" data-alt="Home and Away Broadcasts" data-width="200" data-height="119"></span>
                    
                    <div class="feature-body">
                        <h3 class="h-b size-SM uc">Home and Away Broadcasts</h3>
                        <p class="promo-excerpt">Choose the home or away team's broadcast.</p>
                    </div>
                </article>
                <article class="feature is--promo">
                    <span href="?1234" class="feature-img img--isPromo" aria-hidden="true" data-src="/assets/content/feature-4.jpg" data-alt="Pic n Pic Highlights" data-width="200" data-height="119"></span>
                    
                    <div class="feature-body">
                        <h3 class="h-b size-SM uc">Pic n Pic Highlights</h3>
                        <p class="promo-excerpt">Watch highlights without leaving the game.</p>
                    </div>
                </article>

            </section>

            
        </section>

        <section id="info-tables" class="sg-pattern">
            <h2 class="sg-heading">Order tables</h2>

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










