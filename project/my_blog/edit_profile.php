<?php
    include('./db/db_connect.php');
    include ('./functions.php');
    $frst_name_err = $last_name_err=$middle_name_err=$email_err=$mobile_number_err =$password_err=$confir_pasword_err= $success=$image_err='';
    $user_info = get_userinfo();

    if(isset($_POST['update'])){
        
        $submit = true;
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
        $is_exist = check_email($email,$_SESSION['users_id']);
      
        if( $is_exist){
          $email_err = 'This email addres salready exist ,please try another one';
          $submit = false;
        }
      }
        if(!$mobile_number){
          $mobile_number_err = 'Mobile NUmber is requiere';
          $submit = false;
        }
      
       if($password && (strlen($password)<8) ){
            $password_err='Password Must be getter eigth character';
            $submit = false;
           
        }
        if($password && !$confirm_password){
          $confir_pasword_err= 'Confirm password is required';
          $submit = false;
        }
        if(($password && $confirm_password) && ($password !== $confirm_password)){
            $confir_pasword_err= 'Password and confirm password must be equal';
            $submit = false;
        }
        $file_path_query ='';
        if(isset($_FILES['profile_pic']) && $_FILES['profile_pic']['size'] >0){
          print_r($_FILES['profile_pic']);
          $file_path = file_upload($_FILES,'profile_pic');
          if($file_path['status']==false){
            $submit = $file_path['status'];
          }
         
          $image_err = $file_path['msg'];
          $path = $file_path['path'];
          $file_path_query =",profile_picture ='$path'";
        }
        if($submit){
            $user_id_session=$_SESSION['users_id'];
            $users_id_get= base64_decode($_GET['users_id']);
            $users_id_post = base64_decode($users_id);

            $sql = "update users set first_name='$fname',middle_name ='$middle_name',last_name = ' $last_name',email= '$email',mobile_number='$mobile_number' $file_path_query  where users_id =$users_id_get";
            //echo $sql;
            //exit();
            $rs = mysqli_query($conn,$sql);
            if($rs){
               unlink($user_info['profile_picture']);
            }
            header("Location:./profile.php");

        }

    }
?>

<?php 
require_once("./header.php");
?>
<div class="container">
<h3 style='text-align:center'>Registration Form</h3>
<?php if($success){?>
  <h4 style='text-align:center;color:green'><?php echo $success;?></h4>
<?php } ?>
<form action="./edit_profile.php?users_id=<?php  if(isset($user_info)){echo base64_encode($user_info['users_id']);}?>"  method="post" enctype="multipart/form-data">
<div class="form-group">
    <label for="first_name">First name</label>
    <input type="text" class="form-control" id="first_name" value="<?php  if(isset($fname)){echo $fname; } else if(isset($user_info)){echo $user_info['first_name'];}?>" name='fname' >
    <span style='color:red'><?php echo $frst_name_err; ?></span>
  </div>
  <div class="form-group">
    <label for="first_name">Middle name</label>
    <input type="text" class="form-control" id="middle_name"  value="<?php  if(isset($middle_name)){echo $middle_name; } else if(isset($user_info)){echo $user_info['middle_name'];}?>"  name="middle_name">
    <span style='color:red'><?php echo $middle_name_err; ?></span>
  </div>
  <div class="form-group">
    <label for="last_name">last name</label>
    <input type="text" class="form-control" id="last_name" value="<?php if(isset($last_name)){echo $last_name; } else  if(isset($user_info)){echo $user_info['last_name'];}?>"  name="last_name">
    <span style='color:red'><?php echo $last_name_err; ?></span>
  </div>
  <div class="form-group">
    <label for="mobile_number">Mobile Number</label>
    <input type="text" class="form-control" id="mobile_number" value="<?php  if(isset($mobile_number)){echo $mobile_number; } else if(isset($user_info)){echo $user_info['mobile_number'];}?>"  name="mobile_number">
    <span style='color:red'><?php echo $mobile_number_err; ?></span>
  </div>
  <div class="form-group">
    <label for="email">Email address:</label>
    <input type="text" class="form-control" id="email" value="<?php  if(isset($email)){echo $email; } else if(isset($user_info)){echo $user_info['email'];}?>" name='email'>
    <span style='color:red'><?php echo $email_err; ?></span>
  </div>
  <div class="form-group">
    <label for="pwd">Password:</label>
    <input type="password" class="form-control" id="pwd"  autocomplete="new-password" name="password">
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
  <input type='hidden' name='users_id' value='<?php  if(isset($user_info)){echo base64_encode($user_info['users_id']);}?>'/>
  <button type="submit" class="btn btn-default" name='update'>Update</button>
</form>

</div>

<?php 
include_once("./footer.php");

?>
   