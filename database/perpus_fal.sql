-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 28, 2024 at 03:21 AM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.0.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `perpus_fal`
--

-- --------------------------------------------------------

--
-- Table structure for table `anggota`
--

CREATE TABLE `anggota` (
  `id_anggota` int(100) NOT NULL,
  `nama_anggota` varchar(100) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `no_telpon` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `anggota`
--

INSERT INTO `anggota` (`id_anggota`, `nama_anggota`, `alamat`, `no_telpon`) VALUES
(3, 'gelon', 'jalan raya tangun', 2147483647),
(4, 'Dian Sastro', 'jalan monas ll', 234321),
(5, 'Naufal Kurnia', 'jalan pendidikan ', 1234),
(6, 'bahlil agung', 'jalan golkar', 43121),
(7, 'Supriadi', 'jalan Nogori lll', 4321234),
(8, 'Yori', 'jalan setia budi', 2147483647),
(9, 'wanda', 'jalan pematang', 345432),
(10, 'alan walker', 'jalan denso ll', 345438);

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `id_buku` varchar(100) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `id_kategori` varchar(100) NOT NULL,
  `id_penulis` varchar(100) NOT NULL,
  `penerbit` varchar(100) NOT NULL,
  `tahun_terbit` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`id_buku`, `judul`, `id_kategori`, `id_penulis`, `penerbit`, `tahun_terbit`) VALUES
('BOk_003', 'nununun', '9', '3', 'islam co idyghv ', 20201),
('BOk_004', 'seni itu abadi', '8', '3', 'genora indonesia', 2020),
('BOk_005', 'pythagoras dasar', '12', '4', 'math riau', 2004);

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(100) NOT NULL,
  `nama_kategori` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`) VALUES
(8, 'Filsafat Budaya'),
(9, 'Sejarah'),
(10, 'Kuliner'),
(11, 'Novel'),
(12, 'perhitungan');

-- --------------------------------------------------------

--
-- Table structure for table `peminjaman`
--

CREATE TABLE `peminjaman` (
  `id_peminjaman` varchar(100) NOT NULL,
  `id_anggota` varchar(100) NOT NULL,
  `tanggal_pinjam` date NOT NULL,
  `tanggal_kembali` date NOT NULL,
  `id_petugas` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `peminjaman`
--

INSERT INTO `peminjaman` (`id_peminjaman`, `id_anggota`, `tanggal_pinjam`, `tanggal_kembali`, `id_petugas`) VALUES
('PJM001', '3', '0000-00-00', '0000-00-00', '10');

-- --------------------------------------------------------

--
-- Table structure for table `peminjaman_detail`
--

CREATE TABLE `peminjaman_detail` (
  `id_peminjaman_detail` int(11) NOT NULL,l
  `id_peminjaman` varchar(100) NOT NULL,
  `id_buku` varchar(100) NOT NULL,
  `denda` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `peminjaman_detail`
--

INSERT INTO `peminjaman_detail` (`id_peminjaman_detail`, `id_peminjaman`, `id_buku`, `denda`) VALUES
(11, 'PJM001', 'BOk_005', 90);

-- --------------------------------------------------------

--
-- Table structure for table `penulis`
--

CREATE TABLE `penulis` (
  `id_penulis` int(10) NOT NULL,
  `nama_penulis` varchar(190) NOT NULL,
  `asal_negara` varchar(100) NOT NULL,
  `jumlah_karya` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penulis`
--

INSERT INTO `penulis` (`id_penulis`, `nama_penulis`, `asal_negara`, `jumlah_karya`) VALUES
(3, 'Naufal Kurnia', 'indonesia', 4),
(4, 'grevogerung', 'indonesia', 23),
(5, 'dono', 'indonesia', 12);

-- --------------------------------------------------------

--
-- Table structure for table `petugas`
--

CREATE TABLE `petugas` (
  `id_petugas` int(100) NOT NULL,
  `nama_petugas` varchar(100) NOT NULL,
  `jenis_kelamin` varchar(100) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `jabatan` varchar(100) NOT NULL,
  `shift` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `petugas`
--

INSERT INTO `petugas` (`id_petugas`, `nama_petugas`, `jenis_kelamin`, `alamat`, `jabatan`, `shift`) VALUES
(8, 'gibran', 'Laki-laki', 'jalan solo ll;', 'Teknisi Perpustakaan', 'pagi'),
(10, 'rudi', 'Laki-laki', 'tanjung belit', 'Kepala Perpustakaan', 'siang'),
(11, 'agus gumiwangan', 'Laki-laki', 'jalan golkar v', 'Pelayanan Pengguna', 'pagi');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `no_telp` int(255) NOT NULL,
  `password` varchar(244) NOT NULL,
  `role` enum('super_admin','admin','petugas','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nama`, `username`, `email`, `no_telp`, `password`, `role`) VALUES
(27, 'juan', 'go', 'go@gmail.com', 221, '$2y$10$fIPoPCcRoGz4aFX.Cyo/Qe.ceXlm.h4lWbh.OO34sXpa4MImsP57u', 'admin'),
(28, 'naufal kurnia', 'root', 'noufalkurnia1@gmail.com', 2147483647, '$2y$10$vWU07A3EEvMPz7a0ISc00.W1RxfHCrf6srISbEMJnZMxT59REh.ue', 'super_admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anggota`
--
ALTER TABLE `anggota`
  ADD PRIMARY KEY (`id_anggota`);

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id_buku`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`id_peminjaman`);

--
-- Indexes for table `peminjaman_detail`
--
ALTER TABLE `peminjaman_detail`
  ADD PRIMARY KEY (`id_peminjaman_detail`),
  ADD UNIQUE KEY `id_buku` (`id_buku`,`id_peminjaman`),
  ADD KEY `id_peminjaman` (`id_peminjaman`);

--
-- Indexes for table `penulis`
--
ALTER TABLE `penulis`
  ADD PRIMARY KEY (`id_penulis`);

--
-- Indexes for table `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`id_petugas`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`nama`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `anggota`
--
ALTER TABLE `anggota`
  MODIFY `id_anggota` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `peminjaman_detail`
--
ALTER TABLE `peminjaman_detail`
  MODIFY `id_peminjaman_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `penulis`
--
ALTER TABLE `penulis`
  MODIFY `id_penulis` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `petugas`
--
ALTER TABLE `petugas`
  MODIFY `id_petugas` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `peminjaman_detail`
--
ALTER TABLE `peminjaman_detail`
  ADD CONSTRAINT `peminjaman_detail_ibfk_1` FOREIGN KEY (`id_peminjaman`) REFERENCES `peminjaman` (`id_peminjaman`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
