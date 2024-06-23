<?php error_reporting(0) ?>
<?php
 
 include'lib/connection.php';
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
if(isset($_POST['order_btn'])){
  $userid = $_POST['user_id'];
  $name = $_POST['user_name'];
  $number = $_POST['number'];
  $address = $_POST['address'];
  $payment = $_POST['payment'];
  $zipid = $_POST['zipid'];
  /*$price_total = $_POST['total'];*/
  $status="pending";

  $cart_query = mysqli_query($conn, "SELECT * FROM `cart` where userid='$userid'");
  $price_total = 0;
  if(mysqli_num_rows($cart_query) > 0){
     while($product_item = mysqli_fetch_assoc($cart_query)){
        $product_name[] = $product_item['productid'] .' ('. $product_item['quantity'] .') ';
        $product_price = number_format($product_item['price'] * $product_item['quantity']);
        $price_total += $product_price;
        $sql = "SELECT * FROM product";
        $result = $conn -> query ($sql);
      
        if (mysqli_num_rows($result) > 0) {
          // output data of each row
          while($row = mysqli_fetch_assoc($result)) {
            if($row['id']===$product_item['productid'])
            {
              if($product_item['quantity']<=$row['quantity'])
              {
                $update_id=$row['id'];
                $t=$row['quantity']-$product_item['quantity'];
                $update_quantity_query = mysqli_query($conn, "UPDATE `product` SET quantity = '$t' WHERE id = '$update_id'");
                

                $flag=1;


                

              }
              else
              {
                echo "out of stock " .$row['name']." Quantity:".$row['quantity'];
              }
            }
          }

        }

     };
     if($flag==1)
     {
       $total_product = implode('',$product_name);
       $detail_query = mysqli_query($conn, "INSERT INTO `orders`(userid, name, address, phone,  payment, zipid, totalproduct, totalprice, status) VALUES('$userid','$name','$address','$number','$payment','$zipid','$total_product','$price_total','$status')") or die($conn -> error);
           
             $cart_query1 = mysqli_query($conn, "delete FROM `cart` where userid='$userid'");
             header("location:index.php");

     }
  };



}

$id=$_SESSION['userid'];
 $sql = "SELECT * FROM cart where userid='$id'";
 $result = $conn -> query ($sql);

 if(isset($_POST['update_update_btn'])){
  $update_value = $_POST['update_quantity'];
  $update_id = $_POST['update_quantity_id'];
  $update_quantity_query = mysqli_query($conn, "UPDATE `cart` SET quantity = '$update_value' WHERE id = '$update_id'");
  if($update_quantity_query){
     header('location:cart.php');
  };
};

if(isset($_GET['remove'])){
  $remove_id = $_GET['remove'];
  mysqli_query($conn, "DELETE FROM `cart` WHERE id = '$remove_id'");
  header('location:cart.php');
};


?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="shortcut icon" href="">
  <title>Syncwear</title>
    <style>
      *{
        margin-top:3px;
      }
      .table{
        width:98%;
        margin:20px;
      }
      
        h5{
            color:white;
            font-weight:bold;
            font-size:100px;
        }
        th{
            color:#E87A00;
            font-size:25px;
            text-align:center;
            height:50px;
        }
        td{
            color:white;
            padding-top:20px;
            padding-left:120px;
            border:solid white;
            border-top:none ;
            border-left: none;
            border-right: none;
        }
       thead{
        background-color: #045174;
        height:45px;
       }
       .qty{
        width:50px;
        height:30px;
        border:2px solid #045174;
        border-radius:5px;
        padding-left:10px;
        margin-left: 10px;
       }
       .update{
        background-color: #D89C60;
        color:white;
        margin-left:-10px;
        font-weight:bold;
        font-size: 18px;
        border-radius: 10px;
        margin-top:-10px;
        border:none;
        width:100px;
        height:30px;
        transition: all 0.10s ease-in;
       }
       .update:hover{
        background-color: #045174;
       }
       .ctn{
        background-color: #D89C60;
        color:white;
        width:300px;
        height:50px;
        font-size: 20px;
        font-weight:bold;
        border-radius: 20px;
        border:none;
        margin-top: 20px;
        margin-left:100px;
       }
       .total{
        text-align:left;
        padding:15px;
        width:700px;
        background-color: #045174;
        font-size:25px;
        font-weight: bold;
        margin-top:-60px;
        margin-left:790px;
       }
       .sub{
        font-weight:bold;
        font-size:20px;
        color:white;
        padding-top: 5px;
        margin-left: 60%;;
       }
       .subp{
        text-align:right;
        margin-top:-28px;
        font-size:20px;
        margin-left:300px;
       }
       .totalhr{
        width:47%;
        border:1px solid white;
        opacity:1;
        margin-top:10px;
        margin-left:52%;
       }
       .checkout{
        margin-top:100px;
       }
       details{
        width:87%;
        background-color: #045174;
        color:#E87A00;
        height:60px;
        margin:20px;
        margin-left:100px;
       }
      details > summary {
            list-style: none;
     }
     summary{
        font-weight:bold;
        font-size:25px;
        margin-left:10px;
        padding:15px;
        padding-left:30px;
     }
     .icon{
        margin-left:75%;
     }
     .check{
      width:82%;
      margin-left: -15px;
     }
     .add{
      width:121%;
      margin:20px;
      box-shadow:5px 5px 10px black;
      border-radius:5px;
      background-color: #045174;
      color:white;
      font-weight: bold;
     }
     ::placeholder {
        color: orange;
        font-size:15px;
    }
    .phno{
      width:121%;
      margin-left:20px;
      box-shadow:5px 5px 10px black;
      border-radius:5px;
      background-color: #045174;
      color:white;
      font-weight: bold;
      padding:7px;
      padding-left:15px;
    }
    .pay{
      width:121%;
      margin:20px;
      box-shadow:5px 5px 10px black;
      border-radius:5px;
      background-color: #045174;
      color:white;
      font-weight: bold;
      padding:7px;
      padding-left:15px;
    }
    .zip{
      width:121%;
      margin-left:20px;
      box-shadow:5px 5px 10px black;
      border-radius:5px;
      background-color: #045174;
      color:white;
      font-weight: bold;
      padding:7px;
      padding-left:15px;

    }
    .order{
      width:121%;
      height:50px;
      margin:20px;
      box-shadow:5px 5px 10px black;
      border-radius:5px;
      background-color: #D89C60;
      color:white;
      font-weight: bold;
      padding:7px;
      font-size: 20px;
      font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif
    }
    .order:hover{
      background-color: #001F3D;
    }
    .hero1{
      margin-top:50px;
    }
    </style>
	</head>

	<body>


		<!-- Start Hero Section -->
			<div class="hero1">
				<div class="container">
					<div class="row ">
						
							<div class="intro-excerpt">
								<h1 style="color:white;margin-left:30px;font-size:40px;">Cart</h1>
							</div>
						
                    </div>
                     <div class="row"> 
                    <table class="table">
                    <thead >
                        <tr>
                        <!-- <th scope="col">#</th> -->
                        <th class="th">Name</th>
                        <th class="th">Quantity</th>
                        <th class="th">Price</th>
                        <th class="th">Update</th>
                        <th class="th">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    $total=0;
                            if (mysqli_num_rows($result) > 0) {
                                // output data of each row
                                while($row = mysqli_fetch_assoc($result)) {
                                ?>

                        <tr>
                                
                        <!-- <th scope="row">1</th> -->
                        <td style="padding-top:20px;font-size:20px;font-weight:bold;"><?php echo $row["name"] ?></td>
                    
                        <td style="padding-top:20px;"><form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                            <input type="hidden" name="update_quantity_id"  value="<?php echo  $row['id']; ?>" >
                            <input type="number" name="update_quantity" min="1" class="qty" value="<?php echo $row['quantity']; ?>" >
                            
                            </td> 
                        
                        
                        <td style="padding-top:10px;">₹<?php echo $row["price"]*$row["quantity"]  ?></td>
                        <?php $total=$total+$row["price"]*$row["quantity"] ;?>
                        <td style="padding-top:20px;width:"><input type="submit" value="update" class="update" name="update_update_btn"></td>
                        </form>
                        <input type="hidden" name="status" value="pending">   
                        <td style="padding-top:20px;"><a href="cart.php?remove=<?php echo $row['id']; ?>"><img src="image/trash.svg" alt="trash" width="20px" height="20px" style="margin-left:15px;"></a></td>
                        
                        </tr>
                        <?php 
                        }
                        
                            } 
                            else 
                                echo "No Products in the Cart";
                            ?>
                    
                    </tbody>
                    </table>
                    </div>
                
                            
		<!-- End Hero Section -->
        
              <div class="row">
                <div class="col">
                      <a href="shop.php"><button class="ctn">Continue Shopping</button></a>
                </div>
                <div class="col">
                  <div class="row ">
                     
                          <h3 class="total">Cart Totals</h3>

                          <span class="sub" style="margin-top:10px;">Subtotal :</span>
                          <?php echo "<strong class='subp' >₹ $total</strong>"; ?>
                            <hr class="totalhr"></hr>
                            <span class="sub" style="margin-top:10px;margin-left">Tax :</span>
                            <strong class='subp' style="margin-left:350px;">₹ 0</strong>
                            <hr class="totalhr"></hr>
                          <span class="sub">Total :</span>
                          <?php echo "<strong class='subp' style='margin-left:340px' >₹ $total</strong>"; ?>
                          <hr class="totalhr"></hr>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <details>
  <summary>
    Proceed To Checkout
    <span class="icon">+</span>
  </summary>
  <p>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">

      <div class="check ">
      <input type="hidden" name="total" value="<?php echo $total ?>">
      <input type="hidden" name="user_id" value="<?php echo $_SESSION['userid']; ?>">
      <input type="hidden" name="user_name" value="<?php echo $_SESSION['username']; ?>">
        <textarea class="add" max=100 min=100 placeholder="Address" style="padding-left:20px;padding-top:13px;" name="address" required></textarea>
       </div>
       <div class="check">
        <input type="number" class="phno" placeholder="Phone Number" name="number" required>
       </div>
       <div class="check">
        <select name="payment" class="pay" required>
          <option value="COD">Cash On Delivery</option>
          <option value="Online">Online</option>
        </select>
       </div>
       <div class="check">
        <input type="text" class="zip" placeholder="Zip Code" name="zipid" required>
       </div>

      <div class="check">
      <input type="submit" class="order" value="Order Now" name="order_btn">
    </div>

    </form>
    </p>
</details>
</div>
<br><br><br><br><br><br><br><br><br>
<?php include('footer.php'); ?>
	</body>

</html>
