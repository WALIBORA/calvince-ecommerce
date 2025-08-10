<?php
include('includes/connect.php');
include('functions/common_function.php');
session_start();
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
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
     <div class="container-fluid my-3 ">
        <h3 class="text-center">User Login</h3>
        <div class="row p-3 d-flex align-items-center justify-content-center">
            <div class="col-lg-12 col-xl-6">
                <form action="" method="POST" enctype="multipart/form-data">
                <div class="form-outline my-3 ">
                    <label for="username">Please Enter Your Name</label>
                    <input type="text" name="username" id="username" class="form-control" 
                    required="required" autocomplete="off">
                </div>

                <div class="form-outline  my-3 ">
                    <label for="password">Enter Your Password</label>
                    <input type="password" name="password" id="password" class="form-control" placeholder="Enter your password" 
                    required="required">
                </div>
              
                <div class="form-outline ">
                <input type="submit" class="bg-info py-2 px-3 my-3 border-0" name="user_login" 
        value="Login">
        <p class="small fw-bold mt-2 pt-2">Don't Have An Account? <a href="user_registration.php"> Register</a></p>
                </div>
                </form>
            </div>
        </div>
    </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" 
  integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>
<?php
if(isset($_POST['user_login'])){
    $username=$_POST['username'];
    $user_password=$_POST['password'];
    $select_query="select * from `usertable` where  username='$username'";
    $result=mysqli_query($con,$select_query);
    $row_count=mysqli_num_rows($result);
    $row_data=mysqli_fetch_assoc($result);
    $user_ip=getIPAdress();  
    //cartitem
    //select cart items
  $select_cart_items="select * from `cart_details` where 
  ip_address =' $user_ip'";
    $select_cart=mysqli_query($con, $select_cart_items);
    $row_num_count=mysqli_num_rows($select_cart);
    if($row_count>0){
        $_SESSION['username']= $username;
        if(password_verify($user_password,$row_data['user_password'])){
            if($row_count==1 and $row_num_count==0 ){
                $_SESSION['username']=$username;
            echo "<script>alert('logged in sucessful')</script>"; 
            echo "<script>window.open('index.php','_self')</script>"; 
            }
    }
}
        elseif ($user_password!= $row_data){
            echo "<script>alert('username or password do not match')</script>"; 
        }
    }
?>