<?php
include_once('./db/db_connect.php');
 echo "<pre>";
 print_r($_POST);
extract($_POST);

echo $first_name; echo $middle_name;
$sql = "insert into users(first_name,middle_name,last_name,email,password,mobile_number) values('$first_name','$middle_name','$last_name','$email','$password','$mobile_number')";

echo $sql;
$rs = mysqli_query($conn,$sql);
if($rs){
    echo "Data inserted";
}else{
    echo "There might be some problem";
}


?>