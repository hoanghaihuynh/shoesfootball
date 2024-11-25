<?php
require_once('./config/database.php');
unset($_SESSION["user"]);
echo "<script>window.location = '<?php echo $site_domain?>'</script>";
  //xóa seesion đăng nhập và chuển về trang home
?>