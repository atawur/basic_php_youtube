<?php
    require_once("./header.php");
    include('./db/db_connect.php');
    include ('./functions.php');
    
    $frst_name_err = '';
    $last_name_err = '';
    $middle_name_err ='';
    $email_err = '';
    $mobile_number_err = '';
    $password_err='';
    $confir_pasword_err= '';

    $submit = true;
if(isset($_POST['save'])){
  extract($_POST);
  // if you are not using extract function
  $fname = check_data($_POST['fname']);
  $middle_name = check_data($_POST['middle_name']);
  $last_name = check_data($_POST['last_name']);
/// if you are using extract function
  $email = check_data($email);
  $password = check_data($password);
  $confirm_password = check_data($confirm_password);
  $mobile_number = check_data($mobile_number);

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
  }
if($email && !filter_var($email,FILTER_VALIDATE_EMAIL)){
    $email_err = 'Please provide an valid email';
    $submit = false;
  
}
  if(!$mobile_number){
    $mobile_number_err = 'Mobile NUmber is requiere';
    $submit = false;
  }

  if(!$password){
    $password_err='Paswword required';
    $submit = false;
  }
  if($password && (strlen($password)<8) ){
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
if($submit ){
  $sql = "insert into users(first_name,middle_name,last_name,email,password,mobile_number) values('$fname','$middle_name','$last_name','$email','$password','$mobile_number')";
  $rs = mysqli_query($conn,$sql);
  if($rs){
      echo "Success";
  }else{
      echo "Failed";
  }
}
  
 
}

  
?>

<div class="container">
<form action="./registration.php"  method="post">
<div class="form-group">
    <label for="first_name">First name</label>
    <input type="text" class="form-control" id="first_name" name='fname' >
    <span style='color:red'><?php echo $frst_name_err; ?></span>
  </div>
  <div class="form-group">
    <label for="first_name">Middle name</label>
    <input type="text" class="form-control" id="middle_name"   name="middle_name">
    <span style='color:red'><?php echo $middle_name_err; ?></span>
  </div>
  <div class="form-group">
    <label for="last_name">last name</label>
    <input type="text" class="form-control" id="last_name"   name="last_name">
    <span style='color:red'><?php echo $last_name_err; ?></span>
  </div>
  <div class="form-group">
    <label for="mobile_number">Mobile Number</label>
    <input type="text" class="form-control" id="mobile_number"  name="mobile_number">
    <span style='color:red'><?php echo $mobile_number_err; ?></span>
  </div>
  <div class="form-group">
    <label for="email">Email address:</label>
    <input type="text" class="form-control" id="email"  name='email'>
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
  
  <button type="submit" class="btn btn-default" name='save'>submit</button>
</form>

</div>

<?php 
include_once("./footer.php");

?>
   