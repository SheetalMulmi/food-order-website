<?php include('partials-front/menu.php'); ?>

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

    

    <!-- CAtegories Section Starts Here -->
    <section class="categories">
        <div class="container">
            <h2 class="text-center">Categories</h2>

            <?php 
                //Create SQL Query to Display CAtegories from Database
                $sql = "SELECT * FROM category WHERE active='Yes' AND featured='Yes' LIMIT 4";
                //Execute the Query
                $res = mysqli_query($connection, $sql);
                //Count rows to check whether the category is available or not
                $count = mysqli_num_rows($res);

                if($count>0)
                {
                    //CAtegories Available
                    while($row=mysqli_fetch_assoc($res))
                    {
                        //Get the Values like id, title, image_name
                        $id = $row['id'];
                        $title = $row['title'];
                        $image_name = $row['image_name'];
                        ?>
                        
                        <a href="http://localhost:3000/Project/category-food.php?category_id=<?php echo $id; ?>">
                            <div class="box-3 float-container">
                                <?php 
                                    //Check whether Image is available or not
                                    if($image_name=="")
                                    {
                                        //Display MEssage
                                        echo "Image not Available";
                                    }
                                    else
                                    {
                                        //Image Available
                                        ?>
                                        <img src="http://localhost:3000/Project/images/category/<?php echo $image_name; ?>" alt="Pizza" class="img-responsive img-curve">
                                        <?php
                                    }
                                ?>
                                

                                <h3 class="float-text text-color"><?php echo $title; ?></h3>
                            </div>
                        </a>

                        <?php
                    }
                }
                else
                {
                    //Categories not Available
                    echo "Category not Added";
                }
            ?>


            <div class="clearfix"></div>
        </div>
    </section>
    <!-- Categories Section Ends Here -->



    <!-- fOOD MEnu Section Starts Here -->
    <section class="food-menu">
        <div class="container">
            <h2 class="text-center">Food Menu</h2>

            <?php 
            
            //Getting Foods from Database that are active and featured
            //SQL Query
            $sql2 = "SELECT * FROM food WHERE active='Yes' AND featured='Yes' LIMIT 6";

            //Execute the Query
            $res2 = mysqli_query($connection, $sql2);

            //Count Rows
            $count2 = mysqli_num_rows($res2);

            //CHeck whether food available or not
            if($count2>0)
            {
                //Food Available
                while($row=mysqli_fetch_assoc($res2))
                {
                    //Get all the values
                    $id = $row['id'];
                    $title = $row['title'];
                    $price = $row['price'];
                   
                    $image_name = $row['image_name'];
                    ?>

                    <div class="food">
                        <div class="food-menu-img">
                            <?php 
                                //Check whether image available or not
                                if($image_name=="")
                                {
                                    //Image not Available
                                    echo "Image not available.";
                                }
                                else
                                {
                                    //Image Available
                                    ?>
                                    <img src="http://localhost:3000/Project/images/food/<?php echo $image_name; ?>" alt="blueberry" class="img-responsive img-curve food-img">
                                    <?php
                                }
                            ?>
                            
                        </div>

                        <div class="food-description">
                            <h4><?php echo $title; ?></h4>
                            <p class="food-price">Rs<?php echo $price; ?></p>
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
                //Food Not Available 
                echo "Food not available";
            }
            
            ?>

            

 

            <div class="clearfix"></div>

            

        </div>

        <p class="text-center">
            <a href="food.php">See All Foods</a>
        </p>
    </section>
    <!-- fOOD Menu Section Ends Here -->

    
    <?php include('partials-front/footer.php'); ?>