<?php 
    require 'config_file.php';

$valueis = $_REQUEST['val'];
//$connection = mysqli_connect('localhost','root','','chatsystem');
$sql = "SELECT * FROM signup WHERE fname LIKE '%$valueis%' OR lname LIKE '%$valueis%'";
$result = mysqli_query($connection,$sql);
$output = "";
if(mysqli_num_rows($result)>0){
    while($rows = mysqli_fetch_assoc($result)){
        $img = $rows['image'];
        $name = $rows['fname'].' '.$rows['lname'];
        $output .= '<div class="resultinfo">
                    <img src="image/'.$img.'" alt="img">
                    <h4><a href="chatpage.php?id='.$rows['id'].'">'.$name.'</a></h4>
                </div>';
    }
}else{
    $output = "<p class='text-center pt-5'>Not Data found</p>";
}
echo $output;

?>