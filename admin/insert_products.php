<?php 
include('../includes/connect.php');
include('index.php');
if(isset($_POST['insert_product'])){
    $product_title=$_POST['product_title'];
    $product_description=$_POST['product_description'];
    $product_category=$_POST['product_cateogry'];
    $product_brands=$_POST['product_brands'];
    //accessing images
    $name = $_FILES['product_image']['name'];
    $name2 = $_FILES['product_image2']['name']; 
    //temporary location   
    $temp_name  = $_FILES['product_image']['tmp_name'];
    $temp_name2  = $_FILES['product_image2']['tmp_name'];

    if(isset($name) and !empty($name)){
        $location = './product_images/'; 
        $location=$location.basename($_FILES['product_image']['name']);  
        move_uploaded_file($temp_name, $location);
        move_uploaded_file($temp_name2, $location.$name2);
    } 
    $product_price=$_POST['product_price'];
    $product_status='true';
    //insert query
    $select_query="select * from products where Product_title='$product_title'";
    $result_select=mysqli_query($con,$select_query);
    $result_query=mysqli_query($con,$select_query);
    $number=mysqli_num_rows( $result_query);
    if($number>0){
        echo"<script>alert('product is present in the database')</script>";
    }
    else{
    $insert_products="insert into `products` (Product_title,product_description,category_id,Brand_id,product_image1,product_image2,product_price,
    Date,status) values('$product_title','$product_description','$product_category',' $product_brands','$name','$name2',
    '$product_price',now(),' $product_status')";
    $result_query=mysqli_query($con,$insert_products);
    if($result_query){
        echo"<script>alert('successfully inserted the products')</script>";
    }
}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert  Products</title>
    <!--bootstrap  css link-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!--font awesome link-->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflar   e.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    <!--css link-->
    <link rel="stylesheet" type="text/css" href="../style.css">

</head>
<body class="bg-light">
    <div class="container mt-3">
            <h3 class="text-center">Insert Products</h3>
            <form action="" method="post" enctype="multipart/form-data">
                <div class="form-outline mb-4 w-50 m-auto">
                    <label for="product_title">PRODUCT TITLE</label>
                    <input type="text" name="product_title" id="product_title" class="form-control" placeholder="Enter product title" required="required">
                </div>
                <div class="form-outline mb-4 w-50 m-auto">
                    <label for="product_description">PRODUCT DESCRIPTION</label>
                    <input type="text" name="product_description" id="product_description" class="form-control" placeholder="Enter product description" required="required">
                </div>
                <div class="form-outline mb-4 w-50 m-auto">
                <select name="product_cateogry" id="" class="form-select">
                    <option value="">select a category</option>
                    <?php
                    $select_query="select * from categories";
                    $result_query=mysqli_query($con,$select_query);
                    while($row=mysqli_fetch_assoc($result_query)){
                        $Category_title=$row['Category_title'];
                        $category_id=$row['category_id'];
                        echo"<option value='$category_id'> $Category_title</option>";
                    }
                    ?>
                </select>
                </div>
                <div class="form-outline mb-4 w-50 m-auto">
                <select name="product_brands" id="" class="form-select">
                    <option value="">select a brand</option>
                    <?php
                    $select_query="select * from brands";
                    $result_query=mysqli_query($con,$select_query);
                    while($row=mysqli_fetch_assoc($result_query)){
                        $brand_title=$row['Brand_title'];
                        $brand_id=$row['Brand_id'];
                        echo"<option value='  $brand_id'> $brand_title </option>";
                    }
                    ?>
                </select>
                </div>
                <div class="form-outline mb-4 w-50 m-auto" enctype="multipart/form-data">
                    <label for="product_image" class="form-label">PRODUCT IMAGE!</label>
                    <input type="file" name="product_image" id="product_imag" class="form-control"  required="required">
                </div>
                <div class="form-outline mb-4 w-50 m-auto">
                    <label for="product_image2"class="form-label">PRODUCT IMAGE2</label>
                    <input type="file" name="product_image2" id="product_image2" class="form-control"  required="required">
                </div>
                <div class="form-outline mb-4 w-50 m-auto">
                    <label for="product_price" class="form-label">PRODUCT PRICE</label>
                    <input type="text" name="product_price" id="product_price" class="form-control" placeholder="Enter products price" required="required">
                </div>
                <div class="form-outline mb-4 w-50 m-auto">
                <input type="submit" class="bg-info p-2 my-3 border-0" name="insert_product" 
        value="Insert Product">
                </div>
            </form>
    </div>
                    
        
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"   integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>