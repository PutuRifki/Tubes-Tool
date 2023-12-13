<?php
    require "koneksi.php";
    require "session.php";

    $queryProduk = mysqli_query($con, "SELECT id, nama, harga, foto, detail FROM produk LIMIT 6");
    $queryKategori = mysqli_query($con, "SELECT * FROM kategori");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Produk</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="styleUser.css">
</head>

<body>
    <nav class="navbar navbar-white stickSy-fixed">
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
                                <a href="user.php" class="nav-link text-dark">
                                    <i class="fs-5 fa fa-house"></i><span class="fs-4 ms-3 d-none d-sm-inline">
                                        Home</span>
                                </a>
                            </li>
                            <li class="nav-item py-2 py-sm-0">
                                <a href="userProduk.php" class="nav-link text-dark">
                                    <i class="fs-5 fa fa-gauge"></i><span class="fs-4 ms-3 d-none d-sm-inline">
                                        Produk</span>
                                </a>
                            </li>
                            <li class="nav-item py-2 py-sm-0">
                                <a href="index.php" class="nav-link text-dark">
                                    <i class="fs-5 fa fa-gauge"></i><span class="fs-4 ms-3 d-none d-sm-inline">
                                        Back to Index</span>
                                </a>
                            </li>
                            


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
                                    <button class="dropdown-item" href="#"><i class="fa-solid fa-user"></i>
                                        Profile</button>
                                    <a class="dropdown-item" href="logout.php"><i class="fa-solid fa-door-open"></i>
                                        Logout</a>
                                </div>
                            </div>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <!-- banner -->
    <div class="container-fluid banner d-flex align-items-center">
        <div class="container text-center text-white">
            <h1><span class="text-success fw-bold">RentBike</span> Sewa Motor Terpercaya</h1>
            <h3>Mau cari apa??</h3>

            <div class="col-md-8 offset-md-2">
                <form method="get" action="userProduk.php">
                    <div class="input-group input-group-lg my-4">
                        <input type="text" class="form-control" placeholder="Nama Produk"
                            aria-label="Recipient's username" aria-describedby="basic-addon2" name="keyword">
                        <button type="submit" class="btn warna3 text-white">Telusuri</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- end banner -->

    <!-- highlight kategori -->
    <div class="container-fluid py-5">
        <div class="container text-center">
            <h3 class="text-danger fw-bold">☀️BIKE KATEGORI☀️</h3>

            <div class="row mt-4">
                <div class="col-md-4 mb-3">
                    <div
                        class="highlighted-kategori kategori-bike-classic d-flex justify-content-center align-items-center">
                        <div class="text-white">
                            <h4 class="text-white">
                                <a class="decoration-none" href="userProduk.php?kategori=Bike Electric">Electric
                                    Bike</a>
                            </h4>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-3">
                    <div
                        class="highlighted-kategori kategori-bike-touring d-flex justify-content-center align-items-center">
                        <h4 class="text-white">
                            <a class="decoration-none" href="userProduk.php?kategori=Classic Bike">Classic Bike</a>
                        </h4>
                    </div>
                </div>
                <div class="col-md-4 mb-3">
                    <div
                        class="highlighted-kategori kategori-bike-motocross d-flex justify-content-center align-items-center">
                        <h4 class="text-white">
                            <a class="decoration-none" href="userProduk.php?kategori=Touring Bike">Touring Bike</a>
                        </h4>
                    </div>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-md-4 mb-3">
                    <div
                        class="highlighted-kategori kategori-bike-electric d-flex justify-content-center align-items-center">
                        <h4 class="text-white">
                            <a class="decoration-none" href="userProduk.php?kategori=Motocross Bike">Motocross Bike</a>
                        </h4>
                    </div>
                </div>
                <div class="col-md-4 mb-3">
                    <div
                        class="highlighted-kategori kategori-bike-matic d-flex justify-content-center align-items-center">
                        <h4 class="text-white">
                            <a class="decoration-none" href="userProduk.php?kategori=Matic Bike">Matic Bike</a>
                        </h4>
                    </div>
                </div>
                <div class="col-md-4 mb-3">
                    <div
                        class="highlighted-kategori kategori-bike-custom d-flex justify-content-center align-items-center">
                        <h4 class="text-white">
                            <a class="decoration-none" href="userProduk.php?kategori=Custom Bike">Custom Bike</a>
                        </h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end highlight -->
    <!-- start about -->
    <div class="container-fluid warna1 py-5">
        <div class="container text-center text-light">
            <h3>🎉🎉Tentang Kami🎉🎉</h3>
            <p class="fs-5 mt-3">
            Selamat datang di <span class="fw-bold text-success">RentalBike</span>, destinasi terbaik untuk pengalaman rental sepeda motor yang tak terlupakan! Kami menyediakan sepeda motor terkini dengan berbagai opsi model dan merk untuk memenuhi segala kebutuhan perjalanan Anda. Dengan pelayanan pelanggan prima, proses sewa yang mudah, harga terjangkau, dan komitmen terhadap keamanan serta perawatan berkualitas, <span class="text-success fw-bold">RentBike</span> menjadi mitra perjalanan yang dapat diandalkan. Nikmati kebebasan berkendara tanpa batas dengan armada sepeda motor kami yang selalu siap mengantar Anda menuju setiap petualangan. Hubungi kami sekarang dan mulailah perjalanan Anda bersama <span class="text-success fw-bold">RentBike</span>!
            </p>
        </div>
    </div>

    <!-- end about -->
    <!-- produk -->
    <div class="container-fluid py-5">
        <div class="container text-center">
            <h3>Produk</h3>
            <div class="row mt-5">
                <?php while($data = mysqli_fetch_array($queryProduk)){ ?>
                <div class="col-sm-6 col-md-4 mb-3">
                    <div class="card h-100">
                        <div class="image-box">
                        <img src="imginput/<?php echo $data['foto'];?>" class="card-img-top" alt="...">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title"><?php $data['nama']?></h5>
                            <p class="card-text text-truncat"><?php echo $data['detail'];?></p>
                                <p class="card-text text-harga">Rp.<?php echo $data['harga'];?></p>
                            <a href="userProduk.php?nama=<?php echo $data['nama'];?>" class="btn warna2 text-white">Lihat Detail</a>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>
            <button class="btn btn-outline-primary mt-3 p-3 fs-5 decoration-none"><a style="text-decoration: none;" href="userProduk.php">See More</a></button>
        </div>
    </div>
    <!-- end produk -->
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
                        Teknologi Informasi<br /><br />
                        <abbr title="Telephone">Telepon: </abbr><a href="tel:+86881038644485">0881038644485</a><br />
                        <abbr title="Mail">Mail: </abbr><a href="mailto:puturifki56@gmail.com">puturifki56@gmail.com</a>
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

        </div>
        </div>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>

</html>