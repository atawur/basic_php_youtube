<?php
include('./db/db_connect.php');
include ('./functions.php');
$password_err='';
$email_err = '';
if(isset($_POST['login'])){
    extract($_POST);
    $submit = true;
    if(!$password){
        $password_err='Please enter Your Password';
        $submit = false;
    }

    if(!$email){
        $email_err = 'Please enter your Email';
        $submit = false;
    }

    if($email && $password){
      login($email,$password);
    }

}
?>