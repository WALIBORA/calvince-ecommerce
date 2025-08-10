<?php
include('../includes/connect.php');
//include('../functions/common_function.php');
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
    <link rel="stylesheet" type="text/css" href="../index.css">
    <style>
        .admin-image{
            width: 100px;
            object-fit: contain;
        }
    </style>
</head>
<body>
<div class="container-fluid p-0">
    <nav class="navbar navbar-expand-lg navbar-light bg-info">
        <div class="container-fluid">
            <img src="../photos/shoes/black rubber.jpg" alt="" class="logo">
    <nav class="navbar navbar-expand-lg">
    <ul class="navbar-nav">
        <li class="nav-item">
            <a href="#" class="nav-link">welcome Guest</a>
        </li>
    </ul>
    </nav>
    </div> 
    </nav>
</div>
<!--manage details-->
<div class="bg-light">
    <h3 class="text-center p-2">Manage Details</h3>
</div>
<!--admins navigational bar-->
<div class="row d-flex">
    <div class="col-md-12 bg-secondary  text-align-items-center d-flex">
        <div class="p-3">
            <a href="#"> <img src="../photos/shoes/black white rubber.jpg" alt="phott" class="admin-image" ></a>
            <p class="text-light text-center p-3">Admin Name</p>
        </div>
        <div class="text-center mt-5" id="admin-btn">
            <button class="m-3 bg-info"  id="admin-btn"><a href="insert_products.php" class="nav-link text-light bg-info my-2">insert products</a></button>
            <button class="m-3 bg-info"  id="admin-btn"><a href="index.php?view_detail" class="nav-link text-light bg-info m-2">view products</a></button>
            <button class="m-3 bg-info"  id="admin-btn"><a href="index.php?insert_categories" class="nav-link text-light bg-info my-2">insert categories</a></button>
            <button class="m-3 bg-info"  id="admin-btn"><a href="index.php?view_categories" class="nav-link text-light bg-info m-2">view categories</a></button>
            <button class="m-3 bg-info"  id="admin-btn"><a href="index.php?insert_brands" class="nav-link text-light bg-info m-2">insert brands</a></button>
            <button class="m-3 bg-info"  id="admin-btn"><a href="index.php?view_brands" class="nav-link text-light bg-info m-2">view brands</a></button>
            <button class="m-3 bg-info"  id="admin-btn"><a href="#" class="nav-link text-light bg-info m-2">all orders</a></button>
            <button class="m-3 bg-info"  id="admin-btn"><a href="#" class="nav-link text-light bg-info m-2">all payments</a></button>
            <button class="m-3 bg-info"  id="admin-btn"><a href="#" class="nav-link text-light bg-info m-2">list users</a></button>
            <button class="m-3 bg-info"  id="admin-btn"><a href="#" class="nav-link text-light bg-info m-2">logout</a></button>            
        </div>
    </div>
</div>
<div class="container">
    <?php 
    if(isset($_GET['insert_categories'])){
        include('insert_categories.php');
    }
    if(isset($_GET['insert_brands'])){
        include('insert_brands.php');
    }
    if(isset($_GET['view_detail'])){
        include('view_details.php');
    }
    if (isset($_GET['edit_products'])) {
        include('edit_products.php');
    }
    if (isset($_GET['delete_products'])) {
        include('delete_products.php');
    }
    if (isset($_GET['view_categories'])) {
        include('view_categories.php');
    }
    if (isset($_GET['edit_categories'])) {
        include('edit_categories.php');
    }
    if (isset($_GET['view_brands'])) {
        include('view_brands.php');
    }
    if (isset($_GET['edit_brands'])) {
        include('edit_brands.php');
    }
    ?>
</div>
    <!--javascript bootsrap link-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"   integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>