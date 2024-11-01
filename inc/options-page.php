<?php
/**
 * Add options page content/form
 */
function ghp_options_content() {
	global $ghp_options;
?>
<div class="wrap">
	<h1><?php _e( 'Github Projects Settings', 'wp-showcase-for-github' ); ?></h1>
	<form action="options.php" method="post">
		<?php settings_fields( 'ghp_settings_group' ); ?>
		<table class="form-table">
			<tbody>
				<tr>
					<th scope="row"><label for="ghp_settings[author_name]"><?php _e( 'Github Username', 'wp-showcase-for-github' ); ?></label></th>
					<td><input type="text" id="ghp_settings[author_name]" name="ghp_settings[author_name]" value="<?php echo $ghp_options['author_name']; ?>"></td>
				</tr>
				<tr>
					<th scope="row"><label for="ghp_settings[projects_per_row]"><?php _e( 'Projects Per Row', 'wp-showcase-for-github' ); ?></label></th>
					<td><select name="ghp_settings[projects_per_row]" id="ghp_settings[projects_per_row]">
						<option value="4" <?php echo $ghp_options['projects_per_row'] == 4 ? 'selected="selected"': ''; ?>>3 Columns</option>
						<option value="3" <?php echo $ghp_options['projects_per_row'] == 3 ? 'selected="selected"': ''; ?>>4 Columns</option>
					</select></td>
				</tr>
				<tr>
					<th scope="row"><label for="ghp_settings[number_of_projects]"><?php _e( 'Number of Projects to show', 'wp-showcase-for-github' ); ?></label></th>
					<td><input type="number" id="ghp_settings[number_of_projects]" name="ghp_settings[number_of_projects]" value="<?php echo $ghp_options['number_of_projects']; ?>"></td>
				</tr>
				<tr>
					<th scope="row"><label for="ghp_settings[single_project_bg]"><?php _e( 'Single Project Backgrund Color', 'wp-showcase-for-github' ); ?></label></th>
					<td><input type="text" class="color-field" id="ghp_settings[single_project_bg]" name="ghp_settings[single_project_bg]" value="<?php echo isset( $ghp_options['single_project_bg'] ) ? $ghp_options['single_project_bg'] : '#ffffff'; ?>" data-default-color="#ffffff"></td>
				</tr>
				<tr>
					<th scope="row"><label for="ghp_settings[single_project_title]"><?php _e( 'Project Title Color', 'wp-showcase-for-github' ); ?></label></th>
					<td><input type="text" class="color-field" id="ghp_settings[single_project_title]" name="ghp_settings[single_project_title]" value="<?php echo isset( $ghp_options['single_project_title'] ) ? $ghp_options['single_project_title'] : '#c60021'; ?>" data-default-color="#c60021"></td>
				</tr>
				<tr>
					<th scope="row"><label for="ghp_settings[single_project_title_fs]"><?php _e( 'Title Font Size', 'wp-showcase-for-github' ); ?></label></th>
					<td><input type="number" id="ghp_settings[single_project_title_fs]" name="ghp_settings[single_project_title_fs]" value="<?php echo $ghp_options['single_project_title_fs']; ?>">px</td>
				</tr>
				<tr>
					<th scope="row"><label for="ghp_settings[single_project_br]"><?php _e( 'Title Font Size', 'wp-showcase-for-github' ); ?></label></th>
					<td><input type="number" id="ghp_settings[single_project_br]" name="ghp_settings[single_project_br]" value="<?php echo $ghp_options['single_project_br']; ?>">px</td>
				</tr>
			</tbody>
		</table>
		<p class="submit"><input type="submit" class="button button-primary" id="submit" name="submit" value="<?php _e( 'Save Changes', 'wp-showcase-for-github' ); ?>"></p>
	</form>
</div>
<?php
}

function ghp_update_projects_callback() { ?>
	<h1><?php _e( 'Github repository update completed.', 'wp-showcase-for-github' ); ?></h1>
	<p><?php _e('GitHub Only allows 15 refresh per/day for free. So, please don\'t refresh more than 15 times in a day or this plugin will stop working.', 'wp-showcase-for-github') ?></p>
	<p><?php _e('If you face any issue, contact', 'wp-showcase-for-github') ?> <a href="https://galibweb.com/" target="_blank"><?php _e('here', 'wp-showcase-for-github') ?></a></p>

<?php }