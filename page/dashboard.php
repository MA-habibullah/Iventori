<?php 
include '../config/config.php';

session_start();


?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="../asset/css/bootstrap.min.css" rel="stylesheet">

    <title>Salon | Login</title>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid container">
        <a class="navbar-brand" href="dashboard.php">INVENTORI</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <?php if ($_SESSION['level'] == "admin") { ?>
            <li class="nav-item">
            <a class="nav-link" href="../admin/user/index.php">User</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="../admin/ruang/index.php">Ruang</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="../admin/brand/index.php">Brand</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="../admin/dana/index.php">Dana</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="../admin/barang/index.php">barang</a>
            </li>
          <?php } ?>
          <?php if ($_SESSION['level'] == "petugas") { ?>
            <li class="nav-item">
            <a class="nav-link" href="../barang/index.php">barang</a>
            </li>
          <?php } ?>
            <li class="nav-item">
            <a class="nav-link" href="../auth/logout.php">Logout</a>
            </li>
          </ul>
        </div>
    </div>
    </nav>
    <div class="container mt-5">
      <div class="row text-center">
        <div class="col-md-4 mt-3">
          <div class="card-deck " style="width: 18rem;">
            <div class="card-body text-center">
              <?php 
              $sql = $conn->query("SELECT COUNT(*) AS qty FROM barang");
              $barang = $sql->fetch_assoc();
              ?>
              <h5 class="card-title">Data Barang</h5>
              <p class="card-text">Jumlah Data barang</p>
              <h4><?= $barang['qty']; ?></h4>
            </div>
          </div>
        </div>
        <div class="col-md-4 mt-3">
          <div class="card-deck" style="width: 18rem;">
            <div class="card-body text-center">
              <?php 
              $sql = $conn->query("SELECT COUNT(*) AS jumlah FROM barang WHERE kondisi = 'baru'");
              $barang = $sql->fetch_assoc();
              ?>
              <h5 class="card-title">Data Baru</h5>
              <p class="card-text">Kondisi barang</p>
              <h4><?= $barang['jumlah'] ?></h4>
            </div>
          </div>
        </div>
        <div class="col-md-4  mt-3">
          <div class="card-deck" style="width: 18rem;">
            <div class="card-body text-center">
              <?php 
              $sql = $conn->query("SELECT COUNT(*) AS jumlah FROM barang WHERE kondisi = 'bekas'");
              $barang = $sql->fetch_assoc();
              ?>
              <h5 class="card-title">Data Bekas</h5>
              <p class="card-text">Kondisi barang</p>
              <h4><?= $barang['jumlah'] ?></h4>
            </div>
          </div>
        </div>
        <div class="col-md-4 mt-3">
          <div class="card-deck" style="width: 18rem;">
            <div class="card-body text-center">
              <?php 
              $sql = $conn->query("SELECT COUNT(*) AS jumlah FROM barang WHERE kondisi = 'rusak'");
              $barang = $sql->fetch_assoc();
              ?>
              <h5 class="card-title">Data Rusak</h5>
              <p class="card-text">Kondisi barang</p>
              <h4><?= $barang['jumlah'] ?></h4>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="../asset/js/bootstrap.bundle.min.js"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <script src="../asset/js/bootstrap.min.js"></script>
   
  </body>
</html>