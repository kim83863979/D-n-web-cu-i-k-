<?php
// File: thankyou.php

// Lấy dữ liệu từ GET
$orderId    = $_GET['orderId'] ?? '';
$resultCode = $_GET['resultCode'] ?? '';
$message    = $_GET['message'] ?? '';
$amount     = $_GET['amount'] ?? '';
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Thanh toán - Ví MoMo</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
</head>
<body>
    <div class="container text-center" style="margin-top: 100px;">
        <?php if ($resultCode == '0'): ?>
            <h2 class="text-success">🎉 Thanh toán thành công qua Ví MoMo!</h2>
        <?php else: ?>
            <h2 class="text-danger">❌ Thanh toán thất bại hoặc đã hết hạn</h2>
        <?php endif; ?>

        <p>Cảm ơn bạn đã mua hàng tại <strong>Lifestyle Store</strong>.</p>
        <?php if ($orderId): ?>
            <p>Mã đơn hàng: <b><?= htmlspecialchars($orderId) ?></b></p>
        <?php endif; ?>
        <?php if ($amount): ?>
            <p>Số tiền: <b><?= htmlspecialchars($amount) ?> VNĐ</b></p>
        <?php endif; ?>
        <?php if ($message): ?>
            <p>Thông báo: <?= htmlspecialchars($message) ?></p>
        <?php endif; ?>

        <a href="index.php" class="btn btn-primary mt-3">Tiếp tục mua hàng</a>
    </div>
</body>
</html>
