<?php
include '../config/config.php';

$id_barang = $_POST['id_barang'];
$nama = $_POST['nama'];
$id_dana = $_POST['id_dana'];
$id_brand = $_POST['id_brand'];
$id_ruang = $_POST['id_ruang'];
$no_nota = $_POST['no_surat'];
$kode_barang = $_POST['kode_barang'];
$material = $_POST['material'];
$tgl_beli = $_POST['tgl_beli'];
$qty = $_POST['qty'];
$kondisi = $_POST['kondisi'];
$harga_satuan = $_POST['price_per_item'];
$keterangan = $_POST['keterangan'];
    $sql = "update barang set nama='$nama', 
                            id_dana='$id_dana',
                            id_brand='$id_brand',
                            id_ruang='$id_ruang',
                            no_surat='$no_nota',
                            kode_barang='$kode_barang' ,
                            material='$material',
                            tgl_beli='$tgl_beli',
                            qty='$qty',
                            kondisi='$kondisi',
                            price_per_item='$harga_satuan',
                            keterangan='$keterangan' 
                            where id_barang='$id_barang'";
    $result = mysqli_query($conn, $sql);

    header("Location: index.php");
?>