<?php
session_start();
include '../connection.php';
$msg=0;
if (isset($_POST['sign'])) {
  $email = $_POST['email'];
  $password = $_POST['password'];
  $sanitized_emailid =  mysqli_real_escape_string($connection, $email);
  $sanitized_password =  mysqli_real_escape_string($connection, $password);

  $sql = "select * from admin where email='$sanitized_emailid'";
  $result = mysqli_query($connection, $sql);
  $num = mysqli_num_rows($result);
 
  if ($num == 1) {
    while ($row = mysqli_fetch_assoc($result)) {
      if (password_verify($sanitized_password, $row['password'])) {
        $_SESSION['email'] = $email;
        $_SESSION['name'] = $row['name'];
        $_SESSION['location'] = $row['location'];
        $_SESSION['Aid']=$row['Aid'];
        header("location:admin.php");
      } else {
        $msg = 1;
      }
    }
  } else {
    echo "<h1><center>Account does not exist</center></h1>";
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap">
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Montserrat', sans-serif;
            background-image: url('background0.png');
            background-size: cover;
            background-position: center;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            position: relative;
        }
        .logo {
            width: 100px;
            height: 100px;
            background-image: url('rectangle-20.png');
            background-size: cover;
            background-position: center;
            position: absolute;
            top: 10px;
            left: 10px;
        }
        .login-container {
            background-color: rgba(255, 255, 255, 0.7);
            padding: 20px;
            border-radius: 30px;
            text-align: center;
            position: relative;
            width: 400px;
        }
        .login-form {
            margin-top: 50px;
        }
        .login-form input {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border-radius: 30px;
            border: 1px solid #ccc;
            box-sizing: border-box;
            text-align: center;
        }
        .login-form input[type="text"] {
            background-image: url('mail0.png');
            background-repeat: no-repeat;
            background-position: 10px center;
        }
        .login-form input[type="password"] {
            background-image: url('security-shield-green0.png');
            background-repeat: no-repeat;
            background-position: 10px center;
        }
        .login-form button {
            width: 100px;
            padding: 10px;
            border-radius: 30px;
            border: none;
            background-color: #007bff;
            color: #fff;
            cursor: pointer;
        }
        .login-form button:hover {
            background-color: #0056b3;
        }
        .login-form input::placeholder {
            text-align: center;
        }
        .left-middle {
            position: absolute;
            left: 50px;
            top: 50%;
            transform: translateY(-50%);
            color: #fff;
            text-align: left;
            line-height: 0.5;
            font-size: 70px;
        }
        .left-middle a {
            color: #fff;
            text-decoration: none;
            font-weight: bold;
            font-size: 70px;
            font-family: 'Montserrat', sans-serif;
        }
    </style>
</head>
<body>
    <div class="logo"></div>
    <div class="left-middle">
        <p><a href="#">Search</a></p>
        <p><a href="#">Find</a></p>
        <p><a href="#">Donate</a></p>
    </div>
    <div class="login-container">
        <h2>Login</h2>
        <form class="login-form" action="" method="POST">
            <input type="text" name="email" placeholder="Email">
            <br>
            <input type="password" name="password" placeholder="Password">
            <br>
            <button type="submit" name="sign">Login</button>
        </form>
        <p><?php if($msg==1){ echo "Password don't match."; } ?></p>
        <p>Don't have an account? <a href="signup.php">Register</a></p>
    </div>
</body>
</html>
