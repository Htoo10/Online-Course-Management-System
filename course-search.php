<?php include('partials-front/menu.php');?>

    <!-- Course sEARCH Section Starts Here -->
    <section class="course-search text-center">
        <div class="container">
            
            <?php
                $search=$_POST['search'];
            ?>

            <h2>Courses on Your Search <a href="#" class="text-white">"<?php echo $search;?>"</a></h2>

        </div>
    </section>
    <!-- Course sEARCH Section Ends Here -->



    <!-- Course MEnu Section Starts Here -->
    <section class="course-menu">
        <div class="container">
            <h2 class="text-center">Courses</h2>

            <?php

                $sql="SELECT * FROM tbl_course WHERE title LIKE '%$search%' OR description LIKE '%$search%'";

                $res=mysqli_query($conn, $sql);

                $count=mysqli_num_rows($res);

                if($count>0){
                    while($row=mysqli_fetch_assoc($res)){
                        $id= $row['id'];
                        $title= $row['title'];
                        $price= $row['price'];
                        $description= $row['description'];
                        $image_name= $row['image_name'];
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

                    <a href="booking.html" class="btn btn-primary">Book Now</a>
                </div>
            </div>
                        <?php
                    }
                }
                else{
                    echo "<div class='error'>Food not Found</div>";
                }
            ?> 
            <div class="clearfix"></div>

            

        </div>

    </section>
    <!-- Course Menu Section Ends Here -->

    <?php include('partials-front/footer.php');?>