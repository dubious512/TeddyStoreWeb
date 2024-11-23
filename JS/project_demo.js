

function shooping(id){
var closeId = "close" + id;
var openId = "open" + id;
var modalId = "modal" + id;
const close = document.getElementById(closeId);
const open = document.getElementById(openId);
const modal = document.getElementById(modalId);
modal.classList.add("show-modal");
open.addEventListener("click", () => modal.classList.add("show-modal"));
console.log(modal);

close.addEventListener("click", () => modal.classList.remove("show-modal"));
open.addEventListener("click", () => modal.classList.add("show-modal"));

window.addEventListener("click", (e) => {
  e.target === modal ? modal.classList.remove("show-modal") : false;
});
}
const submitBtn = document.querySelector('.submit-btn');
submitBtn.addEventListener('click', (event) => {
  event.preventDefault(); // Ngăn chặn form gửi đi
  // Lấy các giá trị từ các trường input
  const hoTen = document.querySelector('input[name="HoTen"]').value;
  const soDienThoai = document.querySelector('input[name="SoDienThoai"]').value;
  const diaChi = document.querySelector('input[name="DiaChi"]').value;
  // Kiểm tra xem các trường có được nhập đầy đủ hay không
  if (hoTen.trim() === '' || soDienThoai.trim() === '' || diaChi.trim() === '') {
    alert('Vui lòng nhập đầy đủ thông tin!');
    return; // Dừng việc gửi form
  }
  // Nếu tất cả các trường được nhập đầy đủ, cho phép gửi form
	alert('Đặt hàng thành công !');
	event.target.form.submit();
});

function changeCount(count,price,id){
    var countID = 'count' + id;
    var so_luong_san_pham = 'so_luong_san_pham' + id;
    var tong_tien_san_pham = 'tong_tien_san_pham' + id;
	var elementCount = document.getElementById(countID);
	var elementSLSP = document.getElementById(so_luong_san_pham);
	var elementTTSP = document.getElementById(tong_tien_san_pham);
	var countAdd =  parseInt(elementCount.innerHTML);
	if (countAdd==1 && count ==-1) return 0;
	countAdd = countAdd + count; console.log(so_luong_san_pham);
	elementCount.innerHTML = countAdd; console.log(countAdd);
	elementSLSP.value = countAdd; console.log(elementSLSP);
	var totalID = 'total' + id;
	var elementTotal = document.getElementById(totalID);
	var totalAdd = countAdd * parseInt(price);
	elementTotal.innerHTML = totalAdd.toFixed(2);
	elementTTSP.value =totalAdd.toFixed(2);
}

function purchase(id){
	var thong_tin_nguoi_mua = 'thong_tin_nguoi_mua' + id;
	var elementTTNM = document.getElementById(thong_tin_nguoi_mua);
	var inFor =prompt("Mời bạn nhập số điện thoại, tên và địa chỉ, chúng tôi sẽ liên lạc để giao hàng cho bạn trong thời gian sớm nhất!");
	elementTTNM.value=inFor ;
	if (inFor!='') alert ('Bạn đã đặt hàng thành công, chúng tôi sẽ liên lạc đến bạn sớm nhất! Thông tin liên lạc của bạn là: '+ inFor);
    
}
document.querySelectorAll('.bt_mua_hang').forEach(button => {
	button.addEventListener('click', function() {
		const productId = this.id.replace('open', ''); // Lấy mã sản phẩm từ id
		const url = `buy.php?ma_san_pham=${productId}`; // Tạo URL với tham số mã sản phẩm
		// Mở trang mới
		window.location.href = url; // Chuyển hướng trong cùng tab
	});
});
