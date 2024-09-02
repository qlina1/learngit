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
<link rel=stylesheet href="./admin/style/product.css"/>
<link rel=stylesheet href="style/header.css"/>
</head>
<body>
<div class="header" style="height: 5rem;line-height: 5rem;">
    <div class="left_header">
        <i class="fa fa-cutlery" style="color:white;font-size: 1.4rem;margin-left:1.5rem;line-height: 3.5rem;margin-right: 0.3rem;"></i>
        <span class="content_title">乌萨奇餐饮有限公司</span>
    </div>
    <div class="right_menu">
        <span class="user">欢迎您，<?=$user['name']?></span>
        <a class="details" href="">我的资料</a>
        <a class="logout" href="logout.php">退出登录</a>
    </div>
</div>
<div class="content" style="margin-left: 2rem;margin-top: 1rem;">
<span class="main-title" style="display: inline-block; width: 100%; height: 4rem; line-height: 4rem; border-bottom: 1px solid #EEEEEE; font-size: 17px; text-align: center; font-weight: bold; font-size: 2em;">我的资料</span>
<span id="main-tip"></span>
<div class="form" style="width: 100%;">
<form action="handle_editUser.php" method="post" enctype="multipart/form-data">
<div class="form" style="display: flex; justify-content: center; width: 100%; margin-top: 1rem;">
    <div style="width: 100%; margin-left: 15rem; ">
        <table class="table table-bordered table-hover" style="min-width: 120%;"> <!-- 设置最小宽度 -->
            <tr>
                <td align="center" width="15%">
                    <span class="td-txt" style="font-weight: bold; font-size: 1.8rem;">我的昵称</span>
                </td>
                <td style="padding-left: 2rem;">
                    <input type="text" name="name" value="<?php echo $row['name'];?>" style="width: 100%; font-weight: bold; font-size: 2rem;" />
                </td>
            </tr>
            <tr>
                <td align="center">
                    <span class="td-txt" style="font-weight: bold; font-size: 1.8rem;">我的电话</span>
                </td>
                <td style="padding-left: 2rem;">
                    <input type="text" name="phone" value="<?php echo $row['phone'];?>" style="width: 100%; font-weight: bold; font-size: 2rem;" />
                </td>
            </tr>
            <tr>
                <td align="center">
                    <span class="td-txt" style="font-weight: bold; font-size: 1.8rem;">我的地址</span>
                </td>
                <td style="padding-left: 2rem;">
                    <input type="text" name="address" value="<?php echo $row['address'];?>" style="width: 100%; font-weight: bold; font-size: 2rem;" />
                </td>
            </tr>
            <tr>
                <td align="center">
                    <span class="td-txt" style="font-weight: bold; font-size: 1.8rem;">我的性别</span>
                </td>
                <td>
                    <select name="sex">
                        <option selected="selected">?</option>
                        <option value="男">男</option>
                        <option value="女">女</option>
                    </select>
                </td>
            </tr>
        </table>
    </div>
</div>


<input class="btn btn-primary" style="margin-left: 693px !important;" type="submit" value="确定修改" onclick="handle_editUser()" />

</form>
</div>
</div>
<script type="text/javascript">
function handle_editManager(){
    window.location="handle_editUser.php";
}
</script>
</body>
</html>