<?php
	include "db.php";
	$qry = "SELECT * FROM `univ_menus`";
	$run = mysqli_query($conn,$qry);
	while($row = mysqli_fetch_array($run)) {
		foreach ($row as $key => $value) {
			if(!is_int($value) && !is_int($key)) {
				if($key == "image_url") 
					echo "<image src = '$value'>";
				else
					echo $value."\n";
			}
		}
	}
?>