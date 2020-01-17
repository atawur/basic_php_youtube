<?php
    include('./db/db_connect.php');
    include ('./functions.php');
    redirect_login();
    check_admin_access();
?>
<?php 
require_once("./header.php");
?>
<div class="container">
<h3 style='text-align:center'>Category  List</h3>

<h2>Welcome</h2>
</div>

<?php 
include_once("./footer.php");

?>
   