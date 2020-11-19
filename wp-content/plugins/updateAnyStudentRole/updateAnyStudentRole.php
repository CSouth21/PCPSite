<?php
/*
*Plugin Name: updateAnyStudentRole
*Plugin URL: N/A
*Description: Demonstrates accessing database
*Version: 0.000000001
*Author: Callum South
*/

add_shortcode('updateAnyStudentRole','updateAnyStudentRole');

function updateAnyStudentRole() {
	global $wpdb;
	global $wp_roles;

	$current_user = wp_get_current_user();
	$displayname = $current_user->display_name ;

	$roles = $current_user->roles;
	$role = array_shift( $roles );

	if (!empty($_POST))
	{
		$user_id = $_POST['user_id'];
		$sql = "select display_name, user_id, meta_key, meta_value from wp_users, wp_usermeta where meta_key = 'wp_capabilities' and wp_users.ID = wp_usermeta.user_id and wp_users.ID = $user_id" ;

		$results = $wpdb->get_row ($sql) ;
		$arr = unserialize($results->meta_value) ;
		$role = array_keys($arr)[0] ;

		if ($role == "unplaced_student")
			{$newRole = "placed_student";}
		else
			{$newRole = "unplaced_student";};

		$serialised = serialize( array( "$newRole" => true ) ) ;
		$sql = "update wp_usermeta set meta_value = '" . $serialised . "'where meta_key = 'wp_capabilities' and user_id = " . $user_id ;
		$results = $wpdb->query($sql) ;
	}

	if (!$role == "administrator")
	{
		echo "You are not currently logged on as an administrator" ;
		echo " <p> To use this function please log in using admin credentials, and try again" ;
		echo "<p>" ;
		echo "Thanks" ;
		return ;
	}

	$results = $wpdb->get_results("Select user_id, display_name, meta_key, meta_value from wp_users, wp_usermeta where wp_users.id = wp_usermeta.user_id and meta_key = 'wp_capabilities' and meta_value like '%student%' ");

	echo "<table>" ;
	echo "<tr>" ;
	echo "<td>user_id</td>" ;
	echo "<td>Name</td>" ;
	echo "<td>Role</td>" ;
	echo "</tr>" ;

	foreach ($results as $record )
	{
		echo "<tr>";
		echo "<td>";
		echo $record->user_id ;
		echo "</td>";
		echo "<td>";
		echo $record->display_name ;
		echo "<td>";
		$arr = unserialize($record->meta_value) ;
		echo array_keys($arr)[0] ;
		echo "</td>";
		echo "</tr>" ;
	} ;
	echo "</table>" ;

	echo "<form method='post'> ";
	echo "Enter a user_id <input type='text' name='user_id' value='". $_POST['user_id'] ."'>" ;
	echo "<input type='submit' value='Change role'>" ;
	echo "</form?" ;
}

?>