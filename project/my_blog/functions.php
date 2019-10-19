<?php
if(session_status()==PHP_SESSION_NONE){
    session_start();
}
include_once('./db/db_connect.php');
 function check_data($data){
     $trim_data = trim($data);
     $stripslashes_data = stripslashes($trim_data);
     $main_data = htmlspecialchars($stripslashes_data);
     return $main_data;
 }
function check_email($email){
    global $conn;
    $sql = "select * from users where email = '$email'";
    $query = mysqli_query($conn,$sql);
    $row = mysqli_fetch_assoc($query);
    return  $row;
}

 function login($email,$password){
    global $conn;
     $md5_pass = md5($password);
     $sql ="select * from users where email= '$email' and password = '$md5_pass'";
     //echo $sql;
     $query = mysqli_query($conn,$sql);
     $row = mysqli_fetch_assoc($query);
     if($row){

        //echo $row->users_id;
        //exit();
         $_SESSION['users_id']= $row['users_id'];
       header("Location: ./dashboard.php");
     }else{
         echo "Login failed";
     }
     //return  $row;
 }

function redirect_dashboard(){
    if(isset($_SESSION['users_id'])){
        header("Location: dashboard.php");
    }
}

function redirect_login(){
    if(!isset($_SESSION['users_id'])){
        header("Location: login.php");
    }
}

function get_userinfo(){
    global $conn;
    $userid= $_SESSION['users_id'];
    $sql = "select *  from users where users_id=$userid";
    $query = mysqli_query($conn,$sql);
    $row = mysqli_fetch_assoc($query);
    return  $row;
}

