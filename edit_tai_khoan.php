<?php
require 'db.php';
$id = $_GET['id'];
$sql = 'SELECT * FROM user WHERE id=:id';
$statement = $connection->prepare($sql);
$statement->execute([':id' => $id ]);
$tai_khoan = $statement->fetch(PDO::FETCH_OBJ);
if (isset($_POST['ten_dang_nhap']) ) {
  $ten_dang_nhap = $_POST['ten_dang_nhap'];
  $mat_khau = $_POST['mat_khau'];
  $sql = 'UPDATE user SET ten_dang_nhap=:ten_dang_nhap, mat_khau=:mat_khau WHERE id=:id';
  $statement = $connection->prepare($sql);
  if ($statement->execute([ ':ten_dang_nhap' => $ten_dang_nhap, ':mat_khau' => $mat_khau, ':id' => $id])) {
     header("Location: /Project_demo/tai_khoan_admin.php");
  }
}
 ?>
<?php require 'header_admin.php'; ?>
<div class="body-login">
<section class="wrapper">  
        <div class="login">
            <div class="d1 step1">
  <span>Sửa thông tin tài khoản</span>
  <form method="post">
    <div class="input-area">
    <i class="fa-solid fa-user input-icon"></i>
        <input value="<?= $tai_khoan->ten_dang_nhap; ?>" type="text" id="ten_dang_nhap" name="ten_dang_nhap" autocomplete="off" placeholder="Tên đăng nhập">
    </div>
    <div class="input-area">
    <i class="fa-solid fa-lock input-icon"></i>
        <input value="<?= $tai_khoan->mat_khau; ?>" type="text" id="mat_khau" name="mat_khau" autocomplete="off" placeholder="Mật khẩu">
    </div>
    <button type="submit" class="btn-login" value="Submit" name="submit">Xác nhận</button>            
  </form>
</div>
        </div>
</section>
</div>

<?php require 'footer.php'; ?>