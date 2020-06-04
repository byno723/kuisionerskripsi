-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 31, 2020 at 09:33 AM
-- Server version: 10.1.40-MariaDB
-- PHP Version: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbskripsi`
--

-- --------------------------------------------------------

--
-- Table structure for table `hasilrespon`
--

CREATE TABLE `hasilrespon` (
  `id_respon` int(11) NOT NULL,
  `id_pernyataan` int(11) NOT NULL,
  `id_responden` varchar(20) NOT NULL,
  `hasil` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hasilrespon`
--

INSERT INTO `hasilrespon` (`id_respon`, `id_pernyataan`, `id_responden`, `hasil`) VALUES
(108, 3, 'RSP531032020001', '5'),
(109, 4, 'RSP531032020001', '4'),
(110, 5, 'RSP531032020001', '5'),
(111, 6, 'RSP531032020001', '5'),
(112, 7, 'RSP531032020001', '4'),
(113, 8, 'RSP531032020001', '5'),
(114, 9, 'RSP531032020001', '5'),
(115, 10, 'RSP531032020001', '5'),
(116, 11, 'RSP531032020001', '5'),
(117, 12, 'RSP531032020001', '4'),
(118, 13, 'RSP531032020001', '5');

-- --------------------------------------------------------

--
-- Table structure for table `pernyataan`
--

CREATE TABLE `pernyataan` (
  `id_pernyataan` int(11) NOT NULL,
  `isi` longtext NOT NULL,
  `kategori` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `responden`
--

CREATE TABLE `responden` (
  `id_responden` varchar(20) NOT NULL,
  `nama_responden` varchar(100) NOT NULL,
  `pekerjaan` varchar(100) NOT NULL,
  `umur` varchar(10) NOT NULL,
  `jenkel` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `responden`
--

INSERT INTO `responden` (`id_responden`, `nama_responden`, `pekerjaan`, `umur`, `jenkel`) VALUES
('RSP531032020001', 'obin', 'Mahasiswa', '23', 'Laki laki');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama_user` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama_user`, `email`, `password`) VALUES
(2, 'gorbyno', 'bynogan@gmail.com', '$2y$10$lRD8btqaMW6tgPoIog6E6uR1CgEmtjceA/bAdnS.jqqddzqKeiQUK');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `hasilrespon`
--
ALTER TABLE `hasilrespon`
  ADD PRIMARY KEY (`id_respon`);

--
-- Indexes for table `pernyataan`
--
ALTER TABLE `pernyataan`
  ADD PRIMARY KEY (`id_pernyataan`);

--
-- Indexes for table `responden`
--
ALTER TABLE `responden`
  ADD PRIMARY KEY (`id_responden`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `hasilrespon`
--
ALTER TABLE `hasilrespon`
  MODIFY `id_respon` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=119;

--
-- AUTO_INCREMENT for table `pernyataan`
--
ALTER TABLE `pernyataan`
  MODIFY `id_pernyataan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
