<?php 
    //$connection = mysqli_connect('localhost','root','','chatsystem');
    require 'config_file.php';

    session_start();
    if(!isset($_SESSION['email'])){
        header("Location: login.php");
    }
    $chaterid = $_REQUEST['id'];
    $email = $_SESSION['email']; //get host profile
    $sql = "SELECT * FROM signup WHERE email='{$email}'";
    $result = mysqli_query($connection,$sql);
    if(mysqli_num_rows($result)>0){
        $row = mysqli_fetch_assoc($result);
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
       <div class="boxmain">
           <div class="namepic user_me_active">
               <div class="imgdiv">
                   <div class="">
                       <a href="profile.php"><i class="fas fa-arrow-left arl"></i></a>
                        <img src="./image/<?php echo $row['image'] ?>" alt="logo">
                   </div>
                   <div class="namediv1">
                        <h4><?php echo $row['fname']. " " . $row['lname']?></h4>
                        <p class="active_me">Active Now</p>
                    </div>
                </div>

               <div class="logdiv">
                   <a class="btn btn-primary" href="logout.php">Logout</a>
               </div>
           </div>
           <!-- end head -->
        <div class="active_user_div" id="active_users">





            
       
         

            <div id="statyhere"></div>


        </div>
        <div class="footer">
            <form action="#" autocomplete="off">
                <input required type="text" id="smsis" name="massage" value="" placeholder="type your word">
                <input required id="chaterid" type="text" name="chaterid" value="<?php echo $chaterid; ?>">
                <input required id="myid" type="text" name="myid" value="<?php echo $row['id']; ?>">
                <button id="sendmassage"><i class="fas fa-paper-plane"></i></button>
            </form>
            <a id="staybottom" href="#statyhere">get</a>

        </div>
       </div>
    </div>

    <script type="text/JavaScript">

            var clicknow1 = document.querySelector('#statyhere');
            var clicknow = document.querySelector('#active_users');
            var t=0;
            var t1=0;

            window.onload = () =>{
                var sd = setInterval(() => {
                    clicknow.scrollBy(0,1000);
                    t++;
                    console.log(t);
                    if(t==5){
                        clearInterval(sd);
                    }
                }, 500);
                //console.log(clicknow.scrollTop+10);
                //
            }

    var formdat = document.querySelector('.footer form');
    var sendsms = document.querySelector('#sendmassage');
    var chaterid = document.querySelector('#chaterid').value;
    var myid = document.querySelector('#myid').value;
    var smsis = document.querySelector('#smsis');
    formdat.onsubmit=(e)=>{
        e.preventDefault();
    }

    sendsms.onclick= () =>{
        var xl = new XMLHttpRequest();
        xl.open('POST','sendsms.php',true);
        xl.onreadystatechange = function(){
            if(xl.readyState==4 && xl.status==200){
                var smssend = xl.response;
                smsis.value = "";
                //console.log(smssend);
            }
        }

        var formdatais = new FormData(formdat)
        xl.send(formdatais);
        var sd2 = setInterval(() => {
                    clicknow.scrollBy(0,1000);
                    t1++;
                    console.log(t1);
                    if(t1%5==0){
                        clearInterval(sd2);
                    }
                }, 500);
    }

    setInterval(() => {
        var xlh = new XMLHttpRequest();
            xlh.open('GET','smsview.php?cid='+chaterid+'&mid='+myid,true);
            xlh.onreadystatechange = function(){
                if(xlh.readyState==4 && xlh.status==200){
                    var users = xlh.response;
                    document.getElementById('active_users').innerHTML=users;
                    //console.log("get co");
                }
            }
            xlh.send();
    }, 500);


    </script>
</body>
</html>