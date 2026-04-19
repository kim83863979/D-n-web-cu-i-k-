<?php
session_start();
// Kiểm tra nếu chưa đăng nhập hoặc không phải Admin (role = 1) thì đá văng ra ngoài
if(!isset($_SESSION['email']) || $_SESSION['role'] != 1){
    header('location: login.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <title>Premium Admin Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" type="text/css">
        <!-- jquery library -->
        <script type="text/javascript" src="bootstrap/js/jquery-3.2.1.min.js"></script>
        <!-- Latest compiled and minified javascript -->
        <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="css/style-admin.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">
</head>

<body>
    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg fixed-top shadow-sm px-4">
        <div class="container-fluid">
            <button class="navbar-toggler border-0 shadow-none" type="button" onclick="toggleSidebar()">
                <i class="fa-solid fa-bars fs-3 text-secondary"></i>
            </button>
            <a class="navbar-brand fw-bold fs-4 ms-2 d-none d-lg-block" href="#"
                style="background: linear-gradient(45deg, #3b82f6, #8b5cf6); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">
                
            </a>

            <div class="d-flex align-items-center ms-auto">
                <div class="nav-right">
                    <span class="text-secondary fw-medium me-2">Admin 👤|</span>
                    <a href="login.php" class="text-danger text-decoration-none fw-medium">Đăng xuất ⏻</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- SIDEBAR -->
    <div class="sidebar" id="sidebar">
        <a href="admin_products.php" class="active"><i class="fa-solid fa-box-open"></i> Quản lý sản phẩm</a>
        <!-- <a href="#"><i class="fa-solid fa-cart-shopping"></i> Đơn hàng</a>
        <a href="#"><i class="fa-solid fa-users"></i> Khách hàng</a> -->
    </div>

    <!-- MAIN -->
    <div class="main">

        <div class="row g-4 mb-4">
            <div class="col-xs-12 col-sm-6 col-md-3">
                <div class="card-box bg-blue">
                    <div class="icon-wrapper"><i class="fa-solid fa-box"></i></div>
                    <div class="card-info">
                        <h4>Sản phẩm</h4>
                        <h2>120</h2>
                    </div>
                </div>
            </div>

            <div class="col-xs-12 col-sm-6 col-md-3">
                <div class="card-box bg-green">
                    <div class="icon-wrapper"><i class="fa-solid fa-cart-arrow-down"></i></div>
                    <div class="card-info">
                        <h4>Đơn hàng</h4>
                        <h2>75</h2>
                    </div>
                </div>
            </div>

            <div class="col-xs-12 col-sm-6 col-md-3">
                <div class="card-box bg-orange">
                    <div class="icon-wrapper"><i class="fa-solid fa-users"></i></div>
                    <div class="card-info">
                        <h4>Khách hàng</h4>
                        <h2>50</h2>
                    </div>
                </div>
            </div>

            <div class="col-xs-12 col-sm-6 col-md-3">
                <div class="card-box bg-red">
                    <div class="icon-wrapper"><i class="fa-solid fa-wallet"></i></div>
                    <div class="card-info">
                        <h4>Doanh thu</h4>
                        <h2>30tr</h2>
                    </div>
                </div>
            </div>
        </div>

        <div class="row" style="margin-top: 30px;">
            <div class="col-md-8">
                <div style="background: #fff; padding: 20px; border-radius: 16px; box-shadow: 0 4px 15px rgba(0,0,0,0.05);">
                    <h4 style="font-weight: 600; color: #475569; margin-bottom: 20px;">Thống kê Doanh thu</h4>
                    <canvas id="revenueChart" height="100"></canvas>
                </div>
            </div>

            <div class="col-md-4">
                <div style="background: #fff; padding: 20px; border-radius: 16px; box-shadow: 0 4px 15px rgba(0,0,0,0.05);">
                    <h4 style="font-weight: 600; color: #475569; margin-bottom: 20px;">Trạng thái Đơn hàng</h4>
                    <canvas id="orderChart" height="215"></canvas>
                </div>
            </div>
        </div>
    </div>

    <!-- FOOTER -->
    <footer>
        <div class="px-4 text-center w-100">
            <p class="m-0">
                Copyright © Lifestyle Store. All Rights Reserved. |
                Contact Us: +91 90000 00000
            </p>
            <p class="m-0 mt-1 text-muted" style="font-size: 13px;">
                This website is developed by Sajal Agrawal
            </p>
        </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        function toggleSidebar() {
            if (window.innerWidth <= 768) {
                document.getElementById("sidebar").classList.toggle("show");
            }
        }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        // 1. VẼ BIỂU ĐỒ CỘT (DOANH THU)
        const ctxRevenue = document.getElementById('revenueChart').getContext('2d');
        new Chart(ctxRevenue, {
            type: 'bar',
            data: {
                labels: ['Tuần 1', 'Tuần 2', 'Tuần 3', 'Tuần 4'],
                datasets: [{
                    label: 'Doanh thu (VNĐ)',
                    data: [12000000, 19000000, 15000000, 25000000], // Số liệu giả lập
                    backgroundColor: 'rgba(59, 130, 246, 0.8)', // Màu xanh dương hợp tone
                    borderRadius: 8
                }]
            },
            options: { responsive: true }
        });

        // 2. VẼ BIỂU ĐỒ TRÒN (TRẠNG THÁI ĐƠN HÀNG)
        const ctxOrder = document.getElementById('orderChart').getContext('2d');
        new Chart(ctxOrder, {
            type: 'doughnut',
            data: {
                labels: ['Đã xác nhận', 'Đang chờ xử lý'],
                datasets: [{
                    data: [50, 25], // Số liệu giả lập
                    backgroundColor: ['#10b981', '#f59e0b'], // Xanh ngọc và Cam
                    hoverOffset: 4
                }]
            },
            options: { responsive: true, cutout: '70%' }
        });
    </script>

</body>

</html>
