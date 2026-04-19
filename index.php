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
        <!-- latest compiled and minified CSS -->
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" type="text/css">
        <!-- jquery library -->
        <script type="text/javascript" src="bootstrap/js/jquery-3.2.1.min.js"></script>
        <!-- Latest compiled and minified javascript -->
        <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
        <!-- External CSS -->
        <link rel="stylesheet" href="css/style.css" type="text/css">
    </head>
    <body>
        <div>
           <?php
            require 'header.php';
           ?>
           <div id="bannerImage">
               <div class="container">
                   <center>
                   <div id="bannerContent">
                       <h1>We sell lifestyle.</h1>
                       <p>Flat 40% OFF on all premium brands.</p>
                       <a href="products.php" class="btn btn-danger">Shop Now</a>
                   </div>
                   </center>
               </div>
           </div>
           <div class="container">
               <div class="row">
                   <div class="col-xs-4">
                     <div class="thumbnail">
                         <a href="products.php?cat=Jacket">
                             <img src="img/1.jpg" alt="Jackets">
                         </a>
                         <center>
                             <div class="caption">
                                 <p id="autoResize">Áo Khoác</p>
                                 <p>Các mẫu áo phao, hoodie và jacket mới nhất.</p>
                             </div>
                        </center>
                     </div>
                 </div>
                   <div class="col-xs-4">
                     <div class="thumbnail">
                         <a href="products.php?cat=Pants">
                             <img src="img/17.jpg" alt="Pants">
                         </a>
                         <center>
                             <div class="caption">
                                 <p id="autoResize">Quần Nam/Nữ</p>
                                 <p>Quần Tây, Jean và Short thời trang.</p>
                             </div>
                         </center>
                     </div>
                </div>
                   <div class="col-xs-4">
                       <div class="thumbnail">
                         <a href="products.php?cat=T-Shirt">
                             <img src="img/23.jpg" alt="T-Shirts">
                         </a>
                         <center>
                             <div class="caption">
                                 <p id="autoResize">Áo Thun</p>
                                 <p>Áo thun basic và áo Polo năng động.</p>
                             </div>
                         </center>
                     </div>
                 </div>
               </div>
           </div>
            <br><br> <br><br><br><br>
           <footer class="footer"> 
               <div class="container">
               <center>
                   <p>Copyright &copy Lifestyle Store. All Rights Reserved. | Contact Us: +91 90000 00000</p>
                   <p>This website is developed by Sajal Agrawal</p>
               </center>
               </div>
           </footer>
        </div>
    </body>
</html>