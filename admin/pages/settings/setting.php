<?php
  require_once('../../../config/database.php');
  include_once('../header.php');
  include_once('../navigation.php');
 

?>


<!-- partial -->
<div class="main-panel" style="padding-left:50px;padding-top:20px;padding-right:50px">
    <div class="box">
        <div class="box-header with-border">
            <div class="left">
                <h3 class="box-title">Cài Đặt Chung</h3>
            </div>
        </div><!-- /.box-header -->
        <?php 
                                $query = $conn->query("SELECT * FROM `setting` LIMIT 1");
                                while($row1 = $query->fetch(PDO::FETCH_ASSOC)){
                                    //get danh sách cài đặt
                                ?>
        <form class="box-body" method="POST" enctype="multipart/form-data">
            <!-- include message block -->

            <!--print error messages-->

            <!--print custom error message-->

            <!--print custom success message-->

            <div class="form-group">
                <label class="control-label">Tiêu đề Trang Web</label>
                <input type="text" id="title" class="form-control" name="title" placeholder="Tiêu đề"
                    value="<?php echo ''.$row1["title"]?>" required fdprocessedid="i9pziq">
            </div>



            <div class="form-group">
                <label class="control-label">Tóm lược &amp; Sự miêu tả (Thẻ meta)</label>
                <textarea name="summary" id="summary" placeholder="Tóm lược &amp; Sự miêu tả (Thẻ meta)"
                    style="width:70%;height:200px;">
                <?php echo ''.$row1["content"]?>
            </textarea>
            </div>

            <div class="form-group">
                <label class="control-label">Từ khóa (Thẻ meta)</label>
                <input type="text" class="form-control" name="keywords" placeholder="Từ khóa (Thẻ meta)"
                    value="<?php echo ''.$row1["keywords"]?>" required fdprocessedid="c7g48i">
            </div>

            <div class="form-group">
                <label class="control-label">Số điện thoại</label>
                <input type="text" class="form-control" name="phone" placeholder="Số điện thoại"
                    value="<?php echo ''.$row1["phone"]?>" fdprocessedid="c7g48i" required>
            </div>

            <div class="form-group">
                <label class="control-label">Email</label>
                <input type="text" class="form-control" name="email" placeholder="Email" required
                    value="<?php echo ''.$row1["email"]?>" fdprocessedid="c7g48i">
            </div>

            <div class="form-group">
                <label class="control-label">Địa chỉ</label>
                <input type="text" class="form-control" name="diachi" placeholder="Địa chỉ"
                    value="<?php echo ''.$row1["address"]?>" fdprocessedid="c7g48i" require>
            </div>
            <div class="form-group">
                <label class="control-label">Domain</label>
                <input type="text" class="form-control" name="domain" placeholder="Domain"
                    value="<?php echo ''.$row1["domain"]?>" fdprocessedid="c7g48i" require>
            </div>

            <div class="form-group">
                <label class="control-label">Facebook URL</label>
                <input type="text" class="form-control" name="fb" placeholder="Facebook URL"
                    value="<?php echo ''.$row1["linkfb"]?>" fdprocessedid="c7g48i">
            </div>

            <div class="form-group">
                <label class="control-label">Mã JavaScript tùy chỉnh</label>
                <textarea class="form-control text-area" name="js"
                    placeholder="Các mã này sẽ được thêm vào chân trang của trang web."
                    style="min-height: 200px;"></textarea>
            </div>

            <div class="form-group">
                <label class="control-label">Chi tiết cửa hàng</label>
                <textarea name="chitiet" id="chitiet" placeholder="Chi tiết cửa hàng" style="width:70%;height:200px;">
                <?php echo ''.$row1["footer"]?>
  </textarea>
            </div>

            <div class="form-group">
                <label class="control-label">Giới thiệu sơ lượt </label>
                <textarea name="gioithieu" id="gioithieu" placeholder="Nằm ở phần trình chiếu đầu tiên"
                    style="width:70%;height:200px;">
                        <?php echo ''.$row1["about"]?>
  </textarea>
            </div>


            <div class="form-group">
                <label class="control-label">Thời gian hoạt động</label>
                <textarea name="thoigian" id="thoigian" placeholder="Thời gian hoạt động"
                    style="width:70%;height:200px;">
                        <?php echo ''.$row1["timebusiness"]?>
  </textarea>
            </div>

            <div class="form-group" style="width:400px">
                <label class="form-label" for="customFile">ICON TRANG WEB</label>
                <input type="hidden" name="size" value="100000000">
                <input type="file" class="form-control" name="image" id="image" value="<?php echo ''.$row1["icon"]?>"
                    required />
                <img src="<?php echo ''.$row1["icon"]?>" style="width:100px;height:100px" />
            </div>

            <div class="form-group" style="width:400px">
                <label class="form-label" for="customFile">ICON TRANG WEB</label>
                <input type="hidden" name="size" value="100000000">
                <input type="file" class="form-control" name="image3" id="image3" value="<?php echo ''.$row1["logo"]?>"
                    required />
                <img src="<?php echo ''.$row1["logo"]?>" style="width:100px;height:100px" />
            </div>


            <div class="col-sm-12">
                <div class="box">
                    <div class="box-header with-border">
                        <div class="left">
                            <h3 class="box-title">CHỈNH SỬA</h3>
                        </div>
                    </div><!-- /.box-header -->

                    <div class="box-body">

                        <div class="form-group">
                            <div class="row">

                                <div class="col-md-5 col-sm-12 col-xs-12 text-right">
                                    <div class="icheckbox_square-purple" style="position: relative;"><input
                                            type="checkbox" name="scheduled_post" value="1" id="cb_scheduled"
                                            class="square-purple"
                                            style="position: absolute; top: -20%; left: -20%; display: block; width: 140%; height: 140%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"><ins
                                            class="iCheck-helper"
                                            style="position: absolute; top: -20%; left: -20%; display: block; width: 140%; height: 140%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <button type="submit" name="submit" value="1" class="btn btn-primary pull-right"
                                onclick="allow_submit_form = true;" fdprocessedid="bxji3">LƯU LẠI</button>

                        </div>

                    </div>
                </div>
            </div>
        </form>
        <?php }?>
    </div>
</div>

<!-- main-panel ends -->
</div>
<!-- page-body-wrapper ends -->
</div>
<!-- container-scroller -->
<!-- base:js -->

<script>
// Thay thế <textarea id="post_content"> với CKEditor
CKEDITOR.replace('chitiet'); // tham số là biến name của textarea
CKEDITOR.replace('gioithieu');
CKEDITOR.replace('thoigian');
CKEDITOR.replace('summary');
</script>
<script src="../../vendors/js/vendor.bundle.base.js"></script>
<!-- endinject -->
<!-- Plugin js for this page-->
<!-- End plugin js for this page-->
<!-- inject:js -->
<script src="../../js/off-canvas.js"></script>
<script src="../../js/hoverable-collapse.js"></script>
<script src="../../js/template.js"></script>
<script src="../../js/settings.js"></script>
<script src="../../js/todolist.js"></script>
<!-- endinject -->
<!-- plugin js for this page -->
<script src="../../vendors/progressbar.js/progressbar.min.js"></script>
<script src="../../vendors/chart.js/Chart.min.js"></script>
<!-- End plugin js for this page -->
<!-- Custom js for this page-->
<script src="../../js/dashboard.js"></script>

<!-- End custom js for this page-->
</body>

</html>
<?php
    if(isset($_POST['submit']))
{
    $errors= array();
$file_name = $_FILES['image']['name'];
$file_size = $_FILES['image']['size'];
$file_tmp = $_FILES['image']['tmp_name'];
$file_type = $_FILES['image']['type'];
$file_parts =explode('.',$_FILES['image']['name']);
$file_ext=strtolower(end($file_parts));
$expensions= array("jpeg","jpg","png");
if(in_array($file_ext,$expensions)=== false){
$errors[]="Chỉ hỗ trợ upload file JPEG hoặc PNG.";
}
if($file_size > 100000000) {
$errors[]='Kích thước file không được lớn hơn 2MB';
}
$image = $_FILES['image']['name'];
$target = "uploads/".$image;
echo "<script>document.getElementById('image').value = '$target';</script>";
// mysqli_query($conn, $sql);
move_uploaded_file($_FILES['image']['tmp_name'], $target);


$errors3= array();
$file_name3 = $_FILES['image3']['name'];
$file_size3 = $_FILES['image3']['size'];
$file_tmp3 = $_FILES['image3']['tmp_name'];
$file_type3 = $_FILES['image3']['type'];
$file_parts3 =explode('.',$_FILES['image3']['name']);
$file_ext3=strtolower(end($file_parts3));
$expensions3= array("jpeg","jpg","png");
if(in_array($file_ext3,$expensions3)=== false){
$errors3[]="Chỉ hỗ trợ upload file JPEG hoặc PNG.";
}
if($file_size3 > 100000000) {
$errors3[]='Kích thước file không được lớn hơn 2MB';
}
$image3 = $_FILES['image3']['name'];
$target3 = "uploads/".$image3;
echo "<script>document.getElementById('image3').value = '$target';</script>";
// $sql = "INSERT INTO tb_upload (image,detail) VALUES ('$image','$target')";
// mysqli_query($conn, $sql);
move_uploaded_file($_FILES['image3']['tmp_name'], $target3);
    $title   = $_POST['title'];
    $summary   = $_POST['summary'];
    $keywords  = $_POST['keywords'];
     $phone  = $_POST['phone'];
      $domain  = $_POST['domain'];
    $email     = $_POST['email'];
     $diachi   = $_POST['diachi'];
    $fb     = $_POST['fb'];
    $js      = $_POST['js'];
    $chitiet = $_POST['chitiet'];
    $gioithieu = $_POST['gioithieu'];
    $thoigian = $_POST['thoigian'];
    
     
    $js = $_POST['js'];
// Kiểm tra username hoặc email trong CSDL có trùng không
//get thông tin mới và cập nhật dữ liệu bảng setting
$sql = "UPDATE setting SET `title`='$title',`icon`= '$site_domain/admin/pages/settings/uploads/$image',`phone`= '$phone',`email`= '$email',`address`='$diachi',`footer`='$chitiet',`content`='$summary',`about`='$gioithieu',`logo`='$site_domain/admin/pages/settings/uploads/$image3',`timebusiness`='$thoigian',`keywords`='$keywords',`linkfb`='$fb',`js`='$js',`domain`='$domain'";
    if ($conn->query( $sql)) {
        echo '<script>alert("Bạn Đã Cập Nhật Thành Công!");</script>';
    
        header('Location: setting.php');
        
    } else {
        echo '<script>alert("Bạn Đã Cập Nhật Thất Bại!");</script>';
        header('Location: #');
    }
    
    }
?>