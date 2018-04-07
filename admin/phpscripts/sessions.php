<?php
	//waiting for the $_SESSIONS to fire up
	session_start();

	// we want to lock down this page, ex. when you copy and past the url into a a new page it wont work, you must go through the log in process
	function confirm_logged_in() {
		// if this is not set, run redirect to admin log in page
		if(!isset($_SESSION['user_id'])) {
			redirect_to("admin_login.php");
		}else{

		}
	}

	function logged_out() {
		session_destroy(); //terminate any existing sessions
		redirect_to("../admin_login.php"); //send back to the login, consider what file is calling the function when redirecting
	}

?>