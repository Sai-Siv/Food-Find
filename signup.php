<?php
include 'connection.php';
// $connection=mysqli_connect("localhost:3307","root","");
// $db=mysqli_select_db($connection,'demo');
if(isset($_POST['sign']))
{

    $username=$_POST['name'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $gender=$_POST['gender'];

    $pass=password_hash($password,PASSWORD_DEFAULT);
    $sql="select * from login where email='$email'" ;
    $result= mysqli_query($connection, $sql);
    $num=mysqli_num_rows($result);
    if($num==1){

        echo "<h1><center>Account already exists</center></h1>";
    }
    else{
    
    $query="insert into login(name,email,password,gender) values('$username','$email','$pass','$gender')";
    $query_run= mysqli_query($connection, $query);
    if($query_run)
    {
      
       
        header("location:signin.php");
       
    }
    else{
        echo '<script type="text/javascript">alert("data not saved")</script>';
        
    }
}


   
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Page</title>
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
        .registration-container {
            background-color: rgba(255, 255, 255, 0.7);
            padding: 20px;
            border-radius: 30px;
            text-align: center;
            position: relative;
            width: 400px;
        }
        .registration-form {
            margin-top: 50px;
        }
        .registration-form input {
            width: calc(100% - 22px);
            padding: 10px;
            margin-bottom: 10px;
            border-radius: 30px;
            border: 1px solid #ccc;
            box-sizing: border-box;
            text-align: center;
        }
        .registration-form input[type="text"],
        .registration-form input[type="email"],
        .registration-form input[type="password"] {
            background-position: 10px center;
            background-repeat: no-repeat;
        }
        .registration-form button {
            width: 100px;
            padding: 10px;
            border-radius: 30px;
            border: none;
            background-color: #007bff;
            color: #fff;
            cursor: pointer;
        }
        .registration-form button:hover {
            background-color: #0056b3;
        }
        .registration-form input::placeholder {
            text-align: center;
        }
        .registration-form label {
            display: inline-block;
            margin-right: 10px;
        }
        .registration-form .gender-input {
            display: inline-block;
            margin-right: 10px;
        }
        .registration-form .continue-button {
            margin-top: 20px;
        }
        .registration-form .already-account {
            margin-top: 20px;
        }
        .registration-form .already-account a {
            color: #007bff;
            text-decoration: none;
        }

        .saiva{
            display:flex
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
    <div class="registration-container">
        <h2>User Registration</h2>
        <form class="registration-form" action="" method="POST">
            <input type="text" name="name" placeholder="Name">
            <br>
            <input type="email" name="email" placeholder="Email">
            <br>
            <input type="password" name="password" placeholder="Password">
            <br>
            <div class="saiva">
                <label for="male" >Male</label>
                <input type="radio" id="male" name="gender" class="gender-input" value="male">
                <label for="female" >Female</label>
                <input type="radio" id="female" name="gender" class="gender-input" value="female">
            </div>
            <br>
            <button type="submit" class="continue-button" name="sign">Continue</button>
        </form>
        <p class="already-account">Already have an account? <a href="signin.php">Sign in</a></p>
    </div>
</body>
</html>
