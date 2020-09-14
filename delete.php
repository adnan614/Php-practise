<?php  require 'include/template.php' ?>


<?php

$connection = mysqli_connect('localhost','root','','users');
    
    if(!$connection){
       die("Not connected.". mysqli_error($connection));
    }

    $recv = $_REQUEST['id'];
    $recv_pic = $_REQUEST['profile_pic'];

    $recv_query = "DELETE FROM user_info WHERE id = $recv";

    $delete_result = mysqli_query($connection,$recv_query);

    if($delete_result){
        unlink("upload/$recv_pic");
        header("location: home.php?deleted");
    }
 


?>