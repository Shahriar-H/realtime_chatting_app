<?php 
    require 'config_file.php';


    session_start();
    if(isset($_SESSION['email'])){
        header("Location: profile.php");
    }

    //$connection = mysqli_connect('localhost','root','','chatsystem');
    $fn = $_POST['fname'];
    $ln = $_POST['lname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $image = $_FILES['image'];

    if(!empty($fn) && !empty($ln) && !empty($email) && !empty($password)){        // check all the field are filled

        if(filter_var($email, FILTER_VALIDATE_EMAIL)){             // check email is valid
            $ceresult = mysqli_query($connection, $emailselect = "SELECT email FROM signup WHERE email='{$email}'");
            if(mysqli_num_rows($ceresult)>0){                     //check if email have already registered
                echo "This Email Already Registered !";
            }else{
                if(!empty($image)){                 //check if image get
                    $filename = $image['name'];     //image name fromfile array
                    $filetype = $image['type'];     //image type from file array
                    $filetmpname = $image['tmp_name'];      //image temporary location from file array

                    $image_slice = explode('.',$filename);
                    $image_ext = end($image_slice);

                    $extentions = ['jpg','png','jpeg'];
                    if(in_array($image_ext,$extentions) === true){           //filter only jpg,png,jpeg file
                        $time=time();           //for rename the file name
                        $lastnameoffile = $time.$filename;
                        $newlocation = "./image/".$lastnameoffile;              //here image will be stored

                        $movefile = move_uploaded_file($filetmpname,$newlocation);      //move file from temporary store to server
                        if($movefile){              //if file moved
                            //insert mysql Query
                            $insersql = "INSERT INTO signup (fname,lname,email,image,password) VALUES ('$fn','$ln','$email','$lastnameoffile','$password')";
                            $inserresult = mysqli_query($connection,$insersql); //query test
                            if($inserresult){ //if successful then show the massage
                               echo "success";
                            }else{
                                echo "Sorry Have problem";
                            }
                        }
                    }
                    else{
                        echo ".$image_ext not a photo ! ";
                    }

                }else{
                    echo "Please attach a photo";
                }
            }


        }else{
            echo "Email is not Valid";
        }
    }else{
        echo "All input filed are rquired";
    }





?>