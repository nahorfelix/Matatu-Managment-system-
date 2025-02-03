<?php include 'header.php'; ?>
<?php include 'db.php'; ?>

<div class="container">
    <h2 class="text-light">Book a Passenger</h2>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $passenger_name = $_POST['passenger_name'];
        $matatu_id = $_POST['matatu_id'];
        $booking_date = $_POST['booking_date'];
        $route = $_POST['route'];
        $payment_amount = $_POST['payment_amount'];

        $sql = "INSERT INTO bookings (passenger_name, matatu_id, booking_date, route, payment_amount) 
                VALUES ('$passenger_name', '$matatu_id', '$booking_date', '$route', '$payment_amount')";

        if ($conn->query($sql) === TRUE) {
            echo "<p>Passenger booked successfully!</p>";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
    ?>
<style>
    .custom-dropdown {
        background-color: #003366; /* Dark background color */
        color: white !important; /* Text color */
    }

    .custom-dropdown option {
        background-color: #f1f1f1; /* Option background */
        color: #333 !important; /* Option text color */
    }

    .select-wrapper input.select-dropdown {
        background-color: #003366; /* Dropdown background */
        color: white !important; /* Dropdown text color */
    }

    .select-wrapper ul.dropdown-content li > span {
        color: #333 !important; /* Option text color */
    }

    /* Fix padding and margin to prevent overlap */
    .input-field {
        margin-bottom: 30px;
    }

    /* Adjust dropdown width */
    .select-wrapper {
        width: 100%;
    }

    /* Label styles */
    label {
        color: #ffffff !important; /* Label color for better contrast */
        font-weight: bold; /* Make label text bold */
        display: block; /* Ensure label is displayed as block element for better spacing */
        margin-bottom: 5px; /* Add some space below the label */
    }

    /* Active label color */
    .input-field .active {
        color: #ffeb3b !important; /* Label color when focused */
    }
</style>
<form method="POST">
    <div class="row">
        <!-- Matatu Selection -->
        <div class="input-field col s12 m6">
            <select name="matatu_id" class="custom-dropdown" required>
                <option value="" disabled selected>Select Matatu</option>
                <option value="1">KCX 009A</option>
                <option value="2">KDK 097G</option>
                <option value="4">KAB 456U</option>
                <option value="5">KDA 987T</option>
                <!-- Add more options as needed -->
            </select>
            <label for="matatu_id">Matatu</label>
        </div>

        <!-- Static Route Selection -->
        <div class="input-field col s12 m6">
            <select name="route" class="custom-dropdown" required>
                <option value="" disabled selected>Select Route</option>
                <option value="Nairobi to Nyeri">Nairobi to Nyeri</option>
                <option value="Nairobi to Machakos">Nairobi to Machakos</option>
                <!-- Add more options as needed -->
            </select>
            <label for="route">Route</label>
        </div>
    </div>

    <div class="row">
        <!-- Passenger Name -->
        <div class="input-field col s12 m6">
            <input type="text" name="passenger_name" required>
            <label for="passenger_name">Passenger Name</label>
        </div>

        <!-- Payment Amount -->
        <div class="input-field col s12 m6">
            <input type="number" name="payment_amount" required>
            <label for="payment_amount">Payment Amount (in Ksh)</label>
        </div>
    </div>

    <div class="row">
        <!-- Booking Date -->
        <div class="input-field col s12 m6">
            <input type="date" name="booking_date" required>
            <label for="booking_date">Booking Date</label>
        </div>
    </div>

    <!-- Submit Button -->
    <div class="row">
        <div class="col s12">
            <button type="submit" class="btn waves-effect waves-light">Add Booking</button>
        </div>
    </div>
</form>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var elems = document.querySelectorAll('select');
        var instances = M.FormSelect.init(elems);
    });
</script>
</div>

<?php include 'footer.php'; ?>
