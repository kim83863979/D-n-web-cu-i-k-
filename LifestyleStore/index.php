<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="shortcut icon" href="img/lifestyleStore.png" />
    <title>Lifestyle Store</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <script src="bootstrap/js/jquery-3.2.1.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>

    <!-- CSS -->
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

<?php require 'header.php'; ?>

<!-- BANNER -->
<div id="bannerImage">
    <div class="container">
        <div id="bannerContent">
            <h1>We sell lifestyle.</h1>
            <p>Flat 40% OFF on all premium brands.</p>
            <a href="products.php" class="btn btn-danger btn-lg">Shop Now</a>
        </div>
    </div>
</div>

<!-- PRODUCT SECTION -->
<div class="container" style="margin-top:30px;">
    <div class="row">

        <!-- CAMERA -->
        <div class="col-xs-4">
            <div class="thumbnail">
                <a href="products.php">
                    <img src="img/camera.jpg" alt="Camera">
                </a>
                <div class="caption text-center">
                    <p id="autoResize"><b>Cameras</b></p>
                    <p>Choose among the best available in the world.</p>
                </div>
            </div>
        </div>

        <!-- WATCH -->
        <div class="col-xs-4">
            <div class="thumbnail">
                <a href="products.php">
                    <img src="img/watch.jpg" alt="Watch">
                </a>
                <div class="caption text-center">
                    <p id="autoResize"><b>Watches</b></p>
                    <p>Original watches from the best brands.</p>
                </div>
            </div>
        </div>

        <!-- SHIRT -->
        <div class="col-xs-4">
            <div class="thumbnail">
                <a href="products.php">
                    <img src="img/shirt.jpg" alt="Shirt">
                </a>
                <div class="caption text-center">
                    <p id="autoResize"><b>Shirts</b></p>
                    <p>Our exquisite collection of shirts.</p>
                </div>
            </div>
        </div>

    </div>
</div>

<!-- FOOTER -->
<footer class="footer">
    <div class="container text-center">
        <p>© 2026 Lifestyle Store | Contact: 0900 000 000</p>
        <p>Developed by You 😄</p>
    </div>
</footer>

</body>
</html>