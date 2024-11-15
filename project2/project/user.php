<?php 
    session_start();
    $user=$_SESSION['user'];
    header('Content-Type:text/html; charset=UTF-8');
    $conn = mysqli_connect('127.0.0.1', 'root' ,'root' , 'makeorder');
    if (mysqli_connect_errno() !== 0) {
        die(mysqli_connect_error());
    }
    mysqli_query($conn,"set names utf8");

    $result=mysqli_query($conn,"select * from user where id='".$user['id']."'");
    $row = mysqli_fetch_assoc($result);

?>
<!doctype html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Insert title here</title>
<link rel="stylesheet" href="https://cdn.bootcss.com/font-awesome/4.7.0/css/font-awesome.css">
<link rel=stylesheet href="style/bootstrap-admin.css">
<link rel=stylesheet href="style/header.css"/>
<link rel=stylesheet href="./admin/style/product.css"/>
</head>
<body>
<div class="header" style="height: 5rem;line-height: 5rem; background-color: #4a734a;">
    <div class="left_header">
        <i class="fa fa-cutlery" style="color:white;font-size: 1.4rem;margin-left:1.5rem;line-height: 3.5rem;margin-right: 0.3rem;"></i>
        <span class="content_title">乌萨奇餐饮有限公司</span>
    </div>
    <div class="right_menu">
        <span class="user">欢迎您， <?=$user['name']?></span>
        <a class="details" href="">我的资料</a>
        <a class="logout" href="logout.php">退出登录</a>
    </div>
</div>
<div class="content" style="margin-left: 2rem; margin-top: 1rem;">
    <div style="display: flex; align-items: center; justify-content: space-between;">
        <span style="display: inline-block; width: 100%; height: 4rem; line-height: 4rem; border-bottom: 1px solid #EEEEEE; font-size: 17px; text-align: center; font-weight: bold; font-size: 2em;">我的资料</span>
        
    </div>
    <div class="form" style="display: flex; justify-content: center; width: 100%; margin-top: 1rem;">
        <div style="width: 70%;">
            <table class="table table-bordered table-hover" style="width: 100%;">
                <tr>
                    <td align="center" width="15%"><span class="td-txt" style="font-weight: bold; font-size: 1.8rem;">我的昵称</span></td>
                    <td style="padding-left: 2rem; font-weight: bold; font-size: 2rem;"><?php echo $row['name'];?></td>
                </tr>
                <tr>
                    <td align="center"><span class="td-txt" style="font-weight: bold; font-size: 1.8rem;">我的电话</span></td>
                    <td style="padding-left: 2rem; font-weight: bold; font-size: 2rem;"><?php echo $row['phone'];?></td>
                </tr>
                <tr>
                    <td align="center"><span class="td-txt" style="font-weight: bold; font-size: 1.8rem;">我的地址</span></td>
                    <td style="padding-left: 2rem; font-weight: bold; font-size: 2rem;"><?php echo $row['address'];?></td>
                </tr>
                <tr>
                    <td align="center"><span class="td-txt" style="font-weight: bold; font-size: 1.8rem;">我的性别</span></td>
                    <td style="padding-left: 2rem; font-weight: bold; font-size: 2rem;"><?php echo $row['sex'];?></td>
                </tr>
            </table>
            <div style="text-align: right;">
            <input class="btn btn-primary" type="submit" value="修改资料" onclick="handle_editUser()" />
            <button class="btn btn-primary" style="margin-left: 4rem;" onclick="back()">返回首页</button>
        </div>
        </div>
    </div>
</div>

<script type="text/javascript">
function handle_editUser(){
    window.location="editUser.php";
}
function back(){
    window.location="./admin/shop_menu.php";
}
</script>
</body>
</html>