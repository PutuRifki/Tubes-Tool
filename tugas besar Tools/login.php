<?php
session_start();
require "koneksi.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="styleLogin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
        body{
        background-image: url('assets/pexels-pixabay-104842.jpg');
        background-size: cover;
        background-repeat: no-repeat;
        }
        .login-form {
        opacity: 0.7;
        background-color: black
        }
        
    </style>
</head>

<body>
    <div class="global-container mt-5">
        <div class="card login-form">
            <div class="card-body">
                <h1 class="card-title text-center">LOGIN</h1>
                <p class="text-center text-danger">Silahkan Login Terlebih Dahulu</p>
                <div class="card-text">
                    <form action="" method="post">
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" class="form-control form-control-sm" id="username" name="username" autocomplete="off">
                        </div>

                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control form-control-sm" id="password" name="pass">
                        </div>
                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary" name="loginbtn">Sign in</button>
                        </div>

                        <div class="signup">Don't have an account? <a href="signup.php">Create one</a></div>
                    </form>
                </div>
            </div>
            <div class="mt-5">
                <?php
                if (isset($_POST['loginbtn'])) {
                    $username = htmlspecialchars($_POST['username']);
                    $password = htmlspecialchars($_POST['pass']);

                    $query = mysqli_query($con, "SELECT * FROM users WHERE username= '$username'");
                    $countdata = mysqli_num_rows($query);
                    $data = mysqli_fetch_array($query);

                    if ($countdata > 0) {
                        if (password_verify($password, $data['pass'])) {
                            $_SESSION['username'] = $data['username'];
                            $_SESSION['login'] = true;
                            header('location: index.php');
                        } else {
                            ?>
                            <div class="alert alert-success" role="alert">
                                password salah
                            </div>
                            <?php
                        }
                    } else {
                        ?>
                        <div class="alert alert-warning" role="alert">
                            data tidak tersedia
                        </div>
                        <?php
                    }
                }
                ?>
            </div>
        </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>

</html>