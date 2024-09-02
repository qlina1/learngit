<?php
header('Content-Type:text/html; charset=UTF-8');
$conn = mysqli_connect('127.0.0.1', 'root', 'root', 'makeorder');
if (mysqli_connect_errno() !== 0) {
    die(mysqli_connect_error());
}
mysqli_query($conn, "set names utf8");

$id = $_GET['id'];
$status = $_GET['status'];
$result = mysqli_query($conn, "select * from order_detail where order_id='" . $id . "'");
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
    <link rel="stylesheet" href="style/bootstrap-admin.css">
    <link rel="stylesheet" href="style/product.css">
    <link rel="stylesheet" type="text/css" href="../style/user.css">
</head>
<body>
    <span class="main-title">订单详情如下：</span>
    <table class="table table-hover">
        <thead>
        <tr>
            <th width="6%">订单编号</th>
            <th width="6%">商品编号</th>
            <th width="10%">商品名称</th>
            <th width="15%">下单数量</th>
            <th width="10%">商品总价</th>
            <th width="15%">下单时间</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($searches as $key => $search): ?>
            <tr align="center">
                <td><?php echo $search['order_id']; ?></td>
                <td><?php echo $search['product_id']; ?></td>
                <td><?php echo $search['product_name']; ?></td>
                <td><?php echo $search['product_quantity']; ?></td>
                <td><?php echo $search['order_amount']; ?></td>
                <td><?php echo $search['create_time']; ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
    <span class="main-title" style="display: inline-block;margin-bottom: 2rem;margin-left: 2rem;">订单总金额：<?php echo $total_order_amount; ?></span> <!-- 显示计算后的订单总金额 -->
    <?php if ($status == 0): ?>
        <button class="finish" onclick="order_finish(<?php echo $search['order_id']; ?>)">完成订单</button>
    <?php endif; ?>
    <?php if ($status == 1): ?>
        <span class="main-title">该订单已完成</span>
        <button class="back" onclick="back()" style="margin-top: 2rem;">返回首页</button>
    </div>
    <script type="text/javascript">
        function back() {
            window.location = "shop_menu.php";
        }
    </script>
    <?php endif; ?>
    <script type="text/javascript">
        function order_finish(val) {
            window.location = "handle_orderfinish.php?id=" + val;
        }
    </script>
</body>
</html>
