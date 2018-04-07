<?php

	// REMEMBER $ is creating a variable
	// Get all of something, this can be used for a lot of different things
	function getAll($tbl) {
		include('connect.php');
		// tbl is being passed through as an argument 
		$queryAll = "SELECT * FROM {$tbl}";
		// echo $queryAll;
		$runAll = mysqli_query($link, $queryAll);
		if($runAll) {

			//this returns the object to getmobies in the html
			return $runAll;

		// if it's not an object then there is an error
		}else{
			$error = "There was an error accessing this information. Please go away.";
			return $error;
		}

		mysqli_close($link);
	}

	// getting a single of something
	function getSingle($tbl, $col, $id) {
		include('connect.php');

		//the variables added in here allows this to not be strictly defined, this way allows it to be more dynamic and not static
		$querySingle = "SELECT * FROM {$tbl} WHERE {$col} = {$id}";
		// echo $querySingle;
		$runSingle = mysqli_query($link, $querySingle);
		if($runSingle) {

			//this returns the object to getmobies in the html
			return $runSingle;

		// if it's not an object then there is an error
		}else{
			$error = "There was an error accessing this information. Please go away.";
			return $error;
		}

		mysqli_close($link);
	}

	function filterType($tbl, $tblGenre, $tblMovGenre, $col, $genreId, $genreName, $filter) {
		include('connect.php');
		// echo "From filterType()";
		$queryFilter = "SELECT * FROM {$tbl}, {$tblGenre}, {$tblMovGenre} WHERE {$tbl}.{$col} = {$tblMovGenre}.{$col} AND {$tblGenre}.{$genreId} = {$tblMovGenre}.{$genreId} AND {$tblGenre}.{$genreName} = '{$filter}'";

		// echo $queryFilter;

		$runFilter = mysqli_query($link, $queryFilter);
			if($runFilter) {

				//this returns the object to getmovies in the html
				return $runFilter;

			// if it's not an object then there is an error
			}else{
				$error = "There was an error accessing this information. Please go away.";
				return $error;
			}

		mysqli_close($link);
	}


	
?>