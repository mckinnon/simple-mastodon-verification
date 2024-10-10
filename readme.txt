=== Simple Mastodon Verification ===
Contributors: opendna
Tags: Mastodon, fediverse, verification
Requires at least: 6.1
Tested up to: 6.6.2
Requires PHP: 7.4
Stable tag: 2.0.0
License: GPL-2.0+
License URI: http://www.gnu.org/licenses/gpl-2.0.txt

Provides a General Settings menu option to define a rel=\"me\" in metatags for the whole site and also individual contributors.

== Description ==
Provides a General Settings menu option to define a rel=\"me\" in metatags for the whole site and also individual contributors.

= Admin verification =
The plugin will add a field at the bottom of the *General Settings* page (Admin Dashboard > Settings>General Settings), labelled "Verify Mastodon URL". The field should accept any valid mastodon user URL up to three sub-domains deep. i.e. https://mastodon.social/@user to https://my.mastodon.del.icio.us/@user The plugin does *not* accept Mastodon addresses (@user@domain.tld)

When a valid URL has been saved, a tag containing a rel="me" link pointing to the Mastodon user profile will be added near the top of the site's metadata (between <head> elements). If a link to the Wordpress instance is added as one of that user's profile metadata, the Mastodon instance will validate the ownership of the URL and add a green "verified" banner to the URL. As of v.2.0.0, the plugin will add a corresponding `fediverse:creator` meta tag.

= Author verification =
If an Administrator enables the "Verify Authors' profiles" option on the *General Settings* page (Admin Dashboard > Settings>General Settings), a field labelled "Mastodon URL" will be added to users' profile pages (under "contact info").

When a valid URL has been saved, a tag containing a rel="me" link will be added to the metadata (between <head> elements) on the Author's archive page *only*. If a link to the Wordpress Author archive is added as one of that's user's profile metadata, the Mastodon instance will validate the ownership of the URL and add a green "verified" banner to the URL. As of v.2.0.0, the plugin will add a corresponding `fediverse:creator` meta tag.

= Plugin Development =
*Simple Mastodon Verification* development is managed on GitHub, with official releases published on WordPress.org. The GitHub repo can be found at https://github.com/mckinnon/simple-mastodon-verification.

== Installation ==
Install the plugin from the Wordpress store and enable in the Plugin menu. Configure on the General Settings page, then on User profile pages.

*Note for Wordpress.com users*
1. Installing this plugin on WordPress.com requires a paid subscription.
2. Configuring and enabling this plugin requires entering 'Classic View' from the dashboard Screen (top right). The 'Default View' is Auttomatic's in-house UI and is not compatible with many WordPress plugin APIs.

== Changelog ==
Project maintained on GitHub at https://github.com/mckinnon/simple-mastodon-verification

= 2.0.0 =
* Add support for fediverse:creator meta tag

= 1.1.3 =
* Improve I18N Issue

= 1.1.2 =
* Remove closing PHP tag

= 1.1.1 =
* Site-wide Mastodon URL restricted to https to match changes to Mastodon v4.0.

= 1.1.0 =
* Added support for users to verify using Author's page

= 1.0.2 =
* Initial commit to Wordpress plugin store

== Upgrade Notice ==
= 2.0.0 =
Add support for fediverse:creator meta tag

= 1.1.0 =
Adds support for validation of site users' Mastodon accounts.

= 1.0.2 =
Initial commit to Wordpress plugin store.