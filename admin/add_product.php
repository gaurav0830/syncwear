<?php
SESSION_START();
error_reporting(0);
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
 include'header.php';
 include'lib/connection.php';
 $result=null;
if (isset($_POST['submit'])) 
{
    $name=$_POST['name'];
    $description=$_POST['description'];
    $quantity=$_POST['quantity'];
    $price=$_POST['price'];
    $filename = $_FILES["uploadfile"]["name"];
    echo "<script>console.log($filename)</script>";

    $insertSql = "INSERT INTO `product`(`name`, `description`, `quantity`, `price`, `imgname`) VALUES ('$name', '$description',$quantity, $price, '$filename')";

    if ($conn -> query ($insertSql)) 
    {
       echo "<script>alert('Data insert success')</script>";
        $tempname = $_FILES["uploadfile"]["tmp_name"];   
        $folder = "product_img/".$filename;

        move_uploaded_file($tempname, $folder);
    }
    else
    {
     die($conn -> error);
 }

} 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container1" style=" margin-top:-58%;">
        <h4>Add Product</h4>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
    <label for="name" class="pname">Product Name</label>
    <input type="text" name="name" class="p_name" ><br>

    <label for="desc" class="desc">Description</label>
    <input type="text" name="description" class="p_desc" ><br>
  
    <label for="Quantity" class="qty">Quantity</label>
    <input type="number" name="quantity" class="p_qty" ><br>

    <label for="Price" class="price">Price</label>
    <input type="Number" name="price" class="p_price" ><br>
  
      <label for="uploadfile" class="file">Image</label>
        <input type="file" name="uploadfile"  /><br>
  <button type="submit" name="submit" class="sub">Submit</button>
</form>
    </div>
</body>
</html>