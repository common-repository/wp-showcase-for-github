<?php
/**
 * Plugin Name: WP Showcase for Github
 * Plugin URI: https://galibweb.com/plugins/wp-showcase-for-github/
 * Description: Display your github Projects on your website via shortcode.
 * Version: 1.0.0
 * Author: Galib
 * Author URI: https://galibweb.com
 * License: GPLv2 or later
 * Text Domain: wp-showcase-for-github
 * Domain Path: /languages/
 */

/**
 * Exit if accessed directly
 */
if ( !function_exists( 'add_action' ) ) {
	exit;
}

/**
 * Define Constants
 */
define( 'GHP_PLUGIN_DIR', plugin_dir_url(__FILE__) );

/**
 * Plugin Activatio Function
 *
 * @return void
 */
function ghp_plugin_activation() {
	ghp_create_github_post_type();
	flush_rewrite_rules();
}
register_activation_hook( __FILE__, 'ghp_plugin_activation' );

/**
 * Plugin Deactivation Function
 *
 * @return void
 */
function ghp_plugin_deactivation() {
	ghp_delete_all_repos();
}
register_deactivation_hook( __FILE__, 'ghp_plugin_deactivation' );

/**
 * Global Variables
 */
$ghp_options = get_option( 'ghp_settings', array(
	'author_name' 			=> 'Galibri',
	'projects_per_row' 		=> 3,
	'number_of_projects' 	=> 6,
	'single_project_bg' 	=> '#ffffff',
	'single_project_title' 	=> '#c60021',
	'single_project_title_fs' 	=> 20,
	'single_project_br' 	=> 25,
) );


/** 
 * Require Plugin Files
 */
$files_list = [
	'posts/register-github-posts.php',
	'inc/textdomain.php',
	'inc/add-options-page.php',
	'inc/options-page.php',
	'inc/save-options.php',
	'inc/enqueue-scripts.php',
	'inc/dynamic-style.php',
	'template/shortcode-github-projects.php',
	'posts/insert-post.php',
];

foreach($files_list as $file) {
	require_once($file);
}

/**
 * Plugin Action Link
 */
function ghp_add_action_links( $links ) {
	$settings = __( 'Settings', 'wp-showcase-for-github' );
	$mylinks = array( '<a href="' . admin_url( 'options-general.php?page=ghp-options' ) . '">'.$settings.'</a>' );
	return array_merge( $links, $mylinks );
}
add_filter( 'plugin_action_links_' . plugin_basename(__FILE__), 'ghp_add_action_links' );