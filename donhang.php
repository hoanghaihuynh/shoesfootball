<?php
require_once('./config/database.php');
include_once('./components/header.php');
include_once('./components/nav.php');

$email = $_SESSION["user"];

$records_per_page = 10; // Số bản ghi mỗi trang
$page = isset($_GET['page']) ? intval($_GET['page']) : 1; // Trang hiện tại
$offset = ($page - 1) * $records_per_page; // Tính toán offset

// Lấy tổng số bản ghi
$total_records_query = $conn->query("SELECT COUNT(*) as total FROM `donhang` WHERE `email` = '$email'");
$total_records = $total_records_query->fetch(PDO::FETCH_ASSOC)['total'];
$total_pages = ceil($total_records / $records_per_page);

// Lấy dữ liệu cho trang hiện tại
$query = $conn->query("SELECT * FROM `donhang` WHERE `email` = '$email' ORDER BY `id` DESC LIMIT $offset, $records_per_page");

$qty = 0;
?>
<style>
    .pagination {
        display: flex;
        justify-content: center;
        align-items: center;
        margin-top: 20px;
    }
</style>
<div style="padding-top:50px" class="container">
    <div class="content-page">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="alert bg-white alert-primary" role="alert">
                        <div class="iq-alert-icon">
                            <i class="ri-alert-line"></i>
                        </div>
                        <div class="iq-alert-text">
                            <p>Quý khách có thể theo dõi trạng thái đơn hàng tại đây</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <div class="header-title">
                                <h4 class="card-title">Lịch Sử Mua Hàng</h4>
                            </div>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                                    <div class="row">
                                        <div class="col-sm-12 col-md-6">
                                            <div class="dataTables_length" id="DataTables_Table_0_length"></div>
                                        </div>
                                        <div class="col-sm-12 col-md-6">
                                            <div id="DataTables_Table_0_filter" class="dataTables_filter"></div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <table class="table data-table table-hover mb-0 dataTable no-footer"
                                                id="DataTables_Table_0" role="grid"
                                                aria-describedby="DataTables_Table_0_info">
                                                <thead class="table-color-heading">
                                                    <tr role="row">
                                                        <th width="5%" class="sorting sorting_asc" tabindex="0"
                                                            aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                                                            aria-sort="ascending"
                                                            aria-label="#: activate to sort column descending"
                                                            style="width: 9px;">#</th>
                                                        <th class="sorting" tabindex="0"
                                                            aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                                                            aria-label="Mã giao dịch: activate to sort column ascending"
                                                            style="width: 130px;">Mã giao dịch</th>
                                                        <th class="sorting" tabindex="0"
                                                            aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                                                            aria-label="Sản phẩm: activate to sort column ascending"
                                                            style="width: 246.781px;">Sản phẩm</th>
                                                        <th class="sorting" tabindex="0"
                                                            aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                                                            aria-label="Trạng thái: activate to sort column ascending"
                                                            style="width: 246.781px;">Trạng thái</th>
                                                        <th class="sorting" tabindex="0"
                                                            aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                                                            aria-label="Số lượng: activate to sort column ascending"
                                                            style="width: 54.1719px;">Số lượng</th>
                                                        <th class="sorting" tabindex="0"
                                                            aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                                                            aria-label="Thanh toán: activate to sort column ascending"
                                                            style="width: 64.8906px;">Thanh toán</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    while ($row1 = $query->fetch(PDO::FETCH_ASSOC)) {
                                                        $qty += 1;
                                                    ?>
                                                        ?>
                                                        <tr class="odd">
                                                            <td class="sorting_1">
                                                                <?php echo '' . $qty ?>
                                                            </td>
                                                            <td>
                                                                <div class="main-panel" style="padding-left:50px;padding-top:20px;padding-right:50px">
                                                                </div>
                                                                <?php echo '' . $row1["madonhang"] ?>
                                                            </td>
                                                            <td><b>
                                                                    <?php echo '' . $row1["name"] ?>
                                                                </b></td>
                                                            <td><b style="color:green;">
                                                                    <?php echo '' . $row1["trangthai"] ?>
                                                                </b>
                                                            </td>
                                                            <td><b style="color:blue;">
                                                                    <?php echo '' . $row1["soluong"] ?>
                                                                </b>
                                                            </td>
                                                            <td><b style="color:red;">
                                                                    <?php echo '' . number_format($row1["price"] * $row1["soluong"]) ?>đ
                                                                </b>
                                                            </td>

                                                            <!-- <td><a type="button"
                                                                href="detail.php?id=<?php echo '' . $row1["idsp"] ?>"
                                                                class="btn btn-primary btn-sm" style="color:white">Xem
                                                                Thêm</a>

                                                        </td> -->
                                                        </tr>
                                                    <?php } ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <!-- Phân trang -->
                                    <div class="row">
                                        <div class="col-sm-12 ">
                                            <nav aria-label="Page navigation">
                                                <ul class="pagination justify-content-center">
                                                    <!-- Nút Trang Trước -->
                                                    <?php if ($page > 1): ?>
                                                        <li class="page-item">
                                                            <a class="page-link" href="?page=<?= $page - 1 ?>" aria-label="Previous">
                                                                <span aria-hidden="true">«</span>
                                                            </a>
                                                        </li>
                                                    <?php endif; ?>

                                                    <!-- Các số trang -->
                                                    <?php for ($i = 1; $i <= $total_pages; $i++): ?>
                                                        <li class="page-item <?= ($i == $page) ? 'active' : '' ?>">
                                                            <a class="page-link" href="?page=<?= $i ?>"><?= $i ?></a>
                                                        </li>
                                                    <?php endfor; ?>

                                                    <!-- Nút Trang Sau -->
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
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>




<!-- Start Footer Area -->

<!-- /End Footer Area -->

<!-- Jquery -->
<script src="js/jquery.min.js"></script>
<script src="js/jquery-migrate-3.0.0.js"></script>
<script src="js/jquery-ui.min.js"></script>
<!-- Popper JS -->
<script src="js/popper.min.js"></script>
<!-- Bootstrap JS -->

<script src="js/bootstrap.min.js"></script>
<!-- Color JS -->
<script src="js/colors.js"></script>
<!-- Slicknav JS -->
<script src="js/slicknav.min.js"></script>
<!-- Owl Carousel JS -->
<script src="js/owl-carousel.js"></script>
<!-- Magnific Popup JS -->
<script src="js/magnific-popup.js"></script>
<!-- Fancybox JS -->
<script src="js/facnybox.min.js"></script>
<!-- Waypoints JS -->
<script src="js/waypoints.min.js"></script>
<!-- Countdown JS -->
<script src="js/finalcountdown.min.js"></script>
<!-- Nice Select JS -->
<script src="js/nicesellect.js"></script>
<!-- Ytplayer JS -->
<script src="js/ytplayer.min.js"></script>
<!-- Flex Slider JS -->
<script src="js/flex-slider.js"></script>
<!-- ScrollUp JS -->
<script src="js/scrollup.js"></script>
<!-- Onepage Nav JS -->
<script src="js/onepage-nav.min.js"></script>
<!-- Easing JS -->
<script src="js/easing.js"></script>
<!-- Active JS -->
<script src="js/active.js"></script>
</body>

</html>
<?php
include_once('./components/footer.php');
?>