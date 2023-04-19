<?php include('../config/constants.php'); ?>
<?php

$query="insert into tbl_admin(full_name,username,password) 
values('".$_POST['full_name']."','".$_POST['username']."','".md5($_POST['password'])."')";
    if ($connection->query($query)==true) {
        echo "user registered";
        header("Location: http://localhost:3000/Project/admin/index.php");
    }else{
        echo "failed";
    }
