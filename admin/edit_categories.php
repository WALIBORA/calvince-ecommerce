<?php 
include('../includes/connect.php');
if(isset($_GET['edit_categories'])){
    $edit_cat_id=$_GET['edit_categories'];
    $select_query="select * from categories where category_id='$edit_cat_id'";
    $result_select=mysqli_query($con,$select_query);
    $row=mysqli_fetch_array($result_select);
    $category_id=$row['category_id'];
    $category_title=$row['Category_title'];
}
  //insert query
  if(isset($_POST['edit_categories'])){
    $category_title= $_POST['categories_title'];
$update_query="update `categories` set Category_title='$category_title' where category_id='$edit_cat_id'"; 
$result_select=mysqli_query($con,$update_query);
}
if ( $result_select) {
    echo"<script>alert('successfully edited the categories')</script>";
}
?>
<form action="" method="post" class="mt-5">
    <div class="input-group w-90 mb-2">
        <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-receipt"></i></span>
        <input type="text" class="form-control" name="categories_title" value="<?php echo $category_title?>" aerial-label="category" aerial-describeby="basic-addon1">
    </div>
    <div class="input-group w-10 mb-2 m-auto">
        <input type="submit" class="bg-info p-2 my-3 border-0" name="edit_categories" 
        value="edit_categories">
    </div>
</form>