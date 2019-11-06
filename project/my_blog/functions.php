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
    $status=true;
    $msg= "success";
    $file_name= $file[$name]['name'];
    $image_array = explode('.',$file_name);
    $imageFileType = $image_array[1];
    $rand = rand(100000,99999999);
    $new_image_name = $image_array[0].$rand;
    $new_image_name_with_format = $new_image_name. '.'.$image_array[1];
    $upload_path = 'uploads/'.$new_image_name_with_format;
    $image_size = getimagesize($file[$name]['tmp_name']);
    if($image_size ===false){
        $status = false;
        $msg = "file is not an image";
    }
    
    if($image_size[0] > 3000000){
        $status = false;
        $msg = "file reach maximum width";
    }
    if (file_exists($upload_path)) {
        $status = false;
        $msg = "file is exist";
    }
    if($file[$name]['size'] > 2000000){
        $status = false;
        $msg = "file is largert then 2mb";
    }
    
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
        //echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        
        $status = false;
        $msg = "Sorry, only jpg, jpeg, png & gif files are allowed.";
    }

    //echo '<pre>';
    //print_r($file);
    move_uploaded_file($file[$name]['tmp_name'],$upload_path);
    $message['status'] = $status;
    $message['msg']= $msg; 
    if($status){
        $message['path']=$upload_path;
    }else{
        $message['path']='';
    }
    
    return $message;

}


