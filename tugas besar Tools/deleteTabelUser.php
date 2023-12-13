<?php
require "session.php";
if(isset($_GET["id"])){
    $id = $_GET["id"];

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "tokofurnitur";

    $connection = new mysqli($servername, $username, $password, $dbname);

    $sql = "DELETE FROM users WHERE id = $id";
    $connection->query($sql);
}

header("location: TabelUser.php");
exit();
?>