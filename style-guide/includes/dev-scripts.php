<?php /* START: development workflow */ ?>



<link rel="stylesheet" href="<?= $rootUrl ?>/assets/dev/css/debug.css" media="all">
<div id="devMenu">    
    <h6>Window Width: <span id="width"></span> px</h6>
    <div id="debug-features"> for debug output of features </div>
</div> 
<script src="<?= $rootUrl ?>/assets/dev/js/working.js"></script>
<script>
    function widthSetter() { document.getElementById("width").innerHTML = window.innerWidth; }
    widthSetter();
    window.addEventListener("resize", widthSetter);
</script>


<!-- <script src="/assets/dev/js/jquery-1.9.1.min.js"></script>
<script src="/assets/dev/js/jquery-migrate-1.1.1.min.js"></script>
<script src="/assets/dev/js/global.js"></script> -->