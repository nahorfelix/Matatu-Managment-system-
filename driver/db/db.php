<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "matatu_management";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if user is logged in
function check_login() {
    if (!isset($_SESSION['user_id'])) {
        header('Location: views/login.php');  // Redirect to login page if not logged in
        exit();
    }
}

// Check if user is an admin
function check_admin() {
    if ($_SESSION['role'] != 'admin') {
        header('Location: index.php');  // Redirect to the home page if not an admin
        exit();
    }
}
?>
