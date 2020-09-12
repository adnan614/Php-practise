<?php require 'include/template.php' ?>


<?php


$connection = mysqli_connect('localhost','root','','users');
    
    if(!$connection){
       die("Not connected.". mysqli_error($connection));
    }

    if(isset($_REQUEST['edit_id'])){

      $recv_id = $_REQUEST['edit_id'];  
     
      $get_info = "select * from user_info where id = $recv_id"; 

      $select_info = mysqli_query($connection,$get_info);

      while($row = mysqli_fetch_assoc($select_info)){
         
  ?>

<form action="update_data.php" method="post"> 
 
 <input type="text" name="username" value="<?php echo $row['username']  ?>" placeholder="username"><br>
  <input type="email" name="email" value="<?php echo $row['email']?>" placeholder="email"><br>
  <input type="password" name="password" value= "<?php echo $row['password']  ?>" placeholder="password"><br>   
  <input type="submit" name="submit" value="Update data">
  <input type="hidden" name="updating_hidden_id" value="<?php  echo $recv_id;   ?>">

</form>

<?php
      }  

    }

?>
