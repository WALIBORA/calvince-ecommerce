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
    <link rel="stylesheet" type="text/css" href="index.css">
</head>
<body id="here">
<nav class="navbar navbar-expand-lg bg-success">
  <div class="container-fluid">
  <a class="navbar-brand"  href="#"><img src="photos/shoes/converse maroon.jpg" alt=""width="10%"height="2%">COSC </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
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
        <a class="nav-link" href="index.php?add_to_cart=$get_product_id"><i class="fa-solid fa-cart-arrow-down"></i> <sup><?php cart_items();?></sup></a>
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
  <!--products section begins here-->
  <div class="row">
    <div class="col-md-10">
      <div class="row px-3">

      <!--fetching data-->
        <?php
        //getproducts();
       view_details();
       get_unique_categories();
       get_unique_brands();
     ?>
      </div>
    </div>
    <div class="col-md-2 bg-secondary p-0">
      <ul class="navbar-nav me-auto ">
        <li class="nav-item bg-info text-center">
          <a href="#" class="nav-link text-light"><h4>Brands</h4></a>
        </li> 
          <?php
          getbrands();
          ?>
      </ul>
      <ul class="navbar-nav me-auto ">
        <li class="nav-item bg-info text-center">
          <a href="#" class="nav-link text-light"><h4>categories</h4></a>
        </li>
           <!--php file--> 
        <?php
        getcategories();
          ?>
      </ul>
    </div>
  </div>
<!--javascript bootsrap link-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" 
  integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>