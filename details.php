

<?php
	require_once('admin/phpscripts/config.php');

	//checking to see if it is set first, if it is we can work with it
	if(isset($_GET['id'])) {
		$id = $_GET['id'];
		$tbl = "tbl_movies";
		$col = "movies_id";
		$getSingle = getSingle($tbl, $col, $id);

		$tblReviews = "tbl_moviereview";
		$colReviewMovie = "movieReview_movieId";
		$getReviews = getSingle($tblReviews, $colReviewMovie, $id);
	}

	if(isset($_POST['submit'])){
		// echo "hey";
		$name = ($_POST['firstname']);
		$rating = ($_POST['rating']);
		$review = ($_POST['review']);
		$movieId = $id;
		// echo $addReview;
		$uploadReview = addReview($name, $rating, $review, $movieId);
		$message = $uploadReview;
		// $getReview = getReview($name, $rating, $review);
	}
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Movie Detail Page</title>
<link href="css/main.css" rel="stylesheet" type="text/css" media="screen">
<link href="css/reset.css" rel="stylesheet" type="text/css" media="screen">
<link href="https://fonts.googleapis.com/css?family=Heebo" rel="stylesheet">
</head>
<body>

<div class="detailed-con">

	<a id="back-button" class="detailText" href="admin/admin_index.php">Back</a>
	<a id="edit-button" href="admin/admin_editall.php">Edit Movie</a>

	<div class="detailed-movie-con">
		<?php 
			if(!is_string($getSingle)){
				$row = mysqli_fetch_array($getSingle);
				echo "<img class=\"detailedImg\" src =\"images/{$row['movies_cover']}\" alt=\"{$row['movies_title']}\">
				<h2 class=\"detailText\">{$row['movies_title']}</h2>
				<p class=\"detailText\">{$row['movies_year']}</p>
				<p class=\"detailText\">{$row['movies_storyline']}</p>";
			}else{
				echo "<p class=\"error\">{$getSingle}</p>";
			}
		?>
	</div>

	<div class="review-con">
		<h2>Reviews!</h2>

		<form action="" method="post">
		<label>Name:</label><br>
		<input type="text" name="firstname">
		<br>

		<label>Rating of 5</label>
		<input type="text" name="rating">
		<!-- <select>
		<option value="1">1</option>
		<option value="2">2</option>
		<option value="3">3</option>
		<option value="4">4</option>
		<option value="5">5</option>
		</select> -->

		<br>
		<label>Review:</label><br>
		<input type="text" name="review">
		<br><br>
		<input type="submit" name="submit" value="Submit">
		</form> 

		<div class="movie-reviews">

		<?php

		// echo $getReview;
		// ! means if it is not a string
		if(!is_string($getReviews)) {
			// echo "hey";
			while($row = mysqli_fetch_array($getReviews)){
				// \ is a cancelling character, it is needed for the strings 
				echo "
				<h2>{$row['movieReview_name']}</h2>
				<br></br>
				<p>{$row['movieReview_rating']}</p>
				<br></br>
				<p>{$row['movieReview_review']}</p>
				<br></br>
				";

			}
			}else{
				echo "error";
			}

		?>
				
		</div>
	</div>
</div>

</body>
</html>