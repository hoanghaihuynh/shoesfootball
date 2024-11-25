<?php
 require_once('../../config/database.php');

        $password  = $_POST['password'];
        $email      = $_POST['email'];
        $query = $conn->query("SELECT * FROM `user` WHERE `email` = '$email' AND `password` = '$password'");
         $count=mysqli_num_rows($query);
        if ($count ==1) {
             echo("<script>console.log('PHP: " . $email . "');</script>");
            $_SESSION["email"] = $email;
            //echo $_SESSION['email'];
           $message = "Đăng nhập thành công!!";
            echo "<script type='text/javascript'>alert('$message');</script>";
            header("location: home.php");
        }else{
            $message = "Sai tài khoản hoặc mật khẩu rồi!!!";
            echo "<script type='text/javascript'>alert('$message');</script>";
    }

?>