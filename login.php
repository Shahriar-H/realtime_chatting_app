<?php 
    session_start();
    if(isset($_SESSION['email'])){
        header("Location: profile.php");
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat System</title>
    <link href="https://fonts.googleapis.com/css2?family=Bree+Serif&family=Oxygen&display=swap" rel="stylesheet">      <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> 
    <!-- fontawasome cdn -->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link rel="stylesheet" href="indesstyle.css">
</head>
<body>
    <div class="maindiv">
        <form action="#" class="formdiv">
            <h3>Start Chatting</h3>
            <hr>
            <p id="showmsg" class="showmsg "><strong>Info: </strong> Her show warnning !</p>
            <div class="emailis">
                <label>Email:</label><br>
                <input type="text" name="email" placeholder="jonedoe@gmail.com">
            </div>   
 
            <div class="Password eyeflotbef">
                <i class="fas fa-eye eyeflot" id="openeye"></i>
                <label>Password:</label><br>
                <input type="password" name="password" id="passtype" placeholder="Password">
            </div>
            <button id="loginbtn" class="btn btn-primary">Submit</button><br>
            <p class="text-center">I have not any account <a href="index.php">Signup Here</a></p>
        </form>
    </div>

    <script src="main.js"></script>
    <script type="text/JavaScript">

        var loginbtn = document.getElementById('loginbtn');
        loginbtn.onclick=()=>{
            var xlog = new XMLHttpRequest();
            xlog.open('POST','loginend.php',true);
            xlog.onreadystatechange = function(){
                if(xlog.readyState==4 & xlog.status==200){
                    datalog = xlog.response;
                    //console.log(data);

                    if(datalog=="success"){
                        location.href="profile.php";
                    }else{
                        document.getElementById('showmsg').classList.add('d-blockhobe');
                        document.getElementById('showmsg').innerHTML=datalog;
                    }
                }
            }

            var formData = new FormData(signupform) 
            xlog.send(formData);
            xlog.send();
        }
    </script>

</body>
</html>