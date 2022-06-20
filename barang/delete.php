<?php 
include '../config/config.php';
$id = $_GET['id'];
$result = mysqli_query($conn, "DELETE from barang WHERE id_barang=$id");
 
header("location: index.php");
?>