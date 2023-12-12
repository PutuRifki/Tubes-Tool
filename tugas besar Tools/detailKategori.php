<?php
require "session.php";
require "koneksi.php";

$queryKategori = mysqli_query($con, "SELECT * FROM kategori");
$jumlahKategori = mysqli_num_rows($queryKategori);
$data = mysqli_fetch_array($queryKategori);
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
                    <h5 class="offcanvas-title text-success fs-2 fw-bold" id="offcanvasDarkNavbarLabel">RentBike</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas"
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
                                        Kategori</span>
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
                <li class="breadcrumb-item active" aria-current="page">
                    <a href="kategori.php" style="text-decoration : none;color : none;"><i
                            class="fa-solid fa-layer-group text-mutes"></i> Home</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page"><i class="fa-solid fa-layer-group"></i> 
                Detail Kategori
                </li>
            </ol>
        </nav>

        <div class="my-5 col-12 col-md-6 mt-6">
            <h3>Tambah Kategori</h3>
            <form action="" method="post">
                <div>
                    <label for="kategori">Nama kategori</label>
                    <input type="text" id="kategori" name="kategori" placeholder="nama kategori" class="form-control">
                </div>
                <div>
                    <button class="btn btn-primary mt-2" type="submit" name="simpan_kategori">Save</button>
                </div>
            </form>
            <?php
            if (isset($_POST['simpan_kategori'])) {
                $kategori = htmlspecialchars($_POST['kategori']);
                $queryExist = mysqli_query($con, "SELECT nama FROM kategori WHERE nama = '$kategori'");
                $jumlahKategoriBaru = mysqli_num_rows($queryExist);

                if ($jumlahKategoriBaru > 0) {
                    ?>
                    <div class="alert alert-danger mt-3" role="alert">
                        Kategori sudah ada
                    </div>
                    <?php
                } else {
                    $querySimpan = mysqli_query($con, "INSERT INTO kategori (nama) VALUES ('$kategori')");
                    if ($querySimpan) {
                        ?>
                        <div class="alert alert-primary mt-3" role="alert">
                            Kategori berhasil disimpan
                        </div>
                        <meta http-equiv="refresh" content="0;url=detailKategori.php" />
                        <?php
                    }
                }
            }
            ?>
        </div>


        <div class="mt-5">
            <h2>List Kategori Sepeda Motor</h2>
            <div class="table-responsive mt-6">
                <table class="table">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if ($jumlahKategori == 0) {
                            ?>
                            <tr>
                                <td colspan=4 class="text-center">
                                    Data kategori tidak tersedia
                                </td>
                            </tr>
                            <?php
                        } else {
                            $jumlah = 1;
                            while ($data = mysqli_fetch_array($queryKategori)) {
                                ?>
                                <tr>
                                    <td>
                                        <?php echo $jumlah; ?>
                                    </td>
                                    <td>
                                        <?php echo $data['nama']; ?>
                                    </td>
                                    <td>
                                        <a href="produk.php?p=<?php echo $data['id'];?>"
                                        class="btn btn-info"><i class="fas fa-search"></i></a>
                                    </td>
                                </tr>
                                <?php
                                $jumlah++;
                            }
                        }
                        ?>

                    </tbody>
                </table>
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

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
            crossorigin="anonymous"></script>
</body>

</html>