<?php
include('../includes/connect.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>view products</title>
    <link rel="stylesheet" type="text/css" href="../index.css">
    <style>
      #viewproduct-image{
    width: 100px;
    object-fit: contain;
}
    </style>
</head>
<body>
    <h4 class="text-center text-success">all the products available</h4>
    <table class="table table-sm table-bordered text-center bg-dark text-white">
        <thead>
          <tr class="bg-primary">
           <th>product id</th>
           <th>product title</th>
           <th>product image</th>
           <th>product price</th>
           <th>total items sold</th>
           <th>edit</th>
           <th>delete</th>
          </tr>
        </thead>
        <tbody>
        <?php
$select_products="select * from `products`";
$result_product=mysqli_query($con,$select_products);
while($row_fetch=mysqli_fetch_array($result_product)) {
  $product_id=$row_fetch['product_id'];
  $product_title=$row_fetch['Product_title'];
  $product_image=$row_fetch['product_image1'];
  $product_price=$row_fetch['product_price'];
  ?>
  <td class="text-center align-items-center"> <?php echo $product_id ?></td>
  <td><?php echo  $product_title?></td>
  <td> <img src="../admin/product_images/<?php echo $product_image?>" alt='$product_title' id='viewproduct-image'></td>
  <td><?php echo  $product_price?></td>
  <td>$product_price</td>
  <td><a href='index.php?edit_products=<?php echo $product_id ?>' class='fa-solid fa-pen-to-square text-white'></a></td>
  <td><a href='index.php?delete_products=<?php echo $product_id ?>' class='fa-solid fa-trash text-white'></a></td>
</tr>
<?php
}
?>         
        </tbody>
      </table>
</body>
</html>