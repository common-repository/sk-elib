=== SK-Elib ===
Contributors: avdsystem
Tags: customize, login, login screen, logo, custom logo, theme logo, СК-ЭБ
Requires at least: 5.1.2
Tested up to: 6.0
Stable tag: 1.0.2
Requires PHP: 7.0
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

Customize the logo on the WP login screen. Using a custom logo from your WP theme. CSS is automatic!

== Description ==

This plugin allows you to customize the logo on the WordPress login screen. There is zero configuration. You just drop the logo file into your theme WordPress and this plugin takes over.

Note that you should use a transparent background on the PNG custom logo, crop it tightly (no padding pixels) and use a width of exactly and min 312 pixels for best results. Wider images will be downscaled in modern browsers, but it isn't recommended to rely on that.

This plugin also works in the `mu-plugins` directory.

== Installation ==

1. Install the plugin and activate it.

2. Create a PNG image with a transparent background, tightly cropped, with a recommended width of 312 pixels.

3. Upload the PNG custom logo to your theme WordPress.

4. If you have a multisite install with more than one network, will be use custom logo theme to assign a different login logo to each network.

5. Done! The login screen will now use your custom logo.

== Frequently Asked Questions ==

= Can I use a local logo image? =

No, the plugin only works with a custom WordPress theme logo

== Screenshots ==

1. Home page WP a custom logo 

2. A login screen with a custom logo

== Changelog ==

= 1.0.2 =
Text Domain: sk-elib

= 1.0.1 =
Tested with WordPress 6.0

= 1.0.0 =
Using the theme custom logo
The login logo now links to your site, instead of WordPress.org
If you don't have a custom login logo, the plugin does nothing.
Tested with WordPress 5.2.1