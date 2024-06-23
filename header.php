<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="">
    <meta name="description" content="" />
	<link href="css/style.css" rel="stylesheet">
	<title>Syncwear</title>
	</head>
	<body>
        <?php 
        SESSION_START();
        include "lib/connection.php";
        $id=$_SESSION['userid'];
        $sql = "SELECT * FROM cart where userid='$id'";
        $result = $conn -> query ($sql);
        ?>
		<!-- navbar Start -->
        <div class="custom-navbar">
        <a class="navbar-brand" href="index.html">SyncWear<span>.</span></a>
	    <nav>
		    <a href="index.php">Home</a>
            <a href="shop.php">SmartWatch</a>
            <a href="contactus.php">ContactUs</a>
            <a href="cart.php">Cart</a>
            <span></span>
        </nav>
        <?php 
            if(isset($_SESSION['auth']))
            {
                if($_SESSION['auth']==1)
                {   
        ?>
        <a href="order.php"><button class="login">Order</button></a>
        <a href="logout.php"><button class="reg">Logout</button></a>
        <?php
            }
        }
        else
        {
        ?>
        <a href="login.php"><button class="login">Login</button></a>
        <a href="Register.php"><button class="reg">Register</button></a>
        <?php
        }
        ?>
        </div>
    </body>
</html>
