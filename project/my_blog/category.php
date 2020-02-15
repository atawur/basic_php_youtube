<?php
    include('./db/db_connect.php');
    include ('./functions.php');
    redirect_login();
    check_admin_access();
    
?>
<?php 
$message = '';
 if(isset($_POST['category_save'])){
   extract($_POST);
    if(!$name){
      $message = "<div style='color:red'>Please input the name</div>";
    }
    else{
      $data = check_category_name($name);
       if($data){
          $message = "<div style='color:red'>THis Category already exists</div>";
       }else {
        save_category_info($name,$status);
        $message = "<div style='color:green'>Successfully Saved</div>";
       }

      
    }
  }
if(isset($_GET['id'])){
  $category_id = base64_decode($_GET['id']);
  $category = check_category_name(null, $category_id);
}
if(isset($_POST['category_update'])){
  $category_id = base64_decode($_GET['id']);
   extract($_POST);
   if(!$name){
    $message = "<div style='color:red'>Please input the name</div>";
  }
  else{
    $data = check_category_name($name,$category_id,true);
       if($data){
          $message = "<div style='color:red'>THis Category already exists</div>";
       }else {
           
           update_category($name,$status,$category_id);
           $message = "<div style='color:green'>Successfully Saved</div>";
           header('Location:category_list.php');
        
       }
    
  }
   
}

?>
<?php 
require_once("./header.php");
?>
<div class="container" style="min-height:500px !important ;">
<h3 style='text-align:center'>Category  List</h3>
<h4 style="text-align:center">
  <?php echo $message;?>
</h4>

<h2>Welcome </h2>
<div style="text-align:right;"><a href='./category_list.php' >Category List</a></div>
    <form method='post' action=''>
    <div class="form-group">
        <label for="first_name"> category Name</label>
        <input type="text" class="form-control" id="name" value="<?php if (isset($category['name'])){echo $category['name']; }?>" name='name' >
        <span style='color:red'><?php  ?></span>
    </div>
  <div class="form-group">
    <label for="first_name">Status</label>
    <select class="form-control" name ="status" style="border:1px solid #ccc">
        <option value='1' <?php if (isset($category['status']) && $category['status']==1){echo 'selected'; }?> >Active</option>
        <option value='2' <?php if (isset($category['status']) && $category['status']==2){echo 'selected'; }?> >In Active</option>
    </select>
    
    <span style='color:red'><?php  ?></span>
  </div>
  <br>
  <?php if(isset($_GET['id'])){ ?>
      <input type="submit" name='category_update' value="Update" style="margin-top:20px"/>
  <?php } else { ?>
      <input type="submit" name='category_save' value="Save" style="margin-top:20px"/>
  <?php } ?>
    </form>
</div>

<?php 
include_once("./footer.php");

?>
   