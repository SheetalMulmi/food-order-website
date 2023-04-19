<?php include('partials-front/menu.php'); ?>



    <!-- fOOD sEARCH Section Starts Here -->
    <section class="search-bar text-center">
        <div class="container">
            <?php 

                //Get the Search Keyword
                // $search = $_POST['search'];
                $search = mysqli_real_escape_string($connection, $_POST['search']);
            
            ?>


            <h2> Search <a href="#" class="text-color">"<?php echo $search; ?>"</a></h2>

        </div>
        <div class="clearfix">

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->



    <!-- fOOD MEnu Section Starts Here -->
    <section class="menu background">
        <div class="container">
        <h2 class="text-center">What you can get</h2>

        <<?php 

//SQL Query to Get foods based on search keyword
//$search = burger '; DROP database name;
// "SELECT * FROM tbl_food WHERE title LIKE '%burger'%' OR description LIKE '%burger%'";
$sql = "SELECT * FROM food WHERE title LIKE '%$search%'";

//Execute the Query
$res = mysqli_query($connection, $sql);

//Count Rows
$count = mysqli_num_rows($res);

//Check whether food available of not
if($count>0)
{
    //Food Available
    while($row=mysqli_fetch_assoc($res))
    {
        //Get the details
        $id = $row['id'];
        $title = $row['title'];
        $price = $row['price'];
        
        $image_name = $row['image_name'];
        ?>

        <div class="food">
            <div class="food-menu-img">
                <?php 
                    // Check whether image name is available or not
                    if($image_name=="")
                    {
                        //Image not Available
                        echo "Image not Available.";
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
                <p class="food-price">Rs <?php echo $price; ?></p>
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
    echo "Food not found.";
}

?>



<div class="clearfix"></div>



</div>

</section>
    <!-- fOOD Menu Section Ends Here -->

   

    <!-- footer section starts here -->
    <?php include('partials-front/footer.php'); ?>
    <!-- footer section ends here -->


</body>
</html>