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
        	<h2 class="feature-title sizes-XLG">Common <abbr title="User Interface">UI</abbr> &mdash; Forms</h2>
        	<p class="media-excerpt">This guide acts as a technical reference for all the design elements that make up the Made You Look website. It ensures a consistent design and provides common CSS &amp; HTML used.</p>
        	
        </section>
        
<!-- STYLE GUIDE PATTERN ### COLOURS -->
        <section class="region sg-pattern" id="register">
        	<h2 class="sg-heading">Forms</h2>
        	<h3 class="sg-subheading" id="backgrounds">Register</h3>
        	

            <form accept-charset="UTF-8" action="/profiles" class="simple_form general-form" id="new_profile" method="post">
                <p class="text-right italic"><small>Please note all fields marked with <abbr title="required">*</abbr> are required</small></p>
                <fieldset>
                    <legend class="xhide-text">Personal Details</legend>
                    <div style="display:none">
                        <input name="utf8" type="hidden" value="&#x2713;" />
                        <input name="authenticity_token" type="hidden" value="dvUfJhSkmoh87l3a+lsDqBdMcMxmFPrq9zk04E/0KPk=" />
                    </div>

                    <div class="form-row string required profile_first_name">
                        <label class="string required form-label" for="profile_first_name"><abbr title="required">*</abbr> First Name</label>
                        <input aria-required="true" class="string required text-field" id="profile_first_name" name="profile[first_name]" required="required" type="text" />
                    </div>

                    <div class="form-row string required profile_last_name">
                        <label class="string required" for="profile_last_name"><abbr title="required">*</abbr> Last Name</label>
                        <div class="controls">
                            <input aria-required="true" class="string required text-field" id="profile_last_name" name="profile[last_name]" required="required" type="text" />
                        </div>
                    </div>

                    <div class="form-row email required profile_email_address">
                        <label class="email required" for="profile_email_address"><abbr title="required">*</abbr> Email (will be your username)</label>
                        <div class="controls"><input aria-required="true" class="string email required text-field" id="profile_email_address" name="profile[email_address]" required="required" type="email" />
                        </div>
                    </div>

                    <div class="form-row email optional profile_email_address_confirmation">
                        <label class="email optional" for="profile_email_address_confirmation">Confirm Email</label>
                        <div class="controls">
                            <input class="string email optional text-field" id="profile_email_address_confirmation" name="profile[email_address_confirmation]" type="email" />
                        </div>
                    </div>

                    <div class="form-row tel required profile_phone">
                        <label class="tel required" for="profile_phone"><abbr title="required">*</abbr> Telephone Number</label>
                        <div class="controls">
                            <input aria-required="true" class="string tel required text-field" id="profile_phone" name="profile[phone]" required="required" type="tel" />
                        </div>
                    </div>
                
                    <div class="form-row radio_buttons required profile_lang_pref">
                        <label class="radio_buttons required"><abbr title="required">*</abbr> Language Preference</label>
                        <div class="controls">
                            <label class="radio radio-inline"><input aria-required="true" class="radio_buttons required form-check" id="profile_lang_pref_english" name="profile[lang_pref]" required="required" type="radio" value="english" />English</label>
                            <label class="radio radio-inline"><input aria-required="true" class="radio_buttons required form-check" id="profile_lang_pref_french" name="profile[lang_pref]" required="required" type="radio" value="french" />French</label>
                        </div>
                    </div>
                </fieldset>

                <fieldset>
                    <legend class="xhide-text">Create Password</legend>
                    <div class="form-row password required profile_password">
                        <label class="password required" for="profile_password"><abbr title="required">*</abbr> Password</label>
                        <div class="controls">
                            <input aria-required="true" class="password required text-field" id="profile_password" name="profile[password]" required="required" type="password" />
                        </div>
                    </div>

                    <div class="form-row password optional profile_password_confirmation">
                        <label class="password optional" for="profile_password_confirmation">Confirm password</label>
                        <div class="controls">
                            <input class="password optional text-field" id="profile_password_confirmation" name="profile[password_confirmation]" type="password" />
                        </div>
                    </div>
                </fieldset>

                <fieldset>
                    <legend class="xhide-text">Accept and Submit</legend>
                    <div class="form-row boolean optional profile_tos">
                        <div class="controls">
                            <div class="checkbox inline">
                                <input name="profile[tos]" type="hidden" value="0" />
                                <label class="boolean optional checkbox" for="profile_tos"><input class="boolean optional form-check" id="profile_tos" name="profile[tos]" type="checkbox" value="1" />I Accept the <a href="#">My Rogers Terms and Conditions</a></label>
                            </div>
                        </div>
                    </div>

                    <input class="btn btn-default" name="commit" type="submit" value="Create Profile" />
                </fieldset>
            </form>
        	
        </section>

        <section class="region sg-pattern" id="promo">
            <h3 class="sg-subheading" id="backgrounds">Promo Code Input</h3>

            <form class="general-form region cf" role="form">
                <fieldset>
                    <legend>Use a Promo Code</legend>

                    <label class="field-label" for="promo-code" id="label-promo">Received a promo code? Redeem it here.</label>
            
                    <input class="text-field field-inline" id="promo-code" type="text" name="promo-code" size="20" placeholder="Enter Promo Code" autocomplete="off" aria-labelledby="label-promo" aria-required="true" required>

                    <button class="btn btn-secondary" id="submit">Submit</button>

                </fieldset>
            </form>
        </section>
        
        



	</main>
	
</div><!--end site wrapper-->
<hr class="hide-divider">

<!-- <div class="footer is--f-primary cf" id="footer-primary">
    <div class="site-wrapper">
        <nav class="navigation-wrapper" role="navigation">
            <ul class="main-menu inline-list cf">
                <li><a href="/" class="is-selected">Main</a></li>
                <li><a href="/">Available Devices</a></li>
                <li><a href="/">Support</a></li>
                <li><a href="/">Profile</a></li>
                <li><a href="/">Billing &amp; Payment</a></li>
            </ul>
        </nav>
    </div>
</div> -->
<footer class="footer is--f-secondary cf" role="contentinfo" id="footer-secondary">
    <!-- <div class="site-wrapper">
        <ul class="footer-menu content-list float-l">
            <li><a href="">Program information</a></li>
            <li><a href="">Support</a></li>
            <li><a href="">Terms &amp; Conditions</a></li>
        </ul>
        <p class="float-r copyright">&copy; 2014 Rogers Communications</p>
    </div> -->
</footer>


<span id="exit-off-canvas" class="exit-offcanvas"></span>

<script src="/assets/js/core/init.js"></script>
<?php include "includes/dev-scripts.php"; ?>
</body>
</html>










