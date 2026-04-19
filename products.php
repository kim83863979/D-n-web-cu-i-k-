<?php
    session_start();
    require 'connection.php'; 
    require 'check_if_added.php';

    
    $cat = isset($_GET['cat']) ? mysqli_real_escape_string($con, $_GET['cat']) : "";
    
    if ($cat != "") {
        $query = "SELECT * FROM items WHERE category = '$cat'";
    } else {
        $query = "SELECT * FROM items";
    }
    $result = mysqli_query($con, $query) or die(mysqli_error($con));
?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="shortcut icon" href="img/lifestyleStore.png" />
        <title>Lifestyle Store | Products</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" type="text/css">
        <script type="text/javascript" src="bootstrap/js/jquery-3.2.1.min.js"></script>
        <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="css/style.css" type="text/css">
        <style>
            /* CSS cho nhãn SALE % */
            .sale-tag {
                position: absolute; top: 10px; right: 10px;
                background: #ff0000; color: white; padding: 4px 8px;
                border-radius: 5px; font-weight: bold; z-index: 5;
            }
            .old-price { text-decoration: line-through; color: #999; margin-right: 5px; font-size: 13px; }
            .new-price { color: #d9534f; font-weight: bold; font-size: 16px; }
            .thumbnail { transition: 0.3s; border: 1px solid #ddd; }
            .thumbnail:hover { box-shadow: 0 4px 8px rgba(0,0,0,0.2); }
        </style>
    </head>
    <body>
        <div>
            <?php require 'header.php'; ?>
            
            <div class="container" style="margin-top: 80px;">
                <div class="jumbotron">
                    <h1>Welcome to our LifeStyle Store!</h1>
                    <p>Hãy chọn cho mình những bộ trang phục phong cách nhất.</p>
                </div>

                <div class="row">
                    <?php 
            
                    while($row = mysqli_fetch_array($result)) { 
                      
                        $percent = 0;
                        if($row['discount_price'] > 0 && $row['price'] > 0) {
                            $percent = round((($row['price'] - $row['discount_price']) / $row['price']) * 100);
                        }
                    ?>
                    <div class="col-md-3 col-sm-6">
                        <div class="thumbnail" style="position: relative;">
                            <?php if($percent > 0): ?>
                                <div class="sale-tag">-<?php echo $percent; ?>%</div>
                            <?php endif; ?>

                            <img src="img/<?php echo $row['id']; ?>.jpg" alt="Product" style="height: 230px; object-fit: cover; width: 100%;">
                            
                            <div class="caption text-center">
                                <h4 style="height: 40px; overflow: hidden; font-weight: bold;"><?php echo $row['name']; ?></h4>
                                <p>
                                    <?php if($percent > 0): ?>
                                        <span class="old-price"><?php echo number_format($row['price']); ?>đ</span>
                                        <span class="new-price"><?php echo number_format($row['discount_price']); ?>đ</span>
                                    <?php else: ?>
                                        <span class="new-price"><?php echo number_format($row['price']); ?>đ</span>
                                    <?php endif; ?>
                                </p>

                                <?php if(!isset($_SESSION['email'])){ ?>
                                    <p><a href="login.php" role="button" class="btn btn-primary btn-block">Buy Now</a></p>
                                <?php } else { ?>
                                    <form action="cart_add.php" method="GET">
                                        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                        
                                        <div class="form-group">
                                            <select name="size" class="form-control" required>
                                                <option value="">Chọn Size</option>
                                                <option value="S">Size S</option>
                                                <option value="M">Size M</option>
                                                <option value="L">Size L</option>
                                                <option value="XL">Size XL</option>
                                            </select>
                                        </div>

                                        <?php if(check_if_added_to_cart($row['id'])){ ?>
                                            <button class="btn btn-block btn-success" disabled>Added to cart</button>
                                        <?php } else { ?>
                                            <button type="submit" class="btn btn-block btn-primary">Add to cart</button>
                                        <?php } ?>
                                    </form>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>

            <footer class="footer" style="margin-top: 50px;">
                <div class="container text-center">
                    <p>Copyright &copy; Lifestyle Store. All Rights Reserved.</p>
                </div>
            </footer>
        </div>
    </body>
</html>