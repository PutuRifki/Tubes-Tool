<?php
require "session.php";
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tokofurnitur";

$connection = new mysqli($servername, $username, $password, $dbname);

$username = "";
$password = "";
$umur = "";
$alamat = "";

$errorMessage = "";
$successMessage = "";

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $umur = $_POST['umur'];
    $alamat = $_POST['alamat'];
   

    do{
        if(empty($username) || empty($password) || empty($umur) || empty($alamat)){
            $errorMessage = 'All the fields are required';
            break;
        }

        //add new client to database
        $sql = "INSERT INTO users (username, pass, umur, alamat)" . "VALUES ('$username', '$password', '$umur', '$alamat')";
        $result = $connection->query($sql);

        if(!$result){
            $errorMessage = "invalid query: ". $connection->error;
            break;
        }

        $username = "";
        $password = "";
        $umur = "";
        $alamat = "";

        $successMessage = "Karyawan sudah berhasil di tambahkan";

        header("location: tabelUser.php");
        exit;

    }while(false);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    </head>
<body>
<nav class="navbar navbar-white text-light stickSy-fixed">
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
                                    <i class="fs-5 fa fa-gauge"></i><span clas="fs-4 ms-3 d-none d-sm-inline">
                                        Produk</span>
                                </a>
                            </li>
                            <li class="nav-item py-2 py-sm-0">
                                <a href="index.php" class="nav-link text-dark">
                                    <i class="fs-5 fa fa-gauge"></i><span clas="fs-4 ms-3 d-none d-sm-inline">
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
    <div class="container my-5">
        <h2>Create new Karyawan</h2>

        <?php
        if(!empty($errorMessage)){
            echo"
            <div class'alert alert-warning alert-dismissible fade show' role='alert'>
                <strong>$errorMessage</strong>
                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='close'></button>
            </div>
            ";
        }
        ?>


        <form action="" method="post">
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Username</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="username" value="<?php echo $username; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Password</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="password" value="<?php echo $password; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Umur</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="umur" value="<?php echo $umur; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Alamat</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="alamat" value="<?php echo $alamat; ?>">
                </div>
            </div>
            


            <?php
            if(!empty($successMessage)){
                echo "
                <div class='row mb-3'>
                    <div class='offset-sm-3 col-sm-6'>
                        <div class='alert alert-success alert-dismissible fade show' role='alert'>
                            <strong>$successMessage</strong>
                            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='close'></button>
                        </div>
                    </div>
                </div>
                ";
            }
            
            ?>
            <div class="row mb-3">
                <div class="offset-sm-3 col-sm-3 d-grid">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                <div class="col-sm-3 d-grid">
                    <a href="TabelUser.php" class="btn btn-primary" role="button">Cancel</a>
                </div>
            </div>
        </form>
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

        </div>
        </div>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>
</html>