<?php

if(isset($_POST['submit'])){

        $username =  $_POST['username'];
        $email =    $_POST['email'];
        $password =    $_POST['password'];
        $recv_file = $_FILES['upload_image'];

        $image_name = $recv_file['name'];
        $image_tmp_name = $recv_file['tmp_name'];
       
        $name_changer = uniqid().".png";

        if(!empty($image_name)){
            
            $loc = "upload/";

            if(move_uploaded_file($image_tmp_name,$loc.$name_changer)){
                header("location: home.php");
            }

        }else{
            echo "your file is empty";
        }
    
       
        
        $connection = mysqli_connect('localhost','root','','users');
        
        if(!$connection){
           die("Not connected.". mysqli_error($connection));
        }
    
        $query = "INSERT INTO user_info (profile_pic,username, email,password) VALUES ('$name_changer','$username','$email','$password')";
    
        $result = mysqli_query($connection,$query);
    
        if($result){
            echo "Insert success";
        }else{
            echo "Insert not success";
        }
    
        }else{
            echo "any field cannot be blank";
        }
     
    



?>