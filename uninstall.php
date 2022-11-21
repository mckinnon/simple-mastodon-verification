<?php
/**
 * Uninstall.
 */

// If uninstall not called from WordPress, then exit.
if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {
	exit;
}

delete_option( 'smverification_site_url' );
delete_option( 'smverification_allow_authors' );