<?php
require 'db.php';
if(isset($_POST['id_san_pham'])) {
    $id_san_pham = $_POST['id_san_pham'];
    $ten_san_pham = $_POST['ten_san_pham'];
    $gia_san_pham = $_POST['gia_san_pham'];
    $so_luong_san_pham = $_POST['so_luong_san_pham'.$id_san_pham];
    $tong_tien = $_POST['tong_tien_san_pham'.$id_san_pham];
    $thong_tin_nguoi_mua = $_POST['HoTen'].' - '.$_POST['SoDienThoai'].' - '.$_POST['DiaChi'];
    $sql = 'INSERT INTO donhang(ma_san_pham, ten_san_pham, so_luong_san_pham, gia_san_pham, tong_tien, thong_tin_nguoi_mua) VALUES(:ma_san_pham, :ten_san_pham, :so_luong_san_pham,:gia_san_pham, :tong_tien, :thong_tin_nguoi_mua)';
    $statement = $connection->prepare($sql);
     if ($statement->execute([':ma_san_pham'=>$id_san_pham, ':ten_san_pham'=>$ten_san_pham, ':so_luong_san_pham'=>$so_luong_san_pham, ':gia_san_pham'=>$gia_san_pham, ':tong_tien'=>$tong_tien,  ':thong_tin_nguoi_mua'=>$thong_tin_nguoi_mua])) {
        $don_hang = true;
  }
}
?>
<?php
    session_start();
    session_destroy();
    header('Location: /Project_demo/index.php');
?>
