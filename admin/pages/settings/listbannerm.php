<?php
  require_once('../../../config/database.php');
  include_once('../header.php');
  include_once('../navigation.php');
 

?>
<div class="main-panel">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">DANH SÁCH BANNER</h3>
                    <div class="text-right">
                        <a href="<?php echo $site_domain?>/admin/pages/settings/addbanner.php">THÊM BANNER</a>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="datatable1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th style="width:10px">STT</th>
                                    <th>Tiêu đề</th>
                                    <th>Hình Ảnh</th>
                                    <th>Chi tiết</th>
                                    <th>Xóa</th>
                                    <th>Sửa</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                            $i = 1;
                                $query = $conn->query("SELECT * FROM `banner`");
                                while($row1 = $query->fetch(PDO::FETCH_ASSOC)){
                                    //get list banner
                                ?>
                                <tr>
                                    <td class="text-center">
                                        <?= $i++; ?>
                                    </td>
                                    <td class="text-center">
                                        <?php echo ''.$row1["title"]?>
                                    </td>
                                    <td class="text-center">
                                        <img style="width:100px;height:100px" src="<?php echo ''.$row1["image"]?>">
                                    </td>
                                    <td class="text-center">
                                        <?php echo ''.$row1["detail"]?>
                                    </td>

                                    <td class="text-center">
                                        <a href='delete.php?huydeleidt=<?php echo ''.$row1["id"]?>'
                                            class="btn btn-default">Xoá</a>
                                    </td>
                                    <td class="text-center">
                                        <a href='editBanner.php?updateid=<?php echo ''.$row1["id"]?>'
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