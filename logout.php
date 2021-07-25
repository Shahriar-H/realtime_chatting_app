<?php 

    session_start();
    $email=$_SESSION['email'];
    require 'config_file.php';

    //$connection = mysqli_connect('localhost','root','','chatsystem');
    if(!isset($_SESSION['email'])){
        header('Location: profile.php');
    }else{
        $up_status = "UPDATE signup SET status='Offline' WHERE email='{$email}'";
        mysqli_query($connection,$up_status);
        session_unset();
        session_destroy();
        header('Location: login.php');
    }

?>