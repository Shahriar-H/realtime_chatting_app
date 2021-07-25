<?php 

    $connection = mysqli_connect('localhost','root','','chatsystem');
    if($connection){
        //echo "Successfull";
    }else{
        echo "Database Connection Missing";
    }

?>