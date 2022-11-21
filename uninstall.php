<?php
/**
 * Uninstall.
 */

// If uninstall not called from WordPress, then exit.
if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {
	exit;
}

function smverification_delete_user_contact_methods( $smverification_contact_methods ) {
    // Remove user contact methods
	unset( $smverification_contact_methods['mastodon'] );
}
smverification_delete_user_contact_methods();

delete_option( 'smverification_site_url' );
delete_option( 'smverification_allow_authors' );