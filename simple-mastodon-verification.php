<?php
/**
 * Plugin Name: Simple Mastodon Verification
 * Plugin URI: https://github.com/mckinnon/simple-mastodon-verification
 * Description: Provides and Admin menu option to define a rel="me" in metatags
 * Version: 1.0.0
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

// https://developer.wordpress.org/reference/functions/register_activation_hook/
//register_activation_hook( __FILE__, 'smverifcation_function_to_run' );

// https://developer.wordpress.org/reference/functions/register_deactivation_hook/
//register_deactivation_hook( __FILE__, 'smverifcation_function_to_run' );

function smverification_register_fields() {
    register_setting('general', 'mastodon_site_url', 'esc_attr');
    add_settings_field('mastodon_site_url', '<label for="mastodon_site_url">'.__('Verify Mastodon URL' , 'mastodon_site_url' ).'</label>' , 'smverification_print_field', 'general');
}

add_filter('admin_init', 'smverification_register_fields');

function smverification_print_field() {
    $value = get_option( 'mastodon_site_url', '' );
	#input validation $pattern should accept any valid URL, http or https, up to two sub-domains (https://subsubsub.subsub.sub.domain.tld/@user)
	$pattern = 'http(s?)(:\/\/)(([a-zA-z0-9\-_]+(\.))?)(([a-zA-z0-9\-_]+(\.))?)(([a-zA-z0-9\-_]+(\.))?)([a-zA-z0-9\-_]+)(\.)([a-zA-z0-9\-_]+)(\/)(@)([a-zA-z0-9\-_.]+)';
    echo '<input type="url" id="mastodon_site_url" name="mastodon_site_url" value="' . $value . '" pattern="'. $pattern .'" />';
}

/*
 * Add tag to <head>
 */
function mastodon_verification_meta_link() {

   // Check is we are in author archive
   // https://developer.wordpress.org/reference/functions/is_author/
   if (!empty('mastodon_site_url') ) {
       // get_queried_object() returns current author in author's arvhives
       // https://developer.wordpress.org/reference/classes/wp_query/get_queried_object/
       //$author = ;

       // Generate meta description
       $mastodon_verification_url = get_option('mastodon_site_url','');
	   //sprintf( __( 'All posts by author %s', 'cyb-textdomain' ), $author->display_name );

       // Print description meta tag
       echo '<link rel="me" href="' . esc_attr( $mastodon_verification_url ) . '">'."\n\n";
   }
}
add_action( 'wp_head', 'mastodon_verification_meta_link', 5);
?>