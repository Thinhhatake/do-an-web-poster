<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php include '../menu.php' ?>
    <form action="process_insert.php" method="post" enctype="multipart/form-data">
        <p>Name Artists</p> <input type="text" name="name">
        <p>Photo Artists</p> <input type="file" name="photo">
        <p>Description Artists</p> <input type="text" name="description">
        <p>Email</p> <input type="text" name="email">
        <p>Phone Artists</p> <input type="text" name="phone">
        <button> New </button>
    </form>
</body>
</html>