<?php 
require '../connect.php';
$id = $_GET['id'];
$delete = "DELETE FROM artists WHERE id='$id'";
mysqli_query($connect, $delete);
mysqli_close($connect);

header('Location:index.php?delete=Xóa Thành Công');
?>