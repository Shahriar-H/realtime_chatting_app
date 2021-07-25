<?php 
    require 'config_file.php';

session_start();
//$connection = mysqli_connect('localhost','root','','chatsystem');
$sql = "SELECT * FROM signup"; //select all user
$output='';
$actives=""; //user if loged in 
$result = mysqli_query($connection,$sql);
$sender_last_sms=''; //last sms of the sender will store here

$receiver_email = $_SESSION['email'];
$reciver_sql = "SELECT * FROM signup WHERE email='{$receiver_email}'"; //select host/reciever id
$reciever_result = mysqli_query($connection,$reciver_sql);
$reciver_row = mysqli_fetch_assoc($reciever_result);
$receiver_id = $reciver_row['id']; //reciver id will help you to find who are text you 

if(mysqli_num_rows($result)==1){
    echo "<p class='text-center pt-5'>No user Found !</p>";
}else{
    while($rows=mysqli_fetch_assoc($result)){
        $fname = $rows['fname'];
        $lname = $rows['lname'];
        $image = $rows['image'];
        $status = $rows['status'];
        $id = $rows['id'];  // this is sender id
        
        //get all the sms 
        $get_sms_sql = "SELECT * FROM chatdetails WHERE (chaterid=$id AND myid=$receiver_id) OR (chaterid=$receiver_id AND myid=$id)";
        $get_sms_result = mysqli_query($connection,$get_sms_sql);
        if(mysqli_num_rows($get_sms_result)>0){
            while($sms_rows=mysqli_fetch_assoc($get_sms_result)){ //select all the sms between sender and receiver
                $smsis = $sms_rows['sms'];
                if($sms_rows['chaterid']==$receiver_id){ //if last sms sended by sender then make it bold;
                    $sender_last_sms="<p style='color:black; font-weight:bold'>$smsis</p>";
                }else{
                    $sender_last_sms="<p>$smsis</p>";
                }
            }
        }else{
            $sender_last_sms="<p>No conversation done yet!</p>";
        }

        $substring = substr($sender_last_sms,0,70);

        if($status=="Online"){ //if status is Online green light will be shown
            $actives = "bodyname";
        }
        else{   //if status is Online grey light will be shown
            $actives = "offline";
        }    
        if($_SESSION['email']!=$rows['email']){ //logged in user can not see himselfe on his profile userlist 
//all the user will be added in output variable.
        $output .= ' <div class="namepic"> <!--active user list--> 
            <div class="imgdiv">
                <div class="">
                    <img class="active_user" src="./image/'.$image.'" alt="logo">
                </div>
                <div class="namediv1 name_active_user">
                    <h4 class="bodyname "><a href="chatpage.php?id='.$id.'">'.$fname." ".$lname.'</a></h4>
                    '.$substring.'
                    
                </div>
            </div>
            <div class="activlight">
                <h4 class="'.$actives.'"></h4>
            </div>
        </div>';
    }else{
        continue;
    }
    }
}
echo $output;   // here store the all user info

?>