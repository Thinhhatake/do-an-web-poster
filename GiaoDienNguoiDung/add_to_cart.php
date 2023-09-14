<?php 
session_start();
if(isset($_POST['id'])){
    $id = $_POST['id'];
    if(empty($_SESSION['cart'][$id])) {
    require '../Admin/connect.php';
    $sql = "SELECT * FROM products WHERE id = '$id'";
    $result = mysqli_query($connect, $sql);
    $each = mysqli_fetch_array($result);
    $_SESSION['cart'][$id]['name']= $each['name'];
    $_SESSION['cart'][$id]['photo']= $each['photo'];
    $_SESSION['cart'][$id]['price']= $each['price'];
    $_SESSION['cart'][$id]['quantity'] = 1;
    } else {
    $_SESSION['cart'][$id]['quantity']++ ; 
    
    }
} else {

}


?>