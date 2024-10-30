<?php
		/*
		Plugin Name: Booking Calendar Autofill
		Plugin URI: http://www.stuartathompson.com
		Description: This plugin works with the Booking Calendar plugin and autofills fields, like "First Name," "Last Name," "Email" and "Phone Number" according to the user who's currently logged in. 
		Author: Stuart A. Thompson
		Version: 1.0
		Author URI: http://www.stuartathompson.com
		*/
?>
<?php
// Echo Me function for admin pages
function auto_fill_me(){
	global $current_user;
    get_currentuserinfo();
		echo '<script type="text/javascript">';
		echo "var userFirstName = '" . $current_user->user_firstname . "';";
		echo "var userEmail = '" . $current_user->user_email . "';";
		echo "var userLastName = '" . $current_user->user_lastname . "';";
		echo "var userPhone = '" . $current_user->phone . "';";
		echo '</script>';
	?>
	<script type="text/javascript">
		jQuery(function ($jx) {
			/* You can safely use $ in this code block to reference jQuery */
			$jx(document).ready(function() { 
				$jx(".name1 input").val(userFirstName);
				$jx(".secondname1 input").val(userLastName);
				$jx(".email1 input").val(userEmail);
				$jx(".phone1 input").val(userPhone);
			});
		});
	</script>
<?php
}
//Echo out some content on admin pages
add_action('admin_head', 'auto_fill_me'); 
add_action('wp_head', 'auto_fill_me'); 
?>