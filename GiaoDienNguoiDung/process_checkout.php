<?php 
$name  = $_POST['name_receiver'];
$address = $_POST['address_receiver'];
$phone = $_POST['phone_receiver'];

require '../Admin/connect.php'; 
session_start();
$cart =  $_SESSION['cart'];
$total_price = 0;
foreach ($cart as $each) {
    $total_price += $each['quantity'] *  $each['price'];
}
$status = 0;

$sql1 = "insert into orders( name_receive  ,phone_receive ,  Address_receive ,  status  , 
  total_price )
    values ( '$name', '$phone' , ' $address' , '$status',  
    '$total_price')";
    mysqli_query($connect, $sql1);
    $sql = "select max(id) from orders where name_receive = '$name'";
    $result = mysqli_query($connect, $sql);
    $order_id = mysqli_fetch_array($result)['max(id)']; 
    foreach($cart as $product_id => $each) {
        $quantity = $each['quantity'];
        $sql = "insert into order_products (order_id, products_id, quatify) values('$order_id', '$product_id', '$quantity')"; 
        mysqli_query($connect , $sql);
    }
    mysqli_close($connect);
    unset($_SESSION['cart']);

    header('location:index.php');  
?>