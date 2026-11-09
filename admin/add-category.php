<?php include('partials/menu.php');?>

<div class="main-content">
    <div class="wrapper">
        <h1>Add Category</h1>
        <br><br>

        <?php
            if(isset($_SESSION['add'])){
                echo $_SESSION['add'];
                unset($_SESSION['add']);
            }
            if(isset($_SESSION['upload'])){
                echo $_SESSION['upload'];
                unset($_SESSION['upload']);
            }
        ?>
        <br><br>
        <!-- Add Category Form Starts -->
        <form action="" method="POST" enctype="multipart/form-data">
            <table class="tbl-30">
                <tr>
                    <td>Title: </td>
                    <td>
                        <input type="text" name="title" placeholder="Category Title">
                    </td>
                </tr>

                <tr>
                    <td>Select Image:</td>
                    <td>
                        <input type="file" name="image">
                    </td>
                </tr>
                <tr>
                    <td>Featured: </td>
                    <td>
                        <input type="radio" name="featured" value="Yes"> Yes
                        <input type="radio" name="featured" value="No"> No
                    </td>
                </tr>
                <tr>
                    <td>Active: </td>
                    <td>
                        <input type="radio" name="active" value="Yes"> Yes
                        <input type="radio" name="active" value="No"> No
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Add Category" class="btn-secondary">
                    </td>
                </tr>
            </table>
        </form>
        <!-- Add Category Form Ends -->

        <?php
            if(isset($_POST['submit'])){
                $title= $_POST['title'];

                if(isset($_POST['featured'])){
                    $featured= $_POST['featured'];
                }
                else{
                    $featured="No";
                }
                if(isset($_POST['active'])){
                    $active= $_POST['active'];
                }
                else{
                    $active="No";
                }

                // Check whether the image is selected or not and set the value for image name accordingly   
                //print_r($_FILES['image']);

                //die(); //Break the code here

                if(isset($_FILES['image']['name'])){
                    //Upload the image
                    //To upload image we need image name, source path and destination path
                    $image_name=$_FILES['image']['name'];

                    //Upload the image only if image is selected
                    if($image_name!=""){

                        //Auto rename the image
                        //Get Extension of image 
                        $ext=end(explode('.',$image_name));     //course1.jpg

                        //Rename the image
                        $image_name="Course_Category_".rand(000,999).'.'.$ext; //Course_Category_500.jpg

                        $source_path=$_FILES['image']['tmp_name'];
                        $destination_path="../images/category/". $image_name;

                        //Upload image
                        $upload=move_uploaded_file($source_path, $destination_path);

                        //Check whether the image is uploaded or not
                        //and if the image is not uploaded, then stop the process and redirect with error message
                        if($upload==false)
                        {
                            $_SESSION['upload']="<div class='error'>Fail to Upload Image</div>";

                            header('location:'.SITEURL.'admin/add-category.php');

                            //Stop the process
                            die();
                        }
                    }
                }
                else{
                    //Don't upload image and set the image_name value as blank
                    $image_name="";
                }



                $sql="INSERT INTO tbl_category SET
                title='$title',
                image_name='$image_name',
                featured='$featured',
                active='$active'";

                $res=mysqli_query($conn, $sql);

                if($res==TRUE){
                    $_SESSION['add']="<div class= 'success'>Category Added Successfully</div>";

                    header('location:'.SITEURL.'admin/manage-category.php');
                }
                else{
                    $_SESSION['add']="<div class= 'error'>Fail to Add Category</div>";

                    header('location:'.SITEURL.'admin/manage-category.php');
                }
            }
            else{

            }
        ?>

    </div>
</div>

<?php include('partials/footer.php'); ?>