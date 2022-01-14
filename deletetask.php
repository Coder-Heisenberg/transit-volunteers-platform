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

    $deleteingTask =  $_GET['deleteingID']; 
    print_r($_GET);
    $my_query = "DELETE FROM `tasks` WHERE tasksID='$deleteingTask'";
    $result = mysqli_query($connection, $my_query);
   
    if ($result) {
        header("location: ../task.php");
        exit();
    }
    else {
        echo 'Try Again, Something went wrong!';
    }
?>

