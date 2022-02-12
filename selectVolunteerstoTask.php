<?php

	include_once 'header.php';
    include_once 'includes/dbconnect.php';

    if(isset($_GET['taskID'])) {
        //echo $_GET['taskID'];
    }

    $taskID =  $_GET['taskID'];
    

    $taskquery = "select * from tasks";
    $taskresult = mysqli_query($connection, $taskquery);
    $taskrow = mysqli_fetch_array($taskresult);


    for ($j=0; $j < ; $j++) { 
    	// code...
    	$D[j] = $taskrow[j]['tasksDuration'];
    }

    
    $D[1] = $taskrow[1]['tasksDuration'];

    $tasksType = $taskrow['tasksType'];
    $tasksVolnum = $taskrow['tasksVolnum'];
    $tasksDate = $taskrow['tasksDate'];
    $tasksStart = $taskrow['tasksStart'];
    $tasksDuration = $taskrow['tasksDuration'];
    $tasksCusnum = $taskrow['tasksCusnum'];
    $tasksPickup = $taskrow['tasksPickup'];
    $tasksDropoff = $taskrow['tasksDropoff'];

    $VoldayOfWeek = date("l", strtotime($tasksDate));

    $tasksStartTime = date("H:i:s",strtotime($tasksStart));
    $tasksDurationInMinutes = $tasksDuration * 60;
    $tasksEndTime  = date("H:i:s",strtotime($tasksStart . ' + '.$tasksDurationInMinutes.' minutes'));

    $profilesquery = "select * from profiles where usersDay_1 like '%$VoldayOfWeek%' AND usersSkill like '%$tasksType%' AND usersFrom_1<='$tasksStartTime' AND '$tasksEndTime'<=(select DATE_ADD(STR_TO_DATE(replace(usersFrom_1, ':', ''),'%h%i'), INTERVAL (select usersDuration_1) HOUR));";
    $profilesresult = mysqli_query($connection, $profilesquery);
    $profilesrow = mysqli_fetch_array($profilesresult);

    print_r($profilesrow);

    ?>

