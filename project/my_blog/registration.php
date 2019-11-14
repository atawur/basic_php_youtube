<?php

    include('./db/db_connect.php');
    include ('./functions.php');
    $frst_name_err = $last_name_err=$middle_name_err=$email_err=$mobile_number_err =$password_err=$confir_pasword_err= $success=$image_err=$path='';
    $submit = true;
if(isset($_POST['save'])){
  extract($_POST);
  
 

  // if you are not using extract function
  $first_name = check_data($_POST['fname']);
  $fname = mysqli_real_escape_string($conn,$first_name);
  $middleName = check_data($_POST['middle_name']);
  $middle_name = mysqli_real_escape_string($conn,$middleName);

  $last_name = mysqli_real_escape_string($conn,check_data($_POST['last_name']));
/// if you are using extract function
  
  $password = mysqli_real_escape_string($conn,check_data($password));
  $confirm_password = mysqli_real_escape_string($conn,check_data($confirm_password));
  $mobile_number = mysqli_real_escape_string($conn,check_data($mobile_number));

  if(!$fname){
    $frst_name_err = 'First  Required';
    $submit = false;
  }

  if(!$middle_name){
    $middle_name_err ='Moiddle anem required';
    $submit = false;
  }

  if(!$last_name){
    $last_name_err = 'Last _name required';
    $submit = false;
  }

  if(!$email){
    $email_err = 'Email is requierd';
    $submit = false;
  } else if($email && !filter_var($email,FILTER_VALIDATE_EMAIL)){
    $email_err = 'Please provide an valid email';
    $submit = false;
} else if($email && filter_var($email,FILTER_VALIDATE_EMAIL)){
  $is_exist = check_email($email);

  if( $is_exist){
    $email_err = 'This email addres salready exist ,please try another one';
    $submit = false;
  }
}
  if(!$mobile_number){
    $mobile_number_err = 'Mobile NUmber is requiere';
    $submit = false;
  }

  if(!$password){
    $password_err='Paswword required';
    $submit = false;
  }else if($password && (strlen($password)<8) ){
      $password_err='Password Must be getter eigth character';
      $submit = false;
     
  }
  if(!$confirm_password){
    $confir_pasword_err= 'Confirm password is required';
    $submit = false;
  }
  if(($password && $confirm_password) && ($password !== $confirm_password)){
      $confir_pasword_err= 'Password and confirm password must be equal';
      $submit = false;

  }
  $file_path ='';
  if(isset($_FILES) && $_FILES['profile_pic']['size'] >0){
    $file_path = file_upload($_FILES,'profile_pic');
    if($file_path['status']==false){
      $submit = $file_path['status'];
    }
    $image_err = $file_path['msg'];
    $path = $file_path['path'];
  }

if($submit ){
  $md5= md5($password);
  $sql = "insert into users(first_name,middle_name,last_name,email,password,mobile_number,profile_picture) values('$fname','$middle_name','$last_name','$email','$md5','$mobile_number','$path')";
  $rs = mysqli_query($conn,$sql);
  if($rs){
    $success= "Registration Success";
    $fname=$middle_name=$last_name=$email=$mobile_number=$password=$confirm_password='';
     
  }else{
    $success= "Failed";
    
  }
}else{
  if($path){
    unlink($path);
  }
}
  
 
}

require_once("./header.php");
?>

<div class="container">
<h3 style='text-align:center'>Registration Form</h3>
<?php if($success){?>
  <h4 style='text-align:center;color:green'><?php echo $success;?></h4>
<?php } ?>
<form action="./registration.php"  method="post" enctype="multipart/form-data">
<div class="form-group">
    <label for="first_name">First name</label>
    <input type="text" class="form-control" id="first_name" value="<?php if(isset($fname)){echo $fname;}?>" name='fname' >
    <span style='color:red'><?php echo $frst_name_err; ?></span>
  </div>
  <div class="form-group">
    <label for="first_name">Middle name</label>
    <input type="text" class="form-control" id="middle_name"  value="<?php if(isset($middle_name)){echo $middle_name;}?>"  name="middle_name">
    <span style='color:red'><?php echo $middle_name_err; ?></span>
  </div>
  <div class="form-group">
    <label for="last_name">last name</label>
    <input type="text" class="form-control" id="last_name" value="<?php if(isset($last_name)){echo $last_name;}?>"  name="last_name">
    <span style='color:red'><?php echo $last_name_err; ?></span>
  </div>
  <div class="form-group">
    <label for="mobile_number">Mobile Number</label>
    <input type="text" class="form-control" id="mobile_number" value="<?php if(isset($mobile_number)){echo $mobile_number;}?>"  name="mobile_number">
    <span style='color:red'><?php echo $mobile_number_err; ?></span>
  </div>
  <div class="form-group">
    <label for="email">Email address:</label>
    <input type="text" class="form-control" id="email" value="<?php if(isset($email)){echo $email;}?>" name='email'>
    <span style='color:red'><?php echo $email_err; ?></span>
  </div>
  <div class="form-group">
    <label for="pwd">Password:</label>
    <input type="password" class="form-control" id="pwd"  name="password">
    <span style='color:red'><?php echo $password_err; ?></span>
  </div>
  <div class="form-group">
    <label for="confirm_password">Confirm Password:</label>
    <input type="password" class="form-control" id="pwd"  name='confirm_password'>
    <span style='color:red'><?php echo $confir_pasword_err; ?></span>
  </div>
  <div class="form-group">
    <label for="confirm_password">Select Image</label>
    <input type="file" class="form-control" id="profile_pic"  name='profile_pic'>
    <span style='color:red'><?php echo $image_err;?></span>
  </div>
  <button type="submit" class="btn btn-primary" name='save'>submit</button>
</form>

</div>

<?php 
include_once("./footer.php");

?>
   