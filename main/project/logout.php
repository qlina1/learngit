<?php
session_start();

echo '您已经成功登出!';
unset($_SESSION['user']);
?>
<script type="text/javascript">
window.location="index.php";
</script>