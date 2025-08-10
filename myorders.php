<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php 
            $user_name=$_SESSION['username'];
            $select_data="select * from `usertable` where username='$user_name'";
            $result_data=mysqli_query($con,$select_data);
            $row_data=mysqli_fetch_array( $result_data);
            $user_id=$row_data['user_id'];
            ?>
    <h4 class="text-center text-success">my orders</h4>
    <table class="table table-sm table-bordered text-center bg-dark text-white">
        <thead>
          <tr class="bg-primary">
           <th>order number</th>
           <th>amount due</th>
           <th>total product</th>
           <th>invoice number</th>
           <th>date</th>
           <th>complete/incomplete</th>
          </tr>
        </thead>
        <tbody>
          <?php
           $select_table="select * from `orders_table` where user_id='$user_id'";
           $result_table=mysqli_query($con,$select_table);
           while ($row_data=mysqli_fetch_array($result_table)) {
            $order_id= $row_data['order_id'];
            $total_amount= $row_data['total_amount'];
            $total_products= $row_data['total_products'];
            $invoice_number= $row_data['invoice_number'];
            $order_date= $row_data['order_date'];
            $order_status= $row_data['order_status'];
            echo " <tr>
            <td>$order_id</td>
            <td>$total_amount</td>
            <td>$total_products</td>
            <td>$invoice_number</td>
            <td>$order_date</td>
            <td>$order_status</td>
          </tr>";
        }
          ?> 
        </tbody>
      </table>
</body>
</html>