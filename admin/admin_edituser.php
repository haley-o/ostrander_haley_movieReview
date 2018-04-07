<?php

	// THIS IS FOR WHEN YOU ARE USING A MAC
	// ini_set('display_errors', 1);
	// erroe_reporting(E_ALL);


	require_once('phpscripts/config.php');
	// confirm_logged_in();

	$id = $_SESSION['user_id'];
	// echo $id;
	$tbl = "tbl_user";
	$col = "user_id";
	// $popForm = getSingle($tbl, $col, $id);
	$popForm = getSingle($tbl, $col, $id);
	$found_user = mysqli_fetch_array($popForm, MYSQLI_ASSOC);
	// echo $found_user;


	if(isset($_POST['submit'])) {
		$fname = trim($_POST['fname']);
		$username = trim($_POST['username']);
		$password = trim($_POST['password']);
		$email = trim($_POST['email']);
		$result = editUser($id, $fname, $username, $password, $email);
		$message = $result;
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
		<h1 id="createuser-title">Welcome human, edit yourself</h1>

		<?php if(!empty($message)){echo $message;} ?>
		<form action="admin_edituser.php" method="post">
			<label><h2>First Name:</h2></label>
			<input class="login-input" type="text" name="fname" value="<?php echo $found_user['user_fname']; ?>"><br><br>
			<label><h2><h2>Username:</h2></label>
			<input class="login-input" type="text" name="username" value="<?php echo $found_user['user_name']; ?>"><br><br>

			<!-- commented out my password since we are now generating our own randomly -->
			<label><h2>Password:</h2></label>
			<input  class="login-input" type="text" name="password" value="<?php echo $found_user['user_name']; ?>"><br><br>

			<label><h2>Email:</h2></label>
			<input class="login-input" type="text" name="email" value="<?php echo $found_user['user_email']; ?>"><br><br>
		
			<input id="createuser-bttn" class="submit-bttn" type="submit" name="submit" value="Edit User">
		</form>
	</div>
</div>

</body>
</html>	