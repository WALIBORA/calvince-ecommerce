<?php
include('includes/connect.php');
include('functions/common_function.php');
session_start();
if(isset($_POST['submit'])){
    $username=$_POST['username'];
    $user_email=$_POST['user_email'];
    $user_password=$_POST['user_password'];
    $hash_password=password_hash($user_password,PASSWORD_DEFAULT);
    $conf_password=$_POST['conf_password'];
    $hash_password2=password_hash($conf_password,PASSWORD_DEFAULT);
    $user_image=$_FILES['user_image']['name'];
    $temp_name=$_FILES['user_image']['tmp_name'];
    if(isset( $user_image)){
        $location='userimage/';
    move_uploaded_file($temp_name,$location.$user_image);
    }
    $user_ip=getIPAdress();
    $user_address=$_POST['user_address'];
    $user_mobile=$_POST['user_mobile'];
// select query
$select_query="select * from `usertable` where username='$username' or user_email='$user_email'";
$result_query=mysqli_query($con,$select_query);
$rows_count=mysqli_num_rows($result_query);
if($rows_count>0){
    echo"<script>alert('This user is already registered')</script>";
}
elseif($user_password!=$conf_password){
    echo"<script>alert('passwords do not match')</script>";
}
else{
    $insert_user="insert into `usertable` (username,user_email,user_password,conf_password,user_image,user_ip,user_address,user_mobile) 
    values('$username','$user_email','$hash_password','$hash_password2','$user_image','$user_ip','$user_address','$user_mobile')";
    $result_query=mysqli_query($con,$insert_user);
    if($result_query){
        echo"<script>alert('successfully registered')</script>";
    }
}
  //select cart items
  $select_cart_items="select * from `cart_details` where 
  ip_address =' $user_ip'";
  $result_cart=mysqli_query($con,$select_cart_items);
  $rows_count=mysqli_num_rows($result_cart);
  if($rows_count>0){
    $_SESSION['username']=$user_name;
      echo"<script>alert('There are items in your cart')</script>";
      echo"<script>window.open('checkout.php','_self')</script>";
  }else {
    echo"<script>window.open('./index.php','_self')</script>";
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>calvince Online shop</title>
    <!--bootstrap  css link-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!--font awesome link-->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    <!--css link-->
    <link rel="stylesheet" type="text/css" href="index.css">
</head>
<body class="bg-light">
<nav class="navbar navbar-expand-lg bg-primary">
  <div class="container-fluid">
  <a class="navbar-brand"  href="#"><img src="photos/shoes/converse maroon.jpg" alt="logo" class="logo">COSC </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Home<i class="fa-light fa-house"></i></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="index.php">Products</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="user_registration.php">Register</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Contacts</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="cart.php"><i class="fa-solid fa-cart-arrow-down"></i> <sup><?php cart_items();?></sup></a>
        </li>
      </ul>
      <form class="d-flex" action="search_product.php" method="get"">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search_data">
        <input type="submit" value="search" class="btn btn-outline-light" name="search_data_products">
      </form>
    </div>
  </div>
</nav>
    <div class="container-fluid my-3 ">
        <h3 class="text-center">New User Registration</h3>
        <div class="row p-3 d-flex align-items-center justify-content-center">
            <div class="col-lg-12 col-xl-6">
                <form action="" method="POST" enctype="multipart/form-data">
                <div class="form-outline my-3 ">
                    <label for="username">Please Enter Your Name</label>
                    <input type="text" name="username" id="username" class="form-control" placeholder="Enter your name" 
                    required="required" autocomplete="off">
                </div>
                <div class="form-outline  my-3 ">
                    <label for="user_email">Enter Your Email</label>
                    <input type="email" name="user_email" id="user_email" class="form-control" placeholder="Enter your e-mail" 
                    required="required">
                </div>
                <div class="form-outline  my-3 ">
                    <label for="user_email">Enter Your Password</label>
                    <input type="password" name="user_password" id="password" class="form-control" placeholder="Enter your password" 
                    required="required">
                </div>
                <div class="form-outline  my-3">
                    <label for="conf_password">Confirm Your Password</label>
                    <input type="password" name="conf_password" id="password" class="form-control" placeholder="Enter your password" 
                    required="required">
                </div>
                <div class="form-outline  my-3">
                  
                    <label for="user_image">Input Your Image</label>
                    <input type="file" name="user_image" id="uploaad" class="form-control"" 
                    required="required">
                </div>
                <div class="form-outline my-3 ">
                    <label for="user_address">Please Enter Your Address</label>
                    <input type="text" name="user_address" id="user_address" class="form-control" placeholder="Enter your address" 
                    required="required">
                </div>
                <div class="form-outline my-3 ">
                    <label for="user_mobile">Please Enter Your Phone Number </label>
                    <input type="text" name="user_mobile" id="phoneno" class="form-control" placeholder="Enter your Phone Number" 
                    required="required">
                </div>
                <div class="form-outline ">
                <input type="submit" class="bg-info py-2 px-3 my-3 border-0" name="submit" 
        value="Register">
        <p class="small fw-bold mt-2 pt-2">Already Have An Account? <a href="user_login.php"> Login</a></p>
                </div>
                </form>
            </div>
        </div>
    </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" 
  integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>