<?php
if(session_status()==PHP_SESSION_NONE){
    session_start();
}
require_once('./functions.php');
redirect_login();
require_once("./header.php");
include('./db/db_connect.php');

?>

<div class="container" style='min-height:400px'>
    <h2>Welcome to Dashboard</h2>
</div>
<?php 
include_once("./footer.php");

?>
   