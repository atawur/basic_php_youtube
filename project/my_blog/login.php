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
<?php require_once("./header.php");?>
<div class="container" style='min-height:400px'>
<h3 style='text-align:center'>Login Form</h3>
<form action="./login.php"  method="post">

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
  <button type="submit" class="btn btn-primary" name='login'>Login</button>
</form>

</div>
<br>
<?php 
include_once("./footer.php");

?>
   