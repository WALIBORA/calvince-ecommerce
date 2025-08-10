<?php 
if(isset($_GET['delete_products'])){
    $delete_id=$_GET['delete_products'];
        $delete_product="delete from `products` where product_id=$delete_id";
        $delete_query=mysqli_query($con,$delete_product);
        if ($delete_query) {
          echo "<script>alert('your product is deleted successfully')</script>";
          echo "<script>window.open('./index.php')</script>";
        }
    }
?>