<?php
session_start();
$length = $_SESSION['length'];

$time = date("Y-m-d H:i:s");
$pro_id = $_COOKIE['pro_id'];
$pro_name = $_COOKIE['pro_name'];
$quantity = $_COOKIE['quantity'];
$price = $_COOKIE['price'];
$amount = $_COOKIE['amount'];
$user = $_SESSION['user'];

// 清除 cookie
for ($i = 0; $i < sizeof($pro_id); $i++) {
    setcookie("pro_id[" . $i . "]", "", time() - 3600);
    setcookie("pro_name[" . $i . "]", "", time() - 3600);
    setcookie("quantity[" . $i . "]", "", time() - 3600);
    setcookie("price[" . $i . "]", "", time() - 3600);
    setcookie("amount[" . $i . "]", "", time() - 3600);
}

header('Content-Type: text/html; charset=UTF-8');
$conn = mysqli_connect('127.0.0.1', 'root', 'root', 'makeorder');
if (mysqli_connect_errno() !== 0) {
    die(mysqli_connect_error());
}
mysqli_query($conn, "set names utf8");

// 插入 orderlist 表
$sql = "INSERT INTO orderlist(order_id, user_id, order_amount, order_status, create_time) VALUES(NULL, '" . $user['id'] . "', '" . $amount[0] . "', '0', NOW())";
mysqli_query($conn, $sql);
if (mysqli_errno($conn) !== 0) {
    die(mysqli_error($conn));
}

// 获取最后插入的 order_id
$order_id = mysqli_insert_id($conn);

// 插入 order_detail 表
for ($i = 0; $i < $length; $i++) {
    $row = "INSERT INTO order_detail(order_detail_id, order_id, product_name, product_quantity, order_amount, create_time) VALUES(NULL, '" . $order_id . "', '" . $pro_name[$i] . "', '" . $quantity[$i] . "', '" . $price[$i] . "', NOW())";
    mysqli_query($conn, $row);
    if (mysqli_errno($conn) !== 0) {
        die(mysqli_error($conn));
    }
}

// 将订单号传递给下一个页面
$_SESSION['order_id'] = $order_id;

// 跳转到订单列表页面
header("Location: ./admin/orderlist.php");
exit;
?>
