<?php

    session_start();

    if (isset($_POST["submit"])) {
        
        require_once 'dbconnect.php';
        require_once 'function.php';
        
        $userID = $_SESSION["userid"];
        $first = $_POST["first"];
        $last = $_POST["last"];
        $phone = $_POST["phone"];
        $dob = $_POST["dob"];
        if(!empty($_POST['skill'])) {
            $skill = implode(", ",$_POST['skill']); }

        $education = $_POST["education"];
        $group = $_POST["group"];
        
        $day_1 = $_POST["day_1"];
        $from_1 = $_POST["from_1"];
        $duration_1 = $_POST["duration_1"];
        $origin_1 = $_POST["origin_1"];

        $day_2 = $_POST["day_2"];
        $from_2 = $_POST["from_2"];
        $duration_2 = $_POST["duration_2"];
        $origin_2 = $_POST["origin_2"];

        $day_3 = $_POST["day_3"];
        $from_3 = $_POST["from_3"];
        $duration_3 = $_POST["duration_3"];
        $origin_3 = $_POST["origin_3"];


        #Error Checking Functions
        if ( emptyInputProfile($first, $last, $phone, $dob, $skill, $education, 
        $day_1, $from_1, $duration_1, $origin_1) !== false ) {
        header("location: ../profile.php?error=emptyinput");  
        exit ();      
    }
        
        createProfile($connection, $userID, $first, $last, $phone, $dob, $skill, $education, $group, 
        $day_1, $from_1, $duration_1, $origin_1, $day_2, $from_2, $duration_2, $origin_2,
        $day_3, $from_3, $duration_3, $origin_3);
    }

    elseif (isset($_POST["update"])) {
        
        require_once 'dbconnect.php';
        require_once 'function.php';
        
        $updatingProfile = $_POST["updatingID"];
        $userID = $_SESSION["userid"];
        $first = $_POST["first"];
        $last = $_POST["last"];
        $phone = $_POST["phone"];
        $dob = $_POST["dob"];
        if(!empty($_POST['skill'])) {
            $skill = implode(", ",$_POST['skill']); }

        $education = $_POST["education"];
        $group = $_POST["group"];
        
        $day_1 = $_POST["day_1"];
        $from_1 = $_POST["from_1"];
        $duration_1 = $_POST["duration_1"];
        $origin_1 = $_POST["origin_1"];

        $day_2 = $_POST["day_2"];
        $from_2 = $_POST["from_2"];
        $duration_2 = $_POST["duration_2"];
        $origin_2 = $_POST["origin_2"];

        $day_3 = $_POST["day_3"];
        $from_3 = $_POST["from_3"];
        $duration_3 = $_POST["duration_3"];
        $origin_3 = $_POST["origin_3"];


        #Error Checking Functions
        if ( emptyInputProfile($first, $last, $phone, $dob, $skill, $education, 
        $day_1, $from_1, $duration_1, $origin_1) !== false ) {
        header("location: ../profile.php?error=emptyinput");  
        exit ();      
    }

        updateProfile($connection, $updatingProfile, $userID, $first, $last, $phone, $dob, $skill, $education, $group, 
        $day_1, $from_1, $duration_1, $origin_1, $day_2, $from_2, $duration_2, $origin_2,
        $day_3, $from_3, $duration_3, $origin_3);
            
    }
    
    else {
        header("location: ../login.php");
        exit();
    }  

