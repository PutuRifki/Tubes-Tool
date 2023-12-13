<?php
require "session.php";
if(isset($_GET["id"])){
    $id = $_GET["id"];

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "tokofurnitur";

    $connection = new mysqli($servername, $username, $password, $dbname);

    $sql = "DELETE FROM tb_karyawan WHERE id_karyawan = $id";
    $connection->query($sql);
}

header("location: TabelKaryawan.php");
exit();
?>