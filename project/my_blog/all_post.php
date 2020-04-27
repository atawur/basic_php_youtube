<?php
    include('./db/db_connect.php');
    include ('./functions.php');
    redirect_login();
    //check_admin_access();
    require_once("./header.php");
?>

<style>
#customers {
  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #4CAF50;
  color: white;
}
</style>
<div class="container" style="min-height:500px !important ;">
<h3 style='text-align:center'>All Post  List</h3>

    <h2>Welcome</h2>
    <h4>
     <?php
      if(isset($_SESSION['message'])){
          echo $_SESSION['message'];
          unset($_SESSION['message']);
      }
     ?>
    </h4>
    <table id="customers">
    <tr>
        <th>Sl</th>
        <th>Title</th>
        <th>Category</th>
        <th>Created By</th>
        <th>Created at</th>
        <th>Status</th>
        <th>Actions</th>
    </tr>

    <?php
    if($_SESSION['user_type_id'] ==1){
        $where = '';
    }else{
        $user_id =  $_SESSION['users_id'];
        $where = " where posts.created_by= $user_id";
    }
    $rs = get_all_post($where);
    $sl =1;
    if($rs){
    while($row=mysqli_fetch_assoc($rs)){?>
        <tr>
            <td><?php echo $sl++;?></td>
            <td><?php echo $row['title'];?></td>
            <td><?php echo $row['category_name'];?></td>
            <td><?php echo $row['first_name'] . ' ' .$row['middle_name'].' ' .$row['last_name'];?></td>
            <td><?php echo $row['created'];?></td>
            <td><?php echo $row['status_name'];?></td>
            <td>
                <a href="./new_post.php?id=<?php echo base64_encode($row['id']); ?>">Edit</a> |
                <a href="./view_post.php?id=<?php echo base64_encode($row['id']); ?>">View</a>
            </td>
        </tr>
    <?php } } ?>
    </table>
</div>

<?php
include_once("./footer.php");

?>
