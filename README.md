# simple-mastodon-verification #

**Contributors:** [mckinnon](https://opendna.com)  
**Tags:** wordpress, plugin, fediverse, activitypub, mastodon  
**Requires at least:** 6.1  
**Tested up to:** 6.3.3  
**Stable tag:** 1.1.3  
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

### Admin verification ###

The plugin will add a field at the bottom of the *General Settings* page (Admin Dashboard > Settings>General Settings), labelled "Verify Mastodon URL". The field should accept any valid mastodon user URL up to three sub-domains deep. i.e `https://mastodon.social/@user` to `https://my.mastodon.del.icio.us/@user` The plugin does *not* accept Mastodon addresses (@user@domain.tld)

When a valid URL has been saved, a tag containing a `rel="me"` link pointing to the Mastodon user profile will be added near the top of the site's metadata (between `<head>` elements). If a link to the Wordpress instance is added as one of that user's profile metadata, the Mastodon instance will validate the ownership of the URL and add a green "verified" banner to the URL.

### Author verification ###

If an Administrator enables the "Verify Authors' profiles" option on the *General Settings* page (Admin Dashboard > Settings>General Settings), a field labelled "Mastodon URL" will be added to users' profile pages (under "contact info").

When a valid URL has been saved, a tag containing a `rel="me"` link will be added to the metadata (between `<head>` elements) on the Author's archive page *only*. If a link to the Wordpress Author archive is added as one of that's user's profile metadata, the Mastodon instance will validate the ownership of the URL and add a green "verified" banner to the URL.

## Changelog ##

Project maintained on GitHub at [mckinnon/simple-mastodon-verification](https://github.com/mckinnon/simple-mastodon-verification).

### 1.1.3 ###

* Improve I18N Issue

### 1.1.2 ###

* Remove closing PHP tag

### 1.1.1 ###

* Site-wide Mastodon URL restricted to https to match changes to Mastodon v4.0.

### 1.1.0 ###

* added support for users to verify using Author's page

### 1.0.2 ###

* initial Wordpress.org commit
* corrected error in Uninstall.php

### 1.0.1 ###

* escaped echoed variables, standardized function names, improved form UI and validation, cleaned up comments.

### 1.0.0 ###

* initial commit
