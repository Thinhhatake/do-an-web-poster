<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="../style.css" />
    <link rel="icon" type="image/x-icon" href="../../Image/943731caf4844beda79cebbaf1df0a26.jpg">
    <title> Admin Dashboard</title>
</head>

<body>
    <div class="d-flex" id="wrapper">
        <!-- Sidebar -->
            <?php include '../menu.php' ?>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4">
                <div class="d-flex align-items-center">
                    <i class="fas fa-align-left primary-text fs-4 me-3" id="menu-toggle"></i>
                    <h2 class="fs-2 m-0">Dashboard</h2>
                </div>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle second-text fw-bold" href="#" id="navbarDropdown"
                                role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-user me-2"></i>John Doe
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="#">Profile</a></li>
                                <li><a class="dropdown-item" href="#">Settings</a></li>
                                <li><a class="dropdown-item" href="#">Logout</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>

            <div class="container-fluid px-4">
                <div class="row g-3 my-2">
                    <div class="col-md-3">
                        <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                            <div>
                                <h3 class="fs-2">720</h3>
                                <p class="fs-5">Products</p>
                            </div>
                            <i class="fas fa-gift fs-1 primary-text border rounded-full secondary-bg p-3"></i>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                            <div>
                                <h3 class="fs-2">4920</h3>
                                <p class="fs-5">Sales</p>
                            </div>
                            <i
                                class="fas fa-hand-holding-usd fs-1 primary-text border rounded-full secondary-bg p-3"></i>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                            <div>
                                <h3 class="fs-2">3899</h3>
                                <p class="fs-5">Delivery</p>
                            </div>
                            <i class="fas fa-truck fs-1 primary-text border rounded-full secondary-bg p-3"></i>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                            <div>
                                <h3 class="fs-2">%25</h3>
                                <p class="fs-5">Increase</p>
                            </div>
                            <i class="fas fa-chart-line fs-1 primary-text border rounded-full secondary-bg p-3"></i>
                        </div>
                    </div>
                </div>

                <div class="row my-5">
                    <h3 class="fs-4 mb-3">Recent Orders</h3>
                    <div class="col">
                        <table class="table bg-white rounded shadow-sm  table-hover">
        <a href="form_insert.php"> <br> New Products </a>
        <?php 
        require '../connect.php';
        $sql = "SELECT products.* , artists.name as name_artists  FROM products join artists on products.id_artists = artists.id ";
        $result = mysqli_query($connect , $sql); 
        ?>
        <thead>
        <tr>
            <th>Mã</th>
            <th>Tên</th>
            <th>Photo</th>
            <th>Price</th>
            <th> Description</th>
            <th> Name Artists </th>
            <th> Type </th>
            <th>Chỉnh Sửa</th>
            <th>Xóa</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($result as $each) : ?>
            <tr>
                <td> <?php echo $each['id'] ?> </td>
                <td> <?php echo $each['name'] ?> </td>
                <td> <img src="photo/<?php echo $each['photo'] ?>"  style="
                height: 100px;" alt=""></td>
                <td> <?php  echo $each['price']  ?> $</td>
                <td> <?php echo $each['description'] ?> </td>
                <td> <?php echo $each['name_artists'] ?> </td>
                <td> <?php if($each['type'] == 0) { ?>
                     Frame   
                  <?php  } else { ?>
                    Poster
                 <?php }; ?>
                 </td>
                <td> 
                    <b>
                        <a href="form_update.php?id=<?php echo $each['id'] ?>">Sửa</a>
                    </b>    
                </td>
                <td><b>
                        <a href="process_delete.php?id=<?php echo $each['id'] ?>">Xóa</a>
                    </b></td>
            </tr>
            <?php endforeach; ?>
            </tbody>
    </table>
    </div>
                </div>
   </div>
</body>
</html>