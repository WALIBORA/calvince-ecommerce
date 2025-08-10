<?php
include('includes/connect.php');
include('functions/common_function.php');
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UT  F-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>cart details</title>
    <!--bootstrap  css link-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!--font awesome link-->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    <!--css link-->
    <link rel="stylesheet" type="text/css" href="index.css">
</head>
<body>
<nav class="navbar navbar-expand-lg bg-primary">
  <div class="container-fluid">
  <a class="navbar-brand"  href="#"><img src="photos/shoes/converse maroon.jpg" alt="logo" class="logo">COSC </a>
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
  <!--table to store the items-->
  <div class="container-fluid">
    <div class="row">
      <form action="" method="POST">
      <table class="table table-sm table-bordered text-center bg-dark text-white">
        <thead>
          <tr>
           <th>product_name</th>
           <th>product_image</th>
           <th>number_of_items</th>
           <th>total price</th>
           <th>remove_item</th>
           <th>activities</th>
          </tr>
        </thead>
        <tbody>
          <?php
          //getting the total price
    $get_ip_address=getIPAdress();
    $total_price=0;
    $cart_query="select * from `cart_details` where ip_address='$get_ip_address'";
    $result=mysqli_query($con,$cart_query);
    while ($row=mysqli_fetch_array($result)) {
     $product_id=$row['product_id'];
     $select_products="select * from `products` where product_id ='$product_id'";
     $result_products=mysqli_query($con,$select_products);
     while ($row_products_price=mysqli_fetch_array($result_products)) {
      $product_price=array($row_products_price['product_price']);
      $product_item_price= $row_products_price['product_price'];
      $product_title= $row_products_price['Product_title'];
      $product_image= $row_products_price['product_image1'];
      $product_sum=array_sum($product_price);
      $total_price=$total_price+$product_sum;
        ?>
          <tr>
            <td><?php echo "$product_title"?></td>
            <td><img src="admin/product_images/<?php echo $product_image ?>" alt="" id="cart-image"></td>
            <td><input style="border: non; align-items:center;
            outline:none; text-align:center; margin-top:1rem; width:50%;"  name="quantity" type="text"  id="quantity">
          </td>
            <td>Ksh.<?php echo " $product_item_price"?></td>
            <td><input type="checkbox" name="remove_item[]" id="removeitem" value="<?php  echo  $product_id; ?>"></td>
            <td class="d-flex">
              <!-- <button id="cart">update</button> -->
             <input type="submit" name="update_cart" value="update" class="bg-danger px-3 py-2 border-0 mx-3 text-center">
             <?php 
             $get_ip_addres=getIPAdress();
             if(isset($_POST['update_cart'])){
              $quantity=$_POST['quantity'];
              if ($quantity>0) {
                $update_cart="update `cart_details` set quantity=$quantity where 	ip_address='$get_ip_addres'";
              $result_product_quantity=mysqli_query($con,$update_cart);
             $total_price=$total_price * $quantity;
              }
             }
          ?>  
             <input type="submit" name="delete_cart" value="delete" class="bg-danger px-3 py-2 border-0 mx-3">
            </td>
          </tr>
          <?php 
  }}
  ?>
        </tbody>
      </table>
    </div>
  </div>
</form>
<div class="d-flex" >
        <h3 class="px-2">The totals Ksh. <strong> <?php echo    $total_price ?> </strong></h3>
        <a href="product_detail.php"><button id="cart">check more product</button></a>
        <a href="checkout.php"> <button class="m-1" id="cart">proceed to pay</button></a>
      </div>
<!--remove function -->
<?php 
function remove_cart_item(){
  global $con;
    if (isset($_POST['delete_cart'])){
      foreach ($_POST['remove_item'] as $remove_id) {
      echo $remove_id;
      $delete_query="Delete from `cart_details` where product_id='$remove_id'";
      $run_delete=mysqli_query($con,$delete_query);
      } 
      if($run_delete){
        echo "<script>window.open('cart.php','_self')</script>";    
      }
  }
 
}
echo  remove_cart_item();
  ?>

<!--javascript bootsrap link-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" 
  integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>