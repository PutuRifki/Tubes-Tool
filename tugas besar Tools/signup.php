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
                <h1 class="card-title text-center">SIGN UP</h1>
                <p class="text-center text-danger">Silahkan Daftar Terlebih Dahulu</p>
                <div class="card-text">
                    <form action="" method="post">
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" class="form-control form-control-sm" id="Username" name="username">
                        </div>

                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control form-control-sm" id="password" name="password">
                        </div>
                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary" name="subbtn">Create Account</button>
                        </div>
                    </form>
                    <?php

if (isset($_POST['subbtn'])) {
    $newUserName = htmlspecialchars($_POST['username']);
    $newPassword = htmlspecialchars($_POST['password']);

    // Check if username already exists
    $queryExistUserName = mysqli_query($con, "SELECT username FROM users WHERE username = '$newUserName'");
    $banyakUserName = mysqli_num_rows($queryExistUserName);

    // Check if password already exists
    $queryExistPass = mysqli_query($con, "SELECT pass FROM users WHERE pass = '$newPassword'");
    $banyakPass = mysqli_num_rows($queryExistPass);

    $dataUser = mysqli_fetch_array($queryExistUserName);
    $dataPass = mysqli_fetch_array($queryExistUserPass);

    if ($banyakUserName > 0) {
        ?>
        <div class="alert alert-danger mt-3" role="alert">
            Username Sudah Ada
        </div>
        <?php
    } elseif ($banyakPass > 0) {
        ?>
        <div class="alert alert-danger mt-3" role="alert">
            Password Sudah Ada
        </div>
        <?php
    } 
        $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
        // Insert new user data into the users table
        $querySimpan = mysqli_query($con, "INSERT INTO users(username, pass) VALUES ('$newUserName', '$hashedPassword')");
        if ($querySimpan) {
            $_SESSION['username'] = $dataUser['username'];
            $_SESSION['pass'] = $dataPass['pass'];
            $_SESSION['login'] = true;
            header('location: login.php');
        } else {
            ?>
            <div class="alert alert-danger mt-3" role="alert">
                Gagal menyimpan data
            </div>
            <?php
        }
    }
?>

                </div>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>

</html>