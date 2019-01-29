-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 29, 2019 at 03:45 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `smcg_database`
--

-- --------------------------------------------------------

--
-- Table structure for table `Business`
--

CREATE TABLE `Business` (
  `id` int(11) NOT NULL,
  `businessname` varchar(100) NOT NULL,
  `city` varchar(40) NOT NULL,
  `state` varchar(30) NOT NULL,
  `addressline1` text NOT NULL,
  `addressline2` text NOT NULL,
  `postalcode` varchar(15) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `status` int(2) NOT NULL DEFAULT '0',
  `timestamp` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Business`
--

INSERT INTO `Business` (`id`, `businessname`, `city`, `state`, `addressline1`, `addressline2`, `postalcode`, `phone`, `mobile`, `status`, `timestamp`) VALUES
(1, 'My Play Studios', 'Thrissur', 'Kerala', 'East Fort, Thrissur', '', '680005', 'loooolk', '', 0, 1548182211);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(4) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL,
  `role` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fullname`, `username`, `email`, `password`, `role`) VALUES
(2, 'qwe', 'qwe', 'qwe', 'qwe', 'qwe'),
(3, 'check', 'check', 'check', 'check', 'check user'),
(4, '235423423', 'check', 'check', 'check user', ''),
(5, 'check2', 'check', 'check', 'check', 'check user'),
(6, 'check2333', 'check', 'check', 'check', 'check user'),
(7, 'check23334', 'check', 'check', 'check', 'check user'),
(8, 'check233345', 'check', 'check', 'check', 'check user'),
(9, 'check2333456', 'check', 'check', 'check', 'check user'),
(10, 'check23334567', 'check', 'check', 'check', 'check user'),
(11, 'check233345678', 'check', 'check', 'check', 'check user'),
(12, '89089089', 'check', 'check', 'check', 'check user'),
(14, 'bullshit', 'bullshit', 'bullshit', 'bullshit', 'bullshit'),
(15, 'qweqwe', '', '', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Business`
--
ALTER TABLE `Business`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Business`
--
ALTER TABLE `Business`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
