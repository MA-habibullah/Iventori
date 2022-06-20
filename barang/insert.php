<?php
include_once '../config/config.php';

session_start();

if ($_SESSION['level'] == "admin") {
    header("Location: ../page/dashboard.php");
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = $_POST['nama'];
    $dana = $_POST['dana'];
    $brand = $_POST['brand'];
    $ruang = $_POST['ruang'];
    $no_nota = $_POST['no_surat'];
    $kode_barang = $_POST['kode_barang'];
    $material = $_POST['material'];
    $tanggal_beli = $_POST['tgl_beli'];
    $kuantitas = $_POST['qty'];
    $kondisi = $_POST['kondisi'];
    $harga_satuan = $_POST['price_per_item'];
    $keterangan = $_POST['keterangan'];

    $mysqli = new mysqli('localhost', 'root', '', 'lavinven');

    $perintah = $mysqli->prepare('insert into barang values (default, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)');

    $perintah->bind_param('iiissssssiis', $dana, $ruang, $brand, $kode_barang, $no_nota, $nama, $material, $tanggal_beli, $kondisi, $kuantitas, $harga_satuan, $keterangan);
    $perintah->execute();

    header('Location: /iventori/barang/');
}

$dana = mysqli_query($conn, 'select * from dana order by nama_dana');
$brand = mysqli_query($conn, 'select * from brand order by nama_brand');
$ruang = mysqli_query($conn, 'select * from ruang order by nama_ruang');
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <!-- meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- meta -->
    <title>Barang</title>
    <!-- css -->
    <link href="../asset/css/bootstrap.min.css" rel="stylesheet">
    <!-- css -->
</head>
<body>
<!-- navbar -->
<?php include_once 'navbar.php'; ?>
<!-- navbar -->
<!-- kontainer -->
<div class="container">
    <form method="post">
        <div class="mb-3">
            <label class="form-label" for="nama">Nama</label>
            <input class="form-control" id="nama" name="nama" type="text">
        </div>
        <div class="mb-3">
            <label class="form-label" for="dana">Dana</label>
            <select class="form-select" name="dana">
                <option selected>Pilih dana</option>
                <?php while ($d = mysqli_fetch_assoc($dana)) { ?>
                    <option value="<?= $d['id_dana']; ?>"><?= $d['nama_dana']; ?></option>
                <?php } ?>
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label" for="brand">Brand</label>
            <select class="form-select" name="brand">
                <option selected>Pilih Brand</option>
                <?php while ($b = mysqli_fetch_assoc($brand)) { ?>
                    <option value="<?= $b['id_brand']; ?>"><?= $b['nama_brand']; ?></option>
                <?php } ?>
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label" for="ruang">Ruang</label>
            <select class="form-select" name="ruang">
                <option selected>Pilih Ruang</option>
                <?php while ($r = mysqli_fetch_assoc($ruang)) { ?>
                    <option value="<?= $r['id_ruang']; ?>"><?= $r['deskripsi']; ?></option>
                <?php } ?>
            </select>
        </div>
        <div class="mb-3">
            <label for="no_surat" class="form-label">No Nota</label>
            <input type="text" name="no_surat" class="form-control" id="no_surat">
        </div>
        <div class="mb-3">
            <label for="kode_barang" class="form-label">Kode Barang</label>
            <input type="text" name="kode_barang" class="form-control" id="kode_barang">
        </div>
        <div class="mb-3">
            <label for="material" class="form-label">Material</label>
            <input type="text" name="material" class="form-control" id="material">
        </div>
        <div class="mb-3">
            <label for="tgl_beli" class="form-label">Tanggal beli</label>
            <input type="text" name="tgl_beli" class="form-control" id="tgl_beli">
        </div>
        <div class="mb-3">
            <label for="qty" class="form-label">Qty</label>
            <input type="qty" name="qty" class="form-control" id="qty">
        </div>
        <div class="mb-3">
            <label class="form-label" for="">Kondisi</label>
            <select aria-label="Default select example" class="form-select" name="kondisi">
                <option selected>Pilih Kondisi</option>
                    <option >baru</option>
                    <option >bekas</option>
                    <option >rusak</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="price_per_item" class="form-label">Harga Satuan</label>
            <input type="text" name="price_per_item" class="form-control" id="price_per_item">
        </div>
        <div class="mb-3">
            <label for="keterangan" class="form-label">Keterangan</label>
            <input type="text" name="keterangan" class="form-control" id="keterangan">
        </div>
        <a href="/iventori/barang/index.php" class="btn btn-secondary" >kembali</a>
        <button type="submit" class="btn btn-primary">Save changes</button>
    </form>
</div>
<!-- kontainer -->
<!-- js -->
<script src="../asset/js/bootstrap.bundle.min.js"></script>
<script src="../asset/js/bootstrap.min.js"></script>
<!-- js -->
</body>
</html>
