<?php
require "session.php";
require "koneksi.php";

$id = $_GET['p'];

$queryProduk = mysqli_query($con, "SELECT a.*, b.nama AS nama_kategori FROM produk a JOIN kategori b ON a.kategori_id = b.id WHERE a.id='$id'");
$dataProduk = mysqli_fetch_array($queryProduk);


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
    <title>Update Produk</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

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
                <li class="breadcrumb-item active" aria-current="page">
                    <a href="produk-detail.php" style="text-decoration : none;color : grey;"><i
                            class="fa-solid fa-layer-group text-mutes"></i>Update Produk</a>
                </li>
            </ol>
        </nav>

        <div class="container mt-5">
            <h2>Detail Produk</h2>

            <div class="col-12 col-md-6 mt-5 mb-5">
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="mt-2">
                        <label for="nama">Nama</label>
                        <input type="text" name="nama" id="nama" class="form-control" value="<?php echo $dataProduk['nama'];?>"
                            placeholder="Input nama baru" />
                    </div>
                    <div class="mt-2">
                        <label for="kategori">Kategori</label>
                        <select name="kategori" id="kategori" class="form-control" required>
                            <option value="<?php echo $dataProduk['kategori_id'];?>">
                                Pilih satu
                            </option>
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

                    <div class="mt-2">
                        <label for="harga">Harga</label>
                        <input type="number" name="harga" id="harga" class="form-control" value="<?php echo $dataProduk['harga'];?>"
                            placeholder="" required />
                    </div>

                    <div class="mt-2">
                        <label for="currentFoto">Gambar</label>
                        <img src="imginput/<?php echo $dataProduk['foto']; ?>" alt="" width="300px">
                    </div>
                    <div class="mt-2">
                        <label for="Foto">Masukan Gambar</label>
                        <input type="file" name="foto" id="foto" class="form-control">
                    </div>
                    <div class="mt-2">
                        <label for="datail">Detail</label>
                        <textarea name="detail" id="detail" cols="30" rows="10" class="form-control" required>
                            <?php echo $dataProduk['detail']; ?>
                        </textarea>
                    </div>
                    <div class="mt-2">
                        <label for="ketersediaanStok">Ketersediaan Stok</label>
                        <select name="ketersediaanStok" id="ketersediaanStok" class="form-control">
                            <option value="<?php echo $dataProduk['ketersediaan_stok']; ?>">
                                <?php echo $dataProduk['ketersediaan_stok'] ?>
                            </option>
                            <?php
                            if ($data['ketersediaan_stok'] == 'tersedia') {
                                ?>
                                <option value="habis">habis</option>
                                <?php
                            } else {
                                ?>
                                <option value="tersedia">
                                    tersedia
                                </option>
                                <?php
                            }
                            ?>
                            <option value="habis">habis</option>
                        </select>
                    </div>
                    <div class="mt-3 d-flex justify-content-between">
                        <form action="produk.php" method="post">
                            <button type="submit" class="btn btn-primary" name="simpan">Update</button>
                        </form>
                        <button type="submit" class="btn btn-danger" name="hapus">Delete</button>
                    </div>
                    <?php
                    if (isset($_POST['simpan'])) {
                        $namaProduk = htmlspecialchars($_POST['nama']);
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
                            $queryUpdate = mysqli_query($con, "UPDATE produk SET nama = '$namaProduk', harga = '$harga', detail = '$detail', ketersediaan_stok = '$ketersediaan' WHERE id= '$id' ");
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
                                        $queryUpdate = mysqli_query($con, "UPDATE produk SET foto = '$new_name' WHERE id = '$id'");
                                        if ($queryUpdate) {
                                            ?>
                                            <div class="alert alert-primary mt-3" role="alert">
                                                produk berhasil diUpdate
                                            </div>
                                            <meta http-equiv="refresh" content="0;url=produk-detail.php">
                                            </meta>
                                            <?php
                                        } else {
                                            echo mysqli_error($con);
                                        }
                                    }
                                }
                            }
                        }
                    }
                    if (isset($_POST['hapus'])) {
                        $queryHapus = mysqli_query($con, "DELETE FROM produk WHERE id='$id'");
                        if ($queryHapus) {
                            ?>
                            <div class="alert alert-primary mt-3" role="alert">
                                Produk Berhasil Dihapus
                            </div>
                            <?php
                        }
                    }
                    ?>
                </form>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
            crossorigin="anonymous"></script>
</body>

</html>