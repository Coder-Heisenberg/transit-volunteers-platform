<?php

    session_start();

    if (isset($_POST["submit"])) {
        
        require_once 'dbconnect.php';
        require_once 'function.php';
        
        $userID = $_SESSION["userid"];
        $linumber = $_POST["linumber"];
        $listate = $_POST["listate"];
        $linexp = $_POST["linexp"];
        $liDUI = $_POST["dui"];
		
		

        #Error Checking Functions
        if ( emptyInputLicense($linumber, $listate, $linexp, $liDUI) !== false ) {
            header("location: ../license.php?error=emptyinput");  
            exit ();      
        }
        else {
            createLicense($connection, $userID, $linumber, $listate, $linexp, $liDUI);
        }
    }

    elseif (isset($_POST["update"])) {
        
        require_once 'dbconnect.php';
        require_once 'function.php';
        
        $updatingLicense = $_POST['updatingID'];
        $userID = $_POST["userID"];
        $linumber = $_POST["linumber"];
        $listate = $_POST["listate"];
        $linexp = $_POST["linexp"];
        $liDUI = $_POST["dui"];

        #Error Checking Functions
        if ( emptyInputLicense($linumber, $listate, $linexp,  $liDUI) !== false ) {
            header("location: ../license.php?error=emptyinput");  
            exit ();      
        }
        
        updateLicense($connection, $updatingLicense, $userID, $linumber, $listate, $linexp, $liDUI);
        
    }

    else {
        header("location: ../login.php");
        exit();
}  