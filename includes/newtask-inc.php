<?php

    session_start();

    if (isset($_POST["submit"])) {
        
        require_once 'dbconnect.php';
        require_once 'function.php';

        $type = $_POST['type'];
        $volnum = $_POST['volnum'];
        $date = $_POST['taskdate'];
        $start = $_POST['taskstart'];
        $duration = $_POST['taskduration'];
        $cusnum = $_POST['cusnum'];
        $pickup = $_POST['pickup'];
        $dropoff= $_POST['dropoff'];

        if (emptyInputTask($type, $volnum, $date, $start, $duration, $cusnum, $pickup, $dropoff) !== false ) {
            header("location: ../newtask.php?error=emptyinput&type=$type&volnum=$volnum&taskdate=$date&taskstart=$start
            &taskduration=$duration&cusnum=$cusnum&pickup=$pickup&dropoff=$dropoff");  
            exit ();
        }

        createTask($connection, $type, $volnum, $date, $start, $duration, $cusnum, $pickup, $dropoff);
    }

    elseif (isset($_POST["update"])) {
        
        require_once 'dbconnect.php';
        require_once 'function.php';
        
        $updatingTask = $_POST['updatingID'];
        $type = $_POST['type'];
        $volnum = $_POST['volnum'];
        $date = $_POST['taskdate'];
        $start = $_POST['taskstart'];
        $duration = $_POST['taskduration'];
        $cusnum = $_POST['cusnum'];
        $pickup = $_POST['pickup'];
        $dropoff= $_POST['dropoff'];
    
        if (emptyInputTask($type, $volnum, $date, $start, $duration, $cusnum, $pickup, $dropoff) !== false ) {
            header("location: ../newtask.php?error=emptyinput&type=$type&volnum=$volnum&taskdate=$date&taskstart=$start
            &taskduration=$duration&cusnum=$cusnum&pickup=$pickup&dropoff=$dropoff"); 
            exit ();
        }

        updateTask($connection, $updatingTask, $type, $volnum, $date, $start, $duration, $cusnum, $pickup, $dropoff);
            
    }

    else {
        header("location: ../index.php");
        exit();
    }
