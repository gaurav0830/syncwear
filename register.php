<?php
error_reporting(0);
include "lib/connection.php";
$result = null;
  if (isset($_POST['u_submit'])) 
  {
    $f_name=$_POST['u_name'];
    $l_name=$_POST['l_name'];
    $email=$_POST['email'];
    $pass=md5($_POST['pass']);
    $cpass=md5($_POST['c_pass']);

    if ($pass==$cpass) 
    {
         $insertSql = "INSERT INTO users(f_name ,l_name, email, pass) VALUES ('$f_name', '$l_name','$email', '$pass')";

         if ($conn -> query ($insertSql)) 
         {
            $result="Account Open success";
            header("location:login.php");
         }
         else
         {
             die($conn -> error);
         }
    }
    else
    {
      $result="Password Not Match";
    }
  } 


 //echo $result_std -> num_rows;


?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Syncwear</title>
  <link rel="stylesheet" href="user/reg.css">
    </head>
    <body>
    <div class="container">
        <div class="illust">
        <img src="image/illust.jpg" alt="" width="400px" height="580px">
        </div>
        <form  action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" id="signup-form" class="form">
        <h2>Sign Up</h2>
        <?php echo $result;  ?>
        <div class="input-container">
            <div class="underline"></div>
        </div>
        <div class="input-container">
            <input type="text" id="input" name="u_name" required>
            <label for="input" class="label" >First Name</label>
            <div class="underline"></div>
        </div>
        <div class="input-container">
            <input type="text" id="input" name="l_name" required>
            <label for="last" class="label">Last Name:</label>
            <div class="underline"></div>
        </div>
        <div class="input-container">
            <input type="email" id="input" name="email" required>
            <label for="last" class="label" >Email:</label>
            <div class="underline"></div>
        </div>
        <div class="input-container">
            <input type="password" id="input" name="pass" pattern="\w{6}" title="Enter 6 digit password " required>
            <label for="password" class="label" id="new-password"  required>Password:</label>
            <div class="underline"></div>
        </div>
        <div class="input-container">
            <input type="password" id="input"  name="c_pass" required>
            <label for="password" class="label" id="new-password"  required>Confirm Password:</label>
            <div class="underline"></div>
        </div>
        <button type="submit" name="u_submit">Sign Up</button>
        </form>
        <div class="switch">
        <p>Already have an account?<a href="login.php">signin now</a></p>

        </div>
    </div>
  <script>
   
  </script>
</body>
</html>