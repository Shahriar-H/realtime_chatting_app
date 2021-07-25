<?php 
    require 'config_file.php';

//$connection = mysqli_connect('localhost','root','','chatsystem');
$cid = $_REQUEST['cid'];
$mid = $_REQUEST['mid'];

$selectRecever = mysqli_query($connection,"SELECT * FROM signup WHERE id=$cid");
$rowcid = mysqli_fetch_assoc($selectRecever);
$rimg = $rowcid['image'];

$sql = "SELECT * FROM chatdetails WHERE (chaterid=$cid AND myid=$mid) OR (myid=$cid AND chaterid=$mid)";
$result = mysqli_query($connection,$sql);

$output='';
if(mysqli_num_rows($result)>0){
    while($rows=mysqli_fetch_assoc($result)){
        $masage = $rows['sms'];
        if($rows['myid']==$cid){//sender
            $output .= '<div class="other_user">     <!-- massage of the persone -->
                        <div class="other_photo">
                            <img src="./image/'.$rimg.'" alt="">
                        </div>
                        <div class="other_massage">
                                <p>'. $rows['sms'] .'</p>
                        </div>
                    </div>';
        }else{
            $output .= '<div class="me_user"> <!-- massage of the Owner -->
                            <!-- <div class="me_photo">
                                <img src="" alt="">
                            </div> -->
                            <div class="me_massage">
                                    <p>'. $rows['sms'] .'</p>
                            </div>
                        </div>';
        }
    }
}else{
    $rowcidname = $rowcid['fname'];
    echo "<p class='text-center'>Not Previous Conversation with $rowcidname</p>";
}
echo $output;

?>