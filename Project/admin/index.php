<?php include('partials/menu.php'); ?>
        
        <!--main content section starts here-->
        <div class="main-content">
            <div class="wrapper">
            <h1>Dashboard</h1>

            <div class="box4 text-center">
                <?php
                $sql= "select * from category";

                $res= mysqli_query($connection, $sql);

                $count= mysqli_num_rows($res);

                
                ?>
                <h1><?php echo $count;?></h1>
                <br>
                categories
            </div>

            <div class="box4 text-center">
            <?php
                $sql1= "select * from food";

                $res1= mysqli_query($connection, $sql1);

                $count1= mysqli_num_rows($res1);

                
                ?>
                <h1><?php echo $count1;?></h1>
                <br>
                Food
            </div>

            <div class="box4 text-center">
            <?php
                $sql2= "select * from tb_order";

                $res2= mysqli_query($connection, $sql2);

                $count2= mysqli_num_rows($res2);

                
                ?>
                <h1><?php echo $count2;?></h1>
                <br>
                Order
            </div>

            
            <div class= "clearfix"></div>
            </div>
        </div>
        <!-- main content section ends here-->

<?php include('partials/footer.php'); ?>