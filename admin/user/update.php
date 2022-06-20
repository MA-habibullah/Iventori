<?php
include '../../config/config.php';

$id_user = $_POST['id_user'];
$nama = $_POST['nama'];
$email = $_POST['email'];
$tanggal_lahir = $_POST['date'];
$password = ($_POST['date']);

$sql = "SELECT * FROM user WHERE email='$email'";
$result = mysqli_query($conn, $result);
$email_cek =  mysqli_fetch_row($user);
$user = mysqli_query($conn, "SELECT * FROM user WHERE id_user='$id_user'");
$user_cek =  mysqli_fetch_row($user);

if($user_cek['2'] == $email_cek['2']){
    $sql = "update user set nama='$nama', tanggal_lahir='$tanggal_lahir', password='$tanggal_lahir' where id_user='$id_user'";
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
    if (!$result->num_rows > 0) {
        $sql = "update user set nama='$nama', email='$email', tanggal_lahir='$tanggal_lahir', password='$tanggal_lahir' where id_user='$id_user'";
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
}
?>