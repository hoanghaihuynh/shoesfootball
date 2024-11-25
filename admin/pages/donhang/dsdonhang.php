<?php
  require_once('../../../config/database.php');
  include_once('../header.php');
  include_once('../navigation.php');

?>
<div class="main-panel" style="">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">DANH SÁCH ĐƠN HÀNG</h3>
                    <div class="text-right">

                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="datatable1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th style="width:10px">STT</th>
                                    <th>Mã Đơn Hàng</th>
                                    <th>Tên Khách Hàng</th>
                                    <th>SĐT</th>
                                    <th>Thời gian</th>
                                    <th>Email</th>

                                    <th>Sản Phẩm</th>
                                    <th>Tổng Tiền</th>
                                    <th>Trạng Thái Đơn</th>
                                    <th>Xóa</th>
                                    <th>Sửa</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                            $i = 1 ;
                                $query = $conn->query("SELECT * FROM `donhang`");
                                while($row1 = $query->fetch(PDO::FETCH_ASSOC)){
                                ?>
                                <tr>
                                    <td class="text-center">
                                        <?= $i++; ?>
                                    </td>
                                    <td class="text-center">
                                        <?php echo ''.$row1["madonhang"]?>
                                    </td>
                                    <td class="text-center">
                                        <?php echo ''.$row1["tennguoimua"]?>
                                    </td>
                                    <td class="text-center">
                                        <?php echo ''.$row1["dienthoai"]?>
                                    </td>
                                    <td class="text-center">
                                        <?php echo ''.$row1["thoigian"]?>
                                    </td>
                                    <td class="text-center">
                                        <?php echo ''.$row1["email"]?>
                                    </td>


                                    <td class="text-center" style="width:100px;">
                                        <?php echo ''.$row1["name"]?>
                                    </td>
                                    <td class="text-center">
                                        <?php echo ''.$row1["tongtien"]?>
                                    </td>
                                    <td class="text-center">
                                        <?php echo ''.$row1["trangthai"]?>
                                    </td>
                                    <td class="text-center">
                                        <a href='<?php echo $site_domain?>/admin/pages/donhang/delete.php?xoasp=<?php echo ''.$row1["id"]?>'
                                            class="btn btn-default">Xoá</a>
                                    </td>
                                    <td class="text-center">
                                        <a href='<?php echo $site_domain?>/admin/pages/donhang/editDonhang.php?updateid=<?php echo ''.$row1["id"]?>'
                                            class="btn btn-default">Sửa</a>
                                    </td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer clearfix">
                    VUI LÒNG THAO TÁC CẨN THẬN
                </div>
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
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

<script>
function ChangeToSlug() {
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