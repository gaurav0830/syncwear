<?php
 include'header.php';


if(isset($_SESSION['auth']))
{
   if($_SESSION['auth']!=1)
   {
       header("location:login.php");
   }
}
else
{
   header("location:login.php");
}
include'lib/connection.php';
$k=$_SESSION['userid'];
$sql = "SELECT * FROM orders where userid='$k'";
$result = $conn -> query ($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Syncwear</title>
    <link rel="stylesheet" href="css/orders.css">

</head>
<body>

<div class="container">
  <h5>View Orders</h5>
<table class="table">
  <thead>
    <tr class="head">
      <th>Order ID</th>
      <th>Name</th>
      <th>Address</th>
      <th>Phone</th>
      <th>Payment Details</th>
      <th>Zip Code</th>
      <th>Total Price</th>
      <th>Status</th>
    </tr>
  </thead>
  <tbody>
  <?php
  $k=0;
          if (mysqli_num_rows($result) > 0) {
            // output data of each row
            while($row = mysqli_fetch_assoc($result)) {
             
              ?>
    <tr>
      <td><?php echo $row['id']; ?></td>
      <td><?php echo $row["name"] ?></td>
      <td><?php echo $row["address"] ?></td>
      <td><?php echo $row["phone"] ?></td>
      <td><?php echo $row["payment"] ?></td>
      <td><?php echo $row["zipid"] ?></td>
      <td><?php echo $row["totalprice"] ?>000</td>
      <td><?php echo $row["status"] ?></td>
    </tr>
    <?php 
    }
        } 
        else 
            echo "<td colspan='8'>results</td>";
        ?>
  </tbody>
</table>
</div><br><br><br><br><br><br><br><br><br>
<?php
 include'footer.php';
?>
</body>
</html>

