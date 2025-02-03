<?php include 'header.php'; ?>
<?php include 'db.php'; ?>

<div class="container mt-5">
    <h2 class="text-light">Add a New Route</h2>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $route_name = $_POST['route_name'];
        $start_location = $_POST['start_location'];
        $end_location = $_POST['end_location'];

        $sql = "INSERT INTO routes (route_name, start_location, end_location) 
                VALUES ('$route_name', '$start_location', '$end_location')";

        if ($conn->query($sql) === TRUE) {
            echo "<p>New route added successfully!</p>";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
    ?>

    <form method="POST">
        <div class="input-field">
            <input type="text" name="route_name" required>
            <label for="route_name">Route Name</label>
        </div>
        <div class="input-field">
            <input type="text" name="start_location" required>
            <label for="start_location">Start Location</label>
        </div>
        <div class="input-field">
            <input type="text" name="end_location" required>
            <label for="end_location">End Location</label>
        </div>
        <button class="btn btn-primary" type="submit">Add Route</button>
    </form>
</div>

<?php include 'footer.php'; ?>
