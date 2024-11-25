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
                <h3 class="box-title">Đăng giảm giá</h3>
            </div>
        </div><!-- /.box-header -->

        <form class="box-body" method="POST" enctype="multipart/form-data">
            <!-- include message block -->

            <!--print error messages-->

            <!--print custom error message-->

            <!--print custom success message-->

            <div class="form-group">
                <label class="control-label">Mã giảm giá</label>
                <input type="text" id="title" class="form-control" name="title" placeholder="Mã giảm giá" value=""
                    required>
            </div>

            <div class="form-group">
                <label class="control-label">Số lượng
                </label>
                <input type="text" class="form-control" name="soluong" placeholder="Số lượng" value="" id="soluong"
                    required fdprocessedid="oboy0m">
            </div>

            <div class="form-group">
                <label class="control-label">Số tiền giảm</label>
                <input type="text" id="soien" class="form-control" name="soien" placeholder="Số tiền giảm" value=""
                    required>
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
                                onclick="allow_submit_form = true;" fdprocessedid="bxji3">Đăng Giảm Gía</button>

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
    
    $title   = $_POST['title'];
    $soluong      = $_POST['soluong'];
    $sotien      = $_POST['sotien'];
// Kiểm tra username hoặc email trong CSDL có trùng không

$sql = "INSERT IGNORE INTO magiamgia (magiam,sotien,soluong,batdau) VALUES ('$title','$sotien','$soluong','$sotien')";
    if ($conn->query( $sql)) {
        echo '<script>alert("Bạn Đã Thêm Thành Công!");</script>';
    
        header('Location: #');
        
    } else {
        echo '<script>alert("Bạn Đã Thêm Thất Bại!");</script>';
        header('Location: #');
    }
}
?>