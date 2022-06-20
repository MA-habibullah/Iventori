<?php 
include_once '../config/config.php';

session_start();

if (($_SESSION['level']) == "admin") {
    header("Location: ../page/dashboard.php");
}

?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="../asset/css/bootstrap.min.css" rel="stylesheet">

    <title>Barang</title>
  </head>
<body>
<?php include_once 'navbar.php'; ?>
<div class="container">
    <a href="/iventori/barang/insert.php" class="btn btn-info float-end my-3" >Tambah</a>
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
                <th></th>
            </tr>
            </thead>
            <tbody>
            <?php
            $query = 'select a.*,
                             nama_dana,
                             nama_brand,
                             nama_ruang
                      from barang a
                               join dana b on a.id_dana = b.id_dana
                               join ruang c on a.id_ruang = c.id_ruang
                               join brand d on a.id_brand = d.id_brand';

            $barangs = mysqli_query($conn, $query);

            $no = 1;

            while ($barang = mysqli_fetch_assoc($barangs)) {
                $dana = mysqli_query($conn, 'select * from dana order by nama_dana');
                $brand = mysqli_query($conn, 'select * from brand order by nama_brand');
                $ruang = mysqli_query($conn, 'select * from ruang order by nama_ruang');
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
                <td>
                    <a href="#" class="badge bg-success btn-edit" data-bs-toggle="modal" data-bs-target="#modal<?php echo $barang['id_barang']?>">Edit</a>
                    <a href="delete.php?id=<?php echo $barang['id_barang']; ?>" class="badge bg-danger" onclick="return confirm('Yakin Hapus?')">Hapus</a>
                </td>
            </tr>
            <!-- modal -->
            <div class="modal" tabindex="-1" id="modal<?php echo $barang['id_barang']?>">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Edit Barang</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                        <form action="update.php" method="post">
                            <input type="hidden" name="id_barang" value="<?php echo $barang['id_barang']?>">
                            <div class="mb-3">
                                <label for="nama" class="form-label">Nama</label>
                                <input type="text" name="nama" value="<?php echo $barang['nama'] ?>" class="form-control" id="nama">
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="">Dana</label>
                                <select aria-label="Default select example" name="id_dana" class="form-select">
                                    <option value="">Pilih dana</option>
                                    <?php while ($d = mysqli_fetch_array($dana)) { ?>
                                        <option value="<?= $d['id_dana']?>" <?= $d['id_dana'] == $barang['id_dana']  ? 'selected' : '' ?>><?= $d['nama_dana']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="">Brand</label>
                                <select aria-label="Default select example" name="id_brand" class="form-select">
                                    <option selected>Pilih Brand</option>
                                    <?php while ($d = mysqli_fetch_assoc($brand)) { ?>
                                        <option value="<?= $d['id_brand']?>" <?= $d['id_brand'] == $barang['id_brand']  ? 'selected' : ''  ?>><?= $d['nama_brand']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="">Ruang</label>
                                <select aria-label="Default select example" name="id_ruang" class="form-select">
                                    <option selected>Pilih Ruang</option>
                                    <?php while ($d = mysqli_fetch_assoc($ruang)) { ?>
                                        <option value="<?= $d['id_ruang']?>" <?= $d['id_ruang'] == $barang['id_ruang']  ? 'selected' : ''  ?>><?= $d['deskripsi']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="no_surat" class="form-label">No Nota</label>
                                <input type="text" name="no_surat" value="<?php echo $barang['no_surat'] ?>" class="form-control" id="no_surat">
                            </div>
                            <div class="mb-3">
                                <label for="kode_barang" class="form-label">Kode Barang</label>
                                <input type="text" name="kode_barang" value="<?php echo $barang['kode_barang'] ?>" class="form-control" id="kode_barang">
                            </div>
                            <div class="mb-3">
                                <label for="material" class="form-label">Material</label>
                                <input type="text" name="material" value="<?php echo $barang['material'] ?>" class="form-control" id="material">
                            </div>
                            <div class="mb-3">
                                <label for="tgl_beli" class="form-label">Tanggal beli</label>
                                <input type="text" name="tgl_beli" value="<?php echo $barang['tgl_beli'] ?>" class="form-control" id="tgl_beli">
                            </div>
                            <div class="mb-3">
                                <label for="qty" class="form-label">Qty</label>
                                <input type="qty" name="qty" value="<?php echo $barang['qty'] ?>" class="form-control" id="qty">
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="">Kondisi</label>
                                <select aria-label="Default select example" name="kondisi" class="form-select">
                                    <option selected>Pilih Kondisi</option>
                                        <option <?= $barang['kondisi'] == 'baru' ? 'selected' : '' ?>>baru</option>
                                        <option <?= $barang['kondisi'] == 'bekas' ? 'selected' : '' ?>>bekas</option>
                                        <option <?= $barang['kondisi'] == 'rusak' ? 'selected' : '' ?>>rusak</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="price_per_item" class="form-label">Harga Satuan</label>
                                <input type="text" name="price_per_item" value="<?php echo $barang['price_per_item'] ?>" class="form-control" id="price_per_item">
                            </div>
                            <div class="mb-3">
                                <label for="keterangan" class="form-label">Keterangan</label>
                                <input type="text" name="keterangan" value="<?php echo $barang['keterangan'] ?>" class="form-control" id="keterangan">
                            </div>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </form>
                    </div>
                </div>
            </div>
            
            <!-- modal -->
            <?php $no++; } ?>
        </tbody>
        </table>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="../asset/js/bootstrap.bundle.min.js"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <script src="../asset/js/bootstrap.min.js"></script>
   
</body>
</html>