<?php
session_start();
$user = $_SESSION['user'];

// 连接数据库
$conn = mysqli_connect('127.0.0.1', 'root', 'root', 'makeorder');
if (mysqli_connect_errno() !== 0) {
    die(mysqli_connect_error());
}
mysqli_query($conn, "set names utf8");

// 查询用户的历史订单记录
$query = "SELECT * FROM orderlist WHERE user_id = '" . $user['id'] . "' ORDER BY create_time DESC";
$result = mysqli_query($conn, $query);
$order_history = [];
while ($row = mysqli_fetch_assoc($result)) {
    $order_history[] = $row;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>历史订单记录</title>
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
            <a class="details" href="">我的资料</a>
            <a class="logout" href="logout.php">退出登录</a>
        </div>
    </div>
    <div class="content">
        <span class="main-title" style="border: none;font-size: 25px;color: #000000;margin-bottom: 1rem;">历史订单记录</span>
        <table class="table table-hover" style="margin-left: 1rem;">
            <thead>
                <tr>
                    <th width="6%">订单编号</th>
                    <th width="15%">订单金额</th>
                    <th width="15%">订单状态</th>
                    <th width="20%">下单时间</th>
                    <th width="20%">操作</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($order_history as $order): ?>
                <tr align="center">
                    <td><?php echo $order['order_id']; ?></td>
                    <td><?php echo $order['order_amount']; ?></td>
                    <td><?php echo $order['order_status'] == '0' ? '待配送' : '已完成'; ?></td>
                    <td><?php echo $order['create_time']; ?></td>
                    <td><a href="order_detail.php?id=<?php echo $order['order_id']; ?>&status=<?php echo $order['order_status']; ?>">查看详情</a></td>

                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <button class="back" onclick="back()" style="margin-top: 2rem;">返回首页</button>
    </div>
    <script type="text/javascript">
        function back() {
            window.location = "shop_menu.php";
        }
    </script>
</body>
</html>
