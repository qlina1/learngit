<?php 
    header('Content-Type: text/html; charset=UTF-8');
    $conn = mysqli_connect('127.0.0.1', 'root', 'root', 'makeorder');
    if (mysqli_connect_errno() !== 0) {
        die(mysqli_connect_error());
    }
    mysqli_query($conn, "set names utf8");

    $id = $_GET['id'];

    $sql = "UPDATE orderlist SET order_status='1' WHERE order_id='" . $id . "'";
    mysqli_query($conn, $sql);

    if (mysqli_errno($conn) !== 0) {
        die(mysqli_error($conn));
    }
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>订单完成</title>
</head>
<body>
    <span>该订单已完成！</span>
    <script>
        setTimeout(function () {
            window.location.href = 'shop_menu.php'; // 3秒后跳转到shop_menu.php
        }, 1500); // 3000毫秒 = 3秒
    </script>
</body>
</html>
