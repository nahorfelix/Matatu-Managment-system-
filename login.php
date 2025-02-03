<?php
session_start();
include 'db.php'; 

// If user is already logged in, redirect them
if (isset($_SESSION['user_id'])) {
    if ($_SESSION['role'] == 'admin') {
        header('Location: admin_dashboard.php');
    }
    elseif($_SESSION['role'] == 'user'){
        header('Location: index.php');
    }
    else {
        header('Location: index.php');
    }
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login</title>
    <!-- Include your styles and scripts -->
</head>
<body>
    <?php include 'header.php'; ?>
    <div class="container mt-5">
        <div class="row">
            <div class="col s12 m6 offset-m3">
                <div class="card">
                    <div class="card-content">
                        <h5 class="card-title">User Login</h5>
                        <?php
                        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                            $username = $_POST['username'];
                            $password = $_POST['password'];

                            // Fetch user data
                            $sql = "SELECT * FROM users WHERE username = '$username'";
                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {
                                $user = $result->fetch_assoc();
                                if ($user['password'] == $password) {
                                    // Set session for logged-in user
                                    $_SESSION['user_id'] = $user['id'];
                                    $_SESSION['username'] = $user['username'];
                                    $_SESSION['role'] = $user['role'];

                                    // Redirect to dashboard if admin, otherwise to homepage
                                    if ($user['role'] == 'admin') {
                                        header('Location: admin_dashboard.php');
                                    } 
                                    elseif($_SESSION['role'] == 'user'){
                                        header('Location: index.php');
                                    }
                                    else {
                                        header('Location: index.php');
                                    }
                                } else {
                                    echo "<div class='alert alert-danger'>Invalid password!</div>";
                                }
                            } else {
                                echo "<div class='alert alert-danger'>User not found!</div>";
                            }
                        }
                        ?>

                        <form method="POST">
                            <div class="input-field">
                                <input type="text" name="username" required>
                                <label for="username">Username</label>
                            </div>
                            <div class="input-field">
                                <input type="password" name="password" required>
                                <label for="password">Password</label>
                            </div>
                            <button class="btn btn-primary" type="submit">Login</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include 'footer.php'; ?>
</body>
</html>
