<?php
    include('./db/db_connect.php');
    include ('./functions.php');
    $frst_name_err = $last_name_err=$middle_name_err=$email_err=$mobile_number_err =$password_err=$confir_pasword_err= $success='';
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

        if($submit){
            $user_id_session=$_SESSION['users_id'];
            $users_id_get= base64_decode($_GET['users_id']);
            $users_id_post = base64_decode($users_id);

            $sql = "update users set first_name='$fname',middle_name ='$middle_name',last_name = ' $last_name',email= '$email',mobile_number='$mobile_number'  where users_id =$users_id_get";
            //echo $sql;
            //exit();
            mysqli_query($conn,$sql);
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
<form action="./edit_profile.php?users_id=<?php  if(isset($user_info)){echo base64_encode($user_info['users_id']);}?>"  method="post">
<div class="form-group">
    <label for="first_name">First name</label>
    <input type="text" class="form-control" id="first_name" value="<?php  if(isset($user_info)){echo $user_info['first_name'];}?>" name='fname' >
    <span style='color:red'><?php echo $frst_name_err; ?></span>
  </div>
  <div class="form-group">
    <label for="first_name">Middle name</label>
    <input type="text" class="form-control" id="middle_name"  value="<?php  if(isset($user_info)){echo $user_info['middle_name'];}?>"  name="middle_name">
    <span style='color:red'><?php echo $middle_name_err; ?></span>
  </div>
  <div class="form-group">
    <label for="last_name">last name</label>
    <input type="text" class="form-control" id="last_name" value="<?php  if(isset($user_info)){echo $user_info['last_name'];}?>"  name="last_name">
    <span style='color:red'><?php echo $last_name_err; ?></span>
  </div>
  <div class="form-group">
    <label for="mobile_number">Mobile Number</label>
    <input type="text" class="form-control" id="mobile_number" value="<?php  if(isset($user_info)){echo $user_info['mobile_number'];}?>"  name="mobile_number">
    <span style='color:red'><?php echo $mobile_number_err; ?></span>
  </div>
  <div class="form-group">
    <label for="email">Email address:</label>
    <input type="text" class="form-control" id="email" value="<?php  if(isset($user_info)){echo $user_info['email'];}?>" name='email'>
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
  <input type='hidden' name='users_id' value='<?php  if(isset($user_info)){echo base64_encode($user_info['users_id']);}?>'/>
  <button type="submit" class="btn btn-default" name='update'>Update</button>
</form>

</div>

<?php 
include_once("./footer.php");

?>
   