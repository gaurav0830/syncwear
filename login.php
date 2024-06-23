<?php 

SESSION_START();

if(isset($_SESSION['auth']))
{
    if($_SESSION['auth']==1)
    {
        header("location:index.php");
    }
}


include "lib/connection.php";
    if (isset($_POST['submit'])) 
    {
        $email = $_POST['email'];
        $pass = md5($_POST['password']);

        $loginquery="SELECT * FROM users WHERE email='$email' AND pass='$pass'";
        $loginres = $conn->query($loginquery);

        echo $loginres->num_rows;

        if ($loginres->num_rows > 0) 
        {

            while ($result=$loginres->fetch_assoc()) 
            {
                $username=$result['f_name'];
                $userid=$result['id'];
            }

            $_SESSION['username']=$username;
            $_SESSION['userid']=$userid;
            $_SESSION['auth']=1;
            
            header("location:index.php");
        }
        else
        {
            echo "<script>alert('Invalid Login!!')</script>";
        }
    }


?>

</html>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Syncwear</title>
  <link rel="stylesheet" href="user/log.css">

</head>
<body>
  <div class="container">
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" id="login-form" class="form">
      <h2>Welcome Back</h2>
      <div class="input-container">
            <input type="email" id="input" name="email" required>
            <label for="last" class="label" >Email:</label>
            <div class="underline"></div>
        </div>
        <div class="input-container">
            <input type="password" id="input" name="password" required>
            <label for="password" class="label" id="new-password" name="password" required>Password:</label>
            <div class="underline"></div>
        </div>
      <button type="submit" name="submit">Login</button>
    </form>
    <div class="switch">
        <p>Don't have an account?<a href="register.php">signup now</a></p>

        </div>
  </div>
</body>
</html>

