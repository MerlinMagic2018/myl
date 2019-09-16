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
        	<h2 class="feature-title sizes-XLG">Common <abbr title="User Interface">UI</span></h2>
        	<p class="media-excerpt">This guide acts as a technical reference for all the design elements that make up the Made You Look website. It ensures a consistent design and provides common CSS &amp; HTML used.</p>
        	
        </section>

<!-- STYLE GUIDE PATTERN ### FEATURES -->
        <section class="region sg-pattern" id="features">
            <h2 class="sg-heading">Features &amp; </h2>

            <h3 class="sg-subheading" id="backgrounds">SVG's</h3>
            <p>The site uses SVG's for icons exclusively, with a fallback to .gif or .jpg depending on the type of img of course. Details:</p>
            <ol class="roman-list">
                <li>Site detects whether SVG's are supported, if so adds an html class of <code>.svg</code> to the <code>html</code> element</li>
                <li>Within the CCC all icons are prepended with a <code>.svg</code> selector, or <code>.no-svg</code> (and <code>.no-js</code>) respectively</li>
                <li>If the browser does not support SVG, the fallback image loads based on either the <code>.no-js</code> or <code>.no-svg</code> attribute</li>
                <li>In addition: All SVG icons <em>smaller</em> than 2kb have been base64 encoded to eliminate the http request</li>
                <li>If needed, we can force the fallback img to load in browsers such as IE8 by adding the fallback ruleset, minus the prepended .no-js or .no-svg, directly to the OLDIE stylesheet</li>
            </ol>
<pre class="brush: css; gutter: false; toolbar: false; class-name: 'class_name_demo';">
/* fallback img */
.no-js .i--caution, .no-svg .i--caution { background-image: url("/gcl/media/img/icons/ui/i-caution.gif"); }

/* encoded SVG */
.svg .i--caution { background-image: url("data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHhtbG5zOnhsaW5rPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5L3hsaW5rIiB2ZXJzaW9uPSIxLjEiIGlkPSJJY29uIiB4PSIwcHgiIHk9IjBweCIgdmlld0JveD0iMCAwIDUwLjExNyA1MC4xMjEiIGVuYWJsZS1iYWNrZ3JvdW5kPSJuZXcgMCAwIDUwLjExNyA1MC4xMjEiIHhtbDpzcGFjZT0icHJlc2VydmUiPjxnIGlkPSJDYXV0aW9uIj48Y2lyY2xlIGZpbGw9Im5vbmUiIHN0cm9rZT0iI0U0QUEwMCIgc3Ryb2tlLXdpZHRoPSIyLjUiIHN0cm9rZS1taXRlcmxpbWl0PSIxMCIgY3g9IjI1IiBjeT0iMjQuOTE0IiByPSIyMy42MjUiLz48cGF0aCBmaWxsPSIjRTRBQTAwIiBkPSJNMjIuNDc1IDM1LjIwOGMwLTEuMzE0IDAuOTEzLTIuMjYzIDIuMTUzLTIuMjYzYzEuMzE0IDAgMi4xNTMgMC45NDggMi4xNTMgMi4yNjMgYzAgMS4yNzctMC44MzkgMi4yNjMtMi4xNTMgMi4yNjNDMjMuMzUxIDM3LjQ3MSAyMi40NzUgMzYuNDg1IDIyLjQ3NSAzNS4yMDh6IE0yMy4zODggMjkuOTg4TDIyLjg3NiAxMi40N2gzLjUwM2wtMC41MTEgMTcuNTE4IEgyMy4zODh6Ii8+PC9nPjwvc3ZnPg=="); }
</pre>


            <!-- <code></code> -->

        </section>

<!-- STYLE GUIDE PATTERN ### TOOLS -->
        <section class="region sg-pattern" id="tools">
        	<h2 class="sg-heading">Tools, Scripts and Utilities</h2>
        	<h3 class="sg-subheading" id="backgrounds">Browsers and UA's</h3>
        	<ul>
        		<li><a rel="external" href="http://modernizr.com/">Modernizr</a> &mdash; Feature detect tests</li>
        		<li><a  rel="external"href="http://mattstow.com/responsive-design-in-ie10-on-windows-phone-8.html">IE10 fix</a> &mdash; Viewport fix for Windows snapmode &amp; WP8</li>
        	</ul>

        	<h3 class="sg-subheading" id="backgrounds">Images</h3>
        	<ul>
        		<li><a rel="external"href="https://imageoptim.com/">ImageOptim</a> &mdash; All UI images run through this tool before usage</li>
        		<li><a rel="external"href="http://petercollingridge.appspot.com/svg-optimiser">SVG Optimizer</a> &mdash; Remove whitespec etc.</li>
        		<li><a rel="external" href="http://webcodertools.com/imagetobase64converter">Encode Images</a> &mdash; Convert img's to base64 encoded strings</li>
        		<li><a rel="external" href="http://grumpicon.com/">Grumpicon</a> &mdash; Convert SVG's to many formats</li>
        	</ul>

        	<h3 class="sg-subheading" id="backgrounds">Resources</h3>
        	<ul>
        		<li><a rel="external" href="http://drublic.github.io/css-modal/">CSS3 Modals</a> &mdash; built with css, accessible js plugin</li>
        		<li><a rel="external" href="https://github.com/dilvie/h5Validate">HTML5 FORMS</a> &mdash; Polyfill for html5 validation on older browsers</li>
        		<li><a rel="external" href="http://pxtoem.com/">PX to EM</a> &mdash; Simple EM conversion</li>
        	</ul>

        </section>

        <section class="region sg-pattern" id="code-guide">
        	<h2 class="sg-heading">CSS Guide</h2>

        	<h3 class="sg-subheading" id="backgrounds">Anatomy of CSS</h3>
        	<p>There are a number of standards when structuring css and rulesets. The following are resources to follow when structuring the CSS and html:</p>
        	<ul>
        		<li><a rel="external" href="http://kevinsuttle.com/posts/the-art-of-html-semantics-pt1/">HTML Semantics</a> &mdash; Build it right</li>
        		<li><a rel="external" href="http://frontendbabel.info/articles/webpage-rendering-101/">Page rendering 101</a> &mdash; How a browser works</li>
        		<li><a rel="external" href="http://drublic.github.io/css-modal/">CSS Guidelines</a> &mdash; General CSS notes, advice and guidelines</li>
        		<li><a rel="external" href="https://github.com/dilvie/h5Validate">HTML5 FORMS</a> &mdash; Polyfill for html5 validation on older browsers</li>
        		<li><a rel="external" href="http://pxtoem.com/">PX to EM</a> &mdash; Simple EM conversion</li>
        		<li><a rel="external" href="http://www.webperformancetoday.com/2014/05/28/mobile-optimized-pages-bigger/">Mobile Performance</a></li>
                <li><a rel="external" href="https://www.freeformatter.com/css-minifier.html">CSS Minify</a></li>
        	</ul>

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










