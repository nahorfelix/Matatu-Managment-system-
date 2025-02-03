<?php
session_start();
include 'db.php';
// If user is already logged in, redirect them
if (isset($_SESSION['user_id'])) {
    if ($_SESSION['role'] == 'admin') {
        header('Location: admin_dashboard.php');
    } elseif ($_SESSION['role'] == 'user') {
        header('Location: index.php');
    } else {
        header('Location: index.php');
    }
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Register</title>
    <!-- Include your styles and scripts -->
</head>
<body>
    <?php include 'header.php'; ?>
    <div class="container mt-5">
        <div class="row">
            <div class="col s12 m6 offset-m3">
                <div class="card">
                    <div class="card-content">
                        <h5 class="card-title">User Registration</h5>
                        <?php
                        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                            $username = $_POST['username'];
                            $password = $_POST['password'];
                            $confirm_password = $_POST['confirm_password'];

                            // Validate passwords match
                            if ($password !== $confirm_password) {
                                echo "<div class='alert alert-danger'>Passwords do not match!</div>";
                            } else {
                                // Check if username already exists
                                $check_user = "SELECT * FROM users WHERE username = '$username'";
                                $result = $conn->query($check_user);

                                if ($result->num_rows > 0) {
                                    echo "<div class='alert alert-danger'>Username already exists!</div>";
                                } else {
                                    // Hash the password
                                    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

                                    // Insert the new user into the database
                                    $sql = "INSERT INTO users (username, password, role) VALUES ('$username', '$hashed_password', 'user')";
                                    if ($conn->query($sql) === TRUE) {
                                        echo "<div class='alert alert-success'>Registration successful! You can now <a href='login.php'>log in</a>.</div>";
                                    } else {
                                        echo "<div class='alert alert-danger'>Error: " . $conn->error . "</div>";
                                    }
                                }
                            }
                        }
                        ?>

                        <form method="POST" action="register.php">
                            <div class="input-field">
                                <input type="text" name="username" required>
                                <label for="username">Username</label>
                            </div>
                            <div class="input-field">
                                <input type="password" name="password" required>
                                <label for="password">Password</label>
                            </div>
                            <div class="input-field">
                                <input type="password" name="confirm_password" required>
                                <label for="confirm_password">Confirm Password</label>
                            </div>
                            <button class="btn btn-primary" type="submit">Register</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include 'footer.php'; ?>
</body>
</html>