<h2 class="hide-text">Made You Look main menu</h2>
<div class="menu-logo" aria-hidden="true"></div>
<ul class="navigation-global">
    <li itemprop="name"><a <? if (stripos($_SERVER['REQUEST_URI'],'/style-guide/index.php') !== false) {echo 'class="is-selected"';} ?> href="/style-guide/index.php" itemprop="url">Main</a></li>
    <li itemprop="name"><a <? if (stripos($_SERVER['REQUEST_URI'],'/style-guide/type.php') !== false) {echo 'class="is-selected"';} ?> href="/style-guide/type.php" itemprop="url">Typography</a></li>
    <li itemprop="name"><a <? if (stripos($_SERVER['REQUEST_URI'],'/style-guide/components.php') !== false) {echo 'class="is-selected"';} ?> href="/style-guide/components.php" itemprop="url">Components</a></li>
    <li itemprop="name"><a <? if (stripos($_SERVER['REQUEST_URI'],'/style-guide/forms.php') !== false) {echo 'class="is-selected"';} ?> href="/style-guide/forms.php" itemprop="url">Forms</a></li>
    <li itemprop="name"><a <? if (stripos($_SERVER['REQUEST_URI'],'/style-guide/media.php') !== false) {echo 'class="is-selected"';} ?> href="/style-guide/media.php" itemprop="url">Media</a></li>
    <li itemprop="name"><a <? if (stripos($_SERVER['REQUEST_URI'],'/style-guide/docs.php') !== false) {echo 'class="is-selected"';} ?> href="/style-guide/docs.php" itemprop="url">Docs</a></li>
</ul>