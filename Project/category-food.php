
 

    
    <?php include('partials-front/menu.php'); ?>

    <?php 
        //CHeck whether id is passed or not
        if(isset($_GET['category_id']))
        {
            //Category id is set and get the id
            $category_id = $_GET['category_id'];
            // Get the CAtegory Title Based on Category ID
            $sql = "SELECT title FROM category WHERE id=$category_id";

            //Execute the Query
            $res = mysqli_query($connection, $sql);

            //Get the value from Database
            $row = mysqli_fetch_assoc($res);
            //Get the TItle
            $category_title = $row['title'];
        }
        else
        {
            //CAtegory not passed
            //Redirect to Home page
            header('location:http://localhost:3000/Project');
        }
    ?>


    <!-- fOOD sEARCH Section Starts Here -->
    <section class="search-bar text-center">
        <div class="container">
            
            <h2>Foods on <a href="#" class="text-color">"<?php echo $category_title; ?>"</a></h2>

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->



    <!-- fOOD MEnu Section Starts Here -->
    <section class="food-menu">
        <div class="container">
            <h2 class="text-center">Food Menu</h2>

            <?php 
            
                //Create SQL Query to Get foods based on Selected CAtegory
                $sql2 = "SELECT * FROM food WHERE caterory_id=$category_id";

                //Execute the Query
                $res2 = mysqli_query($connection, $sql2);

                //Count the Rows
                $count2 = mysqli_num_rows($res2);

                //CHeck whether food is available or not
                if($count2>0)
                {
                    //Food is Available
                    while($row2=mysqli_fetch_assoc($res2))
                    {
                        $id = $row2['id'];
                        $title = $row2['title'];
                        $price = $row2['price'];
                        
                        $image_name = $row2['image_name'];
                        ?>
                        
                        <div class="food">
                            <div class="food-img">
                                <?php 
                                    if($image_name=="")
                                    {
                                        //Image not Available
                                        echo "Image not Available.";
                                    }
                                    else
                                    {
                                        //Image Available
                                        ?>
                                        <img src="http://localhost:3000/Project/images/food/<?php echo $image_name; ?>" alt="Pizza" class="img-responsive img-curve">
                                        <?php
                                    }
                                ?>
                                
                            </div>

                            <div class="food description">
                                <h4><?php echo $title; ?></h4>
                                <p class="food-price">Rs <?php echo $price; ?></p>
                                <p class="food-detail">
                                
                                </p>
                                <br>

                                <a href="order.php?food_id=<?php echo $id; ?>" class="sub sub-primary">Order Now</a>
                            </div>
                        </div>

                        <?php
                    }
                }
                else
                {
                    //Food not available
                    echo "Food not Available";
                }
            
            ?>

            

            <div class="clearfix"></div>

            

        </div>

    </section>
    <!-- fOOD Menu Section Ends Here -->

    <?php include('partials-front/footer.php'); ?>
