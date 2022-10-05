<?php include('partials/menu.php') ?>

<?php
include "fooddb.php";
$id=$_GET["id"];
//$password="";
$res=mysqli_query($link,"SELECT * FROM tbl_admin WHERE id=$id");
  $row=mysqli_fetch_array($res);
      
      $full_name=$row['full_name'];
      $username=$row['username'];
      
?>


<body>

<div class="main-content">
    <div class="wrapper">
        <h1> Update Admin</h1>
        <br><br>
        <form action="" method="POST">
        <table class="tbl-30">
            <tr>
                <td>Full Name:</td>
                <td><input type="text" name="full_name" value="<?php echo $full_name; ?>"></td>
            </tr>

            <tr>
                <td>User Name:</td>
                <td><input type="text" name="username" value="<?php echo $username ?>"></td>
            </tr>
            <tr>
                <td> Update:</td>
                <td>
                <button type="submit" name="update" class="btn-secondary">Update</button>
                </td>
            </tr>

            
	
        </table>
        </form>
        
    </div>
</div>

</body>

<?php
if(isset($_POST["update"]))
{
	mysqli_query($link,"update tbl_admin set full_name='$_POST[full_name]',username='$_POST[username]',password='$_POST[password]' where id=$id");
	?>
<script type="text/javascript">
window.location="admin.php";
</script>
<?php
}
?>
<?php include('partials/footer.php'); ?>