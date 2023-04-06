<?php 

    require_once 'config.php';
    session_start();

    if(isset($_SESSION['login']) && $_SESSION['login'] == true){
        header("Location: data.php");
        exit;
    }
    else{
       header("Location: login.php");
       exit;
    }

    
?>