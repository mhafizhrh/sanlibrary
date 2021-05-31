-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 30, 2020 at 07:44 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.2.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `perpustakaan`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin`
--

CREATE TABLE `tb_admin` (
  `id_admin` int(225) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `alamat` char(100) NOT NULL,
  `telp` char(20) NOT NULL,
  `jk` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_admin`
--

INSERT INTO `tb_admin` (`id_admin`, `nama_lengkap`, `username`, `password`, `alamat`, `telp`, `jk`) VALUES
(1, 'Hafizh Rahman', 'mhafizhrh', '$2y$10$z.t3TeKiNpHSXfTfJjGOgOVUKkCP7lSWeqtRqhNmjMijMaJn.liei', 'Kp.Margamulya RT 04/01', '089658542202', 1),
(2, 'Admin 1', 'admin', '$2y$10$KHWulChSTJUQE/WshrRNY.N/9pKSuMGXOvQ3Q1lxOGgJ.IbYiIOS6', 'Ciguruwik', '081234567890', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_buku`
--

CREATE TABLE `tb_buku` (
  `id_buku` int(225) NOT NULL,
  `id_kategori` int(225) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `pengarang` varchar(100) NOT NULL,
  `penerbit` varchar(100) NOT NULL,
  `tahun_terbit` varchar(4) NOT NULL,
  `no_isbn` varchar(50) NOT NULL,
  `rak` int(225) NOT NULL,
  `jumlah` int(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_buku`
--

INSERT INTO `tb_buku` (`id_buku`, `id_kategori`, `judul`, `pengarang`, `penerbit`, `tahun_terbit`, `no_isbn`, `rak`, `jumlah`) VALUES
(13, 5, 'Usagi', 'Nakaba Suzuki', '-', '2012', '-', 1, 4),
(14, 4, 'One Piece', 'Eiichiro Oda', 'Elex Media Komputindo', '1997', '-', 1, 12),
(15, 5, 'Black Clover', 'Yuki Tabata', 'Elex Media Komputindo', '2015', '-', 2, 1),
(16, 5, 'Detektif Conan', 'Gosho Aoyama', 'Elex Media Komputindo', '1994', '-', 2, 4);

-- --------------------------------------------------------

--
-- Table structure for table `tb_kategori`
--

CREATE TABLE `tb_kategori` (
  `id_kategori` int(225) NOT NULL,
  `kategori` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_kategori`
--

INSERT INTO `tb_kategori` (`id_kategori`, `kategori`) VALUES
(1, 'Pemrograman Web'),
(2, 'Modul Desktop'),
(3, 'Novel'),
(4, 'Komik Berwarna'),
(5, 'Komik Hitam Putih'),
(6, '11'),
(7, '6'),
(8, '7');

-- --------------------------------------------------------

--
-- Table structure for table `tb_peminjaman`
--

CREATE TABLE `tb_peminjaman` (
  `id_peminjaman` int(225) NOT NULL,
  `id_admin` int(225) NOT NULL,
  `id_siswa` int(225) NOT NULL,
  `id_buku` int(225) NOT NULL,
  `tgl_pinjam` date NOT NULL,
  `tgl_kembali` date NOT NULL,
  `tgl_kembali_buku` date NOT NULL,
  `status` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_peminjaman`
--

INSERT INTO `tb_peminjaman` (`id_peminjaman`, `id_admin`, `id_siswa`, `id_buku`, `tgl_pinjam`, `tgl_kembali`, `tgl_kembali_buku`, `status`) VALUES
(6, 1, 1, 13, '2019-11-06', '2019-11-20', '2020-01-11', 1),
(7, 1, 1, 14, '2019-11-08', '2019-11-27', '2019-11-06', 1),
(8, 1, 1, 13, '2020-02-11', '2020-02-18', '2020-01-29', 1),
(9, 1, 1, 13, '2020-01-09', '2020-01-09', '2020-01-16', 1),
(10, 2, 1, 14, '2020-03-12', '2020-03-19', '2020-03-19', 1),
(11, 2, 1, 13, '2020-01-09', '2020-01-09', '2020-01-16', 1),
(12, 2, 1, 14, '2020-03-12', '2020-03-19', '2020-03-19', 1),
(13, 2, 1, 13, '2020-01-09', '2020-01-09', '2020-01-16', 1),
(14, 1, 2, 14, '2020-01-12', '2020-01-19', '0000-00-00', 0),
(15, 1, 23, 13, '2020-01-16', '2020-01-30', '2020-01-16', 1),
(16, 1, 24, 14, '2020-01-16', '2020-01-23', '0000-00-00', 0),
(17, 2, 35, 15, '2020-01-30', '2020-02-06', '0000-00-00', 0),
(18, 2, 35, 13, '2020-01-30', '2020-02-06', '2020-01-30', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_rak_buku`
--

CREATE TABLE `tb_rak_buku` (
  `id_rak` int(225) NOT NULL,
  `nama_rak` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_rak_buku`
--

INSERT INTO `tb_rak_buku` (`id_rak`, `nama_rak`) VALUES
(1, 'Komik'),
(2, 'Tutorial');

-- --------------------------------------------------------

--
-- Table structure for table `tb_siswa`
--

CREATE TABLE `tb_siswa` (
  `id_siswa` int(225) NOT NULL,
  `password` varchar(200) NOT NULL DEFAULT '12345678',
  `nis` varchar(50) NOT NULL,
  `nama_siswa` varchar(100) NOT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jk` int(1) NOT NULL,
  `kelas` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_siswa`
--

INSERT INTO `tb_siswa` (`id_siswa`, `password`, `nis`, `nama_siswa`, `tempat_lahir`, `tgl_lahir`, `jk`, `kelas`) VALUES
(1, '12345678', '181912070095', 'MUHAMAD HAFIZH RAHMAN HAKIM', 'BANDUNG', '2003-05-14', 1, 'XI RPL 3'),
(2, '12345678', '181912070094', 'MUCHAMMAD RIZQI AMINUDIN', 'BANDUNG', '0000-00-00', 1, 'XI RPL 3'),
(3, '12345678', '181912070096', 'MUHAMMAD ABDUL AZIIZ ARRASYID', 'BANDUNG', '0000-00-00', 1, 'XI RPL 3'),
(4, '12345678', '181912070093', 'MOHAMAD BILAL AL-GHIFARI JUNAEDI', 'BANDUNG', '0000-00-00', 1, 'XI RPL 3'),
(5, '12345678', '181912070097', 'MUHAMMAD ENDRY EL-QODARY', 'BANDUNG', '0001-01-01', 1, 'XI RPL 3'),
(24, '12345678', '181912070108', 'Muhammad Zibran Al - Aziiz', 'Bandung', '2003-01-13', 0, 'XI RPL 3'),
(35, '12345678', '181912070000', 'Rendi Hapid Umam', 'Bandung', '2020-01-22', 0, 'XI RPL 3');

-- --------------------------------------------------------

--
-- Table structure for table `tb_stok_buku`
--

CREATE TABLE `tb_stok_buku` (
  `id_buku` int(225) NOT NULL,
  `jumlah` int(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tes`
--

CREATE TABLE `tes` (
  `id` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tes`
--

INSERT INTO `tes` (`id`, `nama`) VALUES
(215, 'Ucok'),
(479, 'Ucok'),
(656, 'Ucok'),
(725, 'Ucok'),
(733, 'Ucok'),
(817, 'Ucok'),
(860, 'Ucok');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `tb_buku`
--
ALTER TABLE `tb_buku`
  ADD PRIMARY KEY (`id_buku`);

--
-- Indexes for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `tb_peminjaman`
--
ALTER TABLE `tb_peminjaman`
  ADD PRIMARY KEY (`id_peminjaman`);

--
-- Indexes for table `tb_rak_buku`
--
ALTER TABLE `tb_rak_buku`
  ADD PRIMARY KEY (`id_rak`);

--
-- Indexes for table `tb_siswa`
--
ALTER TABLE `tb_siswa`
  ADD PRIMARY KEY (`id_siswa`);

--
-- Indexes for table `tb_stok_buku`
--
ALTER TABLE `tb_stok_buku`
  ADD PRIMARY KEY (`id_buku`);

--
-- Indexes for table `tes`
--
ALTER TABLE `tes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `id_admin` int(225) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_buku`
--
ALTER TABLE `tb_buku`
  MODIFY `id_buku` int(225) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
  MODIFY `id_kategori` int(225) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tb_peminjaman`
--
ALTER TABLE `tb_peminjaman`
  MODIFY `id_peminjaman` int(225) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tb_siswa`
--
ALTER TABLE `tb_siswa`
  MODIFY `id_siswa` int(225) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
