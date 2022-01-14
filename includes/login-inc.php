<?php

if (isset($_POST["submit"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];
    
    require_once 'dbconnect.php';
    require_once 'function.php';

    if ( emptyInputLogin($username, $password) !== false ) {
        header("location: ../login.php?error=emptyinput&username=$username");  
        exit ();      
    }

    loginUser($connection, $username, $password);
}

else {
    header("location: ../index.php");
    exit();
}