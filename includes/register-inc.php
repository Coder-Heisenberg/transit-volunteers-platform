<?php

if (isset($_POST["submit"])) {
    $email = $_POST["email"];
    $username = $_POST["username"];
    $password = $_POST["password"];
    $repassword = $_POST["repassword"];

    require_once 'dbconnect.php';
    require_once 'function.php';
    
    #Error Checking Functions
    if ( emptyInputReg($email, $username, $password, $repassword) !== false ) {
        header("location: ../register.php?error=emptyinput&email=$email&username=$username");  
        exit ();      
    }

    if ( invalidUID($username) !== false ) {
        header("location: ../register.php?error=invalidUID&email=$email");  
        exit ();      
    }

    if ( invalidEmail($email) !== false ) {
        header("location: ../register.php?error=invalidEmail&username=$username");  
        exit ();      
    }

    if ( pwdMatch($password, $repassword) !== false ) {
        header("location: ../register.php?error=matchError&email=$email&username=$username");  
        exit ();      
    }

    if ( takenUID($connection, $username, $email) !== false ) {
        header("location: ../register.php?error=takenUID&email=$email");  
        exit ();      
    }

    #Create New Account
    createUser($connection, $email, $username, $password);
}

else {
    header("location: ../index.php");
    exit();
}