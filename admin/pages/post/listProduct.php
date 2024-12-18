<?php
require_once('../../../config/database.php');
include_once('../header.php');
include_once('../navigation.php');

$records_per_page = 10; // Number of records per page
$page = isset($_GET['page']) ? intval($_GET['page']) : 1; // Current page
$offset = ($page - 1) * $records_per_page; // Calculate offset

// Get total number of records
$total_records_query = $conn->query("SELECT COUNT(*) as total FROM `products`");
$total_records = $total_records_query->fetch(PDO::FETCH_ASSOC)['total'];
$total_pages = ceil($total_records / $records_per_page);

// Get data for the current page
$query = $conn->query("SELECT * FROM `products` LIMIT $offset, $records_per_page");
$i = $offset + 1;
?>
<div class="main-panel" style="margin: 64px 0 0 256px;">

    <div class="main-panel">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">NHÓM SẢN PHẨM</h3>
                        <div class="text-right">
                            <a href="<?php echo $site_domain ?>/admin/pages/post/addProduct.php">THÊM SẢN PHẨM</a>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="datatable1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th style="width:10px">STT</th>
                                        <th>Hình Ảnh</th>
                                        <th>Tên Sản Phẩm</th>
                                        <th>Giá Chính</th>
                                        <th>Giá Cũ</th>
                                        <th>Danh Mục Sản Phẩm</th>
                                        <th>Xóa</th>
                                        <th>Sửa</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    while ($row1 = $query->fetch(PDO::FETCH_ASSOC)) {
                                    ?>
                                        <tr>
                                            <td class="text-center"><?= $i++; ?></td>
                                            <td class="text-center">
                                                <img width="50" height="50" src="<?php echo $row1["image"]; ?>" alt="Product Image">
                                            </td>
                                            <td class="text-center"><?= $row1["nameProduct"]; ?></td>
                                            <td class="text-center"><?= $row1["price"]; ?></td>
                                            <td class="text-center"><?= $row1["giagoc"]; ?></td>
                                            <td class="text-center"><?= $row1["danhmuc"]; ?></td>
                                            <td class="text-center">
                                                <a href='<?php echo $site_domain ?>admin/pages/post/delete.php?xoasp=<?php echo $row1["id"]; ?>' class="btn btn-danger">Xoá</a>
                                            </td>
                                            <td class="text-center">
                                                <a href='<?php echo $site_domain ?>admin/pages/post/editProducts.php?updateid=<?php echo $row1["id"]; ?>' class="btn btn-warning">Sửa</a>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- /.card-body -->

                    <!-- Pagination -->
                    <div class="card-footer clearfix">
                        <nav aria-label="Page navigation">
                            <ul class="pagination justify-content-center">
                                <!-- Previous Page Button -->
                                <?php if ($page > 1): ?>
                                    <li class="page-item">
                                        <a class="page-link" href="?page=<?= $page - 1 ?>" aria-label="Previous">
                                            <span aria-hidden="true">«</span>
                                        </a>
                                    </li>
                                <?php endif; ?>

                                <!-- Page Numbers -->
                                <?php for ($i = 1; $i <= $total_pages; $i++): ?>
                                    <li class="page-item <?= ($i == $page) ? 'active' : '' ?>">
                                        <a class="page-link" href="?page=<?= $i ?>"><?= $i ?></a>
                                    </li>
                                <?php endfor; ?>

                                <!-- Next Page Button -->
                                <?php if ($page < $total_pages): ?>
                                    <li class="page-item">
                                        <a class="page-link" href="?page=<?= $page + 1 ?>" aria-label="Next">
                                            <span aria-hidden="true">»</span>
                                        </a>
                                    </li>
                                <?php endif; ?>
                            </ul>
                        </nav>
                    </div>
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
    </div>

    <?php include_once('../footer.php'); ?>


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