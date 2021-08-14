-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 07 Agu 2021 pada 06.55
-- Versi server: 10.4.18-MariaDB
-- Versi PHP: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rpl_uas`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail`
--

CREATE TABLE `detail` (
  `id_detail` bigint(20) UNSIGNED NOT NULL,
  `id_pesanan` bigint(20) UNSIGNED NOT NULL,
  `kd_menu` varchar(5) NOT NULL,
  `jumlah_pesan` smallint(5) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `detail`
--

INSERT INTO `detail` (`id_detail`, `id_pesanan`, `kd_menu`, `jumlah_pesan`) VALUES
(1, 1, 'm001', 2),
(2, 1, 'i001', 291),
(4, 3, 'm003', 1),
(5, 3, 'i002', 4),
(6, 7, 'i001', 291),
(7, 8, 'i002', 2),
(8, 9, 'm003', 1),
(9, 10, 'm003', 1),
(12, 3, 'm002', 1),
(16, 7, 'm001', 2),
(17, 12, 'i001', 9),
(18, 13, 'i001', 3),
(20, 3, 'm001', 3),
(21, 15, 'i001', 2),
(22, 12, 'i002', 3),
(24, 17, 'i001', 3),
(25, 17, 'i002', 2),
(29, 20, 'm002', 3),
(30, 21, 'i002', 3),
(31, 22, 'i002', 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `meja`
--

CREATE TABLE `meja` (
  `no_meja` tinyint(4) NOT NULL,
  `status` enum('Terisi','Kosong') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `meja`
--

INSERT INTO `meja` (`no_meja`, `status`) VALUES
(1, 'Kosong'),
(2, 'Terisi'),
(3, 'Terisi'),
(4, 'Kosong'),
(5, 'Kosong'),
(6, 'Kosong'),
(7, 'Kosong'),
(8, 'Kosong');

-- --------------------------------------------------------

--
-- Struktur dari tabel `menu`
--

CREATE TABLE `menu` (
  `kd_menu` varchar(5) NOT NULL,
  `nama_menu` varchar(30) NOT NULL,
  `harga_menu` bigint(20) UNSIGNED NOT NULL,
  `stok_menu` smallint(5) UNSIGNED NOT NULL,
  `foto_menu` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `menu`
--

INSERT INTO `menu` (`kd_menu`, `nama_menu`, `harga_menu`, `stok_menu`, `foto_menu`) VALUES
('i001', 'Teh Manis', 3000, 284, 'tm001.jpg'),
('i002', 'Es Serut', 8000, 227, 'es001.jpeg'),
('m001', 'Nasi Goreng', 15000, 175, 'ng001.jpg'),
('m002', 'Nasi Liwet', 17000, 171, 'nl001.jpg'),
('m003', 'Nasi Tumpeng', 20000, 147, 'nt001.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pegawai`
--

CREATE TABLE `pegawai` (
  `id_pegawai` varchar(10) NOT NULL,
  `nama_pegawai` varchar(40) NOT NULL,
  `no_hp` varchar(13) NOT NULL,
  `alamat` text NOT NULL,
  `jabatan` enum('Koki','Pelayan','Kasir') NOT NULL,
  `password` varchar(255) NOT NULL,
  `foto_pegawai` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pegawai`
--

INSERT INTO `pegawai` (`id_pegawai`, `nama_pegawai`, `no_hp`, `alamat`, `jabatan`, `password`, `foto_pegawai`) VALUES
('2021001001', 'John Pelayan', '08123456789', 'jl. depan rumah', 'Pelayan', 'pelayan', NULL),
('2021001002', 'John Kasir', '081987654321', 'jl. sebelah jembatan', 'Kasir', 'kasir', NULL),
('2021001003', 'John Koki', '08123454321', 'jl. sebelah john', 'Koki', 'koki', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` bigint(20) UNSIGNED NOT NULL,
  `nama_pelanggan` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `nama_pelanggan`) VALUES
(1, 'Fauzi Mawaldi'),
(2, 'Muhammad Nezarani'),
(3, 'Mustafid Aditya Nizliandry'),
(4, 'Herdaru Ayudhani'),
(5, 'Surya Izhar'),
(14, 'Indra Rohani'),
(15, 'Anas Santi'),
(16, 'Haris Qodir'),
(17, 'Alrendy Putri'),
(18, 'Chaerul Isnandri'),
(19, 'Reza Hidayati'),
(20, 'Andriawan Islami'),
(21, 'Andhicha Widyawati'),
(22, 'Hafizh Amalina'),
(24, 'Sutrisno Fauzi'),
(25, 'Givan Kartika'),
(26, 'Allen Delmeizar'),
(27, 'Yosafat Sapto'),
(28, 'Andrie Ibidemu'),
(29, 'Fahlian Prasanti'),
(30, 'Juno Satrio'),
(31, 'Khaznan Anwar'),
(32, 'Adityo Jeremy Syahputra'),
(33, 'Bimo Amar Aurealia'),
(34, 'Hilman Azhar'),
(35, 'Cakra Nugraha'),
(36, 'Finaldi Permana'),
(37, 'Reksa Afini'),
(38, 'Revo Dede Rahadian'),
(39, 'Jova Mufti'),
(40, 'Rahmigina Tea Kinandatsani'),
(41, 'Neva Ariani'),
(42, 'Rocitha Wiguna'),
(43, 'Benazir Karina'),
(44, 'Fauzia Sulistiyo'),
(45, 'Winda Ramsihs'),
(46, 'Una Pangestu'),
(47, 'Theresia Hastari'),
(48, 'Gishella Willyanda'),
(49, 'Karlina Pamungkas'),
(50, 'Sri Vernanda'),
(51, 'Hallira Muhammad'),
(52, 'Chika Adriarso'),
(53, 'Berty Hutauruk'),
(54, 'Galih Septian'),
(55, 'Yuliana Ulfa'),
(56, 'June Obara'),
(57, 'Chitra Hilary Puspa'),
(58, 'Hillery Rahayu'),
(59, 'Amadea Hning Sastrawan'),
(60, 'Mas Dimas'),
(61, 'Mas Dimas'),
(62, 'Arya Andhika'),
(63, ''),
(64, 'Masdih Anggian'),
(65, 'Singgit Prawijaya'),
(66, ''),
(67, ''),
(68, ''),
(69, 'rahmat'),
(70, 'rahmat'),
(71, 'rizki'),
(72, 'rizkirr'),
(73, 'rizkirr'),
(74, 'rahmat'),
(75, 'rahmat'),
(76, ''),
(77, 'rahmat'),
(78, 'rahmat'),
(79, 'rizkirr'),
(80, 'rahmat');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembayaran`
--

CREATE TABLE `pembayaran` (
  `no_transaksi` bigint(20) UNSIGNED NOT NULL,
  `id_pesanan` bigint(20) UNSIGNED NOT NULL,
  `waktu_pembayaran` datetime DEFAULT NULL,
  `subtotal` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pembayaran`
--

INSERT INTO `pembayaran` (`no_transaksi`, `id_pesanan`, `waktu_pembayaran`, `subtotal`) VALUES
(1, 1, '2021-07-20 07:32:54', 30000),
(1002, 7, '2021-07-21 19:05:55', 903000),
(1003, 9, '2021-07-21 19:29:03', 20000),
(1004, 10, '2021-07-26 10:49:31', 20000),
(1005, 13, '2021-07-26 11:24:35', 9000),
(1006, 8, '2021-07-26 11:24:44', 16000),
(1007, 15, '2021-07-28 15:41:06', 6000),
(1008, 3, '2021-07-29 18:07:05', 114000),
(1009, 12, '2021-08-06 00:27:52', 51000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemesanan`
--

CREATE TABLE `pemesanan` (
  `id_pesanan` bigint(20) UNSIGNED NOT NULL,
  `waktu_pesanan` datetime NOT NULL,
  `id_pelanggan` bigint(20) UNSIGNED NOT NULL,
  `id_pegawai` varchar(10) NOT NULL,
  `no_meja` tinyint(4) NOT NULL,
  `status_pesanan` enum('Selesai','Belum selesai') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pemesanan`
--

INSERT INTO `pemesanan` (`id_pesanan`, `waktu_pesanan`, `id_pelanggan`, `id_pegawai`, `no_meja`, `status_pesanan`) VALUES
(1, '2021-07-20 07:21:48', 1, '2021001001', 3, 'Selesai'),
(3, '2021-07-20 11:02:39', 3, '2021001001', 4, 'Selesai'),
(7, '2021-07-20 20:19:06', 19, '2021001001', 1, 'Belum selesai'),
(8, '2021-07-20 20:22:58', 20, '2021001001', 8, 'Selesai'),
(9, '2021-07-20 20:27:46', 21, '2021001001', 1, 'Belum selesai'),
(10, '2021-07-20 20:29:25', 22, '2021001001', 1, 'Belum selesai'),
(12, '2021-07-26 10:22:55', 61, '2021001001', 3, 'Selesai'),
(13, '2021-07-26 11:15:29', 64, '2021001001', 7, 'Belum selesai'),
(15, '2021-07-28 15:39:54', 69, '2021001001', 1, 'Selesai'),
(17, '2021-07-29 19:35:09', 71, '2021001001', 4, 'Belum selesai'),
(20, '2021-08-06 00:23:48', 78, '2021001001', 0, 'Belum selesai'),
(21, '2021-08-06 00:34:39', 79, '2021001001', 0, 'Selesai'),
(22, '2021-08-07 11:54:03', 80, '2021001001', 0, 'Belum selesai');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `detail`
--
ALTER TABLE `detail`
  ADD PRIMARY KEY (`id_detail`),
  ADD KEY `id_pesanan` (`id_pesanan`),
  ADD KEY `kd_menu` (`kd_menu`);

--
-- Indeks untuk tabel `meja`
--
ALTER TABLE `meja`
  ADD PRIMARY KEY (`no_meja`);

--
-- Indeks untuk tabel `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`kd_menu`);

--
-- Indeks untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id_pegawai`);

--
-- Indeks untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indeks untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`no_transaksi`),
  ADD KEY `id_pesanan` (`id_pesanan`);

--
-- Indeks untuk tabel `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD PRIMARY KEY (`id_pesanan`),
  ADD KEY `id_pelanggan` (`id_pelanggan`),
  ADD KEY `kd_meja` (`no_meja`),
  ADD KEY `id_pegawai` (`id_pegawai`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `detail`
--
ALTER TABLE `detail`
  MODIFY `id_detail` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `no_transaksi` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1010;

--
-- AUTO_INCREMENT untuk tabel `pemesanan`
--
ALTER TABLE `pemesanan`
  MODIFY `id_pesanan` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `detail`
--
ALTER TABLE `detail`
  ADD CONSTRAINT `detail_ibfk_1` FOREIGN KEY (`kd_menu`) REFERENCES `menu` (`kd_menu`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detail_ibfk_2` FOREIGN KEY (`id_pesanan`) REFERENCES `pemesanan` (`id_pesanan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD CONSTRAINT `pembayaran_ibfk_1` FOREIGN KEY (`id_pesanan`) REFERENCES `pemesanan` (`id_pesanan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD CONSTRAINT `pemesanan_ibfk_1` FOREIGN KEY (`id_pegawai`) REFERENCES `pegawai` (`id_pegawai`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
