<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Add Admin</h1>
        <br><br>

        <form action="" method="POST">
            <table class="tbl-30">
                <tr>
                    <td>Full Name</td>
                    <td> <input type="text" Name="full_name" placeholder="Enter your name"></td>
        
                </tr>

                <tr>
                    <td>Username</td>
                    <td>
                        <input type="text" name="username" placeholder='Username'>

                    </td>
                </tr>

                <tr>
                    <td>Password</td>
                    <td>
                        <input type="password" Name="password" placeholder="Your Password">
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Add Admin" class="sub-primary">

                    </td>
                </tr>

            </table>

        </form>
    </div>
</div>


<?php include('partials/footer.php'); ?>


<?php
// process the value from form and save it in database
// check whether the button is clicked or not

if(isset($_POST['submit']))
{
    // Button cliched
    // echo"clicked";


    // get data from form

    $full_name = $_POST['full_name'];
    $username = $_POST['username'];
    $password = md5($_POST['password']);  //password encrypted with md5

    // sql query to save the data into database
    $sql = "INSERT INTO tbl_admin SET 
        full_name='$full_name', 
        username='$username', 
        password='$password'
    ";

    // execute query and save in database

    $res= mysqli_query($connection, $sql);

    // check whether inserted or not
    if($res==TRUE){
        echo 'data inserted';
        header("location:http://localhost:3000/Project/admin/manage_admin.php");
    }
    else{
        echo"failed";
    }

}


?>