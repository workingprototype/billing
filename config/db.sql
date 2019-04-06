-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 06, 2019 at 02:47 PM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.2.9

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
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `creationDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updationDate` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `creationDate`, `updationDate`) VALUES
(1, 'admin', 'f925916e2754e5e03f75dd58a5733251', '2017-01-24 16:21:18', '21-06-2018 08:27:55 PM');

-- --------------------------------------------------------

--
-- Table structure for table `beat`
--

CREATE TABLE `beat` (
  `id` int(11) NOT NULL,
  `beat` varchar(255) DEFAULT NULL,
  `creationDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updationDate` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `beat`
--

INSERT INTO `beat` (`id`, `beat`, `creationDate`, `updationDate`) VALUES
(25, 'sdf', '2019-03-10 00:08:43', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `business`
--

CREATE TABLE `business` (
  `id` int(11) NOT NULL,
  `account_name` varchar(100) NOT NULL,
  `type` varchar(20) NOT NULL,
  `op_bal` int(30) NOT NULL,
  `dbcr` varchar(20) NOT NULL,
  `address` text NOT NULL,
  `city` varchar(100) NOT NULL,
  `state` varchar(100) NOT NULL,
  `postal_code` varchar(15) NOT NULL,
  `state_code` varchar(100) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `email` varchar(150) NOT NULL,
  `vat` varchar(100) NOT NULL,
  `pan` varchar(100) NOT NULL,
  `gstin` varchar(100) NOT NULL,
  `aadhar` int(20) NOT NULL DEFAULT '0',
  `bank_account` varchar(100) NOT NULL,
  `ifsc_code` varchar(100) NOT NULL,
  `timestamp` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `business`
--

INSERT INTO `business` (`id`, `account_name`, `type`, `op_bal`, `dbcr`, `address`, `city`, `state`, `postal_code`, `state_code`, `phone`, `mobile`, `email`, `vat`, `pan`, `gstin`, `aadhar`, `bank_account`, `ifsc_code`, `timestamp`) VALUES
(1, 'Business A', '234', 345, '435', '345', '34', 'Kerala', '680005', '345', '435', '435', '234@as.vb', '345', '345', '435435', 435, '435', '435', 1551387055),
(2, 'Tester Business', '123', 123, '213', '123', '123', '213', '213', '213', '213', '213', '123@dfg.gh', '213', '213', '123', 213, '123', '123', 1552762910);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `categoryName` varchar(255) DEFAULT NULL,
  `categoryDescription` longtext,
  `creationDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updationDate` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `categoryName`, `categoryDescription`, `creationDate`, `updationDate`) VALUES
(16, 'Lights', '', '2019-02-26 22:37:10', NULL),
(17, 'Speaker', '', '2019-02-26 22:37:31', NULL),
(18, 'Phone', 'Phones of All types', '2019-02-28 23:30:51', NULL),
(20, 'New', '', '2019-03-31 06:32:36', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` int(11) NOT NULL,
  `timestamp` varchar(100) NOT NULL,
  `data` text NOT NULL,
  `type` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `timestamp`, `data`, `type`) VALUES
(1, '1553356728', '[\"New Product Added\",\"Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:65.0) Gecko/20100101 Firefox/65.0\",\"127.0.0.1\"]', '2'),
(2, '1553613135', '[\"Reward Settings Changed to : 1::20::5::40::4::50::3::60::2::90::\",\"Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:66.0) Gecko/20100101 Firefox/66.0\",\"127.0.0.1\"]', '2'),
(3, '1553615000', '[\"New Sales Added\",\"Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:66.0) Gecko/20100101 Firefox/66.0\",\"127.0.0.1\"]', '2'),
(4, '1553615064', '[\"New Sales Added\",\"Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:66.0) Gecko/20100101 Firefox/66.0\",\"127.0.0.1\"]', '2'),
(5, '1553714444', '[\"New Sales Added\",\"Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:66.0) Gecko/20100101 Firefox/66.0\",\"127.0.0.1\"]', '2'),
(6, '1553779502', '[\"New Purchase Added\",\"Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:66.0) Gecko/20100101 Firefox/66.0\",\"127.0.0.1\"]', '2'),
(7, '1553811289', '[\"Reward Settings Changed to : 1:21:5:32:4:43:3:54:2:80:\",\"Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:66.0) Gecko/20100101 Firefox/66.0\",\"127.0.0.1\"]', '2'),
(8, '1553811378', '[\"Payment added for Invoice No : 65764\",\"Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:66.0) Gecko/20100101 Firefox/66.0\",\"127.0.0.1\"]', '2'),
(9, '1553811588', '[\"New Sales Added\",\"Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:66.0) Gecko/20100101 Firefox/66.0\",\"127.0.0.1\"]', '2'),
(10, '1553811890', '[\"New Sales Added\",\"Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:66.0) Gecko/20100101 Firefox/66.0\",\"127.0.0.1\"]', '2'),
(11, '1553812539', '[\"New Sales Added\",\"Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:66.0) Gecko/20100101 Firefox/66.0\",\"127.0.0.1\"]', '2'),
(12, '1553812959', '[\"New Sales Added\",\"Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:66.0) Gecko/20100101 Firefox/66.0\",\"127.0.0.1\"]', '2'),
(13, '1553813043', '[\"Payment added for Invoice No : 155381295834\",\"Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:66.0) Gecko/20100101 Firefox/66.0\",\"127.0.0.1\"]', '2'),
(14, '1553813367', '[\"Payment added for Invoice No : 155381295834\",\"Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:66.0) Gecko/20100101 Firefox/66.0\",\"127.0.0.1\"]', '2'),
(15, '1553813440', '[\"Reward added for Invoice No : \",\"Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:66.0) Gecko/20100101 Firefox/66.0\",\"127.0.0.1\"]', '2'),
(16, '1553813440', '[\"Payment added for Invoice No : 155381295834\",\"Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:66.0) Gecko/20100101 Firefox/66.0\",\"127.0.0.1\"]', '2'),
(17, '1553813643', '[\"Reward added for Invoice No : 3\",\"Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:66.0) Gecko/20100101 Firefox/66.0\",\"127.0.0.1\"]', '2'),
(18, '1553813643', '[\"Payment added for Invoice No : 155381295834\",\"Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:66.0) Gecko/20100101 Firefox/66.0\",\"127.0.0.1\"]', '2'),
(19, '1553813870', '[\"Reward added for Invoice No : 3\",\"Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:66.0) Gecko/20100101 Firefox/66.0\",\"127.0.0.1\"]', '2'),
(20, '1553813870', '[\"Payment added for Invoice No : 155381295834\",\"Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:66.0) Gecko/20100101 Firefox/66.0\",\"127.0.0.1\"]', '2'),
(21, '1553813931', '[\"Reward added for Invoice No : 3\",\"Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:66.0) Gecko/20100101 Firefox/66.0\",\"127.0.0.1\"]', '2'),
(22, '1553813932', '[\"Payment added for Invoice No : 155381295834\",\"Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:66.0) Gecko/20100101 Firefox/66.0\",\"127.0.0.1\"]', '2'),
(23, '1553814076', '[\"Payment added for Invoice No : 155381295834\",\"Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:66.0) Gecko/20100101 Firefox/66.0\",\"127.0.0.1\"]', '2'),
(24, '1553814081', '[\"Reward added for Invoice No : 3\",\"Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:66.0) Gecko/20100101 Firefox/66.0\",\"127.0.0.1\"]', '2'),
(25, '1553814081', '[\"Payment added for Invoice No : 155381295834\",\"Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:66.0) Gecko/20100101 Firefox/66.0\",\"127.0.0.1\"]', '2'),
(26, '1553814279', '[\"New Sales Added\",\"Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:66.0) Gecko/20100101 Firefox/66.0\",\"127.0.0.1\"]', '2'),
(27, '1553814428', '[\"Reward added for Invoice No : 4\",\"Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:66.0) Gecko/20100101 Firefox/66.0\",\"127.0.0.1\"]', '2'),
(28, '1553814428', '[\"Payment added for Invoice No : 155381427934\",\"Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:66.0) Gecko/20100101 Firefox/66.0\",\"127.0.0.1\"]', '2'),
(29, '1553814779', '[\"Reward added for Invoice No : 4\",\"Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:66.0) Gecko/20100101 Firefox/66.0\",\"127.0.0.1\"]', '2'),
(30, '1553814780', '[\"Payment added for Invoice No : 155381427934\",\"Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:66.0) Gecko/20100101 Firefox/66.0\",\"127.0.0.1\"]', '2'),
(31, '1553814943', '[\"Reward added for Invoice No : 4\",\"Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:66.0) Gecko/20100101 Firefox/66.0\",\"127.0.0.1\"]', '2'),
(32, '1553814943', '[\"Payment added for Invoice No : 155381427934\",\"Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:66.0) Gecko/20100101 Firefox/66.0\",\"127.0.0.1\"]', '2'),
(33, '1553815083', '[\"Reward added for Invoice No : 155381427934\",\"Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:66.0) Gecko/20100101 Firefox/66.0\",\"127.0.0.1\"]', '2'),
(34, '1553815084', '[\"Payment added for Invoice No : 155381427934\",\"Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:66.0) Gecko/20100101 Firefox/66.0\",\"127.0.0.1\"]', '2'),
(35, '1553815168', '[\"Reward added for Invoice No : 155381427934\",\"Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:66.0) Gecko/20100101 Firefox/66.0\",\"127.0.0.1\"]', '2'),
(36, '1553815169', '[\"Payment added for Invoice No : 155381427934\",\"Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:66.0) Gecko/20100101 Firefox/66.0\",\"127.0.0.1\"]', '2'),
(37, '1553815215', '[\"Reward added for Invoice No : 155381427934\",\"Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:66.0) Gecko/20100101 Firefox/66.0\",\"127.0.0.1\"]', '2'),
(38, '1553815215', '[\"Payment added for Invoice No : 155381427934\",\"Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:66.0) Gecko/20100101 Firefox/66.0\",\"127.0.0.1\"]', '2'),
(39, '1553815525', '[\"Reward added for Invoice No : 155381427934\",\"Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:66.0) Gecko/20100101 Firefox/66.0\",\"127.0.0.1\"]', '2'),
(40, '1553815525', '[\"Payment added for Invoice No : 155381427934\",\"Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:66.0) Gecko/20100101 Firefox/66.0\",\"127.0.0.1\"]', '2'),
(41, '1553969034', '[\"New Sales Added\",\"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.86 Safari/537.36\",\"::1\"]', '2'),
(42, '1554231597', '[\"New Sales Added\",\"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.86 Safari/537.36\",\"::1\"]', '2'),
(43, '1554231737', '[\"New Sales Added\",\"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.86 Safari/537.36\",\"::1\"]', '2'),
(44, '1554234088', '[\"New Sales Added\",\"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.86 Safari/537.36\",\"::1\"]', '2'),
(45, '1554324457', '[\"New Sales Added\",\"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.86 Safari/537.36\",\"::1\"]', '2'),
(46, '1554479732', '[\"New Product Added\",\"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.86 Safari/537.36\",\"::1\"]', '2'),
(47, '1554553136', '[\"New Sales Added\",\"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.86 Safari/537.36\",\"::1\"]', '2'),
(48, '1554553172', '[\"New Sales Added\",\"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.86 Safari/537.36\",\"::1\"]', '2'),
(49, '1554553176', '[\"New Sales Added\",\"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.86 Safari/537.36\",\"::1\"]', '2'),
(50, '1554553176', '[\"New Sales Added\",\"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.86 Safari/537.36\",\"::1\"]', '2'),
(51, '1554553176', '[\"New Sales Added\",\"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.86 Safari/537.36\",\"::1\"]', '2'),
(52, '1554553185', '[\"New Sales Added\",\"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.86 Safari/537.36\",\"::1\"]', '2'),
(53, '1554553186', '[\"New Sales Added\",\"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.86 Safari/537.36\",\"::1\"]', '2'),
(54, '1554553186', '[\"New Sales Added\",\"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.86 Safari/537.36\",\"::1\"]', '2'),
(55, '1554553186', '[\"New Sales Added\",\"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.86 Safari/537.36\",\"::1\"]', '2'),
(56, '1554553190', '[\"New Sales Added\",\"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.86 Safari/537.36\",\"::1\"]', '2'),
(57, '1554553191', '[\"New Sales Added\",\"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.86 Safari/537.36\",\"::1\"]', '2'),
(58, '1554553191', '[\"New Sales Added\",\"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.86 Safari/537.36\",\"::1\"]', '2'),
(59, '1554553191', '[\"New Sales Added\",\"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.86 Safari/537.36\",\"::1\"]', '2'),
(60, '1554553191', '[\"New Sales Added\",\"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.86 Safari/537.36\",\"::1\"]', '2'),
(61, '1554553199', '[\"New Sales Added\",\"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.86 Safari/537.36\",\"::1\"]', '2'),
(62, '1554553233', '[\"New Sales Added\",\"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.86 Safari/537.36\",\"::1\"]', '2'),
(63, '1554553241', '[\"New Sales Added\",\"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.86 Safari/537.36\",\"::1\"]', '2'),
(64, '1554553302', '[\"New Sales Added\",\"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.86 Safari/537.36\",\"::1\"]', '2'),
(65, '1554553308', '[\"New Sales Added\",\"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.86 Safari/537.36\",\"::1\"]', '2'),
(66, '1554553322', '[\"New Sales Added\",\"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.86 Safari/537.36\",\"::1\"]', '2'),
(67, '1554553341', '[\"New Sales Added\",\"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.86 Safari/537.36\",\"::1\"]', '2'),
(68, '1554553353', '[\"New Sales Added\",\"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.86 Safari/537.36\",\"::1\"]', '2'),
(69, '1554553354', '[\"New Sales Added\",\"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.86 Safari/537.36\",\"::1\"]', '2'),
(70, '1554553361', '[\"New Sales Added\",\"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.86 Safari/537.36\",\"::1\"]', '2'),
(71, '1554553395', '[\"New Sales Added\",\"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.86 Safari/537.36\",\"::1\"]', '2');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `userId` int(11) DEFAULT NULL,
  `productId` varchar(255) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `orderDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `paymentMethod` varchar(50) DEFAULT NULL,
  `orderStatus` varchar(55) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `userId`, `productId`, `quantity`, `orderDate`, `paymentMethod`, `orderStatus`) VALUES
(1, 12, '55', 1, '2019-03-17 13:29:16', 'COD', 'Delivered'),
(2, 12, '56', 1, '2019-03-17 13:30:48', 'Credit', NULL),
(3, 12, '57', 2, '2019-03-20 05:56:20', 'COD', NULL),
(4, 12, '58', 1, '2019-03-20 05:56:20', 'COD', NULL),
(5, 12, '55', 1, '2019-03-20 05:59:12', 'Credit', NULL),
(6, 12, '57', 1, '2019-03-20 05:59:12', 'Credit', NULL),
(7, 12, '58', 1, '2019-03-20 05:59:12', 'Credit', NULL),
(8, 12, '60', 1, '2019-03-20 05:59:12', 'Credit', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ordertrackhistory`
--

CREATE TABLE `ordertrackhistory` (
  `id` int(11) NOT NULL,
  `orderId` int(11) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `remark` mediumtext,
  `postingDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ordertrackhistory`
--

INSERT INTO `ordertrackhistory` (`id`, `orderId`, `status`, `remark`, `postingDate`) VALUES
(1, 1, 'Delivered', 'delivered to hand.', '2019-03-17 13:31:13');

-- --------------------------------------------------------

--
-- Table structure for table `paymentdue`
--

CREATE TABLE `paymentdue` (
  `id` int(11) NOT NULL,
  `customer` varchar(100) NOT NULL,
  `salesinvoice` varchar(100) NOT NULL,
  `dueamount` varchar(100) NOT NULL,
  `timestamp` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `paymentdue`
--

INSERT INTO `paymentdue` (`id`, `customer`, `salesinvoice`, `dueamount`, `timestamp`) VALUES
(3, '12', '155381295834', '0', '1553812958'),
(4, '12', '155381427934', '0', '1553814279'),
(5, '10', '155396903434', '699', '1553969034'),
(6, '10', '155423159634', '125.24', '1554231596'),
(7, '10', '155423173734', '127.72', '1554231737'),
(8, '10', '155423408834', '32.4', '1554234088'),
(9, '10', '155432445734', '20120', '1554324457'),
(10, '10', '155455313634', '0', '1554553136'),
(11, '10', '155455317234', '16', '1554553172'),
(12, '10', '155455317634', '16', '1554553176'),
(15, '10', '155455318534', '16', '1554553185'),
(16, '10', '155455318634', '16', '1554553186'),
(19, '10', '155455319034', '16', '1554553190'),
(20, '10', '155455319134', '16', '1554553191'),
(24, '10', '155455319934', '16', '1554553199'),
(25, '12', '155455323334', '0', '1554553233'),
(26, '12', '155455324134', '0', '1554553241'),
(27, '12', '155455330234', '0', '1554553302'),
(28, '12', '155455330834', '0', '1554553308'),
(29, '12', '155455332234', '0', '1554553322'),
(30, '12', '155455334134', '0', '1554553341'),
(31, '12', '155455335334', '888', '1554553353'),
(32, '12', '155455335434', '888', '1554553354'),
(33, '12', '155455336134', '0', '1554553361'),
(34, '12', '155455339534', '0', '1554553395');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `category` int(11) NOT NULL,
  `subCategory` int(11) DEFAULT NULL,
  `uom` varchar(50) NOT NULL,
  `productName` varchar(255) DEFAULT NULL,
  `productCompany` varchar(255) DEFAULT NULL,
  `productPrice` int(11) DEFAULT NULL,
  `hsnno` varchar(255) NOT NULL,
  `productPriceBeforeDiscount` int(11) DEFAULT NULL,
  `productDescription` longtext,
  `productImage1` varchar(255) DEFAULT NULL,
  `productImage2` varchar(255) DEFAULT NULL,
  `productImage3` varchar(255) DEFAULT NULL,
  `shippingCharge` int(11) DEFAULT NULL,
  `productAvailability` varchar(255) DEFAULT NULL,
  `quantityleft` int(11) DEFAULT '0',
  `rewardsapplicable` varchar(255) NOT NULL,
  `taxid` varchar(255) NOT NULL,
  `postingDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updationDate` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category`, `subCategory`, `uom`, `productName`, `productCompany`, `productPrice`, `hsnno`, `productPriceBeforeDiscount`, `productDescription`, `productImage1`, `productImage2`, `productImage3`, `shippingCharge`, `productAvailability`, `quantityleft`, `rewardsapplicable`, `taxid`, `postingDate`, `updationDate`) VALUES
(55, 16, 20, '20', 'Hello Lights', 'Lights Infotech', 150, '235', 200, '<span style=\"color: rgb(34, 34, 34); font-family: arial, sans-serif; font-size: small;\">Light is electromagnetic radiation within a certain portion of the electromagnetic spectrum. The word usually refers to visible light, which is the visible spectrum that is visible to the human eye and is responsible for the sense of sight.</span>', 'image002.png', '2.jpeg', 'image002.png', 10, 'In Stock', -1, '', '37', '2019-02-28 23:49:43', NULL),
(56, 16, 20, '20', 'Wow Lights', 'Lights Infotech', 350, '', 400, '<span style=\"color: rgb(34, 34, 34); font-family: arial, sans-serif; font-size: small;\">This new light is electromagnetic radiation within a certain portion of the electromagnetic spectrum. The word usually refers to visible light, which is the visible spectrum that is visible to the human eye and is responsible for the sense of sight.</span>', '4.jpg', '5.jpg', '6.jpg', 60, 'In Stock', -98, '', '37', '2019-02-28 23:50:29', NULL),
(57, 17, 21, '20', 'Bose Speakers', 'Bose Electronics', 49000, '', 50000, '<span style=\"color: rgb(34, 34, 34); font-family: arial, sans-serif; font-size: small;\">Bose Corporation is a privately held American corporation, based in Framingham, Massachusetts, that designs, develops and sells audio equipment. Founded in 1964 by Amar Bose, the company sells its products throughout the world.</span><br>', '234.jpg', 'SndLinkC2Bk-large.jpg', '3.jpg', 1500, 'In Stock', 22, '', '36', '2019-02-28 23:51:17', NULL),
(58, 17, 23, '20', 'Tesla battery', 'Tesla Electronics', 45000, '', 50000, '<span style=\"color: rgb(34, 34, 34); font-family: arial, sans-serif; font-size: small;\">An electric battery is a device consisting of one or more electrochemical cells with external connections provided to power electrical devices such as flashlights, smartphones, and electric cars. When a battery is supplying electric power, its positive terminal is the cathode and its negative terminal is the anode</span><br>', '4ed4df68-6be6-4a65-8453-dec1b44beb56_1.90ee7b670f0743206e97fbc4af3b99c2.jpeg', '105605.jpg', 'download (1).jpg', 1500, 'In Stock', -36, '', '36', '2019-02-28 23:52:52', NULL),
(59, 17, 23, '19', 'Tesla battery', 'Tesla Electronics', 45000, '', 50000, '<span style=\"color: rgb(34, 34, 34); font-family: arial, sans-serif; font-size: small;\">An electric battery is a device consisting of one or more electrochemical cells with external connections provided to power electrical devices such as flashlights, smartphones, and electric cars. When a battery is supplying electric power, its positive terminal is the cathode and its negative terminal is the anode</span><br>', '4ed4df68-6be6-4a65-8453-dec1b44beb56_1.90ee7b670f0743206e97fbc4af3b99c2.jpeg', '105605.jpg', 'download (1).jpg', 1500, 'In Stock', 604, '', '37', '2019-02-28 23:54:20', NULL),
(60, 18, 24, '19', 'iPhone X', '34234', 234234, '23423423', 2342, '234234', 'city.jpg', 'city.jpg', 'city.jpg', 234, 'In Stock', -85, '', '36', '2019-03-10 00:44:47', NULL),
(71, 18, 24, '20', 'OnePlusX', 'OnePlus', 20000, '846636', 20000, 'One Plus X is the Best OnePlus Phone ever created<br>', 'Insanely Elegant.png', 'octocat.png', '', 200, 'In Stock', 0, '1\r\n', '36', '2019-03-23 15:58:48', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `purchase`
--

CREATE TABLE `purchase` (
  `id` int(11) NOT NULL,
  `business` varchar(200) NOT NULL,
  `supplier` varchar(200) NOT NULL,
  `invoicedate` varchar(100) NOT NULL,
  `invoicenumber` varchar(100) NOT NULL,
  `vehiclenumber` varchar(100) NOT NULL,
  `deliveredcontact` varchar(100) NOT NULL,
  `transport` varchar(100) NOT NULL,
  `receiveddate` varchar(100) NOT NULL,
  `batch` varchar(100) NOT NULL,
  `product` varchar(100) NOT NULL,
  `mrp` int(11) NOT NULL,
  `qtycase` int(11) NOT NULL,
  `qtyuom` int(11) NOT NULL,
  `baseratecase` int(11) NOT NULL,
  `baserateuom` int(11) NOT NULL,
  `disc` int(11) NOT NULL,
  `disca` int(11) NOT NULL,
  `neta` int(11) NOT NULL,
  `cgst` int(11) NOT NULL,
  `sgst` int(11) NOT NULL,
  `cgsta` int(11) NOT NULL,
  `sgsta` int(11) NOT NULL,
  `cess` int(11) NOT NULL,
  `totalamount` int(11) NOT NULL,
  `margin` int(11) NOT NULL,
  `uomsp` int(11) NOT NULL,
  `dispp` int(11) NOT NULL,
  `dispd` int(11) NOT NULL,
  `totalwhole` int(11) NOT NULL,
  `creditnote` int(11) NOT NULL,
  `logistic` int(11) NOT NULL,
  `timestamp` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `purchase`
--

INSERT INTO `purchase` (`id`, `business`, `supplier`, `invoicedate`, `invoicenumber`, `vehiclenumber`, `deliveredcontact`, `transport`, `receiveddate`, `batch`, `product`, `mrp`, `qtycase`, `qtyuom`, `baseratecase`, `baserateuom`, `disc`, `disca`, `neta`, `cgst`, `sgst`, `cgsta`, `sgsta`, `cess`, `totalamount`, `margin`, `uomsp`, `dispp`, `dispd`, `totalwhole`, `creditnote`, `logistic`, `timestamp`) VALUES
(1, 'Business A', '10', '2019-03-05', '875', '234A224', '234235', 'Truck', '2019-03-20', '234', '58', 586, 58765, 86, 865, 865, 765, 876, 586, 58, 658, 658, 65, 865, 8756, 8658, 8765, 58, 65, 0, 0, 0, 0),
(2, 'Business A', '11', '2019-03-01', '151351353', '356262', '23525', 'Train', '2019-03-04', '34', '56', 455, 10, 100, 41, 124, 12, 12, 234, 23, 23, 23, 23, 23, 2325, 24, 3, 2323, 23, 0, 0, 0, 1552238353),
(3, 'Business A', '11', '2019-03-01', '151351353', '356262', '23525', 'Train', '2019-03-04', '34', '56', 455, 10, 100, 41, 124, 12, 12, 234, 23, 23, 23, 23, 23, 2325, 24, 3, 2323, 23, 0, 0, 0, 1552238531),
(4, 'Business A', '11', '2019-03-01', '151351353', '356262', '23525', 'Train', '2019-03-04', '34', '56', 455, 10, 100, 41, 124, 12, 12, 234, 23, 23, 23, 23, 23, 2325, 24, 3, 2323, 23, 0, 0, 0, 1552239094),
(5, '\'1\'', '10', '2019-03-28', '0876234235', 'KA24B2344', '23523525', 'Truck', '2019-03-28', '234', '58', 45000, 24, 24, 865, 36, 2, 415, 20345, 2, 2, 407, 407, 2, 21159, 234, 43, 2342, 43, 0, 0, 0, 1553779501),
(6, '\'1\'', '10', '2019-03-28', '0876234235', 'KA24B2344', '23523525', 'Truck', '2019-03-28', '433', '59', 45000, 654, 654, 65400, 100, 2, 855432, 41916168, 2, 2, 838323, 838323, 2, 43592816, 234, 43, 2342, 43, 0, 0, 0, 1553779501);

-- --------------------------------------------------------

--
-- Table structure for table `rewardsettings`
--

CREATE TABLE `rewardsettings` (
  `id` int(11) NOT NULL,
  `settings` text NOT NULL,
  `timestamp` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rewardsettings`
--

INSERT INTO `rewardsettings` (`id`, `settings`, `timestamp`) VALUES
(1, '1:21:5:32:4:43:3:54:2:80:', '');

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `id` int(11) NOT NULL,
  `product` int(11) NOT NULL,
  `hsn` varchar(30) NOT NULL,
  `utc` varchar(100) NOT NULL,
  `qty` int(11) NOT NULL,
  `mrp` decimal(10,5) NOT NULL,
  `baserate` decimal(10,5) NOT NULL,
  `amount` decimal(10,5) NOT NULL,
  `dis` decimal(10,5) NOT NULL,
  `gst` decimal(10,5) NOT NULL,
  `gstamount` decimal(10,5) NOT NULL,
  `total` decimal(10,5) NOT NULL,
  `finalrate` decimal(10,5) NOT NULL,
  `paymentdue` decimal(10,5) NOT NULL,
  `totalpaid` decimal(10,5) NOT NULL,
  `invoice` varchar(100) NOT NULL,
  `business` int(11) NOT NULL,
  `timestamp` varchar(100) NOT NULL,
  `remarks` text NOT NULL,
  `customer` int(11) NOT NULL,
  `batch` varchar(100) NOT NULL,
  `beat` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`id`, `product`, `hsn`, `utc`, `qty`, `mrp`, `baserate`, `amount`, `dis`, `gst`, `gstamount`, `total`, `finalrate`, `paymentdue`, `totalpaid`, `invoice`, `business`, `timestamp`, `remarks`, `customer`, `batch`, `beat`) VALUES
(8, 55, '235', '35', 1, '2234.00000', '1234.00000', '1234.00000', '0.00000', '0.00000', '0.00000', '1234.00000', '1234.00000', '1234.00000', '0.00000', '2147483647', 1, '1553811889', '', 12, '', '25'),
(9, 60, '23423423', '35', 1, '2234.00000', '1234.00000', '1234.00000', '0.00000', '0.00000', '0.00000', '1234.00000', '1234.00000', '1234.00000', '0.00000', '2147483647', 1, '1553811889', '', 12, '', '25'),
(10, 0, '', '', 0, '0.00000', '0.00000', '0.00000', '0.00000', '0.00000', '0.00000', '0.00000', '0.00000', '0.00000', '0.00000', '2147483647', 0, '1553812538', '', 12, '', '25'),
(11, 58, '', '35', 1, '123.00000', '123.00000', '123.00000', '0.00000', '0.00000', '0.00000', '123.00000', '123.00000', '123.00000', '0.00000', '2147483647', 1, '1553812538', '', 12, '234', '25'),
(12, 0, '', '', 0, '0.00000', '0.00000', '0.00000', '0.00000', '0.00000', '0.00000', '0.00000', '0.00000', '0.00000', '0.00000', '2147483647', 0, '1553812958', '', 12, '', ''),
(13, 56, '', '35', 1, '234.00000', '234.00000', '234.00000', '0.00000', '0.00000', '0.00000', '234.00000', '234.00000', '234.00000', '0.00000', '2147483647', 1, '1553812958', '', 12, '34', ''),
(14, 56, '', '35', 1, '123.00000', '123.00000', '123.00000', '0.00000', '0.00000', '0.00000', '123.00000', '123.00000', '123.00000', '0.00000', '155381427934', 1, '1553814279', '', 12, '34', ''),
(15, 0, '', '', 0, '0.00000', '0.00000', '0.00000', '0.00000', '0.00000', '0.00000', '0.00000', '0.00000', '0.00000', '0.00000', '155396903434', 0, '1553969034', '', 10, '', ''),
(16, 57, '', '35', 7, '4.00000', '7.00000', '7.00000', '7.00000', '7.00000', '7.00000', '8.00000', '699.00000', '699.00000', '0.00000', '155396903434', 1, '1553969034', '', 10, '', ''),
(17, 0, '', '', 0, '0.00000', '0.00000', '0.00000', '0.00000', '0.00000', '0.00000', '0.00000', '0.00000', '0.00000', '0.00000', '155423159634', 0, '1554231596', '', 10, '', ''),
(18, 56, '', '10', 5, '350.00000', '124.00000', '620.00000', '6.00000', '7.00000', '43.40000', '626.20000', '125.24000', '125.24000', '0.00000', '155423159634', 1, '1554231596', '', 10, '34', ''),
(19, 56, '', '10', 30, '350.00000', '124.00000', '3720.00000', '2.00000', '5.00000', '186.00000', '3831.60000', '127.72000', '127.72000', '0.00000', '155423173734', 1, '1554231737', '', 10, '34', ''),
(20, 59, '', '654', 50, '45000.00000', '100.00000', '700.00000', '2.00000', '6.00000', '0.00000', '0.00000', '0.00000', '0.00000', '0.00000', '155423173734', 1, '1554231737', '', 10, '433', ''),
(21, 58, '', '24', 59, '45000.00000', '36.00000', '2124.00000', '59.00000', '49.00000', '1040.76000', '1911.60000', '32.40000', '32.40000', '0.00000', '155423408834', 1, '1554234088', '', 10, '234', ''),
(22, 56, '', '10', 5, '350.00000', '124.00000', '620.00000', '5.00000', '29.00000', '0.00000', '620.00000', '12466.00000', '12466.00000', '0.00000', '155432445734', 1, '1554324457', '', 10, '34', ''),
(23, 57, '', '88', 6, '49000.00000', '44.00000', '0.00000', '5.00000', '5.00000', '0.00000', '77.00000', '6988.00000', '6988.00000', '0.00000', '155432445734', 1, '1554324457', '', 10, '', ''),
(24, 60, '23423423', '34', 84, '99999.99999', '48.00000', '0.00000', '6.00000', '6.00000', '0.00000', '86767.00000', '666.00000', '666.00000', '0.00000', '155432445734', 1, '1554324457', '', 10, '', ''),
(25, 56, '', '', 0, '350.00000', '0.00000', '0.00000', '0.00000', '4.00000', '0.00000', '55.00000', '0.00000', '0.00000', '0.00000', '155455339534', 1, '1554553395', '', 12, '', 'sdf');

-- --------------------------------------------------------

--
-- Table structure for table `subcategory`
--

CREATE TABLE `subcategory` (
  `id` int(11) NOT NULL,
  `categoryid` int(11) DEFAULT NULL,
  `subcategory` varchar(255) DEFAULT NULL,
  `creationDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updationDate` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subcategory`
--

INSERT INTO `subcategory` (`id`, `categoryid`, `subcategory`, `creationDate`, `updationDate`) VALUES
(19, 16, 'Strip Lights', '2019-02-26 23:05:11', NULL),
(20, 16, 'Fairy Lights', '2019-02-26 23:05:16', NULL),
(21, 17, 'Home Speakers', '2019-02-26 23:05:20', NULL),
(22, 17, 'phone Speakers', '2019-02-26 23:05:24', NULL),
(23, 17, 'battery', '2019-02-26 23:45:35', NULL),
(24, 18, 'iPhone', '2019-02-28 23:46:54', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `subuom`
--

CREATE TABLE `subuom` (
  `id` int(11) NOT NULL,
  `uomid` int(11) DEFAULT NULL,
  `subuom` varchar(255) DEFAULT NULL,
  `qtyinsubuom` varchar(255) DEFAULT NULL,
  `creationDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updationDate` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subuom`
--

INSERT INTO `subuom` (`id`, `uomid`, `subuom`, `qtyinsubuom`, `creationDate`, `updationDate`) VALUES
(25, 19, 'Covers', '34', '2019-03-09 23:35:37', NULL),
(26, 20, 'Chota Boxes', '70', '2019-03-09 23:41:01', NULL),
(27, 20, 'Chota Boxes', '70', '2019-03-09 23:45:30', NULL),
(28, 20, 'jakaas', '500', '2019-03-09 23:45:40', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `id` int(11) NOT NULL,
  `productcompany` varchar(100) NOT NULL,
  `firmname` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `contactno` bigint(11) DEFAULT NULL,
  `altcontactno` bigint(11) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `shippingAddress` longtext,
  `shippingState` varchar(255) DEFAULT NULL,
  `shippingCity` varchar(255) DEFAULT NULL,
  `shippingPincode` int(11) DEFAULT NULL,
  `billingAddress` longtext,
  `district` varchar(50) NOT NULL,
  `billingState` varchar(255) DEFAULT NULL,
  `billingCity` varchar(255) DEFAULT NULL,
  `billingPincode` int(11) DEFAULT NULL,
  `gstin` varchar(255) NOT NULL,
  `fssai` varchar(255) NOT NULL,
  `pan` varchar(255) NOT NULL,
  `aadharno` varchar(255) NOT NULL,
  `execname` varchar(255) NOT NULL,
  `execmobile` bigint(11) NOT NULL,
  `bankname` varchar(255) NOT NULL,
  `bankcity` varchar(255) NOT NULL,
  `accountname` varchar(255) NOT NULL,
  `accountnumber` varchar(255) NOT NULL,
  `ifsccode` varchar(255) NOT NULL,
  `regDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updationDate` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`id`, `productcompany`, `firmname`, `email`, `name`, `contactno`, `altcontactno`, `password`, `shippingAddress`, `shippingState`, `shippingCity`, `shippingPincode`, `billingAddress`, `district`, `billingState`, `billingCity`, `billingPincode`, `gstin`, `fssai`, `pan`, `aadharno`, `execname`, `execmobile`, `bankname`, `bankcity`, `accountname`, `accountnumber`, `ifsccode`, `regDate`, `updationDate`) VALUES
(10, '', '', 'test@test.com', 'Test Supplier', 1234567890, 23423, NULL, 'Bengaluru', NULL, NULL, NULL, 'Bengaluru', '', NULL, NULL, NULL, '', '', '', '', '', 0, '', '', '', '', '', '2019-03-01 00:02:07', NULL),
(11, 'My Play Studios', 'Bullseye', 'adarshcool97@gmail.com', 'Adarsh C', 9400503664, 2342345345, NULL, 'Curry Road', NULL, NULL, NULL, 'Curry Road', 'Lays', 'Kerala', NULL, 680005, '12334556756756', '67456345RF345', '3423645436456546', '3554623457546456', 'Bill Gates', 1233454645234, 'Bullseye', 'Gotham', 'Nigga', '12334598', '34958457943', '2019-03-09 21:24:58', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `taxinfo`
--

CREATE TABLE `taxinfo` (
  `id` int(50) NOT NULL,
  `taxname` varchar(50) NOT NULL,
  `cgst` varchar(50) NOT NULL,
  `sgst` varchar(50) NOT NULL,
  `totalgst` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `taxinfo`
--

INSERT INTO `taxinfo` (`id`, `taxname`, `cgst`, `sgst`, `totalgst`) VALUES
(36, '6 %', '4', '1', '6'),
(37, '4% tAX', '2', '2', '4');

-- --------------------------------------------------------

--
-- Table structure for table `uom`
--

CREATE TABLE `uom` (
  `id` int(11) NOT NULL,
  `uom` varchar(255) DEFAULT NULL,
  `creationDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updationDate` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `uom`
--

INSERT INTO `uom` (`id`, `uom`, `creationDate`, `updationDate`) VALUES
(19, 'Cases', '2019-03-09 23:28:39', NULL),
(20, 'Boxes', '2019-03-09 23:40:07', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `contactno` bigint(11) DEFAULT NULL,
  `altcontactno` bigint(11) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `shippingAddress` longtext,
  `district` varchar(255) DEFAULT NULL,
  `rewards` varchar(100) NOT NULL DEFAULT '0',
  `shippingState` varchar(255) DEFAULT NULL,
  `shippingCity` varchar(255) DEFAULT NULL,
  `shippingPincode` int(11) DEFAULT NULL,
  `billingAddress` longtext,
  `billingState` varchar(255) DEFAULT NULL,
  `billingCity` varchar(255) DEFAULT NULL,
  `billingPincode` int(11) DEFAULT NULL,
  `gstin` varchar(255) DEFAULT NULL,
  `fssai` varchar(255) DEFAULT NULL,
  `pan` varchar(255) DEFAULT NULL,
  `aadharno` varchar(255) DEFAULT NULL,
  `birthdate` date DEFAULT NULL,
  `regDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updationDate` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `contactno`, `altcontactno`, `password`, `shippingAddress`, `district`, `rewards`, `shippingState`, `shippingCity`, `shippingPincode`, `billingAddress`, `billingState`, `billingCity`, `billingPincode`, `gstin`, `fssai`, `pan`, `aadharno`, `birthdate`, `regDate`, `updationDate`) VALUES
(10, 'Adarsh', 'adarshcool97@gmail.com', 9400503664, 757332423, 'a3dcb4d229de6fde0db5686dee47145d', 'Jerry Road, Thrissurcurry', 'Lays', '-539', NULL, NULL, NULL, 'Jerry Road, Thrissurcurry', 'Kerala', NULL, NULL, '23423423423', '42342323423', '232342344234232342323423', '52444234232342323423', '2019-03-05', '2019-03-10 00:31:28', NULL),
(12, 'Test Retailer', 'test@test.com', 8838564345, 8798564345, 'f925916e2754e5e03f75dd58a5733251', 'Delhi', NULL, '0', NULL, NULL, NULL, 'Delhi							', NULL, NULL, NULL, '', '', '', '', '0000-00-00', '2019-03-01 00:06:33', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `beat`
--
ALTER TABLE `beat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `business`
--
ALTER TABLE `business`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ordertrackhistory`
--
ALTER TABLE `ordertrackhistory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `paymentdue`
--
ALTER TABLE `paymentdue`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `salesinvoice` (`salesinvoice`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchase`
--
ALTER TABLE `purchase`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subcategory`
--
ALTER TABLE `subcategory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subuom`
--
ALTER TABLE `subuom`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `taxinfo`
--
ALTER TABLE `taxinfo`
  ADD UNIQUE KEY `taxid` (`id`);

--
-- Indexes for table `uom`
--
ALTER TABLE `uom`
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
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `beat`
--
ALTER TABLE `beat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `business`
--
ALTER TABLE `business`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `ordertrackhistory`
--
ALTER TABLE `ordertrackhistory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `paymentdue`
--
ALTER TABLE `paymentdue`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `purchase`
--
ALTER TABLE `purchase`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `subcategory`
--
ALTER TABLE `subcategory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `subuom`
--
ALTER TABLE `subuom`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `taxinfo`
--
ALTER TABLE `taxinfo`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `uom`
--
ALTER TABLE `uom`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
