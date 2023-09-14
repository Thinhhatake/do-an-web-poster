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
        include '../menu.php';
        require '../connect.php';
        $id = $_GET['id'];
        $sql = "SELECT * FROM artists where id = '$id'";
        $result = mysqli_query($connect, $sql);
        $each = mysqli_fetch_array($result);
    ?>
     <form action="process_update.php" method="post" enctype="multipart/form-data">
         <input type="hidden" name="id" value=" <?php echo $id ?>" >
        <p>Name Artists</p> <input type="text" name="name" value="<?php echo $each['name'] ?>">
        <br>
        Change new photo 
        <p>Photo Artists</p> <input type="file" name="photo_new" >  
        <br> or keep old photo 
        <img src="photo/<?php echo $each['photo'] ?>"  style="height: 100px;"> <br>
        <input type="hidden" name="photo_old" value="<?php echo $each['photo'] ?>">
        <p>Description Artists</p> <input type="text" name="description" value=" <?php echo $each['description'] ?>">
        <p>Email</p> <input type="text" name="email" value="<?php echo $each['email']  ?>">
        <p>Phone Artists</p> <input type="text" name="phone" value="<?php echo $each['phone']  ?>">
        <button> Updating </button>
    </form>

</body>
</html>