<?php
// Database connection
$server = "localhost:3308";
$username = "root";
$password = "";
$database = "flowershop";

$conn = mysqli_connect($server, $username, $password, $database);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Initialize error message
$errorMessage = "";

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Process the form data
    $username = $_POST["username"];
    $password = md5($_POST["password"]);

    // Check if the provided username and password match a record in the database
    $sql = "SELECT * FROM user WHERE username='$username' AND password='$password'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) >= 1) {
        $user = mysqli_fetch_assoc($result);

        // Check if the user has admin privileges
        if ($user['admin'] == 1) {
            // Start the session
            session_start();

            // Set session variables
            $_SESSION['username'] = $username;
            $_SESSION['loggedin'] = true;
            $_SESSION['isAdmin'] = true;

            // Perform actions after successful login for admin, such as redirecting to admin.php
            header("Location: admin.php");
            exit();
        } else {
            // Start the session for regular user
            session_start();

            // Set session variables
            $_SESSION['username'] = $username;
            $_SESSION['loggedin'] = true;

            // Perform actions after successful login for regular user, such as redirecting to welcome.php
            header("Location: welcome.php");
            exit();
        }
    } else {
        $errorMessage = "Invalid username or password!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>User Login</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #f8f9fa;
            margin: 0;
            background-image: url('flower.jpg');
            background-size: cover;
            background-repeat: no-repeat;
        }

        .login-form {
            background-color: #ffe6e6;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.1);
            margin-top: 50px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6 mx-auto">
                <div class="login-form">
                    <h2 class="text-center mb-4">User Login</h2>
                    <?php
                    // Display error message if exists
                    if (!empty($errorMessage)) {
                        echo "<div class='alert alert-danger' role='alert'>";
                        echo $errorMessage;
                        echo "</div>";
                    }
                    ?>
                    <form action="" method="post">
                        <div class="form-group">
                            <label for="username">Username:</label>
                            <input type="text" class="form-control" id="username" name="username" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Password:</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block">Login</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS and jQuery (optional, for certain Bootstrap features) -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
