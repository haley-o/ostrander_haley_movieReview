<?php

	function addMovie($title, $cover, $year, $runtime, $storyline, $trailer, $release, $genre) {

		if($_FILES['cover']['type'] == "image/jpeg" || $_FILES['cover']['type'] == "image/jpg"){  //check what the file is first and allow only photo files. || means "or"	
		$target = "../images/{$cover['name']}";
		if(move_uploaded_file($_FILES['cover']['tmp_name'], $target)){
			// echo "file moved";

			$orig = $target;
			$th_copy = "../images/{TH_{$cover['name']}";
			if(!copy($orig, $th_copy)){
				echo "faield to copy";
			}

			$size = getimagesize($orig);
			 // echo $size[1];
			include('connect.php');

			$addString = "INSERT INTO tbl_movies VALUES( NULL, '{$cover['name']}', '{$title}', '{$year}', '{$runtime}', '{$storyline}', '{$trailer}', '{$release}')"; // need to get the id of the genre, but we currently do not know the id of the movie that we have created so this needs to be figured out
			// echo $addString;

			$addresult= mysqli_query($link, $addString);

			if($addresult){
				$qstring = "SELECT * FROM tbl_movies ORDER BY movies_id DESC LIMIT 1";
				$lastmovie = mysqli_query($link, $qstring);
				$row = mysqli_fetch_array($lastmovie);
				$lastID = $row['movies_id'];
				// echo $lastID;
				$genstring = "INSERT INTO tbl_mov_genre VALUES(NULL, {$lastID}, {$genre})";
				$genresult = mysqli_query($link, $genstring); //this is running our query, V important

				redirect_to("admin_index.php");
			}

		}
	}
	mysqli_close($link);
}

?>