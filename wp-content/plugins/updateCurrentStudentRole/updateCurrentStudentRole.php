<?php
/*
*Plugin Name: updateCurrentStudentRole
*Plugin URL: N/A
*Description: Demonstrates accessing database
*Version: 0.000000001
*Author: Callum South
*/

add_shortcode('updateCurrentStudentRole','updateCurrentStudentRole');

function updateCurrentStudentRole() {
	global $wpdb;
	global $wp_roles;

	$current_user = wp_get_current_user();
	$displayname = $current_user->display_name ;

	$roles = $current_user->roles;
	$role = array_shift( $roles );

	if (!empty($_POST))
	{
		// implement switch
		if ($role == "unplaced_student")
			{$newRole = "placed_student";}
		else
			{$newRole = "unplaced_student";} ;

		$current_user->set_role($newRole);

		$roles = $current_user->roles;
		$role = array_shift( $roles);

	}
	echo "$displayname, you are currently registered as $role" ;
	if ($role == "administrator")
	{
		echo "You are currently logged on as an administrator" ;
		echo "<p> If you were to change this account away from 'admin' you might not be able to log back in to the system!" ;
		echo "<p>" ;
		echo "Please log in using student credentials, and try again" ;
		return ;
	}
	echo "<p/>" ;
	echo "Do you want to switch this?" ;

	echo "<form method='post'> ";
	echo "<input type='submit' value='Change role'>" ;
	echo "<input type='hidden' name='hidden' value='any'>" ;
	echo "</form?" ;
}

?>