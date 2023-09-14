<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title> Poster Banned</title>
    <!-- Link Swiper's CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
      <!--=============== REMIXICONS ===============-->
      <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <!--=============== CSS ===============-->
   
    <link rel="stylesheet" href="style.css">
    <!--=============== Favicon ===============-->
    <link rel="icon" type="image/x-icon" href="../Image/943731caf4844beda79cebbaf1df0a26.jpg">
    <!------------------ jqueryUi -------------------->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
    <script src="//code.jquery.com/jquery-1.10.2.js"></script>
    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
</head>
<body>
    <div class="container" style="width: 100%;"> 
      <img src="../Image/Nina_Header.jpg" alt="" class="img_background">
      <div class="topbar"> <p><a href="https://www.facebook.com/phanthethinh.official26/">  Demo Web By Phan The Thinh </a></p> </div>
      <?php include 'header.php' ?> 
      <?php include 'main.php' ?>
      <?php include 'footer.php' ?>
    </div>
  <script src="main.js"></script>
  <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script> -->
  <script>
    $(document).ready(function () {
      $(".btn-item-buy").click(function () {
        let id = $(this).data('id') ;
        $.ajax({
          type: "Post",
          url: "add_to_cart.php",
          data: {id},
          success: function (response) {
            alert('successfully added');
          }
        })
      });

      $( "#searching" ).autocomplete({
        minLength: 0,
      source: 'search.php',
      focus: function( event, ui ) {
        $( "#searching" ).val( ui.item.label );
        return false;
      },
      select: function( event, ui ) {
        $( "#searching" ).val( ui.item.label );
        $( "#project-id" ).val( ui.item.value );
        $( "#project-icon" ).attr( "src", "../Admin/Products/photo/" + ui.item.icon );
        $(".price-search").val(ui.item.price );
 
        return false;
      }
          }).autocomplete( "instance" )._renderItem = function( ul, item ) {
      return $( "<li>" )
        .append(`<div> 
          ${item.label} 
           <br>  
        <img src='../Admin/Products/photo/${item.photo}' height='200' z-index: '2000'>  
          <br>
          ${item.price}
          `)
        .appendTo( ul );
    };
    });
  </script>

</body>

</html>