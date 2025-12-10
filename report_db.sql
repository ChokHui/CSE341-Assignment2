-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 10, 2025 at 06:28 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `report_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(255) NOT NULL,
  `user` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `user`, `username`, `password`, `role`) VALUES
(1, 'CHOK YING HUI', 'chok', '123', 'admin'),
(2, 'CHOK YING YING', 'chok03', '123456', 'admin'),
(3, 'may fen', 'mayfen', '456', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `reportNo` varchar(20) NOT NULL,
  `tradingName` varchar(255) NOT NULL,
  `lotNo` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contactNo` varchar(255) NOT NULL,
  `complaintCat` varchar(255) NOT NULL,
  `details` varchar(255) NOT NULL,
  `attach1` varchar(255) NOT NULL,
  `attach2` varchar(255) NOT NULL,
  `attach3` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`reportNo`, `tradingName`, `lotNo`, `email`, `contactNo`, `complaintCat`, `details`, `attach1`, `attach2`, `attach3`) VALUES
('2147483647', 'PADINI', 'G-03', 'amberchok73@gmail.com', '010-9302227', 'Toilet', 'hello testing... In this less common approach, the raw binary data of the image is saved directly inside a database table using a Binary Large Object (BLOB) data type.', 'Picture9.png', 'POS-Hardware-Components.png', 'Screenshot 2025-10-22 154814.png'),
('2147483647', 'PADINI', 'G-03', 'chokamber@gmail.com', '010-9302227', 'Elevator', 'testing', 'Screenshot 2025-10-21 233644.png', 'Screenshot 2025-10-21 231843.png', 'Screenshot 2025-10-21 231759.png'),
('251024201557', 'PADINI', 'G-03', 'chokamber@gmail.com', '010-9302227', 'Maintenance', 'testing 2', 'Screenshot 2025-10-22 154814.png', 'Screenshot 2025-10-24 192632.png', 'Screenshot 2025-10-21 233644.png'),
('251025203855', 'PADINI', 'G-03', 'chokamber@gmail.com', '010-9302227', 'Elevator', 'hello testing testing', 'Screenshot 2025-10-21 231759.png', 'Screenshot 2025-10-21 233644.png', 'Screenshot 2025-10-24 221854.png'),
('251025203859', 'PADINI', 'G-03', 'chokamber@gmail.com', '010-9302227', 'Elevator', 'hello testing testing', 'Screenshot 2025-10-21 231759.png', 'Screenshot 2025-10-21 233644.png', 'Screenshot 2025-10-24 221854.png'),
('251025225500', 'JD Sports', 'G-11, G-12, G-13', 'chokamber@gmail.com', '010-9302227', 'GAS', 'testing again', 'Screenshot 2025-10-24 225734.png', 'Screenshot 2025-10-25 205652.png', 'Screenshot 2025-10-25 220439.png'),
('251113150431', 'Cotton On', 'G-04, G-05', 'amberchok73@gmail.com', '010-9302227', 'AC', 'hello', 'Screenshot 2025-10-21 231759.png', 'Screenshot 2025-10-25 220439.png', 'Screenshot 2025-10-24 225734.png'),
('251113150435', 'Cotton On', 'G-04, G-05', 'amberchok73@gmail.com', '010-9302227', 'AC', 'hello', 'Screenshot 2025-10-21 231759.png', 'Screenshot 2025-10-25 220439.png', 'Screenshot 2025-10-24 225734.png');

-- --------------------------------------------------------

--
-- Table structure for table `tenant`
--

CREATE TABLE `tenant` (
  `tenantID` int(255) NOT NULL,
  `tradingName` varchar(255) NOT NULL,
  `lotNo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tenant`
--

INSERT INTO `tenant` (`tenantID`, `tradingName`, `lotNo`) VALUES
(1, 'PADINI', 'G-03'),
(2, 'Cotton On', 'G-04, G-05'),
(3, 'JD Sports', 'G-11, G-12, G-13');

-- --------------------------------------------------------

--
-- Table structure for table `updated`
--

CREATE TABLE `updated` (
  `reportNo` varchar(20) NOT NULL,
  `status` varchar(255) NOT NULL,
  `commentBy` varchar(1000) NOT NULL,
  `details` varchar(10000) NOT NULL,
  `date` varchar(255) NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `updated`
--

INSERT INTO `updated` (`reportNo`, `status`, `commentBy`, `details`, `date`) VALUES
('2147483647', 'In Progress', 'CHOK YING HUI', 'in progress', '2025-10-24 19:09:22'),
('251024201557', 'Pending', 'CHOK YING HUI', 'we will fix it asap', '2025-10-24 20:35:29'),
('251025203859', '---', 'Tenant', 'wait so late havent take any action!!!!!!', '2025-10-25 20:40:34'),
('251025203859', 'Completed', 'CHOK YING YING', 'done!', '2025-10-25 20:44:34');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tenant`
--
ALTER TABLE `tenant`
  ADD PRIMARY KEY (`tenantID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tenant`
--
ALTER TABLE `tenant`
  MODIFY `tenantID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
