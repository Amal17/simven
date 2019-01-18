-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 18, 2019 at 02:14 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inventaris`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_barang`
--

CREATE TABLE `tb_barang` (
  `id_barang` int(11) NOT NULL,
  `id_jenisbarang` int(11) NOT NULL,
  `tanggal_beli` date NOT NULL,
  `stok` int(11) NOT NULL,
  `id_pemasok` int(11) NOT NULL,
  `harga_satuan` int(11) NOT NULL,
  `harga_total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_barang`
--

INSERT INTO `tb_barang` (`id_barang`, `id_jenisbarang`, `tanggal_beli`, `stok`, `id_pemasok`, `harga_satuan`, `harga_total`) VALUES
(1, 1, '2018-01-10', 5, 4, 250000, 1250000),
(2, 8, '2018-02-10', 3, 3, 1000000, 3000000),
(3, 1, '2018-01-10', 4, 4, 250000, 1000000),
(4, 1, '2018-01-10', 6, 1, 1000000, 6000000),
(5, 1, '2018-01-10', 10, 1, 250000, 1000000),
(6, 1, '2018-02-10', 4, 1, 250000, 1000000),
(7, 3, '2018-01-11', 50, 5, 1000, 50000),
(8, 1, '2018-03-02', 5, 1, 2000, 10000),
(9, 6, '2018-01-20', 5, 3, 50000, 250000),
(10, 1, '2018-03-02', 5, 1, 2000, 10000),
(11, 13, '2018-01-22', 4, 6, 2000000, 0),
(12, 1, '0000-00-00', 0, 1, 0, 0),
(13, 1, '0000-00-00', 0, 1, 0, 0),
(14, 14, '2018-01-03', 3, 7, 2000, 6000),
(15, 14, '2018-01-03', 3, 7, 2000, 6000),
(16, 1, '2018-03-02', 5, 1, 2000, 10000),
(17, 1, '2018-03-02', 5, 1, 2000, 10000),
(18, 12, '2018-01-23', 12, 7, 2000, 24000),
(19, 18, '2018-01-25', 11, 6, 10000000, 110000000),
(20, 18, '2018-01-25', 1, 2, 5000000, 5000000),
(21, 8, '2019-01-18', 1, 2, 5000000, 5000000);

-- --------------------------------------------------------

--
-- Table structure for table `tb_gedung`
--

CREATE TABLE `tb_gedung` (
  `id_gedung` int(3) UNSIGNED NOT NULL,
  `nama_gedung` varchar(20) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_gedung`
--

INSERT INTO `tb_gedung` (`id_gedung`, `nama_gedung`) VALUES
(1, 'Gudang'),
(2, 'Cakra Buana'),
(3, 'Graha Cakrawala'),
(5, 'Gedung PCT'),
(8, 'Gedung Megawati');

-- --------------------------------------------------------

--
-- Table structure for table `tb_jenisbarang`
--

CREATE TABLE `tb_jenisbarang` (
  `id_jenisbarang` int(11) NOT NULL,
  `nama_barang` varchar(25) NOT NULL,
  `satuan` varchar(20) NOT NULL,
  `kategori` enum('habis','tidak habis') NOT NULL,
  `jumlah` int(11) NOT NULL,
  `merk` varchar(25) NOT NULL,
  `spek` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_jenisbarang`
--

INSERT INTO `tb_jenisbarang` (`id_jenisbarang`, `nama_barang`, `satuan`, `kategori`, `jumlah`, `merk`, `spek`) VALUES
(1, 'Meja', 'Item', 'tidak habis', 39, '', ''),
(2, 'Meja Bulat', 'Item', 'tidak habis', 0, '', ''),
(3, 'Kapur', 'Pak', 'habis', 48, '', ''),
(4, 'Kapur Barus', 'Pak', 'habis', 0, '', ''),
(5, 'Kursi Lipat', 'Item', 'tidak habis', 0, '', ''),
(6, 'Kursi Putar', 'Item', 'tidak habis', 5, '', ''),
(7, 'Kursi Sandar', 'Item', 'tidak habis', 0, '', ''),
(8, 'AC', 'Item', 'tidak habis', 4, '', ''),
(9, 'Kulkas', 'Item', 'tidak habis', 0, '', ''),
(10, 'TV', 'Item', 'tidak habis', 0, '', ''),
(11, 'Spidol', 'Pak', 'habis', 0, '', ''),
(12, 'Pulpen', 'Pak', 'habis', 12, '', ''),
(13, 'lemari', 'Item', 'tidak habis', 4, 'Maspion', 'lemari 2 pintu'),
(14, 'bantal', 'Item', 'tidak habis', 6, 'bantal kapuk', 'empuk dan kualitas super'),
(18, 'Komputer', 'Item', 'tidak habis', 12, 'HP', 'Dewa');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pemasok`
--

CREATE TABLE `tb_pemasok` (
  `id_pemasok` int(3) UNSIGNED NOT NULL,
  `nama_pemasok` varchar(100) DEFAULT NULL,
  `penanggung_jawab` varchar(100) DEFAULT NULL,
  `alamat` text,
  `kota` varchar(20) DEFAULT NULL,
  `no_telp` varchar(15) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pemasok`
--

INSERT INTO `tb_pemasok` (`id_pemasok`, `nama_pemasok`, `penanggung_jawab`, `alamat`, `kota`, `no_telp`, `email`) VALUES
(1, 'PT Kriya Budiman', 'Setno Rajasa', 'Jl. Pahlawan No 201, Kuningan', 'Surakarta', '085263457000', 'kriyabudiman@gmail.com'),
(2, 'CV Dua Saudara', 'Ilham Hanif', 'Jl. Bedengan Seribu 11, Rambutan', 'Jakarta', '081256782345', 'duasaudara@gmail.com'),
(3, 'CV Prima ', 'Aris Wahyudi', 'Jl. Seribu Rasa 21, Tabuhan', 'Jakarta', '081370072000', 'prima@gmail.com'),
(4, 'PT Delta Perabot', 'Delta Suratno', 'Jl. Bendungan Kecil 17, Durian', 'Malang', '085280807007', 'delta@delta.com'),
(5, 'CV Langit Biru', 'Afika Indah', 'Jl. Durian 45, Rambutan', 'Malang', '082165679009', 'afika@langitbiru.com'),
(6, 'Wayne Enterprise', 'Lucius Fox', 'jl bandung no 1', 'Gotham', '0341 356789', 'support@wayneenterprise.com'),
(7, 'Muqta cv', 'Fadil', 'jl mawar no 08', 'jombang', '089727227876', 'yoi@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `tb_peminjam`
--

CREATE TABLE `tb_peminjam` (
  `id_peminjam` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `jenis_kelamin` varchar(25) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `hp` varchar(14) NOT NULL,
  `email` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_peminjam`
--

INSERT INTO `tb_peminjam` (`id_peminjam`, `nama`, `jenis_kelamin`, `alamat`, `hp`, `email`) VALUES
(1, 'Agus', 'pria', 'Jl. Cendrawasih', '085240405455', 'agus@gmail.com'),
(2, 'mbuh', 'pria', 'jombang', '2412412', 'aku'),
(3, 'l zakaria', 'pria', 'Malang', '0855544656565', 'lutfi97zakaria@gmail.com'),
(4, 'Abdul', 'pria', 'Jl. Peterpan, 50', '085210001000', 'abduel@gmail.com'),
(5, 'Abdul', 'pria', 'Jl. Peterpan, 50', '085210001000', 'abduel@gmail.com'),
(6, 'Abdul', 'pria', 'Jl. Peterpan, 50', '085210001000', 'abduel@gmail.com'),
(7, 'l zakaria', 'pria', 'Malang', '085656565656', 'lutfi97zakaria@gmail.com'),
(8, 'l zakaria', 'pria', 'Malang', '0756565656565', 'lutfi97zakaria@gmail.com'),
(9, 'l zakaria', 'pria', 'Malang', '0865656656', 'lutfi97zakaria@gmail.com'),
(10, 'l zakaria', 'pria', 'Malang', '08656565656', 'lutfi97zakaria@gmail.com'),
(11, 'aviv', 'pria', 'jl mangga', '023748027394', 'a@gmail.com'),
(12, 'l zakaria', 'pria', 'Malang', '0865665656', 'lutfi97zakaria@gmail.com'),
(13, 'l zakaria', 'pria', 'Malang', '086566565', 'lutfi97zakaria@gmail.com'),
(14, 'insan', 'pria', 'jl kawi', '6784784585', 'a@gmail.com'),
(15, 'insan', 'pria', 'jl kawi', '6784784585', 'a@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `tb_peminjaman`
--

CREATE TABLE `tb_peminjaman` (
  `id` int(11) NOT NULL,
  `id_peminjaman` int(11) NOT NULL,
  `id_penempatan` int(11) NOT NULL,
  `jumlah` int(12) NOT NULL,
  `tanggal` date NOT NULL,
  `lama_pinjam` date NOT NULL,
  `keperluan_pinjam` varchar(50) NOT NULL,
  `id_peminjam` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `tag` varchar(5) NOT NULL,
  `kembali` enum('Y','N') DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_peminjaman`
--

INSERT INTO `tb_peminjaman` (`id`, `id_peminjaman`, `id_penempatan`, `jumlah`, `tanggal`, `lama_pinjam`, `keperluan_pinjam`, `id_peminjam`, `username`, `tag`, `kembali`) VALUES
(1, 1, 6, 3, '2018-01-21', '2018-01-25', 'Mau pinjam', 1, 'admin', 'Y', 'Y'),
(2, 2, 6, 2, '2018-01-22', '2018-01-26', 'Pinjam', 4, 'admin', 'Y', 'N'),
(3, 3, 10, 3, '2018-01-22', '2018-01-26', 'Pinjam', 6, 'admin', 'Y', 'N'),
(4, 4, 1, 2, '2018-01-22', '2018-01-24', 'zakaria', 7, 'admin', 'Y', 'N'),
(5, 5, 1, 2, '2018-01-22', '2018-01-24', 'zakaria', 8, 'admin', 'Y', 'N'),
(6, 5, 7, 1, '2018-01-22', '2018-01-24', 'zakaria', 8, 'admin', 'Y', 'N'),
(7, 6, 2, 1, '2018-01-22', '2018-01-24', 'zakaria', 9, 'admin', 'Y', 'N'),
(8, 6, 3, 2, '2018-01-22', '2018-01-24', 'zakaria', 9, 'admin', 'Y', 'N'),
(9, 7, 3, 1, '2018-01-22', '2018-01-24', 'zakaria', 10, 'admin', 'Y', 'N'),
(10, 7, 4, 1, '2018-01-22', '2018-01-24', 'zakaria', 10, 'admin', 'Y', 'N'),
(11, 8, 17, 1, '2018-01-23', '2018-01-21', 'seminar', 11, 'admin', 'Y', 'Y'),
(12, 9, 7, 1, '2018-01-23', '2018-01-25', 'aaaa', 12, 'admin', 'Y', 'N'),
(13, 10, 3, 1, '2018-01-23', '2018-01-26', 'aaa', 13, 'admin', 'Y', 'Y'),
(14, 11, 18, 2, '2018-01-24', '2018-01-10', 'jualan', 14, 'admin', 'Y', 'N'),
(15, 11, 13, 1, '2018-01-24', '2018-01-10', 'jualan', 14, 'admin', 'Y', 'N'),
(16, 12, 13, 1, '2018-01-24', '2018-01-10', 'jualan', 15, 'admin', 'Y', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `tb_peminjaman_array`
--

CREATE TABLE `tb_peminjaman_array` (
  `id` int(11) NOT NULL,
  `tanggal` varchar(50) NOT NULL,
  `id_peminjaman` int(11) NOT NULL,
  `id_penempatan` varchar(25) NOT NULL,
  `jumlah` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_peminjaman_array`
--

INSERT INTO `tb_peminjaman_array` (`id`, `tanggal`, `id_peminjaman`, `id_penempatan`, `jumlah`) VALUES
(1, '2018-01-21', 1, '6', '3'),
(2, '2018-01-22', 2, '6,12', '2,2'),
(3, '2018-01-22', 2, '1', '1'),
(4, '2018-01-22', 2, '6', '4'),
(5, '2018-01-22', 3, '10', '3'),
(6, '2018-01-22', 4, '1', '2'),
(7, '2018-01-22', 5, '1,7', '2,1'),
(8, '2018-01-22', 6, '2,3', '1,2'),
(9, '2018-01-22', 7, '3,4', '1,1'),
(10, '2018-01-23', 8, '17', '1'),
(11, '2018-01-23', 9, '7', '1'),
(12, '2018-01-23', 10, '3', '1'),
(13, '2018-01-24', 11, '18,13', '2,1'),
(14, '2018-01-24', 12, '13', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tb_penempatan`
--

CREATE TABLE `tb_penempatan` (
  `id_penempatan` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `id_ruang` int(3) NOT NULL,
  `jumlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_penempatan`
--

INSERT INTO `tb_penempatan` (`id_penempatan`, `id_barang`, `id_ruang`, `jumlah`) VALUES
(1, 1, 1, 0),
(2, 2, 1, 1),
(3, 3, 1, 1),
(4, 4, 1, 5),
(5, 5, 1, 2),
(6, 6, 1, 10),
(7, 1, 2, 0),
(10, 5, 9, 1),
(11, 7, 1, 31),
(13, 11, 1, 3),
(14, 12, 1, 0),
(15, 13, 1, 0),
(17, 14, 1, 0),
(18, 15, 1, 1),
(19, 14, 16, 1),
(20, 11, 2, 0),
(23, 8, 14, 0),
(24, 18, 1, 0),
(25, 14, 2, 1),
(26, 19, 1, 10),
(28, 18, 2, 2),
(29, 20, 1, 1),
(30, 8, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_pengambilan`
--

CREATE TABLE `tb_pengambilan` (
  `id` int(11) NOT NULL,
  `id_pengambilan` int(12) NOT NULL,
  `username` varchar(20) NOT NULL,
  `pengambil` varchar(50) DEFAULT NULL,
  `tanggal_ambil` date DEFAULT NULL,
  `keperluan` text,
  `id_penempatan` int(12) NOT NULL,
  `jumlah_ambil` int(5) UNSIGNED DEFAULT NULL,
  `tag` varchar(5) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pengambilan`
--

INSERT INTO `tb_pengambilan` (`id`, `id_pengambilan`, `username`, `pengambil`, `tanggal_ambil`, `keperluan`, `id_penempatan`, `jumlah_ambil`, `tag`) VALUES
(1, 1, 'admin', 'fadhil', '2018-01-21', 'nulis', 11, 2, 'Y'),
(2, 2, 'admin', 'gue', '2018-01-22', 'mbuh', 11, 2, 'Y'),
(3, 3, 'admin', 'fadil', '2018-01-23', 'kapur habis', 11, 2, 'Y'),
(4, 3, 'admin', 'fadil', '2018-01-23', 'kapur habis', 11, 2, 'Y'),
(5, 4, 'admin', 'jihan', '2018-01-23', 'seminar', 11, 2, 'Y'),
(6, 4, 'admin', 'jihan', '2018-01-23', 'seminar', 11, 2, 'Y'),
(7, 5, 'admin', 'hui', '2018-01-23', 'hadf', 11, 5, 'Y'),
(8, 6, 'admin', 'itu', '2018-01-23', 'ini', 11, 2, 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pengambilan_array`
--

CREATE TABLE `tb_pengambilan_array` (
  `id` int(11) NOT NULL,
  `tanggal_ambil` date NOT NULL,
  `id_pengambilan` int(12) NOT NULL,
  `id_penempatan` varchar(50) NOT NULL,
  `jumlah_ambil` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pengambilan_array`
--

INSERT INTO `tb_pengambilan_array` (`id`, `tanggal_ambil`, `id_pengambilan`, `id_penempatan`, `jumlah_ambil`) VALUES
(1, '2018-01-21', 1, '11', '2'),
(2, '2018-01-21', 1, '11', '2'),
(3, '2018-01-22', 2, '11', '2'),
(4, '2018-01-23', 3, '11', '2'),
(5, '2018-01-23', 3, '11', '2'),
(6, '2018-01-23', 4, '11', '2'),
(7, '2018-01-23', 4, '11', '2'),
(8, '2018-01-23', 5, '11', '5'),
(9, '2018-01-23', 6, '11', '2');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pengembalian`
--

CREATE TABLE `tb_pengembalian` (
  `id_pengembalian` int(12) NOT NULL,
  `id_peminjaman` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `pengembali` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_ruang`
--

CREATE TABLE `tb_ruang` (
  `id_ruang` int(3) UNSIGNED NOT NULL,
  `id_gedung` int(3) UNSIGNED NOT NULL,
  `nama_ruang` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_ruang`
--

INSERT INTO `tb_ruang` (`id_ruang`, `id_gedung`, `nama_ruang`) VALUES
(1, 1, 'Gudang'),
(2, 1, 'Rusak'),
(3, 3, 'Hall'),
(4, 2, 'Ruang Admin'),
(5, 2, 'Lobi'),
(6, 3, 'Lobi'),
(7, 3, 'Box Room'),
(8, 2, 'Ruang Kerja'),
(9, 2, 'Rest Area'),
(10, 3, 'Kantin'),
(11, 2, 'Ruang Eksekutif'),
(12, 3, 'Waiting Room'),
(13, 5, 'Developer Room'),
(14, 5, 'Admin Room'),
(16, 8, 'kamar tidur'),
(17, 2, 'Kamar Mandi Tamu');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `username` varchar(20) NOT NULL,
  `password` varchar(50) DEFAULT NULL,
  `nama` varchar(20) DEFAULT NULL,
  `level` varchar(10) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`username`, `password`, `nama`, `level`) VALUES
('admin', '21232f297a57a5a743894a0e4a801fc3', 'Admin', 'admin'),
('karyawan', '9e014682c94e0f2cc834bf7348bda428', 'Karyawan', 'karyawan');

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_jenisbarang`
-- (See below for the actual view)
--
CREATE TABLE `v_jenisbarang` (
`id_jenisbarang` int(11)
,`nama_barang` varchar(25)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_pemasok`
-- (See below for the actual view)
--
CREATE TABLE `v_pemasok` (
`id_pemasok` int(3) unsigned
,`nama_pemasok` varchar(100)
);

-- --------------------------------------------------------

--
-- Structure for view `v_jenisbarang`
--
DROP TABLE IF EXISTS `v_jenisbarang`;

CREATE ALGORITHM=UNDEFINED DEFINER=`psg`@`%` SQL SECURITY DEFINER VIEW `v_jenisbarang`  AS  select `tb_jenisbarang`.`id_jenisbarang` AS `id_jenisbarang`,`tb_jenisbarang`.`nama_barang` AS `nama_barang` from `tb_jenisbarang` ;

-- --------------------------------------------------------

--
-- Structure for view `v_pemasok`
--
DROP TABLE IF EXISTS `v_pemasok`;

CREATE ALGORITHM=UNDEFINED DEFINER=`psg`@`%` SQL SECURITY DEFINER VIEW `v_pemasok`  AS  select `tb_pemasok`.`id_pemasok` AS `id_pemasok`,`tb_pemasok`.`nama_pemasok` AS `nama_pemasok` from `tb_pemasok` ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_barang`
--
ALTER TABLE `tb_barang`
  ADD PRIMARY KEY (`id_barang`),
  ADD KEY `id_jenisbarang` (`id_jenisbarang`);

--
-- Indexes for table `tb_gedung`
--
ALTER TABLE `tb_gedung`
  ADD PRIMARY KEY (`id_gedung`);

--
-- Indexes for table `tb_jenisbarang`
--
ALTER TABLE `tb_jenisbarang`
  ADD PRIMARY KEY (`id_jenisbarang`);

--
-- Indexes for table `tb_pemasok`
--
ALTER TABLE `tb_pemasok`
  ADD PRIMARY KEY (`id_pemasok`);

--
-- Indexes for table `tb_peminjam`
--
ALTER TABLE `tb_peminjam`
  ADD PRIMARY KEY (`id_peminjam`);

--
-- Indexes for table `tb_peminjaman`
--
ALTER TABLE `tb_peminjaman`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_penempatan` (`id_penempatan`),
  ADD KEY `id_peminjam` (`id_peminjam`),
  ADD KEY `username` (`username`);

--
-- Indexes for table `tb_peminjaman_array`
--
ALTER TABLE `tb_peminjaman_array`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_penempatan`
--
ALTER TABLE `tb_penempatan`
  ADD PRIMARY KEY (`id_penempatan`),
  ADD KEY `id_barang` (`id_barang`);

--
-- Indexes for table `tb_pengambilan`
--
ALTER TABLE `tb_pengambilan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tb_pengambilan_FKIndex1` (`username`);

--
-- Indexes for table `tb_pengambilan_array`
--
ALTER TABLE `tb_pengambilan_array`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_pengembalian`
--
ALTER TABLE `tb_pengembalian`
  ADD KEY `id_peminjaman` (`id_peminjaman`);

--
-- Indexes for table `tb_ruang`
--
ALTER TABLE `tb_ruang`
  ADD PRIMARY KEY (`id_ruang`),
  ADD KEY `tb_ruang_FKIndex1` (`id_gedung`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_barang`
--
ALTER TABLE `tb_barang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tb_gedung`
--
ALTER TABLE `tb_gedung`
  MODIFY `id_gedung` int(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tb_jenisbarang`
--
ALTER TABLE `tb_jenisbarang`
  MODIFY `id_jenisbarang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tb_pemasok`
--
ALTER TABLE `tb_pemasok`
  MODIFY `id_pemasok` int(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tb_peminjam`
--
ALTER TABLE `tb_peminjam`
  MODIFY `id_peminjam` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tb_peminjaman`
--
ALTER TABLE `tb_peminjaman`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tb_peminjaman_array`
--
ALTER TABLE `tb_peminjaman_array`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tb_penempatan`
--
ALTER TABLE `tb_penempatan`
  MODIFY `id_penempatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `tb_pengambilan`
--
ALTER TABLE `tb_pengambilan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tb_pengambilan_array`
--
ALTER TABLE `tb_pengambilan_array`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tb_pengembalian`
--
ALTER TABLE `tb_pengembalian`
  MODIFY `id_peminjaman` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_ruang`
--
ALTER TABLE `tb_ruang`
  MODIFY `id_ruang` int(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_barang`
--
ALTER TABLE `tb_barang`
  ADD CONSTRAINT `tb_barang_ibfk_1` FOREIGN KEY (`id_jenisbarang`) REFERENCES `tb_jenisbarang` (`id_jenisbarang`);

--
-- Constraints for table `tb_peminjaman`
--
ALTER TABLE `tb_peminjaman`
  ADD CONSTRAINT `tb_peminjaman_ibfk_1` FOREIGN KEY (`id_peminjam`) REFERENCES `tb_peminjam` (`id_peminjam`),
  ADD CONSTRAINT `tb_peminjaman_ibfk_2` FOREIGN KEY (`id_penempatan`) REFERENCES `tb_penempatan` (`id_penempatan`);

--
-- Constraints for table `tb_peminjaman_array`
--
ALTER TABLE `tb_peminjaman_array`
  ADD CONSTRAINT `tb_peminjaman_array_ibfk_1` FOREIGN KEY (`id`) REFERENCES `tb_peminjaman` (`id`);

--
-- Constraints for table `tb_penempatan`
--
ALTER TABLE `tb_penempatan`
  ADD CONSTRAINT `tb_penempatan_ibfk_1` FOREIGN KEY (`id_barang`) REFERENCES `tb_barang` (`id_barang`);

--
-- Constraints for table `tb_pengembalian`
--
ALTER TABLE `tb_pengembalian`
  ADD CONSTRAINT `tb_pengembalian_ibfk_1` FOREIGN KEY (`id_peminjaman`) REFERENCES `tb_peminjam` (`id_peminjam`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
