<?php
    include('./db/db_connect.php');
    include ('./functions.php');
    redirect_login();
    check_admin_access();
    require_once("./header.php");
?>

<?php 

if(isset($_GET['id'])){
    $id = base64_decode($_GET['id']);
    delete_category($id);
    $_SESSION['message']="Succesfully deleted";
} 
    $rs = get_all_category();
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
<h3 style='text-align:center'>Category  List</h3>

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
        <th>Name</th>
        <th>Status</th>
        <th>Created at</th>
        <th>Actions</th>
    </tr>

    <?php 
    $sl =1;
    while($row=mysqli_fetch_assoc($rs)){?>
        <tr>
            <td><?php echo $sl++;?></td>
            <td><?php echo $row['name'];?></td>
            <td><?php echo $row['category_name'];?></td>
            <td><?php echo $row['created_at'];?></td>
            <td>
                <a href="./category.php?id=<?php echo base64_encode($row['id']); ?>">Edit</a> |
                <a href='./category_list.php?id=<?php echo base64_encode($row['id']); ?>'>Delete</a>
            </td>
        </tr>
    <?php } ?>
    </table>
</div>

<?php 
include_once("./footer.php");

?>
   