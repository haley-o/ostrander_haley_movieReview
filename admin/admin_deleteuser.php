<?php
	//ini_set('display_errors',1);
	//error_reporting(E_ALL);
	require_once('phpscripts/config.php');
	// confirm_logged_in();

	$tbl = "tbl_user";
	$users = getAll($tbl);
?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>CMS Portal</title>
<link href="../css/main.css" rel="stylesheet" type="text/css" media="screen">
<link href="../css/reset.css" rel="stylesheet" type="text/css" media="screen">
</head>
<body>

	<div class="deleteuser-page">
		<div class="deleteuser-contentCon">
			<h1 id="createuser-title">Welcome to the Company Delete Page</h1>
			<?php
				while($row = mysqli_fetch_array($users)) {
					echo "<h2 id=\"deleteuserName\">{$row['user_fname']}</h2><a href=\"phpscripts/caller.php?caller_id=delete&id={$row['user_id']}\"><h2 id=\"deleteuser\">Delete User</h2></a><br>";
				}
			?>
		</div>
	</div>
	
</body>
</html>