-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 05, 2020 at 11:00 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbpgn`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `USERNAME` varchar(20) NOT NULL,
  `PASSWORD` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`USERNAME`, `PASSWORD`) VALUES
('admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_booking`
--

CREATE TABLE `tbl_booking` (
  `ID_BOOKING` varchar(20) NOT NULL,
  `ID_KARYAWAN` varchar(20) NOT NULL,
  `ID_JADWAL` int(11) NOT NULL,
  `PERMINTAAN_SLOT` int(11) NOT NULL,
  `CRT_DT` datetime NOT NULL DEFAULT current_timestamp(),
  `STATUS` varchar(20) NOT NULL,
  `VALIDATION_DATE` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_booking`
--

INSERT INTO `tbl_booking` (`ID_BOOKING`, `ID_KARYAWAN`, `ID_JADWAL`, `PERMINTAAN_SLOT`, `CRT_DT`, `STATUS`, `VALIDATION_DATE`) VALUES
('BK00001', '535160039', 2, 5, '2020-08-04 23:00:44', 'Approve', '2020-08-05 22:22:15'),
('BK00002', '535160039', 1, 0, '2020-08-05 14:06:10', 'Approve', '2020-08-05 22:22:31'),
('BK00003', '535160039', 1, 0, '2020-08-05 14:47:55', 'Reject', '2020-08-05 22:22:41'),
('BK00004', '535160039', 1, 0, '2020-08-05 14:55:31', '', '0000-00-00 00:00:00'),
('BK00005', '535160039', 2, 0, '2020-08-05 15:06:31', '', '0000-00-00 00:00:00'),
('BK00006', '535160039', 2, 0, '2020-08-05 15:08:08', '', '0000-00-00 00:00:00'),
('BK00007', '535160039', 2, 0, '2020-08-05 15:08:10', '', '0000-00-00 00:00:00'),
('BK00008', '535160039', 2, 0, '2020-08-05 15:09:46', '', '0000-00-00 00:00:00'),
('BK00009', '535160039', 1, 0, '2020-08-05 15:39:13', '', '0000-00-00 00:00:00'),
('BK00010', '535160039', 2, 0, '2020-08-05 16:29:55', '', '0000-00-00 00:00:00'),
('BK00011', '535160039', 1, 0, '2020-08-05 16:35:31', '', '0000-00-00 00:00:00'),
('BK00012', '535160039', 1, 0, '2020-08-05 16:40:39', '', '0000-00-00 00:00:00'),
('BK00013', '535160039', 2, 0, '2020-08-05 16:43:04', '', '0000-00-00 00:00:00'),
('BK00014', '535160039', 3, 0, '2020-08-05 17:00:19', '', '0000-00-00 00:00:00'),
('BK00015', '535160039', 3, 0, '2020-08-05 17:03:38', '', '0000-00-00 00:00:00'),
('BK00016', '535160039', 3, 0, '2020-08-05 17:04:38', '', '0000-00-00 00:00:00'),
('BK00017', '535160039', 3, 0, '2020-08-05 17:07:19', '', '0000-00-00 00:00:00'),
('BK00018', '535160039', 3, 0, '2020-08-05 17:08:11', '', '0000-00-00 00:00:00'),
('BK00019', '535160039', 1, 0, '2020-08-05 17:08:59', 'Reject', '2020-08-05 21:44:29'),
('BK00020', '535160039', 3, 0, '2020-08-05 19:03:31', 'Approve', '2020-08-05 21:42:34'),
('BK00021', '535160039', 4, 5, '2020-08-06 02:57:17', '', '0000-00-00 00:00:00'),
('BK00022', '535160039', 3, 10, '2020-08-06 02:59:35', 'Menunggu', '0000-00-00 00:00:00'),
('BK00023', '535160039', 3, 6, '2020-08-06 03:14:52', 'Menunggu', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jadwal_keberangkatan`
--

CREATE TABLE `tbl_jadwal_keberangkatan` (
  `ID_JADWAL` int(11) NOT NULL,
  `ID_RUTE` int(11) NOT NULL,
  `DATE` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_jadwal_keberangkatan`
--

INSERT INTO `tbl_jadwal_keberangkatan` (`ID_JADWAL`, `ID_RUTE`, `DATE`) VALUES
(1, 1, '2020-08-17 10:00:00'),
(2, 1, '2020-08-17 13:00:00'),
(3, 2, '2020-08-17 10:00:00'),
(4, 3, '2020-08-17 10:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_karyawan`
--

CREATE TABLE `tbl_karyawan` (
  `ID_KARYAWAN` varchar(20) NOT NULL,
  `NAMA_KARYAWAN` varchar(100) NOT NULL,
  `ACTIVE` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_karyawan`
--

INSERT INTO `tbl_karyawan` (`ID_KARYAWAN`, `NAMA_KARYAWAN`, `ACTIVE`) VALUES
('535160039', 'Yosua', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kendaraan`
--

CREATE TABLE `tbl_kendaraan` (
  `ID_KENDARAAN` int(11) NOT NULL,
  `NAMA_KENDARAAN` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_kendaraan`
--

INSERT INTO `tbl_kendaraan` (`ID_KENDARAAN`, `NAMA_KENDARAAN`) VALUES
(1, 'Bis'),
(2, 'Kapal'),
(3, 'Pesawat');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_rute`
--

CREATE TABLE `tbl_rute` (
  `ID_RUTE` int(11) NOT NULL,
  `ID_KENDARAAN` int(11) NOT NULL,
  `BERANGKAT` varchar(50) NOT NULL,
  `TUJUAN` varchar(50) NOT NULL,
  `TOTAL_SLOT` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_rute`
--

INSERT INTO `tbl_rute` (`ID_RUTE`, `ID_KENDARAAN`, `BERANGKAT`, `TUJUAN`, `TOTAL_SLOT`) VALUES
(1, 1, 'Jakarta', 'Bogor', 20),
(2, 2, 'Jakarta', 'Bandung', 25),
(3, 3, 'Jakarta', 'Sambas', 0),
(4, 2, 'Jakarta', 'Sambas', 0),
(5, 1, 'Jakarta', 'Surabaya', 15);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tiket`
--

CREATE TABLE `tbl_tiket` (
  `KODE_TIKET` varchar(20) NOT NULL,
  `ID_BOOKING` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_tiket`
--

INSERT INTO `tbl_tiket` (`KODE_TIKET`, `ID_BOOKING`) VALUES
('TK00001', 'BK00001'),
('TK00002', 'BK00002');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`USERNAME`);

--
-- Indexes for table `tbl_booking`
--
ALTER TABLE `tbl_booking`
  ADD PRIMARY KEY (`ID_BOOKING`),
  ADD KEY `const_id_karyawan` (`ID_KARYAWAN`),
  ADD KEY `const_id_jadwal` (`ID_JADWAL`);

--
-- Indexes for table `tbl_jadwal_keberangkatan`
--
ALTER TABLE `tbl_jadwal_keberangkatan`
  ADD PRIMARY KEY (`ID_JADWAL`),
  ADD KEY `const_id_rute` (`ID_RUTE`);

--
-- Indexes for table `tbl_karyawan`
--
ALTER TABLE `tbl_karyawan`
  ADD PRIMARY KEY (`ID_KARYAWAN`);

--
-- Indexes for table `tbl_kendaraan`
--
ALTER TABLE `tbl_kendaraan`
  ADD PRIMARY KEY (`ID_KENDARAAN`);

--
-- Indexes for table `tbl_rute`
--
ALTER TABLE `tbl_rute`
  ADD PRIMARY KEY (`ID_RUTE`);

--
-- Indexes for table `tbl_tiket`
--
ALTER TABLE `tbl_tiket`
  ADD PRIMARY KEY (`KODE_TIKET`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_jadwal_keberangkatan`
--
ALTER TABLE `tbl_jadwal_keberangkatan`
  MODIFY `ID_JADWAL` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_kendaraan`
--
ALTER TABLE `tbl_kendaraan`
  MODIFY `ID_KENDARAAN` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_rute`
--
ALTER TABLE `tbl_rute`
  MODIFY `ID_RUTE` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_booking`
--
ALTER TABLE `tbl_booking`
  ADD CONSTRAINT `const_id_jadwal` FOREIGN KEY (`ID_JADWAL`) REFERENCES `tbl_jadwal_keberangkatan` (`ID_JADWAL`),
  ADD CONSTRAINT `const_id_karyawan` FOREIGN KEY (`ID_KARYAWAN`) REFERENCES `tbl_karyawan` (`ID_KARYAWAN`);

--
-- Constraints for table `tbl_jadwal_keberangkatan`
--
ALTER TABLE `tbl_jadwal_keberangkatan`
  ADD CONSTRAINT `const_id_rute` FOREIGN KEY (`ID_RUTE`) REFERENCES `tbl_rute` (`ID_RUTE`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
