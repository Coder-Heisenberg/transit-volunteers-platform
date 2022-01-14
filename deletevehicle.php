<?php
    include_once 'header.php';
    include_once 'includes/dbconnect.php';
	
	if (!isset($_SESSION["useruid"])) { #reroutes user to login if they are not logged in
		header("Location: login.php");
		die ();
	}
    
    if(isset($_GET['deleteingID'])) {
        echo $_GET['deleteingID'];
    }

    $deleteingVehicle =  $_GET['deleteingID']; 
    print_r($_GET);
    $my_query = "DELETE FROM `vehicles` WHERE vehiclesID='$deleteingVehicle'";
    $result = mysqli_query($connection, $my_query);
   
    if ($result) {
        header("location: ../vehicle.php");
        exit();
    }
    else {
        echo 'Try Again, Something went wrong!';
    }
?>
