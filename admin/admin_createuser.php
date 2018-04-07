<?php

	// THIS IS FOR WHEN YOU ARE USING A MAC
	// ini_set('display_errors', 1);
	// erroe_reporting(E_ALL);


	require_once('phpscripts/config.php');
	// confirm_logged_in();
	if(isset($_POST['submit'])) {
		$fname = trim($_POST['fname']);
		$username = trim($_POST['username']);
		$password = randomPassword(); //this is submitting our new random password!
		$email = trim($_POST['email']);
		$userlvl = $_POST['userlvl'];
    
		if(empty($userlvl)){
			$message = "Please select a user level.";
		}else{
			createUser($fname, $username, $password, $email, $userlvl);
			sendEmail($username, $password, $email); // sending our email when form is succesfully filled
			//according to the internet when using wamp I am unable to actually send emails because my site is not live, tried a few different things but nothing worked so I was not actually able to test my email, tested it with an echo and the username, randomly generated password and url were echoed back when the createUser is commented out (seems to work??)
	}
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

<div class="createuser-page">
	<div class="createuser-contentCon">
		<h1 id="createuser-title">Welcome human, create yourself</h1>

		<?php if(!empty($message)){echo $message;} ?>
		<form action="admin_createuser.php" method="post">
			<label><h2>First Name:</h2></label>
			<input class="login-input" type="text" name="fname" value="<?php if(!empty($fname)){echo $fname;} ?>"><br><br>
			<label><h2><h2>Username:</h2></label>
			<input class="login-input" type="text" name="username" value="<?php if(!empty($username)){echo $username;} ?>"><br><br>

			<!-- commented out my password since we are now generating our own randomly -->
			<!-- <label><h2>Password:</h2></label> -->
			<!-- <input id="password-input" type="text" name="password" value=""><br><br> -->

			<label><h2>Email:</h2></label>
			<input class="login-input" type="text" name="email" value="<?php if(!empty($email)){echo $email;} ?>"><br><br>
			<label><h2>User Level:</h2></label>
			<select name="userlvl">
				<option value="">Please Select Your Level</option>
				<option value="1">Web Admin</option>
				<option value="2">Web Master</option>
			</select>
			<input id="createuser-bttn" class="submit-bttn" type="submit" name="submit" value="Create User">
		</form>
	</div>
</div>

</body>
</html>	