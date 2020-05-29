<?php
include_once('./db/db_connect.php');
include_once ('./functions.php');
if(isset($_GET['id'])){
    $post_id = check_data(base64_decode($_GET['id']));
    //echo $post_id ;
    //exit();
    $post_info = get_post_by_id($post_id);
    if($post_info){
        extract( $post_info);
    }
}
?>

<?php
require_once("./header.php");
?>



<div class="container">
<?php if($post_info){?>
   <?php include_once ('./single_post.php')?>
<?php }else{?>
    Somethign went wrong
 <?php } ?>

</div>


</div>


<?php
include_once("./footer.php");

?>
