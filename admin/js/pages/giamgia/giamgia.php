<?php
  require_once('../../../config/database.php');
  include_once('../header.php');
  include_once('../navigation.php');
 ;

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
            <label class="control-label">Tên giảm giá</label>
            <input type="text" id="title" class="form-control" name="title" placeholder="Tên giảm giá" value="" required fdprocessedid="i9pziq" onkeyup="ChangeToSlug();">
        </div>

        <div class="form-group">
            <label class="control-label">Slug                <small>(Nếu bạn để trống, nó sẽ được tạo tự động.)</small>
            </label>
            <input type="text" class="form-control" name="slug" placeholder="Slug" value="" id="slug" required fdprocessedid="oboy0m">
        </div>

        
                    <div class="form-group">
                <div class="row">
                    <div class="col-sm-4 col-xs-12">
                        <label>Trạng Thái</label>
                    </div>
                    <div class="col-md-2 col-sm-4 col-xs-12 col-option">
                        <div class="iradio_square-purple checked"><input type="radio" id="rb_visibility_1" name="visibility" value="1" class="square-purple" checked="" ><ins class="iCheck-helper" ></ins></div>
                        <label for="rb_visibility_1" class="cursor-pointer">Hoạt Động</label>
                    </div>
                    <div class="col-md-2 col-sm-4 col-xs-12 col-option">
                        <div class="iradio_square-purple" style="position: relative;"><input type="radio" id="rb_visibility_1" name="visibility" value="0" class="square-purple" ><ins class="iCheck-helper"></ins></div>
                        <label for="rb_visibility_2" class="cursor-pointer">Ẩn</label>
                    </div>
                </div>
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
                        <div class="icheckbox_square-purple" style="position: relative;"><input type="checkbox" name="scheduled_post" value="1" id="cb_scheduled" class="square-purple" style="position: absolute; top: -20%; left: -20%; display: block; width: 140%; height: 140%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: -20%; left: -20%; display: block; width: 140%; height: 140%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div>
                    </div>
                </div>
            </div>
            
            <div class="form-group">
                <button type="submit" name="submit" value="1" class="btn btn-primary pull-right" onclick="allow_submit_form = true;" fdprocessedid="bxji3">Đăng Giảm Gía</button>
                
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
    CKEDITOR.replace('chitiet');// tham số là biến name của textarea
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
     <script>
        function ChangeToSlug()
{
    var title, slug;
 
    //Lấy text từ thẻ input title 
    title = document.getElementById("title").value;
 
    //Đổi chữ hoa thành chữ thường
    slug = title.toLowerCase();
 
    //Đổi ký tự có dấu thành không dấu
    slug = slug.replace(/á|à|ả|ạ|ã|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ/gi, 'a');
    slug = slug.replace(/é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ/gi, 'e');
    slug = slug.replace(/i|í|ì|ỉ|ĩ|ị/gi, 'i');
    slug = slug.replace(/ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ/gi, 'o');
    slug = slug.replace(/ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự/gi, 'u');
    slug = slug.replace(/ý|ỳ|ỷ|ỹ|ỵ/gi, 'y');
    slug = slug.replace(/đ/gi, 'd');
    //Xóa các ký tự đặt biệt
    slug = slug.replace(/\`|\~|\!|\@|\#|\||\$|\%|\^|\&|\*|\(|\)|\+|\=|\,|\.|\/|\?|\>|\<|\'|\"|\:|\;|_/gi, '');
    //Đổi khoảng trắng thành ký tự gạch ngang
    slug = slug.replace(/ /gi, "-");
    //Đổi nhiều ký tự gạch ngang liên tiếp thành 1 ký tự gạch ngang
    //Phòng trường hợp người nhập vào quá nhiều ký tự trắng
    slug = slug.replace(/\-\-\-\-\-/gi, '-');
    slug = slug.replace(/\-\-\-\-/gi, '-');
    slug = slug.replace(/\-\-\-/gi, '-');
    slug = slug.replace(/\-\-/gi, '-');
    //Xóa các ký tự gạch ngang ở đầu và cuối
    slug = '@' + slug + '@';
    slug = slug.replace(/\@\-|\-\@|\@/gi, '');
    //In slug ra textbox có id “slug”
    document.getElementById('slug').value = slug;
}

    </script>
    <!-- End custom js for this page-->
  </body>
</html>
<?
    if(isset($_POST['submit']))
{
    
    $title   = $_POST['title'];
    $slug      = $_POST['slug'];
    $select = $_POST['visibility'];
// Kiểm tra username hoặc email trong CSDL có trùng không

$sql = "INSERT IGNORE INTO giamgia (title,lienket,trangthai) VALUES ('$title','$slug','$select')";
    if ($conn->query( $sql)) {
        echo '<script>alert("Bạn Đã Thêm Thành Công!");</script>';
    
        header('Location: #');
        
    } else {
        echo '<script>alert("Bạn Đã Thêm Thất Bại!");</script>';
        header('Location: #');
    }
}
?>