<?php
session_start();
require 'connection.php';

if(!isset($_SESSION['email'])){
    header('location: login.php');
    exit();
}

$user_id = $_SESSION['id'];

// Lấy sản phẩm trong giỏ hàng
$user_products_query = "SELECT it.id, it.name, it.price, it.price 
                        FROM users_items ut 
                        INNER JOIN items it ON it.id = ut.item_id 
                        WHERE ut.user_id = '$user_id'";
$user_products_result = mysqli_query($con, $user_products_query) or die(mysqli_error($con));

$no_of_user_products = mysqli_num_rows($user_products_result);
$sum = 0;
$products = [];

if($no_of_user_products == 0){
    echo "<script>window.alert('Giỏ hàng đang trống!');</script>";
} else {
    while($row = mysqli_fetch_array($user_products_result)){
        $sum += $row['price']; 
        $products[] = $row;
    }
}
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <link rel="shortcut icon" href="img/lifestyleStore.png" />
    <title>Lifestyle Store</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" type="text/css">
    <script src="bootstrap/js/jquery-3.2.1.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>

    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/style.css" type="text/css">
</head>
<body>
<div>
    <?php require 'header.php'; ?>
    <br>

    <div class="container">
        <h2 class="text-center">Giỏ hàng của bạn</h2>
        <table class="table table-bordered table-striped">
            <thead>
                <tr class="bg-info">
                    <th>STT</th>
                    <th>Tên sản phẩm</th>
                    <th>Size</th>
                    <th>Giá (VNĐ)</th>
                    <th>Thao tác</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $counter = 1;
                foreach($products as $row){
                ?>
                <tr>
                    <td><?= $counter ?></td>
                    <td><?= htmlspecialchars($row['name']) ?></td>
                    <td><?= htmlspecialchars($row['size']) ?></td>
                    <td><?= number_format($row['price']) ?></td>
                    <td><a href="cart_remove.php?id=<?= $row['id'] ?>" class="btn btn-danger btn-sm">Xóa</a></td>
                </tr>
                <?php $counter++; } ?>
                <tr class="bg-light">
                    <td></td>
                    <td><strong>Tổng cộng</strong></td>
                    <td><strong><?= number_format((int)$sum) ?> VNĐ</strong></td>
                    <td>
                        <!-- Nút thanh toán MoMo -->
                        <form action="momo_payment.php" method="POST" style="display:inline;">
                            <input type="hidden" name="amount" value="<?= (int)$sum ?>">
                            <button type="submit" class="btn btn-primary">
                                Thanh toán bằng Ví MoMo
                            </button>
                        </form>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <footer class="footer" style="margin-top: 100px;">
        <div class="container text-center">
            <p>Copyright &copy; Lifestyle Store. All Rights Reserved.</p>
            <p>Developed by Sajal Agrawal | Tích hợp MoMo bởi Long Huỳnh</p>
        </div>
    </footer>
</div>
</body>
</html>
