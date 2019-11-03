<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
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
function check_email($email,$userid=null){
    global $conn;
    $ext_query = '';
    if($userid){
        $ext_query = " and users_id <> $userid";
    }
    $sql = "select * from users where email = '$email'  $ext_query";
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

function file_upload($file,$name){
    $file_name= $file[$name]['name'];
    $upload_path = 'uploads/'.$file_name;

    //echo '<pre>';
    //print_r($file);
    move_uploaded_file($file[$name]['tmp_name'],$upload_path);
    return $upload_path;

}


