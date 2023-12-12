<?php
require "koneksi.php";
require "session.php";
$queryKategori = mysqli_query($con, "SELECT * FROM kategori");

// get produk default
if(isset($_GET['keyword'])){
    $queryProduk = mysqli_query($con, "SELECT * FROM produk WHERE nama LIKE '%$_GET[keyword]%'");
}
// get produk dengan kategori
else if(isset($_GET['kategori'])){
    $queryToGetKategoriId = mysqli_query($con,"SELECT id FROM kategori WHERE nama = '$_GET[kategori]'" );
    $kategoriId = mysqli_fetch_array($queryToGetKategoriId);
    $queryProduk = mysqli_query($con,"SELECT * FROM produk WHERE kategori_id = '$kategoriId[id]'");
}
// get produk default
else{
    $queryProduk = mysqli_query($con, "SELECT * FROM produk");
}
$countdata = mysqli_num_rows($queryProduk);
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
                                    <i class="fs-5 fa fa-house"></i><span clas="fs-4 ms-3 d-none d-sm-inline">
                                        Home</span>
                                </a>
                            </li>
                            <li class="nav-item py-2 py-sm-0">
                                <a href="userProduk.php" class="nav-link text-dark">
                                    <i class="fs-5 fa-solid fa-box"></i><span clas="fs-4 ms-3 d-none d-sm-inline">
                                        Produk</span>
                                </a>
                            </li>
                            <li class="nav-item py-2 py-sm-0">
                                <a href="index.php" class="nav-link text-dark">
                                    <i class="fs-5 fa fa-gauge"></i><span clas="fs-4 ms-3 d-none d-sm-inline">
                                        Back to Index</span>
                                </a>
                            </li>

                            <!-- <div class="dropdown open p-3">
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


                            </div> -->
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
        <div class="container">
            <h1 class="text-white text-center">Daftar Produk <span class="text-success fw-bold">RentBike</span></h1>
        </div>
    </div>
    <!-- end banner -->
    <div class="container py-5">
        <div class="row">
            <div class="col-lg-3 mb-5">
                <h3>Kategori</h3>
                    <ul class="list-group">
                        <?php while($kategori = mysqli_fetch_array($queryKategori)){?>
                        <a class="decoration-none" href="userProduk.php?kategori=<?php echo $kategori['nama'];?>">
                        <li class="list-group-item"><?php echo $kategori['nama']; ?></li>
                        </a>
                        <?php }?>
                    </ul>
            </div>

            <div class="col-lg-9">
                <h3 class="text-center mb-3"><span class="text-success fw-bold">Produk</span></h3>
                <div class="row">
                    <?php
                        if($countdata < 1){
                            ?>
                                <h4 class="text-center text-danger my-5">Produk Tidak Tersedia</h4>
                            <?php
                        }
                    ?>
                    <?php while($produk = mysqli_fetch_array($queryProduk)){ ?>
                    <div class="col-md-4 mb-4 my-4 text-center">
                    <div class="card h-100">
                        <div class="image-box">
                        <img src="image/<?php echo $produk['foto']; ?>" class="card-img-top" alt="...">
                    </div>
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $produk['nama'];?></h5>
                            <p class="card-text text-truncat"><?php echo $produk['detail'];?></p>
                            <p class="card-text text-harga"><?php echo $produk['harga'];?></p>
                            <a href="userDetailProduk.php?nama=<?php echo $produk['nama'];?>" class="btn warna2 text-white">Lihat Detail</a>
                        </div>
                    </div>
                    </div>
                  <?php }?>  
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>
</html>