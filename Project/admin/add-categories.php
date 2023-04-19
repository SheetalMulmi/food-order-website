
<?php include('partials/menu.php'); ?>


<div class="main-content">
    <div class="wrapper">
        <h1> add category</h1>

        <br><br>

        <form action="" method="post" enctype="multipart/form-data">
            <table class="tbl-30">
                <tr>
                    <td>Title:</td>
                    <td>
                        <input type="text" name="title" placeholder="Category Title">
                    </td>
                </tr>
                <tr>
                    <td>
                        Select Image
                    </td>
                    <td>
                        <input type="file" name="image">
                    </td>
                </tr>
                <tr>
                    <td>Featured:</td>
                    <td>
                        <input type="radio" name="featured" value="Yes">Yes
                        <input type="radio" name="featured" value="No">No
                    </td>
                </tr>

                <tr>
                    <td>Active:</td>
                    <td>
                        <input type="radio" name="active"value="Yes">Yes
                        <input type="radio" name="active"value="No">No
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Add Category" class="sub-primary">
                    </td>
                </tr>
                
            </table>
        </form>

        <?php 
            if(isset($_POST['submit'])) {
                // echo "clicked";

                $title = $_POST['title'];
                
                if(isset($_POST['featured'])){
                    $featured = $_POST['featured'];
                }else{
                    $featured="No";
                }


                if(isset($_POST['active'])){
                    $active = $_POST['active'];
                }else{
                    $active="No";
                }
                // print_r($_FILES['image']);

                // die();
                

                if(isset($_FILES['image']['name'])){
                    $image_name = $_FILES['image']['name'];
                    $source_path = $_FILES['image']['tmp_name'];
                    $destination_path = "../images/category/".$image_name;
                    

                    $upload=move_uploaded_file($source_path,$destination_path);

                    if($upload==false){
                        echo "success";
                        header("location: http://localhost:3000/Project/admin/add-categories.php");

                        die();
                    }
                }else{
                    echo "fail";
                    $image_name="";
                }
                $sql = "INSERT INTO category SET
                title='$title',
                image_name= '$image_name', 
                featured='$featured', 
                active='$active'
                ";

                $res= mysqli_query($connection, $sql);

                // check whether inserted or not
                if($res==TRUE){
                    echo 'data inserted';
                    header("Location: http://localhost:3000/Project/admin/manage_categories.php");
                }
                else{
                    echo"failed";
                }

                
            }
            
        ?>
    </div>
</div>
<?php include('partials/footer.php'); ?>

