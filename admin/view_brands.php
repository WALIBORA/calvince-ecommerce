<?php
include('../includes/connect.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>view Categories</title>
    <link rel="stylesheet" type="text/css" href="../index.css">
    </style>
</head>
<body>
    <h4 class="text-center text-success">All Categories</h4>
    <table class="table table-sm table-bordered text-center bg-dark text-white">
        <thead>
          <tr class="bg-primary">
           <th>Brand id</th>
           <th>Brand title</th>
           <th>edit Brands</th>
           <th>delete Brands</th>
          </tr>
        </thead>
        <tbody>
        <?php
$select_brands="select * from `brands`";
$result_brands=mysqli_query($con,$select_brands);
while($row_fetch=mysqli_fetch_array($result_brands)) {
  $brand_id=$row_fetch['Brand_id'];
  $brand_title=$row_fetch['Brand_title'];
  ?>
  <td ><?php echo    $brand_id ?></td>
  <td><?php echo    $brand_title?></td>
  <td><a href='index.php?edit_brands=<?php echo $brand_id ?>' class='fa-solid fa-pen-to-square text-white'></a></td>
  <td><a href='index.php?delete_brands=<?php echo   $brand_id ?>' class='fa-solid fa-trash text-white'></a></td>
</tr>
  <?php
 }
  ?>
        </tbody>
      </table>
</body>
</html>