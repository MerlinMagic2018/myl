<?php require_once($_SERVER['DOCUMENT_ROOT'].'/style-guide/global-vars.php'); ini_set('display_errors', 1);?>
<!DOCTYPE HTML>
<html class="no-js no-touch" dir="ltr" lang="en-CA" data-off-canvas="" id="site-body" itemscope itemtype="http://schema.org/WebSite">
<!--[if IE]><![endif]-->
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!--[if IE]>
    <meta http-equiv="imagetoolbar" content="false" /><meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" /><meta http-equiv="cleartype" content="on" />
    <![endif]-->

    <title itemprop="name">Style Guide - Made You Look Jewellery</title>

    <?php include "includes/head-setup.php"; ?>
    
    <?php include "includes/head.php"; ?>
    
</head>
<body class="page-body development" data-off-screen="hidden" id="page-body">



<?php include "includes/header.php"; ?>

<hr class="hide-divider">


<!-- start main content -->
<div class="fluid inner-content template-1-column">
    <main class="main-content" role="main" id="main-content">
        <h2>Main Content full width</h2>
    </main>
</div>


<!-- start main content -->
<div class="fluid inner-content template-2-column">
    <main class="main-content" role="main" id="main-content">
        <h2>Main Content</h2>


        <section class="region">
            <h2 class="feature-title sizes-XLG">Common <abbr title="User Interface">UI</span></h2>
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

        </section>
        
        <section id="blocks" class="sg-pattern">
            <h2 class="sg-heading">Building Blocks</h2>
                
            

            <section class="region list-of-features">

                <h3 class="sg-subheading">A listing of features -- With first feature larger than the rest</h3>
                <article role="article" class="feature is--mainFeature">
                    <a class="feature-img img--isMainFeature" href="link.html" tabindex="-1" aria-hidden="true"><img src="http://placeimg.com/600/400/nature" alt="" role="presentation" /></a>

                    <div class="feature-body">
                        <p class="source-org vcard copyright">from <span class="org fn webicon i-chatelaine" itemprop="sourceOrganization">Chatelaine</span></p>
                        <h3 class="feature-label sf">featured:</h3>
                        <h4 class="content-title sizes-LG" itemprop="name">sexy fall fashions</h4>
                        <p class="author pf-i" itemprop="author" itemscope itemtype="http://schema.org/Person">
                            by <span itemprop="name">Emma Reddington</span>
                        </p>
                        <p class="summary" itemprop="description">
                             Whether you have your own summer cabin or not, these idyllic homes are sure to inspire
                            <a href="link.html" class="sf cc">...continue reading</a> 
                        </p>
                    </div>
                 </article>
                
                <article class="feature is--Listing">
                    <a href="?1234" class="feature-img img--isListing" tabindex="-1" aria-hidden="true"><img alt="Placeholder" src="/assets/dev/img/poster-image.jpg" height="338" width="530" role="presentation" /></a>
                    
                    <div class="feature-body">
                        <h4 class="feature-title sizes-LG"><a href="?1234">This is a title: Could be short or long</a></h4>
                        <p class="feature-excerpt no-ss">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                        
                    </div>
                </article>
                
                <article class="feature is--Listing">
                    <a href="?1234" class="feature-img img--isListing" tabindex="-1" aria-hidden="true"><img alt="Placeholder" src="/assets/dev/img/poster-image.jpg" height="338" width="530" role="presentation" /></a>
                    
                    <div class="feature-body">
                        <h4 class="feature-title sizes-LG"><a href="?1234">This is a title: Could be short or long</a></h4>
                        <p class="feature-excerpt no-ss">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                        
                    </div>
                </article>
                
            </section>
            
        </section>

    </main>


    <aside class="aside" role="complimentary">
        <h3>Aside</h3>
    </aside>


</div>
<hr class="hide-divider">


<!-- start main content -->
<div class="fluid inner-content template-3-column">

    <nav class="supplementary">
        <h3>Small Column</h3>
    </nav>

    <main class="main-content" role="main" id="main-content">
        <h3>Main Content</h3>
    </main>

    <aside class="aside" role="complimentary">
        <h3>Aside</h3>
    </aside>
</div>

<!-- start footer -->
<?php include "includes/footer.php"; ?>

<span id="exit-off-canvas" class="exit-offcanvas"></span>


<script src="/assets/js/core/init.js"></script>
<?php include "includes/dev-scripts.php"; ?>
</body>
</html>


