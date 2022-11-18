<?php
/**
 * Plugin Name: Simple Mastodon Verification
 * Plugin URI: https://github.com/mckinnon/simple-mastodon-verification
 * Description: Provides an General Settings menu option to define a rel="me" in metatags. See your Mastodon user profile for further instructions.
 * Version: 1.0.1
 * Author: Jay McKinnon
 * Author URI: http://opendna.com/
 * Text Domain: simple-mastodon-verification
 * License: GPL-2.0+
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 * Domain Path: /languages
 * GitHub Plugin URI: https://github.com/mckinnon/simple-mastodon-verification
 *
 * 
 * Simple Mastodon Verification is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 2 of the License, or
 * any later version.
 * 
 * Simple Mastodon Verification is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 * 
 * You should have received a copy of the GNU General Public License
 * along with Simple Mastodon Verification. If not, see http://www.gnu.org/licenses/gpl-2.0.txt.
 */

defined( 'ABSPATH' ) || exit;

function smverification_register_fields() {
    register_setting('general', 'smverification_site_url', 'esc_attr');
    add_settings_field('smverification_site_url', '<label for="smverification_site_url">'.__('Verify Mastodon profile' , 'smverification_site_url' ).'</label>' , 'smverification_print_field', 'general');
}

add_filter('admin_init', 'smverification_register_fields');

function smverification_print_field() {
    $value = get_option( 'smverification_site_url', '' );
	// input validation $pattern should accept any valid URL, http or https, up to two sub-domains (https://subsubsub.subsub.sub.domain.tld/@user)
	$pattern = 'http(s?)(:\/\/)(([a-zA-z0-9\-_]+(\.))?)(([a-zA-z0-9\-_]+(\.))?)(([a-zA-z0-9\-_]+(\.))?)([a-zA-z0-9\-_]+)(\.)([a-zA-z0-9\-_]+)(\/)(@)([a-zA-z0-9\-_.]+)';
    // defines input field
    echo '<input type="url" id="smverification_site_url" name="smverification_site_url" value="' . esc_url($value) . '" pattern="'. esc_attr($pattern) .'" title="Mastodon profile URL must be in the form of https://domain.tld/@user" placeholder="https://mastodon.social/@user" style="width:30em;"/>';
}

function smverification_input_css() {
    // adds admin CSS for input validation
    echo '<style>input#smverification_site_url:invalid {outline: 2px solid #ff0000};}</style>' . "\n\n";
}
add_action( 'admin_head', 'smverification_input_css', 500);

/*
 * Add tag to <head>
 */
function smverification_verification_meta_link() {
   if (!empty('smverification_site_url') ) {
       // Generate meta description
       $smverification_verification_url = get_option('smverification_site_url','');

       // Print description meta tag
       echo '<link rel="me" href="' . esc_url( $smverification_verification_url ) . '">'."\n\n";
   }
}
add_action( 'wp_head', 'smverification_verification_meta_link', 5);

?>