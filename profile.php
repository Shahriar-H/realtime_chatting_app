<?php 

require 'config_file.php';

    session_start();
    if(!isset($_SESSION['email'])){
        header("Location: login.php");
    }
    //$connection = mysqli_connect('localhost','root','','chatsystem');
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
           <div class="searchbox text-center">
               <form id="searchform" action="#" >
                <input id="searchitem" class="" type="text" name="search" onkeypress="gettheval(this.value)" placeholder="Find your friends">
                <button><i class="fas fa-search"></i></button>
               </form>
            </div>
            <div class="serachresult" id="searchres">

            </div>
        <div class="active_user_div" id="active_users">




        </div>
        <div class="footer">
            <p>All Right Reserved © Shahriar</p>
        </div>
       </div>
    </div>

    <script type="text/JavaScript">
        var searchbtn = document.querySelector('.searchbox button');
        var searchinput = document.querySelector('.searchbox input');
        var serachresult = document.querySelector('.serachresult');
        var searchform = document.querySelector('#searchform');
        var show = document.querySelector('#show');

        searchform.onsubmit=(e)=>{
            e.preventDefault();

        }
      

        searchbtn.onclick=()=>{
            searchbtn.classList.toggle('newsbtn');
            searchinput.classList.toggle('newsinput');
            serachresult.classList.toggle('resultso');
            searchinput.value = "";
        }

        setInterval(() => {
            var xl = new XMLHttpRequest();
            xl.open('GET','userlist.php',true);
            xl.onreadystatechange = function(){
                if(xl.readyState==4 && xl.status==200){
                    var users = xl.response;
                    document.getElementById('active_users').innerHTML=users;
                }
            }
            xl.send();
            //console.log("hello");
        }, 500);


        // var searchitem = document.querySelector('#searchitem');
        // var valis = searchitem.value;
        function gettheval(valis){
            var xs = new XMLHttpRequest();
            xs.open('GET','search.php?val='+valis,true);
            xs.send();
            xs.onreadystatechange = function(){
                if(xs.readyState==4 && xs.status==200){
                    var users = xs.response;
                    document.getElementById('searchres').innerHTML=users;
                }
            }

        }




    </script>
</body>
</html>