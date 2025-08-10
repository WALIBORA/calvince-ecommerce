<?php
include('./includes/connect.php');
//getting products
function getproducts(){
    global $con;
    //condition to check if isset
    if(!isset($_GET['categories'])){
    if(!isset($_GET['brands'])){
    $select_query="select * from `products`order by rand()";
        $result_query=mysqli_query($con,$select_query);
        //$row=mysqli_fetch_assoc($result_query);
      while($row=mysqli_fetch_assoc($result_query)){
        $product_id=$row['product_id'];
        $product_title=$row['Product_title'];
        $product_description=$row['product_description'];
        $product_image=$row['product_image1'];
        $name2 =$row['product_image2'];
        $category_id=$row['category_id'];
        $brand_id=$row['Brand_id'];
        $product_price=$row['product_price'];
        echo  "<div class='col-6 col-md-3 mb-2'>
        <div class='card'>
        <img src='admin/product_images/$product_image' class='card-img-top' alt='$product_title'>
                  <div class='card-body'>
                  <h5 class='card-title'>$product_title</h5>
                  <p class='card-text' id='card-paragraph'>$product_description.</p>
                  <p class='card-text'>$product_price.</p> 
                  <div class='d-flex p-2' id='cart-buttom'>
                  <a href='index.php?add_to_cart=$product_id'class='btn btn-info m-2 p-2' id='card-btn'>add to cart</a>
                  <a href='product_view.php?product_id=$product_id'class='btn btn-secondary m-2 p-2' id='card-btn'>view more</a>
                  </div>
          </div>
</div>
      </div>";  
      }
}
}
}
//getting unique categories
function get_unique_categories(){
  global $con;
    //condition to check if isset
    if(isset($_GET['categories'])){
      $categories_id=$_GET['categories'];
    $select_query="select * from `products`where category_id=$categories_id";
        $result_query=mysqli_query($con,$select_query);
        $num_of_rows=mysqli_num_rows( $result_query);
        if($num_of_rows==0){
          echo "<h3 class='text-center text-danger'>NO RESULT MATCH. NO PRODUCTS FOUND ON THIS CATEGORY</h3>";
        }
        //$row=mysqli_fetch_assoc($result_query);
      while($row=mysqli_fetch_assoc($result_query)){
        $product_id=$row['product_id'];
        $product_title=$row['Product_title'];
        $product_description=$row['product_description'];
        $product_image=$row['product_image1'];
        $category_id=$row['category_id'];
        $brand_id=$row['Brand_id'];
        $product_price=$row['product_price'];
        echo "<div class='col-md-4 mb-2'>
        <div class='card'>
                <img src='admin/product_images/$product_image' class='card-img-top' alt='$product_title'>
                  <div class='card-body'>
                  <h5 class='card-title'>$product_title</h5>
                  <p class='card-text'>$product_description.</p>
                  <p class='card-text'>$product_price.</p> 
                  <a href='index.php?add_to_cart=$product_id'class='btn btn-info'>add to cart</a>
                  <a href='product_view.php?product_id=$product_id'class='btn btn-secondary'>view more</a>
          </div>
</div>
      </div>";
      }
}
}
//getting unique brands
function get_unique_brands(){
  global $con;
    //condition to check if isset
    if(isset($_GET['brands'])){
      $braands_id=$_GET['brands'];
    $select_query="select * from `products` where Brand_id=$braands_id";
        $result_query=mysqli_query($con,$select_query);
        $num_of_rows=mysqli_num_rows( $result_query);
        if($num_of_rows==0){
          echo "<h3 class='text-center text-danger'>NO RESULT MATCH. NO PRODUCTS FOUND ON THIS CATEGORY</h3>";
        }
        //$row=mysqli_fetch_assoc($result_query);
      while($row=mysqli_fetch_assoc($result_query)){
        $product_id=$row['product_id'];
        $product_title=$row['Product_title'];
        $product_description=$row['product_description'];
        $product_image=$row['product_image1'];
        $category_id=$row['category_id'];
        $brand_id=$row['Brand_id'];
        $product_price=$row['product_price'];
        echo "<div class='col-md-4 mb-2'>
        <div class='card'>
        <img src='admin/product_images/$product_image' class='card-img-top' alt='$product_title'>
                  <div class='card-body'>
                  <h5 class='card-title'>$product_title</h5>
                  <p class='card-text'>$product_description.</p>
                  <p class='card-text'>KSH. $product_price.</p> 
                  <a href='index.php?add_to_cart=$product_id'class='btn btn-info'>add to cart</a>
                  <a href='product_view.php?product_id=$product_id'class='btn btn-secondary'>view more</a>
          </div>
</div>
      </div>";
      }
}
}
//brands function
function  getbrands(){
global $con;
$select_brands="select * from brands";
$result_brands=mysqli_query($con,$select_brands);
while($row_data=mysqli_fetch_assoc($result_brands)){
  $brand_title= $row_data['Brand_title'];
  $brand_id= $row_data['Brand_id'];
  echo "<li class='nav-item px-3'>
  <a href='index.php?brands=$brand_id ' class='nav-link text-light'>$brand_title</a>
</li>";
}
}
//CATEGORY FUNCTION
function getcategories(){
  global $con;
  $select_categories="select * from categories";
  $result_categories=mysqli_query($con,$select_categories);
  while($row_data=mysqli_fetch_assoc($result_categories)){
    $category_title= $row_data['Category_title'];
    $category_id= $row_data['category_id'];
    echo "<li class='nav-item  px-3'>
    <a href='index.php?categories=$category_id '
    class='nav-link text-light'>$category_title</a>
  </li>";
  }
}
//searching products
function search_product(){
  global $con;
  if(isset($_GET['search_data_products'])){
  $search_data_value=$_GET['search_data'];
  $seach_query="select * from `products`where Product_title like '%$search_data_value%'";
      $result_query=mysqli_query($con,$seach_query);
      $num_of_rows=mysqli_num_rows( $result_query);
      if($num_of_rows==0){
        echo "<h3 class='text-center text-danger'>NO RESULT MATCH. NO PRODUCTS FOUND ON THIS CATEGORY</h3>";
      }
      //$row=mysqli_fetch_assoc($result_query);
    while($row=mysqli_fetch_assoc($result_query)){
      $product_id=$row['product_id'];
      $product_title=$row['Product_title'];
      $product_description=$row['product_description'];
      $product_image=$row['product_image1'];
      $category_id=$row['category_id'];
      $brand_id=$row['Brand_id'];
      $product_price=$row['product_price'];
      echo "<div class='col-md-4 mb-2'>
      <div class='card'>
              <img src='admin/product_images/$product_image' class='card-img-top' alt='$product_title'>
                <div class='card-body'>
                <h5 class='card-title'>$product_title</h5>
                <p class='card-text'>$product_description.</p>
                <p class='card-text'>$product_price.</p>
                <a href='index.php?add_to_cart=$product_id'class='btn btn-info'>Add to cart</a>
                <a href='product_view.php?product_id=$product_id'class='btn btn-secondary'>view more</a>
        </div>
</div>
    </div>";
    }
}
}
//view details
function view_details(){
  global $con;
  //condition to check if isset
  if(isset($_GET['product_id'])){
  if(!isset($_GET['categories'])){
  if(!isset($_GET['brands'])){
    $product_di=$_GET['product_id'];
  $select_query="select * from `products` where product_id= $product_di";
      $result_query=mysqli_query($con,$select_query);
    while($row=mysqli_fetch_assoc($result_query)){
      $product_id=$row['product_id'];
      $product_title=$row['Product_title'];
      $product_description=$row['product_description'];
      $product_image=$row['product_image1'];
      $product_image2=$row['product_image2'];
      $category_id=$row['category_id'];
      $brand_id=$row['Brand_id'];
      $product_price=$row['product_price'];
      echo "<div class='col-md-4 mb-2'>
      <div class='card'>
      <img src='admin/product_images/$product_image' class='card-img-top' alt='$product_title'>
                <div class='card-body'>
                <h5 class='card-title'>$product_title</h5>
                <p class='card-text'>$product_description.</p>
                <p class='card-text'>$product_price.</p> 
                <a href='index.php?add_to_cart=$product_id'class='btn btn-info'>add to cart</a>
                <a href='index.php' class='btn btn-secondary'>Go Home</a>
        </div>
</div>
    </div>
    <div class='col-md-8'>
          <!--relatedimages-->
          <div class='row'>
            <div class='col-md-12'>
              <h4 class='text-center text-info mb-5'>Related products</h4>
            </div>
            <div class='col-md-6'>
            <img src='admin/product_images/$product_image' class='card-img-top' alt='$product_title'>
            </div>
            <div class='col-md-6'>
            <img src='admin/product_images/$product_image2' class='card-img-top' alt='$product_title'>
            </div>
          </div>
        </div>";
    }
}
}
} 
}
//get ip address function
function getIPAdress(){
  //whether ip is from the share internet
  if(!empty($_SERVER['HTTP_CLIENT_IP'])){
    $ip = $_SERVER['HTTP_CLIENT_IP'];
  }
  //whether the ip is from proxy
  elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
    $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
  }
  //whether ip is from the remote address
  else{
    $ip = $_SERVER['REMOTE_ADDR'];
  }
  return $ip;
}
//$ip = getIPAdress();
//echo 'user Real Ip address-'.$ip;

//cart function
function cart(){
  if(isset($_GET['add_to_cart'])){
    global $con;
    $get_ip_add=getIPAdress();
    $get_product_id=$_GET['add_to_cart'];
    $select_query="select * from `cart_details` where ip_address='$get_ip_add' && product_id=$get_product_id";
    $result_query=mysqli_query($con,$select_query);
    $num_of_rows=mysqli_num_rows($result_query);
  if($num_of_rows>0){
    echo "<script>alert('this item is already present inside the cart')</script>";
    echo "<script>window.open('index.php','_self'</script>";
  }
  else{
    $insert_query="insert into `cart_details`(product_id,ip_address,quantity) values ( $get_product_id,'$get_ip_add',1)";
    $result_query=mysqli_query($con,$insert_query);
    echo "<script>alert('item is added to cart')</script>";
    echo "<script>window.open('index.php','_self'</script>";
  }
  }
}

//function to get cart item numbers
function cart_items(){
  if(isset($_GET['add_to_cart'])){
    global $con;
    $get_ip_add=getIPAdress();
     $select_query="select * from `cart_details` where ip_address='$get_ip_add'";
    $result_query=mysqli_query($con,$select_query);
    $num_of_rows=mysqli_num_rows($result_query);
  }
  else{
    global $con;
    $get_ip_add=getIPAdress();
     $select_query="select * from `cart_details` where ip_address='$get_ip_add'";
    $result_query=mysqli_query($con,$select_query);
    $num_of_rows=mysqli_num_rows($result_query);
  }
  echo $num_of_rows; 
  }
  //getting the total price
  // function total_items_price(){
  //   global $con;
  //   $get_ip_address=getIPAdress();
  //   $total_price=0;
  //   $cart_query="select * from `cart_details` where ip_address='$get_ip_address'";
  //   $result=mysqli_query($con,$cart_query);
  //   while ($row=mysqli_fetch_array($result)) {
  //    $product_id=$row['product_id'];
  //    $select_products="select * from `products` where product_id ='$product_id'";
  //    $result_products=mysqli_query($con,$select_products);
  //    while ($row_products_price=mysqli_fetch_array($result_products)) {
  //     $product_price=array($row_products_price['product_price']);
  //     $product_sum=array_sum($product_price);
  //    }
  //   }
  //   echo   $product_sum;
  // }

  //getting user orders
  function order_details(){
    global $con;
    $username=$_SESSION['username'];
    $details= "select * from `usertable` where username='$username'";
    $result_details = mysqli_query($con,$details);
    while ($row_query=mysqli_fetch_array($result_details)){
      $user_id=$row_query['user_id'];
      if (!isset($_GET['my_orders'])) {
        if (!isset($_GET['edit_account'])) {
          if (!isset($_GET['logout'])) {
            $get_orders="select * from `orders_table` where user_id=$user_id and order_status='pending'";
            $result_orders= mysqli_query($con,$get_orders);
            $row_count =mysqli_num_rows($result_orders);
            if ($row_count>0) {
             echo "<h3 class='text-center my-5 text-success'>there are <span class='text-danger' >$row_count</span> pending orders now</h3>";
            echo "<p class='text-center'><a href='profile.php?my account' class='text-center'>order details</a></p>";
            }
            else {
              echo "<h3 class='text-center my-5 text-success'>there are no pending orders now</h3>";
              echo "<p class='text-center'><a href='index.php' class='text-center'>check fo products</a></p>";
            }
          }
        }
      }
    }
  }
?>