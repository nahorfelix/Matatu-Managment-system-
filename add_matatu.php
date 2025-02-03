<?php include 'header.php'; ?>
<?php include 'db.php'; ?>

<div class="container mt-5">
    <div class="row justify-content-center"> <!-- Added justify-content-center for Bootstrap -->
        <div class="col s12 m6"> <!-- Removed offset-m3 for better centering -->
            <div class="card">
                <div class="card-content">
                    <h5 class="card-title text-light">Add a New Matatu</h5>
                    
                    <?php
                    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                        $reg_number = $_POST['registration_number'];
                        $capacity = $_POST['capacity'];
                        $route_id = $_POST['route_id'];

                        $sql = "INSERT INTO matatus (registration_number, capacity, route_id) VALUES ('$reg_number', '$capacity', '$route_id')";

                        if ($conn->query($sql) === TRUE) {
                            echo "<div class='alert alert-success'>New matatu added successfully!</div>";
                        } else {
                            echo "<div class='alert alert-danger'>Error: " . $conn->error . "</div>";
                        }
                    }
                    ?>

                    <form method="POST">
                        <div class="mb-3"> <!-- Bootstrap class to ensure margin -->
                            <label for="registration_number" class="form-label">Registration Number</label>
                            <input type="text" class="form-control" name="registration_number" required> <!-- Bootstrap form-control -->
                        </div>

                        <div class="mb-3">
                            <label for="capacity" class="form-label">Capacity</label>
                            <input type="number" class="form-control" name="capacity" required> <!-- Bootstrap form-control -->
                        </div>

                        <div class="mb-3">
                            <label for="route_id" class="form-label">Select Route</label>
                            <select name="route_id" class="form-select"> <!-- Bootstrap form-select -->
                                <?php
                                $sql = "SELECT * FROM routes";
                                $result = $conn->query($sql);
                                while ($row = $result->fetch_assoc()) {
                                    echo "<option value='".$row['id']."'>".$row['route_name']." (".$row['start_location']." - ".$row['end_location'].")</option>";
                                }
                                ?>
                            </select>
                        </div>

                        <button class="btn btn-primary w-100" type="submit">Add Matatu</button> <!-- Button stretches to full width -->
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>
