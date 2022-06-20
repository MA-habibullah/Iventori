<?php 
include '../../config/config.php';
$id = $_GET['id'];
$result = mysqli_query($conn, "DELETE from dana WHERE id_dana=$id");
 
header("location: index.php");
?>