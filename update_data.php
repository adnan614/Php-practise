<?php require 'include/template.php' ?>

<?php

$connection = mysqli_connect('localhost','root','','users');
    
    if(!$connection){
       die("Not connected.". mysqli_error($connection));
    }


    if(isset($_REQUEST['submit'])){
        $username = $_REQUEST['username'];
        $email = $_REQUEST['email'];
        $password = $_REQUEST['password'];

       $hidden_id = $_REQUEST['updating_hidden_id']; 

   $update_query = "UPDATE user_info SET username='$username',email='$email',password='$password' where id='$hidden_id'";

   $final_update = mysqli_query($connection,$update_query);

   if($final_update){
       header("location: home.php?updated");
   }

}


?>