<?php include('partials-front/menu.php');?>

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
            <a href="#">See All Courses</a>
        </p>
    </section>
    <!-- Course Menu Section Ends Here -->

<?php include('partials-front/footer.php');?>