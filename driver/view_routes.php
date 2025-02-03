<?php include 'header.php'; ?>
<?php include 'db.php'; ?>

<div class="container mt-5">
    <h4 class="center-align text-light">List of Routes</h4>

    <?php
    $sql = "SELECT * FROM routes";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "
        <table class='table table-bordered table-striped'>
            <thead>
                <tr class='blue-grey darken-3 white-text'>
                    <th>ID</th>
                    <th>Route Name</th>
                    <th>Start Location</th>
                    <th>End Location</th>
                </tr>
            </thead>
            <tbody>";
        while ($row = $result->fetch_assoc()) {
            echo "
                <tr>
                    <td>".$row['id']."</td>
                    <td>".$row['route_name']."</td>
                    <td>".$row['start_location']."</td>
                    <td>".$row['end_location']."</td>
                </tr>";
        }
        echo "</tbody></table>";
    } else {
        echo "<div class='alert alert-warning'>No Routes found!</div>";
    }
    ?>
</div>

<?php include 'footer.php'; ?>
