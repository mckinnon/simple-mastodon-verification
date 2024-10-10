# simple-mastodon-verification #

**Contributors:** [mckinnon](https://opendna.com)  
**Tags:** wordpress, plugin, fediverse, activitypub, mastodon  
**Requires at least:** 6.1  
**Tested up to:** 6.6.2  
**Stable tag:** 2.0.1  
**Requires PHP:** 7.4  
**License:** GPLv2 or later  
**License URI:** [http://www.gnu.org/licenses/gpl-2.0.txt](http://www.gnu.org/licenses/gpl-2.0.txt)

## Description ##

Provides a General Settings menu option to define a `rel=\"me\"` in metatags for the whole site and also individual contributors.

This [Wordpress](https://wordpress.org/) plugin adds menu options to define a rel="me" in metatags. This is useful for validating personal blogs with [Mastodon](https://joinmastodon.org/) instances and to verify Authors of group blogs.

This plugin was tested on Wordpress 6.1. Compatiblity with earlier or later versions is unknown.

## Installation & Use ##

1. Install the [Simple Mastodon Verification](https://wordpress.org/plugins/simple-mastodon-verification) plugin from the Wordpress store and enable in the Plugin menu, or
2. Unzip and upload the files to */wp-content/themes/simple-mastodon verification* and enable in the Plugin menu.

**Note for Wordpress.com users**

1. Installing this plugin on WordPress.com requires a paid subscription.
2. Configuring and enabling this plugin requires entering 'Classic View' from the dashboard Screen (top right). The 'Default View' is Auttomatic's in-house UI and is not compatible with many WordPress plugin APIs.

**Note on fediverse:creator meta tags**
Mastodon v4.3 added support for Open Graph ("Twitter Cards") by adopting a `<meta name="fediverse:creator"...` tag. I initially intended to support this tag in SMV v.2 but will not be doing that. Doing so requires implementing Open Graph support, and that takes this plugin away from the "Simple" philosophy I promised in the name.

If you want those extended features, I suggest the [ActivityPub](https://wordpress.org/plugins/activitypub/) and [Open Graph](https://wordpress.org/plugins/opengraph/) plugins.

### Admin verification ###

The plugin will add a field at the bottom of the *General Settings* page (Admin Dashboard > Settings>General Settings), labelled "Verify Mastodon URL". The field should accept any valid mastodon user URL up to three sub-domains deep. i.e `https://mastodon.social/@user` to `https://my.mastodon.del.icio.us/@user` The plugin does *not* accept Mastodon addresses (@user@domain.tld)

When a valid URL has been saved, a tag containing a `rel="me"` link pointing to the Mastodon user profile will be added near the top of the site's metadata (between `<head>` elements). If a link to the Wordpress instance is added as one of that user's profile metadata, the Mastodon instance will validate the ownership of the URL and add a green "verified" banner to the URL. As of v.2.0.0, the plugin will add a corresponding `fediverse:creator` meta tag.

### Author verification ###

If an Administrator enables the "Verify Authors' profiles" option on the *General Settings* page (Admin Dashboard > Settings>General Settings), a field labelled "Mastodon URL" will be added to users' profile pages (under "contact info").

When a valid URL has been saved, a tag containing a `rel="me"` link will be added to the metadata (between `<head>` elements) on the Author's archive page *only*. If a link to the Wordpress Author archive is added as one of that's user's profile metadata, the Mastodon instance will validate the ownership of the URL and add a green "verified" banner to the URL. As of v.2.0.0, the plugin will add a corresponding `fediverse:creator` meta tag.

## Changelog ##

Project maintained on GitHub at [mckinnon/simple-mastodon-verification](https://github.com/mckinnon/simple-mastodon-verification).

### 2.0.1 ###

* Remove support for fediverse:creator meta tag. See Installation page for details.

### 2.0.0 ###

* Add support for fediverse:creator meta tag

### 1.1.3 ###

* Improve I18N Issue

### 1.1.2 ###

* Remove closing PHP tag

### 1.1.1 ###

* Site-wide Mastodon URL restricted to https to match changes to Mastodon v4.0.

### 1.1.0 ###

* Added support for users to verify using Author's page

### 1.0.2 ###

* Initial Wordpress.org commit
* Corrected error in Uninstall.php

### 1.0.1 ###

* Escaped echoed variables, standardized function names, improved form UI and validation, cleaned up comments.

### 1.0.0 ###

* Initial commit
