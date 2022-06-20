<?php
include '../../config/config.php';

$id_ruang = $_POST['id_ruang'];
$nama_ruang = $_POST['nama_ruang'];
$deskripsi = $_POST['deskripsi'];

    $sql = "update ruang set nama_ruang='$nama_ruang', deskripsi='$deskripsi' where id_ruang='$id_ruang'";
    $result = mysqli_query($conn, $sql);

    header("Location: index.php");
?>