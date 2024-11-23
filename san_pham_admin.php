<?php
require 'db.php';
$sql = 'SELECT * FROM sanpham';
$statement = $connection->prepare($sql);
$statement->execute();
$list_san_pham = $statement->fetchAll(PDO::FETCH_OBJ);
 ?>
<?php require 'header_admin.php'; ?>
<div class="big-banner-admin">
</div>
<h1 style="text-align: center; color:white; text-shadow: 
                -1px -1px 0 black,  
                1px -1px 0 black,
                -1px 1px 0 black,
                1px 1px 0 black;"> Danh sách sản phẩm </h1>
<div class="">
<ul>
    <li class="nav-item">
      <a class="create_btn" href="create_san_pham.php">Thêm mới</a>
    </li>
  </ul>
  <table id ="list_tables">
    <tr>
      <th>Mã SP</th>
      <th>Tên sản phẩm</th>
      <th>Giá sản phẩm</th>
      <th>Ảnh</th>
      <th>Action</th>
    </tr>
    <?php foreach($list_san_pham as $san_pham): ?>
    <tr>
      <td><?= $san_pham->ma_san_pham; ?></td>
      <td><?= $san_pham->ten_san_pham; ?></td>
      <td><?= $san_pham->gia_san_pham; ?></td>
      <td><img src="Images/<?= $san_pham->anh_san_pham;?>" alt="" width="100px" height="80px" ></td>
      <td>
      <a href="edit_san_pham.php?id=<?= $san_pham->id ?>" class="btn_edit">Edit</a>
      <a onclick="return confirm('Bạn có thực sự muốn xóa sản phẩm này?')" href="delete_san_pham.php?id=<?= $san_pham->id ?>" class='btn_del'>Delete</a>
      </td>
    </tr>
    <?php endforeach; ?>
  </table>
</div>
<?php require 'footer.php'; ?>
