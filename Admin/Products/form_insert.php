<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
        include '../menu.php' ;
         require '../connect.php';
         $sql = "SELECT * FROM artists" ;
         $result = mysqli_query($connect, $sql);
         $each = mysqli_fetch_array($result);
     ?>
    <form action="process_insert.php" method="post" enctype="multipart/form-data">
        <p>Name Products</p> <input type="text" name="name">
        <p>Photo Products</p> <input type="file" name="photo">
        <p>Price Products</p> <input type="number" name="price">
        <p>Description Products</p> <input type="text" name="description">
        <p> Artists</p>  
        <select name="id_artists" >
            <?php foreach($result as $each ): ?>
                    <option value="<?php echo $each['id'] ?> ">
                        <?php echo $each['name'] ?>
                    </option>
            <?php endforeach; ?>
        </select>
        <p> Type (0 is Frame and 1 is is the Poster) </p> 
        <select name="type" >
            <option value="0"> Frame </option>
            <option value="1"> Poster</option>
        </select>
         <br>
        <button> New </button>
    </form>
</body>
</html>