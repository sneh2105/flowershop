<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Flower Shop</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            background-image: url('flower.jpg');
            background-size: cover;
            background-repeat: no-repeat;
        }

        .navbar {
            background-color: #00997a;
        }

        .navbar-brand {
            color: #ffffff;
            font-size: 1.5em;
            font-weight: bold;
        }

        .navbar-brand img {
            height: 40px;
            width: auto;
            margin-right: 10px;
        }

        .navbar-nav .nav-link {
            color: #ffffff;
        }

        .container {
            margin-top: 30px;
        }

        .card {
            margin-bottom: 20px;
        }
    </style>
</head>

<body>

    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
        <h2 style="color: white; text-align: center;">Flower Shop</h2>        
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Categories</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contact</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="container">
        <h2 class="text-center mb-4">Welcome to Flower Shop</h2>
        <div class="row">
            <?php
            // Assuming you have a connection to the database already established
            $server = "localhost:3308";
            $username = "root";
            $password = "";
            $database = "flowershop";

            $conn = mysqli_connect($server, $username, $password, $database);

            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // Fetch items from the database
            $sql = "SELECT * FROM item";
            $result = mysqli_query($conn, $sql);

            // Display items
            while ($row = mysqli_fetch_assoc($result)) {
                echo '<div class="col-md-3">
                        <div class="card">
                            <img src="' . (isset($row['image']) ? $row['image'] : '') . '" class="card-img-top" alt="' . (isset($row['Name']) ? $row['Name'] : '') . '">
                            <div class="card-body">
                                <h5 class="card-title">' . (isset($row['Name']) ? $row['Name'] : '') . '</h5>
                                <p class="card-text">Category: ' . (isset($row['category']) ? $row['category'] : '') . '</p>
                                <p class="card-text">Quantity: ' . (isset($row['quantity']) ? $row['quantity'] : '') . '</p>
                                <button class="btn btn-primary">Add to Cart</button>
                            </div>
                        </div>
                    </div>';
            }
            ?>
 </div>
    </div>

    <!-- Bootstrap JS and jQuery (optional, for certain Bootstrap features) -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>

</html>