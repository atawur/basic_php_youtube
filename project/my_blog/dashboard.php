<?php
if(session_status()==PHP_SESSION_NONE){
    session_start();
}
if(!isset($_SESSION['users_id'])){
    header("Location: index.php");
}
require_once("./header.php");
include('./db/db_connect.php');

?>

<div class="container" style='min-height:400px'>
    <h2>Welcome to Dashboard</h2>
</div>
<?php 
include_once("./footer.php");

?>
   