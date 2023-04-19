<?php
    include('../config/constants.php');?>
<?php include('partials/menu.php'); ?>

<div class="main-content">
            <div class="wrapper">
                <h1>Update Category</h1>
                <br><br>

                <?php 
        
        //Check whether the id is set or not
        if(isset($_GET['id']))
        {
            //Get the ID and all other details
            //echo "Getting the Data";
            $id = $_GET['id'];
            //Create SQL Query to get all other details
            $sql = "SELECT * FROM category WHERE id=$id";

            //Execute the Query
            $res = mysqli_query($connection, $sql);

            //Count the Rows to check whether the id is valid or not
            $count = mysqli_num_rows($res);

            if($count==1)
            {
                //Get all the data
                $row = mysqli_fetch_assoc($res);
                $title = $row['title'];
                $current_image = $row['image_name'];
                $featured = $row['featured'];
                $active = $row['active'];
            }
            else
            {
                //redirect to manage category with session message
                echo "failed";
                header("Location: http://localhost:3000/Project/admin/manage_categories.php");
            }

        }
        else
        {
            //redirect to Manage CAtegory
            header("Location: http://localhost:3000/Project/admin/manage_categories.php");
        }
    
    ?>
                <form action="" method="POST">
                    <table class="tbl-30">
                        <tr>
                            <td>Title:</td>
                            <td> <input type="text" Name="title" value="<?php echo $title; ?>"></td>
                
                        </tr>

                        <tr>
                    <td>Current Image: </td>
                    <td>
                        <?php 
                            if($current_image != "")
                            {
                                //Display the Image
                                ?>
                                <img src="../images/category/<?php echo $current_image; ?>" >
                                <?php
                            }
                            else
                            {
                                //Display Message
                                echo "<div class='error'>Image Not Added.</div>";
                            }
                        ?>
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
                                <input type="hidden" name="id" value="<?php echo $id; ?>">
                                <input type="submit" Name="submit" value="update admin" class="sub-primary">
                            </td>
                            
                
                        </tr>
                    </table>
                </form>


            </div>



            <?php 
        
        if(isset($_POST['submit']))
        {
            //echo "Clicked";
            //1. Get all the values from our form
            $id = $_POST['id'];
            $title = $_POST['title'];
            $current_image = $_POST['current_image'];
            $featured = $_POST['featured'];
            $active = $_POST['active'];

            //2. Updating New Image if selected
            //Check whether the image is selected or not
            if(isset($_FILES['image']['name']))
            {
                //Get the Image Details
                $image_name = $_FILES['image']['name'];

                //Check whether the image is available or not
                if($image_name != "")
                {
                    //Image Available

                    //A. UPload the New Image

                    //Auto Rename our Image
                    //Get the Extension of our image (jpg, png, gif, etc) e.g. "specialfood1.jpg"
                    $ext = end(explode('.', $image_name));

                    //Rename the Image
                    $image_name = "Food_Category_".rand(000, 999).'.'.$ext; // e.g. Food_Category_834.jpg
                    

                    $source_path = $_FILES['image']['tmp_name'];

                    $destination_path = "../images/category/".$image_name;

                    //Finally Upload the Image
                    $upload = move_uploaded_file($source_path, $destination_path);

                    //Check whether the image is uploaded or not
                    //And if the image is not uploaded then we will stop the process and redirect with error message
                    if($upload==false)
                    {
                        //SEt message
                        echo "failed";
                        //Redirect to Add CAtegory Page
                        header("Location: http://localhost:3000/Project/admin/manage_categories.php");
                        //STop the Process
                        die();
                    }

                    //B. Remove the Current Image if available
                    if($current_image!="")
                    {
                        $remove_path = "../images/category/".$current_image;

                        $remove = unlink($remove_path);

                        //CHeck whether the image is removed or not
                        //If failed to remove then display message and stop the processs
                        if($remove==false)
                        {
                            //Failed to remove image
                            echo "failed";
                            header("Location: http://localhost:3000/Project/admin/manage_categories.php");
                            die();//Stop the Process
                        }
                    }
                    

                }
                else
                {
                    $image_name = $current_image;
                }
            }
            else
            {
                $image_name = $current_image;
            }

            //3. Update the Database
            $sql2 = "UPDATE category SET 
                title = '$title',
                image_name = '$image_name',
                featured = '$featured',
                active = '$active' 
                WHERE id=$id
            ";

            //Execute the Query
            $res2 = mysqli_query($connection, $sql2);

            //4. REdirect to Manage Category with MEssage
            //CHeck whether executed or not
            if($res2==true)
            {
                //Category Updated
                echo "done";
                header("Location: http://localhost:3000/Project/admin/manage_categories.php");
            }
            else
            {
                //failed to update category
                echo "failed";
                header("Location: http://localhost:3000/Project/admin/manage_categories.php");
            }

        }
    
    ?>

</div>
</div>

<?php include('partials/footer.php'); ?>