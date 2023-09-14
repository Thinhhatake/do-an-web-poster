
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" href="../Image/943731caf4844beda79cebbaf1df0a26.jpg" type="image/x-icon">
     <!--=============== REMIXICONS ===============-->
     <link href="https://cdn.jsdelivr.net/npm/remixicon@2.2.0/fonts/remixicon.css" rel="stylesheet">

     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    
</head>
<body>
    <div class="cart_product" > 
      <div class="topbar"> <p><a href="https://www.facebook.com/phanthethinh.official26/">  Demo Web By Phan The Thinh </a></p> </div>
        <?php include 'header2.php' ?>
        <?php include 'checkout.php' ?>
        <div class="cart-area">
            <table>
                <tr class="shoping-title">
                    <th class="remove-products"><a href=""> CLEAR BAG</a> </span></th>
                    <th>Product</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Tolal</th>
                 </tr>
                 <?php
  session_start();
  if(isset($_SESSION['cart'])) {
    $cart = $_SESSION['cart'];
    $sum = 0;
    $ship = 75.00;
    ?>
   
                 <?php foreach($cart as $id => $each):  ?>
                <tr class="shoping-products"> 
                    <td class="remove-products-x"> 
                        <button  class="btn-delete-product"
                                data-id="<?php echo $id ?>"> 
                                <i class="ri-delete-bin-5-line"></i>
                        </button>
                    </td>
                    <td class="products-photo"> <img style="height: 200px;" src="../Admin/products/photo/<?php echo $each['photo']?>" alt=""> </td>
                    <td class="products-price"> 
                        <span  class="cart-name"> <?php echo $each['name'] ?></span> <br> <br> <br>
                        <span class="cart-price"> <?php echo $each['price'] ?> </span> <span class="tail">.00$</span> 
                       </td>
                    <td class="products-quantity">
                        <button data-id="<?php echo $id ?>"
                            class="btn-update-quantity" 
                            data-type="0"><i class="ri-subtract-line"></i></button>
                         <span
                            class="cart-quantity"> 
                            <?php echo $each['quantity'] ?> 
                        </span>
                        <button data-id="<?php echo $id ?>"
                            class="btn-update-quantity"
                            data-type="1"> <i class="ri-add-line"></i> </button>
                        </td>
                    <td class="products-total">
                        <span class="span-products-total" >
                        <?php  $result =  $each['price']*$each['quantity'];
                                 $sum += $result;
                                 echo $result; ?>.00$
                        </span> 
                    </td>
                </tr>
                <?php endforeach ?>    
            </table>
        </div>
        <div class="area-order">
                <Span class="span-oder-total">  ORDER TOTAL</Span> 
                <Span class="total-price"> <?php echo $sum ?>.00$</Span>
                <button type="button" class="btn-checkout" data-toggle="modal"  data-target="#modal-main"> PROCESS TO CHECK OUT </button>
                
                <span> SHIPPING</span>
                <span></span>
                <span>DHL EXPRESS:</span>
                <span class="money_ship"> <?php echo $ship ?> </span>
                <span> TOTAL</span>
                <span class="totalShip"> <?php echo $sum + $ship  ?>  </span>
                
        </div>
        <?php
  } else { ?>
        <tr > <td  style="text-align: center; padding: 1rem;"> <p class="empty-cart-text" style="color: gray;"> Cart is Empty.... </p> </td> </tr>
    </table>
   <?php }
?>
    </div>
    <?php include 'footer.php' ?>
    <script src="main.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script>
        $(document).ready(function () {
            $(".btn-update-quantity").click(function() {
                let btn = $(this);
                let id = btn.data("id");
                let type = btn.data("type");
                $.ajax({
                    type: "GET",
                    url: "update_quantity.php",
                    data: {id , type},
                    success: function (response) {
                        let parent_tr = btn.parents('tr');
                        let price = parent_tr.find('.cart-price').text();
                        let quantity = parent_tr.find('.cart-quantity').text();
                        if(type == 1 ) {
                            quantity++;
                        } else {
                            quantity--;
                        } if (quantity == 0) {
                            parent_tr.remove();
                        } else {
                            parent_tr.find('.cart-quantity').text(quantity);
                            let sum = price * quantity;
                            parent_tr.find('.span-products-total').text(sum + '.00$');
                            getTotal(); 
                        } 
                    }
                });
            });
            $(".btn-delete-product").click(function(){
                let btn = $(this);
                let id = btn.data("id");
                $.ajax({
                    type: "GET",
                    url: "delete_cart.php",
                    data: {id},
                    success: function (response) {
                        btn.parents('tr').remove();
                        getTotal();
                    }
                });
            });
            $(".btn-checkout").click(function(event) {
                // $("#modal-main").modal("show");
                $("#modal-main").css("z-index", "1500");

            });
               
        });
        function getTotal() {
            let total = 0;
            let ship = parseFloat($(".money_ship").text()); 
            $(".span-products-total").each(function() {
                total += parseFloat($(this).text());
            }) ;
            $(".total-price").text(total + '.00$');
             totalShip += total;
             $(".totalShip").text(totalShip+ '.00$');
        }     

    </script>
</body>
</html>