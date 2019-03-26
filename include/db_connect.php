<?php 

    $conn = mysqli_connect("localhost","root","","toolsystem");

    //if not connected to database
    if($conn == false){
        die ("Could not connect to Database: " . mysqli_connect_errno());
    }


?>
