<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $matatu_id = $_POST['matatu_id'];
    $route = $_POST['route'];
    $passenger_name = $_POST['passenger_name'];
    $payment_amount = $_POST['payment_amount'];

    // Insert booking into the database
    $sql = "INSERT INTO bookings (matatu_id, route, passenger_name, payment_amount) 
            VALUES ('$matatu_id', '$route', '$passenger_name', '$payment_amount')";
    if ($conn->query($sql)) {
        echo "Booking added successfully!";
    } else {
        echo "Error: " . $conn->error;
    }
}
?>
