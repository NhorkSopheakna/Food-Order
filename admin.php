
<?php include('partials/menu.php') ?>

<?php
include "fooddb.php";
?>
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<!-- Body Section Starts -->
    <div class="Main-Content">
        <div class="wrapper">
            <h1>Manage Admin</h1>
            <br />
			<?php 
                if(isset($_SESSION['add']))
                {
                    echo $_SESSION['add'];//Displaying Session Message
                    unset($_SESSION['add']);//Removing Session Message
                }
                if(isset($_SESSION['delete']))
                {
                    echo $_SESSION['delete'];//Displaying Session Message
                    unset ($_SESSION['delete']);//Removing Session Message
                }
                if(isset($_SESSION['update']))
                {
                    echo $_SESSION['update'];//Displaying Session Message
                    unset ($_SESSION['update']);//Removing Session Message
                }
                if(isset($_SESSION['user-not-found']))
                {
                    echo $_SESSION['user-not-found'];//Displaying Session Message
                    unset ($_SESSION['user-not-found']);//Removing Session Message
                }
                if(isset($_SESSION['pws-not-match']))
                {
                    echo $_SESSION['pws-not-match'];//Displaying Session Message
                    unset ($_SESSION['pws-not-match']);//Removing Session Message
                }
                if(isset($_SESSION['change-pws']))
                {
                    echo $_SESSION['change-pws'];//Displaying Session Message
                    unset ($_SESSION['change-pws']);//Removing Session Message
                }
            ?>
            <br><br><br>
			
            <!---Button Add Admin-->
            <a href="add-admin.php" class="btn-secondary">Add Admin</a>
            <br /> <br /> <br />


    <div class ="col-lg-12">

<table class="table table-striped">
    <thead>
      <tr>
	  <th>ID</th>
        <th>full_name</th>
        <th>username</th>
		<th>password</th>
		<th>Edit</th>
		<th>Delete</th>
      </tr>
    </thead>
    <tbody>
      
	<?php
	    $res=mysqli_query($link,"select * from tbl_admin");
		$sn=1; //Create a variable and Assign value
	    while($row=mysqli_fetch_array($res))
		{
			echo"<tr>";
	
			echo"<td>"; echo $sn++; echo"</td>";
			echo"<td>"; echo $row["full_name"]; echo"</td>";
			echo"<td>"; echo $row["username"]; echo"</td>";
			echo"<td>"; echo $row["password"]; echo"</td>";
			echo"<td>"; ?> <a href="chpass.php?id=<?php echo $row["id"];?>"><button type="button" class="btn btn-success">Change password</button></a> <?php echo"</td>";
			echo"<td>"; ?> <a href="edit.php?id=<?php echo $row["id"];?>"><button type="button" class="btn btn-success">Edit</button></a> <?php echo"</td>";
			echo"<td>"; ?> <a href="delete.php?id=<?php echo $row["id"];?>"><button type="button" class="btn btn-danger">Delete</button></a> <?php echo"</td>";		
			echo"</tr>";
			
		}
	?>
	  
    </tbody>
  </table>

</div>
</body>


<?php

if(isset($_POST["submit"]))
{
    //echo "Click!";
	mysqli_query($link,"insert into tbl_admin values(NULL,'$_POST[full_name]','$_POST[username]','$_POST[password]')");
	?>
	<script type="text/javascript">
	window.location.href=window.location.href;
	</script>
	<?php
}
/*if(isset($_POST["delete"]))
{
    $id = $_GET ['id'];
	mysqli_query($link,"delete from tbl_admin where id='$id'") or die(mysqli_error($link));
	?>
	<script type="text/javascript">
	window.location.href=window.location.href;
	</script>
	<?php
}*/
if(isset($_POST["update"]))
{
	mysqli_query($link,"update tbl_admin set full_name='$_POST[username]' where full_name='$_POST[full_name]'") or die(mysqli_error($link));
	?>
	<script type="text/javascript">
    window.location="admin.php";
    </script>
    <?php
}
?>

<!-- Body Section Ends -->



<?php include('partials/footer.php') ?>