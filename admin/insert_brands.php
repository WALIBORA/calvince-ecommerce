<?php 
include('../includes/connect.php');
if(isset($_POST['insert_brand'])){
    $Brand_title=$_POST['Brand_title'];
    $select_query="select * from brands where Brand_title='$Brand_title'";
    $result_select=mysqli_query($con,$select_query);
    $number=mysqli_num_rows($result_select);
    if($number>0){
        echo"<script>alert('This Brand is present in the database')</script>";
    }
    else{
    $insert_query="insert into brands(Brand_title) values ('$Brand_title')";
    $result=mysqli_query($con,$insert_query);
    if($result){
        echo"<script>alert('Brands has been inserted successfully')</script>";
    }
}
}
?>
<form action="" method="post" class="mt-3">
    <div class="input-group w-90 mb-2">
        <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-receipt"></i></span>
        <input type="text" class="form-control" name="Brand_title" placeholder="insert Brands" aerial-label="Brands" aerial-describeby="basic-addon1">
    </div>
    <div class="input-group w-10 mb-2 m-auto">
        <input type="submit" class="bg-info border-0 p-2 my-3" name="insert_brand" placeholder="insert Brands" 
        value="insert Brands">
    </div>
</form>