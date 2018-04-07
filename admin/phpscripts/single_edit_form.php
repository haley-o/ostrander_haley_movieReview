<?php
	
	function single_edit($tbl, $col, $id) {
		$result = getSingle($tbl, $col, $id);
		$getResult = mysqli_fetch_array($result);
		// echo mysqli_num_fields($result);
		echo "<form action=\"phpscripts/editall.php\" method=\"post\">";

		echo "<input hidden name=\"tbl\" value=\"{$tbl}\">";
		echo "<input hidden name=\"col\" value=\"{$col}\">";
		echo "<input hidden name=\"id\" value=\"{$id}\">";

		for($i=0; $i<mysqli_num_fields($result); $i++) { //we want a return of each field so we are going to loop through them
			$dataType = mysqli_fetch_field_direct($result, $i); //gathering all the data of the tbls and what's inside of them
			$fieldname = $dataType -> name; // -> goes inside and grabes name 
			// echo $fieldname."<br>";
			$fieldtype = $dataType -> type;
			// echo $fieldtype."<br>";

			if($fieldname != $col){
				echo "<label>{$fieldname}</label><br>";
				if($fieldtype != "252"){ //if the characters are this many then it will become a text field instead of an input
					echo "<input type=\"text\" name =\"{$fieldname}\" value =\"{$getResult[$i]}\"><br><br>";
				}else{
					echo "<textarea name=\"{$fieldname}\">{$getResult[$i]}\"</textarea><br><br>";
				}
			} // the above code can help you sort through all of the movie portions that you want to see

			//using this information that we echo we can begin to build our form, this helps us know if the tbl is a varchar or text
		}
	
	echo "<input type =\"submit\" name=\" submit\" value=\"Save Content\">";
	echo "</form>";
}

?>