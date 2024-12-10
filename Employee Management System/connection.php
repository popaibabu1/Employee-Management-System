<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "employee_management";

$conn = new mysqli($servername, $username, $password, $database);
if($conn){
    //echo "Connection Success.";
}

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
