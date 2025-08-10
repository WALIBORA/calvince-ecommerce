<?php
if (isset($_GET['edit_account'])) {
    $username=$_SESSION['username'];
    $select_query="select * from `usertable` where username='$username'";
    $result_select=mysqli_query($con,$select_query);
    $fetch_data=mysqli_fetch_array($result_select);
    $user_id = $fetch_data['user_id'];
    $user_name = $fetch_data['username'];
    $user_mail = $fetch_data['user_email'];
    $user_image = $fetch_data['user_image'];
    $user_address = $fetch_data['user_address'];
    $user_phone = $fetch_data['user_mobile'];
    if (isset($_POST['user_account'])) {
        $pdate_id=$user_id;
        $user_name =$_POST['update_username'];
        $user_mail =$_POST['user_email'];
        $user_image =$_FILES['user_image']['name'];
        $temp_image=$_FILES['user_image']['tmp_name'];

        $location="userimage/";
        move_uploaded_file($temp_image,$location.$user_image);

        $user_address =$_POST['user_address'];
        $user_phone =$_POST['user_mobile'];
        $pdate_user_data="update `usertable` set username='$user_name',user_email='$user_mail',user_image='$user_image',user_address='$user_address',
        user_mobile='$user_phone'";
        $result_user=mysqli_query($con,$pdate_user_data);
        if ($result_user){
         echo " <script>alert('update success')</script>";
         echo  "<script>window.open('logout.php')</script>";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit My Account</title>
</head>
<body>
    <h4 class="text-success text-center">welcome and edit your account</h4>
    <div class="row p-3 d-flex align-items-center justify-content-center">
            <div class="col-lg-12 col-xl-6">
                <form action="" method="POST" enctype="multipart/form-data">
                <div class="form-outline">
                    <input type="text" name="update_username" id="username" class="form-control" value='<?php echo "$user_name" ?>'>
                </div>
                <div class="form-outline my-2">
                    <label for="user_email">Enter Your Email</label>
                    <input type="email" name="user_email" id="user_email" class="form-control"  value='<?php echo "$user_mail" ?>'>
                </div>
                <div class="form-outline  my-3">
                    <label for="user_image">Input Your Image</label>
                    <input type="file" name="user_image" id="uploaad" class="form-control">
                  <img src="userimage/<?php echo    $user_image ?>" alt="profile" id="change-profile">
                </div>
                <div class="form-outline my-3 ">
                    <label for="user_address">Please Enter Your Address</label>
                    <input type="text" name="user_address" id="user_address" class="form-control" value='<?php echo "$user_address" ?>'>
                </div>
                <div class="form-outline my-3 ">
                    <label for="user_mobile">Please Enter Your Phone Number </label>
                    <input type="text" name="user_mobile" id="phoneno" class="form-control" value='<?php echo "$user_phone" ?>'>
                </div>
                <div class="form-outline ">
                <input type="submit" class="bg-info py-2 px-3 my-3 border-0" name="user_account" 
        value="update">
                </div>
                </form>
            </div>
        </div>
</body>
</html>