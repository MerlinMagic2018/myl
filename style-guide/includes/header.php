<?php /* accessibility nav */ ?> 
<a class="quick-links" href="#main-content">Skip to Main Content</a>
<a class="quick-links" href="#global-footer">Skip to Footer</a>

<?php /* site header start */ ?> 
<div class="region is--fixed global-header" data-nav-slide="slide" aria-expanded="true" id="global-header">
    <header class="brand-header fluid ov cf" role="banner">
        <h1 class="brand brand-fs" id="logo"><a class="is--logo" href="/" rel="external">Made You Look Jewellery</a></h1>
        <?php include "store-hours.php"; ?>
        <?php include "secondary-menu.php"; ?>
    </header>

    <div class="menu-global">
        <nav class="fluid cf" role="navigation" itemscope itemtype="http://www.schema.org/SiteNavigationElement">
            <?php include "main-menu.php"; ?>
            <?php include "social-menu.php"; ?>
        </nav>
    </div>
</div>

<?php /* small screen header bar */ ?> 
<div class="region is--fixed global-header--ss" aria-hidden="true" id="global-header--ss"></div>