<?php
include "fooddb.php";
?>

<?php include('partials/menu.php') ?>    
  
    <div class="main-content">
    <div class="wrapper">
        <h1> Add Admin</h1>
        <br><br>
        <?php 
            if(isset($_SESSION['exit']))
                {
                    echo $_SESSION['exit'];//Displaying Session Message
                    unset ($_SESSION['exit']);//Removing Session Message 
                }
        ?>

        <form action="" method="POST">
        <table class="tbl-30">
            <tr>
                <td>Full Name:</td>
                <td><input type="text" name="full_name" placeholder="Input Your Name"></td>
            </tr>

            <tr>
                <td>User Name:</td>
                <td><input type="text" name="username" placeholder="Your User Name"></td>
            </tr>

            <tr>
                <td>Password:</td>
                <td>
                    <input type="password" name="password" placeholder="Your Password">
                </td>
            </tr>

            <tr>
                <td colspan="2">
                    <input type="submit" name="submit" value="Add Admin" class="btn-secondary">
                </td>
            </tr>
        </table>
        </form>
        
    </div>
    </div>
<?php include('partials/footer.php'); ?>

<div class ="col-lg-12">

<table class="table table-striped">

  </table>

</div>
</body>

<?php
    
    $username="";
    if(isset($_POST["submit"]))
    {
        $username = $_POST['username'];
        $sql_u = "SELECT * FROM tbl_admin WHERE username = '$username'";
        $res_u =mysqli_query( $link, $sql_u);

        if (mysqli_num_rows($res_u) ==1) {
            $_SESSION['exit'] = "<div class='error'>User exit. Try Again with other username.</div>";
            //Redirect to Manage Category
            header('location:'.SITEURL.'admin/add-admin.php'); 
        
        //echo "Click!";
        }else
        {
            mysqli_query($link,"insert into tbl_admin values(NULL,'$_POST[full_name]','$_POST[username]',md5('$_POST[password]'))");
            ?>
            <script type="text/javascript">
            window.location="admin.php";
            </script>

            <?php
        }
    }

?>
