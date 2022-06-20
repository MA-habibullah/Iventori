<?php 
include '../config/config.php';

session_start();
 
    $email = $_POST['email'];
    $password = $_POST['password'];
 
    $sql = "SELECT * FROM user WHERE email='$email' AND password='$password'";
    $result = mysqli_query($conn, $sql);
    if ($result->num_rows > 0) {
        $row = mysqli_fetch_assoc($result);
        echo $row['level'];
        $_SESSION['level'] = $row['level'];
        header("Location: ../page/dashboard.php");
    } else {
        header("Location: ../index.php");
    }
?>