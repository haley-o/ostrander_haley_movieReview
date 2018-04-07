<?php 

	// ** Create User ** //


	function createUser($fname, $username, $password, $email, $userlvl) {
		include('connect.php');
		$userString = "INSERT INTO tbl_user VALUES(NULL, '{$fname}', '{$username}', '{$password}', '{$email}', CURRENT_TIMESTAMP, '{$userlvl}', 'no', 0, 0, 0)";

		echo $userString;

		$userQuery = mysqli_query($link, $userString);
		// echo $userQuery;
		if($userQuery) {
			echo 'hello';
			redirect_to("admin_index.php");
		}else{
			echo 'yoyo';
			$message = "There was a problem setting up this user";
			return $message;
		}


		mysqli_close($link);
	}

	// ** Generate random password ** //

	//Generating a random password for new users
	function randomPassword()  { //the length of this password will be the length of 5 characters
    $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789'; //the random 5 characters will be picked from this variable
    // $count = mb_strlen($chars); //this is getting the string length of our $chars variable
    $passGenerator = array(); // this is setting our password to an array
    $length = 5;


	// setting the initial value of i to 0. 
	// if i is less than the amount of characters in our array than the function runs once
	// after the function runs once we create an index variable to create a random integer
	// setting our passGenerator variable to equal a random selection from our characters but equal our length
    for ($i = 0; $i < 5; $i++) {
        $index = rand(0, $length - 1);//The rand() function generates a random integer.
        $passGenerator[] = $characters[$index];
    }

    // implode — Join array elements with a string
    return implode($passGenerator); //turn the array into a string

}

	// ** Send Email ** //

	// start by creating a function to send the email after the user has been created
	//similar to the above function, it is then called in the admin_create users.php
	function sendEmail($username, $password, $email) {
		// include('connect.php');
	    $to = $email; // sending the email to the email submitted
	    $subject = "Your username and password";
	    $body = "Username: " . $username . "\r\n"; //\r\n is an end of line characters for *Windows* 
	    $body .= "Password: " . randomPassword() . "\r\n";
	    $body .= "Login URL: http://localhost/admin/admin_login.php";
	    $headers = 'From: noreply@test.com' . "\r\n";

	//     mail($to, $subject, $body, $headers); //having issues sending mail() with my wamp, installed hMailServer to try to fix it but no luck
	}

	// ** Edit User ** //

	function editUser($id, $fname, $username, $password, $email) {
		INCLUDE('connect.php');

		$updatestring = "UPDATE tbl_user SET user_fname = '{$fname}', user_name = '{$username}', user_pass = '{$password}', user_email = '{$email}'  WHERE user_id = {$id}";
		// echo $updatestring; 

		$updatequery = mysqli_query($link, $updatestring);
		if($updatequery){ 
			redirect_to("admin_index.php");
		}else{
			$message = "There was a problem changing your information, please fix it.";
			return $message;
		}

		mysql_close($link);
	}

	function deleteUser($id) {
		// echo $id;
		include('connect.php');
		$delstring = "DELETE FROM tbl_user WHERE user_id = {$id}";
		$delquery = mysqli_query($link, $delstring);
		if($delquery){
			redirect_to("../admin_index.php");
		}else{
			$message = "Call security";
			return $message;
		}

		mysqli_close($link);
	}



	


?>