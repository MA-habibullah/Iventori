<?php 
include '../../config/config.php';
$id = $_GET['id'];
$result = mysqli_query($conn, "DELETE from user WHERE id_user=$id");
 
header("location: index.php");
?>