<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Admin Dashboard</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            background-image: url('flower.jpg');
            background-size: cover;
            background-repeat: no-repeat;
        }

        .container {
            margin-top: 30px;
        }

        .form-container {
            max-width: 600px;
            margin: auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>

<body>

    <div class="container">
        <h2 class="text-center mb-4">Admin Dashboard - Add Item</h2>
        <div class="form-container">
            <?php
            // Check if the form is submitted
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                // Database connection
                $server = "localhost:3308";
                $username = "root";
                $password = "";
                $database = "flowershop";

                $conn = mysqli_connect($server, $username, $password, $database);

                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                // Process the form data
                $name = $_POST["name"];
                $category = $_POST["category"];
                $qty = $_POST["qty"];
                $price = $_POST["price"];

                // Handle image upload
                $imageFileName = $_FILES["image"]["name"];
                $imageTempName = $_FILES["image"]["tmp_name"];
                $imagePath = "uploads/" . $imageFileName;
                move_uploaded_file($imageTempName, $imagePath);

                // Insert data into the items table
                $sql = "INSERT INTO item (Name, category, quantity, price, image) VALUES ('$name', '$category', $qty, $price, '$imagePath')";
                if (mysqli_query($conn, $sql)) {
                    echo '<div class="alert alert-success" role="alert">Item added successfully!</div>';
                } else {
                    echo '<div class="alert alert-danger" role="alert">Error: ' . $sql . '<br>' . mysqli_error($conn) . '</div>';
                }

                mysqli_close($conn);
            }
            ?>

            <form action="" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="name">Item Name:</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>
                <div class="form-group">
                    <label for="category">Category:</label>
                    <input type="text" class="form-control" id="category" name="category" required>
                </div>
                <div class="form-group">
                    <label for="qty">Quantity:</label>
                    <input type="number" class="form-control" id="qty" name="qty" required>
                </div>
                <div class="form-group">
                    <label for="price">Price:</label>
                    <input type="number" class="form-control" id="price" name="price" required>
                </div>
                <div class="form-group">
                    <label for="image">Item Image:</label>
                    <input type="file" class="form-control-file" id="image" name="image" accept="image/*" required>
                </div>
                <button type="submit" class="btn btn-primary btn-block">Add Item</button>
            </form>
        </div>
    </div>

</body>

</html>
