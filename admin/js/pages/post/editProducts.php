<?php
  require_once('../../../config/database.php');
  include_once('../header.php');
  include_once('../navigation.php');
 ;
$id = $_GET['updateid'];
?>

        <!-- partial -->
<div class="main-panel" style="padding-left:50px;padding-top:20px;padding-right:50px">
    <?php 
                            $i = 1;
                                $query = $conn->query("SELECT * FROM `products` WHERE `id` = '$id'");
                                while($row1 = $query->fetch(PDO::FETCH_ASSOC)){
                                ?>
            <div class="box">
    <div class="box-header with-border">
        <div class="left">
            <h3 class="box-title">Cập nhật sản phẩm</h3>
        </div>
    </div><!-- /.box-header -->

    <form class="box-body" method="POST" enctype="multipart/form-data">
        <!-- include message block -->
        
    <!--print error messages-->

    <!--print custom error message-->

    <!--print custom success message-->

        <div class="form-group">
            <label class="control-label">Tên sản phẩm</label>
            <input type="text" id="title" class="form-control" name="title" placeholder="Tiêu đề" value="<?php echo ''.$row1["nameProduct"]?>" required fdprocessedid="i9pziq" onkeyup="ChangeToSlug();">
        </div>

        <div class="form-group">
            <label class="control-label">Slug                <small>(Nếu bạn để trống, nó sẽ được tạo tự động.)</small>
            </label>
            <input type="text" class="form-control" name="slug" placeholder="Slug" value="<?php echo ''.$row1["lienket"]?>" id="slug" required fdprocessedid="oboy0m">
        </div>

        <div class="form-group">
            <label class="control-label">Tóm lược &amp; Sự miêu tả (Thẻ meta)</label>
            <textarea name="summary" id="summary" placeholder="Tóm lược &amp; Sự miêu tả (Thẻ meta)" value="" style="width:70%;height:200px;">
                <?php echo ''.$row1["meta_detail"]?>
            </textarea>
        </div>

        <div class="form-group">
            <label class="control-label">Từ khóa (Thẻ meta)</label>
            <input type="text" class="form-control" name="keywords" placeholder="Từ khóa (Thẻ meta)" value="<?php echo ''.$row1["meta"]?>" required fdprocessedid="c7g48i">
        </div>
        
        <div class="form-group">
            <label class="control-label">Số tiền gốc</label>
            <input type="text" class="form-control" name="sotiengoc" placeholder="Số tiền gốc" value="<?php echo ''.$row1["giagoc"]?>" fdprocessedid="c7g48i" required>
        </div>
        
        <div class="form-group">
            <label class="control-label">Số tiền (Giảm giá)</label>
            <input type="text" class="form-control" name="sotiengiamgia" placeholder="Số tiền (Giảm giá)" value="<?php echo ''.$row1["price"]?>" required value="" fdprocessedid="c7g48i">
        </div>
        
        <div class="form-group">
            <label class="control-label">Chi tiết sản phẩm</label>
            <textarea name="chitiet" id="chitiet" value="" placeholder="Chi tiết cửa hàng" style="width:70%;height:200px;">
                <?php echo ''.$row1["chitiet"]?>
            </textarea>
        </div>
        
        <div class="form-group">
            <label class="control-label">Sale</label>
            <input type="text" class="form-control" name="sale" placeholder="Sale (New)" value="<?php echo ''.$row1["sale"]?>" fdprocessedid="c7g48i" >
        </div>
        
        <div class="form-group">
            <label class="control-label">Số lượng hiện có</label>
            <input type="text" class="form-control" name="slhienco" placeholder="Số lượng hiện có" value="<?php echo ''.$row1["hienco"]?>" required fdprocessedid="c7g48i">
        </div>
        


                    <div class="form-group">
                <div class="row">
                    <div class="col-sm-4 col-xs-12">
                        <label>Ghim Lên Đầu</label>
                    </div>
                    <div class="col-md-2 col-sm-4 col-xs-12 col-option">
                        <div class="iradio_square-purple checked"><input type="radio" id="rb_visibility_1" name="visibility" value="1" class="square-purple" checked="" ><ins class="iCheck-helper" ></ins></div>
                        <label for="rb_visibility_1" class="cursor-pointer">Ghim lên</label>
                    </div>
                    <div class="col-md-2 col-sm-4 col-xs-12 col-option">
                        <div class="iradio_square-purple" style="position: relative;"><input type="radio" id="rb_visibility_1" name="visibility" value="0" class="square-purple" ><ins class="iCheck-helper"></ins></div>
                        <label for="rb_visibility_2" class="cursor-pointer">Không Ghim</label>
                    </div>
                </div>
            </div>
                <div class="form-group m-0">
                <label class="control-label">Danh mục</label>
                <select id="subcategories" name="subcategory_id" class="form-control" fdprocessedid="b8z8t2">
                    <?php 
                                $query = $conn->query("SELECT * FROM `danhmuc`");
                                while($row1 = $query->fetch(PDO::FETCH_ASSOC)){ 
                                ?>
                    <option value="<?php echo ''.$row1["lienket"]?>"><?php echo ''.$row1["tendanhmuc"]?></option>
                    <?php }?>
                </select>
            </div>
            <br>
            
        <div class="form-group row-optional-url">
            <div class="row">
                <div class="col-sm-12">
                    <label class="control-label">URL tùy chọn</label>
                    <input type="text" class="form-control" name="url" placeholder="URL tùy chọn" value="<?php echo ''.$row1["lienket"]?>" fdprocessedid="ppkiu">
                </div>
            </div>
        </div>
        
        
<div class="form-group" style="width:400px">
                                            <label for="exampleInputFile">Ảnh Sản Phẩm 1</label>
                                            <div class="input-group">
                                                <div class="custom-file">
                                                     <input type="hidden" name="size" value="100000000"> 
                                                     <input type="file" name="image"  id="image" value="" class="custom-file-input" required>
                                                  
                                                    <label class="custom-file-label" for="exampleInputFile">Choose
                                                        file</label>
                                                        
                                                </div>
                                               <img src="<?php echo ''.$row1["image"]?>"/>
                                            </div>
                                        </div>
        
        <div class="form-group" style="width:400px">
                                            <label for="exampleInputFile">Ảnh Sản Phẩm 2</label>
                                            <div class="input-group">
                                                <div class="custom-file">
                                                     <input type="hidden" name="size1" value="100000000" >
                                                     
                                                  <input type="file" name="image1" id="image1" value="" class="custom-file-input" required>
                                                    <label class="custom-file-label" for="exampleInputFile">Choose
                                                        file</label>
                                                </div>
                                                <img src="<?php echo ''.$row1["image1"]?>"/>
                                            </div>
                                        </div>


<div class="form-group" style="width:400px">
                                            <label for="exampleInputFile">Ảnh Sản Phẩm 3</label>
                                            <div class="input-group">
                                                <div class="custom-file">
                                                     <input type="hidden" name="size2" value="100000000" > 
                                                     
                                                  <input type="file" name="image2" id="image2" value="" class="custom-file-input" required>
                                                    <label class="custom-file-label" for="exampleInputFile">Choose
                                                        file</label>
                                                </div>
                                                <img src="<?php echo ''.$row1["image2"]?>"/>
                                            </div>
                                        </div>

<div class="form-group" style="width:400px">
                                            <label for="exampleInputFile">Ảnh Sản Phẩm Cuối Trang</label>
                                            <div class="input-group">
                                                <div class="custom-file">
                                                     <input type="hidden" name="size3" value="100000000" > 
                                                     
                                                  <input type="file" name="image3" id="image3" value="" class="custom-file-input" required>
                                                    <label class="custom-file-label" for="exampleInputFile">Choose
                                                        file</label>
                                                </div>
                                               <img src="<?php echo ''.$row1["footer"]?>"/>
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
                <button type="submit" name="submit" value="1" class="btn btn-primary pull-right" onclick="allow_submit_form = true;" fdprocessedid="bxji3">Đăng Sản Phẩm</button>
                
            </div>
        
    </div>
</div>
                                </div>
    </form>


</div>
<?php }?>
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
// $sql = "INSERT INTO tb_upload (image,detail) VALUES ('$image','$target')";
// $conn->query( $sql);
move_uploaded_file($_FILES['image']['tmp_name'], $target);

    $errors1= array();
$file_name1 = $_FILES['image1']['name'];
$file_size1 = $_FILES['image1']['size'];
$file_tmp1 = $_FILES['image1']['tmp_name'];
$file_type1 = $_FILES['image1']['type'];
$file_parts1 =explode('.',$_FILES['image1']['name']);
$file_ext1=strtolower(end($file_parts1));
$expensions1= array("jpeg","jpg","png");
if(in_array($file_ext1,$expensions1)=== false){
$errors1[]="Chỉ hỗ trợ upload file JPEG hoặc PNG.";
}
if($file_size1 > 100000000) {
$errors1[]='Kích thước file không được lớn hơn 2MB';
}
$image1 = $_FILES['image1']['name'];
$target1 = "uploads/".$image1;

// $sql = "INSERT INTO tb_upload (image,detail) VALUES ('$image','$target')";
// $conn->query( $sql);
move_uploaded_file($_FILES['image1']['tmp_name'], $target1);

    $errors2= array();
$file_name2 = $_FILES['image2']['name'];
$file_size2 = $_FILES['image2']['size'];
$file_tmp2 = $_FILES['image2']['tmp_name'];
$file_type2 = $_FILES['image2']['type'];
$file_parts2 =explode('.',$_FILES['image2']['name']);
$file_ext2=strtolower(end($file_parts2));
$expensions2= array("jpeg","jpg","png");
if(in_array($file_ext2,$expensions2)=== false){
$errors2[]="Chỉ hỗ trợ upload file JPEG hoặc PNG.";
}
if($file_size2 > 100000000) {
$errors2[]='Kích thước file không được lớn hơn 2MB';
}
$image2 = $_FILES['image2']['name'];
$target2 = "uploads/".$image2;
// $sql = "INSERT INTO tb_upload (image,detail) VALUES ('$image','$target')";
// $conn->query( $sql);
move_uploaded_file($_FILES['image2']['tmp_name'], $target2);


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
// echo "<script>document.getElementById('image3').value = '$target';</script>";
// $sql = "INSERT INTO tb_upload (image,detail) VALUES ('$image','$target')";
// $conn->query( $sql);
move_uploaded_file($_FILES['image3']['tmp_name'], $target3);

    $title   = $_POST['title'];
    $slug      = $_POST['slug'];
    $summary   = $_POST['summary'];
    $keywords  = $_POST['keywords'];
     $sotiengoc  = $_POST['sotiengoc'];
    $sotiengiamgia     = $_POST['sotiengiamgia'];
     $chitiet   = $_POST['chitiet'];
    $sale      = $_POST['sale'];
    $slhienco      = $_POST['slhienco'];
    $signi= $_POST['visibility'];
    $select = $_POST['subcategory_id'];

$sql = "UPDATE products SET `nameProduct`='$title',`price`='$sotiengiamgia',`chitiet`='$chitiet',`image`='https://orgamicheart.com/admin/pages/post/uploads/$image',`sale`='$sale',`lienket`='$slug',`danhmuc`='$select',`footer`='https://orgamicheart.com/admin/pages/post/uploads/$image1',`pin`='$signi',`giagoc`='$sotiengoc',`image1`='https://orgamicheart.com/admin/pages/post/uploads/$image2',`image1`='https://orgamicheart.com/admin/pages/post/uploads/$image3',`hienco`='$slhienco',`meta_detail`='$keywords',`meta`='$summary'  WHERE `id` = '$id'";
    if ($conn->query( $sql)) {
        echo '<script>alert("Bạn Đã Cập Nhật Thành Công!");</script>';
    
        header('Location: #');
        
    } else {
        echo '<script>alert("Bạn Đã Cập Nhật Thất Bại!");</script>';
        header('Location: #');
    }
}
?>