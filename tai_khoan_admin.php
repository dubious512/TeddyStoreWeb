<?php
require 'db.php';
$sql = 'SELECT * FROM user';
$statement = $connection->prepare($sql);
$statement->execute();
$list_tai_khoan = $statement->fetchAll(PDO::FETCH_OBJ);
 ?>
<?php require 'header_admin.php'; ?>
<div class="big-banner-admin">
</div>
<h1 style="text-align: center; color:white; text-shadow: 
                -1px -1px 0 black,  
                1px -1px 0 black,
                -1px 1px 0 black,
                1px 1px 0 black;"> Danh sách tài khoản </h1>
<div class="">
<ul>
    <li class="nav-item">
      <a class="create_btn" href="create_tai_khoan.php">Thêm mới</a>
    </li>
  </ul>
  <table id ="list_tables">
    <tr>
      <th>ID</th>
      <th>Tên đăng nhập</th>
      <th>Mật khẩu</th>
      <th>Action</th>
    </tr>
    <?php foreach($list_tai_khoan as $tai_khoan): ?>
    <tr>
      <td><?=$tai_khoan->id; ?></td>
      <td><?= $tai_khoan->ten_dang_nhap; ?></td>
      <td><?= $tai_khoan->mat_khau; ?></td>
      <td>
      <a href="edit_tai_khoan.php?id=<?= $tai_khoan->id ?>" class="btn_edit">Edit</a>
      <a onclick="return confirm('Bạn có thực sự muốn xóa tài khoản này?')" href="delete_tai_khoan.php" class='btn_del'>Delete</a>
      </td>
    </tr>
    <?php endforeach; ?>
  </table>
</div>
<?php require 'footer.php'; ?>