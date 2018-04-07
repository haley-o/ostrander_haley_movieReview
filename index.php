<?php

	// THIS IS FOR WHEN YOU ARE USING A MAC
	// ini_set('display_errors', 1);
	// erroe_reporting(E_ALL);

	require_once('admin/phpscripts/config.php');
	// confirm_logged_in();


	// require_once('admin/phpscripts/config.php');
	if(isset($_GET['filter'])){
		$tbl = "tbl_movies";
		$col = "movies_id";
		$tblGenre = "tbl_genre";
		$tblMovGenre = "tbl_mov_genre";
		$genreId = "genre_id";
		$genreName = "genre_name";
		$filter = $_GET['filter'];
		// order must be the EXACT same as the filterType function!!!
		$getMovies = filterType($tbl, $tblGenre, $tblMovGenre, $col, $genreId, $genreName, $filter);
		$tblUser = "tbl_user";
	}else{
		$tbl = "tbl_movies";
		$getMovies = getAll($tbl);
	}


?>


<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>CMS Portal Login</title>
<link href="css/main.css" rel="stylesheet" type="text/css" media="screen">
<link href="css/reset.css" rel="stylesheet" type="text/css" media="screen">
<link href="https://fonts.googleapis.com/css?family=Heebo" rel="stylesheet">
</head>
<body>

<div id="welcome-page">

	<!-- <ul class="filterNav">
		<li><a href="index.php?filter=action">Action</a></li>
		<li><a href="index.php?filter=comedy">Comedy</a></li>
		<li><a href="index.php?filter=family">Family</a></li>
		<li><a href="index.php">All</a></li>
	</ul> -->

	<div class="welcome-con">
		<h1 id="welcome-title">Pick a Movie to Watch</h1>

		<div class="edit-con">
			<!-- <a id="createuser" href="admin_createuser.php">Create a New User</a> -->
			<a id="signout" href="phpscripts/caller.php?caller_id=logout">Sign Out</a>
			<!-- <a href="admin_deleteuser.php">Delete User</a> -->
			<!-- <a href="admin_editall.php">Edit Movie</a> -->
			<a href="admin_addmovie.php">Add a Movie</a>
		</div>
	</div>

	<div class="movie-con">
	<?php

		// ! means if it is not a string
		if(!is_string($getMovies)) {
			while($row = mysqli_fetch_array($getMovies)){
				?>
				<div class="movieWrapper">
					<?php
					// \ is a cancelling character, it is needed for the strings 
					echo "<img src = \"images/{$row['movies_cover']}\" alt=\"{$row['movies_title']}\">
					<h2>{$row['movies_title']}</h2>
					<p>{$row['movies_year']}</p>
					<a href=\"details.php?id={$row['movies_id']}\"> More Details...</a>
					<br></br>
					";
					?>
				</div>
				<?php

			}
		}else{
			echo "<p class=\"error\">{$getMovies}</p>";
		}
	?>
	</div>
</div>
	

</body>
</html>	