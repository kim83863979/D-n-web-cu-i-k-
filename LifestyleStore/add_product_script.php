<?php
require 'connection.php'; 

$name = $_POST['name'];
$price = $_POST['price'];

$image = $_FILES['image']['name'];
$target = "../img/".basename($image);

$query = "INSERT INTO items (name, price, image) VALUES ('$name', '$price', '$image')";

if (mysqli_query($con, $query) && move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
    echo "<script>alert('Thêm thành công!'); window.location='admin_products.php';</script>";
} else {
    echo "Lỗi: " . mysqli_error($con);
}
?>