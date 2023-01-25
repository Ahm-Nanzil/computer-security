-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 25, 2022 at 05:46 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `login`
--

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `ID` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` int(11) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`ID`, `username`, `password`, `role`, `email`, `status`) VALUES
(2, 'hasib', '1234', 1, '', ''),
(3, 'nanzil', '--nanzil 1', NULL, '', ''),
(4, 'admin', 'admin', 1, 'admin@gmail.com', ''),
(5, 'user', 'user', 2, 'user@gmail.com', 'active'),
(6, 'user2', 'user2', 2, 'user2@gmail.com', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `userlog`
--

CREATE TABLE `userlog` (
  `ID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `timeLogin` datetime DEFAULT NULL,
  `timeLogout` datetime DEFAULT NULL,
  `IPaddress` varchar(15) DEFAULT NULL,
  `otp` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `userlog`
--

INSERT INTO `userlog` (`ID`, `userID`, `timeLogin`, `timeLogout`, `IPaddress`, `otp`) VALUES
(53, 4, '2022-12-22 16:54:37', '2022-12-22 16:55:02', '::1', 9176),
(54, 2, '2022-12-22 17:30:51', NULL, '::1', 8251),
(55, 5, '2022-12-22 17:33:24', NULL, '::1', 2172),
(56, 2, '2022-12-25 19:40:37', '2022-12-25 20:23:27', '::1', 7414),
(57, 4, '2022-12-25 20:35:33', NULL, '::1', 8340),
(58, 4, '2022-12-25 20:36:59', NULL, '::1', 6026),
(59, 2, '2022-12-25 20:37:44', '2022-12-25 20:37:51', '::1', 7888),
(60, 5, '2022-12-25 20:38:55', NULL, '127.0.0.1', 3566),
(61, 4, '2022-12-25 20:39:12', '2022-12-25 20:39:24', '127.0.0.1', 6178),
(62, 4, '2022-12-25 20:59:50', NULL, '::1', 6010),
(63, 4, '2022-12-25 21:11:51', NULL, '::1', 6899),
(64, 5, '2022-12-25 21:12:04', NULL, '::1', 3174),
(65, 6, '2022-12-25 21:43:07', NULL, '127.0.0.1', 4909),
(66, 6, '2022-12-25 21:44:49', NULL, '127.0.0.1', 6158),
(67, 6, '2022-12-25 21:49:26', NULL, '::1', 1919),
(68, 4, '2022-12-25 21:55:25', NULL, '::1', 9303),
(69, 6, '2022-12-25 21:58:47', NULL, '127.0.0.1', 3718),
(70, 6, '2022-12-25 22:09:54', NULL, '127.0.0.1', 8250),
(71, 6, '2022-12-25 22:15:00', NULL, '::1', 4333),
(72, 6, '2022-12-25 22:17:18', NULL, '127.0.0.1', 5096),
(73, 6, '2022-12-25 22:18:04', NULL, '127.0.0.1', 3507),
(74, 6, '2022-12-25 22:18:50', '2022-12-25 22:19:21', '127.0.0.1', 6324),
(75, 6, '2022-12-25 22:20:27', '2022-12-25 22:20:42', '127.0.0.1', 1762),
(76, 4, '2022-12-25 22:22:28', '2022-12-25 22:26:48', '127.0.0.1', 8377),
(77, 5, '2022-12-25 22:24:40', NULL, '::1', 9437),
(78, 4, '2022-12-25 22:28:01', NULL, '127.0.0.1', 6053),
(79, 4, '2022-12-25 22:28:35', '2022-12-25 22:29:22', '::1', 9493),
(80, 5, '2022-12-25 22:29:58', NULL, '127.0.0.1', 2503),
(81, 6, '2022-12-25 22:30:23', '2022-12-25 22:30:38', '127.0.0.1', 7387),
(82, 6, '2022-12-25 22:30:47', NULL, '127.0.0.1', 2721),
(83, 5, '2022-12-25 22:31:16', NULL, '127.0.0.1', 7107),
(84, 5, '2022-12-25 22:31:45', NULL, '::1', 7963);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `ID` (`ID`);

--
-- Indexes for table `userlog`
--
ALTER TABLE `userlog`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `userlog`
--
ALTER TABLE `userlog`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
