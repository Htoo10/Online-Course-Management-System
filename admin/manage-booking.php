<?php include('partials/menu.php');?>

<div class="main-content">
    <div class="wrapper"> 
        <h1>Manage Booking</h1>
        <br/> <br/>

                <?php
                
                    if(isset($_SESSION['update'])){
                        echo $_SESSION['update'];
                        unset($_SESSION['update']);
                    }
                
                ?>
                <br><br>

                <!-- Button to Add Booking -->
                

                <table class= "tbl-full">
                    <tr>
                        <th>S.N</th>
                        <th>Course</th>
                        <th>Price</th>
                        <th>Qty.</th>
                        <th>Total</th>
                        <th>Order Date</th>
                        <th>Status</th>
                        <th>Customer Name</th>
                        <th>Contact</th>
                        <th>Email</th>
                        <th>Address</th>
                        <th>Actions</th>
                    </tr>

                    <?php
                        $sql="SELECT * FROM tbl_booking";

                        $res=mysqli_query($conn, $sql);

                        $count=mysqli_num_rows($res);

                        $sn=1;

                        if($count>0){
                            while($row=mysqli_fetch_assoc($res)){

                            
                            $id=$row['id'];
                            $course=$row['course'];
                            $price=$row['price'];
                            $qty=$row['qty'];
                            $total=$row['total'];
                            $booking_date=$row['booking_date'];
                            $status=$row['status'];
                            $customer_name=$row['customer_name'];
                            $customer_contact=$row['customer_contact'];
                            $customer_email=$row['customer_email'];
                            $customer_address=$row['customer_address'];
                            ?>
                            <tr>
                                <td><?php echo $sn++;?></td>
                                <td><?php echo $course;?></td>
                                <td><?php echo $price;?></td>
                                <td><?php echo $qty;?></td>
                                <td><?php echo $total;?></td>
                                <td><?php echo $booking_date;?></td>
                                <td><?php echo $status;?></td>
                                <td><?php echo $customer_name;?></td>
                                <td><?php echo $customer_contact;?></td>
                                <td><?php echo $customer_email;?></td>
                                <td><?php echo $customer_address;?></td>
                                <td>
                                    <a href="<?php echo SITEURL;?>admin/update-booking.php?id=<?php echo $id;?>" class="btn-secondary"> Update Booking</a> 
                                </td>
                            </tr>
                            <?php
                            }
                        }
                        else{
                            echo "<tr><td colspan='12' class='error'>Orders not Available</td></tr>";
                        }
                    ?>

                   
                </table>
    </div>
    
</div>

<?php include('partials/footer.php'); ?>