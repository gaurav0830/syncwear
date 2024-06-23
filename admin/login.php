<?php 

SESSION_START();

if(isset($_SESSION['auth']))
{
    if($_SESSION['auth']==1)
    {
        header("location:home.php");
    }
}


include "lib/connection.php";
    if (isset($_POST['submit'])) 
    {
        $email = $_POST['email'];
        $pass = ($_POST['password']);
        echo $email;
        echo $pass;

        $loginquery="SELECT * FROM admin WHERE userid='$email' AND pass='$pass'";
        $loginres = $conn->query($loginquery);

        echo $loginres->num_rows;

        if ($loginres->num_rows > 0) 
        {

            while ($result=$loginres->fetch_assoc()) 
            {
                $username=$result['userid'];
            }

            $_SESSION['username']=$username;
            $_SESSION['auth']=1;
            header("location:home.php");
        }
        else
        {
            echo "invalid";
        }
    }


?>
<!DOCTYPE html>
<html>
<head>
	<title>Admin</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/login.css">
</head>
<body>
<div class="container">
            <div class="card-header">
                <h3>Sign In</h3>
            </div>
            <div class="card-body">
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                    <div class="input">
                        <input type="text" class="user" placeholder="username" name="email">
                        
                    </div>
                    <div class="input">
                        <input type="password" class="password" placeholder="password" name="password">
                    </div>
                    <div class="form">
                        <input type="submit" value="Login" class="btn" name="submit">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>