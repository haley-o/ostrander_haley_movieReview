<?php

	function addReview($name, $rating, $review, $movieId) {

		include('connect.php');

		$addReview = "INSERT INTO tbl_moviereview VALUES( NULL, '{$name}', '{$rating}', '{$review}', '{$movieId}')";

		// echo $addReview;

		$reviewQuery = mysqli_query($link, $addReview);
		// echo $userQuery;
		if($reviewQuery) {
			// echo 'hello';
			// redirect_to("admin_index.php");
		}else{
			// echo 'yoyo';
			$message = "There was a problem setting up this user";
			return $message;
		}

	mysqli_close($link);
}

function getReview($name, $rating, $review) {

		include('connect.php');

		$getReview = "SELECT * FROM `tbl_moviereview`";

		return $getReview;

		// echo $addReview;

	mysqli_close($link);
}

?>