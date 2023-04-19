<<?php include('partials-front/menu.php'); ?>
    <!-- fOOD sEARCH Section Starts Here -->
    <section class="search-bar text-center">
        <div class="container">
            
            <form action="food-search.php" method="POST">
                <input type="search" name="search" placeholder="Search" required>
                <input type="submit" name="submit" value="Search" class="sub sub-primary">
            </form>

        </div>
        <div class="clearfix"></div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->



    <section class="menu background2">
        <div class="container">
        <h2 class="text-center">What you can get</h2>

        <?php 
                //Display Foods that are Active
                $sql = "SELECT * FROM food WHERE active='Yes'";

                //Execute the Query
                $res=mysqli_query($connection, $sql);

                //Count Rows
                $count = mysqli_num_rows($res);

                //CHeck whether the foods are availalable or not
                if($count>0)
                {
                    //Foods Available
                    while($row=mysqli_fetch_assoc($res))
                    {
                        //Get the Values
                        $id = $row['id'];
                        $title = $row['title'];
                       
                        $price = $row['price'];
                        $image_name = $row['image_name'];
                        ?>
                        
                        <div class="food">
                            <div class="food-img">
                                <?php 
                                    //CHeck whether image available or not
                                    if($image_name=="")
                                    {
                                        //Image not Available
                                        echo "Image not Available.";
                                    }
                                    else
                                    {
                                        //Image Available
                                        ?>
                                        <img src="http://localhost:3000/Project/images/food/<?php echo $image_name; ?>" alt="Chicke Hawain Pizza" class="img-responsive img-curve "width="100px" >
                                        <?php
                                    }
                                ?>
                                
                            </div>

                            <div class="food-description">
                                <h4><?php echo $title; ?></h4>
                                <p class="food-price">RS <?php echo $price; ?></p>
                                <p class="food-detail">
                                    
                                </p>
                                <br>

                                <a href="http://localhost:3000/Project/order.php?food_id=<?php echo $id; ?>" class="sub sub-primary">Order Now</a>
                            </div>
                        </div>

                        <?php
                    }
                }
                else
                {
                    //Food not Available
                    echo "Food not found";
                }
            ?>

            

            

            <div class="clearfix"></div>

            

        </div>

    </section>
    <!-- fOOD Menu Section Ends Here -->

    <?php include('partials-front/footer.php'); ?>