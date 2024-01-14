<?php 
$server = "localhost:3308";
$username = "root";
$password = "";
$database = "flowershop";

$conn = mysqli_connect($server, $username, $password, $database);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['user_id'])) { 
    $userId = $_GET['user_id']; 
    $updateQuery = "UPDATE user SET blocked = 1 WHERE id = $userId"; 
    $updateResult = mysqli_query($conn, $updateQuery); 
    if ($updateResult) { 
        header("Location: ".$_SERVER['HTTP_REFERER']."?action=blocked"); 
        exit(); 
    } else { 
        echo "Failed to block user"; 
    } 
} else { 
    echo "Invalid request"; 
} 
?>