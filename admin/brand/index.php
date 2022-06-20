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

    <title>Brand</title>
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
            <a class="nav-link active" href="../brand/index.php">Brand</a>
            </li>
            <li class="nav-item">
            <a class="nav-link " href="../dana/index.php">Dana</a>
            </li>
            <li class="nav-item">
            <a class="nav-link " href="../barang/index.php">Barang</a>
            </li>
                <li class="nav-item">
                <a class="nav-link" href="../../auth/logout.php">Logout</a>
                </li>
        </ul>
        </div>
    </div>
    </nav>
    <div class="container">
        <form action="insert.php" method="post">
        <div class="row mt-3">
            <div class="col-lg-4">
                <div class="mb-3">
                    <label for="name" class="form-label">Nama Brand</label>
                    <input type="text" name="nama_brand" class="form-control" id="name" placeholder="Masukan nama brand">
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-info">Simpan</button>
        </form>
    </div>

    <div class="container">
        <table class="table">
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">Nama</th>
            <th></th>
            </tr>
        </thead>
        <tbody>
            <?php $sql = "SELECT * FROM brand";
            $brands = mysqli_query($conn, $sql);
            $no=1;
            foreach($brands as $brand) :
            ?>
            <tr>
                <th scope="row"><?=$no++?></th>
                <td><?=$brand['nama_brand']?></td>
                <td>
                    <a href="#" class="badge bg-success btn-edit" data-bs-toggle="modal" data-bs-target="#modal<?php echo $brand['id_brand']?>">Edit</a>
                    <a href="delete.php?id=<?php echo $brand['id_brand']; ?>" class="badge bg-danger" onclick="return confirm('Yakin Hapus?')">Hapus</a>
                </td>
            </tr>
            <div class="modal" tabindex="-1" id="modal<?php echo $brand['id_brand']?>">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit brand</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    
                    <div class="modal-body">
                    <form action="update.php" method="post">
                        <input type="hidden" name="id_brand" value="<?php echo $brand['id_brand']?>">
                        <div class="mb-3">
                            <label for="nama_brand" class="form-label">Nama</label>
                            <input type="text" name="nama_brand" value="<?php echo $brand['nama_brand'] ?>" class="form-control" id="nama_brand">
                        </div>

                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </form>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
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