<?php
  require_once('../config/database.php');

  $email = $_SESSION["user"];
  //get thông tin của người dùng hiện tại
  $sqlu = "SELECT * FROM user WHERE email = '$email'";
  $result = $conn->query( $sqlu);
  $users = $result->fetch(PDO::FETCH_ASSOC);
  $users_name = $users['name'];
  if(isset($_POST["addCmt"])){
    //thêm bình luận vào bài viết có id như trên
        $id = $_POST["id"];
        $noidung = $_POST["message"];
        $format = "d/m/y G:i:s";
        $thoigian = date($format, time());
        $sql = "INSERT IGNORE INTO binhluan (name,email,noidung,thoigian,sanpham) VALUES ('$users_name','$email','$noidung','$thoigian','$id')";
        if ($conn->query( $sql)) {
            echo '<script>alert("Đã thêm đánh giá!")</script>';
            echo "<script>history.back();</script>";
        }
    }
   
?>