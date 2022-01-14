<?php

    session_start();

    if (isset($_POST["submit"])) {
		#var_dump($_REQUEST);
	
        require_once 'dbconnect.php';
        require_once 'function.php';
        
        $userID = $_SESSION["userid"];
        $plate = $_POST["plate"];
        $state = $_POST["state"];
        $vehexp = $_POST["exp"];
        $vehtype = $_POST["vehicle"];
		$capacity = $_POST["capacity"];
        if(!empty($_POST["assistance"])) {
            $assistance = implode(", ", $_POST["assistance"]); }
        

        #Error Checking Functions
        if ( emptyInputVehicle($plate, $state, $vehexp, $vehtype, $assistance, $capacity) == TRUE ) {
			
            header("location: ../vehicle.php?error=emptyinput");  
            exit ();      
        }
        createVehicle($connection, $userID, $plate, $state, $vehexp, $vehtype, $assistance, $capacity);
    }

    elseif (isset($_POST["update"])) {
        require_once 'dbconnect.php';
        require_once 'function.php';

        $updatingVehicle = $_POST['updatingID'];
        $userID = $_POST["userID"];
        $userID = $_SESSION["userid"];
        $plate = $_POST["plate"];
        $state = $_POST["state"];
        $vehexp = $_POST["exp"];
        $vehtype = $_POST["vehicle"];
		$capacity = $_POST["capacity"];
        if(!empty($_POST["assistance"])) {
            $skill = implode(", ", $_POST["assistance"]); }

        if ( emptyInputVehicle($plate, $state, $vehexp, $vehtype, $assistance, $capacity) !== false ) {
            header("location: ../vehicle.php?error=emptyinput");  
            exit ();      
        }
        
        updateVehicle($connection, $updatingVehicle, $userID, $plate, $state, $vehexp, $vehtype, $assistance, $capacity);
        
    }
    else {
        header("location: ../login.php");
        exit();
}
?>
