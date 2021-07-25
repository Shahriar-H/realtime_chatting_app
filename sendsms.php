<?php 
    require 'config_file.php';

//$connection = mysqli_connect('localhost','root','','chatsystem');
$chaterid = $_REQUEST['chaterid'];
$myid = $_REQUEST['myid'];
$sms = $_REQUEST['massage'];

if(!empty($sms)){
    $sql = "INSERT INTO chatdetails (chaterid,myid,sms) VALUES ($chaterid,$myid,'$sms')";
    $result = mysqli_query($connection,$sql);
    if($result){
        echo "Sended";
    }else{
        echo mysqli_connect_error();
    }
}


?>