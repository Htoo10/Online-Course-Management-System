<?php include('partials-front/menu.php');?>

    <!-- Course sEARCH Section Starts Here -->
    <section class="course-search text-center">
        <div class="container">
            
            <form action="<?php echo SITEURL;?>course-search.php" method="POST">
                <input type="search" name="search" placeholder="Search for Course.." required>
                <input type="submit" name="submit" value="Search" class="btn btn-primary">
            </form>

        </div>
    </section>
    <!-- Course sEARCH Section Ends Here -->

    <?php
        if(isset($_SESSION['booking'])){
            echo $_SESSION['booking'];
            unset($_SESSION['booking']);
        }
    ?>

    <!-- CAtegories Section Starts Here -->
    <section class="categories">
        <div class="container">
            <h2 class="text-center">Grab Courses</h2>

            <?php
                $sql="SELECT * FROM tbl_category WHERE active='Yes' AND featured='Yes' LIMIT 3";

                $res=mysqli_query($conn, $sql);

                $count=mysqli_num_rows($res);

                if($count>0){
                    while($row=mysqli_fetch_assoc($res)){
                        $id= $row['id'];
                        $title=$row['title'];
                        $image_name=$row['image_name'];
                        ?>
                         <a href="<?php echo SITEURL;?>category-courses.php?category_id=<?php echo $id;?>">
                            <div class="box-3 float-container">
                            <?php 
                                    if($image_name==""){
                                        echo "<div class='error'>Image not Available</div>";
                                    }
                                    else{
                                        ?>
                                        <img src="<?php echo SITEURL;?>images/category/<?php echo $image_name;?>" class="img-responsive img-curve">
                                    
                                        <?php
                                        }
                            ?>
                            
                                
                             </div>
                        </a>
                        <?php
                    }
                }
                else{
                    echo "<div class='error'>Category not Added</div>";
                }
            

            ?>

            


            <div class="clearfix"></div>
        </div>
    </section>
    <!-- Categories Section Ends Here -->

    <!-- Course MEnu Section Starts Here -->
    <section class="course-menu">
        <div class="container"> 
            <h2 class="text-center">Courses</h2>

            <?php
                $sql2="SELECT * FROM tbl_course WHERE active='Yes' AND featured='Yes' LIMIT 6";

                $res2=mysqli_query($conn, $sql2);

                $count2=mysqli_num_rows($res2);

                if($count2>0){
                    while($row=mysqli_fetch_assoc($res2)){
                        $id= $row['id'];
                        $title=$row['title'];
                        $price=$row['price'];
                        $image_name=$row['image_name'];
                        ?>

                        <div class="course-menu-box">
                                        <div class="course-menu-img">
                                            <?php
                                                if($image_name==""){
                                                    echo "<div class='error'>Image not Available</div>";
                                                }
                                                else{
                                                    ?>
                                                    <img src="<?php echo SITEURL;?>images/course/<?php echo $image_name;?>" class="img-responsive img-curve">
                                                    <?php
                                                }
                                            ?>
                                           
                                        </div>

                                        <div class="course-menu-desc">
                                            <h4><?php echo $title;?></h4>
                                            <p class="course-price">$<?php echo $price;?></p>
                                            <p class="course-detail">
                                            No.(15), 5th floor, 150th street, Tarmwe <br>
                                                0979347011
                                            </p>
                                            <br>

                                            <a href="<?php echo SITEURL;?>booking.php?course_id=<?php echo $id;?>" class="btn btn-primary">Book Now</a>
                                        </div>
                        </div>
                        <?php
                    }
                }
                else{
                    echo "<div class='error'>Course not Available</div>";
                }
            

            ?>

            


            <div class="clearfix"></div>

            

        </div>

        <p class="text-center">
            <a href="<?php echo SITEURL;?>courses.php">See All Courses</a>
        </p>
    </section>
    <!-- Course Menu Section Ends Here -->

<?php include('partials-front/footer.php');?>