<?php
/*
Plugin Name: Multisite User Management
Plugin URI: http://github.com/thenbrent/multisite-user-management
Description: Running a WordPress in MultiSite mode? You no longer need to manually add new users to each of your sites. 
Author: Brent Shepherd
Version: 0.1
*/

// When a user activates their account, allocate them the default role set for each site
function msum_activate_user( $user_id ){

	$dashboard_blog = get_site_option( 'dashboard_blog' );

	foreach( get_blog_list( 0, 'all' ) as $key => $blog ) { 

		if( $blog[ 'blog_id' ] == $dashboard_blog || is_user_member_of_blog( $user_id, $blog[ 'blog_id' ] ) )
			continue;

		switch_to_blog( $blog[ 'blog_id' ] );

		$role = get_option( 'msum_default_user_role', 'none' ); // if no default set, use 'none'

		if( $role != 'none' )
			add_user_to_blog( $blog[ 'blog_id' ], $user_id, $role );

		restore_current_blog();
	}
}
add_action( 'wpmu_activate_user', 'msum_activate_user', 10, 1 );


// For users activating both a blog and an account
function msum_activate_blog_user( $blog_id, $user_id ){
	msum_activate_user( $user_id, $blog_id );
}
add_action( 'wpmu_activate_blog', 'msum_activate_blog_user', 10, 2 );


// Role assignment selection boxes on the 'Site Admin | Options' page
function msum_options(){ ?>

	<h3><?php _e( 'MultiSite User Management', 'msum' ); ?></h3>
	
	<?php 
	if( basename( dirname( __FILE__ ) ) != 'mu-plugins' ) {
		echo '<p><b>';
		printf( __('Whoops, it appears %s is not located in <em>/wp-content/mu-plugins/</em>', 'msum' ), '<em>' . basename( __FILE__ ) . '</em>' );
		echo '</b></p>';
		echo '<p>';
		printf( __( 'It is currently located in %s. Please move it to <em>/wp-content/mu-plugins/</em> for this plugin to work correctly.', 'msum' ), '<em>' . dirname( __FILE__ ) . '</em>' );
		echo '</p>';
		return;
	}

	$dashboard_blog = get_site_option( 'dashboard_blog' );
	$blogs = get_blog_list( 0, 'all' ); 

	if( empty( $blogs ) ) {
		echo '<p><b>' . __( 'No public, safe sites available.', 'msum' ) . '</b></p>';
	} else {
		echo '<p>' . __( 'Select the default role for each of your sites.', 'msum' ) . '</p>';
		echo '<p>' . __( 'New users will receive these roles when activating their account. Existing users will receive these roles only if they have the current default role or no role at all for each particular site.', 'msum' ) . '</p>';
		echo '<table class="form-table">';
		foreach( $blogs as $key => $blog ) { 
			if( $blog[ 'blog_id' ] == $dashboard_blog )
				continue;
			switch_to_blog( $blog[ 'blog_id' ] );
			?>
			<tr valign="top">
				<th scope="row"><?php echo get_bloginfo( 'name' ); ?></th>
				<td>
					<select name="msum_default_user_role[<?php echo $blog[ 'blog_id' ]; ?>]" id="msum_default_user_role[<?php echo $blog[ 'blog_id' ]; ?>]">
						<option value="none"><?php _e( '-- None --', 'msum' )?></option>
						<?php wp_dropdown_roles( get_option( 'msum_default_user_role' ) ); ?>
					</select>
				</td> 
			</tr>
		<?php restore_current_blog();
		}
		echo '</table>';
	}
		echo '<p>' . __( '<b>Note:</b> only public, non-mature and non-dashboard sites appear here. Set the default role for the dashboard site above under <b>Dashboard Settings</b>.', 'msum' ) . '</p>';
}
add_action('wpmu_options', 'msum_options');


// Update Default Roles on submission of the multisite options page
function msum_options_update(){
	global $wpdb;

	foreach( $_POST[ 'msum_default_user_role' ] as $blog_id => $new_role ) { 
		switch_to_blog( $blog_id );
		$old_role = get_option( 'msum_default_user_role', 'none' ); // default to none

		if( $old_role == $new_role )
			continue;

		$blog_users = msum_get_users_with_role( $old_role );
		foreach( $blog_users as $blog_user ) {
			if( $old_role != 'none' )
				remove_user_from_blog( $blog_user, $blog_id );
			if( $new_role != 'none' )
				add_user_to_blog( $blog_id, $blog_user, $new_role );
		}
		update_option( 'msum_default_user_role', $new_role );
		restore_current_blog();
	}
}
add_action( 'update_wpmu_options', 'msum_options_update' );

function msum_get_users_with_role( $role ) {
	global $wpdb;


	if( $role != 'none' ) {
			$sql = $wpdb->prepare( "SELECT DISTINCT($wpdb->users.ID) FROM $wpdb->users 
							INNER JOIN $wpdb->usermeta ON $wpdb->users.ID = $wpdb->usermeta.user_id
							WHERE $wpdb->usermeta.meta_key = '{$wpdb->prefix}capabilities' 
							AND $wpdb->usermeta.meta_value LIKE %s", '%' . $role . '%' );

	} else { // get users with 
		$sql .= "SELECT DISTINCT($wpdb->users.ID) FROM $wpdb->users $wpdb->users.ID 
				 WHERE $wpdb->users.ID NOT IN (
					SELECT $wpdb->usermeta.user_id FROM $wpdb->usermeta
					WHERE $wpdb->usermeta.meta_key = '{$wpdb->prefix}capabilities' 
					)";
	}

	$users = $wpdb->get_col( $sql );

	if( $role == 'none' ) { // if we got all users without a capability for the site, that will include super admins, so remove them
		$super_users = get_super_admins();

		foreach( $users as $key => $user ){ //never modify caps for super admins
			if( is_super_admin( $user ) )
				unset( $users[$key] );
		}
	}

	return $users;
}

// Clean up when plugin is deleted
function msum_uninstall(){
	foreach( get_blog_list( 0, 'all' ) as $key => $blog ) { 
		switch_to_blog( $blog[ 'blog_id' ] );
		delete_option( 'msum_default_user_role', $role );
		restore_current_blog();
	}
}
register_uninstall_hook( __FILE__, 'msum_uninstall' );
