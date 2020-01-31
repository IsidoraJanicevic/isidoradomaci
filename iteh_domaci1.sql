-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 17, 2019 at 10:12 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `iteh6`
--

-- --------------------------------------------------------

--
-- Table structure for table `drzava`
--

CREATE TABLE `drzava` (
  `iddrzave` int(20) NOT NULL,
  `nazivdrzave` varchar(45) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `drzava`
--

INSERT INTO `drzava` (`iddrzave`, `nazivdrzave`) VALUES
(1, 'United Kingdom'),
(2, 'Francuska'),
(3, 'Spanija');

-- --------------------------------------------------------

--
-- Table structure for table `fabrika`
--

CREATE TABLE `fabrika` (
  `idfabrike` int(20) NOT NULL,
  `nazivfabrike` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `drzava` varchar(45) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `fabrika`
--

INSERT INTO `fabrika` (`idfabrike`, `nazivfabrike`, `drzava`) VALUES
(1, 'Jimmy Choo', 'United Kingdom'),
(2, 'Louboutin', 'Francuska'),
(3, 'Manolo Blahnik', 'Spanija');

-- --------------------------------------------------------

--
-- Table structure for table `cipele`
--

CREATE TABLE `cipele` (
  `idmodela` int(20) NOT NULL,
  `model` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `tip` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `nota` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `iddrzave` int(20) NOT NULL,
  `idfabrike` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `cipele`
--

INSERT INTO `cipele` (`idmodela`, `model`, `tip`, `nota`, `iddrzave`, `idfabrike`) VALUES
(17, 'Jimmy Choo', 'minori', 'black', 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `drzava`
--
ALTER TABLE `drzava`
  ADD PRIMARY KEY (`iddrzave`);

--
-- Indexes for table `fabrika`
--
ALTER TABLE `fabrika`
  ADD PRIMARY KEY (`idfabrike`);

--
-- Indexes for table `parfemi`
--
ALTER TABLE `cipele`
  ADD PRIMARY KEY (`idmodela`),
  ADD KEY `fk_iddrzave` (`iddrzave`),
  ADD KEY `fk_idfabrike` (`idfabrike`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `drzava`
--
ALTER TABLE `drzava`
  MODIFY `iddrzave` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `fabrika`
--
ALTER TABLE `fabrika`
  MODIFY `idfabrike` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `cipele`
--
ALTER TABLE `cipele`
  MODIFY `idmodela` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `cipele`
--
ALTER TABLE `cipele`
  ADD CONSTRAINT `fk_iddrzave` FOREIGN KEY (`iddrzave`) REFERENCES `drzava` (`iddrzave`),
  ADD CONSTRAINT `fk_idfabrike` FOREIGN KEY (`idfabrike`) REFERENCES `fabrika` (`idfabrike`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
