<?php include 'header.php'; ?>
<?php include 'db.php'; ?>

<div class="container text-light">
    <h2 class="text-light">Passenger Bookings</h2>

    <?php
    $result = '';
    if(isset($_SESSION['user_id']) && $_SESSION['role'] == 'user'){
        $username = $_SESSION['username'];
        $stmt = $conn->prepare("SELECT b.id, b.passenger_name, m.registration_number, b.booking_date 
                            FROM bookings b 
                            JOIN matatus m ON b.matatu_id = m.id 
                            WHERE b.passenger_name = ?");
        $stmt->bind_param("s", $username); // Bind the username as a string parameter
        $stmt->execute();
        $result = $stmt->get_result();
    }
    else{
        $sql = "SELECT b.id, b.passenger_name, m.registration_number, b.booking_date 
            FROM bookings b 
            JOIN matatus m ON b.matatu_id = m.id";

            $result = $conn->query($sql);
    }

    if ($result->num_rows > 0) {
        echo "<table border='1'>
                <tr>
                    <th>ID</th>
                    <th>Passenger Name</th>
                    <th>Matatu</th>
                    <th>Booking Date</th>
                </tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>".$row['id']."</td>
                    <td>".$row['passenger_name']."</td>
                    <td>".$row['registration_number']."</td>
                    <td>".$row['booking_date']."</td>
                  </tr>";
        }
        echo "</table>";
    } else {
        echo "No Bookings found!";
    }
    ?>
</div>

<?php include 'footer.php'; ?>
