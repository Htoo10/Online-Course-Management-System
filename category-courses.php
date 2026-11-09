<?php include('partials-front/menu.php');?>

    <?php
        if(isset($_GET['category_id'])){
            $category_id=$_GET['category_id'];

            $sql="SELECT title FROM tbl_category WHERE id=$category_id";

            $res=mysqli_query($conn, $sql);

            $row=mysqli_fetch_assoc($res);

            $category_title=$row['title'];

        }
        else{
            header('location:'.SITEURL);
        }
    ?>

    <!-- Course sEARCH Section Starts Here -->
    <section class="course-search text-center">
        <div class="container">
            
            <h2>Courses on <a href="#" class="text-white">"<?php echo $category_title;?>"</a></h2>

        </div>
    </section>
    <!-- Course sEARCH Section Ends Here -->



    <!-- Course MEnu Section Starts Here -->
    <section class="course-menu">
        <div class="container">
            <h2 class="text-center">Courses</h2>

            <?php
                $sql2="SELECT * FROM tbl_course WHERE category_id=$category_id";

                $res2=mysqli_query($conn, $sql2);

                $count2=mysqli_num_rows($res2);

                if($count2>0){
                    while($row2=mysqli_fetch_assoc($res2)){
                        $id=$row2['id'];
                        $title=$row2['title'];
                        $price=$row2['price'];
                        $description=$row2['description'];
                        $image_name=$row2['image_name'];
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

    </section>
    <!-- Course Menu Section Ends Here -->

    <?php include('partials-front/footer.php');?>