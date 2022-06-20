<?php
include '../../config/config.php';

$nama_brand = $_POST['nama_brand'];

    $sql = "INSERT INTO brand (nama_brand)
            VALUES ('$nama_brand')";
    $result = mysqli_query($conn, $sql);
    
    header("Location: index.php");
?>