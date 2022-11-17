# simple-mastodon-verification #
**Contributors:** [mckinnon](https://opendna.com)  
**Tags:** wordpress, plugin, fediverse, activitypub, mastodon  
**Requires at least:** 6.1
**Tested up to:** 6.1
**Stable tag:** 1.0.0
**Requires PHP:** 7.4
**License:** GPLv2 or later
**License URI:** http://www.gnu.org/licenses/gpl-2.0.txt  

## Description ##
This [Wordpress](https://wordpress.org/) plugin  provides an *General Settings* menu option to define a rel="me" in metatags. This is useful for validating personal blogs with [Mastodon](https://joinmastodon.org/) instances.

This plugin was tested on Wordpress 6.1. Compatiblity with earlier or later versions is unknown.

## Installation & Use ##
1. Install the plugin from the Wordpress store and enable in the Plugin menu, or
2. Unzip and upload the files to */wp-content/themes/simple-mastodon verification* and enable in the Plugin menu.

The plugin will add a field at the bottom of the *General Setting* page (Admin Dashboard > Settings>General Settings), labelled "Verify Mastodon URL". The field should accept any valid mastodon user URL up to three sub-domains deep. i.e https://mastodon.social/@user to https://my.mastodon.del.icio.us/@user The plugin does *not* accept Mastodon addresses (@user@domain.tld)

When a valid URL has been saved, a tag containing a rel="me" link pointing to the Mastodon user profile will be added near the top of the site's metadata (between <head> elements). If a link to the Wordpress instance is added as one of that user's profile metadata, the Mastodon instance will validate the ownership of the URL and add a green "verified" banner to the URL.

## Changelog ##

Project maintained on GitHub at [mckinnon/simple-mastodon-verification](https://github.com/mckinnon/simple-mastodon-verification).

### 1.0.0 ###

* initial commit
