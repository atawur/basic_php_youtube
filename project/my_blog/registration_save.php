<?php
 include('./db/db_connect.php');
 //echo "<pre>";
 //print_r($_POST);
 extract($_POST);
 //echo $middle_name;

 $sql = "insert into users(first_name,middle_name,last_name,email,password,mobile_number) values('$fname','$middle_name','$last_name','$email','$password','$mobile_number')";
///echo $sql;

 $rs = mysqli_query($conn,$sql);
 if($rs){
     echo "Success";
 }else{
     echo "Failed";
 }


?>