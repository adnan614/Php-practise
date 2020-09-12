<?php  require 'include/template.php' ?>


<?php

$connection = mysqli_connect('localhost','root','','users');
    
    if(!$connection){
       die("Not connected.". mysqli_error($connection));
    }

    $recv = $_REQUEST['id'];
    $recv_pic = $_REQUEST['profile_pic'];

    $query = "DELETE FROM user_info WHERE id = $recv";

    $result = mysqli_query($connection,$query);

    if($result){
        unlink("upload/$recv_pic");
        header("location: home.php?deleted");
    }
 


?>