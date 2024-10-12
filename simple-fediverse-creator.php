<?php
/**
 * Plugin Name: Simple fediverse:creator
 * Plugin URI: https://wordpress.org/plugins/simple-fediverse-creator/
 * Description: Provides a General Settings menu option to define a \"fediverse:creator\" in metatags for the whole site and also individual contributors.
 * Version: 2.0.1
 * Author: Jay McKinnon
 * Author URI: http://opendna.com/
 * License: GPL-2.0+
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain: simple-fediverse-creator
 * GitHub Plugin URI: https://github.com/mckinnon/simple-fediverse-creator
 *
 * 
 * Simple fediverse:creator is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 2 of the License, or
 * any later version.
 * 
 * Simple fediverse:creator is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 * 
 * You should have received a copy of the GNU General Public License
 * along with Simple fediverse:creator. If not, see http://www.gnu.org/licenses/gpl-2.0.txt.
 */

defined( 'ABSPATH' ) || exit;

function simplefediversecreator_register_fields() {
    register_setting('general', 'simplefediversecreator_username', 'string'); //'esc_attr'
    register_setting('general', 'simplefediversecreator_allow_authors', 'string');

    add_settings_field('simplefediversecreator_username', '<label for="simplefediversecreator_username">'.__('Site fediverse:creator' , 'simple-fediverse-creator' ).'</label>' , 'simplefediversecreator_print_field', 'general');
    add_settings_field('simplefediversecreator_allow_authors', '<label for="simplefediversecreator_allow_authors">'.__("Enable Authors' fediverse:creator" , 'simple-fediverse-creator' ).'</label>' , 'simplefediversecreator_print_authors_field', 'general');
}

add_filter('admin_init', 'simplefediversecreator_register_fields');

function simplefediversecreator_print_field() {
    $value = get_option( 'simplefediversecreator_username', '' );
	// input validation $pattern should accept any valid username up to two sub-domains (user@subsubsub.subsub.sub.domain.tld).
	$pattern = '([a-zA-z0-9\-_.]+)(@)(([a-zA-z0-9\-_]+(\.))?)(([a-zA-z0-9\-_]+(\.))?)(([a-zA-z0-9\-_]+(\.))?)([a-zA-z0-9\-_]+)(\.)([a-zA-z0-9\-_]+)';
    // defines input field
    echo '<input type="url" id="simplefediversecreator_username" name="simplefediversecreator_username" value="' . esc_url($value) . '" pattern="'. esc_attr($pattern) .'" title="' . __( 'fediverse:creator Mastodon username must be in the form of user@domain.tld', 'simple-fediverse-creator' ) .'" placeholder="user@mastodon.social" style="width:30em;"/>';
}

function simplefediversecreator_input_css() {
    // adds admin CSS for input validation
    echo '<style>input#simplefediversecreator_username:invalid {outline: 2px solid #ff0000};}</style>' . "\n\n";
}
add_action( 'admin_head', 'simplefediversecreator_input_css', 500);

function simplefediversecreator_print_authors_field() {
    // allows admin to toggle Authors' fediverse:creator fields
    $value = get_option( 'simplefediversecreator_allow_authors', '' );
    if ( $value !== "YES" ) {
        $value = NULL;
    }
    echo '<input type="url" id="simplefediversecreator_allow_authors" name="simplefediversecreator_allow_authors" value="' . esc_attr($value) . '" title="undefined" style="width:6em;" placeholder="YES" /> ' . __('type "YES" to enable this feature', 'simple-fediverse-creator' );
}

// Add tag to <head>
function simplefediversecreator_verification_meta_link() {
    // Generate meta description for Mastodon username for site or Authors
    if (!empty( 'simplefediversecreator_username' ) && !is_author()) {
       $simplefediversecreator_username = get_option( 'simplefediversecreator_username','');
    } else if (!empty( 'simplefediversecreator_allow_authors' ) && is_author()) {
        $simplefediversecreator_username = get_the_author_meta( 'fediversecreator' );
    }
    if (!empty( $simplefediversecreator_username )) {
        $simplefediversecreator_verification_id = explode("/", $simplefediversecreator_username);
        echo '<meta property="fediverse:creator" name="fediverse:creator" content="' . esc_url( $simplefediversecreator_username ) . '"/>' . "\n";
    }
}
add_action( 'wp_head', 'simplefediversecreator_verification_meta_link');

function simplefediversecreator_modify_user_contact_methods( $simplefediversecreator_contact_methods ) {
    // Add user contact methods
    $simplefediversecreator_contact_methods['fediversecreator']   = __( 'fediverse:creator username', 'simple-fediverse-creator' );
    return $simplefediversecreator_contact_methods;
}

function simplefediversecreator_authors_option() {
    $value = get_option( 'simplefediversecreator_allow_authors', '' );
    if ( $value == "YES" ) {
        add_filter( 'user_contactmethods', 'simplefediversecreator_modify_user_contact_methods', 1);
     }
}
simplefediversecreator_authors_option();
