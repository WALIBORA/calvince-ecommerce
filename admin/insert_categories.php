<?php 
include('../includes/connect.php');
if(isset($_POST['insert_cat'])){
    $category_title=$_POST['categories_title'];
    $select_query="select * from categories where Category_title='$category_title'";
    $result_select=mysqli_query($con,$select_query);
    $number=mysqli_num_rows($result_select);
    if($number>0){
        echo"<script>alert('This category is present in the database')</script>";
    }
    else{
    $insert_query="insert into categories(Category_title) values('$category_title')";
    $result=mysqli_query($con,$insert_query);
    if($result){
        echo"<script>alert('category has been inserted successfully')</script>";
    }
}
}
?>
<form action="" method="post" class="mt-5">
    <div class="input-group w-90 mb-2">
        <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-receipt"></i></span>
        <input type="text" class="form-control" name="categories_title" placeholder="Insert categories" aerial-label="category" aerial-describeby="basic-addon1">
    </div>
    <div class="input-group w-10 mb-2 m-auto">
        <input type="submit" class="bg-info p-2 my-3 border-0" name="insert_cat" 
        value="insert categories">
    </div>
</form>