<?php 
$server="localhost:3308";
$username="root";
$password="";
$database="flowershop";

$conn = mysqli_connect($server,$username,$password,$database);
if(!$conn){
    die("Error");
}
else{
    echo "connected";
}
?>