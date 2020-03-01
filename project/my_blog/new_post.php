<?php
$title_err = $category_id_err = $sort_description_err =  $full_description_err = $image_err='';
$title = $category_id = $sort_description = $full_description= '';
include('./db/db_connect.php');
include ('./functions.php');
redirect_login();
$user_info = get_userinfo();
$category_list = get_all_category();
$file_path = '';
if(isset($_POST['post_save'])){
    $submit = true;
    date_default_timezone_set('Asia/Dhaka');
    extract($_POST);
    $userid= $_SESSION['users_id'];
    $date = date('Y-m-d H:i:s');
    if(!$title){
        $submit = false;
        $title_err = 'Please Input the title';
    }
    if(!$category_id){
        $submit = false;
        $category_id_err = 'Please seelct category';
    }
    if(!$sort_description){
        $submit = false;
        $sort_description_err = 'Please Input the sort_description';
    }
    if(!$full_description){
        $submit = false;
        $full_description_err = 'Please Input the full_description';
     
    }
  
   if(empty($_FILES['feature_image']['name'])){
    $submit = false;
    $image_err = 'Please Select an Image';
 
   }else{
        $file_path_info = file_upload($_FILES,'feature_image');
        if(!$file_path_info['path']){
            $submit = false;
             $image_err = 'Please Select only jpg, jpeg, png & gif files';
        }else{
            $file_path  = $file_path_info['path'];
        }
       
       
   }
    

    if($submit){
        $sql = "insert into posts( `title`, `category_id`, `sort_description`, `full_description`, `feature_image`, `created_by`, `created`,`status`)values('$title', $category_id,' $sort_description', '$full_description', '$file_path', $userid, '$date',3)";
        $query = mysqli_query($conn,$sql);
        $title = $category_id = $sort_description = $full_description= '';
        $message= 'successfully saved';
    }else{
        if($file_path){
            unlink($file_path);
        }
    }
    
}

if(isset($_POST['post_update'])){
    $submit = true;
    date_default_timezone_set('Asia/Dhaka');
    extract($_POST);
    $postid = base64_decode($post_id);
    $userid= $_SESSION['users_id'];
    $date = date('Y-m-d H:i:s');
    if(!$title){
        $submit = false;
        $title_err = 'Please Input the title';
    }
    if(!$category_id){
        $submit = false;
        $category_id_err = 'Please seelct category';
    }
    if(!$sort_description){
        $submit = false;
        $sort_description_err = 'Please Input the sort_description';
    }
    if(!$full_description){
        $submit = false;
        $full_description_err = 'Please Input the full_description';
     
    }
  
   if($_FILES['feature_image']['name']){
        $file_path_info = file_upload($_FILES,'feature_image');
        if(!$file_path_info['path']){
            $submit = false;
             $image_err = 'Please Select only jpg, jpeg, png & gif files';
        }else{
            $file_path  = $file_path_info['path'];
        }
        $file_path_sql =  "feature_image='$file_path' ,";
 
   }else{
    $file_path_sql = '';
   }
    if($submit){
        $sql = " update posts set
         `title`='$title',
        `category_id`= $category_id,
        `sort_description`='$sort_description',
        `full_description`='$full_description',
         $file_path_sql
        `updated_by`=$userid,
        `updated`='$date',
        `status`=3 
         where id = $postid
        
        "

        
        ;
        $query = mysqli_query($conn,$sql);
        $message= 'successfully updated';
        $title = $category_id = $sort_description = $full_description= '';
    }else{
        if($file_path){
            unlink($file_path);
        }
    }
    
}
if(isset($_GET['id'])){
    $post_id = base64_decode($_GET['id']);
    $post_info = get_post_by_id($post_id);
    extract( $post_info);
    if($_SESSION['user_type_id'] !=1){
        $userid= $_SESSION['users_id'];
        if($userid !=$created_by){
            echo "<div style='color:red'>Un Authorized</div>";
            exit();
        }


    }
    //echo '<pre>';
    //print_r($post_info);
    
}

?>
<?php 
require_once("./header.php");
?>
<div class="container">
<h3 style='text-align:center'>Add New Post</h3>
<div style='color:green;font-weight:bold'>
    <?php 
        if(isset($message)){
            echo $message;
        }
    ?>
</div>
<form method='post' action='new_post.php' enctype="multipart/form-data">
    <div class="form-group">
            <label for="first_name"> Title</label>
            <input type="text" class="form-control" id="title" value="<?php echo $title?>" name='title' >
            <span style='color:red'><?php echo $title_err ?></span>
    </div>
    <div class="form-group">
    <label for="first_name">Category </label>
    <select class="form-control" name ="category_id" style="border:1px solid #ccc">
    <option value=''>Select Category</option>
       <?php while($row=mysqli_fetch_assoc($category_list)){?>
            <option value='<?php  echo $row['id'];?>' <?php if($category_id==$row['id']) { echo 'selected';}?>><?php  echo $row['name'];?></option>
       <?php } ?>
    </select>
    <br/>
    <span style='color:red'><?php echo $category_id_err; ?></span>
  </div>
    <div class="form-group">
            <label for="first_name"> Sort Description </label>
            <input type="text" class="form-control" id="sort_description" value="<?php echo $sort_description?>" name='sort_description' >
            <span style='color:red'><?php  echo $sort_description_err ;?></span>
    </div>
    <div class="form-group">
            <label for="first_name"> Full Description </label>
            <textarea type="text" class="form-control" id="full_description"  name='full_description' > <?php echo $full_description ;?></textarea>
            <span style='color:red'><?php echo $full_description_err; ?></span>
    </div>
    <div class="form-group">
        <label for="confirm_password">Select Feature Image</label>
        <input type="file" class="form-control" id="feature_image"  name='feature_image'>
        <span style='color:red'><?php echo $image_err;?></span>
    </div>
   <?php  if(isset($_GET['id'])){ ?>
        <div class="form-group">
            <label for="confirm_password"></label>
            <img src = '<?php echo $feature_image;?>' height='150' width='200'/>
        </div>
    <?php } ?>
    <?php  if(isset($_GET['id'])){ ?>
        <input type="submit" name='post_update' class='' value="Update" style="margin-top:20px"/>
        <input type='hidden' name='post_id' value="<?php echo base64_encode($id);?>"/>
    <?php } else{?>
        <input type="submit" name='post_save' class='' value="Save" style="margin-top:20px"/>
    <?php } ?>
</form>
</div>


<?php 
include_once("./footer.php");

?>
   