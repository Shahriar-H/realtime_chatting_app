<?php 
    require 'config_file.php';


    session_start();

    //$connection = mysqli_connect('localhost','root','','chatsystem');

    $email = $_POST['email'];
    $password = $_POST['password'];

    if(!empty($email) && !empty($password)){        // check all the field are filled

        if(filter_var($email, FILTER_VALIDATE_EMAIL)){ // check email is valid
            $result = mysqli_query($connection,"SELECT email FROM signup WHERE email='{$email}'");
            if(mysqli_num_rows($result)>0){ //check if email have already registered
                $sqlcheck ="SELECT * FROM signup WHERE email='{$email}' AND password='{$password}'";
                $resultall = mysqli_query($connection,$sqlcheck );
                if(mysqli_num_rows($resultall)>0){
                    $up_status = "UPDATE signup SET status='Online' WHERE email='{$email}'";
                    mysqli_query($connection,$up_status);
                    $_SESSION['email'] = $email;
                    echo "success";
                }else{
                    echo "Wrong Email & Password!";

                }
            }else{                
                    echo "Wrong Email !";
            }
        }else{                
            echo "Email Not Valid";
        }
    }else{                
        echo "All input filed are rquired";
    }
    





?>