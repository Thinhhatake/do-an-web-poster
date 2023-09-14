<?php 
$name = $_POST['name'];
$photo = $_FILES['photo'];
$price = $_POST['price'];
$description = $_POST['description'];
$id_artists = $_POST['id_artists'];
$type = $_POST['type'];

$folder = 'photo/' ;
$file_extension = explode('.', $photo['name'])[1];
$file_name = time() . '.' . $file_extension;
$path_file = $folder . time() . '.' . $file_extension;
move_uploaded_file($photo["tmp_name"], $path_file);
 require '../connect.php';
 $sql =  "insert into products(name, photo, price, description, id_artists, type)            
 values('$name','$file_name' , '$price', '$description', '$id_artists','$type')";
 mysqli_query($connect, $sql);
 mysqli_close($connect);
 header('Location:index.php?success=Thêm Thành Công');
?>