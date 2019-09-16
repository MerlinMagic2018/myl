	=== Arconix FAQ ===
Contributors: jgardner03, tychesoftwares
Tags: arconix, faq, toggle, accordion, faq plugin, frequently asked questions
Requires at least: 3.8
Tested up to: 4.9.5
Stable tag: 1.7.0

Arconix FAQ provides an easy way to add FAQ items to your website.

== Description ==

Add an easy-to-create, stylish FAQ section to your website. Display your frequently asked questions using the supplied shortcode (`[faq]`) and show/hide them via an animated, jQuery toggle or accordion box.
The FAQ's can be displayed in groups by tagging them during the FAQ item's creation. They can also be loaded closed or open, and for long FAQ's, there's a checkbox to add a "return to top" link at the bottom.

[Live Demo](http://demo.tychesoftwares.com/faq/faq-plugin-demo/)
[Documentation](https://www.tychesoftwares.com/docs/docs/faq/)

> <strong>Easy to use and looks great</strong> Tried four other big name FAQ plugins before this one. All the others had show stopper issues. This one just worked and looks great.
> [jmiezitis](https://wordpress.org/support/topic/easy-to-use-and-looks-great-17/)

= Features =
* Custom Post-Type driven
* Can be displayed individually, or in FAQ groups by using the "group" taxonomy


== Installation ==

You can download and install Arconix FAQ using the built in WordPress plugin installer. If you download the plugin manually, make sure the files are uploaded to `/wp-content/plugins/arconix-faq/`.

Activate Arconix-FAQ in the "Plugins" admin panel using the "Activate" link.

== Upgrade Notice ==

Upgrade normally via your WordPress admin -> Plugins panel.

== Frequently Asked Questions ==

= Quick and dirty - how do I display my FAQ's? =
Use the `[faq]` shortcode in a widget or on a post/page. This will output the FAQ's using the default settings (Ascending order by Title in a Toggle configuration). If you'd like to use a different order, consult the [Documentation](https://www.tychesoftwares.com/docs/docs/faq/) for assistance.

= How do I enable the accordion display mode? =
Add `style="accordion"` to the shortcode, e.g. `[faq style="accordion"]`

= Where can I find more information on how to use the plugin?  =
* Visit the [documentation](https://www.tychesoftwares.com/docs/docs/faq/) for assistance

= The toggle or accordion isn't working. What can I do? =
While you can certainly start a thread in the [support forum](https://wordpress.org/support/plugin/arconix-faq), there are some troubleshooting steps you can take beforehand to help speed up the process.
1. Check to make sure the javascripts are loading correctly. Load the faq page in your browser and view your page's source. Look for jQuery and Arconix FAQ JS files there. If you don't see the Arconix FAQ JS file, then your theme's `header.php` file is likely missing `<?php wp_head(); ?>`, which is neccessary for the operation of mine and many other plugins.
2. Check to make sure only one copy of jQuery is being loaded. Many times conflicts arise when themes or plugins load jQuery incorrectly, causing the script to be loaded multiple times in multiple versions. In order to find the offending item, start by disabling your plugins one by one until you find the problem. If you've disabled all your plugins, try switching to a different them, such as twentyten or twentytwelve to see if the problem is with your theme. Once you've found the problem, contact the developer for assistance getting the issue resolved.

= I need help =
Check out the WordPress [support forum](https://wordpress.org/support/plugin/arconix-faq)

= I have a great idea for your plugin! =
That's fantastic! Feel free to open an issue or submit a pull request over at [Github](https://github.com/vishalck/arconix-faq/), or you can contact me through [Twitter](https://twitter.com/tychesoftwares), [Facebook](https://www.facebook.com/tychesoftwares/) or my [Website](https://www.tychesoftwares.com)

== Screenshots ==
1. Post Type in WordPress navigation list
2. Post Type Admin display
3. Grouping and Toggling display

== Changelog ==
= 1.7.0 =
* You can now exclude certain groups from the FAQs using the exclude_group attribute. The value of this attribute should be the slug of the group.
* Javascript and CSS files from the plugin will only be included when the shortcode is used on any page.
* You can now hide the titles of the groups using the hide_title attribute for the [faq] shortcode. The value should be true if you want to hide the titles else false.

= 1.6.1 =
Fixed a bug which caused the FAQ Group descriptions to output incorrectly when using the accordion style

= 1.6.0 =
* Prepared the plugin for [translations](https://make.wordpress.org/plugins/2015/09/01/plugin-translations-on-wordpress-org/) (yay!)
* Anchor links to group headers are now supported. The format is `faq-group-slug` -- aka mysite.com/faq/#faq-group-slug
* Allow users to now specify a single FAQ for display
* Fixed a bug which caused some of the FAQ-specific CSS to be output improperly

= 1.5.2 =
* Fixed a bug which caused an extra div to be output, breaking some site layouts.
* Fixed a typo when saving/updating FAQ's

= 1.5.1 =
Fixed a FAQ title display bug

= 1.5.0 =
* Added the ability to display the FAQ's in a single list even if groups are in use.
* FAQ's can now be displayed in a jQuery-powered accordion if desired
* A few other minor backend improvements and fixes.
