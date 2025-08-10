<?php
include('includes/connect.php');
include('functions/common_function.php');
//getting items
$ip_address = getIPAdress();
$total_price = 0;
$cart_price = "select * from `cart_details` where ip_address='$ip_address'";
$result_price = mysqli_query($con, $cart_price);
$invoice_number=mt_rand();
$status='pending';
$total_products=mysqli_num_rows($result_price);
while ($row_price=mysqli_fetch_array($result_price)) {
$product_id = $row_price['product_id'];
$select_products= "select * from `products` where product_id=$product_id";
$final_price = mysqli_query($con,$select_products);
while ($row_price_product = mysqli_fetch_array($final_price)) {
  $product_price= array($row_price_product['product_price']);
  $product_total_price= array_sum($product_price);
  $total_price+= $product_total_price;
}
}
//quantity from 
$cart_quantity="select * from `cart_details`";
$run_cart=mysqli_query($con,$cart_quantity);
$cart_item_quantity=mysqli_fetch_array($run_cart);
$quantity=$cart_item_quantity['quantity'];
if($quantity==0){
  $quantity=1;
  $subtotal=$total_price;
}else{
  $quantity=$quantity;
  $subtotal=$total_price*$quantity;
}
//userid
$user_id_get="select *from `usertable`";
$result_get_id=mysqli_query($con,$user_id_get);
$get_id=mysqli_fetch_array($result_get_id);
$user_id=$get_id['user_id'];
$insert_orders="insert into `orders_table`(user_id,total_amount,invoice_number,
total_products,order_date,order_status) values( $user_id,$subtotal,$invoice_number,$total_products,NOW(),'$status')";
$result_query = mysqli_query($con,$insert_orders);
if($result_query){
  echo "<script>alert('orders submitted successfully')</script>";
  echo "<script>window.open('profile.php')</script>";
}
?>