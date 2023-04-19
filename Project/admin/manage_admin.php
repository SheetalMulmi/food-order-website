<?php include('partials/menu.php'); ?>

        
        <!--main content section starts here-->
        <div class="main-content">
            <div class="wrapper">
                <h1>Manage admin</h1>
                <br /><br /><br />

                

                <!-- button to add Admin -->

                <a href="add_admin.php"class='sub-primary'>Add admin</a>

                <br /><br /><br />

                <table class="tbl-full">
                    <tr>
                        <th>S.N</th>
                        <th>Full_name</th>
                        <th>Username</th>
                        <th>Actions</th>
                        <!-- add buttons in action like update and stuff -->
                    </tr>


                    <?php 
                        $sql="select * from tbl_admin";//query to get all admin
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
                                $full_name=$rows['full_name'];
                                $username=$rows['username'];

                                //display the value in table
                                ?>

                                

                                <tr>
                                    <td><?php echo $id; ?></td>
                                    <td><?php echo $full_name; ?></td>
                                    <td><?php echo $username; ?></td>
                                    <td>
                                        <a href="update-admin.php?id=<?php echo $id ?>" class="sub-primary">Update Admin</a>
                                        <a href="Delete-admin.php?id=<?php echo $id ?>" class="sub-primary">Delete Admin</a>
                                    </td>
                                </tr>

                                <?php
                            }

                        }
                    ?>


                    
                </table>

                


            
            </div>
        </div>
        <!-- main content section ends here-->

<?php include('partials/footer.php'); ?>