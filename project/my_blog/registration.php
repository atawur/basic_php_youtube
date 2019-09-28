<?php
    require_once("./header.php");
    include('./db/db_connect.php');
    
    $frst_name_err = '';
    $last_name_err = '';
    $middle_name ='';
    $email_err = '';
    $mobile_number_err = '';
    $password_err='';
    $confir_pasword_err= '';

if(isset($_POST['save'])){
  extract($_POST);
  if(!$fname){
    $frst_name_err = 'First  Required';
  }

  if(!$middle_name){
    $middle_name ='Moiddle anem required';
  }

  if(!$last_name){
    $last_name_err = 'Last _name required';
  }

  if(!$email){
    $email_err = 'Email is requierd';
  }

  if(!$mobile_number){
    $mobile_number_err = 'Mobile NUmber is requiere';
  }

  if($password){
    $password_err='Paswword required';
  }
  if($confirm_password){
    $confir_pasword_err= 'Confirm password is required';
  }
if($fname && $middle_name && $last_name && $email && $mobile_number && $password && $confirm_password ){
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
    <span style='color:red'><?php echo $middle_name; ?></span>
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
    <input type="email" class="form-control" id="email"  name='email'>
    <span style='color:red'><?php echo $email_err; ?></span>
  </div>
  <div class="form-group">
    <label for="pwd">Password:</label>
    <input type="password" class="form-control" id="pwd"  name="password">
    <span style='color:red'><?php echo $frst_name_err; ?></span>
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
   