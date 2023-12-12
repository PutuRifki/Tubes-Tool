<?php 
require "session.php";
?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home-page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style.css" >
  </head>
  <style>
    .nav-pills li a:hover{
    background-color: green;
    }
  </style>
  <body>
  <div class="container-fluid">
        <div class="row flex-nowrap">
            <div class="bg-light col-auto col-md-4 col-lg-3 min-vh-100 d-flex flex-column justify-content-between">
                <div class="bg-light p-2">
                    <a class="d-flex text-decoration-none mt-1 align-items-center text-dark">
                        <span class="d-sm-inline text-success fs-1 fw-bold">RentBike</span>
                    </a>
                    <ul class="nav nav-pills flex-column mt-4">
                        <li class="nav-item py-2 py-sm-0">
                            <a href="#" class="nav-link text-dark">
                                <i class="fs-5 fa fa-house"></i><span clas="fs-4 ms-3 d-none d-sm-inline"> Home</span>
                            </a>
                        </li>
                        <li class="nav-item py-2 py-sm-0">
                            <a href="dashboard.php" class="nav-link text-dark">
                                <i class="fs-5 fa fa-gauge"></i><span clas="fs-4 ms-3 d-none d-sm-inline">
                                    Dashboard</span>
                            </a>
                        </li>
                        <li class="nav-item py-2 py-sm-0">
                            <a href="kategori.php" class="nav-link text-dark">
                                <i class="fs-5 fa fa-box"></i><span clas="fs-4 ms-3 d-none d-sm-inline">
                                    Kategori Barang</span>
                            </a>
                        </li>
                        <li class="nav-item py-2 py-sm-0">
                            <a href="produk.php" class="nav-link text-dark">
                                <i class="fs-5 fa fa-boxes-stacked"></i><span clas="fs-4 ms-3 d-none d-sm-inline">
                                    Tabel Produk</span>
                            </a>
                        </li>
                        <li class="nav-item py-2 py-sm-0">
                            <a href="user.php" class="nav-link text-dark">
                                <i class="fs-5 fa-solid fa-bag-shopping"></i><span clas="fs-4 ms-3 d-none d-sm-inline">
                                    User</span>
                            </a>
                        </li>

                        <div class="dropdown open p-3">
                            <button class="btn border-none dropdown-toggle text-dark" type="button" id="trigger" data-bs-toggle="dropdown">
                                <i class="fa fa-user"></i><span class="ms-2"> tables</span>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="trigger">
                                <button class="dropdown-item" href="#">Tranksaksi</button>
                                <button class="dropdown-item" href="#">Detail Tranksaksi</button>
                                <button class="dropdown-item" href="#">Pengembalian</button>
                                <button class="dropdown-item" href="#">Users</button>
                                <button class="dropdown-item" href="#">Barang</button>
                            </div>
                            
                            
                        </div>
                    </ul>
                </div>
                <div class="dropdown open p-3">
                    <button class="btn border-none dropdown-toggle text-dark" type="button" id="trigger" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fa fa-user"></i><span class="ms-2">
                            <?php 
                             echo ($_SESSION['username']);
                            ?>
                        </span>
                    </button>
                    <div class="dropdown-menu" aria-labelledby="userTrigger">
                        <button class="dropdown-item" href="#"><i class="fa-solid fa-user"></i> Profile</button>
                        <a class="dropdown-item" href="logout.php"><i class="fa-solid fa-door-open"></i> Logout</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- NAVBAR END -->

    
    

    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>
