<?php include 'header.php'; ?>
<?php include 'db.php'; ?>

<div class="container mt-5">
    <h4 class="center-align text-light">Admin Dashboard</h4>
    
    <div class="row">
        <div class="col s12 m4">
            <div class="card blue-grey darken-1">
                <div class="card-content white-text">
                    <span class="card-title">Total Matatus</span>
                    <p>
                    <?php
                    $sql = "SELECT COUNT(*) AS total FROM matatus";
                    $result = $conn->query($sql);
                    $data = $result->fetch_assoc();
                    echo $data['total'];
                    ?>
                    </p>
                </div>
            </div>
        </div>
        
        <div class="col s12 m4">
            <div class="card blue-grey darken-1">
                <div class="card-content white-text">
                    <span class="card-title">Total Drivers</span>
                    <p>
                    <?php
                    $sql = "SELECT COUNT(*) AS total FROM drivers";
                    $result = $conn->query($sql);
                    $data = $result->fetch_assoc();
                    echo $data['total'];
                    ?>
                    </p>
                </div>
            </div>
        </div>
        
        <div class="col s12 m4">
            <div class="card blue-grey darken-1">
                <div class="card-content white-text">
                    <span class="card-title">Total Bookings</span>
                    <p>
                    <?php
                    $sql = "SELECT COUNT(*) AS total FROM bookings";
                    $result = $conn->query($sql);
                    $data = $result->fetch_assoc();
                    echo $data['total'];
                    ?>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>
