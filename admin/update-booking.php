<?php include('partials/menu.php');?>

<div class="main-content">
    <div class="wrapper">
        <h1>Update Booking</h1>
        <br><br>

        <?php
        
        if(isset($_GET['id'])){
            $id= $_GET['id'];

            $sql="SELECT * FROM tbl_booking WHERE id=$id";

            $res=mysqli_query($conn, $sql);

            $count=mysqli_num_rows($res);

            if($count==1){
                $row=mysqli_fetch_assoc($res);

                $course=$row['course'];
                $price=$row['price'];
                $qty=$row['qty'];
                $status=$row['status'];
                $customer_name=$row['customer_name'];
                $customer_contact=$row['customer_contact'];
                $customer_email=$row['customer_email'];
                $customer_address=$row['customer_address'];
            }
            else{
                header('location:'.SITEURL.'admin/manage-booking.php');
            }
        }
        else{
            header('location:'.SITEURL.'admin/manage-booking.php');
        }
        
        ?>

        <form action="" method="POST">

        <table class="tbl_30">

        <tr>
            <td>Course Name</td>
            <td><b><?php echo $course;?></b></td>
        </tr>

        <tr>
            <td>Price</td>
            <td><b>$<?php echo $price;?></b></td>
        </tr>

        <tr>
            <td>Qty</td>
            <td>
                <input type="number" name="qty" value="<?php echo $qty;?>">
            </td>
        </tr>

        <tr>
            <td>Status</td>
            <td>
                <select name="status">
                    <option <?php if($status=="Booked"){echo "selected";}?> value="Booked">Booked</option>
                    <option <?php if($status=="Confirm"){echo "selected";}?> value="Confirm">Confirm</option>
                    <option <?php if($status=="Cancel"){echo "selected";}?> value="Cancel">Cancel</option>
                </select>
            </td>
        </tr>

        <tr>
            <td>Customer Name: </td>
            <td>
                <input type="text" name="customer_name" value="<?php echo $customer_name;?>">
            </td>
        </tr>

        <tr>
            <td>Customer Contact: </td>
            <td>
                <input type="text" name="customer_contact" value="<?php echo $customer_contact;?>">
            </td>
        </tr>

        <tr>
            <td>Customer Email: </td>
            <td>
                <input type="text" name="customer_email" value="<?php echo $customer_email;?>">
            </td>
        </tr>

        <tr>
            <td>Customer Address: </td>
            <td>
                 <textarea name="customer_address" cols="30" rows="5"><?php echo $customer_address;?></textarea>
            </td>
        </tr>

        <tr>
            <td colspan="2">
                <input type="hidden" name="id" value="<?php echo $id;?>">
                <input type="hidden" name="price" value="<?php echo $price;?>">

                <input type="submit" name="submit" value="Update Booking" class="btn-secondary">
            </td>
        </tr>
        </table>

        </form>

        <?php
            if(isset($_POST['submit'])){
                $id= $_POST['id'];
                $price= $_POST['price'];
                $qty= $_POST['qty'];
                $total= $price * $qty;
                $status=$_POST['status'];
                $customer_name= $_POST['customer_name'];
                $customer_contact= $_POST['customer_contact'];
                $customer_email= $_POST['customer_email'];
                $customer_address= $_POST['customer_address'];
            
                $sql2="UPDATE tbl_booking SET
                    qty=$qty,
                    total=$total,
                    status='$status',
                    customer_name='$customer_name',
                    customer_contact='$customer_contact',
                    customer_email='$customer_email',
                    customer_address='$customer_address',
                    WHERE id=$id";

                    $res2=mysqli_query($conn, $sql2);

                    if($res2==TRUE){
                        $_SESSION['update']="<div class='success'>Booking Updated Successfully</div>";
                        header('location:'.SITEURL.'admin/manage-booking.php');
                    }
                    else{
                        $_SESSION['update']="<div class='success'>Booking Updated Successfully</div>";
                        header('location:'.SITEURL.'admin/manage-booking.php');
                    }
            }
        ?>

    </div>
</div>

<?php include('partials/footer.php'); ?>