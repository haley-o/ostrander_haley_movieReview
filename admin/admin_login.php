<?php

	// THIS IS FOR WHEN YOU ARE USING A MAC
	// ini_set('display_errors', 1);
	// erroe_reporting(E_ALL);

	require_once('phpscripts/config.php');

	// making a server call to the remote address 
	$ip = $_SERVER['REMOTE_ADDR'];

	// echo $ip;
	//  this is was is checked after the user has clicked submit
	if(isset($_POST['submit'])){
		//trim removes any space between letters
		$username = trim($_POST['username']);
		$password = trim($_POST['password']);

		//check to see if the username and password were filled out and are not empty strings, not one or the other it is both
		// !== means not identical, if it is not exactly equal to it will show the error message
		if($username !== "" && $password !== ""){
			// echo "you can type ;)";
			$result = logIn($username, $password, $ip);
			$message = $result;
			// countLogins($id);
		}else{
			$message = "Please fill in the required fields";
			// echo $message;
		}


		// This is no longer working please ignore will fix later
		// this isn't right but it's working (sort of)

		// $user = "root";
		// $pass = "";
		// $url = "localhost";
		// $db = "db_movies";

		// $link = mysqli_connect($url, $user, $pass, $db); 
		
		// /* check connection */ 	
		// if(mysqli_connect_errno()) {
		// 	printf("Connect failed: %s\n", mysqli_connect_error());
		// 	exit();
		// }

		// // creating a query to get our table and set the user attempts to add 1 everyime the user attempts to log in
		//  // $loginAttempts = "UPDATE `tbl_user` SET `user_attempts` = user_attempts + 1 WHERE user_id = {$id}";
		// // echo $loginAttempts;


		// // this is running our login number
		// if(mysqli_multi_query($link, $loginAttempts)){
	 //    // echo "woo it works";
		// } else {
		//     echo "Boo you broke it" . mysqli_error($link);
		// }

		// mysqli_close($link);

	}

?>


<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>CMS Portal Login</title>
<link href="../css/main.css" rel="stylesheet" type="text/css" media="screen">
<link href="../css/reset.css" rel="stylesheet" type="text/css" media="screen">
</head>
<body>

<div id="login-page">
	<div class="login-con">
		<h1 id="login-title">Welcome Human from Planet Earth</h1>
		<p id="tagline">please enter your identification <br> (username: h_ostrander password: password)</p>
		<?php if(!empty($message)){echo $message;} ?>

		<form action="admin_login.php" method="post">
			<label><h2>Username:</h2></label>
			<input class="login-input" type="text" name="username" value="">
			<br>
			<label><h2>Password:</h2></label>
			<input class="login-input" type="text" name="password" value="">
			<br>
			<!-- user clicks submit, then then php checks through the information -->
			<input class="submit-bttn" type="submit" name="submit" value="Beam Me Up Scotty">

			<a id="createuser" href="admin_createuser.php">Create a New User</a>

		</form>
	</div>	
</div>

</body>
</html>	