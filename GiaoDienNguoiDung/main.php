<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="">
</head>
<body>
    <?php 
    require '../Admin/connect.php';
    $sql = "SELECT  * FROM artists ORDER BY RAND()
    LIMIT 1 ";
    $result = mysqli_query($connect, $sql);
    $each = mysqli_fetch_array($result);

    $sql2 = "SELECT * FROM products where type=0 ORDER BY RAND() 
    LIMIT 1" ;
    $result2 = mysqli_query($connect, $sql2);
    $each2 = mysqli_fetch_array($result2);

    $sql3 = "SELECT * FROM products where type=1 ORDER BY RAND() 
    LIMIT 1" ;
    $result3 = mysqli_query($connect, $sql3);
    $each3 = mysqli_fetch_array($result3);

    $sql4 = "SELECT * FROM products LIMIT 8";
    $result4 = mysqli_query($connect, $sql4);
    $each4 = mysqli_fetch_array($result4);

    ?>
    <main class="main" id="main2">
         <div class="main_introduce"> 
           <p class="s1"> Colourful New Arrivals </p> 
            <p class="s2"> Transform your space with artfully textured new prints </p> 
            <a href="#" class="button_buy" > SHOP NOW </a>
        </div>
         <div class="main_content">
            <div class="top_content">
                <div class="content_product"> 
                    <div class="img_product"> <a href="" class="a1"> <img  style="height: 100%; width: 100%; "src="../Admin/Products/photo/<?php echo $each2['photo'] ?>" alt=""> </a></div>
                        <div class="content2">
                            <h3 class="title">
                                <a href="" class="a2"> <?php echo $each2['name']?> </a>
                            </h3>
                                    <p class="description">
                                        Explore our new vibrant and colourful frames of high-quality solid wood with real glass handmade in Europe 
                                    </p>
                                    <span class="more"> <a href="" class="button_more"> SHOP NOW </a> </span> 
                        </div>
                    </div>
                <div class="content_artists">
                        <div class="img_artists"> <a href="" class="a1"> <img style="height: 100%; width: 100%;" src="../Admin/Artists/photo/<?php echo $each['photo'] ?>" alt="">  </a></div>
                            <div class="content2"> 
                                <h3 class="title">
                                    <a href="" class="a2"> <?php echo $each['name']?> </a>
                                </h3>
                                <p class="description"> Get to know the artist behind the art, her inspiration, motivation, and dreams </p>
                                <span class="more"> <a href="" class="button_more">MEET THE ARTISTS</a> </span>
                        </div>   
                </div>
                <br>
                <div class="content_product2">
                    <div class="img_product"> <a href="" class="a1"> <img  style="height: 100%; width: 100%; "src="../Admin/Products/photo/<?php echo $each3['photo'] ?>" alt=""> </a></div>
                        <div class="content2">
                            <h3 class="title">
                                <a href="" class="a2"> <?php echo $each3['name']?> </a>
                            </h3>
                                <p class="description">
                                Brighten up your space with our selection of botanic art prints in the colours of spring
                                </p>
                                <span class="more"> <a href="" class="button_more">EXPLORE</a> </span> 
                        </div>
                </div>
            </div> 
           
            <div class="main_product">
                <div class="text-product">
                    <a href="">
                    <h1 class="text-product-title">
                    Art Wall Designer
                    </h1>   
                    <p class="text-product-description">
                    With our new visualization tool, you can experiment endlessly <br> with colours, 
                     sizes and layouts until you have designed the art wall of your dreams 
                     </p> 
                    <span class="text-product-btn">Try Now</span> 
                    </a>
                </div>
            </div>
            <div class="main_content_2">
                <?php foreach($result4 as $each4): ?>
                <div class="cart">
                    <a href="#" class=" cart-product-img">
                        <img src="../Admin/Products/photo/<?php echo $each4['photo'] ?>" alt="">
                            <div class="content-cart">
                                    <p class="title"><?php echo $each4['name'] ?></p>
                                    <span class="price"><?php echo $each4['price'] ?> $</span>
                                    <i class="ri-heart-line"></i> <br>
                                    <button data-id="<?php echo $each4['id'] ?>" 
                                     class="btn-item-buy" >Buy Now </button>
                                </div>
                     </a>
                </div>
                <?php endforeach?>

         </div>
      </main>  
</body>
</html>