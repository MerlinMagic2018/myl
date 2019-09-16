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
            <h2 class="feature-title sizes-XLG">Common <abbr title="User Interface">UI</abbr> &mdash; Media</h2>
            <p class="media-excerpt">This guide acts as a technical reference for all the design elements that make up the Made You Look website. It ensures a consistent design and provides common CSS &amp; HTML used.</p>
            
        </section>
        <section id="icons" class="sg-pattern">
            <h2 class="sg-heading">Logos</h2>
            <h3 class="sg-subheading">Global Branding</h3>
            <ul class="inline-list" style="margin-bottom: 1.5em; ">

                <li><h1 class="brand brand-fs" id="logo" style="width: 240px;"><a class="is--logo" href="/" rel="external">Made You Look Jewellery</a></h1></li>
                <!-- <li lang="fr-ca" class="fr"><span class="ico i-logos i--logo-myrogers">Made You Look</span></li> -->
            </ul>
        </section>

        <section id="icons" class="sg-pattern">

            <!-- GLOBAL ICONS 
            #################################################### -->
            <h2 class="sg-heading">Icons - Global</h2>
            <h3 class="sg-subheading">Inline icons - Pull Left</h3>
            <p><code>class="i-inline i-pl i--caution"</code></p>
            <ul class="inline-list">
                <!-- <li><span class="i-inline i-pl i--caution">Caution</span></li>
                <li><span class="i-inline i-pl i--alert">Error</span></li>
                <li><span class="i-inline i-pl i--notice">Success</span></li>
                
                <li><a href="#"><span class="i-inline i-pl i--livechat">Live Chat</span></a></li>
                 -->

                <li><a href="#"><span class="i-inline i-pl i--search">Search</span></a></li>
                <li style="background-color: #aaa;"><span class="i-inline i-pl i--menu">Menu</span></li>
                <li><span class="i-inline i-pl i--close">Close</span></li>
                <li><span class="i-inline i-pl i--print">Print</span></li>
            </ul>


            <h3 class="sg-subheading">Inline icons &mdash; pull right</h3>
            <p><code>class="i-inline i-pr i--caution"</code></p>
            <ul class="inline-list">
                
                <!-- <li><span class="i-inline i-pr i--caution">Caution</span></li>
                <li><span class="i-inline i-pr i--alert">Error</span></li>
                <li><span class="i-inline i-pr i--notice">Success</span></li>
                
                <li><a href="#"><span class="i-inline i-pr i--livechat">Live Chat</span></a></li>
                 -->
                <li><a href="#"><span class="i-inline i-pr i--search">Search</span></a></li>
                <li style="background-color: #aaa;"><span class="i-inline i-pr i--menu">Menu</span></li>
                <li><span class="i-inline i-pr i--close">Close</span></li>
                <li><span class="i-inline i-pr i--print">Print</span></li>
            </ul>


            <h3 class="sg-subheading">Inline icons &mdash; pull top</h3>
            <p><small>*note - bacause each instance of PullTop will be different, padding and position has been minimized</small></p>
            <p><code>class="i-inline i-pt i--caution"</code></p>
            <ul class="inline-list">
                <!-- <li><span class="i-inline i-pt i--caution">Caution</span></li>
                <li><span class="i-inline i-pt i--alert">Error</span></li>
                <li><span class="i-inline i-pt i--notice">Success</span></li>
                
                <li><a href="#"><span class="i-inline i-pt i--livechat">Live Chat</span></a></li>
                 -->
                <li><a href="#"><span class="i-inline i-pt i--search">Search</span></a></li>
                <li style="background-color: #aaa;"><span class="i-inline i-pt i--menu">Menu</span></li>
                <li><span class="i-inline i-pt i--close">Close</span></li>
                <li><span class="i-inline i-pt i--print">Print</span></li>
            </ul>


            <h3 class="sg-subheading">Just icons &mdash; Small</h3>
            <p><code>class="ico i-sm i--caution"</code></p>
            <ul class="inline-list">
                <!-- <li><span class="ico i-sm i--caution">Caution</span></li>
                <li><span class="ico i-sm i--alert">Error</span></li>
                <li><span class="ico i-sm i--notice">Success</span></li>
                
                <li><span class="ico i-sm i--livechat">Live Chat</span></li>
                 -->
                <li><a href="#"><span class="ico i-sm i--search">Search</span></a></li>
                <li style="background-color: #aaa;"><span class="ico i-sm i--menu">Menu</span></li>
                <li><a href="#"><span class="ico i-sm i--close">Close</span></a></li>
                <li><span class="ico i-sm i--print">Print</span></li>
            </ul>


            <h3 class="sg-subheading">Just icons &mdash; Medium</h3>
            <p><code>class="ico i-m i--caution"</code></p>
            <ul class="inline-list">
                <!-- <li><span class="ico i-m i--caution">Caution</span></li>
                <li><span class="ico i-m i--alert">Error</span></li>
                <li><span class="ico i-m i--notice">Success</span></li>
                
                <li><span class="ico i-m i--livechat">Live Chat</span></li>
                 -->
                <li><a href="#"><span class="ico i-m i--search">Search</span></a></li>
                <li style="background-color: #aaa;"><span class="ico i-m i--menu">Menu</span></li>
                <li><span class="ico i-m i--close">Close</span></li>
                <li><span class="ico i-m i--print">Print</span></li>
            </ul>



            <h3 class="sg-subheading">Just icons &mdash; Large</h3>
            <p><code>class="ico i-lg i--caution"</code></p>
            <ul class="inline-list">
                <!-- <li><span class="ico i-lg i--caution">Caution</span></li>
                <li><span class="ico i-lg i--alert">Error</span></li>
                <li><span class="ico i-lg i--notice">Success</span></li>
                
                <li><span class="ico i-lg i--livechat">Live Chat</span></li>
                 -->
                <li><a href="#"><span class="ico i-lg i--search">Search</span></a></li>
                <input class="ico i-lg i--search" id="searchsubmit" type="submit" title="Submit your request" name="submit" value="Search">
                <li style="background-color: #aaa;"><span class="ico i-lg i--menu">Menu</span></li>
                <li><span class="ico i-lg i--close">Close</span></li>
                <li><span class="ico i-lg i--print">Print</span></li>
            </ul>


        </section>


        <section id="icons" class="sg-pattern">


            <!-- Social Media Icons 
            #################################################### -->
            <h2 class="sg-heading">Icons - Social Media</h2>
            <h3 class="sg-subheading">Inline icons - Pull Left</h3>
            <p><code>class="i-inline i-pl i--caution"</code></p>
            <ul class="inline-list">
                <li itemprop="name"><a class="is-circle" href="#" rel="external me" itemprop="url"><span class="i-inline i-pl i--fb">Facebook</span></a></li>
                <li itemprop="name"><a class="is-circle" href="#" rel="external me" itemprop="url"><span class="i-inline i-pl i--ig">Instagram</span></a></li>
                <li itemprop="name"><a class="is-circle" href="#" rel="external me" itemprop="url"><span class="i-inline i-pl i--pt">Pinterest</span></a></li>
                <li itemprop="name"><a class="is-circle" href="#" rel="external me" itemprop="url"><span class="i-inline i-pl i--tw">Twitter</span></a></li>
                <li itemprop="name"><a class="is-circle" href="#" rel="external me" itemprop="url"><span class="i-inline i-pl i--yt">Youtube</span></a></li>
                <li itemprop="name"><a class="is-circle" href="#" rel="external me" itemprop="url"><span class="i-inline i-pl i--yt">Tumblr</span></a></li>
            </ul>


            <h3 class="sg-subheading">Inline icons &mdash; pull right</h3>
            <p><code>class="i-inline i-pr i--caution"</code></p>
            <ul class="inline-list">
                <li><a href="#"><span class="i-inline i-pr i--call">Call</span></a></li>
                <li><span class="i-inline i-pr i--expand">Expand</span></li>
                <li><span class="i-inline i-pr i--collapse">Collapse</span></li>
                <li><span class="i-inline i-pr i--add">Add</span></li>
                <li><span class="i-inline i-pr i--edit">Edit</span></li>
                <li><span class="i-inline i-pr i--phone">Phone</span></li>
                <li><span class="i-inline i-pr i--wifi">wifi</span></li>
            </ul>


            <h3 class="sg-subheading">Inline icons &mdash; pull top</h3>
            <p><small>*note - bacause each instance of PullTop will be different, padding and position has been minimized</small></p>
            <p><code>class="i-inline i-pt i--caution"</code></p>
            <ul class="inline-list">
                <li><a href="#"><span class="i-inline i-pt i--call">Call</span></a></li>
                <li><span class="i-inline i-pt i--expand">Expand</span></li>
                <li><span class="i-inline i-pt i--collapse">Collapse</span></li>
                <li><span class="i-inline i-pt i--add">Add</span></li>
                <li><span class="i-inline i-pt i--edit">Edit</span></li>
                <li><span class="i-inline i-pt i--phone">Phone</span></li>
                <li><span class="i-inline i-pt i--wifi">wifi</span></li>
            </ul>


            <h3 class="sg-subheading">Just icons &mdash; Small</h3>
            <p><code>class="ico i-sm i--caution"</code></p>
            <ul class="inline-list">
                <li itemprop="name"><a class="is-circle" href="#" rel="external me" itemprop="url"><span class="ico i-sm i--fb">Facebook</span></a></li>
                <li itemprop="name"><a class="is-circle" href="#" rel="external me" itemprop="url"><span class="ico i-sm i--ig">Instagram</span></a></li>
                <li itemprop="name"><a class="is-circle" href="#" rel="external me" itemprop="url"><span class="ico i-sm i--pt">Pinterest</span></a></li>
                <li itemprop="name"><a class="is-circle" href="#" rel="external me" itemprop="url"><span class="ico i-sm i--tw">Twitter</span></a></li>
                <li itemprop="name"><a class="is-circle" href="#" rel="external me" itemprop="url"><span class="ico i-sm i--yt">Youtube</span></a></li>
                <li itemprop="name"><a class="is-circle" href="#" rel="external me" itemprop="url"><span class="ico i-sm i--tumblr">Tumblr</span></a></li>
            </ul>



            <h3 class="sg-subheading">Just icons &mdash; Medium</h3>
            <p><code>class="ico i-m i--caution"</code></p>
            <ul class="inline-list">
                <li itemprop="name"><a class="is-circle" href="#" rel="external me" itemprop="url"><span class="ico i-m i--fb">Facebook</span></a></li>
                <li itemprop="name"><a class="is-circle" href="#" rel="external me" itemprop="url"><span class="ico i-m i--ig">Instagram</span></a></li>
                <li itemprop="name"><a class="is-circle" href="#" rel="external me" itemprop="url"><span class="ico i-m i--pt">Pinterest</span></a></li>
                <li itemprop="name"><a class="is-circle" href="#" rel="external me" itemprop="url"><span class="ico i-m i--tw">Twitter</span></a></li>
                <li itemprop="name"><a class="is-circle" href="#" rel="external me" itemprop="url"><span class="ico i-m i--yt">Youtube</span></a></li>
                <li itemprop="name"><a class="is-circle" href="#" rel="external me" itemprop="url"><span class="ico i-m i--tumblr">Tumblr</span></a></li>
            </ul>



            <h3 class="sg-subheading">Just icons &mdash; Large</h3>
            <p><code>class="ico i-lg i--caution"</code></p>
            <ul class="inline-list">
                <li itemprop="name"><a class="is-circle" href="#" rel="external me" itemprop="url"><span class="ico i-lg i--fb">Facebook</span></a></li>
                <li itemprop="name"><a class="is-circle" href="#" rel="external me" itemprop="url"><span class="ico i-lg i--ig">Instagram</span></a></li>
                <li itemprop="name"><a class="is-circle" href="#" rel="external me" itemprop="url"><span class="ico i-lg i--pt">Pinterest</span></a></li>
                <li itemprop="name"><a class="is-circle" href="#" rel="external me" itemprop="url"><span class="ico i-lg i--tw">Twitter</span></a></li>
                <li itemprop="name"><a class="is-circle" href="#" rel="external me" itemprop="url"><span class="ico i-lg i--yt">Youtube</span></a></li>
                <li itemprop="name"><a class="is-circle" href="#" rel="external me" itemprop="url"><span class="ico i-lg i--tumblr">Tumblr</span></a></li>
            </ul>



        </section>


        <section id="icons" class="sg-pattern">


            <!-- GENERAL ICONS 
            #################################################### -->
            <!-- <h2 class="sg-heading">Icons - General</h2>
            <h3 class="sg-subheading">Inline icons - Pull Left</h3>
            <p><code>class="i-inline i-pl i--caution"</code></p>
            <ul class="inline-list">
                <li><a href="#"><span class="i-inline i-pl i--call">Call</span></a></li>
                <li><span class="i-inline i-pl i--expand">Expand</span></li>
                <li><span class="i-inline i-pl i--collapse">Collapse</span></li>
                <li><span class="i-inline i-pl i--add">Add</span></li>
                <li><span class="i-inline i-pl i--edit">Edit</span></li>
                <li><span class="i-inline i-pl i--phone">Phone</span></li>
                <li><span class="i-inline i-pl i--wifi">wifi</span></li>
            </ul>


            <h3 class="sg-subheading">Inline icons &mdash; pull right</h3>
            <p><code>class="i-inline i-pr i--caution"</code></p>
            <ul class="inline-list">
                <li><a href="#"><span class="i-inline i-pr i--call">Call</span></a></li>
                <li><span class="i-inline i-pr i--expand">Expand</span></li>
                <li><span class="i-inline i-pr i--collapse">Collapse</span></li>
                <li><span class="i-inline i-pr i--add">Add</span></li>
                <li><span class="i-inline i-pr i--edit">Edit</span></li>
                <li><span class="i-inline i-pr i--phone">Phone</span></li>
                <li><span class="i-inline i-pr i--wifi">wifi</span></li>
            </ul>


            <h3 class="sg-subheading">Inline icons &mdash; pull top</h3>
            <p><small>*note - bacause each instance of PullTop will be different, padding and position has been minimized</small></p>
            <p><code>class="i-inline i-pt i--caution"</code></p>
            <ul class="inline-list">
                <li><a href="#"><span class="i-inline i-pt i--call">Call</span></a></li>
                <li><span class="i-inline i-pt i--expand">Expand</span></li>
                <li><span class="i-inline i-pt i--collapse">Collapse</span></li>
                <li><span class="i-inline i-pt i--add">Add</span></li>
                <li><span class="i-inline i-pt i--edit">Edit</span></li>
                <li><span class="i-inline i-pt i--phone">Phone</span></li>
                <li><span class="i-inline i-pt i--wifi">wifi</span></li>
            </ul>


            <h3 class="sg-subheading">Just icons &mdash; Small</h3>
            <p><code>class="ico i-sm i--caution"</code></p>
            <ul class="inline-list">
                <li><span class="ico i-sm i--call">Call</span></li>
                <li><span class="ico i-sm i--expand">Expand</span></li>
                <li><span class="ico i-sm i--collapse">Collapse</span></li>
                <li><span class="ico i-sm i--add">Add</span></li>
                <li><span class="ico i-sm i--edit">Edit</span></li>
                <li><span class="ico i-sm i--phone">Phone</span></li>
                <li><span class="ico i-sm i--wifi">wifi</span></li>
            </ul>



            <h3 class="sg-subheading">Just icons &mdash; Medium</h3>
            <p><code>class="ico i-m i--caution"</code></p>
            <ul class="inline-list">
                <li><span class="ico i-m i--call">Call</span></li>
                <li><span class="ico i-m i--expand">Expand</span></li>
                <li><span class="ico i-m i--collapse">Collapse</span></li>
                <li><span class="ico i-m i--add">Add</span></li>
                <li><span class="ico i-m i--edit">Edit</span></li>
                <li><span class="ico i-m i--phone">Phone</span></li>
                <li><span class="ico i-m i--wifi">wifi</span></li>
            </ul>



            <h3 class="sg-subheading">Just icons &mdash; Large</h3>
            <p><code>class="ico i-lg i--caution"</code></p>
            <ul class="inline-list">
                <li><span class="ico i-lg i--call">Call</span></li>
                <li><span class="ico i-lg i--expand">Expand</span></li>
                <li><span class="ico i-lg i--collapse">Collapse</span></li>
                <li><span class="ico i-lg i--add">Add</span></li>
                <li><span class="ico i-lg i--edit">Edit</span></li>
                <li><span class="ico i-lg i--phone">Phone</span></li>
                <li><span class="ico i-lg i--wifi">wifi</span></li>
            </ul> -->



        </section>
        
        
        <!-- <section id="blocks" class="sg-pattern">
            <h2 class="sg-heading">Flex Embed Video/Audio component <small> -- (using simple grid)</small></h2><br>
            <p>Fluid, responsive module for Video/Audio/Img's using intrinsic ratio</p>

            <div class="row cf">
                <h3 class="sg-subheading">.flex-embed--1by1</h3>
                <div class="col span-3">
                    <h4>renders 1:1 (iframe)</h4>
                    <div class="flex-embed">
                        <iframe width="1200" height="1200" src="http://www.youtube.com/embed/BOOljk_LOcs" frameborder="0" allowfullscreen></iframe>
                    </div>
                </div>
                <div class="col span-3">
                    <h4>renders 1:1 (img)</h4>
                    <div class="flex-embed">
                        <img class="flex-embed-item" width="600" height="600" src="http://lorempixel.com/600/600/nature/9" alt="">
                    </div>
                </div>
            </div>


            <div class="row cf">
                <h3 class="sg-subheading">Variable height/width</h3>
                <div class="col span-3">
                    <h4>supports max-height</h3>
                    <div class="flex-embed">
                        <iframe width="1280" height="1280" src="http://www.youtube.com/embed/BOOljk_LOcs" frameborder="0" allowfullscreen></iframe>
                    </div>
                </div>
                <div class="col span-3">
                    <h4>supports max-width</h3>
                    <div class="flex-embed">
                        <img class="flex-embed-item" width="600" height="600" src="http://lorempixel.com/600/600/nature/9" alt="">
                    </div>
                </div>
            </div>

            <div class="row cf">
                <h3 class="sg-subheading">.flex-embed--3by1</h3>
                <div class="col span-3">
                    <h4>renders 3:1 (iframe)</h4>
                    <div class="flex-embed flex-embed--3by1">
                        <iframe width="1200" height="400" src="http://www.youtube.com/embed/BOOljk_LOcs" frameborder="0" allowfullscreen></iframe>
                    </div>
                </div>
                <div class="col span-3">
                    <h4>renders 3:1 (img)</h4>
                    <div class="flex-embed flex-embed--3by1">
                        <img class="flex-embed-item" width="600" height="200" src="http://lorempixel.com/600/200/nature/9" alt="">
                    </div>
                </div>
            </div>

            <div class="row cf">
                <h3 class="sg-subheading">.flex-embed--2by1</h3>
                <div class="col span-3">
                    <h4 class="Test-it">renders 2:1 (iframe)</h4>
                    <div class="flex-embed flex-embed--2by1">
                        <iframe width="1200" height="600" src="http://www.youtube.com/embed/BOOljk_LOcs" frameborder="0" allowfullscreen></iframe>
                    </div>
                </div>
                <div class="col span-3">
                    <h4 class="Test-it">renders 2:1 (img)</h4>
                    <div class="flex-embed flex-embed--2by1">
                        <img class="flex-embed-item" width="600" height="300" src="http://lorempixel.com/600/300/nature/9" alt="">
                    </div>
                </div>
            </div>

            <div class="row cf">
                <h3 class="sg-subheading">.flex-embed--16by9</h3>
                <div class="col span-3">
                    <h4 class="Test-it">renders 16:9 (iframe)</h4>
                    <div class="flex-embed flex-embed--16by9">
                        <iframe width="1280" height="720" src="http://www.youtube.com/embed/BOOljk_LOcs" frameborder="0" allowfullscreen></iframe>
                    </div>  
                </div>
                <div class="col span-3">
                    <h4 class="Test-it">renders 16:9 (img)</h4>
                    <div class="flex-embed flex-embed--16by9">
                        <img class="flex-embed-item" width="500" height="280" src="http://lorempixel.com/500/280/nature/9" alt="">
                    </div>
                </div>
            </div>

            <div class="row cf">
                <h3 class="sg-subheading">.flex-embed--4by3</h3>
                <div class="col span-3">
                    <h4 class="Test-it">renders 4:3 (iframe)</h4>
                    <div class="flex-embed flex-embed--4by3">
                        <iframe width="1280" height="720" src="http://www.youtube.com/embed/BOOljk_LOcs" frameborder="0" allowfullscreen></iframe>
                    </div>
                </div>
                <div class="col span-3">
                    <h4 class="Test-it">renders 4:3 (img)</h4>
                    <div class="flex-embed flex-embed--4by3">
                        <img class="flex-embed-item" width="500" height="375" src="http://lorempixel.com/500/375/nature/9" alt="">
                    </div>
                </div>
            </div>
        </section> -->



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










