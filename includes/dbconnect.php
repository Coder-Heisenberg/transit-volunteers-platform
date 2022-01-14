<?php

//set connection variables
$host='localhost';
$dbusername='root';
$dbpassword='123456';
$dbname= 'trb_data';

//connection to server & database
$connection = mysqli_connect($host, $dbusername, $dbpassword, $dbname) ;
 
//check connection 
if (mysqli_connect_errno()):
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
endif;

?>
