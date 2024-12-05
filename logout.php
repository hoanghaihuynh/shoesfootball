<?php
require_once('./config/database.php');
unset($_SESSION["user"]);

// Chuyển hướng về trang index.php
echo "<script>window.location = '{$site_domain}/index.php';</script>";
?>