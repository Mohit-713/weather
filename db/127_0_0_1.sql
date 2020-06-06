-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 06, 2020 at 09:34 AM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `weather`
--
CREATE DATABASE IF NOT EXISTS `weather` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `weather`;

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` int(11) NOT NULL,
  `country` varchar(100) NOT NULL,
  `cityid` bigint(20) NOT NULL,
  `cityname` varchar(100) NOT NULL,
  `userid` int(11) NOT NULL,
  `alert` enum('no','yes') NOT NULL,
  `lon` double NOT NULL,
  `lat` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `country`, `cityid`, `cityname`, `userid`, `alert`, `lon`, `lat`) VALUES
(23, ' TZ', 148842, 'Wete', 10, 'yes', 0, 0),
(24, ' SA', 101344, 'At TÅ«bÄ«', 10, 'no', 0, 0),
(25, ' YE', 30714, 'Zalmat al Alya', 10, 'yes', 0, 0),
(27, ' SY', 163270, 'Å¢ayyibat al ImÄm', 3, 'yes', 0, 0),
(30, ' IQ', 91597, 'SÄmarrÄâ€™', 10, 'no', 0, 0),
(31, ' CY', 145961, 'GerÃ³lakkos', 12, 'yes', 0, 0),
(32, ' YE', 30689, 'Dawran', 12, 'no', 0, 0),
(34, ' SY', 5174, 'â€˜ArÄ«qah', 12, 'no', 0, 0),
(36, ' IN', 1268865, 'Jodhpur', 12, 'no', 0, 0),
(37, ' IN', 1268866, 'Jodhpur', 3, 'no', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password`) VALUES
(3, 'mohit', 'm.kachhwaha713@gmail.com', '25d55ad283aa400af464c76d713c07ad'),
(10, 'divya', 'd.kachhwaha713@gmail.com', '25d55ad283aa400af464c76d713c07ad'),
(11, 'mohit713', 'd.713@gmail.com', '202cb962ac59075b964b07152d234b70'),
(12, 'divya', 'dd.713@gmail.com', '25d55ad283aa400af464c76d713c07ad');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cityid` (`cityid`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
