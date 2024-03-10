<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
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
        <h2>User Login</h2>
        <form class="login-form" action="" method="POST">
            <input type="text" name="email" placeholder="Email address">
            <br>
            <input type="password" name="password" placeholder="Password">
            <br>
            <button type="submit" name="sign">Login</button>
        </form>
        <?php
        session_start();
        include 'connection.php';
        $msg = "";

        if (isset($_POST['sign'])) {
            $email = mysqli_real_escape_string($connection, $_POST['email']);
            $password = mysqli_real_escape_string($connection, $_POST['password']);

            $sql = "SELECT * FROM login WHERE email='$email'";
            $result = mysqli_query($connection, $sql);
            $num = mysqli_num_rows($result);

            if ($num == 1) {
                while ($row = mysqli_fetch_assoc($result)) {
                    if (password_verify($password, $row['password'])) {
                        $_SESSION['email'] = $email;
                        $_SESSION['name'] = $row['name'];
                        $_SESSION['gender'] = $row['gender'];
                        header("location:home.html");
                        exit();
                    } else {
                        $msg = "Incorrect password";
                    }
                }
            } else {
                $msg = "Account does not exist";
            }
        }
        ?>
        <?php if (!empty($msg)) { ?>
            <p style="color: red;"><?php echo $msg; ?></p>
        <?php } ?>
        <p>Don't have an account? <a href="signup.php">Sign Up</a></p>
    </div>
</body>

</html>
