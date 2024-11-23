
<?php
require 'db.php';
$product_id = $_GET['ma_san_pham'];
// Truy vấn thông tin sản phẩm
$sql = "SELECT * FROM sanpham WHERE ma_san_pham = :ma_san_pham"; // Thay đổi tên cột tùy theo cơ sở dữ liệu
$stmt = $connection->prepare($sql);
// Gán giá trị cho tham số
$stmt->bindValue(':ma_san_pham', $product_id, PDO::PARAM_STR); // Gán giá trị cho tham số
$stmt->execute();
// Lấy kết quả
$result = $stmt->fetchAll(PDO::FETCH_OBJ); // Lấy tất cả kết quả
// Kiểm tra và xử lý kết quả
?>

<?php require 'header_guest.php'; ?>
<div id="app">
<?php foreach($result as $san_pham): ?>
    <section class="">
        <section>
        <div class="cart-body">
    <div class="middleCart">
        <div class="cart-fragment">
            <div class="product-list">
                <div class="product-item product-item_last">
                    <div class="product-item-info">
                        <div class="clssImg">
                            <a href="" class="product-item__image">
                                <img src="<?php echo "/Project_demo/Images/". $san_pham->anh_san_pham  ; ?>" alt="">
                            </a>
                        </div>
                        <div class="product-item__right">
                            <div class="product-item__right-info">
                                <a href="" class="product-item__name"><?=$san_pham->ten_san_pham;?> </a>
                                <div class="product-item__right-info__price">
                                    <div><?php echo "<p>Giá: " .$san_pham->gia_san_pham. " €</p>"; ?></div>
                                </div>
                            </div>
                            <div class="quantity-box">
                                <div class="product-quantity">
                                    <div class="product-quantity__btn">
                                    <button type="button" style="cursor: pointer;" onclick="changeCount(-1,<?=$san_pham->gia_san_pham ?>,'<?=$san_pham->ma_san_pham ?>')">
                                    <i class="fa-solid fa-minus"></i>
                                    </button>
                                    <span class="no-spinners" id="count<?=$san_pham->ma_san_pham?>">1</span>
				                            <button type="button" style="cursor: pointer;" onclick="changeCount(+1,<?=$san_pham->gia_san_pham ?>,'<?=$san_pham->ma_san_pham ?>')">
                                    <i class="fa-solid fa-plus"></i>
                            </button>    
                                </div>
                                </div>
                            </div>
                            <div class="quantity-box">
                                <span>Thành tiền :&nbsp;</span>
				                <span id="total<?=$san_pham->ma_san_pham ?>"><?= $san_pham->gia_san_pham ?></span>
				                <span>&nbsp;€</span>
                            </div>                                              
                        </div>
                    </div>                   
                </div>
            </div>  

            <div class="quantity-box">
            <button type="button" class="bt_dat_hang" id="open<?=$san_pham->ma_san_pham ?>" style="cursor: pointer;" onclick="shooping('<?=$san_pham->ma_san_pham ?>')">Đặt hàng</button>
            <form action="create_don_hang.php" method="POST">
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
                placeholder="nhập tên của quý khách"
                class="form-input"
              />
            </div>
            <div>
              <label for="email">Điện thoại</label>
              <input
                type="text"
                name="SoDienThoai"
                id="DienThoai"
                placeholder="nhập SDT của quý khách"
                class="form-input"
              />
            </div>
            <div>
              <label for="email">Địa chỉ</label>
              <input
                type = "text"
                name="DiaChi"
                id="DiaChi"
                placeholder="nhập địa chỉ của quý khách"
                class="form-input"
              />
            </div>
            <div class=" submit-div" >
              <input type="submit" value="Xác nhận" class="submit-btn"/>         
            </div>
            </div>
        </div>
      </section>
        </div>
			  </form>
        </div>
        </div>
    </div>
    <div>   
</div>
        </section>
    </section>
    <?php endforeach; ?>
</div>
<?php
	require_once 'footer.php';
?>

