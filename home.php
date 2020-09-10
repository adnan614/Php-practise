<pre>

<?php

$pro = $_FILES['profile'];

 $name = $pro['name'];
 $type = $pro['type'];
 $tmp_name = $pro['tmp_name'];

if(!empty($name)){
    $location = "upload/";
    if(move_uploaded_file($tmp_name,$location. $name)){
        echo "File upload Successfully";
    }else{
        echo "Failed";
    }
}else{
    echo"file not found";
}


// if($usr=="google"){
//       header("location: https://www.google.com");
// }elseif($usr=="facebook") {

//     header("location: https://www.facebook.com");    
// }else{
//     echo "you didn't redirect";
// }
?>

