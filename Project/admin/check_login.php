<?php include('../config/constants.php'); ?>
<?php

    if (!$connection) {
        echo "Failed";
    } else {
        $query = "select * from tbl_admin where username='" . $_POST['username'] . "' and password='" . md5($_POST['password']) . "'";
        $result = mysqli_query($connection, $query);
        if (mysqli_num_rows($result) > 0) {
            echo 'Successfully Logged in';
            header("Location: http://localhost:3000/Project/admin/index.php");
        } else {
            echo 'username or password incorrect';
            header("Location:http://localhost:3000/Project/admin/register.php");
        }
    }
