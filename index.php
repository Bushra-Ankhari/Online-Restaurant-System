    <?php include('partials-front/menu.php'); ?>

    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search text-center">
        <div class="container">
            
            <form action="<?php echo SITEURL; ?>food-search.php" method="POST">
                <input type="search" name="search" placeholder="Search for Food.." required>
                <input type="submit" name="submit" value="Search" class="btn btn-primary">
            </form>

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->

    <br>
<h1 align="center" class="story">
    WE CHANGED THE GAME.
</h1>
<hr bgcolor="black" style="width:50%; height: 2px; margin: auto; margin-bottom: 17px;">
<pre class="story-details">
    In 2009, we opened our doors at a very small Chittagong storefront with a very big idea. Instead of fast food, we’d serve fast fuel: 
                 shakes that were delicious, nutritious, and protein-packed.
 It was a success from the start but quickly became something even bigger... a game changer. We saw what was happening and got
 excited. Let’s keep going. So we discovered quinoa and expanded the menu to serve a full selection of high-protein salads, wraps,
 and bowls customizable for all diets. Every body loved it. The all-day power of protein grew in popularity. We all started eating,
                      feeling and moving better. It’s all good.
All these years and successes later, we never forget where we came from. We started a protein-powered movement from that 
                    small storefront. And we’re still going strong.
</pre>
<!-- carousel starts here -->
<div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="3" aria-label="Slide 4"></button>
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="4" aria-label="Slide 5"></button>
   
    </div>
    <div class="carousel-inner">
      <div class="carousel-item active" >
        <img src="images/new39.jpeg" class="d-block w-100" alt="pie" style="height:600px; width:100%;">
        <div class="carousel-caption d-none d-md-block">
          <h1>CREAMY. DREAMY. <BR>DELICIOUS.</h1>
          <p>Get a fresh start with our cookies which go straight to the heart through your mouth</p>
        </div>
      </div>
      <div class="carousel-item">
        <img src="images/new29.jpeg" class="d-block w-100" alt="pie" style="height:600px; width:100%;">
        <div class="carousel-caption d-none d-md-block">
            <h1>POWER PLAN</h1>
            <p>Exclusive first look</p>
            <p>'BITES' offers delicious, nutritious, and protein-packed meals</p>
          </div>
      </div>
      <div class="carousel-item">
        <img src="images/new26.jpeg" class="d-block w-100" alt="pie" style="height:600px; width:100%;">
        <div class="carousel-caption d-none d-md-block">
            <h1>LEAN. CLEAN. CRAVE-WORTHY.</h1>
            <p>Feed into your craving with a new spring menu featuring never ever,lean braised meat</p>
          </div>
      </div>
      <div class="carousel-item">
        <img src="images/new35.jpeg" class="d-block w-100" alt="pie" style="height:600px; width:1200px;">
        <div class="carousel-caption d-none d-md-block">
            <h1>WE LOVE LATTE</h1>
            <p>The flavor that brings life to your body in the morning.</p>
          </div>
      </div>
      <div class="carousel-item">
        <img src="images/new21.jpeg" class="d-block w-100" alt="pie" style="height:600px; width:1200px;">
        <div class="carousel-caption d-none d-md-block">
            <h1>JUST LIKE HOME</h1>
            <p>Everyting we bake, we bake with LOVE.</p>
          </div>
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>

  </div>
<!--carousel section ends here-->
    <?php 
        if(isset($_SESSION['order']))
        {
            echo $_SESSION['order'];
            unset($_SESSION['order']);
        }
    ?>
    
    
    <!-- CAtegories Section Starts Here -->
    <section class="categories">
        <div class="container">
            <h2 class="text-center">Explore Foods</h2>

            <?php 
                //Create SQL Query to Display CAtegories from Database
                $sql = "SELECT * FROM tbl_category WHERE active='Yes' AND featured='Yes' LIMIT 3";
                //Execute the Query
                $res = mysqli_query($conn, $sql);
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
                        
                        <a href="<?php echo SITEURL; ?>category-foods.php?category_id=<?php echo $id; ?>">
                            <div class="box-3 float-container">
                                <?php 
                                    //Check whether Image is available or not
                                    if($image_name=="")
                                    {
                                        //Display MEssage
                                        echo "<div class='error'>Image not Available</div>";
                                    }
                                    else
                                    {
                                        //Image Available
                                        ?>
                                        <img src="<?php echo SITEURL; ?>images/category/<?php echo $image_name; ?>" alt="Pizza" class="img-responsive img-curve">
                                        <?php
                                    }
                                ?>
                                

                                <h3 class="float-text text-white"><?php echo $title; ?></h3>
                            </div>
                        </a>

                        <?php
                    }
                }
                else
                {
                    //Categories not Available
                    echo "<div class='error'>Category not Added.</div>";
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
            $sql2 = "SELECT * FROM tbl_food WHERE active='Yes' AND featured='Yes' LIMIT 6";

            //Execute the Query
            $res2 = mysqli_query($conn, $sql2);

            //Count Rows
            $count2 = mysqli_num_rows($res2);

            //CHeck whether food available or not
            if($count2>0)
            {
                //Food Available
                while($row=mysqli_fetch_assoc($res2))
                {
                    ?> 
                    <form action="manage_cart.php" method="POST">
                        <?php
                    //Get all the values
                    $id = $row['id'];
                    $title = $row['title'];
                    $price = $row['price'];
                    $description = $row['description'];
                    $image_name = $row['image_name'];
                    ?>

                    <div class="food-menu-box">
                        <div class="food-menu-img">
                            <?php 
                                //Check whether image available or not
                                if($image_name=="")
                                {
                                    //Image not Available
                                    echo "<div class='error'>Image not available.</div>";
                                }
                                else
                                {
                                    //Image Available
                                    ?>
                                    <img src="<?php echo SITEURL; ?>images/food/<?php echo $image_name; ?>" alt="Chicke Hawain Pizza" class="img-responsive img-curve">
                                    <?php
                                }
                            ?>
                            
                        </div>

                        <div class="food-menu-desc">
                            <h4><?php echo $title; ?></h4>
                            <p class="food-price" style="color:black;">$<?php echo $price; ?></p>
                            <p class="food-detail">
                                <?php echo $description; ?>
                            </p>
                            <br>
                            <button type="submit" name="review" class="btn btn-primary"> <a href="<?php echo SITEURL; ?>review.php">REVIEW</a></button>
                            <button type="submit" name="Add_To_Cart" class="btn btn-primary">Add To Cart</button>
                                <input type="hidden" name="Item_Name" value="<?= $title; ?>">
                                <input type="hidden" name="Price" value="<?= $price;?>">
                            <!-- <a href="<?php echo SITEURL; ?>order.php?food_id=<?php echo $id; ?>" class="btn btn-primary">Add To Cart</a> -->
                        </div>
                    </div>

                    <?php
                }
            }
            else
            {
                //Food Not Available 
                echo "<div class='error'>Food not available.</div>";
            }
            
            ?>

            

 

            <div class="clearfix"></div>

            

        </div>

        <p class="text-center">
            <a href="foods.php">See All Foods</a>
        </p>
    </section>
    <!-- fOOD Menu Section Ends Here -->

    
    <?php include('partials-front/footer.php'); ?>