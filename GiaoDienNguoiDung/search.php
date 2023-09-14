<?php
 $search = $_GET['term'];
 require '../Admin/connect.php'; 
 $sql = "select * from products where name like '%$search%'";
 $result = mysqli_query($connect ,$sql);
 $arr =  [];
 foreach($result as $each) {
    $arr[] = [
        'label' => $each['name'],
        'value' => $each['id'],
        'photo' => $each['photo'],
        'price' => $each['price']

    ] ;
 }
  echo json_encode($arr);
 ?>