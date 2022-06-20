<?php
include '../../config/config.php';

$id_brand = $_POST['id_brand'];
$nama_brand = $_POST['nama_brand'];

    $sql = "update brand set nama_brand='$nama_brand'  where id_brand='$id_brand'";
    $result = mysqli_query($conn, $sql);

    header("Location: index.php");
?>