<?php
include '../../config/config.php';

$nama_dana = $_POST['nama_dana'];
$deskripsi = $_POST['deskripsi'];

    $sql = "INSERT INTO dana (nama_dana, deskripsi)
            VALUES ('$nama_dana', '$deskripsi')";
    $result = mysqli_query($conn, $sql);
    
    header("Location: index.php");
?>