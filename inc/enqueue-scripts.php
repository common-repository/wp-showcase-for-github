<?php

/**
 * WP color picker
 */
function ghp_admin_scripts_load( $hook ) {
	if( $hook != 'toplevel_page_ghp-options' ) {
		return;
	}
	wp_enqueue_style( 'wp-color-picker' );
	wp_enqueue_script( 'ghp-admin-js', GHP_PLUGIN_DIR."/assets/admin/js/ghp-admin.js", array( 'wp-color-picker' ), '1.0.0', true );
}
add_action( 'admin_enqueue_scripts', 'ghp_admin_scripts_load' );