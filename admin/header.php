<?php
include'lib/connection.php';
$sql = "SELECT * FROM orders where status='pending'";
$result = $conn -> query ($sql);

?>

<!DOCTYPE html>
<html>
<head>
	<title>Admin</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!--css link-->
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<section class="header" >
		
		<div class="line">Admin Panel</div>
		<?php
		$c=0;
          if (mysqli_num_rows($result) > 0) {
            // output data of each row
            while($row = mysqli_fetch_assoc($result)) {
				$c=$c+1;
			}
		}
              ?>
		<p class="bell"><img src="images/bell.png" alt="" width="20px" height="20px"></p>
		<p class="msg"><?php echo $c ;?></p>
		<div class="logout"><a href="logout.php" class="logout">Logout</a></div>
	</section>
	

<aside style="height:1000px;">
  <p class="menu"> Menu </p>
  <a href="home.php">Dashboard</a>
  <a href="add_product.php">Add product</a>
  <a href="all_product.php">Product Manage</a>
</aside>

<div class="social">
  <a href="https://www.linkedin.com/in/florin-cornea-b5118057/" target="_blank">
    <i class="fa fa-linkedin"></i>
  </a>
</div>


	<?php

?>
</body>
</html>