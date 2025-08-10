<?php include('../includes/connect.php');
if(isset($_GET['edit_products'])){
   $edit_id=$_GET['edit_products'];
    $select_products="select * from `products` where product_id=$edit_id";
    $result_select=mysqli_query($con,$select_products);
    $fetch_product=mysqli_fetch_array( $result_select);
    $product_title= $fetch_product['Product_title'];
    $product_description= $fetch_product['product_description'];
    $name =  $fetch_product['product_image1'];
    $name2 =  $fetch_product['product_image2']; 
    $product_price=$fetch_product['product_price'];
}
    //insert query
    if(isset($_POST['update_product'])){
        $product_title= $_POST['product_title'];
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
            move_uploaded_file($temp_name, $location. $name);
            move_uploaded_file($temp_name2, $location.$name2);
        } 
        $product_price=$_POST['product_price'];
    $update_query="update `products` set Product_title='$product_title',product_description='$product_description'
    ,product_image1='$name',product_image1='$name',product_image1='$name2',product_price='$product_price' where  product_id=$edit_id "; 
    $result_select=mysqli_query($con,$update_query);
    if ( $result_select) {
        echo"<script>alert('successfully inserted the products')</script>";
    }
}

?>
<div class="container mt-3">
            <h3 class="text-center text-success">edit products</h3>
            <form action="" method="post" enctype="multipart/form-data">
                <div class="form-outline mb-4 w-50 m-auto">
                    <label for="product_title">PRODUCT TITLE</label>
                    <input type="text" name="product_title" id="product_title" class="form-control" value="<?php echo $product_title ?>">
                </div>
                <div class="form-outline mb-4 w-50 m-auto">
                    <label for="product_description">PRODUCT DESCRIPTION</label>
                    <input type="text" name="product_description" id="product_description" class="form-control" value="<?php echo $product_description ?>">
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
                    <input type="file" name="product_image" id="product_imag" class="form-control">
                </div>
                <div class="form-outline mb-4 w-50 m-auto">
                    <label for="product_image2"class="form-label">PRODUCT IMAGE2</label>
                    <input type="file" name="product_image2" id="product_image2" class="form-control">
                </div>
                <div class="form-outline mb-4 w-50 m-auto">
                    <label for="product_price" class="form-label">PRODUCT PRICE</label>
                    <input type="text" name="product_price" id="product_price" class="form-control" placeholder="Enter products price">
                </div>
                <div class="form-outline mb-4 w-50 m-auto">
                <input type="submit" class="bg-info p-2 my-3 border-0" name="update_product" 
        value="edit Product">
                </div>
            </form>
    </div>