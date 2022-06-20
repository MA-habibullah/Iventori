<?php
include '../../config/config.php';

$nama_ruang = $_POST['nama_ruang'];
$deskripsi = $_POST['deskripsi'];

    $sql = "INSERT INTO ruang (nama_ruang, deskripsi)
            VALUES ('$nama_ruang', '$deskripsi')";
    $result = mysqli_query($conn, $sql);
    
    header("Location: index.php");
?>