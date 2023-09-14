<?php 
require '../connect.php';

$name = $_POST['name'];
$photo = $_FILES['photo'];
$description = $_POST['description'];
$email = $_POST['email'];
$phone = $_POST['phone'];

$folder = 'photo/' ;
$file_extension = explode('.', $photo['name'])[1];
$file_name = time() . '.' . $file_extension;
$path_file = $folder . time() . '.' . $file_extension;
move_uploaded_file($photo["tmp_name"], $path_file);

$sql = "INSERT INTO artists( name, photo, description, phone, email)
values ('$name' , '$file_name' , '$description' , '$phone','$email');"; 

mysqli_query($connect, $sql);
mysqli_close($connect);

header('Location:index.php?success=Thêm Thành Công');
?>