<?php
session_start();
$user = $_SESSION['user'];
$conn = mysqli_connect('127.0.0.1', 'root', 'root', 'makeorder');
if (mysqli_connect_errno() !== 0) {
    die(mysqli_connect_error());
}
mysqli_query($conn, "set names utf8");

$order_id = $_SESSION['order_id'];

// 使用 order_id 查询订单详情
$result = mysqli_query($conn, "SELECT * FROM order_detail WHERE order_id = '$order_id'");
$searches = [];
$total_order_amount = 0; // 初始化订单总金额变量

while ($search = mysqli_fetch_assoc($result)) {
    $searches[] = $search;
    $total_order_amount += $search['order_amount']; // 累加每个商品的总价
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
    <link rel="stylesheet" href="https://cdn.bootcss.com/font-awesome/4.7.0/css/font-awesome.css">
    <link rel="stylesheet" type="text/css" href="../style/header.css">
    <link rel="stylesheet" type="text/css" href="../style/user.css">
</head>
<body>
    <div class="header">
        <div class="left_header">
            <i class="fa fa-cutlery" style="color:white;font-size: 1.4rem;margin-left: 1.5rem;line-height: 3.5rem;margin-right: 0.3rem;"></i>
            <span class="content_title">乌萨奇餐饮有限公司</span>
        </div>
        <div class="right_menu">
            <span class="user">欢迎您，<?=$user['name']?></span>
            <a class="details" href="../user.php">我的资料</a>
            <a class="logout" href="logout.php">退出登录</a>
        </div>
    </div>
    <div class="content">
        <span class="main-title" style="border: none;font-size: 18px;">您已成功提交订单，请耐心等待商家配送</span>
        <span class="main-title" style="font-size: 25px;color: #000000;">您的订单如下：</span>
        <table class="table table-hover" style="margin-left: 1rem;">
            <thead>
                <tr>
                    <th width="6%">订单编号</th>
                    <th width="10%">商品名称</th>
                    <th width="15%">下单数量</th>
                    <th width="10%">商品总价</th>
                    <th width="15%">下单时间</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($searches as $search): ?>
                <tr align="center">
                    <td><?php echo $search['order_id']; ?></td>
                    <td><?php echo $search['product_name']; ?></td>
                    <td><?php echo $search['product_quantity']; ?></td>
                    <td><?php echo $search['order_amount']; ?></td>
                    <td><?php echo $search['create_time']; ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <span class="main-title user_order" style="display: inline-block;margin-bottom: 2rem;margin-left: 2rem;margin-top: 2rem;">
            <span>用户：<?php echo $user['name']; ?></span>
            <span>手机号：<?php echo $user['phone']; ?></span>
            <span>地址：<?php echo $user['address']; ?></span>
            <span class="order_amount">订单总金额：<?php echo $total_order_amount; ?></span> <!-- 显示计算后的订单总金额 -->
        </span>
        <button class="back" onclick="back()" style="margin-bottom: 2rem;">返回首页</button>
    </div>
    <script type="text/javascript">
        function back() {
            window.location = "shop_menu.php";
        }
    </script>
</body>
</html>
