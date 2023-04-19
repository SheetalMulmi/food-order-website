<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class= "wrapper">
        <h1> manage categories</h1>

        <br /><br /><br />

                <!-- button to add Admin -->

                <a href="add-categories.php"class='sub-primary'>Add category</a>

                <br /><br /><br />

                <table class="tbl-full">
                    <tr>
                        <th>S.N</th>
                        <th>Title</th>
                        <th>Image</th>
                        <th>Featured</th>
                        <th>Active</th>
                        <th>Actions</th>
                        <!-- add buttons in action like update and stuff -->
                    </tr>


                    <?php 
                        $sql="select * from category";//query to get all admin
                        $res= mysqli_query($connection,$sql);// execute the query

                        //check
                        if ($res==TRUE){
                            //count the rows to check whether we have data in database or not
                            $count = mysqli_num_rows($res);//function to get all the rows in database
                        }

                        if($count>0){
                            while($rows=mysqli_fetch_assoc($res)){
                                //using while loop to get all the data from database
                                $id=$rows['id'];
                                $title=$rows['title'];
                                $image_name=$rows['image_name'];
                                $featured=$rows['featured'];
                                $active=$rows['active'];

                                //display the value in table
                                ?>

                                

                                <tr>
                                    <td><?php echo $id; ?></td>
                                    <td><?php echo $title; ?></td>
                                    <td><?php echo $image_name; ?></td>
                                    <td><?php echo $featured; ?></td>
                                    <td><?php echo $active; ?></td>
                                    <td>
                                        <a href="update_category.php?id=<?php echo $id ?>" class="sub-primary">Update Category</a>
                                        <a href="delete_category.php?id=<?php echo $id ?>" class="sub-primary">Delete Category</a>
                                    </td>
                                </tr>

                                <?php
                            }

                        }
                    
                    

                        else{
                            ?>
                            <tr>
                                <td colspan="6">
                                    <div class="">No category added</div>
                                </td>
                            </tr>
                            <?php
                        }
                            

                    
                                ?>


                    

                    
                </table>

    </div>
</div>
<?php include('partials/footer.php'); ?>