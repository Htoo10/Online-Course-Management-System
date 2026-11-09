<?php

    include('../config/constants.php');

    if(isset($_GET['id']) AND isset($_GET['image_name'])){
        $id= $_GET['id'];
        $image_name= $_GET['image_name'];

        if($image_name!=""){
            $path="../images/course/".$image_name;

            $remove=unlink($path);

            if($remove==false){

                $_SESSION['upload']="<div class='error'>Failed to remove Image File</div>";

                header('location:'.SITEURL.'admin/manage-course.php');

                die();
            }
        }
        $sql="DELETE FROM tbl_course WHERE id=$id";

        $res=mysqli_query($conn, $sql);
        
        if($res==TRUE){
            $_SESSION['delete']="<div class='success'>Course Deleted Successfully</div>";

            header('location:'.SITEURL.'admin/manage-course.php');
        }
        else{
            $_SESSION['delete']="<div class='error'>Failed to Delete Course</div>";

            header('location:'.SITEURL.'admin/manage-course.php');
        }

    }
    else{
        $_SESSION['unauthorize']="<div class='error'>Unauthorized Access</div>";
        header('location:'. SITEURL.'admin/manage-food.php');

    }
?>