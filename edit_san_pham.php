<?php
require 'db.php';
$id = $_GET['id'];
$sql = 'SELECT * FROM sanpham WHERE id=:id';
$statement = $connection->prepare($sql);
$statement->execute([':id' => $id ]);
$san_pham = $statement->fetch(PDO::FETCH_OBJ);
if (isset ($_POST['ma_san_pham'])  && isset($_POST['ten_san_pham']) ) {
  $ma_san_pham = $_POST['ma_san_pham'];
  $ten_san_pham = $_POST['ten_san_pham'];
  $gia_san_pham = $_POST['gia_san_pham'];
  $anh_san_pham = $_POST['anh_san_pham'];
  $sql = 'UPDATE sanpham SET ma_san_pham=:ma_san_pham, ten_san_pham=:ten_san_pham, gia_san_pham=:gia_san_pham, anh_san_pham=:anh_san_pham WHERE id=:id';
  $statement = $connection->prepare($sql);
  if ($statement->execute([':ma_san_pham' => $ma_san_pham, ':ten_san_pham' => $ten_san_pham, ':gia_san_pham' => $gia_san_pham, ':anh_san_pham' => $anh_san_pham, ':id' => $id])) {
     header("Location: /Project_demo/san_pham_admin.php");
  }
}
 ?>
<?php require 'header_admin.php'; ?>
<div class="body-login">
<section class="wrapper">  
        <div class="login">
            <div class="d1 step1">
  <span>Sửa thông tin sản phẩm</span>
  <form method="post">
    <div class="input-area">
      <i class="fa-solid fa-id-badge input-icon"></i>
        <input value="<?= $san_pham->ma_san_pham; ?>" type="text" id="ma_san_pham" name="ma_san_pham" autocomplete="off" placeholder="Mã sản phẩm">                   
    </div>
    <div class="input-area">
        <i class="fa-solid fa-signature input-icon"></i>
        <input value="<?= $san_pham->ten_san_pham; ?>" type="text" id="ten_san_pham" name="ten_san_pham" autocomplete="off" placeholder="Tên sản phẩm">
    </div>
    <div class="input-area">
        <i class="fa-solid fa-tag input-icon"></i>
        <input value="<?= $san_pham->gia_san_pham; ?>" type="text" id="gia_san_pham" name="gia_san_pham" autocomplete="off" placeholder="Giá sản phẩm">
    </div>
    <div class="input-area">
        <i class="fa-solid fa-image input-icon"></i>
        <input value="<?= $san_pham->anh_san_pham; ?>" type="text" id="anh_san_pham" name="anh_san_pham" placeholder="Ảnh sản phẩm">                                      
    </div>
         <button type="submit" class="btn-login" value="Submit" name="submit">Xác nhận</button>            
  </form>
</div>
        </div>
</section>
</div>

<?php require 'footer.php'; ?>
