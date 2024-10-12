# simple-fediverse-creator #

**Contributors:** [mckinnon](https://opendna.com)  
**Tags:** wordpress, plugin, fediverse, activitypub, mastodon  
**Requires at least:** 6.1  
**Tested up to:** 6.6.2  
**Stable tag:** 1.0.0  
**Requires PHP:** 7.4  
**License:** GPLv2 or later  
**License URI:** [http://www.gnu.org/licenses/gpl-2.0.txt](http://www.gnu.org/licenses/gpl-2.0.txt)

## Description ##

Provides a General Settings menu option to define `<meta name="fediverse:creator"` in metatags for the whole site and also individual contributors. This extends - *but does NOT replace* - existing Open Graph settings to support fediverse services.

This [Wordpress](https://wordpress.org/) plugin adds menu options to define `fediverse:creator` in metatags. This is useful for supporting the byline features of Mastodon 4.3+ link previews. See [Highlighting journalism on Mastodon](https://blog.joinmastodon.org/2024/07/highlighting-journalism-on-mastodon/) Eugen Rochko (July 2, 2024).

This plugin is *not* a complete Open Graph implementation and will not work as intended as a stand-alone plugin. It is intended only for Wordpress admins who wish to extend their existing Open Graph services. While this plugin can be used alongside willnorris's [Open Graph](https://wordpress.org/plugins/opengraph) and pfefferle [ActivityPub](https://wordpress.org/plugins/activitypub/), it only replicates options otherwise available from that pair.

This plugin was tested on Wordpress 6.6.2 and later. Compatiblity with earlier versions is unknown.

## Installation & Use ##

1. Install the [Simple Fediverse:Creator](https://wordpress.org/plugins/simple-fediverse-creator) plugin from the Wordpress store and enable in the Plugin menu, or
2. Unzip and upload the files to */wp-content/plugins/simple-fediverse-creator* and enable in the Plugin menu.

**Note for Wordpress.com users**

1. Installing this plugin on WordPress.com requires a paid subscription.
2. Configuring and enabling this plugin requires entering 'Classic View' from the dashboard Screen (top right). The 'Default View' is Auttomatic's in-house UI and is not compatible with many WordPress plugin APIs.

### Admin fediverse:creator ###

The plugin will add a field at the bottom of the *General Settings* page (Admin Dashboard > Settings>General Settings), labelled "Site fediverse:creator". The field should accept any valid mastodon username up to three sub-domains deep. i.e `user@mastodon.social` to `user@my.mastodon.del.icio.us` The plugin does *not* accept Mastodon addresses (https://domain.tld/user)

When a valid username has been saved, a `name="fediverse:creator"` meta tag for that username will be added to the site's metadata (between `<head>` elements). When a link to the Wordpress instance is posted to Mastodon, the Mastodon (should) include the username in the link profile.

### Author fediverse:creator ###

If an Administrator turns on the "Enable Authors' fediverse:creator" option on the *General Settings* page (Admin Dashboard > Settings>General Settings), a field labelled "fediverse:creator" will be added to users' profile pages (under "contact info").

When a valid URL has been saved, a tag containing a `name="fediverse:creator"` meta tag will be added to the metadata (between `<head>` elements) of every pose authored by that Author. When a link to the Wordpress instance is posted to Mastodon, the Mastodon (should) include the username in the link profile.

## Changelog ##

Project maintained on GitHub at [mckinnon/simple-fediverse-creator](https://github.com/mckinnon/simple-fediverse-creator).

### 1.0.0 ###

* Initial commit
