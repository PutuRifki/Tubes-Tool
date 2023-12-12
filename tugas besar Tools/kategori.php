<?php
require "session.php";
require "koneksi.php";

$queryKategori = mysqli_query($con, "SELECT * FROM kategori");
$jumlahKategori = mysqli_num_rows($queryKategori);

$queryBarang = mysqli_query($con, "SELECT * FROM produk");
$jumlahBarang = mysqli_num_rows($queryBarang);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kategori - page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        .kotak {
            border: solid;
        }

        .summary-kategori {
            background-color: darkslategray;
            border-radius: 15px;
        }

        .summary-produk {
            background-color: #2596be;
            border-radius: 15px;
        }

        .no-decoration {
            text-decoration: none;
        }
        
    </style>
</head>

<body>
    <nav class="navbar navbar-white bg-light stickSy-fixed">
        <div class="container-fluid">
            <a class="navbar-brand fs-1 text-success fw-bold" href="#">RentBike</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas"
                data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="offcanvas offcanvas-end text-bg-white" tabindex="-1" id="offcanvasDarkNavbar"
                aria-labelledby="offcanvasDarkNavbarLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title text-success fw-bold" id="offcanvasDarkNavbarLabel">RentBike</h5>
                    <button type="button" class="btn-close btn-close-dark" data-bs-dismiss="offcanvas"
                        aria-label="Close"></button>
                </div>
                <div class="bg-white col-auto col-md-4 col-lg-3 min-vh-100 d-flex flex-column justify-content-between">
                    <div class="bg-white p-2">
                        <ul class="nav nav-pills flex-column mt-4">
                            <li class="nav-item py-2 py-sm-0">
                                <a href="index.php" class="nav-link text-dark">
                                    <i class="fs-5 fa fa-house"></i><span clas="fs-4 ms-3 d-none d-sm-inline">
                                        Home</span>
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

                            <div class="dropdown open p-3">
                                <button class="btn border-none dropdown-toggle text-dark" type="button" id="trigger"
                                    data-bs-toggle="dropdown" aria-expanded="false">
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
                        <button class="btn border-none dropdown-toggle text-dark" type="button" id="trigger"
                            data-bs-toggle="dropdown" aria-expanded="false">
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
    </nav>
    <div class="container mt-5">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
            <a href="kategori.php" style="text-decoration : none;color : none;" ><i class="fa-solid fa-layer-group"></i> Home</a>
            </ol>
        </nav>
        <h2>Hallo
            <?php echo $_SESSION['username']; ?>
        </h2>
        <div class="container mt-5">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-12 mb-3">
                    <div class="summary-kategori p-4">
                        <div class="row">
                            <div class="col-6">
                                <i class="fa-solid fa-bars fa-7x text-black-50"></i>
                            </div>
                            <div class="col-6 text-white">
                                <h3 class="fs-2">Kategori</h3>
                                <p class="fs-4"><?php echo $jumlahKategori ?> Kategori</p>
                                <p><a href="detailKategori.php" class="text-white no-decoration">Lihat Detail</a></p>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-lg-6 col-md-6 col-12">
                    <div class="summary-produk p-4">
                        <div class="row">
                            <div class="col-6">
                                <i class="fa-solid fa-box fa-7x text-black-50"></i>
                            </div>
                            <div class="col-6 text-white">
                                <h3 class="fs-2">Produk</h3>
                                <p class="fs-4"><?php echo $jumlahBarang ?> Produk</p>
                                <p><a href="produk.php?p=" class="text-white no-decoration">Lihat Detail</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer class="bg-dark text-light mt-5">
      <div class="container py-3 py-sm-5">
        <div class="row justify-content-center">

          <div class="col-12 col-sm-6 col-md-3">
            <h6>Follow us</h6>
            <ul class="list-unstyled">
              <li><a href="#">Facebook</a></li>
              <li><a href="#">Twitter</a></li>
              <li><a href="#">Instagram</a></li>
              <li><a href="#">LinkedIn</a></li>
              <li><a href="#">YouTube</a></li>
            </ul>
          </div>

          <div class="col-12 col-sm-6 col-md-3">
            <address>
              <strong>Universitas Udayana</strong><br />
              Fakultas Teknik<br />
              Teknologi Informasi<br/><br/>
              <abbr title="Telephone">Telepon: </abbr
              ><a href="tel:+86881038644485">0881038644485</a><br />
              <abbr title="Mail">Mail: </abbr
              ><a href="mailto:puturifki56@gmail.com">puturifki56@gmail.com</a>
            </address>
          </div>

          
            <div class="col-12 col-sm-6 col-md-3">
              <ul class="list-inline">
                <li class="list-inline-item">&copy; 2023 web Tubes tools</li>
                <li class="list-inline-item">All rights reserved.</li>
                <li class="list-inline-item">
                  <a class="" href="#">Terms of use and privacy policy</a>
                </li>
              </ul>
            </div>
          </div>
        </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>

</html>