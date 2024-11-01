<?php
/**
 * Save/Register Settings to options table
 */
function ghp_save_settings_optoins() {
	register_setting( 'ghp_settings_group', 'ghp_settings' );
}
add_action( 'admin_init', 'ghp_save_settings_optoins' );