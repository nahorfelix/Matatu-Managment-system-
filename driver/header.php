<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Materialize CSS and Bootstrap 5 -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom Styles -->
    <link rel="stylesheet" href="css/style.css">
    <title>Femwe Matatu Management System</title>
</head>
<style>
        /* Header Styling */
        .navbar {
            background: linear-gradient(135deg, #4CAF50, #1E88E5);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .navbar-brand {
            font-size: 1.6rem;
            font-weight: bold;
            font-family: 'Poppins', sans-serif;
            color: #fff !important;
        }

        .navbar-nav .nav-link {
            color: #fff !important;
            font-size: 16px;
            margin: 0 5px;
            font-weight: 500;
            transition: color 0.3s, background-color 0.3s;
        }

        .navbar-nav .nav-link:hover {
            color: #1E88E5 !important;
            background-color: rgba(255, 255, 255, 0.2);
            border-radius: 4px;
        }

        .navbar-toggler {
            border: none;
        }

        .navbar-toggler-icon {
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='%23FFFFFF' viewBox='0 0 30 30'%3E%3Cpath stroke='none' d='M0 0h30v30H0z'/%3E%3Cpath stroke='%23000000' stroke-width='2' d='M4 7h22M4 15h22M4 23h22'/%3E%3C/svg%3E");
        }

        .container {
            max-width: 1200px;
        }

        /* Responsive Fixes */
        @media (max-width: 768px) {
            .navbar-brand {
                font-size: 1.5rem;
            }

            .navbar-nav .nav-link {
                font-size: 0.9rem;
            }
        }
    </style>
<body>
    <!-- Navigation Bar using Bootstrap -->
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="index.php">Matatu Management</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="add_matatu.php">Add Matatu</a></li>
                    <li class="nav-item"><a class="nav-link" href="view_matatus.php">View Matatus</a></li>
                    <li class="nav-item"><a class="nav-link" href="book_passenger.php">Book</a></li>
                    <li class="nav-item"><a class="nav-link" href="view_bookings.php">Bookings</a></li>
                    <li class="nav-item"><a class="nav-link" href="add_driver.php">Add Driver</a></li>
                    <li class="nav-item"><a class="nav-link" href="assign_driver.php">Assign</a></li>
                    <li class="nav-item"><a class="nav-link" href="add_route.php">New Route</a></li>
                    <li class="nav-item"><a class="nav-link" href="view_routes.php">Routes</a></li>
                </ul>
            </div>
        </div>
    </nav>
