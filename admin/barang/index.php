<?php 
include '../../config/config.php';

session_start();

if ($_SESSION['level'] == "petugas") {
    header("Location: ../../page/dashboard.php");
}
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="../../asset/css/bootstrap.min.css" rel="stylesheet">

    <title>Barang</title>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid container">
        <a class="navbar-brand" href="../../page/dashboard.php">INVENTORI</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item">
            <a class="nav-link " href="../user/index.php">User</a>
            </li>
            <li class="nav-item">
            <a class="nav-link " href="../ruang/index.php">Ruang</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="../brand/index.php">Brand</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="../dana/index.php">Dana</a>
            </li>
            <li class="nav-item">
            <a class="nav-link active" href="../barang/index.php">Barang</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="../../auth/logout.php">Logout</a>
            </li>
        </ul>
        </div>
    </div>
    </nav>

    <div class="container">
        <table class="table">
        <thead>
            <tr>
            <th scope="col">No</th>
            <th scope="col">Nama Barang</th>
            <th scope="col">Dana</th>
            <th scope="col">Brand</th>
            <th scope="col">Ruang</th>
            <th scope="col">No Nota</th>
            <th scope="col">kode Barang</th>
            <th scope="col">Material</th>
            <th scope="col">Tanggal Beli</th>
            <th scope="col">Qty</th>
            <th scope="col">Kondisi</th>
            <th scope="col">Harga Satuan</th>
            <th scope="col">Keterangan</th>
            </tr>
        </thead>
        <tbody>
            <?php $query ="select a.*,
                                  nama_dana,
                                  nama_brand,
                                  nama_ruang
                           from barang a
                                    join dana b on a.id_dana = b.id_dana
                                    join ruang c on a.id_ruang = c.id_ruang
                                    join brand d on a.id_brand = d.id_brand";
            $barangs = mysqli_query($conn, $query);

            $no = 1;

            while ($barang = mysqli_fetch_assoc($barangs)) {
            ?>
            <tr>
                <th scope="row"><?= $no; ?></th>
                <td><?=$barang['nama']?></td>
                <td><?=$barang['nama_dana']?></td>
                <td><?=$barang['nama_brand']?></td>
                <td><?=$barang['nama_ruang']?></td>
                <td><?=$barang['no_surat']?></td>
                <td><?=$barang['kode_barang']?></td>
                <td><?=$barang['material']?></td>
                <td><?=$barang['tgl_beli']?></td>
                <td><?=$barang['qty']?></td>
                <td><?=$barang['kondisi']?></td>
                <td><?=$barang['price_per_item']?></td>
                <td><?=$barang['keterangan']?></td>
            </tr>
            <?php $no++; } ?>
        </tbody>
        </table>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="../../asset/js/bootstrap.bundle.min.js"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <script src="../../asset/js/bootstrap.min.js"></script>
   
  </body>
</html>