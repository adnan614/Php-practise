<?php require 'include/template.php' ?>

<div class="container">
<!-- <form action = "" method ="post">

      <input type="text" name="search_name" placeholder="search by your username">

      <input type="submit" name="search" value="search" class="btn btn-info">

</form> -->


<?php
//learning upload file----------------------

// $pro = $_FILES['profile'];

//  $name = $pro['name'];
//  $type = $pro['type'];
//  $tmp_name = $pro['tmp_name'];

// if(!empty($name)){
//     $location = "upload/";
//     if(move_uploaded_file($tmp_name,$location. $name)){
//         echo "File upload Successfully.<br>";
//         $path=$location. $name;
//         echo "<img src='$path' width='200' height='300'>"; 
//     }else{
//         echo "Failed";
//     }
// }else{
//     echo"file not found";
// }

// -------------------------------------------------------


// if($usr=="google"){
//       header("location: https://www.google.com");
// }elseif($usr=="facebook") {

//     header("location: https://www.facebook.com");    
// }else{
//     echo "you didn't redirect";
// }


// --------- password entry ---------------------------------------

// $usrname = $_REQUEST['username'];
// $usremail = $_REQUEST['email'];
// $usrpassword = $_REQUEST['password'];

// // $countpass = strlen($usrpassword);

// //    if(!($countpass >=5 && $countpass <=10 )){
// //          header("location: test.php?wrongpass= You entered this password = $usrpassword.");
// //    }else{
// //      echo "perfect";
// //    }


// encrypt method -------------------------------------------------

// $hash_format = "$2y$07$";
// $salt = "sdfgjghdfhjgdfh22dgshfhjdfhjgh";

// $conC = $hash_format . $salt;

// echo  $usrpassword;
// echo "<br>";
// echo crypt($usrpassword ,$conC);


// --------------------------------------------------------

// session_start();

// echo $_SESSION['user'];

// Inserted practise---------------------------------------------------------------

// if(isset($_POST['submit'])){
//     $username =  $_POST['username'];
//     $email =    $_POST['email'];
//     $password =    $_POST['password'];

//     if($username && $email && $password){
    
//     $connection = mysqli_connect('localhost','root','','users');
    
//     if(!$connection){
//        die("Not connected.". mysqli_error($connection));
//     }

//     $query = "INSERT INTO user_info (username, email,password) VALUES ('$username','$email','$password')";

//     $result = mysqli_query($connection,$query);

//     if($result){
//         echo "Insert success";
//     }else{
//         echo "Insert not success";
//     }

//     }else{
//         echo "any field cannot be blank";
//     }
 
//  }

// data read -----------------------------------------------------------

$connection = mysqli_connect('localhost','root','','users');
    
    if(!$connection){
       die("Not connected.". mysqli_error($connection));
    }

    // if(isset($_REQUEST['search'])){
    //    $search = $_REQUEST['search_name'];
   

    // $query = "SELECT * FROM  user_info where username LIKE '%$search%'";
    $query = "SELECT * FROM  user_info";

    $result = mysqli_query($connection,$query);

    $count = mysqli_num_rows($result);

    if($count > 0){

       if(isset($_REQUEST['deleted'])){
           echo "<font color='red'>Data Deleted</font>";
       }
       if(isset($_REQUEST['updated'])){
        echo "<font color='green'>Data Updated</font>";
    }    


   ?>

<form action="insert.php" method="post" enctype="multipart/form-data"> 
 
 <input type="text" name="username" placeholder="username">
  <input type="email" name="email" placeholder="email">
  <input type="password" name="password" placeholder="password">
  <input type="radio" name="gender" value="male">Male
  <input type="radio" name="gender" value="female">Female
<select name="country">
  <option value="">Select Your Country</option>
  <option value="Bangladesh">Bangladesh</option>
  <option value="USA">USA</option>

</select>
  
  <input type="file" name="upload_image" value="Upload">
  <input type="submit" name="submit" value="submit">




</form>





<br>

    <div class="container"> 
      <table class="table">
        <thead class="thead-dark">
        <tr>
            <th>Serial No.</th>
            <th>ID</th>
            <th>Profiles</th>
            <th>NAME</th>
            <th>EMAIL</th>
            <th>PASSWORD</th>
            <th>ACTION</th>
            <th>Gender</th>
            <th>Country</th>
        </tr>
        </thead>
   

  <?php

  $serial_number = 0;
    while($row = mysqli_fetch_assoc($result)){
        
       $id = $row['id'];
       $username =  $row['username'];
       $profile_pic = $row['profile_pic'];
       $email = $row['email'];
       $password =  $row['password'];
       $gender =  $row['gender'];
       $country =  $row['country'];

       $serial_number++;

   ?>
     <tbody>
         <tr> 
                <td><?php  echo $serial_number ?></td>
                <td><?php  echo $id ?></td>
                <td><img  width ="70px" src="upload/<?php echo $profile_pic; ?>"></td>
                <td><?php  echo $username ?></td>
                <td><?php  echo $email ?></td>
                <td><?php  echo $password ?></td>
                <td><a href="single_data_edit.php?edit_id=<?php echo $id  ?>">Edit</a> || <a onclick="return confirm('Are you sure?')" href="delete.php?id=<?php  echo $id  ?>&profile_pic=<?php echo $profile_pic ?>">Delete</a></a></td>

                <td><?php  echo $gender ?></td>
                <td><?php  echo $country ?></td>
       </tr>
     </tbody>

 <?php
    }

?>

 </table>
 <?php
    echo "data = $count";

    }else{
        echo "You don't have any data on your database";
    }

// }

?>

 </div>


</div>


  