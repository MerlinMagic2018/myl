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
        	<h2 class="page-title wfsg sizes-XLG">Common <abbr title="User Interface">UI</abbr> &mdash; Typography</h2>
        	<p class="media-excerpt">This guide acts as a technical reference for all the design elements that make up the Made You Look website. It ensures a consistent design and provides common CSS &amp; HTML used.</p>
        	
        </section>

        
        
        <section class="region sg-pattern" id="headings">
            <h2 class="sg-heading">Headings</h2>

            <h3 class="sg-subheading">OpenSans Light and Regular</h3>
            <div class="row cf">
                <div class="col span-3">
                    <p><code>.wfl</code>

                    <h1 class="wfl size-LG">Header 1</h1>

                    <h2 class="wfl size-L">Header 2</h2>

                    <h3 class="wfl size-M">Header 3</h3>

                    <h4 class="wfl size-S">Header 4</h4>

                    <h5 class="wfl size-SM">Header 5</h5>
                    
                    <h6 class="wfl size-XSM">Header 5</h6>

                </div>
                <div class="col span-3">
                    <p><code>.wfr</code>

                    <h1 class="wfr size-LG">Header 1</h1>

                    <h2 class="wfr size-L">Header 2</h2>

                    <h3 class="wfr size-M">Header 3</h3>

                    <h4 class="wfr size-S">Header 4</h4>

                    <h5 class="wfr size-SM">Header 5</h5>
                    
                    <h6 class="wfr size-XSM">Header 5</h6>

                </div>
            </div>

            <h3 class="sg-subheading">OpenSans Semi Bold / Bold</h3>
            <div class="row cf">
                <div class="col span-3">
                    <p><code>.wfsb</code>

                    <h1 class="wfsb size-LG">Header 1</h1>

                    <h2 class="wfsb size-L">Header 2</h2>

                    <h3 class="wfsb size-M">Header 3</h3>

                    <h4 class="wfsb size-S">Header 4</h4>

                    <h5 class="wfsb size-SM">Header 5</h5>
                    
                    <h6 class="wfsb size-XSM">Header 5</h6>

                </div>
                <div class="col span-3">
                    <p><code>.wfb</code>

                    <h1 class="wfsb size-LG">Header 1</h1>

                    <h2 class="wfsb size-L">Header 2</h2>

                    <h3 class="wfsb size-M">Header 3</h3>

                    <h4 class="wfsb size-S">Header 4</h4>

                    <h5 class="wfsb size-SM">Header 5</h5>
                    
                    <h6 class="wfsb size-XSM">Header 5</h6>

                </div>
            </div>

            <h3 class="sg-subheading">SD Georgia</h3>
            <div class="row cf">
                <div class="col span-3">
                    <p><code>.wfsg</code>

                    <h1 class="wfsg size-LG">Header 1</h1>

                    <h2 class="wfsg size-L">Header 2</h2>

                    <h3 class="wfsg size-M">Header 3</h3>

                    <h4 class="wfsg size-S">Header 4</h4>

                    <h5 class="wfsg size-SM">Header 5</h5>
                    
                    <h6 class="wfsg size-XSM">Header 5</h6>

                </div>
                <!-- <div class="col span-3">
                    <p><code>.h-sb</code>

                    <h1 class="h-sb size-LG">Header 1</h1>

                    <h2 class="h-sb size-L">Header 2</h2>

                    <h3 class="h-sb size-M">Header 3</h3>

                    <h4 class="h-sb size-S">Header 4</h4>

                    <h5 class="h-sb size-SM">Header 5</h5>
                    
                    <h6 class="h-sb size-XSM">Header 5</h6>

                </div> -->

                <h3 class="sg-subheading">Heading </h3>
                
                <h4 class="headings heading--alpha">Section Heading</h4>
                <h4 class="headings heading--alpha">Section Heading - With Underline</h4>

            </div>
            
        </section>

        <section class="region sg-pattern" id="inline">
            <h2 class="sg-heading">Inline elements</h2>
            <h3 class="sg-subheading">Common html tags</h3>

            <p><abbr title="Cascading Style Sheets">CSS</abbr> &mdash; <code>&lt;abbr&gt;</code></p>
            <p><cite>Origin of Species</cite> &mdash; <code>&lt;cite&gt;</code></p>
            <p><code>Code tag</code> &mdash; <code>&lt;code&gt;</code></p>
            <p><i>Italic</i> &mdash; <code>&lt;i&gt;</code></p>
            <p><em>Emphasis</em> &mdash; <code>&lt;em&gt;</code></p>
            <p><mark>Mark text</mark> &mdash; <code>&lt;mark&gt;</code></p>

            <p><kbd>Cmd + Shift + i</kbd> &mdash; <code>&lt;kbd&gt;</code></p>
            <p><strong>Highlighted text</strong> &mdash; <code>&lt;strong&gt;</code></p>
            <p><b>Bold text</b> &mdash; <code>&lt;b&gt;</code></li>
            <p><del>Deleted text</del> &mdash; <code>&lt;del&gt;</code></p>
            <p>x<sup>superscript</sup> &mdash; <code>&lt;sup&gt;</code></p>
            <p>x<sub>subscript</sub> &mdash; <code>&lt;sub&gt;</code></p>
            <p><small>small text</small> <code>&lt;small&gt;</code></p>



            <h3 class="sg-subheading">Content and inline content blocks</h3>
            <!-- LEAD -->
            <h4 class="sg-title">Lead</h4>

            <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

            <!-- PARAGRAPHS -->
            <h4 class="sg-title">Paragraph - intro line</h4>
            <p class="intro">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

            <!-- PARAGRAPHS -->
            <h4 class="sg-title">Paragraphs with Blockquote</h4>
            <p class="drop">Sorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>

            <blockquote>Text. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</blockquote>

            <p class="cf">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>

            <div class="row cf" style="padding-top:2em">
                <div class="col span-3">
                    <!-- ADDRESS -->
                    <h4 class="sg-title">Address</h4>

                    <address>
                        <strong>Address Tag</strong><br />
                        PO Box 87523<br>
                        Vancouver, WA 98687<br>
                        USA<br>
                    </address>
                </div>

                <div class="col span-3">
                    <!-- PREFORMATTED -->
                    <h4 class="sg-title">Preformatted text</h4>

                    <pre>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt
                    ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
                    laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate
                        velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                    </pre>
                </div>
            </div>
            
            <!-- PARAGRAPHS -->
            <h4 class="sg-title">Paragraphs with Author and Source</h4>
            <p>Use <code>&lt;small&gt;</code> tag for quote's author and use <code>&lt;cite&gt;</code> tag for quote's source.</p>

            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>

            <blockquote>
                <p>This is a block quotation containing a <em>single</em> paragraph. Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.</p>
                <small>Author</small> &mdash; <cite>Source</cite>
            </blockquote>

            <p class="cf">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>            

        </section>
        
        <section class="region sg-pattern" id="lists">
        	<h2 class="sg-heading">Lists</h2>
        	
<!-- STYLE GUIDE PATTERN ### OL -->
        	<h3 class="sg-subheading sg-toggler">Ordered List <a href="#" onclick="toggle_visibility('code-ol'); return false;">code</a></h3>
        	<!-- CODE -->
        	<div id="code-ol" style="display:none;">
            	<pre class="brush: js">
            		// Simple basic Ordered List
            		<ol>
            			<li>item</li>
            			<li>item</li>
            			<li>item</li>
            		</ol></pre>
        	</div>
        	<!-- EXAMPLE -->
        	<ol>
        		<li>with a quad-core graphics processor; 5-megapixel</li>
        		<li>translate your words into text before your eyes</li>
        		<li>Referred to as a “Retina display” and similar to what’s in the iPhone 4 and 4S, the new iPad packs four times more pixels – than the first two iPad models.</li>
        		<li>faster – even when you’re on a park bench or riding the train to work.</li>
        		<li>with a quad-core graphics processor; 5-megapixel</li>
        		<li>translate your words into text before your eyes</li>
        		<li>Referred to as a “Retina display” and similar to what’s in the iPhone 4 and 4S, the new iPad packs four times more pixels – than the first two iPad models.</li>
        		<li>faster – even when you’re on a park bench or riding the train to work.</li>
        		<li>with a quad-core graphics processor; 5-megapixel</li>
        		<li>translate your words into text before your eyes</li>
        	</ol>
        	
        	
<!-- STYLE GUIDE PATTERN ### OL UL -->
        	<h3 class="sg-subheading sg-toggler">Ordered List with Unordered sub list <a href="#" onclick="toggle_visibility('code-olul'); return false;">code</a></h3>
        	<!-- CODE -->
        	<div id="code-olul" style="display:none;">
            	<pre class="brush: js">
            		// Simple Ordered List with Unordered nested list
            		<ol>
            			<li>item</li>
            			<li>item</li>
            			<li>
            				<ul>
            					<li>item</li>
            					<li>item</li>
            					<li>item</li>
            				</ul>
            			</li>
            			<li>item</li>
            			<li>item</li>
            		</ol>
            	</pre>
        	</div>
        	<!-- EXAMPLE -->
        	<ol>
        		<li>with a quad-core graphics processor; 5-megapixel</li>
        		<li>translate your words into text before your eyes</li>
        		<li>Referred to as a “Retina display” and similar to what’s in the iPhone 4 and 4S, the new iPad packs four times more pixels – than the first two iPad models.</li>
        		<li>
        			<ul>
        				<li>the new iPad packs four times more pixels</li>
        				<li>you’ll notice a much better-looking screen</li>
        				<li>networks that deliver broadband-like speeds via cellular connectivity</li>
        			</ul>
        		</li>
        		<li>faster – even when you’re on a park bench or riding the train to work.</li>
        	</ol>
        	
        	
<!-- STYLE GUIDE PATTERN ### UL -->
        	<h3 class="sg-subheading sg-toggler">Unordered List <a href="#" onclick="toggle_visibility('code-ul'); return false;">code</a></h3>
        	<!-- CODE -->
        	<div id="code-ul" style="display:none;">
        		<pre class="brush: js">
        			// Simple basic Unordered List
        			<ul>
        				<li>item</li>
        				<li>item</li>
        				<li>item</li>
        			</ul></pre>
        	</div>
        	<!-- EXAMPLE -->
        	<ul>
        		<li>with a quad-core graphics processor; 5-megapixel</li>
        		<li>translate your words into text before your eyes</li>
        		<li>Referred to as a “Retina display” and similar to what’s in the iPhone 4 and 4S, the new iPad packs four times more pixels – than the first two iPad models.</li>
        		<li>faster – even when you’re on a park bench or riding the train to work.</li>
        	</ul>
        	
        	
<!-- STYLE GUIDE PATTERN ### UL OL -->
        	<h3 class="sg-subheading sg-toggler">Unordered List with Ordered sub list <a href="#" onclick="toggle_visibility('code-ulol'); return false;">code</a></h3>
        	<!-- CODE -->
        	<div id="code-ulol" style="display:none;">
        		<pre class="brush: js">
        			// Simple Ordered List with Unordered nested list
        			<ul>
        				<li>item</li>
        				<li>item</li>
        				<li>
        					<ol>
        						<li>item</li>
        						<li>item</li>
        						<li>item</li>
        					</ol>
        				</li>
        				<li>item</li>
        				<li>item</li>
        			</ul>
        		</pre>
        	</div>
        	<!-- EXAMPLE -->
        	<ul>
        		<li>with a quad-core graphics processor; 5-megapixel</li>
        		<li>translate your words into text before your eyes</li>
        		<li>
        			<ol>
        				<li>the new iPad packs four times more pixels</li>
        				<li>you’ll notice a much better-looking screen</li>
        				<li>networks that deliver broadband-like speeds via cellular connectivity</li>
        			</ol>
        		</li>
        		<li>Referred to as a “Retina display” and similar to what’s in the iPhone 4 and 4S, the new iPad packs four times more pixels – than the first two iPad models.</li>
        		<li>faster – even when you’re on a park bench or riding the train to work.</li>
        	</ul>
        	
        	
<!-- STYLE GUIDE PATTERN ### COUNTER LIST -->
        	<h3 class="sg-subheading sg-toggler">Counter(ed) List  <a href="#" onclick="toggle_visibility('code-count'); return false;">code</a></h3>
        	<p>Counter lists have dynamic numbering based on how many items are in the list, and how many "blocks" are nested.</p>
        	<!-- CODE -->
        	<div id="code-count" style="display:none;">
            	<pre class="brush: js">
            		/* Add class of counted-list to list */
            		<ol class="counted-list">
            		
            			/* include a heading for top level */
            			<li><h4 class="count-heading"><a href="#">Level 1</a></h4>
            			
            				/* Add class of counted-list to nested list */
            				<ol class="counted-list">
            				
            					/* include a heading for level 2 */
            					<li><h5 class="count-title"><a href="#">Level 2</a></h5>
            					
            						/* Add class of counted-list to 3rd level nested list */
            						<ol class="counted-list">
            							<li><a href="#">Level 2 item</a></li>
            							<li><a href="#">Level 2 item</a></li>
            						</ol>
            					</li>
            				</ol>
            			</li>
            			
            			/* repeat top level list item to add 2nd level */
            			<li><h4 class="count-heading"><a href="#">Level 1</a></h4>
            				<ol class="counted-list">
            					<li><h5 class="count-title"><a href="#">Level 2</a></h5></li>
            					<li><h5 class="count-title"><a href="#">Level 2</a></h5>
            						<ol class="counted-list">
            							<li><a href="#">Level 3 item</a></li>
            						</ol>
            					</li>
            					<li><h5 class="count-title"><a href="#">Level 2</a></h5></li>
            				</ol>
            			</li>
            			
            		</ol>
            	</pre>
        	</div>
        	<!-- EXAMPLE -->
        	<ol class="counted-list">
        		<li><h4 class="count-heading"><a href="#">Level 1</a></h4>
        			<ol class="counted-list">
        				<li><h5 class="count-title"><a href="#">Level 2</a></h5>
        					<ol class="counted-list">
        						<li><a href="#">Level 3 item</a></li>
        					</ol>
        				</li>
        			</ol>
        		</li>
        		<li><h4 class="count-heading"><a href="#">Level 1</a></h4>
        			<ol class="counted-list">
        				<li><h5 class="count-title"><a href="#">Level 2</a></h5></li>
        				<li><h5 class="count-title"><a href="#">Level 2</a></h5>
        					<ol class="counted-list">
        						<li><a href="#">Level 3 item</a></li>
        					</ol>
        				</li>
        				<li><h5 class="count-title"><a href="#">Level 2</a></h5></li>
        			</ol>
        		</li>
        	</ol>
        	
        	
<!-- STYLE GUIDE PATTERN ### ALPHA LIST -->
        	<h3 class="sg-subheading sg-toggler">Alpha List <a href="#" onclick="toggle_visibility('code-alpha'); return false;">code</a></h3>
        	<!-- CODE -->
        	<div id="code-alpha" style="display:none;">
            	<pre class="brush: js">
            		// Add class of roman-list to list, no-bullet to nested list
            		<ol class="alpha-list">
            			<li>item</li>
            			<li>item</li>
            		</ol>
            	</pre>
        	</div>
        	<!-- EXAMPLE -->
        	<ol class="alpha-list">
        		<li>with a quad-core graphics processor; 5-megapixel</li>
        		<li>translate your words into text before your eyes</li>
        		<li>Referred to as a “Retina display” and similar to what’s in the iPhone 4 and 4S, the new iPad packs four times more pixels – than the first two iPad models.</li>
        		<li>faster – even when you’re on a park bench or riding the train to work.</li>
        	</ol>
        	
        	
<!-- STYLE GUIDE PATTERN ### ROMAN LIST -->
        	<h3 class="sg-subheading sg-toggler">Roman List <a href="#" onclick="toggle_visibility('code-roman'); return false;">code</a></h3>
        	<!-- CODE -->
        	<div id="code-roman" style="display:none;">
            	<pre class="brush: js">
            		// Add class of roman-list to list, no-bullet to nested list
            		<ol class="roman-list">
            			<li>item</li>
            			<li>item</li>
            		</ol>
            	</pre>
        	</div>
        	<!-- EXAMPLE -->
        	<ol class="roman-list">
        		<li>with a quad-core graphics processor; 5-megapixel</li>
        		<li>translate your words into text before your eyes</li>
        		<li>Referred to as a “Retina display” and similar to what’s in the iPhone 4 and 4S, the new iPad packs four times more pixels – than the first two iPad models.</li>
        		<li>faster – even when you’re on a park bench or riding the train to work.</li>
        	</ol>
        	
        	
<!-- STYLE GUIDE PATTERN ### NO BULLETS LIST -->
        	<h3 class="sg-subheading sg-toggler">No Bullets <a href="#" onclick="toggle_visibility('code-nb'); return false;">code</a></h3>
        	<!-- CODE -->
        	<div id="code-nb" style="display:none;">
            	<pre class="brush: js">
            		/* Add class of no-bullet to list: */
            		<ul class="no-bullet">
            			<li>item</li>
            			<li>item</li>
            		</ul>
            	</pre>
        	</div>
        	<!-- EXAMPLE -->
        	<ul class="no-bullet">
        		<li>with a quad-core graphics processor; 5-megapixel</li>
        		<li>translate your words into text before your eyes</li>
        		<li>Referred to as a “Retina display” and similar to what’s in the iPhone 4 and 4S, the new iPad packs four times more pixels – than the first two iPad models.</li>
        		<li>faster – even when you’re on a park bench or riding the train to work.</li>
        	</ul>
        	
        	
<!-- STYLE GUIDE PATTERN ### NESTED NO BULLETS LIST -->
        	<h3 class="sg-subheading sg-toggler">Nested No bullets <a href="#" onclick="toggle_visibility('code-nnb'); return false;">code</a></h3>
        	<!-- CODE -->
        	<div id="code-nnb" style="display:none;">
            	<pre class="brush: js">
            		// Add class of no-bullet to list, no-bullet to nested list
            		<ul class="no-bullet">
            			<li>item</li>
            			<li>
            				<ul class="no-bullet">
            					<li>item</li>
            				</ul>
            			</li>
            			<li>item</li>
            		</ul>
            	</pre>
        	</div>
        	<!-- EXAMPLE -->
        	<ul class="no-bullet">
        		<li>with a quad-core graphics processor; 5-megapixel</li>
        		<li>translate your words into text before your eyes</li>
        		<li>
        			<ul class="no-bullet">
        				<li>the new iPad packs four times more pixels</li>
        				<li>you’ll notice a much better-looking screen</li>
        				<li>networks that deliver broadband-like speeds via cellular connectivity</li>
        			</ul>
        		</li>
        		<li>Referred to as a “Retina display” and similar to what’s in the iPhone 4 and 4S, the new iPad packs four times more pixels – than the first two iPad models.</li>
        		<li>faster – even when you’re on a park bench or riding the train to work.</li>
        	</ul>
        	
        	
<!-- STYLE GUIDE PATTERN ### INLINE LIST -->
        	<h3 class="sg-subheading sg-toggler">Inline Items <a href="#" onclick="toggle_visibility('code-inline'); return false;">code</a></h3>
        	<!-- CODE -->
        	<div id="code-inline" style="display:none;">
            	<pre class="brush: js">
            		// Add class of inline-list to list
            		<ul class="inline-list">
            			<li>Item 1</li>
            			<li>Item 2</li>
            			<li>Item 3</li>
            			<li>Item 4</li>
            		</ul>
            	</pre>
        	</div>
        	<!-- EXAMPLE -->
        	<ul class="inline-list">
        		<li>Item 1</li>
        		<li>Item 2</li>
        		<li>Item 3</li>
        		<li>Item 4</li>
        	</ul>
        	
        	
<!-- STYLE GUIDE PATTERN ### INLINE LIST WITH BULLETS -->
        	<h3 class="sg-subheading sg-toggler">Inline with Bullets <a href="#" onclick="toggle_visibility('code-ib'); return false;">code</a></h3>
        	<!-- CODE -->
        	<div id="code-ib" style="display:none;">
            	<pre class="brush: js">
            		// Add class of inline-bullet to list
            		<ul class="inline-bullet">
            			<li>Item 1</li>
            			<li>Item 2</li>
            			<li>Item 3</li>
            			<li>Item 4</li>
            		</ul>
            	</pre>
        	</div>
        	<!-- EXAMPLE -->
        	<ul class="inline-bullet">
        		<li>Item 1</li>
        		<li>Item 2</li>
        		<li>Item 3</li>
        		<li>Item 4</li>
        	</ul>
        	
        	
<!-- STYLE GUIDE PATTERN ### CONTENT LIST -->
        	<h3 class="sg-subheading sg-toggler">Inline with Pipes <a href="#" onclick="toggle_visibility('code-cl'); return false;">code</a></h3>
        	<!-- CODE -->
        	<div id="code-cl" style="display:none;">
            	<pre class="brush: js">
            		// Add class of content-list to list
            		<ul class="content-list">
            			<li>Item 1</li>
            			<li>Item 2</li>
            			<li><a href="fff.html">Item 3</a></li>
            			<li>Item 4</li>
            		</ul>
            	</pre>
        	</div>
        	<!-- EXAMPLE -->
        	<ul class="content-list">
        		<li>Item 1</li>
        		<li>Item 2</li>
        		<li><a href="fff.html">Item 3</a></li>
        		<li>Item 4</li>
        	</ul>


<!-- STYLE GUIDE PATTERN ### CATEGORY LIST -->
        	<h3 class="sg-subheading sg-toggler">Inline Category List <a href="#" onclick="toggle_visibility('code-ilc'); return false;">code</a></h3>
        	<!-- CODE -->
        	<div id="code-ilc" style="display:none;">
            	<pre class="brush: js">
            		// Add class of more-categories to paragragh tag
            		<p class="more-categories">More: <a href="?1234" rel="tag">Movies</a> <a href="?1234" rel="tag">Sports</a> <a href="?1234" rel="tag">TV</a> <a href="?1234" rel="tag">All</a>
            	</pre>
        	</div>
        	<!-- EXAMPLE -->
        	<p class="more-categories">More: <a href="?1234" rel="tag">Movies</a> <a href="?1234" rel="tag">Sports</a> <a href="?1234" rel="tag">TV</a> <a href="?1234" rel="tag">All</a>            	
        	
        	
<!-- STYLE GUIDE PATTERN ### KEYWORDS LIST -->
        	<h3 class="sg-subheading sg-toggler">Inline Category List <a href="#" onclick="toggle_visibility('code-keyword'); return false;">code</a></h3>
        	<!-- CODE -->
        	<div id="code-keyword" style="display:none;">
            	<pre class="brush: js">
            		// Add class of keywords to parent list
            		<ul class="keywords">
            			<li>Item 1</li>
            			<li>Item 2</li>
            			<li><a href="fff.html">Item 3</a></li>
            			<li>Item 4</li>
            		</ul>
            	</pre>
        	</div>
        	<!-- EXAMPLE -->
        	<ul class="keywords">
        		<li>Item 1</li>
        		<li>Item 2</li>
        		<li><a href="fff.html">Item 3</a></li>
        		<li>Item 4</li>
        	</ul>

<!-- STYLE GUIDE PATTERN ### definition list -->
            <h3 class="sg-subheading sg-toggler">Definition List</h3>
            <dl>
                <dt>Description name</dt>
                <dd>Description value</dd>
                <dt>Description name</dt>
                <dd>Description value</dd>
                <dt>Description name</dt>
                <dd>Description value</dd>
            </dl>
        
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


