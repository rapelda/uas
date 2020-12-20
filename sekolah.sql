-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 20, 2020 at 06:38 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sekolah`
--

-- --------------------------------------------------------

--
-- Table structure for table `guru`
--

CREATE TABLE `guru` (
  `idguru` int(11) NOT NULL,
  `namaguru` varchar(100) DEFAULT NULL,
  `nip` varchar(45) DEFAULT NULL,
  `mp` varchar(45) DEFAULT NULL,
  `idjabatan` int(11) DEFAULT NULL,
  `photos` varchar(500) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8;
--
-- Table structure for table `siswa`
--
  CREATE TABLE `siswa` (
  `idsiswa` int(11) NOT NULL,
  `namasiswa` varchar(100) DEFAULT NULL,
  `nis` varchar(45) DEFAULT NULL,
  `idjurusan` int(11) DEFAULT NULL,
  `photos` varchar(500) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL

) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `guru`
--

INSERT INTO `guru` (`idguru`, `namaguru`, `nip`, `mp`, `idjabatan`, `photos`, `email`) VALUES
(2, 'rapelda', '20202001', 'tik', 2, 'inputan y.PNG', 'rapeldaipaatamboen@gmail.com');
--
-- Dumping data for table `siswa`
--
INSERT INTO `siswa` (`idsiswa`, `namasiswa`, `nis`, `idjurusan`, `photos`, `email`) VALUES
(2, 'viona', '28012001', 'ipa', 2, 'inputan y.PNG', 'viona@gmail.com');
-- --------------------------------------------------------

--
-- Table structure for table `jabatan`
--

CREATE TABLE `jabatan` (
  `idjabatan` int(11) NOT NULL,
  `namajabatan` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--Table structure for table `jurusan`
--

CREATE TABLE `jurusan` (
  `idjurusan` int(11) NOT NULL,
  `namajurusan` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
-- Dumping data for table `jabatan`
--

INSERT INTO `jabatan` (`idjabatan`, `namajabatan`) VALUES
(1, 'Kepala Sekolah'),
(2, 'Guru Honorer'),
(3, 'Wakil Kepala Sekolah'),
(4, 'Administrasi'),
(5, 'Sekertaris'),
(6, 'Bendahara'),
(7, 'Kurikulum'),
(8, 'Kepala Tata Usaha'),
(9, 'Kesiswaan'),
(10, 'Sarana & Prasarana'),
(11, 'Hubungan Masyarakat'),
(12, 'Wali Kelas'),
(13, 'Bimbingan Konseling'),
(14, 'Pengelola Labolatorium');

-- --------------------------------------------------------
--
--Dumping data for table `jurusan`
--

INSERT INTO `jurusan` (`idjurusan`, `namajurusan`) VALUES
(1, 'ipa'),
(2, 'ips'),

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `idlogin` int(11) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`idlogin`, `email`, `password`) VALUES
(1, 'rapeldaibpatamboen@gmail.com', '11012001');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`idguru`),
  ADD KEY `fk_guru_jabatan1_idx` (`idjabatan`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`idsiswa`),
  ADD KEY `fk_guru_jabatan1_idx` (`idjurusan`);
--
-- Indexes for table `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`idjabatan`);

--
-- Indexes for table `jurusan`
--
ALTER TABLE `jurusan`
  ADD PRIMARY KEY (`idjurusan`);
--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`idlogin`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `guru`
--
ALTER TABLE `guru`
  MODIFY `idguru` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
--AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `idsiswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `idjabatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `jurusan`

ALTER TABLE `jurusan`
  MODIFY `idjurusan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `idlogin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `guru`
--
ALTER TABLE `guru`
  ADD CONSTRAINT `fk_guru_jabatan1` FOREIGN KEY (`idjabatan`) REFERENCES `jabatan` (`idjabatan`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;
--
--Constraints for table `siswa`
--
ALTER TABLE `siswa`
  ADD CONSTRAINT `fk_siswa_jurusan1` FOREIGN KEY (`idjurusan`) REFERENCES `jurusan` (`idjurusan`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;
--
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
