-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 03 Feb 2020 pada 11.09
-- Versi server: 10.1.38-MariaDB
-- Versi PHP: 7.2.15

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
-- Struktur dari tabel `tb_admin`
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
-- Dumping data untuk tabel `tb_admin`
--

INSERT INTO `tb_admin` (`id_admin`, `nama_lengkap`, `username`, `password`, `alamat`, `telp`, `jk`) VALUES
(1, 'Hafizh Rahman', 'mhafizhrh', '$2y$10$Ym8V8h3Eo30yf/3f6h88iOHCwQJknWbsnAi8Mi4lcQwIBPp3TNOYu', 'Kp.Margamulya RT 04/01 Desa Cimekar', '089658542202', 1),
(2, 'Admin 1', 'admin', '$2y$10$KHWulChSTJUQE/WshrRNY.N/9pKSuMGXOvQ3Q1lxOGgJ.IbYiIOS6', 'Ciguruwik', '081234567890', 1),
(3, '123', '123', '$2y$10$DOKDM9r8ANPJ5mUn8DflPuNWFIe8Zrv9qAe.f0DgBaczCM7MqP.sK', '123', '123', 2),
(4, '23', 'asddddddddddddddddddddddddddddddddddddddddddasddddddddddddddddddddddddddddddddddddddddddasdddddddddd', '$2y$10$ToT1PQFD5lSmSVXXzEIbVuqLpXOfl3JVhW0Anj6vzWHu6YRXcLrh2', 'xcv', 'xcv', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_akun_siswa`
--

CREATE TABLE `tb_akun_siswa` (
  `id_siswa` int(11) NOT NULL,
  `nis` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_buku`
--

CREATE TABLE `tb_buku` (
  `id_buku` int(225) NOT NULL,
  `id_kategori` int(225) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `pengarang` varchar(100) NOT NULL,
  `penerbit` varchar(100) NOT NULL,
  `tahun_terbit` varchar(4) NOT NULL,
  `no_isbn` varchar(50) NOT NULL,
  `jumlah` int(225) NOT NULL,
  `deleted` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tb_buku`
--

INSERT INTO `tb_buku` (`id_buku`, `id_kategori`, `judul`, `pengarang`, `penerbit`, `tahun_terbit`, `no_isbn`, `jumlah`, `deleted`) VALUES
(13, 5, 'Nanatsu no Taizai', 'Nakaba Suzuki', 'Elex Media Komputindo', '2012', '192-168-0-1', 23, 0),
(14, 4, 'One Piece', 'Eiichiro Oda', 'Elex Media Komputindo', '1997', '-', 11, 0),
(15, 5, 'Black Clover', 'Yuki Tabata', 'Elex Media Komputindo', '2015', '-', 4, 0),
(16, 5, 'Detektif Conan', 'Gosho Aoyama', 'Elex Media Komputindo', '1994', '-', 3, 0),
(17, 4, '<b>Ini judul</b>', '<i>asd</i>', '<b>asd</b>', '123', '<b>123123</b>', 3, 1),
(18, 3, '&lt;b&gt;Ini judul&lt;/b&gt;', '&lt;i&gt;asd&lt;/i&gt;', '&lt;b&gt;asd&lt;/b&gt;', '02', '&lt;b&gt;123123&lt;/b&gt;', 0, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kategori`
--

CREATE TABLE `tb_kategori` (
  `id_kategori` int(225) NOT NULL,
  `kategori` varchar(100) NOT NULL,
  `deleted` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tb_kategori`
--

INSERT INTO `tb_kategori` (`id_kategori`, `kategori`, `deleted`) VALUES
(1, 'Pemrograman Web', 0),
(2, 'Modul Desktop', 0),
(3, 'Novel', 0),
(4, 'Komik Berwarna', 0),
(5, 'Komik Hitam Putih', 0),
(17, 'Ngaco', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kelas`
--

CREATE TABLE `tb_kelas` (
  `id_kelas` int(225) NOT NULL,
  `id_siswa` int(225) NOT NULL,
  `nama_kelas` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_peminjaman`
--

CREATE TABLE `tb_peminjaman` (
  `id_peminjaman` int(225) NOT NULL,
  `id_admin` int(225) NOT NULL,
  `id_siswa` int(225) NOT NULL,
  `id_buku` int(225) NOT NULL,
  `jumlah_pinjam` int(11) NOT NULL,
  `tgl_pinjam` date NOT NULL,
  `tgl_kembali` date NOT NULL,
  `tgl_kembali_buku` date NOT NULL,
  `status` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_rak_buku`
--

CREATE TABLE `tb_rak_buku` (
  `id_rak` int(225) NOT NULL,
  `nama_rak` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tb_rak_buku`
--

INSERT INTO `tb_rak_buku` (`id_rak`, `nama_rak`) VALUES
(1, 'Komik'),
(2, 'Tutorial');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_siswa`
--

CREATE TABLE `tb_siswa` (
  `id_siswa` int(225) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nis` varchar(50) NOT NULL,
  `nama_siswa` varchar(100) NOT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jk` int(1) NOT NULL,
  `kelas` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tb_siswa`
--

INSERT INTO `tb_siswa` (`id_siswa`, `password`, `nis`, `nama_siswa`, `tempat_lahir`, `tgl_lahir`, `jk`, `kelas`) VALUES
(1, 'hafizh99', '181912070095', 'MUHAMAD HAFIZH RAHMAN HAKIM', 'BANDUNG', '2003-05-14', 1, 'XI RPL 3'),
(2, '12345678', '181912070094', 'MUCHAMMAD RIZQI AMINUDIN', 'BANDUNG', '0000-00-00', 1, 'XI RPL 3'),
(3, '12345678', '181912070096', 'MUHAMMAD ABDUL AZIIZ ARRASYID', 'BANDUNG', '0000-00-00', 1, 'XI RPL 4'),
(4, '12345678', '181912070093', 'MOHAMAD BILAL AL-GHIFARI JUNAEDI', 'BANDUNG', '0000-00-00', 1, 'XI RPL 3'),
(5, '12345678', '181912070097', 'MUHAMMAD ENDRY EL-QODARY', 'BANDUNG', '0001-01-01', 1, 'XI RPL 3'),
(58, '12345678', '1001', 'Hafizh Rahman', 'Bandung', '1997-05-14', 0, 'XI RPL 3'),
(59, '12345678', '1002', 'Elizabeth', 'Washington', '1998-07-07', 1, 'XI RPL 3'),
(60, '12345678', '1003', 'Tatsumaki', 'Saitama', '1997-01-25', 0, 'XI RPL 3'),
(61, '26573160', '181912070014', 'Alfin', 'BANDUNG', '2020-01-21', 0, 'XI DKV 3'),
(62, '', '1', 'Demo Siswa', 'Website', '2020-01-30', 0, 'XIV RPL 6'),
(63, '79159421', '1234', 'aaa', '23', '2020-02-02', 0, '123'),
(64, '50195184', '123', '123', '123', '2020-02-07', 0, '123'),
(65, '30173715', '23', '23', '23', '2020-02-13', 0, '3'),
(66, '34114150', '235', '23', '23', '2020-02-14', 0, '23'),
(67, '67576281', '1001', 'Hafizh Rahman', 'Bandung', '1997-05-14', 0, 'XI RPL 3'),
(68, '25817807', '1002', 'Elizabeth', 'Washington', '1998-07-07', 1, 'XI RPL 3'),
(69, '91071764', '1003', 'Tatsumaki', 'Saitama', '1997-01-25', 0, 'XI RPL 3'),
(70, '77933202', '1001', 'Hafizh Rahman', 'Bandung', '1997-05-14', 1, 'XI RPL 3'),
(71, '84388125', '1002', 'Elizabeth', 'Washington', '1998-07-07', 0, 'XI RPL 3'),
(72, '15945024', '1003', 'Tatsumaki', 'Saitama', '1997-01-25', 1, 'XI RPL 3');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_stok_buku`
--

CREATE TABLE `tb_stok_buku` (
  `id_buku` int(225) NOT NULL,
  `jumlah_buku` int(225) NOT NULL,
  `sisa_buku` int(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tes`
--

CREATE TABLE `tes` (
  `id` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tes`
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
-- Indeks untuk tabel `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `tb_akun_siswa`
--
ALTER TABLE `tb_akun_siswa`
  ADD PRIMARY KEY (`id_siswa`);

--
-- Indeks untuk tabel `tb_buku`
--
ALTER TABLE `tb_buku`
  ADD PRIMARY KEY (`id_buku`);

--
-- Indeks untuk tabel `tb_kategori`
--
ALTER TABLE `tb_kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `tb_kelas`
--
ALTER TABLE `tb_kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indeks untuk tabel `tb_peminjaman`
--
ALTER TABLE `tb_peminjaman`
  ADD PRIMARY KEY (`id_peminjaman`);

--
-- Indeks untuk tabel `tb_rak_buku`
--
ALTER TABLE `tb_rak_buku`
  ADD PRIMARY KEY (`id_rak`);

--
-- Indeks untuk tabel `tb_siswa`
--
ALTER TABLE `tb_siswa`
  ADD PRIMARY KEY (`id_siswa`);

--
-- Indeks untuk tabel `tb_stok_buku`
--
ALTER TABLE `tb_stok_buku`
  ADD PRIMARY KEY (`id_buku`);

--
-- Indeks untuk tabel `tes`
--
ALTER TABLE `tes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `id_admin` int(225) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tb_buku`
--
ALTER TABLE `tb_buku`
  MODIFY `id_buku` int(225) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `tb_kategori`
--
ALTER TABLE `tb_kategori`
  MODIFY `id_kategori` int(225) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `tb_kelas`
--
ALTER TABLE `tb_kelas`
  MODIFY `id_kelas` int(225) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tb_peminjaman`
--
ALTER TABLE `tb_peminjaman`
  MODIFY `id_peminjaman` int(225) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tb_siswa`
--
ALTER TABLE `tb_siswa`
  MODIFY `id_siswa` int(225) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
