<?php

	function logIn($username, $password, $ip) {
		require_once('connect.php');
		$username = mysqli_real_escape_string($link, $username);
		$password = mysqli_real_escape_string($link, $password);
		$loginstring = "SELECT * FROM tbl_user WHERE user_name = '{$username}' AND user_pass = '{$password}'";
		// echo $loginstring;
		$user_set = mysqli_query($link, $loginstring);

		if(mysqli_num_rows($user_set)){
			$found_user = mysqli_fetch_array($user_set, MYSQLI_ASSOC);
			$id = $found_user['user_id'];

			//session is safer, do not use cookies to transfer through pages
			$_SESSION['user_id'] = $id;
			$_SESSION['user_name'] = $found_user['user_fname']; 
			//checking if it came back positive, if yes then it runs an update on our database
			if(mysqli_query($link, $loginstring)) {
				$updatestring = "UPDATE tbl_user SET user_logins = user_logins + 1 WHERE user_id = {$id}"; //this is adding in our login amounts, when a user logs in
				$updatequery = mysqli_query($link, $updatestring, $lastLogin);
			}

			if ($found_user['user_logins'] > 0) { // if user_logins is greater than 0 send to the admin page
				redirect_to("admin_index.php");
			}

			else {
				redirect_to("admin_edituser.php"); //otherwise new users will be sent to edit their account on their first login
				ini_set('max_execution_time', 86400); //setting a timeout for new users, used 60 to test and it seems to work, currently set to last for a day
			}

		}

		else{
			$message = "Username and or password is incorrect.<br>Please make sure your cap locks is turned off.";
			return $message;
		}



		mysqli_close($link);
	}


?>