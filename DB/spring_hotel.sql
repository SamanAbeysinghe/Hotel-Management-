-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 22, 2021 at 05:46 AM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spring_hotel`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `username` varchar(25) NOT NULL,
  `pass` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `pass`) VALUES
('admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `package_reserve`
--

CREATE TABLE `package_reserve` (
  `Pack_re_ID` int(11) NOT NULL,
  `package` varchar(25) CHARACTER SET utf8 NOT NULL,
  `date` date NOT NULL,
  `days` int(15) NOT NULL,
  `adults` int(15) NOT NULL,
  `chil12` int(15) NOT NULL,
  `chil5` int(15) NOT NULL,
  `email` varchar(30) CHARACTER SET utf8 NOT NULL,
  `Price` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `id` int(20) NOT NULL,
  `F_Name` varchar(50) CHARACTER SET utf8 NOT NULL,
  `L_Name` varchar(50) CHARACTER SET utf8 NOT NULL,
  `Email` varchar(50) CHARACTER SET utf8 NOT NULL,
  `country` varchar(30) CHARACTER SET utf8 NOT NULL,
  `code` int(20) NOT NULL,
  `address` varchar(30) CHARACTER SET utf8 NOT NULL,
  `phone` int(20) NOT NULL,
  `pass` varchar(50) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE `reservation` (
  `Reservation_ID` int(20) NOT NULL,
  `date` date NOT NULL,
  `days` int(20) NOT NULL,
  `type` varchar(25) NOT NULL,
  `email` varchar(30) NOT NULL,
  `Price` int(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `type` varchar(20) CHARACTER SET utf8 NOT NULL,
  `number_of_rooms` int(11) NOT NULL,
  `available` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`type`, `number_of_rooms`, `available`) VALUES
('Double', 4, -1),
('Junior Suite', 2, -3),
('Single', 3, -3),
('Triple', 2, -1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `package_reserve`
--
ALTER TABLE `package_reserve`
  ADD PRIMARY KEY (`Pack_re_ID`),
  ADD KEY `email` (`email`),
  ADD KEY `email_2` (`email`);

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`Email`),
  ADD UNIQUE KEY `id` (`id`) USING BTREE;

--
-- Indexes for table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`Reservation_ID`),
  ADD KEY `email` (`email`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`type`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `package_reserve`
--
ALTER TABLE `package_reserve`
  MODIFY `Pack_re_ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `registration`
--
ALTER TABLE `registration`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `Reservation_ID` int(20) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `package_reserve`
--
ALTER TABLE `package_reserve`
  ADD CONSTRAINT `package_reserve_ibfk_1` FOREIGN KEY (`email`) REFERENCES `registration` (`Email`);

--
-- Constraints for table `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `reservation_ibfk_1` FOREIGN KEY (`email`) REFERENCES `package_reserve` (`email`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
