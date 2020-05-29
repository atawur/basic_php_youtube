<?php
include_once('./db/db_connect.php');
include_once ('./functions.php');
redirect_login();
$user_info = get_userinfo();
if(isset($_GET['id'])){
    $post_id = check_data(base64_decode($_GET['id']));
    //echo $post_id ;
    //exit();
    $post_info = get_post_by_id($post_id);
    if($post_info){
        extract( $post_info);
    }
}


if(isset($_POST['approve'])||isset($_POST['unapprove'])){
    extract($_POST);
    $id = base64_decode($post_id);
    if(isset($_POST['approve'])){
        $status = 1;
    }else{
        $status = 2;
    }
    $sql = "update posts set status=$status where id= $id ";
    $result = mysqli_query($conn,$sql);
    header('location:all_post.php');


}
?>

<?php
require_once("./header.php");
?>



<div class="container">
    <?php if(isset($post_info) && $post_info){?>
            <div>
                <?php
                    if(isset($message)){
                        echo $message;
                    }
                ?>
                <?php include_once ('./single_post.php')?>
                <?php if($user_info && $user_info['user_type_id']==1){?>
                    <form action="view_post.php" method="post">
                       <input type="hidden" value="<?php echo base64_encode($id);?>" name="post_id"/>
                        <?php if($status==3 || $status== 2){?>
                            <button class="btn btn-primary" name="approve">Approve</button>
                        <?php }?>
                        <?php if($status==3 || $status==1){?>
                            <button class="btn btn-primary" name="unapprove">Un Approve</button>
                        <?php }?>
                    </form>
                <?php }?>
                <br/>
            </div>
    <?php }else {?>
        <h2 style="color: red;min-height: 400px">No data found</h2>
    <?php } ?>

</div>


<?php
include_once("./footer.php");

?>
