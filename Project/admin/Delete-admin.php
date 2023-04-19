<?php
    include('../config/constants.php');
    $id = $_GET['id'];

    $query="DELETE FROM tbl_admin where id=$id";
    if ($connection->query($query)==true) {
        echo "Data deleted";
        header("Location: http://localhost:3000/Project/admin/manage_admin.php");
    }else{
        echo "failed";
    }


?>
