<?php
require 'db.php';
$id = $_GET['id'];
$sql = 'DELETE FROM user WHERE id=:id';
$statement = $connection->prepare($sql);
if ($statement->execute([':id' => $id])) {
  header("Location: /Project_demo/tai_khoan_admin.php");
}