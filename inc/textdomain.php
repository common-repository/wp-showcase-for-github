<?php
/**
 * Load plugin textdomain
 */
function ghp_load_plugin_textdomain() {
	load_plugin_textdomain( 'wp-showcase-for-github', false, dirname(__FILE__)."languages/" );
}
add_action( 'plugins_loaded', 'ghp_load_plugin_textdomain' );