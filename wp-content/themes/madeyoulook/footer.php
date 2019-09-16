<!-- start footer -->
<div class="region global-footer cf" id="global-footer">
    <footer class="fluid brand-footer cf" role="contentinfo">
        <h3 class="hide-text">Additional Information</h3>
        <div class="row cf ra">
            <div class="col span-2">
                <div class="footer-logo"></div>
                <h4 class="hide-text">About Made You Look Jewellery</h4>
                <p class="sm--m footer--heading">Your Toronto Custom Jewellery Store</p>
                <p class="footer-excerpt">Located in Parkdale, Toronto’s most unique, diverse and dynamic neighborhood. Enter our wondrous emporium of all things jewellery and feast your eyes on a spell-bounding array of superb creations. There really is no place like it!</p>
            </div>
            <div class="col span-1" itemscope itemtype="http://www.schema.org/SiteNavigationElement">
                <h4 class="xsm--m footer--heading">Browse <span class="hide-text">sections</span></h4>
                <ul class="no-bullet">
                    <?php
                        wp_nav_menu( array( 
                            'walker' => new MV_Cleaner_Walker_Nav_Menu(), 
                            'theme_location' => 'main-nav', 
                            'container' => false,
                            'menu_id' => 'footer-primary-menu',
                            //'menu_class' => 'no-bullet',
                            'items_wrap' => '%3$s'
                        ));
                    ?>
                    <li aria-hidden="true">&mdash;</li>
                    <?php
                        wp_nav_menu( array( 
                            'walker' => new MV_Cleaner_Walker_Nav_Menu(), 
                            'theme_location' => 'utility-nav', 
                            'container' => false,
                            'menu_id' => 'footer-secondary-menu',
                            //'menu_class' => 'no-bullet',
                            'items_wrap' => '%3$s'
                        ));
                    ?>
                </ul>
            </div>
            <div class="col span-1" itemscope itemtype="http://www.schema.org/SiteNavigationElement">
                <h4 class="xsm--m footer--heading">FYI</h4>
                <ul class="no-bullet footer-lists">
                    <?php
                        wp_nav_menu( array( 
                            'walker' => new MV_Cleaner_Walker_Nav_Menu(), 
                            'theme_location' => 'fyi-links', 
                            'container' => false,
                            'menu_id' => 'footer-tertiary-menu',
                            //'menu_class' => 'no-bullet',
                            'items_wrap' => '%3$s'
                        ));
                    ?>
                     <li aria-hidden="true">&mdash;</li>
                     <?php
                        wp_nav_menu( array( 
                            'walker' => new MV_Cleaner_Walker_Nav_Menu(), 
                            'theme_location' => 'other-links', 
                            'container' => false,
                            'menu_id' => 'footer-tertiary-menu',
                            //'menu_class' => 'no-bullet',
                            'items_wrap' => '%3$s'
                        ));
                    ?>

                    <!-- <li><a href="/wedding/"><abbr title="Frequently Asked Questions">FAQ</abbr>'s</a></li>
                    <li><a href="/wedding/">Glossary</a></li>
                    <li><a href="/wedding/">Choosing a Ring</a></li>
                    <li><a href="/wedding/">Care and Cleaning</a></li>
                    <li>&mdash;</li>
                    <li><a href="/wedding/">Exchange Policy</a></li>
                    <li><a href="/wedding/">Gift Certificates</a></li> -->
                </ul>
            </div>
            <div class="col span-2 cf">
                <h4 class="xsm--m footer--heading">Follow Us Online!</h4>
                <ul class="inline-list footer-social" itemscope itemtype="http://www.schema.org/SiteNavigationElement">
                    <li itemprop="name"><a class="is-circle" href="http://www.facebook.com" rel="external me" itemprop="url" target="blank"><span class="ico i-lg i--fb">Facebook</span></a></li>
                    <li itemprop="name"><a class="is-circle" href="#" rel="external me" itemprop="url" target="blank"><span class="ico i-lg i--ig">Instagram</span></a></li>
                    <li itemprop="name"><a class="is-circle" href="#" rel="external me" itemprop="url" target="blank"><span class="ico i-lg i--pt">Pinterest</span></a></li>
                    <li itemprop="name"><a class="is-circle" href="#" rel="external me" itemprop="url" target="blank"><span class="ico i-lg i--tw">Twitter</span></a></li>
                    <li itemprop="name"><a class="is-circle" href="#" rel="external me" itemprop="url" target="blank"><span class="ico i-lg i--yt">Youtube</span></a></li>
                </ul>

                <div class="location region" itemscope itemtype="http://schema.org/LocalBusiness">
                    <h4 class="sm--m footer--heading">Find Us In Real Life!!</h4>
                    <h5 class="hide-text" itemprop="name">Made You Look Jewellery</h5>
                    <!-- <span itemprop="logo" aria-hidden="true"><img class="is--hidden" itemprop="image" src="https://www.madeyoulook.ca/assets/img/logos/logo-global.png" alt=""></span> -->

                    <div class="footer--location">

                        <div itemtype="http://schema.org/PostalAddress" itemscope="" itemprop="address">
                            <p itemprop="streetAddress">1338 Queen Street West</p>
                            <p><span itemprop="addressLocality">Toronto</span>, <span itemprop="addressRegion">On</span> <span itemprop="postalCode">M6K 1L4</span></p>
                        </div>
                        <p>Email: <span itemprop="email"><a href="mailto:info@madeyoulook.ca" rel="email">info@madeyoulook.ca</a></span></p>
                        <p>Phone: <a href="tel:+1-416-463-2136" rel="telephone"><span itemprop="telephone">416-463-2136</span></a></p>
                        <p class="is--hidden">Url: <span itemprop="url"><a href="https://www.madeyoulook.ca">https://www.madeyoulook.ca</a></span></p>

                        <p class="is--hidden" itemprop="paymentAccepted">cash, check, credit card</p>
                        <span class="is--hidden" itemprop="priceRange">$$</span>
                        <div class="is--hidden" itemtype="http://schema.org/GeoCoordinates" itemscope="" itemprop="geo">
                            <meta itemprop="latitude" content="43.6416835"><meta itemprop="longitude" content="-79.4318367">
                        </div>

                    </div>
                    <div class="store-hours hours--footer">
                        <h4 class="sizes-SM">Store Hours</h4>
                        <ul class="no-bullet hours--list">
                            <li itemprop="openingHours" content="Mo-Fri 10:00-20:00">Mon-Fri: 10-8</li>
                            <li itemprop="openingHours" content="Sa 10:00-18:00">Sat: 10-6</li>
                            <li itemprop="openingHours" content="Su 12:00-17:00">Sun: 12-5</li>
                        </ul>
                    </div>
                </div>
            </div>

        </div>
        <p class="source-org copyright">&copy; <?php echo date('Y'); ?> Made You Look Custom Jewellery.</p>
    </footer>
</div>

<span id="exit-off-canvas" class="exit-offcanvas"></span>

<?php // all js scripts are loaded in library/bones.php ?>
<?php wp_footer(); ?>
		
<script src="/assets/js/core/init.js?v=0.1011"></script>

<?php if ( is_woocommerce() ) : ?>
    <script src="/wp-content/plugins/woocommerce/assets/js/frontend/woocommerce.min.js" defer="defer"></script>
    <script src="/assets/js/resources/js-cookie.js" defer="defer"></script>
    <script>
       // load facet headings
       (function($) {
        $(document).on('facetwp-loaded', function() {
        $('.facetwp-facet').each(function() {
            var facet_name = $(this).attr('data-name');
            var facet_label = FWP.settings.labels[facet_name];
            if ($('.facet-label[data-for="' + facet_name + '"]').length < 1) {
                $(this).before('<h4 class="wfr facet-label f-labels" data-for="' + facet_name + '">' + facet_label + ':</h4>');
            }
           });
         });
       })(jQuery);
    </script>
<?php endif; ?>


<?php if( in_array( $_SERVER['REMOTE_ADDR'], array( '127.0.0.1', '::1' ) ) ) { ?>
<link rel="stylesheet" href="/assets/dev/css/debug.css" media="all">
<div id="devMenu">    
    <h6>Window Width: <span id="width"></span> px</h6>
    <div id="debug-features"> for debug output of features </div>
</div> 
<script src="/assets/dev/js/working.js"></script>
<script>
    function widthSetter() { document.getElementById("width").innerHTML = window.innerWidth; }
    widthSetter();
    window.addEventListener("resize", widthSetter);
</script>
<?php } ?>
</body>
</html>