<?php
/**
 * Customise Admin Menu Visibility and Labels.
 *
 * @package CustomAdminMenu
 */

$current_user_id = get_current_user_id();

add_action(
	'admin_menu',
	function() {
		$current_user_id = get_current_user_id();

		// Exclude user with ID 1.
		if ( 1 !== $current_user_id ) {
			// Remove specified top-level menus.
			remove_menu_page( 'plugins.php' );
			remove_menu_page( 'tools.php' );
			remove_menu_page( 'options-general.php' );
			remove_menu_page( 'edit.php?post_type=acf-field-group' );
			remove_menu_page( 'edit.php?post_type=soliloquy' );

			// Remove 'update-core' submenu under 'Dashboard'.
			remove_submenu_page( 'index.php', 'update-core.php' );

			// Remove and rename sub-menus under 'Users'.
			remove_submenu_page( 'users.php', 'users.php' );
			remove_submenu_page( 'users.php', 'user-new.php' );

			global $menu;
			$menu[70][0] = 'Profile';  // Rename 'Users' to 'Profile'.
			$menu[70][2] = 'profile.php';  // Set default submenu item to 'Profile'.

			// Remove and rename sub-menus under 'Appearance'.
			global $submenu;
			if ( isset( $submenu['themes.php'] ) ) {
				foreach ( $submenu['themes.php'] as $index => $submenu_item ) {
					if ( 'nav-menus.php' !== $submenu_item[2] ) {
						remove_submenu_page( 'themes.php', $submenu_item[2] );
					}
				}
			}
			$menu[60][0] = 'Menu';  // Rename 'Appearance' to 'Menu'.
			$menu[60][2] = 'nav-menus.php';  // Set default submenu item to 'Menus'.
		}
	},
	999
);

/**
 * Hide specific sections on admin screens.
 *
 * This function hides certain sections on the WordPress admin user profile and menu screens.
 */
function mb_hide_profile_sections() {
	$screen          = get_current_screen();
	$current_user_id = get_current_user_id();

		// Exclude user with ID 1.
	if ( 1 !== $current_user_id ) {

		// Hide sections on 'profile' and 'user-edit' screens.
		if ( 'profile' === $screen->id || 'user-edit' === $screen->id ) {
			echo '<style>
				#your-profile table.form-table:nth-of-type(2),
				#your-profile h2:nth-of-type(2),
				#your-profile table.form-table:nth-of-type(4),
				#your-profile h2:nth-of-type(4),
				#your-profile table.form-table:nth-of-type(6),
				#your-profile h2:nth-of-type(6),
				#your-profile table.form-table:nth-of-type(7),
				#your-profile div.application-passwords,
				tr.user-url-wrap,
				#titlediv
				{
					display: none;
				}
		</style>';
		}

		// Hide sections on 'themes' and 'nav-menus' screens.
		if ( 'themes' === $screen->id || 'nav-menus' === $screen->id ) {
			echo '<style>
			.nav-tab-wrapper, 
			.manage-menus, 
			#nav-menu-header, 
			.menu-theme-locations, 
			.hide-if-no-customize
					{
						display: none;
					}
		</style>';
		}
	}
}
add_action( 'admin_head', 'mb_hide_profile_sections' );
