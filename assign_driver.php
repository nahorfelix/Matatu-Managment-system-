<?php include 'header.php'; ?>
<?php include 'db.php'; ?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col s12 m6">
            <div class="card">
                <div class="card-content">
                    <h5 class="card-title text-light">Assign Driver to Matatu</h5>

                    <?php
                    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                        $matatu_id = $_POST['matatu_id'];
                        $driver_id = $_POST['driver_id'];

                        // Check if the driver is already assigned to another matatu
                        $checkDriverSql = "SELECT * FROM matatus WHERE driver_id = $driver_id";
                        $checkDriverResult = $conn->query($checkDriverSql);

                        if ($checkDriverResult->num_rows > 0) {
                            echo "<div class='alert alert-danger'>Driver is already assigned to another matatu!</div>";
                        } else {
                            // Assign the driver to the selected matatu
                            $sql = "UPDATE matatus SET driver_id = $driver_id WHERE id = $matatu_id";

                            if ($conn->query($sql) === TRUE) {
                                echo "<div class='alert alert-success'>Driver assigned successfully!</div>";
                            } else {
                                echo "<div class='alert alert-danger'>Error: " . $conn->error . "</div>";
                            }
                        }
                    }
                    ?>

                    <form method="POST">
                        <div class="mb-3">
                            <label for="matatu_id" class="form-label">Select Matatu</label>
                            <select name="matatu_id" id="matatu_id" class="form-select" required>
                                <?php
                                $sql = "SELECT * FROM matatus";
                                $result = $conn->query($sql);
                                while ($row = $result->fetch_assoc()) {
                                    echo "<option value='".$row['id']."'>".$row['registration_number']."</option>";
                                }
                                ?>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="driver_id" class="form-label">Select Driver</label>
                            <select name="driver_id" id="driver_id" class="form-select" required>
                                <?php
                                $sql = "SELECT * FROM drivers";
                                $result = $conn->query($sql);
                                while ($row = $result->fetch_assoc()) {
                                    echo "<option value='".$row['id']."'>".$row['name']." (".$row['license_number'].")</option>";
                                }
                                ?>
                            </select>
                        </div>

                        <button class="btn btn-primary w-100" type="submit">Assign Driver</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>
