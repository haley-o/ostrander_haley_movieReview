<?php
	//ini_set('display_errors',1);
	//error_reporting(E_ALL);
	require_once('phpscripts/config.php');
?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Edit All</title>
</head>
<body>

<?php
	echo single_edit("tbl_movies", "movies_id", 1); //returns "2" which is the amount of columns in the table
	// once this changes it takes effct from the other page single_edit_form.php
	// phpinfo();
?>
	
</body>
</html>