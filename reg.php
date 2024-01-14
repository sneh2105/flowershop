<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User Registration</title>
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
        .registration-form {
            background-color: #ffe6e6;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.1);
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6 mx-auto">
                <div class="registration-form">
                    <h2 class="text-center mb-4">User Registration</h2>
                    <?php
                    // Database connection
                    $server="localhost:3308";
                    $username="root";
                    $password="";
                    $database="flowershop";
                    
                    $conn = mysqli_connect($server,$username,$password,$database);

                    // Check the connection
                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                    }
                    // Check if the form is submitted
                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        // Process the form data
                        $name = $_POST["name"];
                        $username = $_POST["username"];
                        $password = md5($_POST["password"]);
                        $cpassword=md5($_POST["cpassword"]);
                        $email = $_POST["email"];
                        $dob = $_POST["dob"];
                        $phno = $_POST["phno"];

                        $existsql="SELECT * FROM `user` WHERE username='$username' ";
                        $result=mysqli_query($conn,$existsql);
                        $numExistRows=mysqli_num_rows($result);
                        if($numExistRows >0){
                            echo "<div class='alert alert-success' role='alert'>";
                                 echo "Username Already Exists";
                            echo "</div>";
                         }
                         else{
                            if($password==$cpassword){
                        // Insert data into the "users" table
                        $sql = "INSERT INTO user (name, username, password, email, dob, phno) 
                                VALUES ('$name', '$username', '$password', '$email', '$dob', '$phno')";

                        if ($conn->query($sql) === TRUE) {
                            echo "<div class='alert alert-success' role='alert'>";
                            echo "<strong>Registration Successful!</strong><br>";
                            echo "Name: $name<br>";
                            echo "Username: $username<br>";
                            echo "Email: $email<br>";
                            echo "Date of Birth: $dob<br>";
                            echo "Phone Number: $phno<br>";
                            echo "</div>";
                        } 
                        echo '<script>window.location="login.php";</script>';
                    }
                    else {
                            echo "<div class='alert alert-danger' role='alert'>";
                            echo "<strong>Passwords do not match!</strong>";
                            echo "</div>";
                        }
                       }
                    }
                    ?>
                    <form action="" method="post">
                        <div class="form-group">
                            <label for="name">Name:</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                        <div class="form-group">
                            <label for="username">Username:</label>
                            <input type="text" class="form-control" id="username" name="username" required>
                        </div>
                        <div class="form-group">
                        <label for="password">Password:</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                        <div class="form-group">
                             <label for="cpassword">Confirm Password:</label>
                            <input type="password" class="form-control" id="cpassword" name="cpassword" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="form-group">
                            <label for="dob">Date of Birth:</label>
                            <input type="date" class="form-control" id="dob" name="dob" required>
                        </div>
                        <div class="form-group">
                            <label for="phno">Phone Number:</label>
                            <input type="tel" class="form-control" id="phno" name="phno" required>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block">Register</button>
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
