<?php
require 'db.php';
$sql = 'SELECT * FROM sanpham';
$statement = $connection->prepare($sql);
$statement->execute();
$list_san_pham = $statement->fetchAll(PDO::FETCH_OBJ);
 ?>
<?php require 'header_guest.php'; ?>
	<div class ="root">
	<?php foreach($list_san_pham as $san_pham): ?>
		<div class="div-bg" id="div-img-bg1">
			<form action="create_don_hang.php" method="POST">
			<img src="Images/<?= $san_pham->anh_san_pham;?>" alt="" width="270px" height="200px" >
			<span class="title"><?= $san_pham->ten_san_pham; ?></span>
      <div class="shopping">Giá: <?=$san_pham->gia_san_pham ?>€</div>
      <button type="button" class="bt_mua_hang" id="open<?=$san_pham->ma_san_pham ?>" style="cursor: pointer;">Mua hàng </button>
      <div> <span id= "nguoi_mua"></span></div>
			<input type="hidden" name="ten_san_pham" value="<?=$san_pham->ten_san_pham ?>">
			<input type="hidden" name="id_san_pham" value="<?=$san_pham->ma_san_pham ?>">
			<input type="hidden" name="gia_san_pham" value="<?=$san_pham->gia_san_pham ?>" id="gia_san_pham">
			<input type="hidden" name="so_luong_san_pham<?=$san_pham->ma_san_pham ?>" value="1" id="so_luong_san_pham<?=$san_pham->ma_san_pham ?>">
			<input type="hidden" name="tong_tien_san_pham<?=$san_pham->ma_san_pham ?>" value="9500" id="tong_tien_san_pham<?=$san_pham->ma_san_pham ?>">			
			<div class="modal-container" id="modal<?=$san_pham->ma_san_pham ?>"> 
      <section class="modal">
        <button type="button" class="close-btn" id="close<?=$san_pham->ma_san_pham ?>" >x</button>
        <div class="modal-content">
          <h1>Thông tin người mua</h1>
          <div class="modal-form">
            <div>
              <label for="name">Họ tên</label>
              <input
                type="text"
                name= "HoTen"
                id="name"
                placeholder="Enter Name"
                class="form-input"
              />
            </div>
            <div>
              <label for="email">Điện thoại</label>
              <input
                type="text"
                name="SoDienThoai"
                id="DienThoai"
                placeholder="Enter telephone"
                class="form-input"
              />
            </div>
            <div>
              <label for="email">Địa chỉ</label>
              <input
                type = "text"
                name="DiaChi"
                id="DiaChi"
                placeholder="Enter address"
                class="form-input"
              />
            </div>
            <input type="submit" value="Xác nhận" class="submit-btn" />
          </div>
        </div>
      </section>
        </div>
			  </form>
		    </div>
      <?php endforeach; ?>
	  </div>
	</div>
<?php
	require_once 'footer.php';
?>
