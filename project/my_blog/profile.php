<?php
include('./db/db_connect.php');
include ('./functions.php');
redirect_login();
$user_info = get_userinfo();
?>
<?php 
require_once("./header.php");
?>
<div class="container">
<h3 style='text-align:center'>User Profile</h3>
<div>
 <image src='<?php echo $user_info['profile_picture'];?>' height='200' width= '200'/>
</div>
<table class="table table-striped">
    
    <tbody>
      <tr>
        <th>First Name</th>
        <td>:</td>
        <td><?php echo $user_info['first_name'];?></td>
      </tr>
      <tr>
        <th>Middle Name</th>
        <td>:</td>
        <td><?php echo $user_info['middle_name'];?></td>
      </tr>
      <tr>
        <th>last Name</th>
        <td>:</td>
        <td><?php echo $user_info['last_name'];?></td>
      </tr>
      <tr>
        <th>Email</th>
        <td>:</td>
        <td><?php echo $user_info['email'];?></td>
      </tr>
      <tr>
        <th>Phone number</th>
        <td>:</td>
        <td><?php echo $user_info['mobile_number'];?></td>
      </tr>
    </tbody>
  </table>
  <a href="./edit_profile.php" class='btn-primary' style="color:white;padding:5px; margin:0 0 10px 0;cursor:pointer">Edit</a>
</div>

<?php 
include_once("./footer.php");

?>
   