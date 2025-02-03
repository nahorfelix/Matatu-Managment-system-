<?php
include 'db.php';

// Query to get total revenue per matatu
$sql = "SELECT m.name AS matatu_name, SUM(b.payment_amount) as total_revenue
        FROM matatus m
        LEFT JOIN bookings b ON m.id = b.matatu_id
        GROUP BY m.name";
$result = $conn->query($sql);

// Query to get total revenue in the system
$sql_total = "SELECT SUM(payment_amount) as total_system_revenue FROM bookings";
$total_result = $conn->query($sql_total);
$total_revenue = $total_result->fetch_assoc()['total_system_revenue'];

// Query to get all bookings
$sql_bookings = "SELECT b.passenger_name, b.route, b.payment_amount, m.name as matatu_name
                 FROM bookings b
                 LEFT JOIN matatus m ON b.matatu_id = m.id";
$bookings_result = $conn->query($sql_bookings);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>User Dashboard</title>
    <!-- Include your styles and scripts -->
</head>
<body>
    <?php include 'header.php'; ?>

    <div class="container">
        <h4 class="center-align">User Dashboard</h4>

        <!-- Total Revenue in the System -->
        <div class="card-panel">
            <h5>Total Revenue in the System: Ksh <?php echo number_format($total_revenue, 2); ?></h5>
        </div>

        <!-- Revenue Per Matatu -->
        <h5>Matatu Revenue Summary</h5>
        <table class="striped">
            <thead>
                <tr>
                    <th>Matatu</th>
                    <th>Total Revenue (Ksh)</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()) { ?>
                    <tr>
                        <td><?php echo $row['matatu_name']; ?></td>
                        <td><?php echo number_format($row['total_revenue'], 2); ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>

        <!-- Booking Details -->
        <h5>All Booking Details</h5>
        <table class="striped">
            <thead>
                <tr>
                    <th>Passenger Name</th>
                    <th>Matatu</th>
                    <th>Route</th>
                    <th>Payment (Ksh)</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($booking = $bookings_result->fetch_assoc()) { ?>
                    <tr>
                        <td><?php echo $booking['passenger_name']; ?></td>
                        <td><?php echo $booking['matatu_name']; ?></td>
                        <td><?php echo $booking['route']; ?></td>
                        <td><?php echo number_format($booking['payment_amount'], 2); ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

    <!-- Include Footer -->
    <?php include 'footer.php'; ?>
</body>
</html>
