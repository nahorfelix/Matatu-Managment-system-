<?php include 'header.php'; ?>
<?php include 'db.php'; ?>

<div class="container">
    <h2 class="text-light">Add a Driver</h2>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $name = $_POST['name'];
        $license_number = $_POST['license_number'];

        $sql = "INSERT INTO drivers (name, license_number) VALUES ('$name', '$license_number')";

        if ($conn->query($sql) === TRUE) {
            echo "<p>New driver added successfully!</p>";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
    ?>

    <form method="POST">
        <label>Driver Name:</label>
        <input type="text" name="name" required><br>

        <label>License Number:</label>
        <input type="text" name="license_number" required><br>

        <button type="submit">Add Driver</button>
    </form>
</div>

<?php include 'footer.php'; ?>
