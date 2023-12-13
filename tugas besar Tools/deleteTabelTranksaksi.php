<?php
require "session.php";
if(isset($_GET["id"])){
    $id = $_GET["id"];

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "tokofurnitur";

    $connection = new mysqli($servername, $username, $password, $dbname);

    $sql = "DELETE FROM tranksaksi WHERE id_tranksaksi = $id_tranksaksi";
    $connection->query($sql);
}

header("location: tabelTranksaksi.php");
exit();
?>