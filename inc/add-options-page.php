<?php
/**
 * Add options page for ghp plugin
 */
function ghp_add_options_page() {
	add_menu_page(
		__( 'Github Project', 'wp-showcase-for-github' ),
		__( 'Github Projects', 'wp-showcase-for-github' ),
		'manage_options',
		'ghp-options',
		'ghp_options_content',
		GHP_PLUGIN_DIR . 'assets/admin/img/github.png',
		7
	 );

	add_submenu_page( 
		 'ghp-options', 
		 __( 'Projects Settings', 'wp-showcase-for-github' ),
		 __( 'Projects Settings', 'wp-showcase-for-github' ),
		 'manage_options', 
		 'ghp-options'
	);

	add_submenu_page( 
		 'ghp-options', 
		 __( 'Update Repositories', 'wp-showcase-for-github' ),
		 __( 'Update Repositories', 'wp-showcase-for-github' ),
		 'manage_options', 
		 'ghp-update-repos',
		 'ghp_update_projects_callback'
	);
}
add_action( 'admin_menu', 'ghp_add_options_page' );

