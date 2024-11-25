<?php
//config database
$server_name = "localhost";
$db_username = "root";
$db_password = "";
$db_name = "banquanao";
$conn = new PDO("mysql:host=$server_name; dbname=$db_name; charset=utf8", $db_username, $db_password);  // kết nối đến database. $conn gọi là đối tượng kết nối.

session_start(); //khởi tạo session
$_SESSION['session_request'] = time();
$sql = "SELECT * FROM setting"; 
$result = $conn->query($sql); //truy vấn data bảng setting
$site = $result->fetch(); //fetch data
$site_tenweb = $site['title'];
$site_phone = $site['phone'];
$site_email = $site['email'];
$site_footer = $site['footer'];
$site_icon = $site['icon'];
$site_diachi = $site['address'];
$site_imageAbout = $site['logo'];
$site_about = $site['about'];
$site_content = $site['content'];
$site_logo = $site['logo'];
$site_timebusiness = $site['timebusiness'];
$site_domain = $site['domain'];
?>