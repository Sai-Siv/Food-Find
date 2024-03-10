<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
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
        .container {
            background-color: rgba(255, 255, 255, 0.7);
            padding: 20px;
            border-radius: 30px;
            text-align: center;
            position: relative;
            width: 400px;
        }
        .container input {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border-radius: 30px;
            border: 1px solid #ccc;
            box-sizing: border-box;
            text-align: center;
        }
        .container textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border-radius: 10px;
            border: 1px solid #ccc;
            box-sizing: border-box;
            text-align: center;
        }
        .container select {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border-radius: 30px;
            border: 1px solid #ccc;
            box-sizing: border-box;
            text-align-last: center;
        }
        .container button {
            width: 100px;
            padding: 10px;
            border-radius: 30px;
            border: none;
            background-color: #007bff;
            color: #fff;
            cursor: pointer;
        }
        .container button:hover {
            background-color: #0056b3;
        }
        .container input::placeholder,
        .container textarea::placeholder {
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
    </style>
</head>
<body>
<div class="logo"></div>
    <div class="left-middle">
        <p><a href="#">Search</a></p>
        <p><a href="#">Find</a></p>
        <p><a href="#">Donate</a></p>
    </div>
    <div class="container">
        <h2>Admin Register</h2>

        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <input type="text" id="username" name="username" placeholder="Name" required>
            <br>
            <input type="email" id="email" name="email" placeholder="Email" required>
            <br>
            <input type="password" name="password" id="password" placeholder="Password" required>
            <br>
            <textarea id="address" name="address" placeholder="Address" required></textarea>
            <br>
            <select id="district" name="district" required>
                <option value="chennai">Chennai</option>
                <!-- Add other options here -->
            </select>
            <br>
            <button type="submit" name="sign">Register</button>
        </form>
        <p>Already a member? <a href="signin.php">Login Now</a></p>
        <?php
            include '../connection.php';
            $msg = 0;
            if(isset($_POST['sign'])) {
                $username=$_POST['username'];
                $email=$_POST['email'];
                $password=$_POST['password'];
                $location=$_POST['district'];
                $address=$_POST['address'];
                $pass=password_hash($password,PASSWORD_DEFAULT);
                $sql="select * from admin where email='$email'" ;
                $result= mysqli_query($connection, $sql);
                $num=mysqli_num_rows($result);
                if($num==1){
                    echo "<h1><center>Account already exists</center></h1>";
                }
                else{
                    $query="insert into admin(name,email,password,location,address) values('$username','$email','$pass','$location','$address')";
                    $query_run= mysqli_query($connection, $query);
                    if($query_run) {
                        header("location:signin.php");
                    }
                    else{
                        echo '<script type="text/javascript">alert("data not saved")</script>';
                    }
                }
            }
        ?>
    </div>
</body>
</html>
