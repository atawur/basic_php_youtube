<?php
    require_once("./header.php");
  
?>

<div class="container">
<form action="./registration_save.php"  method="post">
<div class="form-group">
    <label for="first_name">First name</label>
    <input type="text" class="form-control" id="first_name" name='first_name'>
  </div>
  <div class="form-group">
    <label for="first_name">Middle name</label>
    <input type="text" class="form-control" id="middle_name"  name="middle_name">
  </div>
  <div class="form-group">
    <label for="last_name">last name</label>
    <input type="text" class="form-control" id="last_name"  name="last_name">
  </div>
  <div class="form-group">
    <label for="mobile_number">Mobile Number</label>
    <input type="text" class="form-control" id="mobile_number"  name="mobile_number">
  </div>
  <div class="form-group">
    <label for="email">Email address:</label>
    <input type="email" class="form-control" id="email" name='email'>
  </div>
  <div class="form-group">
    <label for="pwd">Password:</label>
    <input type="password" class="form-control" id="pwd" name="password">
  </div>
  <div class="form-group">
    <label for="confirm_password">Confirm Password:</label>
    <input type="password" class="form-control" id="pwd" name='confirm_password'>
  </div>
  
  <button type="submit" class="btn btn-default">submit</button>
</form>

</div>

<?php 
include_once("./footer.php");

?>
   