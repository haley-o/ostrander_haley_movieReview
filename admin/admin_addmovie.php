<?php

	require_once('phpscripts/config.php');

	// $ip = $_SERVER['REMOTE_ADDR'];
	// echo $id;
	$tbl="tbl_genre";
	$genQuery = getAll($tbl);

	if(isset($_POST['submit'])){
		$title = $_POST['title'];
		$cover = $_FILES['cover'];
		$year = $_POST['year'];
		$runtime = $_POST['runtime'];
		$storyline = $_POST['storyline'];
		$trailer = $_POST['trailer'];
		$release = $_POST['release'];
		$genre = $_POST['genList'];
		$uploadMovie = addMovie($title, $cover, $year, $runtime, $storyline, $trailer, $release, $genre);
		$message = $uploadMovie;

		// if(empty($movieTitle)){
		// 	$message = "Please Enter a Movie Title.";
		// }else{
		// 	$result = addMovie($movieTitle, $movieCoverImg, $movieYear, $movieRunTime, $movieStoryline, $movieTrailer, $movieRelease);
		// 	$message = $result;
		// }
	}

?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>CMS Portal Login</title>
</head>
<body>
	<h1>Add a cool movie</h1>
	<?php if(!empty($message)){echo $message;} ?>
	<form action="admin_addmovie.php" method="post" enctype="multipart/form-data">
		<label>Movie Title:</label>
		<input type="text" name="title" value="<?php if(!empty($movieTitle)){echo $movieTitle;} ?>"><br><br>
		<label>Movie Cover Img:</label>
		<input type="file" name="cover" value="<?php if(!empty($movieCoverImg)){echo $movieCoverImg;} ?>"><br><br>
		<label>Movie Year:</label>
		<input type="text" name="year" value="<?php if(!empty($movieYear)){echo $movieYear;} ?>"><br><br>
		<label>Movie Runtime:</label>
		<input type="text" name="runtime" value="<?php if(!empty($movieRunTime)){echo $movieRunTime;} ?>"><br><br>
		<label>Movie Storyline:</label>
		<input type="text" name="storyline" value="<?php if(!empty($movieStoryline)){echo $movieStoryline;} ?>"><br><br>
		<label>Movie Trailer:</label>
		<input type="text" name="trailer" value="<?php if(!empty($movieTrailer)){echo $movieTrailer;} ?>"><br><br>
		<label>Movie Release:</label>
		<input type="text" name="release" value="<?php if(!empty($movieRelease)){echo $movieRelease;} ?>"><br><br>
		<select name="genList">
			<option value="">Please Select a genre</option>
		<?php
			while($row = mysqli_fetch_array($genQuery)){
				echo "<option value=\"{$row['genre_id']}\">{$row['genre_name']}</option>";
			}
		?>
		</select><br><br><br>
		<input type="submit" name="submit" value="add movie">
	</form>
</body>
</html>