

/* application wrapper
-------------------------------------------------------------------------------------------------------------------------- */
var myl = myl || {};
window.myl = (function (window, document, mylwrapper) {

    //$(function(){$(".top").hide().removeAttr("href");if($(window).scrollTop()!="0"){$(".top").fadeIn("slow")}$(window).scroll(function(){if($(window).scrollTop()=="0"){$(".top").fadeOut("slow")}else{$(".top").fadeIn("slow")}});$(".top").click(function(){$("html, body").animate({scrollTop:15},"slow")})});

    addLoadEvent(function() {

        window.addEventListener('scroll', function(e) {

            var ssheader = doc.querySelector('#global-header--ss'),
                fsheader = doc.querySelector('#global-header')

            if (window.matchMedia('only screen and (max-width: 600px)').matches) {
                ssheader.classList[e.pageY > 40 ? 'add' : 'remove']('is--sticky');
            }
            else {
                fsheader.classList[e.pageY > 40 ? 'add' : 'remove']('is--sticky');
            }
        });




    });
    // end addload event


    /* set atributes */
    function setAttributes(el, attrs) {
        for (var key in attrs) {
        el.setAttribute(key, attrs[key]);
        }
    };


    /* Small screen menu
    ---------------------------------------------- */
    (function (win) {
        "use strict";
        var header = doc.querySelector('#global-header'),
            headerSS = doc.querySelector('#global-header--ss'),
            searchT = doc.querySelector('#searchform'),
            fragment = doc.createDocumentFragment(),
            toggler = fragment.appendChild(doc.createElement('a')),
            ssLogo = fragment.appendChild(doc.createElement('a')),
            searchtoggle = fragment.appendChild(doc.createElement('a'));

        var offcanvas = doc.querySelector('#page-body'),
            offcanvas2 = doc.querySelector('#site-body');

        setAttributes(header, {
            "aria-labelledby": "menu-trigger"
        });
        setAttributes(searchT, {
            "aria-labelledby": "search-trigger"
        });

        // toggler link
        setAttributes(toggler, {
            "aria-controls": "global-header",
            "href": "#global-header",
            "id": "menu-trigger",
            "aria-label": "Main Menu",
            "role": "button",
            "class": "menu-trigger ico i--menu"
        });

        // create ss logo
        setAttributes(ssLogo, {
            "class": "brand brand-ss",
            "href": "/",
            "id": "menu-ss"
        });

        // search toggler link
        setAttributes(searchtoggle, {
            "aria-controls": "search",
            "href": "#search",
            "id": "search-trigger",
            "aria-label": "Search",
            "role": "button",
            "class": "search-trigger ico i--search"
        });

        toggler.innerHTML = 'Menu';
        ssLogo.innerHTML = 'Made You Look Jewellery';
        searchtoggle.innerHTML = 'Search';

        if (doc.querySelector && doc.addEventListener) {

            if (window.matchMedia('only screen and (max-width: 767px)').matches) {
                header.setAttribute('aria-expanded', 'false');
                header.className += ' is-hidden';
                searchT.className += ' is-hiddensearch';
            }

            headerSS.appendChild(fragment);
            //menu.className += ' is-hidden';

            toggler.addEventListener('click', function (e) {
                
                toggler.className = (toggler.className === 'menu-trigger ico i--menu') ? 'menu-trigger open ico i--close' : 'menu-trigger ico i--menu';
                searchtoggle.setAttribute('class', 'search-trigger ico i--search');
                
                //overflow.setAttribute('class', 'oh1');
                //overflow.className += ' oh1';

                header.className = (header.className === 'region is--fixed global-header is-hidden') ? 'region is--fixed global-header is-visible' : 'region is--fixed global-header is-hidden';
                header.setAttribute('aria-expanded', header.getAttribute('aria-expanded') === 'true' ? 'false' : 'true');
                searchT.setAttribute('class', 'search-form cf is-hiddensearch');

                //overflow.setAttribute('class', overflow.getAttribute('class') === 'ov-hidden' ? 'page-body' : 'ov-hidden');
                //overflow.className = (overflow.className === 'page-body ov-hidden') ? 'page-body' : 'page-body ov-hidden';

                if (overflow2.classList.contains('offca')) {
                    overflow2.classList.remove('oh');
                } 
                overflow.classList.toggle('oh');

                // if (searchT.classList.contains('is-hiddensearch')) {

                //     //overflow.classList.remove('ov-hidden');
                //     overflow.classList.toggle('ov-hidden');

                // } else {
                //         overflow.classList.remove('ov-hidden');
                //     }

                // if (overflow.classList.contains('ov-hidden')) {

                //     overflow.classList.remove('ov-hidden');

                // } else {
                //         overflow.classList.add('ov-hidden');
                //     }



                //overflow.classList['add' : 'remove']('ov-hidden');

                //overflow.classList.toggle('ov-hidden');

                // Tedious toggle
                // if (overflow.classList.contains('ov-hidden')) {
                //     return
                //     //overflow.classList.remove('ov-hidden');

                //     //overflow.classList.toggle('ov-hidden');

                // } else if (!overflow.classList.contains('ov-hidden')){
                //     overflow.classList.add('ov-hidden');
                // }

                // else {
                //         //overflow.classList.add('ov-hidden');
                //         overflow.classList.toggle('ov-hidden');
                //     }

                e.preventDefault();
            }, false);

            searchtoggle.addEventListener('click', function (e) {
                
                searchtoggle.className = (searchtoggle.className === 'search-trigger ico i--search') ? 'search-trigger open ico i--close' : 'search-trigger ico i--search';
                toggler.setAttribute('class', 'menu-trigger ico i--menu');

                searchT.className = (searchT.className === 'search-form cf is-hiddensearch') ? 'search-form cf is-visiblesearch' : 'search-form cf is-hiddensearch';
                searchT.setAttribute('aria-expanded', searchT.getAttribute('aria-expanded') === 'true' ? 'false' : 'true');
                header.setAttribute('class', 'region is--fixed global-header is-hidden');

                
                if (overflow.classList.contains('oh')) {
                    overflow.classList.remove('oh');
                } 
                overflow2.classList.toggle('oh');



                // if (header.classList.contains('is-hidden')) {

                //     // if header is hidden 
                //     overflow.classList.toggle('ov-hidden');

                // } else if (overflow.classList.contains('ov-hidden')) {

                //     // if body already contains class
                //     alert('boing!');

                // } else {

                // }











                // if (overflow.classList.contains('ov-hidden')) {
                    
                //     overflow.classList.remove('ov-hidden');

                // } else {
                //         overflow.classList.add('ov-hidden');
                //     }

                //overflow.className = (overflow.className === 'page-body ov-hidden') ? 'page-body' : 'page-body ov-hidden';

                //overflow.classList.toggle('ov-hidden');
                // Tedious toggle
                // if (overflow.classList.contains('ov-hidden')) {
                //     return
                //     //overflow.classList.remove('ov-hidden');

                //     //overflow.classList.toggle('ov-hidden');

                // } else if (!overflow.classList.contains('ov-hidden')){
                //     overflow.classList.add('ov-hidden');
                // }

                // else {
                //         //overflow.classList.add('ov-hidden');
                //         overflow.classList.toggle('ov-hidden');
                //     }

                e.preventDefault();
            }, false);
        }

    }(this));
    // end small screen menu


    /* set up for lazyloading images and video on small screens
    ---------------------------------------------- */
    var Utils = {
        q : function (q, res) {
            if (doc.querySelectorAll) {
                res = doc.querySelectorAll(q);
            } else {
                a = doc.styleSheets[0] || doc.createStyleSheet();
                a.addRule(q, 'f:b');
                for (var l = d.all, b = 0, c = [], f = l.length;b < f;b++)
                l[b].currentStyle.f && c.push(l[b]);
          
                a.removeRule(0);
                res = c;
            }
            return res;
        }
    };
    function initImages() {
        "use strict";
        var lazy = Utils.q('[data-src]'),
            //imgBos = Utils.q('[data-bos]'),
            imgAlt = Utils.q('[data-alt]'),
            imgWidth = Utils.q('[data-width]'),
            imgHeight = Utils.q('[data-height]');
        
        for (var i = 0; i < lazy.length; i++) {
            var source = lazy[i].getAttribute('data-src'),
                alt = imgAlt[i].getAttribute('data-alt'),
                width = imgWidth[i].getAttribute('data-width'),
                height = imgHeight[i].getAttribute('data-height'),
                img = new Image();
            
            //create the image & alt
            img.src = source;
            img.alt = alt;
            img.width = width;
            img.height = height;
            //insert it inside of the span
            lazy[i].insertBefore(img, lazy[i].firstChild);
            imgAlt[i].appendChild(img);
            imgWidth[i].appendChild(img);
            imgHeight[i].appendChild(img);
        }
    }
    // end lazy images


    /* touch - pointer check
    ---------------------------------------------- */
    function touchEvents() {
    
        var supportsTouch = false;
        if ('ontouchstart' in window) {
            //iOS & android
            supportsTouch = true;

            doc.documentElement.className = doc.documentElement.className.replace(/\bno-touch\b/g, '') + ' touch';
            //alert('boing! iOS & Android');

            // if ('addEventListener' in document) {
            //     document.addEventListener('DOMContentLoaded', function() {
            //         FastClick.attach(document.body);
            //     }, false);
            // }

            /* A fix for the iOS orientationchange zoom bug. Script by @scottjehl, rebound by @wilto. MIT / GPLv2 License.  */
            (function () {

                // This fix addresses an iOS bug, so return early if the UA claims it's something else.
                var ua = navigator.userAgent;
                if (!(/iPhone|iPad|iPod/.test(navigator.platform) && /OS [1-5]_[0-9_]* like Mac OS X/i.test(ua) && ua.indexOf("AppleWebKit") > -1)) {
                    return;
                }

                if (!doc.querySelector) { return; }

                var meta = doc.querySelector("meta[name=viewport]"),
                    initialContent = meta && meta.getAttribute("content"),
                    disabledZoom = initialContent + ",maximum-scale=1",
                    enabledZoom = initialContent + ",maximum-scale=10",
                    enabled = true,
                    x, y, z, aig;

                if (!meta) { return; }

                function restoreZoom() {
                    meta.setAttribute("content", enabledZoom);
                    enabled = true;
                }

                function disableZoom() {
                    meta.setAttribute("content", disabledZoom);
                    enabled = false;
                }

                function checkTilt(e) {
                    aig = e.accelerationIncludingGravity;
                    x = Math.abs(aig.x);
                    y = Math.abs(aig.y);
                    z = Math.abs(aig.z);

                    // If portrait orientation and in one of the danger zones
                    if ((!w.orientation || w.orientation === 180) && (x > 7 || ((z > 6 && y < 8 || z < 8 && y > 6) && x > 5))) {
                        if (enabled) {
                            disableZoom();
                        }
                    }
                    else if (!enabled) {
                        restoreZoom();
                    }
                }

                w.addEventListener("orientationchange", restoreZoom, false);
                w.addEventListener("devicemotion", checkTilt, false);

            })(this);
            // end orientation fix

        } else if (window.navigator.msPointerEnabled) {
            //Win8
            supportsTouch = true;

            doc.documentElement.className = doc.documentElement.className.replace(/\bno-touch\b/g, '') + ' touch';
            //alert('bang!!! windows8');

            // if ('addEventListener' in document) {
            //     document.addEventListener('DOMContentLoaded', function() {
            //         FastClick.attach(document.body);
            //     }, false);
            // }

        } else if (supportsTouch === false) {

            doc.documentElement.className = doc.documentElement.className.replace(/\bno-touch\b/g, '') + ' no-touch';
            //alert('cool beans! do not support touch');
        }
    }
    // end touchEvents

/* Lazy Load Videos
-------------------------------------------------------------------------------------------------------------------------- */
function lazyvids() {
    function r(f){/in/.test(document.readyState)?setTimeout('r('+f+')',9):f()}
    r(function(){
        if(!document.getElementsByClassName) {
            // IE8 support
            var getElementsByClassName = function(node, classname) {
                var a = [];
                var re = new RegExp('(^| )'+classname+'( |$)');
                var els = node.getElementsByTagName("*");
                for(var i=0,j=els.length; i<j; i++)
                    if(re.test(els[i].className))a.push(els[i]);
                return a;
            }
            var videos = getElementsByClassName(document.body,"youtube");
        }
        else {
            var videos = document.getElementsByClassName("youtube");
        }

        var nb_videos = videos.length;
        for (var i=0; i<nb_videos; i++) {
            // Based on the YouTube ID, we can easily find the thumbnail image
            videos[i].style.backgroundImage = 'url(http://i.ytimg.com/vi/' + videos[i].id + '/sddefault.jpg)';

            // Overlay the Play icon to make it look like a video player
            var play = document.createElement("div");
            play.setAttribute("class","play");
            videos[i].appendChild(play);

            videos[i].onclick = function() {
                // Create an iFrame with autoplay set to true
                var iframe = document.createElement("iframe");
                var iframe_url = "https://www.youtube.com/embed/" + this.id + "?autoplay=1&autohide=1";
                if (this.getAttribute("data-params")) iframe_url+='&'+this.getAttribute("data-params");
                iframe.setAttribute("src",iframe_url);
                iframe.setAttribute("frameborder",'0');

                // The height and width of the iFrame should be the same as parent
                iframe.style.width  = this.style.width;
                iframe.style.height = this.style.height;

                // Replace the YouTube thumbnail with YouTube Player
                this.parentNode.replaceChild(iframe, this);
            }
        }
    });
};

/* Inject Analytics -- setting account ID happens later 
-------------------------------------------------------------------------------------------------------------------------- */
function injectAnalytics() {

//(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)})(window,document,'script','//www.google-analytics.com/analytics.js','ga');

    // (function(doc, script){
    //     var js,
    //         fjs = doc.getElementsByTagName(script)[0],
    //         frag = doc.createDocumentFragment(),
    //         add = function(url, id) {
    //             if (doc.getElementById(id)) {return;}
    //             js = doc.createElement(script);
    //             js.src = url;
    //             id && (js.id = id);
    //             frag.appendChild( js );
    //         };
        /* Google Analytics */
        //add('//www.google-analytics.com/analytics.js');
        
        /* Omniture - SiteCatalyst */
        //add('/assets/js/global/s_code_dev.min.js');
        //add('/assets/js/global/s_code_dev.prod.js');
        
        //(document.getElementsByTagName('body')[0]).appendChild(frag, fjs);
    //}(document, 'script'));
};

    /* load'em up! & execute!
    -------------------------------------------------------------------------------------------------------------------------- */
    /* load analytics */
    //addLoadEvent(injectAnalytics);

    /* init GA ID */
    // addLoadEvent(function() {
    //     ga('create', 'UA-68502503-1', 'auto');
    //     ga('send', 'pageview');
    // })


    /* always load touch events */
    touchEvents();

    if (doc.querySelectorAll('.lazy-img')) {

        if (window.matchMedia('only screen and (min-width: 299px)').matches) {
            addLoadEvent(initImages);
        }

    }

    if (doc.querySelectorAll('.youtube')) {
            addLoadEvent(lazyvids);
    }

})(this, this.document);



/* create popup for social media sharing = use onclick to trirger in markup
-------------------------------------------------------------------------------------------------------------------------- */
var conShare = function () {
    "use strict";
    var path = '', 
        url = location.href,
        newwindow,
        attrib = 'width=600,height=350';

    return {
        twitter : function (m){
            path = 'http://twitter.com/share?url=' + url;
            if (m !== '') /* Check for message */
                path += '&text=' + encodeURIComponent(m); /* Append message */
                newwindow = window.open(path,'twitter', attrib); /* Open in new window */
                
            if (window.focus)
                newwindow.focus(); /* Bring window to front */
        },
        facebook : function (m){
            path = 'http://facebook.com/sharer.php?u=' + url;
            if (m !== '') /* Check for message */
                path += '&t=' + encodeURIComponent(m); /* Append message */
                newwindow = window.open(path, 'facebook', attrib);
                
            if (window.focus)
                newwindow.focus(); /* Bring window to front */
        },
        pinterest : function (m){
            path = 'http://pinterest.com/pin/create/button/?url=' + url;
            if (m !== '') /* Check for message */
                path += '&t=' + encodeURIComponent(m); /* Append message */
                newwindow = window.open(path, 'pinterest', attrib);
                
            if (window.focus)
                newwindow.focus(); /* Bring window to front */
        },
        google : function (m){
            path = 'https://plus.google.com/share?url=' + url;
            if (m !== '') /* Check for message */
                path += '&t=' + encodeURIComponent(m); /* Append message */
                newwindow = window.open(path, 'google', attrib);
                
            if (window.focus)
                newwindow.focus(); /* Bring window to front */
        }
    };
}(this);