<?php 
require '../connect.php';
$id = $_POST['id'];
$name = $_POST['name'];
$photo_new = $_FILES['photo_new'];
if ($photo_new['size'] > 0 ) { 
    $folder = 'photo/' ;
    $file_extension = explode('.', $photo_new['name'])[1];
    $file_name = time() . '.' . $file_extension;
    $path_file = $folder . time() . '.' . $file_extension;
    move_uploaded_file($photo_new["tmp_name"], $path_file);
} else { 
    $file_name =  $_POST['photo_old'];
}
$description = $_POST['description'];
$email = $_POST['email'];
$phone = $_POST['phone'];

$sql = "UPDATE artists  
SET
name = '$name',
photo = '$file_name',
description = '$description',
phone = '$phone' ,
email = '$email'
where
id = '$id'";
mysqli_query($connect, $sql);
mysqli_close($connect); 

header('Location:index.php?fixed=Sửa Thành Công');
?>