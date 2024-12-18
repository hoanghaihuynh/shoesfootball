<?php
require_once('../../../config/database.php');
include_once('../header.php');
include_once('../navigation.php');

$records_per_page = 10; // Số bản ghi mỗi trang
$page = isset($_GET['page']) ? intval($_GET['page']) : 1; // Trang hiện tại
$offset = ($page - 1) * $records_per_page; // Tính toán offset

// Lấy tổng số bản ghi
$total_records_query = $conn->query("SELECT COUNT(*) as total FROM `donhang`");
$total_records = $total_records_query->fetch(PDO::FETCH_ASSOC)['total'];
$total_pages = ceil($total_records / $records_per_page);

// Lấy dữ liệu cho trang hiện tại
$query = $conn->query("SELECT * FROM `donhang` LIMIT $offset, $records_per_page");
$i = $offset + 1;
?>
<div class="main-panel" style="margin: 64px 0 0 256px;">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">DANH SÁCH ĐƠN HÀNG</h3>
          <div class="text-right">

            <div class="container-fluid">
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
                    <?php while ($row1 = $query->fetch(PDO::FETCH_ASSOC)) { ?>
                      <tr>
                        <td class="text-center"><?= $i++; ?></td>
                        <td class="text-center"><?= $row1["madonhang"]; ?></td>
                        <td class="text-center"><?= $row1["tennguoimua"]; ?></td>
                        <td class="text-center"><?= $row1["dienthoai"]; ?></td>
                        <td class="text-center"><?= $row1["thoigian"]; ?></td>
                        <td class="text-center"><?= $row1["email"]; ?></td>
                        <td class="text-center"><?= $row1["name"]; ?></td>
                        <td class="text-center"><?= $row1["tongtien"]; ?></td>
                        <td class="text-center"><?= $row1["trangthai"]; ?></td>
                        <td class="text-center">
                          <a href="<?= $site_domain ?>/admin/pages/donhang/delete.php?xoasp=<?= $row1['id'] ?>" class="btn btn-danger">Xoá</a>
                        </td>
                        <td class="text-center">
                          <a href="<?= $site_domain ?>/admin/pages/donhang/editDonhang.php?updateid=<?= $row1['id'] ?>" class="btn btn-warning">Sửa</a>
                        </td>
                      </tr>
                    <?php } ?>
                  </tbody>
                </table>
              </div>

              <!-- Phân trang -->
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

            <!-- Footer -->
            <?php include_once('../footer.php'); ?>

            <!-- JavaScript includes -->
            <script src="../../vendors/js/vendor.bundle.base.js"></script>
            <script src="../../js/off-canvas.js"></script>
            <script src="../../js/hoverable-collapse.js"></script>
            <script src="../../js/template.js"></script>
            <script src="../../js/settings.js"></script>
            <script src="../../js/todolist.js"></script>
            <script src="../../vendors/progressbar.js/progressbar.min.js"></script>
            <script src="../../vendors/chart.js/Chart.min.js"></script>
            <script src="../../js/dashboard.js"></script>

            <script>
              // Hàm đổi tên thành slug
              function ChangeToSlug() {
                var title, slug;

                title = document.getElementById("title").value;

                slug = title.toLowerCase();

                slug = slug.replace(/á|à|ả|ạ|ã|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ/gi, 'a');
                slug = slug.replace(/é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ/gi, 'e');
                slug = slug.replace(/i|í|ì|ỉ|ĩ|ị/gi, 'i');
                slug = slug.replace(/ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ/gi, 'o');
                slug = slug.replace(/ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự/gi, 'u');
                slug = slug.replace(/ý|ỳ|ỷ|ỹ|ỵ/gi, 'y');
                slug = slug.replace(/đ/gi, 'd');
                slug = slug.replace(/\`|\~|\!|\@|\#|\||\$|\%|\^|\&|\*|\(|\)|\+|\=|\,|\.|\/|\?|\>|\<|\'|\"|\:|\;|_/gi, '');
                slug = slug.replace(/ /gi, "-");
                slug = slug.replace(/\-\-\-\-\-/gi, '-');
                slug = slug.replace(/\-\-\-\-/gi, '-');
                slug = slug.replace(/\-\-\-/gi, '-');
                slug = slug.replace(/\-\-/gi, '-');
                slug = '@' + slug + '@';
                slug = slug.replace(/\@\-|\-\@|\@/gi, '');
                document.getElementById('slug').value = slug;
              }
            </script>
            </body>

            </html>