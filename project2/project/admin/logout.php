<?php
session_start();
unset($_SESSION['user']);
// 输出消息前不要有任何空白字符或 HTML 标签
echo '您已经成功登出!';
?>
<script type="text/javascript">
// 确保在输出消息后进行页面跳转
window.location = "../index.php";
</script>
