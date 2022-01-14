<?php

#Checks that all registration information is filled
function emptyInputReg($email, $username, $password, $repassword) {
    $error = "";
    $result;
    if (empty($email) || empty($username) || empty($password) || empty($repassword)) {
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}

#Checks that username contains only letters and numbers
function invalidUID($username) {
    $result;
    if ( !preg_match("/^[a-zA-Z0-9]*$/", $username)) {
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;    
}

#Checks that email is in correct format
function invalidEmail($email) {
    $result;
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;    
}

#Makes sure that password matches
function pwdMatch($password, $repassword) {
    $result;
    if ($password !== $repassword) {
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;    
}

#Ensures that no username is repeated
function takenUID($connection, $username, $email) {
    $sql = "SELECT * FROM users WHERE usersUsername = ? OR usersEmail = ?;" ;
    $stmt = mysqli_stmt_init($connection);
    
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../register.php?error=stmtfailed");  
        exit ();  
    }

    mysqli_stmt_bind_param($stmt, "ss", $username, $email);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($resultData)) {
        return $row;
    }
    else {
        $result = false;
        return $result;
    }

    mysqli_stmt_close($stmt);
}

#Creates new user
function createUser($connection, $email, $username, $password) {
    $sql = "INSERT INTO users (usersEmail, usersUsername, usersPassword) VALUES (?, ?, ?);" ;
    $stmt = mysqli_stmt_init($connection);
    
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../register.php?error=stmtfail");  
        exit ();  
    }

    $hashedPwd = password_hash($password, PASSWORD_DEFAULT);


    mysqli_stmt_bind_param($stmt, "sss", $email, $username, $hashedPwd);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    header("location: ../register.php?error=none");  
    exit();
}

#Checks that username and password are filled
function emptyInputLogin($username, $password) {
    $result;
    if (empty($username) || empty($password)) {
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}

#Checks that username and password are correct before logging a user in, sets session_start
function loginUser($connection, $username, $password) {
    $uidExists = takenUID($connection, $username, $username);

    if ($uidExists === false) {
        header("location: ../register.php?error=credentialsError");  
        exit ();  
    }

    $passwordHashed = $uidExists["usersPassword"];
    $checkPwd = password_verify($password, $passwordHashed);

    if ($checkPwd === false) {
        header("location: ../login.php?error=credentialsError");  
        exit ();  
    }
    else if ($checkPwd === true) {
        session_start();
        $_SESSION["userid"] = $uidExists["usersID"];
        $_SESSION["useruid"] = $uidExists["usersUsername"];
        header("location: ../index.php");  
        exit();
    }   
}

#Ensures that all necessary profile information is filled, necessary information is name, phone number, and DOB
function emptyInputProfile($first, $last, $phone, $dob) {
    $result;
    if ( empty($first) || empty($last) || empty($phone) || 
    empty($dob)) {
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}

#adds information to the user's profile
function createProfile($connection, $userID, $first, $last, $phone, $dob, $skill, $education, $group, 
$day_1, $from_1, $duration_1, $origin_1, $day_2, $from_2, $duration_2, $origin_2,
$day_3, $from_3, $duration_3, $origin_3) {
    
    $sql = "INSERT INTO `profiles`(`usersID`, `usersFirst`, `usersLast`, 
    `usersPhone`, `usersDOB`, `usersSkill`, `usersEducation`, `usersGroup`, 
    `usersDay_1`, `usersFrom_1`, `usersDuration_1`, `usersOrg_1`, 
    `usersDay_2`, `usersFrom_2`, `usersDuration_2`, `usersOrg_2`,
    `usersDay_3`, `usersFrom_3`, `usersDuration_3`, `usersOrg_3`) VALUES 
    (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?);";

    $stmt = mysqli_stmt_init($connection);
    
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../profile.php?error=stmtfailed");  
        exit ();  
    }

    mysqli_stmt_bind_param($stmt, "ssssssssssssssssssss", $userID, 
    $first, $last, $phone, $dob, $skill, $education, $group,
    $day_1, $from_1, $duration_1, $origin_1, $day_2, $from_2, $duration_2, $origin_2,
    $day_3, $from_3, $duration_3, $origin_3);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    header("location: ../profile.php?error=none");  
    
    exit();
}

#Updates user's profile
function updateProfile($connection, $updatingProfile, $userID, $first, $last, $phone, $dob, $skill, $education, $group, 
$day_1, $from_1, $duration_1, $origin_1, $day_2, $from_2, $duration_2, $origin_2,
$day_3, $from_3, $duration_3, $origin_3) {
    
    $sql = "UPDATE `profiles` SET `usersID`=?,`usersFirst`=?,
    `usersLast`=?,`usersPhone`=?,`usersDOB`=?,`usersSkill`=?,
    `usersEducation` = ?, `usersGroup`=?,
    `usersDay_1`=?,`usersFrom_1`=?,`usersDuration_1`=?,`usersOrg_1`=?, 
    `usersDay_2`=?,`usersFrom_2`=?,`usersDuration_2`=?,`usersOrg_2`=?, 
    `usersDay_3`=?,`usersFrom_3`=?,`usersDuration_3`=?,`usersOrg_3`=? 
    WHERE `profilesID` = $updatingProfile ";
    
    #echo $sql;

    $stmt = mysqli_stmt_init($connection);
    
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../editprofile.php?error=stmtfailed");  
        exit ();  
    }

    mysqli_stmt_bind_param($stmt, "ssssssssssssssssssss", $userID, $first, $last, $phone, $dob, $skill, $education, $group,
    $day_1, $from_1, $duration_1, $origin_1, $day_2, $from_2, $duration_2, $origin_2,
    $day_3, $from_3, $duration_3, $origin_3);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    header("location: ../profile.php?error=none");  
    
    exit();
}

#Checks that all necessary information is entered into vehicle info
function emptyInputVehicle($plate, $state, $vehexp, $vehtype, $assistance) {
    $result;
    if ( empty($plate) || empty($state) || empty($vehexp) || empty($vehtype) || empty($assistance) ) {
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}

#Adds new vehicle (NOTE: Use this framework for adding tasks)
function createVehicle($connection, $userID, $plate, $state, $vehexp, $vehtype, $assistance, $capacity) {
    $sql = "INSERT INTO `vehicles`(`usersID`, `usersPlate`, `usersState`, 
    `usersVehexp`, `usersVehtype`, `usersAstlevel`, `capacity`) VALUES (?, ?, ?, ?, ?, ?, ?);";

    $stmt = mysqli_stmt_init($connection);
    
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../vehicle.php?error=stmtfailed");  
        exit ();  
    }

    mysqli_stmt_bind_param($stmt, "sssssss", $userID, $plate, $state, $vehexp, $vehtype, $assistance, $capacity );
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    header("location: ../vehicle.php?error=none");  
    
    exit();
}

#Updates vehicle information - broken and not updating :)
function updateVehicle($connection, $updatingVehicle, $userID, $plate, $state, $vehexp, $vehtype, $assistance, $capacity) {
    $sql = "UPDATE `vehicles` SET `usersID`=?,`usersPlate`=?,`usersState`=?,
    `usersVehexp`=?,`usersVehtype`=?, `usersAstlevel`=?, `capacity`=? WHERE `vehiclesID`= $updatingVehicle ";

    $stmt = mysqli_stmt_init($connection);
        
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../vehicle.php?error=stmtfailed");  
        exit ();  
    }

    mysqli_stmt_bind_param($stmt, "sssssss", $userID, $plate, $state, $vehexp, $vehtype, $assistance, $capacity);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    header("location: ../vehicle.php?error=none");  

    exit();

}

#Checks that all necessary information is entered into user's license
function emptyInputLicense($linumber, $listate, $linexp, $liDUI) {
    $result;
    if ( empty($linumber) || empty($listate) || empty($linexp) || empty($liDUI) ) {
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}

#Inserts info into license
function createLicense($connection, $userID, $linumber, $listate, $linexp, $liDUI) {
    
    $sql = "INSERT INTO `licenses`(`usersID`, `usersLin`, `usersLinstate`, `usersLinexp`, `usersDUI`) 
    VALUES (?, ?, ?, ?, ?);";

    $stmt = mysqli_stmt_init($connection);
    
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../license.php?error=stmtfailed");  
        exit ();  
    }

    mysqli_stmt_bind_param($stmt, "sssss", $userID, $linumber, $listate, $linexp, $liDUI );
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    header("location: ../license.php?error=none");  
    
    exit();
}

#Updates license
function updateLicense($connection, $updatingLicense, $userID, $linumber, $listate, $linexp, $liDUI) {
    $sql = "UPDATE `licenses` SET `usersID`=?,`usersLin`=?,
    `usersLinstate`=?,`usersLinexp`=?, `usersDUI`=? WHERE `licensesID` = $updatingLicense";

    $stmt = mysqli_stmt_init($connection);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../license.php?error=stmtfailed");  
        exit ();  
    }

    mysqli_stmt_bind_param($stmt, "sssss", $userID, $linumber, $listate, $linexp, $liDUI);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    header("location: ../license.php?error=none");  
    
    exit();
}

#Checks that all necessary information is entered into new task
function emptyInputTask($type, $volnum, $date, $start, $duration, $cusnum, $pickup, $dropoff) {
    $result;
    if ( empty($type) || empty($volnum) || empty($date) || empty($start) ||
        empty($duration) || empty($pickup) || empty($dropoff) ) {
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}

#Creates a new task
function createTask($connection, $type, $volnum, $date, $start, $duration, $cusnum, $pickup, $dropoff) {
    
    $sql = "INSERT INTO `tasks`(`tasksType`, `tasksVolnum`, `tasksDate`, 
    `tasksStart`, `tasksDuration`, `tasksCusnum`, `tasksPickup`, `tasksDropoff`) 
    VALUES (?, ?, ?, ?, ?, ?, ?, ?);";

    $stmt = mysqli_stmt_init($connection);
    
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../newtask.php?error=stmtfailed");  
        exit ();  
    }

    mysqli_stmt_bind_param($stmt, "ssssssss", $type, $volnum, $date, $start, $duration, $cusnum, $pickup, $dropoff);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    header("location: ../newtask.php?error=none");  
    
    exit();
}

#Edits task
function updateTask($connection, $updatingTask, $type, $volnum, $date, $start, $duration, $cusnum, $pickup, $dropoff) {
    $sql = "UPDATE `tasks` SET `tasksType`=?, `tasksVolnum`=?, `tasksDate`=?,
    `tasksStart`=?, `tasksDuration`=?, `tasksCusnum`=?, `tasksPickup`=?, `tasksDropoff`=? 
    WHERE `tasksID` = '$updatingTask' ";

    $stmt = mysqli_stmt_init($connection);
    
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../edittask.php?error=stmtfailed");  
        exit ();  
    }

    mysqli_stmt_bind_param($stmt, "ssssssss", $type, $volnum, $date, $start, $duration, $cusnum, $pickup, $dropoff);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    header("location: ../task.php?error=none");  
    
    exit();
}

#Shows list of states
function showState($connection, $stateName, $stateAbrv, $placeholder_name) {
    $sql = "SELECT stateName, stateAbrv FROM states;";
    $result = mysqli_query($connection, $sql);

    if (!$result) {
        echo "Could not successfully run query ($sql) from DB: ".mysqli_error();
        exit;
    }

    if (mysqli_num_rows($result) == 0 ) {
        echo "No rows found, nothing to print.";
        exit;
    }
    print "            <div class='select-wrapper'>\n";
    print "              <select name='".$stateName."' style='color: black; background-color: white;'>\n";

    while($row = mysqli_fetch_assoc($result)) {
        if ($stateAbrv == $row['stateAbrv']) {
            print "                <option selected='selected' value=\"".$row['stateAbrv']."\">".$row['stateName']."</option>\n";
        } else {
            print "                <option value=\"".$row['stateAbrv']."\">".$row['stateName']."</option>\n";
        }
    }
    print "              </select>\n";
}