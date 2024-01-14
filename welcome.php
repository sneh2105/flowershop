<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome Page</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background-image: url('register_bg.jpg');
            background-size: cover;
            margin: 0;
            background-image: url('flower.jpg');
            background-size: cover;
            background-repeat: no-repeat;
        }
        .welcome-container {
            text-align: center;
            color: #000;
        }
        .welcome-links a {
            display: block;
            margin: 10px 0;
            padding: 10px;
            background-color: #0096c7;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <div class="welcome-container" >
        <h1>Welcome to Our Website!</h1>
        <br><br><br>
        <div class="welcome-links">
            <a href="register.php">Register</a>
            <a href="login.php">Login</a>
            <a href="adminlogin.php">Admin Page</a>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>