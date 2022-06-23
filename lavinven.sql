-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 23 Jun 2022 pada 15.14
-- Versi server: 10.1.38-MariaDB
-- Versi PHP: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lavinven`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `id_barang` int(10) UNSIGNED NOT NULL,
  `id_dana` int(11) UNSIGNED NOT NULL,
  `id_ruang` int(11) UNSIGNED NOT NULL,
  `id_brand` int(11) UNSIGNED NOT NULL,
  `kode_barang` varchar(100) NOT NULL,
  `no_surat` varchar(150) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `material` tinytext NOT NULL,
  `tgl_beli` date NOT NULL,
  `kondisi` enum('baru','bekas','rusak') NOT NULL DEFAULT 'baru',
  `qty` smallint(5) UNSIGNED NOT NULL,
  `price_per_item` int(10) UNSIGNED NOT NULL,
  `keterangan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`id_barang`, `id_dana`, `id_ruang`, `id_brand`, `kode_barang`, `no_surat`, `nama`, `material`, `tgl_beli`, `kondisi`, `qty`, `price_per_item`, `keterangan`) VALUES
(1, 1, 17, 5, 'ASS100', '200/21/TU/2022', 'Laptop Acer VX', 'Plastik', '2022-03-01', 'baru', 1, 6500000, 'penggunaan dana dari bos tw 1'),
(3, 2, 17, 1, 'EPS100', '200/22/TU/2022', 'Printer L310', 'Plastik', '2020-12-12', 'baru', 1, 2500000, 'Penggunaan dana BPOPP 2022'),
(5, 10, 18, 5, 'ASS300', '200/23/TU/2022', 'Komputer All In One', 'asas', '2020-12-12', 'bekas', 1, 6500000, 'AIO Asus 128 gb');

-- --------------------------------------------------------

--
-- Struktur dari tabel `brand`
--

CREATE TABLE `brand` (
  `id_brand` int(11) UNSIGNED NOT NULL,
  `nama_brand` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `brand`
--

INSERT INTO `brand` (`id_brand`, `nama_brand`) VALUES
(7, 'ACER'),
(5, 'ASUS'),
(1, 'EPSON'),
(2, 'HP'),
(4, 'LENOVO'),
(3, 'LG');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dana`
--

CREATE TABLE `dana` (
  `id_dana` int(11) UNSIGNED NOT NULL,
  `nama_dana` varchar(100) NOT NULL,
  `deskripsi` tinytext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `dana`
--

INSERT INTO `dana` (`id_dana`, `nama_dana`, `deskripsi`) VALUES
(1, 'BOS', 'Bantuan Operasional Sekolah'),
(2, 'BPOPP', 'Biaya Penunjang Operasional Penyelenggaraan Pendidikan'),
(4, 'Komite', 'Komite Sekolah'),
(6, 'SPP', 'Sumbangan Pembinaan Pendidikan'),
(9, 'Sumbangan', 'Sumbangan'),
(10, 'Dinas Pemprov', 'Dinas Pemprov');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ruang`
--

CREATE TABLE `ruang` (
  `id_ruang` int(11) UNSIGNED NOT NULL,
  `nama_ruang` varchar(100) NOT NULL,
  `deskripsi` tinytext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ruang`
--

INSERT INTO `ruang` (`id_ruang`, `nama_ruang`, `deskripsi`) VALUES
(1, 'Ruang 01', '10 IPA 1'),
(5, 'Ruang 02', '11 IPA 1'),
(16, 'Ruang 03', '12 IPA 1'),
(17, 'Ruang 04', 'RUANG GURU'),
(18, 'Ruang 05', 'Lab TIK');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(10) UNSIGNED NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `password` char(72) NOT NULL,
  `level` enum('admin','petugas') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `nama`, `email`, `tanggal_lahir`, `password`, `level`) VALUES
(1, 'maulana', 'maulana@gmail.com', '0000-00-00', '123456', 'admin'),
(2, 'petugas', 'petugas@gmail.com', '0000-00-00', '123456', 'petugas'),
(4, 'COba', 'user@gmail.com', '2022-01-01', '2022-01-01', 'petugas');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`),
  ADD KEY `id_brand` (`id_brand`),
  ADD KEY `id_dana` (`id_dana`),
  ADD KEY `id_ruang` (`id_ruang`);

--
-- Indeks untuk tabel `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`id_brand`),
  ADD UNIQUE KEY `nama` (`nama_brand`);

--
-- Indeks untuk tabel `dana`
--
ALTER TABLE `dana`
  ADD PRIMARY KEY (`id_dana`),
  ADD UNIQUE KEY `nama` (`nama_dana`);

--
-- Indeks untuk tabel `ruang`
--
ALTER TABLE `ruang`
  ADD PRIMARY KEY (`id_ruang`),
  ADD UNIQUE KEY `nama` (`nama_ruang`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `barang`
--
ALTER TABLE `barang`
  MODIFY `id_barang` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `brand`
--
ALTER TABLE `brand`
  MODIFY `id_brand` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `dana`
--
ALTER TABLE `dana`
  MODIFY `id_dana` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `ruang`
--
ALTER TABLE `ruang`
  MODIFY `id_ruang` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD CONSTRAINT `barang_ibfk_1` FOREIGN KEY (`id_brand`) REFERENCES `brand` (`id_brand`),
  ADD CONSTRAINT `barang_ibfk_2` FOREIGN KEY (`id_dana`) REFERENCES `dana` (`id_dana`),
  ADD CONSTRAINT `barang_ibfk_3` FOREIGN KEY (`id_ruang`) REFERENCES `ruang` (`id_ruang`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
