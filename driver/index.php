<?php 
include 'db.php'; 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Matatu Management System</title>

    <!-- Bootstrap CSS for styling and responsiveness -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Include jQuery and Bootstrap JS for the carousel -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<style>
    .slider-container {
            width: 100%;
            height: 500px;
            position: relative;
            overflow: hidden;
            margin-bottom: 70px;
        }

        .slider-wrapper {
            display: flex;
            width: 100%;
            height: 100%;
            transition: transform 0.5s ease-in-out;
        }

        .slider-item {
            flex: 1 0 100%;
            height: 100%;
        }

        .slider-item img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        /* Navigation buttons */
        .slider-nav {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            width: 100%;
            display: flex;
            justify-content: space-between;
        }

        .slider-nav button {
            background-color: rgba(0, 0, 0, 0.5);
            color: #fff;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            font-size: 18px;
        }

        .slider-nav button:hover {
            background-color: rgba(0, 0, 0, 0.7);
        }
</style>
<body>
    <?php include 'header.php'; ?>

    <div class="container">
        <!-- Image Slider Section -->
        <div class="slider-container">
            <div class="slider-wrapper">
                <div class="slider-item">
                    <img src="images/sliders/slider1.jpg" alt="Featured Destination 1">
                </div>
                <div class="slider-item">
                    <img src="images/sliders/slider2.jpg" alt="Featured Destination 2">
                </div>
                <div class="slider-item">
                    <img src="images/sliders/slider3.jpg" alt="Featured Destination 3">
                </div>
            </div>
            <div class="slider-nav">
                <button class="prev-slide">❮</button>
                <button class="next-slide">❯</button>
            </div>
        </div>

        <!-- Popular Routes Section -->
        <div class="popular-routes">
            <h2 class="section-title text-light">Popular Routes</h2>
            <div class="row">
                <div class="col-md-4">
                    <div class="card route-card">
                        <img src="https://www.malindikenya.net/images/uploads/articoli/6397_l.jpg" class="card-img-top" alt="Route 1">
                        <div class="card-body">
                            <h5 class="card-title">Nairobi to Mombasa</h5>
                            <p class="card-text">Enjoy a scenic drive along the coast with comfortable seating and great amenities.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card route-card">
                        <img src="https://www.upkenya.com/wp-content/uploads/2021/09/nairobi-kisumu.jpg" class="card-img-top" alt="Route 2">
                        <div class="card-body">
                            <h5 class="card-title">Nairobi to Kisumu</h5>
                            <p class="card-text">A smooth and quick trip to the heart of Western Kenya. Book your ride now!</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card route-card">
                        <img src="https://www.flightsfrom.com/routes/EDL-NBO.png" class="card-img-top" alt="Route 3">
                        <div class="card-body">
                            <h5 class="card-title">Nairobi to Eldoret</h5>
                            <p class="card-text">Convenient, reliable, and affordable rides to the beautiful town of Eldoret.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Customer Testimonials Section -->
        <div class="testimonials">
            <h2 class="section-title text-light">What Our Customers Say</h2>
            <div class="row">
                <div class="col-md-4">
                    <div class="card testimonial-card">
                        <div class="card-body">
                            <p class="card-text">"Fantastic service! The bus was comfortable and the staff were friendly. Will definitely use this service again!"</p>
                            <footer class="blockquote-footer">John Doe</footer>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card testimonial-card">
                        <div class="card-body">
                            <p class="card-text">"Great experience. The ride was smooth and the trip was on time. Highly recommend!"</p>
                            <footer class="blockquote-footer">Jane Smith</footer>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card testimonial-card">
                        <div class="card-body">
                            <p class="card-text">"I always travel with them. The buses are always clean, and the drivers are professional."</p>
                            <footer class="blockquote-footer">Samuel K.</footer>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include 'footer.php'; ?>
</body>
<script>
    $(document).ready(function() {
        let currentSlide = 0;
        const totalSlides = $('.slider-item').length;

        // Function to show a specific slide
        function showSlide(index) {
            const offset = -index * 100;
            $('.slider-wrapper').css('transform', `translateX(${offset}%)`);
        }

        // Next Slide
        $('.next-slide').click(function() {
            currentSlide = (currentSlide + 1) % totalSlides;
            showSlide(currentSlide);
        });

        // Previous Slide
        $('.prev-slide').click(function() {
            currentSlide = (currentSlide - 1 + totalSlides) % totalSlides;
            showSlide(currentSlide);
        });

        // Auto-slide every 5 seconds
        setInterval(function() {
            currentSlide = (currentSlide + 1) % totalSlides;
            showSlide(currentSlide);
        }, 5000);
    });
</script>
</html>