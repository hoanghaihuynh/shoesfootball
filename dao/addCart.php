<?php
  require_once('../config/database.php');

  $email = $_SESSION["user"];
  
  if(isset($_POST["addCart"])){
       $idsp = $_POST["idsp"];
       $query = $conn->query("SELECT * FROM `products` WHERE `id` = '$idsp'");
       //get thông tin sản phẩm có id trên
        while($rowp = $query->fetch(PDO::FETCH_ASSOC)){
        $name = $rowp["nameProduct"];
        $lienket = $rowp["lienket"];
        $giagoc = $rowp["price"];
        $price = $giagoc;
        
        
        $soluong = $_POST["quanty"];
        $image = $rowp["image"];
        $chitiet = $rowp["chitiet"];
        $tongtien = $price*$soluong;
        $sqlu = "SELECT * FROM `cart` WHERE `email` = '$email' AND `idsp` = '$idsp'";
        //kiểm tra xem sản phẩm đã có trong giỏ hàng chưa
        $query_run = $conn->query( $sqlu);
        if($query_run->fetch(PDO::FETCH_ASSOC)){
            //nếu đã có thì tăng số lương lên và chuển về trang giỏ hàng
            echo '<script>alert("Đơn hàng đã có trong giỏ hàng!\nĐã cập nhật lại số lượng")</script>';
            $update = "UPDATE `cart` SET `soluong` = `soluong`+$soluong,`tongtien`=`tongtien`+(`price`*$soluong) WHERE `email` = '$email' AND `name` = '$name'";
            if($conn->query( $update)){
                echo "<script>window.location = '$site_domain/shopping-cart.php?magiamgia='</script>";
}

}else{
//nếu chưa có thì sẽ thêm sản phẩm vào giỏ hàng
$sql = "INSERT IGNORE INTO cart (name,image,chitiet,price,soluong,tongtien,email,thoihan,lienket,idsp) VALUES
('$name','$image','$chitiet','$price','$soluong','$tongtien','$email','0','$lienket','$idsp')";
if ($conn->query( $sql)) {

echo '<script>
alert("Đã thêm vào giỏ hàng thành công!")
</script>';
echo "<script>
window.location = '$site_domain/shopping-cart.php?magiamgia='
</script>";
}

}

}
}
if(isset($_POST["xoaCart"])){
//xóa sản phẩm có id đã nhập trong giỏ hàng
$id = $_POST["xoaCart"];
$delete = "DELETE FROM `cart` WHERE `id` = '$id'";
$conn->query( $delete);
echo "<script>
history.back();
</script>";
}

?>