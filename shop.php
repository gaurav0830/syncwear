<?php
error_reporting(0);
?>

<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="shortcut icon" href="favicon.png">
  <title>Syncwear</title>
  
		
	<style>
 /* CSS */
.product-card-container {
  display: flex;
  flex-wrap: wrap; 
  padding-left:25px;
  width:100%;
  margin-left:10px;
}

.product-card {
  border: 3px solid #001F3D;
  border-radius: 5px;
  margin-top:30px;
  border-radius:10px;
  background-color: #045174;
  transition: all 0.10s ease-in;
  animation: glider 1.8s infinite linear;
  animation-delay: 0.05s;
  cursor:pointer;
}


.product-card:hover{
    background-color: #D89C60;
    color:#001F3D;
    border:3px solid #001F3D; 
    
}
.product-card img {
  width:300px;
  height:300px;
  padding:15px;
  padding-left:15px;
  border-radius:20px;
}

.product-card h3 {
  font-size: 30px;
  margin-top: 5px;
  font-weight:bold;
  padding-left:20px;
}

.product-card p {
  font-size: 20px;
  color: white;
  margin-top: -20px;
  font-weight:bold;
  padding-left:20px;
}

.product-card .sub {
  width: 80px;
  height: 70px;
  background-color: #001F3D;
  color: white;
  border: none;
  border-bottom-right-radius: 10px;
  top:-50px;
  margin-left:253px;
  cursor: pointer;
  position:relative;
}
.product-card .sub img{
  position:absolute;
  top:20px;
  width:20px;
  cursor:pointer;
}
.product-card .add img{
    width:30px;
    height:30px;
}


    </style>
    </head>

	<body>
    <?php
 include'header.php';
 include'lib/connection.php';

 $sql = "SELECT * FROM product";
 $result = $conn -> query ($sql);

 if(isset($_POST['add_to_cart'])){

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
  $user_id=$_POST['user_id'];
  $product_name = $_POST['product_name'];
  $product_price = $_POST['product_price'];
  $product_id = $_POST['product_id'];
  $product_quantity = 1;

  $select_cart = mysqli_query($conn, "SELECT * FROM `cart` WHERE productid = '$product_id'  && userid='$user_id'");

  if(mysqli_num_rows($select_cart) > 0){
    echo "<script>alert('product already added to cart !!')</script>";

  }else{
     $insert_product = mysqli_query($conn, "INSERT INTO `cart`(userid, productid, name, quantity, price) VALUES('$user_id', '$product_id', '$product_name', '$product_quantity', '$product_price')");
   echo "<script>alert('product added to cart succesfully')</script>";
   
  }

}

?>
<div class="intro-excerpt">
		<h1 style="color:white;margin-left:50px;font-size:40px;">Shop</h1>
</div>
							
        <div class="product-card-container">
  
            <?php
          if (mysqli_num_rows($result) > 0) {
            // output data of each row
            while($row = mysqli_fetch_assoc($result)) {
              ?>
          <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
           
          <div class="product-card" style="width:330px;">
                <img src="image/<?php echo $row['imgname']; ?>" >
                    <h3><?php echo $row["name"] ?></h3> 
                    <p>₹<?php echo $row["Price"] ?></p>
                <input type="hidden" name="user_id" value="<?php echo $_SESSION['userid'];?>" >
                <input type="hidden" name="product_id" value="<?php echo $row['id']; ?>"> 
                <input type="hidden" name="product_name" value="<?php echo $row['name']; ?>">
                <input type="hidden" name="product_price" value="<?php echo $row['Price']; ?>">              
             
                    <button  class="sub"  name="add_to_cart"><img src="images/shopcart.svg" style="width:50px;height:70px;margin-top:-30px;margin-left:-40px;z-index:10;" alt=""></button>
              </div>
            </form>
            <?php 
    }
        } 
        else 
            echo "0 results";
        ?>	
  </div>        
  <?php include('footer.php'); ?>
	</body>
</html>
