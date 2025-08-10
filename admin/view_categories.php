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
           <th>category id</th>
           <th>category title</th>
           <th>edit categories</th>
           <th>delete categories</th>
          </tr>
        </thead>
        <tbody>
        <?php
$select_categories="select * from `categories`";
$result_categories=mysqli_query($con,$select_categories);
while($row_fetch=mysqli_fetch_array($result_categories)) {
  $category_id=$row_fetch['category_id'];
  $categories_title=$row_fetch['Category_title'];
  ?>
  <td ><?php echo  $category_id ?></td>
  <td><?php echo  $categories_title ?></td>
  <td><a href='index.php?edit_categories=<?php echo  $category_id ?>' class='fa-solid fa-pen-to-square text-white'></a></td>
  <td><a href='index.php?delete_categories=<?php echo  $category_id ?>' class='fa-solid fa-trash text-white'></a></td>
</tr>
  <?php
 }
  ?>
        </tbody>
      </table>
</body>
</html>