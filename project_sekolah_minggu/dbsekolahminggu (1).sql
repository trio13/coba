-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 26, 2016 at 10:25 AM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbsekolahminggu`
--

-- --------------------------------------------------------

--
-- Table structure for table `tabsen`
--

CREATE TABLE `tabsen` (
  `kd_absen` int(20) NOT NULL,
  `tgl` date NOT NULL,
  `kd_anak` int(20) NOT NULL,
  `kd_kls` int(2) NOT NULL,
  `kd_guru` int(10) NOT NULL,
  `tes` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tabsen`
--

INSERT INTO `tabsen` (`kd_absen`, `tgl`, `kd_anak`, `kd_kls`, `kd_guru`, `tes`) VALUES
(1, '2016-11-26', 1, 1, 2, ''),
(2, '2016-11-26', 1, 1, 2, ''),
(3, '2016-11-26', 1, 1, 2, 'tes'),
(4, '2016-11-26', 1, 1, 2, 'tes'),
(5, '2016-11-26', 1, 1, 2, 'tes'),
(6, '2016-11-26', 1, 1, 2, '5');

-- --------------------------------------------------------

--
-- Table structure for table `tkelas`
--

CREATE TABLE `tkelas` (
  `kd_kls` int(10) NOT NULL,
  `nama_kelas` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tkelas`
--

INSERT INTO `tkelas` (`kd_kls`, `nama_kelas`) VALUES
(1, 'aaaa'),
(2, 'bbbb'),
(3, 'cccc');

-- --------------------------------------------------------

--
-- Table structure for table `tmateri`
--

CREATE TABLE `tmateri` (
  `kd_materi` int(3) NOT NULL,
  `tgl` date NOT NULL,
  `materi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tsm`
--

CREATE TABLE `tsm` (
  `kd_anak` int(10) NOT NULL,
  `nama` varchar(15) NOT NULL,
  `kd_kelas` int(11) NOT NULL,
  `jenis_kelamin` varchar(4) NOT NULL,
  `alamat` varchar(15) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `foto` varchar(0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tsm`
--

INSERT INTO `tsm` (`kd_anak`, `nama`, `kd_kelas`, `jenis_kelamin`, `alamat`, `tgl_lahir`, `foto`) VALUES
(1, 'a', 1, 'p', 'abc', '2016-10-28', ''),
(2, 'b', 1, 'w', 'asd', '2016-10-28', ''),
(3, 'c', 1, 'p', 'aabb', '2016-10-28', ''),
(4, 'd', 2, 'p', 'aqq', '2016-10-28', ''),
(5, 'fffg', 1, 'w', 'tan', '2016-10-20', '');

-- --------------------------------------------------------

--
-- Table structure for table `tuser`
--

CREATE TABLE `tuser` (
  `kd_user` int(10) NOT NULL,
  `nama_user` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `status` varchar(10) NOT NULL,
  `kd_kelas` int(2) NOT NULL,
  `jenis_kelamin` varchar(4) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `email` varchar(20) NOT NULL,
  `foto` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tuser`
--

INSERT INTO `tuser` (`kd_user`, `nama_user`, `password`, `status`, `kd_kelas`, `jenis_kelamin`, `tgl_lahir`, `email`, `foto`) VALUES
(1, 'admin', 'admin', 'admin', 0, 'p', '2016-10-28', 'admin@gmail.com', ''),
(2, 'guru', 'guru', 'guru', 1, 'p', '2016-10-28', 'guru@gmail.com', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tabsen`
--
ALTER TABLE `tabsen`
  ADD PRIMARY KEY (`kd_absen`),
  ADD KEY `kd_anak` (`kd_anak`),
  ADD KEY `kd_guru` (`kd_guru`),
  ADD KEY `kd_kls` (`kd_kls`);

--
-- Indexes for table `tkelas`
--
ALTER TABLE `tkelas`
  ADD PRIMARY KEY (`kd_kls`);

--
-- Indexes for table `tsm`
--
ALTER TABLE `tsm`
  ADD PRIMARY KEY (`kd_anak`);

--
-- Indexes for table `tuser`
--
ALTER TABLE `tuser`
  ADD PRIMARY KEY (`kd_user`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tabsen`
--
ALTER TABLE `tabsen`
  ADD CONSTRAINT `tabsen_ibfk_1` FOREIGN KEY (`kd_anak`) REFERENCES `tsm` (`kd_anak`),
  ADD CONSTRAINT `tabsen_ibfk_2` FOREIGN KEY (`kd_guru`) REFERENCES `tuser` (`kd_user`),
  ADD CONSTRAINT `tabsen_ibfk_3` FOREIGN KEY (`kd_kls`) REFERENCES `tkelas` (`kd_kls`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
