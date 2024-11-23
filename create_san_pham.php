<?php
require 'db.php';
$message = '';
if (isset ($_POST['ma_san_pham'])  && isset($_POST['ten_san_pham']) ) {
  $ma_san_pham = $_POST['ma_san_pham'];
  $ten_san_pham = $_POST['ten_san_pham'];
  $gia_san_pham = $_POST['gia_san_pham'];
  $anh_san_pham = $_POST['anh_san_pham'];
  $sql = 'INSERT INTO sanpham(ma_san_pham, ten_san_pham, gia_san_pham, anh_san_pham) VALUES(:ma_san_pham, :ten_san_pham, :gia_san_pham, :anh_san_pham)';
  $statement = $connection->prepare($sql);
  if ($statement->execute([':ma_san_pham'=>$ma_san_pham, ':ten_san_pham'=>$ten_san_pham, ':gia_san_pham'=>$gia_san_pham, ':anh_san_pham'=>$anh_san_pham])) {
     header("Location: /Project_demo/san_pham_admin.php");
  }
}
 ?>
<?php require 'header_admin.php'; ?>
<div class="body-login">
<section class="wrapper">  
        <div class="login">
            <div class="d1 step1">
                <span>Thêm mới sản phẩm</span>
                <form method="post">
                    <div class="input-area">
                    <i class="fa-brands fa-twitter input-icon"></i>
                      <input type="text" id="ma_san_pham" name="ma_san_pham" autocomplete="off" placeholder="Mã sản phẩm">                   
                    </div>
                    <div class="input-area">
                      <i class="fa-solid fa-signature input-icon"></i>
                      <input type="text" id="ten_san_pham" name="ten_san_pham" autocomplete="off" placeholder="Tên sản phẩm">
                    </div>
                    <div class="input-area">
                    <i class="fa-solid fa-tag input-icon"></i>
                    <input type="number" id="gia_san_pham" name="gia_san_pham" autocomplete="off" placeholder="Giá sản phẩm">
                    </div>
                    <div class="input-area">
                    <i class="fa-solid fa-image input-icon"></i>
                    <input type="text" id="anh_san_pham" name="anh_san_pham" autocomplete="off" placeholder="Ảnh sản phẩm">                                      
                  </div>
                    <button type="submit" class="btn-login" value="Submit" name="submit">Xác nhận</button>
                </form>
            </div>
        </div>
    </section>
    </body>
<?php require 'footer.php'; ?>
