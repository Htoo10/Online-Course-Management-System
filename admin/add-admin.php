<?php include('partials/menu.php');?>

<div class="main-content">
    <div class="wrapper">
        <h1>Add Admin</h1>
        <br/> <br/>

        <?php
             if(isset($_SESSION['add'])){
                 echo $_SESSION['add'];
                 unset($_SESSION['add']);
             }
        ?>

        <form action="" method="POST">
            <table class="tbl-30">
                <tr>
                    <td>Full Name: </td>
                    <td><input type ="text" name="full_name" placeholder="Enter Your Name"></td>
                </tr>
                <tr>
                    <td>User Name: </td>
                    <td><input type ="text" name="user_name" placeholder="Enter User Name"></td>
                </tr>
                <tr>
                    <td>Password: </td>
                    <td><input type ="password" name="password" placeholder="Enter Password"></td>
                </tr>
                <tr>
                    <td colspan=2>
                        <input type="submit" name="submit" value="Add Admin" class="btn-secondary">
                    </td>
                </tr>
            </table>

        </form>
    </div>
</div>

<?php include('partials/footer.php'); ?>

<?php
    //Process the value from form and save it in Database
    //Check whether button is clicked or not
    if(isset($_POST['submit'])){

        //1.Get the data from form
        $full_name=$_POST['full_name'];
        $user_name=$_POST['user_name'];
        $password=md5($_POST['password']);

        //2. SQL Quary to save the data in database
        $sql="INSERT INTO tbl_admin SET
            full_name='$full_name',
            user_name='$user_name',
            password='$password'";

        //3. Executing Query and Saving data into Database
        $res=mysqli_query($conn,$sql) or die(mysqli_error());

        //4. Check whether the (Query is Executed) data is inserted or not and display appropriate message
        if($res==TRUE){
            $_SESSION['add']="Admin Added Successfully";
            header("location:".SITEURL.'admin/manage-admin.php');

        }
        else{
            $_SESSION['add']="Fail to add admin";
            header("location:".SITEURL.'admin/add-admin.php');
         }

    }
?>