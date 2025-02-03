<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Materialize CSS and Bootstrap 5 -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom Styles -->
    <link rel="stylesheet" href="../css/style.css">
    <title>Femwe Matatu Management System</title>
</head>
<body>
    <!-- Navigation Bar using Bootstrap -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="index.php">Matatu Management</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="views/add_matatu.php">Add Matatu</a></li>
                    <li class="nav-item"><a class="nav-link" href="views/view_matatus.php">View Matatus</a></li>
                    <li class="nav-item"><a class="nav-link" href="views/book_passenger.php">Book Passenger</a></li>
                    <li class="nav-item"><a class="nav-link" href="views/view_bookings.php">View Bookings</a></li>
                    <li class="nav-item"><a class="nav-link" href="views/add_driver.php">Add Driver</a></li>
                    <li class="nav-item"><a class="nav-link" href="views/assign_driver.php">Assign Driver</a></li>
                </ul>
            </div>
        </div>
    </nav>
