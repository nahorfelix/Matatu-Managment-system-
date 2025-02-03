<?php include 'header.php'; ?>
<?php include 'db.php'; ?>

<div class="container mt-5">
    <h4 class="center-align text-light">List of Matatus</h4>

    <?php
    $sql = "SELECT m.id, m.registration_number, m.capacity, d.name AS driver_name, r.route_name 
    FROM matatus m
    LEFT JOIN drivers d ON m.driver_id = d.id
    LEFT JOIN routes r ON m.route_id = r.id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
echo "
<table class='table table-bordered table-striped'>
    <thead>
        <tr class='blue-grey darken-3 white-text'>
            <th>ID</th>
            <th>Registration Number</th>
            <th>Capacity</th>
            <th>Driver</th>
            <th>Route</th>
        </tr>
    </thead>
    <tbody>";
while ($row = $result->fetch_assoc()) {
    echo "
        <tr>
            <td>".$row['id']."</td>
            <td>".$row['registration_number']."</td>
            <td>".$row['capacity']."</td>
            <td>".($row['driver_name'] ? $row['driver_name'] : 'No driver assigned')."</td>
            <td>".($row['route_name'] ? $row['route_name'] : 'No route assigned')."</td>
        </tr>";
}
echo "</tbody></table>";
} else {
echo "<div class='alert alert-warning'>No Matatus found!</div>";
}

    ?>
</div>

<?php include 'footer.php'; ?>
