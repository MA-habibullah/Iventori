<?php
include '../../config/config.php';

$id_dana = $_POST['id_dana'];
$nama_dana = $_POST['nama_dana'];
$deskripsi = $_POST['deskripsi'];

    $sql = "update dana set nama_dana='$nama_dana', deskripsi='$deskripsi' where id_dana='$id_dana'";
    $result = mysqli_query($conn, $sql);

    header("Location: index.php");
?>