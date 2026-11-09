<?php include('partials-front/menu.php');?>

    <?php
        if(isset($_GET['course_id'])){
            $course_id=$_GET['course_id'];

            $sql="SELECT * FROM tbl_course WHERE id=$course_id";

            $res=mysqli_query($conn, $sql);

            $count=mysqli_num_rows($res);

            if($count==1){
                $row=mysqli_fetch_assoc($res);

                $title=$row['title'];
                $price=$row['price'];
                $image_name=$row['image_name'];
            }
            else{
                header('location:'.SITEURL);
            }
        }
        else{
            header('location:'.SITEURL);
        }
    ?>

    <!-- Course sEARCH Section Starts Here -->
    <section class="course-search">
        <div class="container">
            
            <h2 class="text-center text-white">Fill this form to confirm your booking.</h2>

            <form action="" method="POST" class="booking">
                <fieldset>
                    <legend>Selected Course</legend>

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

                    <h3><?php echo $title;?></h3>
                    <input type="hidden" name="course" value="<?php echo $title;?>">

                    <p class="course-price">$<?php echo $price;?></p>
                    <input type="hidden" name="price" value="<?php echo $price;?>">

                    <div class="booking-label">Quantity</div>
                    <input type="number" name="qty" class="input-responsive" value="1" required>
                    <br>

                </div>

                </fieldset>
                
                <fieldset>
                    <legend>Booking Details</legend>
                    <div class="booking-label">Full Name</div>
                    <input type="text" name="full-name" placeholder="E.g. Htoo Wunna Aung" class="input-responsive" required>

                    <div class="booking-label">Phone Number</div>
                    <input type="tel" name="contact" placeholder="E.g. 09843xxxxxx" class="input-responsive" required>

                    <div class="booking-label">Email</div>
                    <input type="email" name="email" placeholder="E.g. hi@vijaythapa.com" class="input-responsive" required>

                    <div class="booking-label">Address</div>
                    <textarea name="address" rows="10" placeholder="E.g. Street, City, Country" class="input-responsive" required></textarea>

                    <input type="submit" name="submit" value="Confirm Booking" class="btn btn-primary">
                </fieldset>

            </form>

            <?php

            if(isset($_POST['submit'])){
                $course=$_POST['course'];
                $price=$_POST['price'];
                $qty=$_POST['qty'];

                $total= $price*$qty;

                $booking_date=date("Y-m-d h:i:sa");

                $status="Booked";

                $customer_name=$_POST['full-name'];
                $customer_contact=$_POST['contact'];
                $customer_email=$_POST['email'];
                $customer_address=$_POST['address'];

                $sql2="INSERT INTO tbl_booking SET
                    course='$course',
                    price=$price,
                    qty=$qty,
                    total=$total,
                    booking_date='$booking_date',
                    status='$status',
                    customer_name='$customer_name',
                    customer_contact='$customer_contact',
                    customer_email=' $customer_email',
                    customer_address='$customer_address'";

                $res2=mysqli_query($conn, $sql2);
    
                if($res2==TRUE){
                    $_SESSION['booking']="<div class='success text-center'>Course Booked Successfully</div>";
                    header('location:'.SITEURL);
                }
                else{
                    $_SESSION['booking']="<div class='error text-center'>Failed to Book</div>";
                    header('location:'.SITEURL);
                }
            }
            ?>

        </div>
    </section>
    <!-- Course sEARCH Section Ends Here -->

    <?php include('partials-front/footer.php');?>