<?php
include('./includes/connect.php');
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
    <link rel="stylesheet" type="text/css" href="index.css">
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg bg-primary">
  <div class="container-fluid">
  <a class="navbar-brand d-flex"  href="#"><img src="photos/shoes/converse maroon.jpg" alt="logo" class="logo">COSC </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse " id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0 ">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="product_detail.php">Products</a>
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
<!--products display-->
<?php
cart();
?>
<nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
  <ul class="navbar-nav me-auto">
  <?php
    if(isset($_SESSION['username'])){
      echo "<li class='nav-item'>
      <a class='nav-link'  href='#'>welcome ".$_SESSION['username']."</a>
    </li>";
    }else {
      echo "<li class='nav-item'>
      <a class='nav-link'  href='#'>welcome Guest</a>
    </li>";
    }
    ?>
    <?php
    if(!isset($_SESSION['username'])){
      echo "<li class='nav-item'>
      <a class='nav-link'  href='user_login.php'>Login</a>
    </li>";
    } else {
      echo "<li class='nav-item'>
      <a class='nav-link' href='logout.php'>Logout</a>
    </li>";
    }
    ?>
  </ul>
</nav>
  <!--displayed products-->
  <div class="bg-light">
    <h3 class="text-center">Available products</h3>
    <p class="text-center">Welcome and get the best products with very fair prices</p>
  </div>
 <div class="container-fluid">
    <div class="row">
        <div class="col-md-2">
       <ul class="navbar-nav bg-secondary">
       <li class="nav-item bg-info text-center ">
          <a class="nav-link " aria-current="page" href="#"><h4>my profile</h4></a>
        </li>
        <?php
        $username=$_SESSION['username'];
        $select_user_image="select * from `usertable` where username='$username'";
        $result_user_image=mysqli_query($con,$select_user_image);
        $row=mysqli_fetch_assoc($result_user_image);
        $user_image= $row['user_image'];
        echo "<li class='nav-item p-1'>
        <img src='userimage/$user_image' alt='image' class='user-image'>
     </li>";
        ?>
        <li class="nav-item">
          <a class="nav-link " aria-current="page" href="profile.php?my_orders">my orders</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="profile.php">Pending orders</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="profile.php?edit_account">edit account</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="logout.php">logout </a>
        </li>
      </ul>
       </nav>
        </div>
        <div class="col-md-10 bg-light">
          <?php 
          order_details();
          if (isset($_GET['edit_account'])) {
            include('edit_user_account.php');
          }
          if (isset($_GET['my_orders'])) {
            include('myorders.php');
          }
          ?>
        </div>
    </div>
 </div>
<!--javascript bootsrap link-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" 
  integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>