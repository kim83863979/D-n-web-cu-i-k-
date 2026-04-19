<?php
    require 'connection.php';
    //require 'header.php';
    session_start();
    $item_id=$_GET['id'];
    $user_id=$_SESSION['id'];
    $size = $_GET['size'];
    $add_to_cart_query="insert into users_items(user_id,item_id,size,status) values ('$user_id','$item_id','$size','Added to cart')";
    $add_to_cart_result=mysqli_query($con,$add_to_cart_query) or die(mysqli_error($con));
    header('location: products.php');
?>
