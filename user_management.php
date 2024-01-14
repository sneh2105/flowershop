<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh"
        crossorigin="anonymous">
    <title>Admin page</title>
    <style>
        body {
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background-image: url('register_bg.jpg');
            background-size: cover;
            margin: 0;
        }

        .container {
            margin-top: 20px;
            background-color: #fff;
            padding: 20px;
            border-radius: 15px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h4 {
            color: #008b8b;
        }

        table {
            margin-top: 30px;
        }

        th,
        td {
            text-align: center;
        }

        th {
            background-color: #008b8b;
            color: #fff;
        }

        td {
            background-color: #f0f0f0;
        }

        a {
            color: #008b8b;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="my-3 text-center">
            <hr>
            <h4 class="alert-heading"> User Details </h4>
        </div>

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Name</th>
                    <th scope="col">Username</th>
                    <th scope="col">Block Status</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
            <?php
// Database connection
$server = "localhost:3308";
$username = "root";
$password = "";
$database = "flowershop";

$conn = mysqli_connect($server, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
    echo "Connected successfully<br>";
}

$stm = "SELECT * FROM user";
$result = mysqli_query($conn, $stm);
$row_cnt = mysqli_num_rows($result);

if ($row_cnt > 0) {
    $x = 1;
    while ($val = mysqli_fetch_assoc($result)) {
        echo "<tr>
                <th scope='row'>" . $x . "</th>
                <td>" . $val['Name'] . "</td>
                <td>" . $val['Username'] . "</td>
                <td id='block_status_" . $val['Id'] . "'>" . $val['blocked'] . "</td>
                <td>
                    <a href='block_user.php?user_id=" . $val['Id'] . "'>
                        <img src='block.png' height=25px width=25px alt='block'>
                    </a> |  
                    <a href='unblock_user.php?user_id=" . $val['Id'] . "'>
                        <img src='unblock.png' height=30px width=30px alt='unblock'>
                    </a>
                </td>
            </tr>";
        $x++;
    }
} else {
    echo "No records found";
}
// Close the database connection
mysqli_close($conn);
?>


            </tbody>
        </table>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
