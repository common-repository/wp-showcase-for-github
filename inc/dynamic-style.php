<?php
/**
 * Dynamic stylesheet from the plugin settings
 */
function ghp_dynamic_stylesheet() {

    global $ghp_options;
    
    wp_enqueue_style( 'ghp-main-css', GHP_PLUGIN_DIR."/assets/public/css/ghp-style.css" );
    
	$custom_css = "
        .single-repo-item {
            background: {$ghp_options['single_project_bg']};
            border-radius: {$ghp_options['single_project_br']}px;
        }
        h3.repo-title {
            color: {$ghp_options['single_project_title']};
            font-size: {$ghp_options['single_project_title_fs']}px;
        }
	";
	wp_add_inline_style( 'ghp-main-css', $custom_css );
}
add_action( 'wp_enqueue_scripts', 'ghp_dynamic_stylesheet' );