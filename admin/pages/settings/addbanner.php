<?php
  require_once('../../../config/database.php');
  include_once('../header.php');
  include_once('../navigation.php');
 

?>

<!-- partial -->
<div class="main-panel" style="padding:20px">
    <div class="box">
        <div class="box-header with-border">
            <div class="left">
                <h3 class="box-title">Đăng banner</h3>
            </div>
        </div><!-- /.box-header -->

        <form class="box-body" method="POST" enctype="multipart/form-data">
            <!-- include message block -->

            <div class="form-group">
                <label class="control-label">Tiêu đề
                </label>
                <input type="text" class="form-control" name="title" placeholder="Title" value="" id="title"
                    fdprocessedid="oboy0m">
            </div>

            <div class="form-group" style="width:400px">
                <label class="form-label" for="customFile">Ảnh Banner</label>
                <input type="hidden" name="size" value="100000000">
                <input type="file" class="form-control" name="image" id="image" value="" required />
            </div>

            <div class="form-group">
                <label class="control-label">Chi tiết
                </label>
                <input type="text" class="form-control" name="chitiet" placeholder="Chi tiết" value="" id="chitiet"
                    fdprocessedid="oboy0m">
            </div>


            <div class="col-sm-12">
                <div class="box">
                    <div class="box-header with-border">
                        <div class="left">
                            <h3 class="box-title">Công khai</h3>
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
                                onclick="allow_submit_form = true;" fdprocessedid="bxji3">Đăng</button>

                        </div>

                    </div>
                </div>
            </div>
        </form>


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
// $conn->query( $sql);
move_uploaded_file($_FILES['image']['tmp_name'], $target);
    $title      = $_POST['title'];
$chitiet     = $_POST['chitiet'];
// Kiểm tra username hoặc email trong CSDL có trùng không

$sql = "INSERT IGNORE INTO banner (title,detail,image) VALUES ($title,$chitiet,'$site_domain/admin/pages/settings/uploads/$image')";
    if ($conn->query( $sql)) {
        echo '<script>alert("Bạn Đã Thêm Thành Công!");</script>';
    
        header('Location: #');
        
    } else {
        echo '<script>alert("Bạn Đã Thêm Thất Bại!");</script>';
        header('Location: #');
    }
}
?>