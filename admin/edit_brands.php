<?php 
include('../includes/connect.php');
if(isset($_GET['edit_brands'])){
    $edit_brand_id=$_GET['edit_brands'];
    $select_query="select * from brands where Brand_id='$edit_brand_id'";
    $result_select=mysqli_query($con,$select_query);
    $row=mysqli_fetch_array($result_select);
    $brand_id=$row['Brand_id'];
    $brand_title=$row['Brand_title'];
}
  //insert query
  if(isset($_POST['edit_brands'])){
    $brand_title= $_POST['brand_title'];
$update_query="update `brands` set Brand_title='$brand_title' where Brand_id='$edit_brand_id'"; 
$result_select=mysqli_query($con,$update_query);
}
if ( $result_select) {
    echo"<script>alert('successfully edited the brands')</script>";
}
?>
<form action="" method="post" class="mt-5">
    <div class="input-group w-90 mb-2">
        <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-receipt"></i></span>
        <input type="text" class="form-control" name="brand_title" value="<?php echo $brand_title?>" aerial-label="category" aerial-describeby="basic-addon1">
    </div>
    <div class="input-group w-10 mb-2 m-auto">
        <input type="submit" class="bg-info p-2 my-3 border-0" name="edit_brands" 
        value="edit_brands">
    </div>
</form>