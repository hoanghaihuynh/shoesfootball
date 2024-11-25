<?php
  require_once('../../../config/database.php');
 ;
    $id = $_GET['xoasp'];
    $sql = "DELETE FROM products WHERE `id` = '$id'";
    if ($conn->query( $sql)) {
        echo '<script>alert("Bạn Đã Xoá Thành Công!");</script>';
    
        echo "<script>history.back();</script>";
        
    } else {
        echo '<script>alert("Bạn Đã Xoá Thất Bại!");</script>';
        echo "<script>history.back();</script>";
    }
?>

