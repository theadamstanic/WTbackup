-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 16, 2017 at 06:00 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `adamstanicspirala_db`
--
CREATE DATABASE IF NOT EXISTS `adamstanicspirala_db` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `adamstanicspirala_db`;

-- --------------------------------------------------------

--
-- Table structure for table `artikli`
--

CREATE TABLE `artikli` (
  `id` int(11) NOT NULL,
  `naziv` varchar(200) NOT NULL,
  `cijena` varchar(20) NOT NULL,
  `ikona` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `artikli`
--

INSERT INTO `artikli` (`id`, `naziv`, `cijena`, `ikona`) VALUES
(1, 'Asus nVidia GeForce GT710', '215.00 KM', 'http://imtec.ba/141998-large_default/asus-nvidia-geforce-gt710-silent-1gb-ddr3.jpg'),
(2, 'Asus nVidia GeForce GT730', '122.00 KM', 'http://imtec.ba/5021-large_default/asus-nvidia-geforce-gt730-1gd3-gt730-sl-1gd3-brk.jpg'),
(3, 'Gigabyte nVidia GeForce GT730', '414.00 KM', 'http://imtec.ba/2752-large_default/gigabyte-nvidia-geforce-gt730-2gb-ddr3-gv-n730-2gi.jpg'),
(4, 'Gigabyte nVidia GeForce GT740', '215.00 KM', 'http://imtec.ba/43752-home_default/intel-core-i3-4160-3-6-ghz-lga1150-box.jpg'),
(5, 'Asus AMD Radeon Strix', '215.00 KM', 'http://imtec.ba/142082-large_default/asus-amd-radeon-strix-rx460-gaming-4gb-ddr5.jpg'),
(6, 'Asus Strix AMD Radeon', '215.00 KM', 'http://imtec.ba/3696-large_default/asus-strix-amd-radeon-r7-370-2gb-ddr5-gaming.jpg'),
(7, 'naziv1', '215.00 KM', 'https://cdn4.iconfinder.com/data/icons/computer-hardware/512/RAM.png'),
(8, 'naziv2', '215.00 KM', 'http://imtec.ba/43752-home_default/intel-core-i3-4160-3-6-ghz-lga1150-box.jpg'),
(9, 'naziv3', '215.00 KM', 'https://cdn4.iconfinder.com/data/icons/computer-hardware/512/RAM.png'),
(10, 'naziv4', '215.00 KM', 'https://cdn4.iconfinder.com/data/icons/computer-hardware/512/RAM.png'),
(11, 'VGA GIGABYTE nVIDIA GV-N210SL-1GI', '215.00 KM', 'http://www.plus.ba/assets/products/vga_gigabyte_amd_gv-r724oc-2gi_201.jpg'),
(12, 'VGA GIGABYTE AMD GV-R724OC-2GI 2.1', '215.00 KM', 'http://www.plus.ba/assets/products/vga_gigabyte_amd_gv-r724oc-2gi_201.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `korisnici`
--

CREATE TABLE `korisnici` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `ime` varchar(20) NOT NULL,
  `prezime` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `tip` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `korisnici`
--

INSERT INTO `korisnici` (`id`, `username`, `ime`, `prezime`, `password`, `tip`, `email`) VALUES
(1, 'Adam', 'Ad', 'Stanic', 'aaaaa1', 'admin', 'astanic@etf.unsa.ba'),
(2, 'Irfan', 'Irf', 'Prazina', 'aaaaa1', 'admin', 'irfo@etf.unsa.ba'),
(3, 'Vensada', 'Vens', 'Okanovic', 'aaaaa1', 'obicni', 'vensada@etf.unsa.ba'),
(4, 'asd', 'asads', 'Nesto', 'asd123', 'obicni', 'adam@yahoo.com'),
(5, 'Adama', 'Kerim', 'Kerim', 'aaaaa1', 'admin', 'kerim@aaa.aa');

-- --------------------------------------------------------

--
-- Table structure for table `narudzbe`
--

CREATE TABLE `narudzbe` (
  `id` int(11) NOT NULL,
  `artikal` int(11) NOT NULL,
  `korisnik` int(11) NOT NULL,
  `kolicina` int(11) NOT NULL,
  `datum` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `narudzbe`
--

INSERT INTO `narudzbe` (`id`, `artikal`, `korisnik`, `kolicina`, `datum`) VALUES
(1, 2, 5, 2, '2016-01-17'),
(2, 3, 5, 1, '2016-01-17');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `artikli`
--
ALTER TABLE `artikli`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `korisnici`
--
ALTER TABLE `korisnici`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `narudzbe`
--
ALTER TABLE `narudzbe`
  ADD PRIMARY KEY (`id`),
  ADD KEY `korisnik` (`korisnik`),
  ADD KEY `artikal` (`artikal`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `artikli`
--
ALTER TABLE `artikli`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `korisnici`
--
ALTER TABLE `korisnici`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `narudzbe`
--
ALTER TABLE `narudzbe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `narudzbe`
--
ALTER TABLE `narudzbe`
  ADD CONSTRAINT `narudzbe_ibfk_1` FOREIGN KEY (`korisnik`) REFERENCES `korisnici` (`id`),
  ADD CONSTRAINT `narudzbe_ibfk_2` FOREIGN KEY (`artikal`) REFERENCES `artikli` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
