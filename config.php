<?php


    $hostname = 'localhost';
    $username = 'root';
    $password = '1234';
    $database = 'practice';


    $conn = mysqli_connect($hostname,$username,$password,$database);

    if(!$conn){
        die('database failed to connect ' . mysqli_connect_error());
    }

?>