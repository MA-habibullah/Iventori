<?php 
include '../../config/config.php';
$id = $_GET['id'];
$result = mysqli_query($conn, "DELETE from ruang WHERE id_ruang=$id");
 
header("location: index.php");
?>