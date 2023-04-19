<?php
    include('../config/constants.php');?>
<?php include('partials/menu.php'); ?>

<div class="main-content">
            <div class="wrapper">
                <h1>Update Admin</h1>
                <br><br>

                <?php 
                $id= $_GET['id'];


                $sql="select * from tbl_admin where id=$id";

                $res=mysqli_query($connection,$sql);

                if($res==true){
                    $count= mysqli_num_rows($res);

                    if($count==1){
                        $row=mysqli_fetch_assoc($res);

                        $full_name=$row['full_name'];
                        $username=$row['username'];

                    }

                }


                ?>
                <form action="" method="POST">
                    <table class="tbl-30">
                        <tr>
                            <td>Full Name:</td>
                            <td> <input type="text" Name="full_name" value="<?php echo $full_name; ?>"></td>
                
                        </tr>

                        <tr>
                            <td>Username:</td>
                            <td> <input type="text" Name="username" value="<?php echo $username; ?>"></td>
                
                        </tr>

                        <tr>
                            <td colspan="2">
                                <input type="hidden" name="id" value="<?php echo $id; ?>">
                                <input type="submit" Name="submit" value="update admin" class="sub-primary">
                            </td>
                            
                
                        </tr>
                    </table>
                </form>


            </div>



<?php
if(isset($_POST['submit'])){
    $id = $_POST['id'];
    $full_name = $_POST['full_name'];
    $username = $_POST['username'];


    $query="update tbl_admin set full_name='".$_POST['full_name']."',username='".$_POST['username']."' where id=".$_POST['id'];

    if ($connection->query($query)==true) {
        echo "Data update";
        header("location:http://localhost:3000/Project/admin/manage_admin.php");
    }else{
        echo "failed";
    }
}

?>
<?php include('partials/footer.php'); ?>

    
