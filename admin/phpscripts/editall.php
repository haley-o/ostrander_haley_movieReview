<?php

	include('connect.php');

	//begin by grabbing the important content you need. Build your structure
	// these piece are always consisted. you always need them, the only thing that changes is what you want from inside of them
	$tbl = $_POST['tbl'];
	$col = $_POST['col'];
	$id = $_POST['id'];

	// grab the information that you need from the post array and the nrun an unset
	unset($_POST['tbl']);
	unset($_POST['col']);
	unset($_POST['id']);
	unset($_POST['submit']);
	// echo count($_POST);
	$num = count($_POST);
	$count = 0;
	$qstring = "UPDATE {$tbl} SET ";

	foreach($_POST as $key => $value){
		$count++;
		if($count !=$num){
			$qstring .= $key."='".$value."',";
		}else{
			$qstring .= $key."='".$value."'";
		}
	}

	// ./ is adding to what is already there
	$qstring .= "WHERE {$col}={$id}";
	// echo $qstring;
	$updatequery = mysqli_query($link, $qstring);
	if($updatequery){
		header("Location:../../index.php");
	}else{
		echo "There was a problem with the server";
	}

	// echo count($_POST); // find the amount inside of the array
	mysqli_close($link);

?>