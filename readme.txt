=== Simple fediverse:creator ===
Contributors: opendna
Tags: Mastodon, fediverse, verification
Requires at least: 6.1
Tested up to: 6.6.2
Requires PHP: 7.4
Stable tag: 2.0.1
License: GPL-2.0+
License URI: http://www.gnu.org/licenses/gpl-2.0.txt

Provides a General Settings menu option to define a fediverse:creator in metatags for the whole site and also individual contributors.

== Description ==
Provides a General Settings menu option to define a fediverse:creator in metatags for the whole site and also individual contributors.

= Admin fediverse:creator =
The plugin will add a field at the bottom of the *General Settings* page (Admin Dashboard > Settings>General Settings), labelled "Site fediverse:creator". The field should accept any valid mastodon username up to three sub-domains deep. i.e `user@mastodon.social` to `user@my.mastodon.del.icio.us` The plugin does *not* accept Mastodon addresses (https://domain.tld/user)

When a valid username has been saved, a `name="fediverse:creator"` meta tag for that username will be added to the site's metadata (between `<head>` elements). When a link to the Wordpress instance is posted to Mastodon, the Mastodon (should) include the username in the link profile.

= Author fediverse:creator =
If an Administrator turns on the "Enable Authors' fediverse:creator" option on the *General Settings* page (Admin Dashboard > Settings>General Settings), a field labelled "fediverse:creator" will be added to users' profile pages (under "contact info").

When a valid URL has been saved, a tag containing a `name="fediverse:creator"` meta tag will be added to the metadata (between `<head>` elements) of every pose authored by that Author. When a link to the Wordpress instance is posted to Mastodon, the Mastodon (should) include the username in the link profile.

= Plugin Development =
*Simple fediverse:creator* development is managed on GitHub, with official releases published on WordPress.org. The GitHub repo can be found at https://github.com/mckinnon/simple-fediverse-creator.

== Installation ==
Install the plugin from the Wordpress store and enable in the Plugin menu. Configure on the General Settings page, then on User profile pages.

*Note for Wordpress.com users*
1. Installing this plugin on WordPress.com requires a paid subscription.
2. Configuring and enabling this plugin requires entering 'Classic View' from the dashboard Screen (top right). The 'Default View' is Auttomatic's in-house UI and is not compatible with many WordPress plugin APIs.

== Changelog ==
Project maintained on GitHub at https://github.com/mckinnon/simple-fediverse-creator

= 1.0.0 =
Initial commit