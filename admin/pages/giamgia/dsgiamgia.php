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
                    <h3 class="card-title">DANH SÁCH GIẢM GIÁ</h3>
                    <div class="text-right">
                        <a href="<?php echo $site_domain?>/admin/pages/giamgia/giamgia.php">THÊM GIẢM GIÁ</a>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="datatable1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th style="width:10px">STT</th>
                                    <th>Mã giảm</th>
                                    <th>Số lượng</th>
                                    <th>Số tiền</th>
                                    <th>Xóa</th>
                                    <th>Sửa</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                            $i = 1;
                                $query = $conn->query("SELECT * FROM `magiamgia`");
                                while($row1 = $query->fetch(PDO::FETCH_ASSOC)){
                                ?>
                                <tr>
                                    <td class="text-center">
                                        <?= $i++; ?>
                                    </td>
                                    <td class="text-center">
                                        <?php echo ''.$row1["magiam"]?>
                                    </td>
                                    <td class="text-center">
                                        <?php echo ''.$row1["soluong"]?>
                                    </td>
                                    <td class="text-center">
                                        <?php echo ''.$row1["sotien"]?>
                                    </td>
                                    <td class="text-center">
                                        <a href='<?php echo $site_domain?>/admin/pages/giamgia/delete.php?huydeleidt=<?php echo ''.$row1["id"]?>'
                                            class="btn btn-default">Xoá</a>
                                    </td>
                                    <td class="text-center">
                                        <a href='<?php echo $site_domain?>/admin/pages/giamgia/editGiamGia.php?updateid=<?php echo ''.$row1["id"]?>'
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