-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 02, 2021 at 06:54 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbpelaminan`
--
CREATE DATABASE IF NOT EXISTS `dbpelaminan` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `dbpelaminan`;

-- --------------------------------------------------------

--
-- Table structure for table `paket`
--

CREATE TABLE `paket` (
  `id_pkt` varchar(5) NOT NULL,
  `nm_pkt` varchar(30) NOT NULL,
  `hrg` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `paket`
--

INSERT INTO `paket` (`id_pkt`, `nm_pkt`, `hrg`) VALUES
('CnqMW', 'Pelaminan 1', 123000000),
('fQzVM', 'Pelaminan 2', 120000);

-- --------------------------------------------------------

--
-- Table structure for table `perlengkapan`
--

CREATE TABLE `perlengkapan` (
  `id_prl` varchar(5) NOT NULL,
  `id_pkt` varchar(5) NOT NULL,
  `tipe` varchar(1) NOT NULL,
  `nm_prl` varchar(30) NOT NULL,
  `jml` int(11) DEFAULT NULL,
  `sat` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `perlengkapan`
--

INSERT INTO `perlengkapan` (`id_prl`, `id_pkt`, `tipe`, `nm_prl`, `jml`, `sat`) VALUES
('6ey8F', 'CnqMW', '5', 'dgfgdfdgf', 123, 'ee');

-- --------------------------------------------------------

--
-- Table structure for table `pesanan`
--

CREATE TABLE `pesanan` (
  `id_pesanan` varchar(5) NOT NULL,
  `id_user` varchar(5) NOT NULL,
  `id_pkt` varchar(5) NOT NULL,
  `tgl_pes` datetime NOT NULL,
  `tgl_resepsi` date DEFAULT NULL,
  `tgl_pasang` date DEFAULT NULL,
  `tgl_bongkar` date DEFAULT NULL,
  `tgl_akad_nikah` date DEFAULT NULL,
  `alt_pes` varchar(50) NOT NULL,
  `notel` varchar(12) NOT NULL,
  `status_pes` varchar(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pesanan`
--

INSERT INTO `pesanan` (`id_pesanan`, `id_user`, `id_pkt`, `tgl_pes`, `tgl_resepsi`, `tgl_pasang`, `tgl_bongkar`, `tgl_akad_nikah`, `alt_pes`, `notel`, `status_pes`) VALUES
('6mXgI', '55653', 'CnqMW', '2021-07-29 07:24:42', '2021-07-09', '2021-07-09', '2021-07-08', '0000-00-00', '1', '2', '1'),
('BCWK7', '55653', 'fQzVM', '2021-07-29 07:38:38', '2021-07-07', '2021-07-16', '2021-07-23', '0000-00-00', '12', '31', '0'),
('PSN01', 'US001', 'CnqMW', '2021-10-10 00:00:00', '2021-12-10', NULL, NULL, NULL, 'jalan kayupatah nomor 69 jakarta tenggara', '0898765', '1'),
('tJVR0', 'US001', 'fQzVM', '2021-07-26 10:01:19', '2021-07-13', NULL, NULL, NULL, '123', '123', '1'),
('tuDbO', '55653', 'fQzVM', '2021-08-02 06:39:19', '2021-08-02', '2021-08-03', '2021-08-03', '0000-00-00', 'desa kemantan', '0989898', '1');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` varchar(5) NOT NULL,
  `nm_user` varchar(30) NOT NULL,
  `tipe_user` varchar(1) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `kd_ver` varchar(50) NOT NULL,
  `jekel` varchar(1) DEFAULT NULL,
  `verified` varchar(1) NOT NULL,
  `nm_lengkap` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nm_user`, `tipe_user`, `password`, `email`, `kd_ver`, `jekel`, `verified`, `nm_lengkap`) VALUES
('55653', 'sandi_irvan', 'U', '202cb962ac59075b964b07152d234b70', 'sandi.irvan.27.99@gmail.com', 'pFXZOVxjvkBDRNotHBhTXxua8aQvJVIaYmUQqqdppdXCI6dFOH', 'L', '1', 'sandi mhd irvan'),
('ADM-1', 'Admin', 'A', '827ccb0eea8a706c4c34a16891f84e7b', 'abc@gmail.com', '12321', NULL, '1', 'Admin'),
('US001', 'User 2', 'U', '827ccb0eea8a706c4c34a16891f84e7b', 'sandi.irvan.27.99@gmail.com', '12321', NULL, '1', 'User biasa pertamaaaa');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `paket`
--
ALTER TABLE `paket`
  ADD PRIMARY KEY (`id_pkt`);

--
-- Indexes for table `perlengkapan`
--
ALTER TABLE `perlengkapan`
  ADD PRIMARY KEY (`id_prl`);

--
-- Indexes for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`id_pesanan`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
