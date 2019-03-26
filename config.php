<?php 

	$connect_db = mysqli_connect("localhost","root","","toolsystem");
	
	if($connect_db == FALSE){
		die("Error " . $sql . mysqli_connect_errno());
	}
	

?>