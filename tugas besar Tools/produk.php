<?php
require "session.php";
require "koneksi.php";

// $id = $_GET['p'];

$queryProduk = mysqli_query($con, "SELECT a.*, b.nama AS nama_kategori FROM produk a JOIN kategori b ON a.kategori_id = b.id");
$queryJumlahProduk = mysqli_num_rows($queryProduk);

$queryKategori = mysqli_query($con, "SELECT * FROM kategori");
$dataKategori = mysqli_fetch_array($queryKategori);

function generateRandomString($length = 10)
{
    $character = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMMNOPQRSTUVWXYZ';
    $characterLength = strlen($character);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $character[rand(0, $characterLength - 1)];
    }
    return $randomString;
}
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

        form div {
            margin-bottom: 10px;
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
                                <button class="dropdown-item" href="#"><a style="text-decoration:none; color:black;" href="tabelTranksaksi.php">Tranksaksi</a></button>
                                <!-- <button class="dropdown-item" href="#">Detail Tranksaksi</button>
                                <button class="dropdown-item" href="#">Pengembalian</button> -->
                                <button class="dropdown-item" href="#"><a style="text-decoration:none; color:black;" href="TabelKaryawan.php">Karyawan</a></button>
                                <button class="dropdown-item" href="#"><a style="text-decoration:none; color:black;" href="tabelUser.php">User</a></button>
                                <button class="dropdown-item" href="#"><a style="text-decoration:none; color:black;" href="produk.php">Produk</a></button>

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
                    <a href="index.php" style="text-decoration : none;color : grey;"><i
                            class="fa-solid fa-layer-group text-mutes"></i> Home</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                    <a href="detailKategori.php" style="text-decoration : none;color : grey;"><i
                            class="fa-solid fa-layer-group text-mutes"></i> Detail Kategori</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                    <a href="produk.php" style="text-decoration : none;color : grey;"><i
                            class="fa-solid fa-layer-group text-mutes"></i> Produk</a>
                </li>
            </ol>
        </nav>

        <div class="col-12 col-md-6 mt-5">
            <h2>Tambah produk</h2>
            <form action="" method="post" enctype="multipart/form-data">
                <div>
                    <label for="produk">Nama</label>
                    <input type="text" name="produk" id="produk" class="form-control" required />
                </div>
                <div>
                    <label for="kategori">Kategori</label>
                    <select name="kategori" id="kategori" class="form-control">
                        <option value="">Pilih Satu</option>
                        <?php
                        while ($dataKategori = mysqli_fetch_array($queryKategori)) {
                            ?>
                            <option value="<?php echo $dataKategori['id']; ?>">
                                <?php echo $dataKategori['nama']; ?>
                            </option>
                            <?php
                        }
                        ?>
                    </select>
                </div>

                <div>
                    <label for="harga">Harga</label>
                    <input type="number" name="harga" id="harga" class="form-control" required value="<?php echo $data ?>"/>
                </div>

                <div>
                    <label for="foto">Masukan Gambar</label>
                    <input type="file" name="foto" id="foto" class="form-control">
                </div>

                <div>
                    <label for="detail"></label>
                    <textarea name="detail" id="detail" cols="30" rows="10" class="form-control"></textarea>
                </div>

                <div>
                    <label for="ketersediaanStok">Ketersediaan Stok</label>
                    <select name="ketersediaanStok" id="ketersediaanStok" class="form-control">
                        <option value="tersedia">tersedia</option>
                        <option value="habis">habis</option>
                    </select>
                </div>

                <div class="mt-3 d-flex justify-content-between">
                    <button type="submit" class="btn btn-primary" name="editBttn">Simpan</button>
                </div>
            </form>
            <?php
            if (isset($_POST['editBttn'])) {
                $namaProduk = htmlspecialchars($_POST['produk']);
                $kategori = htmlspecialchars($_POST['kategori']);
                $harga = htmlspecialchars($_POST['harga']);
                $detail = htmlspecialchars($_POST['detail']);
                $ketersediaan = htmlspecialchars($_POST['ketersediaanStok']);

                $target_dir = "imginput/";
                $nama_file = basename($_FILES["foto"]["name"]);
                $target_file = $target_dir . $nama_file;
                $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
                $image_size = $_FILES["foto"]["size"];
                $random_name = generateRandomString(20);
                $new_name = $random_name . "." . $imageFileType;

                if ($namaProduk == '' || $kategori == '' || $harga == '') {
                    ?>
                    <div class="alert alert-warning mt-3" role="alert">
                        nama, kategori, dan harga wajib diisi.
                    </div>
                    <?php
                } else {
                    if ($nama_file != '') {
                        if ($image_size > 300000) {
                            ?>
                            <div class="alert alert-warning mt-3">
                                File tidak boleh lebih dari 300 kb
                            </div>
                            <?php
                        } else {
                            if ($imageFileType != 'jpg' && $imageFileType != 'png' && $imageFileType != 'gif') {
                                ?>
                                <div class="alert alert-warning mt-3" role="alert">
                                    File wajib bertipe jpg, png atau gif.
                                </div>
                                <?php
                            } else {
                                move_uploaded_file($_FILES["foto"]["tmp_name"], $target_dir . $new_name);
                            }
                        }
                    }
                    // query insert to produk
                    $queryGambar = mysqli_query($con, "INSERT INTO produk (kategori_id, nama, harga, foto, detail, ketersediaan_stok) VALUES ('$kategori', '$namaProduk', '$harga', '$new_name', '$detail', '$ketersediaan')");
                    if ($queryGambar) {
                        ?>
                        <div class="alert alert-primary mt-3" role="alert">
                            produk berhasil disimpan
                        </div>
                        <meta http-equiv="refresh" content="0;url=produk.php"> </meta>
                        <?php
                    } else {
                        echo mysqli_error($con);
                    }
                }
            }
            ?>
        </div>
        <div class="mt-5 mb-5">
            <h2>List Produk</h2>
            <div class="table-responsive mt-5">
                <table class="table">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama</th>
                            <th>Kategori</th>
                            <th>Harga</th>
                            <th>Ketersediaan Stok</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if ($queryJumlahProduk == 0) {
                            ?>
                            <tr>
                                <td colspan=12 class="text-center">
                                    Data produk tidak tersedia
                                </td>
                            </tr>
                            <?php
                        } else {
                            $jumlah = 1;
                            while ($data = mysqli_fetch_array($queryProduk)) {
                                ?>
                                <tr>
                                    <td>
                                        <?php echo $jumlah; ?>
                                    </td>
                                    <td>
                                        <?php echo $data['nama']; ?>
                                    </td>
                                    <td>
                                        <?php echo $data['nama_kategori']; ?>
                                    </td>
                                    <td>
                                        <?php echo $data['harga']; ?>
                                    </td>
                                    <td>
                                        <?php echo $data['ketersediaan_stok']; ?>
                                    </td>
                                    <td>
                                        <a href="produk-detail.php?p=<?php echo $data['id'];?>"
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