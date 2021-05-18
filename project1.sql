-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 18 Bulan Mei 2021 pada 10.30
-- Versi server: 10.4.14-MariaDB
-- Versi PHP: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project1`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_jabatan`
--

CREATE TABLE `data_jabatan` (
  `id_jabatan` int(11) NOT NULL,
  `nama_jabatan` varchar(120) NOT NULL,
  `gaji_pokok` varchar(50) NOT NULL,
  `tj_transport` varchar(50) NOT NULL,
  `uang_makan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `data_jabatan`
--

INSERT INTO `data_jabatan` (`id_jabatan`, `nama_jabatan`, `gaji_pokok`, `tj_transport`, `uang_makan`) VALUES
(3, 'Staff Finance', '4500000', '800000', '540000'),
(4, 'Admin', '4700000', '850000', '500000'),
(5, 'Operator', '3000000', '700000', '500000'),
(7, 'Cleaning Service', '2000000', '300000', '300000'),
(8, 'Inner Kara', '5000000', '1000000', '1000000');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_kehadiran`
--

CREATE TABLE `data_kehadiran` (
  `id_kehadiran` int(11) NOT NULL,
  `bulan` varchar(15) NOT NULL,
  `nik` varchar(50) NOT NULL,
  `nama_pegawai` varchar(225) NOT NULL,
  `jenis_kelamin` varchar(50) NOT NULL,
  `nama_jabatan` varchar(50) NOT NULL,
  `hadir` int(11) NOT NULL,
  `sakit` int(11) NOT NULL,
  `alpha` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `data_kehadiran`
--

INSERT INTO `data_kehadiran` (`id_kehadiran`, `bulan`, `nik`, `nama_pegawai`, `jenis_kelamin`, `nama_jabatan`, `hadir`, `sakit`, `alpha`) VALUES
(12, '012021', '12789012', 'Admin', 'Perempuan', 'Admin', 30, 0, 0),
(13, '012021', '167856001', 'Andi', 'Laki-laki', 'Staff Marketing', 28, 1, 1),
(14, '012021', '1234567893', 'Boy', 'Laki-laki', 'Staff Finance', 27, 3, 0),
(15, '012021', '1234567890', 'Doni', 'Laki-laki', 'Staff Marketing', 30, 0, 0),
(16, '012021', '123457778', 'Indah', 'Perempuan', 'Staff Marketing', 30, 0, 0),
(18, '012021', '999999', 'yahiko', 'Laki-laki', 'Admin', 30, 0, 0),
(25, '022021', '12789012', 'Admin', 'Perempuan', 'Admin', 26, 0, 0),
(26, '022021', '167856001', 'Andi', 'Laki-laki', 'Staff Marketing', 26, 0, 0),
(27, '022021', '1234567893', 'Boy', 'Laki-laki', 'Staff Finance', 26, 0, 0),
(28, '022021', '1234567890', 'Doni', 'Laki-laki', 'Staff Marketing', 26, 0, 0),
(29, '022021', '123457778', 'Indah', 'Perempuan', 'Staff Marketing', 26, 0, 0),
(30, '022021', '999999', 'yahiko', 'Laki-laki', 'Admin', 26, 0, 0),
(37, '042021', '12789012', 'Admin', 'Perempuan', 'Admin', 20, 0, 10),
(38, '042021', '1234567893', 'Boy', 'Laki-laki', 'Staff Finance', 30, 0, 0),
(39, '042021', '999999', 'yahiko', 'Laki-laki', 'Staff Finance', 30, 0, 0),
(40, '042021', '86528612', 'Amado', 'Laki-Laki', 'Staff Finance', 30, 0, 0),
(41, '042021', '7231232', 'Eida', 'Perempuan', 'Cleaning Service', 0, 0, 0),
(42, '052021', '12789012', 'Admin', 'Perempuan', 'Admin', 30, 0, 0),
(43, '052021', '86528612', 'Amado', 'Laki-Laki', 'Staff Finance', 30, 0, 0),
(44, '052021', '1234567893', 'Boy', 'Laki-laki', 'Staff Finance', 30, 0, 0),
(45, '052021', '8372341', 'bug', 'Laki-Laki', 'Admin', 30, 0, 0),
(46, '052021', '7231232', 'Eida', 'Perempuan', 'Cleaning Service', 30, 0, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_pegawai`
--

CREATE TABLE `data_pegawai` (
  `id_pegawai` int(11) NOT NULL,
  `nik` varchar(50) NOT NULL,
  `nama_pegawai` varchar(255) NOT NULL,
  `username` varchar(120) NOT NULL,
  `password` varchar(120) NOT NULL,
  `jenis_kelamin` varchar(20) NOT NULL,
  `jabatan` varchar(50) NOT NULL,
  `tanggal_masuk` date NOT NULL,
  `status` varchar(50) NOT NULL,
  `photo` varchar(225) NOT NULL,
  `hak_akses` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `data_pegawai`
--

INSERT INTO `data_pegawai` (`id_pegawai`, `nik`, `nama_pegawai`, `username`, `password`, `jenis_kelamin`, `jabatan`, `tanggal_masuk`, `status`, `photo`, `hak_akses`) VALUES
(1, '1234567', 'Uzumaki Naruto', 'naruto', 'cf9ee5bcb36b4936dd7064ee9b2f139e', 'Laki-laki', 'Admin', '2020-08-21', 'Pegawai Tetap', '8.jpg', 2),
(3, '1234567893', 'Boy', 'boy', '7363a0d0604902af7b70b271a0b96480', 'Laki-laki', 'Staff Finance', '2020-10-12', 'Pegawai Tetap', '6.jpg', 2),
(4, '12789012', 'Admin', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Perempuan', 'Admin', '2020-11-05', 'Pegawai Tetap', '4.jpg', 1),
(10, '7231232', 'Eida', 'eida', 'f6cd33a102f423282cfd1415331c5274', 'Perempuan', 'Cleaning Service', '2021-04-17', 'Pegawai Tetap', '2.jpg', 2),
(11, '86528612', 'Amado', 'amado', '7ffa19b9b00b6012372545e03d8024b0', 'Laki-Laki', 'Staff Finance', '2021-04-17', 'Pegawai Tetap', '1.jpg', 2),
(15, '8372341', 'bug', 'bug', 'e453df461f4227fd6d3f9e000c706941', 'Laki-Laki', 'Admin', '2021-05-04', 'Pegawai Tetap', '032.jpg', 1),
(16, '000000', 'test123', 'test123', 'cc03e747a6afbbcbf8be7668acfebee5', 'Laki-Laki', 'Staff Finance', '2021-05-09', 'Pegawai Tetap', '7.jpg', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `hak_akses`
--

CREATE TABLE `hak_akses` (
  `id` int(11) NOT NULL,
  `keterangan` varchar(50) NOT NULL,
  `hak_akses` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `hak_akses`
--

INSERT INTO `hak_akses` (`id`, `keterangan`, `hak_akses`) VALUES
(1, 'admin', 1),
(2, 'pegawai', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `potongan_gaji`
--

CREATE TABLE `potongan_gaji` (
  `id` int(11) NOT NULL,
  `potongan` varchar(120) NOT NULL,
  `jml_potongan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `potongan_gaji`
--

INSERT INTO `potongan_gaji` (`id`, `potongan`, `jml_potongan`) VALUES
(1, 'Alpha', 100000),
(5, 'Sakit', 0);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `data_jabatan`
--
ALTER TABLE `data_jabatan`
  ADD PRIMARY KEY (`id_jabatan`);

--
-- Indeks untuk tabel `data_kehadiran`
--
ALTER TABLE `data_kehadiran`
  ADD PRIMARY KEY (`id_kehadiran`);

--
-- Indeks untuk tabel `data_pegawai`
--
ALTER TABLE `data_pegawai`
  ADD PRIMARY KEY (`id_pegawai`);

--
-- Indeks untuk tabel `hak_akses`
--
ALTER TABLE `hak_akses`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `potongan_gaji`
--
ALTER TABLE `potongan_gaji`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `data_jabatan`
--
ALTER TABLE `data_jabatan`
  MODIFY `id_jabatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `data_kehadiran`
--
ALTER TABLE `data_kehadiran`
  MODIFY `id_kehadiran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT untuk tabel `data_pegawai`
--
ALTER TABLE `data_pegawai`
  MODIFY `id_pegawai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `hak_akses`
--
ALTER TABLE `hak_akses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `potongan_gaji`
--
ALTER TABLE `potongan_gaji`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
