<?php 
include '../config/config.php';
$id = $_GET['id'];
$result = mysqli_query($conn, "DELETE from user WHERE id=$id");
 
header("location: dashboard.php");
?>