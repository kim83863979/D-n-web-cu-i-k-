<?php
session_start();
require 'connection.php';
require 'users_items_schema.php';

if (!isset($_SESSION['id'])) {
    header('location: login.php');
    exit();
}

ensure_users_items_schema($con);

$user_id = (int)$_SESSION['id'];
$item_id = isset($_GET['item_id']) ? (int)$_GET['item_id'] : 0;

if ($item_id > 0) {
    mysqli_query(
        $con,
        "UPDATE users_items SET status = 'Cancelled' WHERE user_id = '$user_id' AND item_id = '$item_id' AND status IN ('Ordered COD','Ordered MoMo','Confirmed')"
    ) or die(mysqli_error($con));
}

header('location: cart.php');
exit();
?>