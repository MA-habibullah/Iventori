<?php
include '../../config/config.php';

$nama = $_POST['nama'];
$email = $_POST['email'];
$tanggal_lahir = $_POST['date'];
$password = ($_POST['date']);


$sql = "SELECT * FROM user WHERE email='$email'";
$result = mysqli_query($conn, $sql);
if (!$result->num_rows > 0) {
    $sql = "INSERT INTO user (nama, email, tanggal_lahir, password, level)
            VALUES ('$nama', '$email', '$tanggal_lahir','$password', 'petugas')";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        header("Location: index.php");
        $nama = "";
        $email = "";
        $tanggal_lahir = "";
        $_POST['password'] = "";
    } else {
        header("Location: index.php");
    }
} else {
    header("Location: index.php");
}
?>