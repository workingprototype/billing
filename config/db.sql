-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 08, 2019 at 06:44 PM
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
(1, 'admin', 'f925916e2754e5e03f75dd58a5733251', '2017-01-24 16:21:18', '09-06-2019 06:51:43 PM');

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
(1, 'South Zone', '2019-04-12 21:48:31', '19-04-2019 08:54:53 PM'),
(2, 'North Zone', '2019-04-12 21:48:36', NULL),
(3, 'East Zone', '2019-04-12 21:48:44', NULL),
(4, 'West Zone', '2019-04-13 08:41:17', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `business`
--

CREATE TABLE `business` (
  `id` int(11) NOT NULL,
  `account_name` varchar(100) NOT NULL,
  `type` varchar(20) NOT NULL,
  `op_bal` varchar(255) NOT NULL,
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
  `aadhar` varchar(255) NOT NULL DEFAULT '0',
  `bank_account` varchar(100) NOT NULL,
  `ifsc_code` varchar(100) NOT NULL,
  `timestamp` varchar(255) NOT NULL,
  `creationDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `business`
--

INSERT INTO `business` (`id`, `account_name`, `type`, `op_bal`, `dbcr`, `address`, `city`, `state`, `postal_code`, `state_code`, `phone`, `mobile`, `email`, `vat`, `pan`, `gstin`, `aadhar`, `bank_account`, `ifsc_code`, `timestamp`, `creationDate`) VALUES
(1, 'Business A', 'Money Maker Groups', '15000000', '1000', 'Eius iure eum illum', 'Quia eiusmod facilis', 'Ratione modi omnis o', 'Necessitatibus ', 'Dolorem incidunt is', '9500101010', 'Adipisci tempor', 'pali@mailinator.net', '5213423429', 'Eius temporibus nihi', 'Vel at eum officia u', '345394854835834098', '34058340950348A205934A4', 'ACCERYG234256234', '1555105926', '2019-06-08 15:29:19'),
(2, 'Business AB', 'Illustrator Group', '35000000', '2000', 'Jerry Street, North Signature Hello Road, Stage 1', 'Paeke', 'Andra Pradesh', '501123', '101123', '9500101010', '7570204010', 'businessa@mail.com', '5213423429', '4395893485', '3458345', '345394854835834098', '34058340950348A205934A4', 'ACCERYG234256234', '1555105969', '2019-06-08 15:29:19'),
(3, 'SRI VENKATESWARA AGENCIES', 'AGENCY', '500', '0', 'ATMAKUR', 'NELLORE', 'ANDHRA PRADESH', '524322', '37', '', '9032300385', 'sesha8sai@gmail.com', 'NA', 'ABCDFGH', '37ABCDFGH17', '000', '33100111000', 'SBIN0004828', '1557403195', '2019-06-08 15:29:19'),
(4, 'SRI VENKATESWARA AGENCIES', 'AGENCY', '500', '0', 'ATMAKUR', 'NELLORE', 'ANDHRA PRADESH', '524322', '37', '', '9032300385', 'sesha8sai@gmail.com', 'NA', 'ABCDFGH', '37ABCDFGH17', '000', '33100111000', 'SBIN0004828', '1557403284', '2019-06-08 15:29:19'),
(5, 'Fuga 2', 'Dolor commodi pariat', 'Dolore ratione dolor', 'Ad unde commodo illu', 'Expedita proident r', 'Molestiae ea est ad ', 'Impedit earum sapie', 'Animi voluptas ', 'Fugiat nostrum maior', 'Similique magna', 'Hic sit beatae ', 'bylunycuq@mailinator.com', 'Consequat Et qui pe', 'Voluptas corrupti e', 'Illum corrupti vol', 'Sunt rerum non est s', 'Praesentium cum veni', 'Consequuntur ipsam d', '1559910662', '2019-06-08 15:29:19'),
(6, 'Voluptatem eos ess', 'Vel quia blanditiis ', 'Sed amet vel dolore', 'Ipsum nulla sint vo', 'Sed maiores laborios', 'Natus magnam volupta', 'Modi reprehenderit n', 'Veritatis dolor', 'Aspernatur tempor al', 'Velit atque qua', 'Beatae quia do ', 'saloxivi@mailinator.com', 'Corporis ut beatae q', 'Explicabo Quaerat e', 'Fugiat non reprehend', 'Laboris minima adipi', 'Id recusandae Est ', 'Ullamco perspiciatis', '1559910668', '2019-06-08 15:29:19'),
(7, 'Quia magna aspernatu', 'Autem officia expedi', 'Doloribus et magna a', 'Voluptate ratione ut', 'Rerum incididunt cil', 'Molestiae accusantiu', 'Non dolores quia qua', 'Reiciendis irur', 'Porro illum sit qu', 'Ratione volupta', 'Et voluptate ac', 'teholo@mailinator.com', 'Cumque id repudiand', 'Nulla id eos labore', 'Ut dicta sint nemo ', 'Molestiae esse at q', 'Officia cupiditate n', 'Dolore recusandae F', '1559910672', '2019-06-08 15:29:19');

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
(1, 'Electronics', 'Electronics is a category of techology.', '2019-04-12 20:31:13', '21-04-2019 08:07:53 PM'),
(4, 'Men\'s Clothing', 'Men\'s Article of Clothing', '2019-04-12 21:21:49', '15-04-2019 01:24:08 PM'),
(5, 'Food', 'Eatables', '2019-04-14 05:14:06', NULL),
(7, 'Household', 'Household items', '2019-04-14 06:08:52', '15-04-2019 01:10:32 PM'),
(8, 'biscuits', '', '2019-05-09 11:46:38', NULL),
(9, 'Soaps', '', '2019-05-09 11:52:10', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `executive`
--

CREATE TABLE `executive` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `creationDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updationDate` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `contactno` varchar(255) NOT NULL,
  `altcontactno` varchar(255) NOT NULL,
  `Address` varchar(255) NOT NULL,
  `district` varchar(255) NOT NULL,
  `billingState` varchar(255) NOT NULL,
  `pan` varchar(255) NOT NULL,
  `aadharno` varchar(255) NOT NULL,
  `birthdate` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `executive`
--

INSERT INTO `executive` (`id`, `username`, `password`, `creationDate`, `updationDate`, `name`, `contactno`, `altcontactno`, `Address`, `district`, `billingState`, `pan`, `aadharno`, `birthdate`, `email`) VALUES
(1, '', '098f6bcd4621d373cade4e832627b4f6', '2019-04-12 22:00:37', '09-06-2019 06:19:17 PM', 'Executive Andromeda', '4356346345', '8456354565', 'gara,East Fort, Thrissur', 'Lays', 'Kerala', '9708967897978', '978978978945345', '2019-03-13', 'executive@gmail.com'),
(2, '', '098f6bcd4621d373cade4e832627b4f6', '2019-04-12 22:01:18', '', 'Executive Bojack', '786346345', '976354565', 'hello World,East Tower, Thrissur', 'Lays', 'Kerala', '5467457967897978', '5678789789', '1967-05-13', 'executive2@gmail.com'),
(3, '', 'f3ed11bbdb94fd9ebdefbaf646ab94d3', '2019-06-07 12:31:22', '', 'Uma Witt', 'Aut esse ', 'Quia unde ', 'Excepturi dolor alias eum impedit veniam', 'Veniam saepe velit', 'Expedita aliqua Bla', 'Eaque ab commodi rep', 'Minima laborum ratio', '1989-03-21', 'wenabeqyq@mailinator.com'),
(4, '', 'f3ed11bbdb94fd9ebdefbaf646ab94d3', '2019-06-07 12:31:25', '', 'Lionel Prince', 'Qui quibus', 'Eum a offi', 'Velit eveniet occaecat id ut est exercitation itaque molestiae blanditiis dignissimos ab aut', 'Aut sed veritatis se', 'Voluptas et nisi nis', 'Molestiae lorem quia', 'Et fugiat sunt non q', '1972-01-03', 'wuvopukim@mailinator.com'),
(5, '', 'f3ed11bbdb94fd9ebdefbaf646ab94d3', '2019-06-07 12:31:28', '', 'Gareth Oconnor', 'Recusandae', 'A dolor au', 'Dolor earum provident numquam id quo mollitia doloremque vel nostrum rerum', 'Perspiciatis dolore', 'Harum quam ea volupt', 'Autem mollitia volup', 'Voluptatem accusanti', '1975-09-27', 'tymusedasy@mailinator.com');

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
(1, '1555104627', '[\"New Product Added\",\"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.103 Safari/537.36\",\"::1\"]', '2'),
(2, '1555104712', '[\"New Product Added\",\"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.103 Safari/537.36\",\"::1\"]', '2'),
(3, '1555104844', '[\"New Product Added\",\"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.103 Safari/537.36\",\"::1\"]', '2'),
(4, '1555105019', '[\"New Product Added\",\"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.103 Safari/537.36\",\"::1\"]', '2'),
(5, '1555105195', '[\"New Product Added\",\"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.103 Safari/537.36\",\"::1\"]', '2'),
(6, '1555105361', '[\"New Product Added\",\"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.103 Safari/537.36\",\"::1\"]', '2'),
(7, '1555105532', '[\"New Product Added\",\"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.103 Safari/537.36\",\"::1\"]', '2'),
(8, '1555105610', '[\"New Product Added\",\"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.103 Safari/537.36\",\"::1\"]', '2'),
(9, '1555105678', '[\"New Product Added\",\"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.103 Safari/537.36\",\"::1\"]', '2'),
(10, '1555143451', '[\"New Product Added\",\"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.103 Safari/537.36\",\"::1\"]', '2'),
(11, '1555143483', '[\"New Product Added\",\"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.103 Safari/537.36\",\"::1\"]', '2'),
(12, '1555143497', '[\"New Product Added\",\"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.103 Safari/537.36\",\"::1\"]', '2'),
(13, '1555143636', '[\"New Product Added\",\"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.103 Safari/537.36\",\"::1\"]', '2'),
(14, '1555143707', '[\"New Product Added\",\"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.103 Safari/537.36\",\"::1\"]', '2'),
(15, '1555143778', '[\"New Product Added\",\"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.103 Safari/537.36\",\"::1\"]', '2'),
(16, '1555143930', '[\"New Product Added\",\"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.103 Safari/537.36\",\"::1\"]', '2'),
(17, '1555144006', '[\"New Product Added\",\"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.103 Safari/537.36\",\"::1\"]', '2'),
(18, '1555144056', '[\"New Product Added\",\"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.103 Safari/537.36\",\"::1\"]', '2'),
(19, '1555144238', '[\"New Product Added\",\"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.103 Safari/537.36\",\"::1\"]', '2'),
(20, '1555144548', '[\"New Product Added\",\"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.103 Safari/537.36\",\"::1\"]', '2'),
(21, '1555144877', '[\"New Beat Added\",\"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.103 Safari/537.36\",\"::1\"]', '2'),
(22, '1555219160', '[\"New Product Added\",\"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.103 Safari/537.36\",\"::1\"]', '2'),
(23, '1555219381', '[\"New Product Added\",\"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.103 Safari/537.36\",\"::1\"]', '2'),
(24, '1555220362', '[\"New Product Added\",\"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.103 Safari/537.36\",\"::1\"]', '2'),
(25, '1555220413', '[\"New Product Added\",\"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.103 Safari/537.36\",\"::1\"]', '2'),
(26, '1555220455', '[\"New Product Added\",\"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.103 Safari/537.36\",\"::1\"]', '2'),
(27, '1555220507', '[\"New Product Added\",\"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.103 Safari/537.36\",\"::1\"]', '2'),
(28, '1555220546', '[\"New Product Added\",\"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.103 Safari/537.36\",\"::1\"]', '2'),
(29, '1555220597', '[\"New Product Added\",\"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.103 Safari/537.36\",\"::1\"]', '2'),
(30, '1555222264', '[\"New Product Added\",\"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.103 Safari/537.36\",\"::1\"]', '2'),
(31, '1555242181', '[\"New Purchase Added\",\"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.103 Safari/537.36\",\"::1\"]', '2'),
(32, '1555255440', '[\"New Sales Added\",\"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.103 Safari/537.36\",\"::1\"]', '2'),
(33, '1555319331', '[\"Reward Settings Changed to : :8:9::::::::\",\"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.103 Safari/537.36\",\"::1\"]', '2'),
(34, '1555319543', '[\"Reward Settings Changed to : :2:5::::::::\",\"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.103 Safari/537.36\",\"::1\"]', '2'),
(35, '1555319561', '[\"Reward Settings Changed to : :8:9::::::::\",\"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.103 Safari/537.36\",\"::1\"]', '2'),
(36, '1555323943', '[\"New Beat Added\",\"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.103 Safari/537.36\",\"::1\"]', '2'),
(37, '1555323961', '[\"New Beat Added\",\"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.103 Safari/537.36\",\"::1\"]', '2'),
(38, '1555333197', '[\"New Purchase Added\",\"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.103 Safari/537.36\",\"::1\"]', '2'),
(39, '1555395397', '[\"New Sales Added\",\"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.103 Safari/537.36\",\"::1\"]', '2'),
(40, '1555399119', '[\"New Sales Added\",\"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.103 Safari/537.36\",\"::1\"]', '2'),
(41, '1555399489', '[\"New Sales Added\",\"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.103 Safari/537.36\",\"::1\"]', '2'),
(42, '1555589599', '[\"New Product Added\",\"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.103 Safari/537.36\",\"::1\"]', '2'),
(43, '1555592635', '[\"Product Info Updated!\",\"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.103 Safari/537.36\",\"::1\"]', '2'),
(44, '1555592650', '[\"reterProduct Info Updated!\",\"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.103 Safari/537.36\",\"::1\"]', '2'),
(45, '1555592716', '[\" Category: asdasdasda  Added!\",\"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.103 Safari/537.36\",\"::1\"]', '2'),
(46, '1555592726', '[\" Category: Appliances  Added!\",\"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.103 Safari/537.36\",\"::1\"]', '2'),
(47, '1555600473', '[\"Updated: Bose Quiet Comfort 35 II Wireless Headphone Silver  Information!\",\"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.103 Safari/537.36\",\"::1\"]', '2'),
(48, '1555655132', '[\" Category: New  Added!\"]', '1'),
(49, '1555683207', '[\" Category: sdf  Added!\",\"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.103 Safari/537.36\",\"::1\"]', '2'),
(50, '1555683209', '[\" Category: sdfsdf  Added!\",\"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.103 Safari/537.36\",\"::1\"]', '2'),
(51, '1555683213', '[\" Category: fsdf  Added!\",\"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.103 Safari/537.36\",\"::1\"]', '2'),
(52, '1555683216', '[\" Category: rgdfg  Added!\",\"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.103 Safari/537.36\",\"::1\"]', '2'),
(53, '1555683219', '[\" Category: fdgfdgfdg  Added!\",\"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.103 Safari/537.36\",\"::1\"]', '2'),
(54, '1555683270', '[\" Category: asd  Added!\",\"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.103 Safari/537.36\",\"::1\"]', '2'),
(55, '1555683308', '[\" Category: asd  Added!\",\"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.103 Safari/537.36\",\"::1\"]', '2'),
(56, '1555683340', '[\" Category: asd  Added!\",\"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.103 Safari/537.36\",\"::1\"]', '2'),
(57, '1555683353', '[\" Category: asd  Added!\",\"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.103 Safari/537.36\",\"::1\"]', '2'),
(58, '1555683375', '[\" Category: asd  Added!\",\"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.103 Safari/537.36\",\"::1\"]', '2'),
(59, '1555683383', '[\" Category: asd  Added!\",\"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.103 Safari/537.36\",\"::1\"]', '2'),
(60, '1555683390', '[\" Category: asd  Added!\",\"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.103 Safari/537.36\",\"::1\"]', '2'),
(61, '1555683427', '[\" Category: t  Added!\",\"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.103 Safari/537.36\",\"::1\"]', '2'),
(62, '1555683440', '[\" Category: test  Added!\",\"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.103 Safari/537.36\",\"::1\"]', '2'),
(63, '1555683449', '[\" Category: asd  Added!\",\"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.103 Safari/537.36\",\"::1\"]', '2'),
(64, '1555683474', '[\" Category: asd  Added!\",\"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.103 Safari/537.36\",\"::1\"]', '2'),
(65, '1555923685', '[\"New Purchase Added\",\"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.103 Safari/537.36\",\"::1\"]', '2'),
(66, '1557402398', '[\" Category: biscuits  Added!\",\"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.131 Safari/537.36\",\"::1\"]', '2'),
(67, '1557402730', '[\" Category: Soaps  Added!\",\"Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.131 Safari/537.36\",\"::1\"]', '2'),
(68, '1557402869', '[\"New Product: Good Day Cashew  Added!\",\"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.131 Safari/537.36\",\"::1\"]', '2'),
(69, '1557402950', '[\"New Product: CINTHOL ORIGINAL  Added!\",\"Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.131 Safari/537.36\",\"::1\"]', '2'),
(70, '1557405095', '[\"New Product: NO1 SANDAL  Added!\",\"Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.131 Safari/537.36\",\"::1\"]', '2'),
(71, '1557406114', '[\"New Purchase Added\",\"Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.131 Safari/537.36\",\"::1\"]', '2'),
(72, '1557407298', '[\"New Sales Added\",\"Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.131 Safari/537.36\",\"::1\"]', '2'),
(73, '1557467929', '[\"Payment added for Invoice No : 155740729834\",\"Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.131 Safari/537.36\",\"::1\"]', '2'),
(74, '1557467965', '[\"Payment added for Invoice No : 155740729834\",\"Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.131 Safari/537.36\",\"::1\"]', '2'),
(75, '1557468413', '[\"Reward added for Invoice No : 155740729834\",\"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.131 Safari/537.36\",\"::1\"]', '2'),
(76, '1557468413', '[\"Payment added for Invoice No : 155740729834\",\"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.131 Safari/537.36\",\"::1\"]', '2'),
(77, '1557468584', '[\"Reward added for Invoice No : 155525544034\",\"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.131 Safari/537.36\",\"::1\"]', '2'),
(78, '1557468584', '[\"Payment added for Invoice No : 155525544034\",\"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.131 Safari/537.36\",\"::1\"]', '2'),
(79, '1557819919', '[\"New Product: 5  Added!\",\"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.131 Safari/537.36\",\"::1\"]', '2'),
(80, '1557820154', '[\"New Product: 345  Added!\",\"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.131 Safari/537.36\",\"::1\"]', '2'),
(81, '1557820582', '[\"New Product: sdf  Added!\",\"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.131 Safari/537.36\",\"::1\"]', '2'),
(82, '1557823370', '[\"New Product: dfgfdgfdgfdg  Added!\",\"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.131 Safari/537.36\",\"::1\"]', '2'),
(83, '1557823441', '[\"New Product: 4  Added!\",\"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.131 Safari/537.36\",\"::1\"]', '2'),
(84, '1557823467', '[\"New Product: sdf  Added!\",\"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.131 Safari/537.36\",\"::1\"]', '2'),
(85, '1557823534', '[\"New Product: 63345345  Added!\",\"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.131 Safari/537.36\",\"::1\"]', '2'),
(86, '1557823676', '[\"New Product: PVR Speakers 234234  Added!\",\"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.131 Safari/537.36\",\"::1\"]', '2'),
(87, '1557823693', '[\"New Product: PVR Speakers 234234  Added!\",\"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.131 Safari/537.36\",\"::1\"]', '2'),
(88, '1557823826', '[\"New Product: 5  Added!\",\"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.131 Safari/537.36\",\"::1\"]', '2'),
(89, '1557823882', '[\"New Product: 5  Added!\",\"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.131 Safari/537.36\",\"::1\"]', '2'),
(90, '1557823925', '[\"New Product: 456  Added!\",\"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.131 Safari/537.36\",\"::1\"]', '2'),
(91, '1557845595', '[\"New Product: product name  Added!\",\"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.131 Safari/537.36\",\"::1\"]', '2'),
(92, '1557845806', '[\"New Product: PVR Speakers  Added!\",\"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.131 Safari/537.36\",\"::1\"]', '2'),
(93, '1558035177', '[\"New Sales Added\",\"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.131 Safari/537.36\",\"::1\"]', '2'),
(94, '1558035996', '[\"Reward added for Invoice No : 155803517734\",\"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.131 Safari/537.36\",\"::1\"]', '2'),
(95, '1558035996', '[\"Payment added for Invoice No : 155803517734\",\"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.131 Safari/537.36\",\"::1\"]', '2'),
(96, '1558036154', '[\"Reward Settings Changed to : :1:51::::::::\",\"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.131 Safari/537.36\",\"::1\"]', '2'),
(97, '1558066353', '[\"Reward Settings Changed to : :1:51::::::::\",\"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.131 Safari/537.36\",\"::1\"]', '2'),
(98, '1558066427', '[\"New Sales Added\",\"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.131 Safari/537.36\",\"::1\"]', '2'),
(99, '1558066494', '[\"Payment added for Invoice No : 155539539734\",\"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.131 Safari/537.36\",\"::1\"]', '2'),
(100, '1558066530', '[\"Payment added for Invoice No : 155806642734\",\"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.131 Safari/537.36\",\"::1\"]', '2'),
(101, '1558066548', '[\"Reward added for Invoice No : 155539911934\",\"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.131 Safari/537.36\",\"::1\"]', '2'),
(102, '1558066548', '[\"Payment added for Invoice No : 155539911934\",\"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.131 Safari/537.36\",\"::1\"]', '2'),
(103, '1558066615', '[\"Reward added for Invoice No : 155539539734\",\"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.131 Safari/537.36\",\"::1\"]', '2'),
(104, '1558066615', '[\"Payment added for Invoice No : 155539539734\",\"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.131 Safari/537.36\",\"::1\"]', '2'),
(105, '1558066631', '[\"Reward added for Invoice No : 155806642734\",\"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.131 Safari/537.36\",\"::1\"]', '2'),
(106, '1558066631', '[\"Payment added for Invoice No : 155806642734\",\"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.131 Safari/537.36\",\"::1\"]', '2'),
(107, '1559745015', '[\"New Purchase Added\",\"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.169 Safari/537.36\",\"::1\"]', '2'),
(108, '1559745067', '[\"New Purchase Added\",\"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.169 Safari/537.36\",\"::1\"]', '2'),
(109, '1559745317', '[\"New Purchase Added\",\"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.169 Safari/537.36\",\"::1\"]', '2'),
(110, '1559754824', '[\"New Purchase Added\",\"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.169 Safari/537.36\",\"::1\"]', '2'),
(111, '1559756958', '[\"New Purchase Added\",\"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.169 Safari/537.36\",\"::1\"]', '2'),
(112, '1559910838', '[\"New Purchase Added\",\"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.169 Safari/537.36\",\"::1\"]', '2'),
(113, '1559910914', '[\"New Purchase Added\",\"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.169 Safari/537.36\",\"::1\"]', '2'),
(114, '1559985773', '[\"New Sales Added\",\"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.169 Safari/537.36\",\"::1\"]', '2'),
(115, '1559988444', '[\"New Beat Added\",\"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.169 Safari/537.36\",\"::1\"]', '2'),
(116, '1560082473', '[\"New Purchase Added\",\"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.169 Safari/537.36\",\"::1\"]', '2'),
(117, '1560082722', '[\"New Sales Added\",\"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.169 Safari/537.36\",\"::1\"]', '2'),
(118, '1560083452', '[\"New Sales Added\",\"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.169 Safari/537.36\",\"::1\"]', '2'),
(119, '1560083593', '[\" Category: [  Added!\",\"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.169 Safari/537.36\",\"::1\"]', '2'),
(120, '1560093433', '[\"Payment added for Invoice No : 156008345134\",\"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.169 Safari/537.36\",\"::1\"]', '2'),
(121, '1565169832', '[\"New Sales Added\",\"Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/75.0.3770.90 Chrome/75.0.3770.90 Safari/537.36\",\"::1\"]', '2'),
(122, '1565170466', '[\"New Sales Added\",\"Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/75.0.3770.90 Chrome/75.0.3770.90 Safari/537.36\",\"::1\"]', '2'),
(123, '1565266552', '[\"New Sales Added\",\"Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/75.0.3770.90 Chrome/75.0.3770.90 Safari/537.36\",\"::1\"]', '2'),
(124, '1565266868', '[\"New Sales Added\",\"Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/75.0.3770.90 Chrome/75.0.3770.90 Safari/537.36\",\"::1\"]', '2');

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
  `orderNumber` longtext NOT NULL,
  `paymentMethod` varchar(50) DEFAULT NULL,
  `orderStatus` varchar(55) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `userId`, `productId`, `quantity`, `orderDate`, `orderNumber`, `paymentMethod`, `orderStatus`) VALUES
(1, 13, '17', 1, '2019-04-14 06:13:09', '8meM976YFw', 'COD', 'Delivered'),
(2, 13, '18', 1, '2019-04-14 06:13:09', '8meM976YFw', 'COD', 'Delivered'),
(3, 13, '2', 1, '2019-04-15 09:44:02', '7me07BfYFw', 'COD', 'Delivered'),
(4, 13, '4', 1, '2019-04-15 09:44:02', '7me07BfYFw', 'COD', 'Delivered'),
(5, 13, '3', 1, '2019-04-15 15:34:45', '8meMmBfYFw', 'COD', 'Delivered'),
(6, 1, '3', 1, '2019-04-15 17:45:56', 'NrRGq2sIlN', 'COD', 'Delivered'),
(7, 1, '3', 1, '2019-04-15 17:47:05', 'NrRGq2sIlN', 'COD', 'Delivered'),
(8, 1, '17', 1, '2019-04-15 17:48:23', 'l7r7XlfKaM', 'COD', 'Delivered'),
(9, 1, '18', 1, '2019-04-15 17:48:23', 'l7r7XlfKaM', 'COD', 'Delivered'),
(10, 13, '4', 1, '2019-04-16 05:21:37', 'IPBWMn1WuL', 'Credit', 'Delivered'),
(11, 13, '1', 1, '2019-04-16 05:22:10', 'iC1gG6k22m', 'COD', 'Delivered'),
(12, 13, '2', 1, '2019-04-16 05:22:10', 'iC1gG6k22m', 'COD', 'Delivered'),
(13, 13, '3', 1, '2019-04-16 05:22:10', 'iC1gG6k22m', 'COD', 'Delivered'),
(15, 13, '3', 1, '2019-04-19 06:30:27', 'PBYycdko4L', 'COD', 'Delivered'),
(16, 13, '3', 1, '2019-04-19 06:31:03', 'GwAT9qn63p', 'COD', 'Delivered'),
(17, 13, '1', 4, '2019-04-22 09:03:48', 'clwe5xYi65', 'COD', 'Delivered'),
(18, 13, '3', 1, '2019-04-22 09:03:48', 'clwe5xYi65', 'COD', 'Delivered'),
(19, 13, '2', 4, '2019-05-30 17:03:06', 'gnn2lx1Lhk', 'COD', NULL),
(20, 13, '4', 1, '2019-05-30 17:03:06', 'gnn2lx1Lhk', 'COD', 'Delivered');

-- --------------------------------------------------------

--
-- Table structure for table `ordertrackhistory`
--

CREATE TABLE `ordertrackhistory` (
  `id` int(11) NOT NULL,
  `orderId` varchar(255) DEFAULT NULL,
  `orderNumber` longtext NOT NULL,
  `status` varchar(255) DEFAULT NULL,
  `remark` mediumtext,
  `postingDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ordertrackhistory`
--

INSERT INTO `ordertrackhistory` (`id`, `orderId`, `orderNumber`, `status`, `remark`, `postingDate`) VALUES
(1, '1', '8meM976YFw', 'in Process', 'Its in the process of bein\' delivered!', '2019-04-15 08:37:40'),
(2, '2', '7me07BfYFw', 'Delivered', 'Delivered it to the boy who received it!', '2019-04-15 09:41:13'),
(3, '1', '', 'Delivered', 'given', '2019-04-15 16:39:30'),
(4, '3', '', 'in Process', 'packing', '2019-04-15 16:41:02'),
(5, '15', '', 'Delivered', 'ad', '2019-04-19 17:28:43'),
(6, '17', '', 'in Process', 'In the truck', '2019-04-22 09:04:21'),
(7, '3', '', 'Delivered', 'as', '2019-05-14 07:58:29'),
(8, '4', '', 'Delivered', 'a', '2019-05-14 07:58:38'),
(9, '17', '', 'Delivered', 'a', '2019-05-14 07:58:46'),
(10, '5', '', 'Delivered', '4', '2019-05-14 07:59:02'),
(11, '18', '', 'Delivered', 'u', '2019-05-14 07:59:36'),
(12, '16', '', 'Delivered', 'j', '2019-05-30 16:45:12'),
(13, '10', '', 'Delivered', 'hy', '2019-05-30 16:55:07'),
(14, '11', '', 'Delivered', '685', '2019-05-30 16:55:38'),
(15, '12', '', 'Delivered', ',', '2019-05-30 16:55:51'),
(16, '13', '', 'Delivered', ';', '2019-05-30 16:56:02'),
(17, '20', '', 'Delivered', 'test', '2019-06-09 12:36:32');

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
(1, '13', '155525544034', '0', '1555255440'),
(2, '13', '155539539734', '0', '1555395397'),
(3, '13', '155539911934', '0', '1555399119'),
(4, '14', '155539948934', '27', '1555399489'),
(5, '15', '155740729834', '0', '1557407298'),
(6, '14', '155803517734', '0', '1558035177'),
(7, '13', '155806642734', '0', '1558066427'),
(8, '22', '155998577334', '66666', '1559985773'),
(9, '13', '156008272234', '1069.9972', '1560082722'),
(10, '13', '156008345134', '1034.94', '1560083451'),
(11, '16', '19-20-0000004', '10000', '1565169832'),
(12, '15', '19-20-0000005', '29989.129113559', '1565170466'),
(13, '21', '19-20-0000007', '55599.43', '1565266551'),
(14, '16', '19-20-0000008', '48027', '1565266868');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `category` varchar(255) NOT NULL,
  `subCategory` varchar(255) DEFAULT NULL,
  `uom` varchar(50) NOT NULL,
  `productName` text,
  `productCompany` varchar(255) DEFAULT NULL,
  `productPrice` varchar(255) DEFAULT NULL,
  `hsnno` text NOT NULL,
  `productPriceBeforeDiscount` varchar(255) DEFAULT NULL,
  `productDescription` longtext,
  `productImage1` varchar(255) DEFAULT NULL,
  `productImage2` varchar(255) DEFAULT NULL,
  `productImage3` varchar(255) DEFAULT NULL,
  `shippingCharge` varchar(255) DEFAULT NULL,
  `productAvailability` varchar(255) DEFAULT NULL,
  `quantityleft` varchar(255) DEFAULT '0',
  `rewardsapplicable` varchar(255) NOT NULL,
  `taxid` varchar(255) NOT NULL,
  `postingDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updationDate` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category`, `subCategory`, `uom`, `productName`, `productCompany`, `productPrice`, `hsnno`, `productPriceBeforeDiscount`, `productDescription`, `productImage1`, `productImage2`, `productImage3`, `shippingCharge`, `productAvailability`, `quantityleft`, `rewardsapplicable`, `taxid`, `postingDate`, `updationDate`) VALUES
(1, '1', '1', '1', 'Bose Quiet Comfort 35 II Wireless Headphone Silver', 'Bose Electronics', '29363.00', '63454634234', '39363.00', '<div id=\"dpx-product-description_feature_div\" style=\"box-sizing: border-box;\"><div id=\"descriptionAndDetails\" class=\"a-section a-spacing-extra-large\" style=\"box-sizing: border-box; margin-bottom: 0px;\"><div id=\"productDescription_feature_div\" class=\"feature\" data-feature-name=\"productDescription\" data-cel-widget=\"productDescription_feature_div\" style=\"box-sizing: border-box;\"><div id=\"productDescription_feature_div\" data-feature-name=\"productDescription\" data-template-name=\"productDescription\" class=\"a-row feature\" data-cel-widget=\"productDescription_feature_div\" style=\"box-sizing: border-box; width: 1674px;\"><div id=\"productDescription\" class=\"a-section a-spacing-small\" style=\"box-sizing: border-box; margin: 0.5em 0px 0em 25px; overflow-wrap: break-word; line-height: initial;\"><p style=\"box-sizing: border-box; padding: 0px; margin-top: 0em; margin-bottom: 1em; margin-left: 1em;\"><font face=\"Amazon Ember, Arial, sans-serif\" size=\"2\"><b>Quiet comfort 35 wireless headphones II</b></font><br></p></div></div></div></div></div>\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n', '81B1hwVr9ML._SL1500_.jpg', '81eKatMbk7L._SL1500_.jpg', '71DNFlj7zdL._SL1500_.jpg', '180', 'In Stock', '-51', '0', '1', '2019-04-12 21:34:04', NULL),
(2, '1', '1', '1', 'Sonys WH-1000XM3 Wireless Industry Leading Noise Cancellation Headphones with Alexa (Black)', 'Sony Electronics', '26990.00', '87504634234', '29990.00', '<div id=\"dpx-product-description_feature_div\" style=\"box-sizing: border-box; color: rgb(17, 17, 17); font-family: &quot;Amazon Ember&quot;, Arial, sans-serif;\"><div id=\"descriptionAndDetails\" class=\"a-section a-spacing-extra-large\" style=\"box-sizing: border-box; margin-bottom: 0px;\"><div id=\"productDescription_feature_div\" class=\"feature\" data-feature-name=\"productDescription\" data-cel-widget=\"productDescription_feature_div\" style=\"box-sizing: border-box;\"><div id=\"productDescription_feature_div\" data-feature-name=\"productDescription\" data-template-name=\"productDescription\" class=\"a-row feature\" data-cel-widget=\"productDescription_feature_div\" style=\"box-sizing: border-box; width: 1674px;\"><div id=\"productDescription\" class=\"a-section a-spacing-small\" style=\"box-sizing: border-box; margin: 0.5em 0px 0em 25px; color: rgb(51, 51, 51); overflow-wrap: break-word; font-size: small; line-height: initial;\"><ul class=\"a-unordered-list a-vertical a-spacing-none\" style=\"box-sizing: border-box; margin-bottom: 0px; margin-left: 18px; color: rgb(148, 148, 148); font-size: 13px;\"><li style=\"box-sizing: border-box; list-style: disc; overflow-wrap: break-word; margin: 0px;\"><span class=\"a-list-item\" style=\"box-sizing: border-box; color: rgb(17, 17, 17);\">Industry-leading Digital Noise Cancelling lets you listen without distractions with QN1 HD Processor</span></li><li style=\"box-sizing: border-box; list-style: disc; overflow-wrap: break-word; margin: 0px;\"><span class=\"a-list-item\" style=\"box-sizing: border-box; color: rgb(17, 17, 17);\">Quick Attention Mode for effortless conversations without taking your headphones off</span></li><li style=\"box-sizing: border-box; list-style: disc; overflow-wrap: break-word; margin: 0px;\"><span class=\"a-list-item\" style=\"box-sizing: border-box; color: rgb(17, 17, 17);\">Quick charge for 10min charge for 5 hours play back</span></li><li style=\"box-sizing: border-box; list-style: disc; overflow-wrap: break-word; margin: 0px;\"><span class=\"a-list-item\" style=\"box-sizing: border-box; color: rgb(17, 17, 17);\">Battery life up to 30hrs for long listening hours</span></li><li style=\"box-sizing: border-box; list-style: disc; overflow-wrap: break-word; margin: 0px;\"><span class=\"a-list-item\" style=\"box-sizing: border-box; color: rgb(17, 17, 17);\">Sony | Headphones Connect APP for Android /iOS to use Smart Listening technology to control your ambient sound settings</span></li><li style=\"box-sizing: border-box; list-style: disc; overflow-wrap: break-word; margin: 0px;\"><span class=\"a-list-item\" style=\"box-sizing: border-box; color: rgb(17, 17, 17);\">Touch Sensors to play and skip tracks, control volume by a simple tap or swipe on the ear cups</span></li><li style=\"box-sizing: border-box; list-style: disc; overflow-wrap: break-word; margin: 0px;\"><span class=\"a-list-item\" style=\"box-sizing: border-box; color: rgb(17, 17, 17);\">Noise Cancelling Optimizer automatically adjusts to your surroundings and activities</span></li></ul></div></div></div></div></div>\r\n\r\n', '61TT0ZPDlLL._SL1500_.jpg', '71jG6sNzmLL._SL1500_.jpg', '61Wdwg+R-aL._SL1500_.jpg', '260', 'In Stock', '0', '0', '1', '2019-04-12 21:36:59', NULL),
(3, '4', '7', '3', 'Matrix Men Formal Eco Fleece Sherpa Collar Duster Coat with Pockets', 'Ziaesm', '8177.97', '7323423423', '8377.97', '<h3 class=\"a-spacing-mini\" style=\"box-sizing: border-box; padding: 0px; font-size: 17px; line-height: 1.255; font-family: Arial, sans-serif; color: rgb(17, 17, 17); margin-bottom: 6px !important;\">Quilted Jacket</h3><p style=\"box-sizing: border-box; padding: 0px; margin-bottom: 14px; color: rgb(17, 17, 17); font-family: &quot;Amazon Ember&quot;, Arial, sans-serif;\">Designed to be both functional and fashionable, this modern travel friendly bomber jacket has a stylish flair. The Ben Martin jacket is reliable, especially as the temperatures drop and a light breeze chills the air. Typically casual, this jacket embodies both retro cool and modern style. It is designed to take you from a party setting to the casual ski mountains in high style.</p>', 'Movie-Clothes-Matrix-Neo-Cosplay-Costume-Black-uniform-suit-Trench-Coat-only-Customizable.jpg_640x640.jpg', 'pms-coat-same-as-photo-s-chic-stand-collar-button-thicken-woolen-long-coat-4503005823070_1200x1200.jpg', 'The-Matrix-Cosplay-Customised-Black-Cosplay-Costume-Neo-Trench-Coat-Only-Coat-womens-mens-girls-boys.jpg_640x640.jpg', '20', 'In Stock', '1445', '1\r\n', '1', '2019-04-12 21:42:41', NULL),
(4, '1', '5', '1', 'OnePlus 6T (Mirror Black, 8GB RAM, 128GB Storage)', 'OnePlus', '37999.99', '4355435234', '41999.00', '<ul class=\"a-unordered-list a-vertical a-spacing-none\" style=\"box-sizing: border-box; margin-bottom: 0px; margin-left: 18px; color: rgb(148, 148, 148); font-family: &quot;Amazon Ember&quot;, Arial, sans-serif;\"><li style=\"box-sizing: border-box; list-style: disc; overflow-wrap: break-word; margin: 0px;\"><span class=\"a-list-item\" style=\"box-sizing: border-box; color: rgb(17, 17, 17);\">Camera: 16+20 MP Dual rear camera with Optical Image Stabilization, Super slow motion, Nightscape and Studio Lighting | 16 MP front camera</span></li><li style=\"box-sizing: border-box; list-style: disc; overflow-wrap: break-word; margin: 0px;\"><span class=\"a-list-item\" style=\"box-sizing: border-box; color: rgb(17, 17, 17);\">Display:&nbsp;6.41-inch(16.2 cms)&nbsp;Full HD+ Optic AMOLED display with 2340 x 1080 pixels resolution and an 86% screen-to-body ratio</span></li><li style=\"box-sizing: border-box; list-style: disc; overflow-wrap: break-word; margin: 0px;\"><span class=\"a-list-item\" style=\"box-sizing: border-box; color: rgb(17, 17, 17);\">Memory, Storage &amp; SIM: 8GB RAM | 128GB storage | Dual nano SIM with dual standby (4G+4G)</span></li><li style=\"box-sizing: border-box; list-style: disc; overflow-wrap: break-word; margin: 0px;\"><span class=\"a-list-item\" style=\"box-sizing: border-box; color: rgb(17, 17, 17);\">Screen Unlock: In-screen fingerprint sensor. The OnePlus 6T unlocks in 0.34s for a seamless and intuitive unlock experience</span></li><li style=\"box-sizing: border-box; list-style: disc; overflow-wrap: break-word; margin: 0px;\"><span class=\"a-list-item\" style=\"box-sizing: border-box; color: rgb(17, 17, 17);\">Operating System and Processor: OxygenOS based on Android 9.0 Pie with 2.8GHz Qualcomm Snapdragon 845 octa-core processor</span></li><li style=\"box-sizing: border-box; list-style: disc; overflow-wrap: break-word; margin: 0px;\"><span class=\"a-list-item\" style=\"box-sizing: border-box; color: rgb(17, 17, 17);\">Battery : 3700 mAh lithium-polymer battery with Fast Charge technology</span></li><li style=\"box-sizing: border-box; list-style: disc; overflow-wrap: break-word; margin: 0px;\"><span class=\"a-list-item\" style=\"box-sizing: border-box; color: rgb(17, 17, 17);\">Included in the Box: Screen Protector (pre-applied); Translucent Case; OnePlus Fast Charge Type-C Cable; OnePlus Fast Charge Power Adapter; SIM Tray Ejector; Quick Start Guide; Safety Information; OnePlus Type-C to 3.5mm Audio Jack Adapter</span></li></ul>\r\n\r\n\r\n', 'specs-image-OnePlus-6T-Mirror-Black.jpg', 'specs-image-OnePlus-6T-Mirror-Black.jpg', 'specs-image-OnePlus-6T-Mirror-Black.jpg', '0', 'In Stock', '0', '0', '1', '2019-04-12 21:45:32', NULL),
(5, '1', '5', '1', 'Apple iPhone X (64GB) - Silver', 'Apple Inc', '75000.00', '63457354345', '91900.00', '<span style=\"color: rgb(51, 51, 51); font-family: &quot;Amazon Ember&quot;, Arial, sans-serif; font-size: small;\">iPhone X features a 5.8-inch Super Retina display with HDR and True Tone. An all-screen design and a surgical-grade stainless steel band. Charges wirelessly. Resists water and dust. 12MP dual cameras with dual optical image stabilization. TrueDepth camera with Portrait mode and Portrait Lighting. Face ID lets you unlock and use Apple Pay with just a glance. Powered by the A11 Bionic chip, iPhone X supports augmented reality experiences in games and apps. And iOS 12â€”the most advanced mobile operating systemâ€”with powerful new tools that make iPhone more personal than ever.</span><br>\r\n', '121008-v1-apple-iphone-x-mobile-phone-large-1.jpg', '121008-v1-apple-iphone-x-mobile-phone-large-1.jpg', '41tDXHpeNHL._SL1024_.jpg', '0', 'In Stock', '-59', '0', '1', '2019-04-12 21:46:50', NULL),
(6, '1', '6', '1', 'All-New Kindle (10th Gen), 6 Display now with Built-in Light, 4 GB, Wi-Fi (Black)', 'Amazon.com', '7999.00', '456235234234', '7999.00', '<ul class=\"a-unordered-list a-vertical a-spacing-none\" style=\"box-sizing: border-box; margin-bottom: 0px; margin-left: 18px; color: rgb(148, 148, 148); font-family: &quot;Amazon Ember&quot;, Arial, sans-serif;\"><li style=\"box-sizing: border-box; list-style: disc; overflow-wrap: break-word; margin: 0px;\"><span class=\"a-list-item\" style=\"box-sizing: border-box; color: rgb(17, 17, 17);\">Adjustable front light lets you read comfortably for hoursâ€”indoors and outdoors, day and night.</span></li><li style=\"box-sizing: border-box; list-style: disc; overflow-wrap: break-word; margin: 0px;\"><span class=\"a-list-item\" style=\"box-sizing: border-box; color: rgb(17, 17, 17);\">Purpose-built for reading, with a 167 ppi glare-free display that reads like real paper, even in direct sunlight.</span></li><li style=\"box-sizing: border-box; list-style: disc; overflow-wrap: break-word; margin: 0px;\"><span class=\"a-list-item\" style=\"box-sizing: border-box; color: rgb(17, 17, 17);\">Read distraction-free. Highlight passages, look up definitions, translate words, and adjust text sizeâ€”without ever leaving the page.</span></li><li style=\"box-sizing: border-box; list-style: disc; overflow-wrap: break-word; margin: 0px;\"><span class=\"a-list-item\" style=\"box-sizing: border-box; color: rgb(17, 17, 17);\">Select from millions of books including new releases and bestsellers. Holds thousands of titles so you can take your library with you.</span></li><li style=\"box-sizing: border-box; list-style: disc; overflow-wrap: break-word; margin: 0px;\"><span class=\"a-list-item\" style=\"box-sizing: border-box; color: rgb(17, 17, 17);\">Prime members read free with unlimited access to hundreds of books, comics and more.</span></li><li style=\"box-sizing: border-box; list-style: disc; overflow-wrap: break-word; margin: 0px;\"><span class=\"a-list-item\" style=\"box-sizing: border-box; color: rgb(17, 17, 17);\">A single battery charge lasts weeks, not hours.</span></li><li style=\"box-sizing: border-box; list-style: disc; overflow-wrap: break-word; margin: 0px;\"><span class=\"a-list-item\" style=\"box-sizing: border-box; color: rgb(17, 17, 17);\">This device does not support playback of Audible audiobooks.</span></li></ul>\r\n', '61MWcLEBkDL._SL1000_.jpg', '717XacHyY9L._SL1000_.jpg', '613qVaBn9vL._SL1000_.jpg', '55', 'In Stock', '0', '0', '1', '2019-04-12 21:47:58', NULL),
(17, '5', '8', '1', 'Krackjack 200gms', 'Parle', '27', '19059020', '30', '<span style=\"color: rgb(51, 51, 51); font-family: arial; font-size: 16px;\">After a hectic and tiresome day, all we need is a refreshing snack to eat so that we feel fresh. In such a case, Parle krack jack biscuits are a perfect choice. Their crunchiness makes your life crisp and tasty again. The sweet and sour taste of the biscuits will make you forget your worries</span><br>', '12.jpg', '13.jpg', '14.png', '0', 'In Stock', '-73580', '1\r\n', '4', '2019-04-14 05:43:17', NULL),
(18, '7', '9', '1', 'Parachute 250ml', 'Parachute', '92', '1513.11.00', '105', '<ul class=\"a-unordered-list a-vertical a-spacing-none\" style=\"box-sizing: border-box; margin-bottom: 0px; margin-left: 18px; color: rgb(148, 148, 148); font-family: &quot;Amazon Ember&quot;, Arial, sans-serif;\"><li style=\"box-sizing: border-box; list-style: disc; overflow-wrap: break-word; margin: 0px;\"><span class=\"a-list-item\" style=\"box-sizing: border-box; color: rgb(17, 17, 17);\">Made from 100% pure coconut oil</span></li><li style=\"box-sizing: border-box; list-style: disc; overflow-wrap: break-word; margin: 0px;\"><span class=\"a-list-item\" style=\"box-sizing: border-box; color: rgb(17, 17, 17);\">Consistent composition and viscosity in every drop of oil</span></li><li style=\"box-sizing: border-box; list-style: disc; overflow-wrap: break-word; margin: 0px;\"><span class=\"a-list-item\" style=\"box-sizing: border-box; color: rgb(17, 17, 17);\">Long lasting freshness</span></li><li style=\"box-sizing: border-box; list-style: disc; overflow-wrap: break-word; margin: 0px;\"><span class=\"a-list-item\" style=\"box-sizing: border-box; color: rgb(17, 17, 17);\">5 Stage Purification process to ensure 100% pure coconut oil every time</span></li><li style=\"box-sizing: border-box; list-style: disc; overflow-wrap: break-word; margin: 0px;\"><span class=\"a-list-item\" style=\"box-sizing: border-box; color: rgb(17, 17, 17);\">Made from the finest quality coconut to ensure best Coconut Oil</span></li><li style=\"box-sizing: border-box; list-style: disc; overflow-wrap: break-word; margin: 0px;\"><span class=\"a-list-item\" style=\"box-sizing: border-box; color: rgb(17, 17, 17);\">Parachute Coconut Oil - 250 ml Flip Top</span></li></ul>\r\n', '71OTgymA+ZL._SL1500_.jpg', '71sQ9TFFIJL._SL1500_.jpg', '61hTmsydzFL._SL1500_.jpg', '0', 'In Stock', '20', '0', '1', '2019-04-14 06:11:04', NULL),
(19, '8', '10', '1', 'Good Day Cashew', 'Britania', '9.75', '123', '10', '<br>', 'DIAMOND.jpg', 'DIAMOND.jpg', '', '0', '', '0', '1\r\n', '1', '2019-05-09 11:54:29', NULL),
(20, '9', '11', '1', 'CINTHOL ORIGINAL', 'GODREJ', '121.86', '10011', '131', '<br>', 'Desert.jpg', 'Hydrangeas.jpg', 'Koala.jpg', '0', 'In Stock', '-155', '1\r\n', '4', '2019-05-09 11:55:50', NULL),
(21, '9', '11', '1', 'NO1 SANDAL', 'GODREJ', '61.83', '34011190', '72', '<br>\r\n\r\n', 'Chrysanthemum.jpg', 'Desert.jpg', '', '0', 'In Stock', '-63', '0', '4', '2019-05-09 12:31:35', NULL);

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
  `mrp` varchar(255) NOT NULL,
  `qtycase` varchar(255) NOT NULL,
  `qtyuom` varchar(255) NOT NULL,
  `baseratecase` varchar(255) NOT NULL,
  `baserateuom` varchar(255) NOT NULL,
  `disc` varchar(255) NOT NULL,
  `disca` varchar(255) NOT NULL,
  `neta` varchar(255) NOT NULL,
  `cgst` varchar(255) NOT NULL,
  `sgst` varchar(255) NOT NULL,
  `cgsta` varchar(255) NOT NULL,
  `sgsta` varchar(255) NOT NULL,
  `cess` varchar(255) NOT NULL,
  `totalamount` varchar(255) NOT NULL,
  `margin` varchar(255) NOT NULL,
  `uomsp` varchar(255) NOT NULL,
  `dispp` varchar(255) NOT NULL,
  `dispd` varchar(255) NOT NULL,
  `totalwhole` varchar(255) NOT NULL,
  `creditnote` varchar(255) NOT NULL,
  `logistic` varchar(255) NOT NULL,
  `freeproduct` varchar(100) NOT NULL DEFAULT '--null--',
  `timestamp` varchar(255) NOT NULL,
  `uom` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `purchase`
--

INSERT INTO `purchase` (`id`, `business`, `supplier`, `invoicedate`, `invoicenumber`, `vehiclenumber`, `deliveredcontact`, `transport`, `receiveddate`, `batch`, `product`, `mrp`, `qtycase`, `qtyuom`, `baseratecase`, `baserateuom`, `disc`, `disca`, `neta`, `cgst`, `sgst`, `cgsta`, `sgsta`, `cess`, `totalamount`, `margin`, `uomsp`, `dispp`, `dispd`, `totalwhole`, `creditnote`, `logistic`, `freeproduct`, `timestamp`, `uom`) VALUES
(1, '1', '1', '2019-06-02', 'A1B1', '43454', '123456', 'lol', '2019-06-05', 'A1', '1', '39363.00', '5', '5', '30000', '6000.00', '10', '15000.00', '135000.00', '6', '6', '8100.00', '8100.00', '0', '151200.00', '5', '6350.40', '20000', '100', '151200.00', '1000', '500', '', '1559756958', 'Boxes'),
(2, '6', '5', '1989-12-19', 'INU999834234', 'Ullam ut fugiat con', '43534534534', 'Culpa ad perspiciat', '2015-09-19', 'A35', '3', '8377.97', '445', '6345', '49956377.97', '7873.35', '4', '889223527.87', '21341364668.78', '6', '6', '1280481880.13', '1280481880.13', '0', '23902328428.78', '55', '13121.40', '5000', '2000', '29072956945.78', '35', '0', 'Shampoo', '1559910838', 'Cases'),
(3, '6', '5', '1989-12-19', 'INU999834234', 'Ullam ut fugiat con', '43534534534', 'Culpa ad perspiciat', '2015-09-19', '795A', '17', '30', '565', '74564', '7755555', '104.01', '5', '219094428.75', '4162794146.25', '9', '9', '374651473.16', '374651473.16', '0', '4912097092.25', '55', '180.73', '5656', '345', '29072956945.78', '35', '0', '', '1559910838', 'Pieces'),
(4, '8', '7', '1989-12-19', 'U6699834234', 'Ullam ut fugiat con', '43534534534', 'Culpa ad perspiciat', '2015-09-19', 'A35', '3', '8377.97', '445', '6345', '49956377.97', '7873.35', '4', '889223527.87', '21341364668.78', '6', '6', '1280481880.13', '1280481880.13', '0', '23902328428.78', '55', '13121.40', '5000', '2000', '28818979118.58', '0', '0', 'Shampoo', '1559910914', 'Cases'),
(5, '8', '7', '1989-12-19', 'U6699834234', 'Ullam ut fugiat con', '43534534534', 'Culpa ad perspiciat', '2015-09-19', '795A', '17', '30', '565', '74564', '7755555', '104.01', '5', '219094428.75', '4162794146.25', '9', '9', '374651473.16', '374651473.16', '0', '4912097092.25', '55', '180.73', '5656', '345', '28818979118.58', '0', '0', '', '1559910914', 'Pieces'),
(6, '8', '7', '1989-12-19', 'U6699834234', 'Ullam ut fugiat con', '43534534534', 'Culpa ad perspiciat', '2015-09-19', 'yhh', '3', '8377.97', '555', '666', '7877', '11.83', '7', '306021.45', '4065713.55', '6', '6', '243942.81', '243942.81', '0', '4553597.55', '9', '13.43', '8888', '666', '28818979118.58', '0', '0', 'Kara', '1559910914', 'Pieces'),
(7, '1', '2', '2019-06-09', 'A1010', 'Aa', '324234234', 'Culpa ad perspiciat', '2019-06-09', 'A1', '17', '30', '5', '40', '857.4', '21.43', '0', '0.00', '4287.00', '9', '9', '385.83', '385.83', '0', '5057.00', '', '25.29', '27', '0', '5057.00', '0', '0', '', '1560082473', 'Cases');

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
(1, ':1:51::::::::', '');

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `id` int(11) NOT NULL,
  `product` varchar(255) NOT NULL,
  `hsn` varchar(30) NOT NULL,
  `utc` varchar(100) NOT NULL,
  `qty` varchar(255) NOT NULL,
  `mrp` varchar(255) NOT NULL,
  `baserate` varchar(255) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `dis` varchar(255) NOT NULL,
  `gst` varchar(255) NOT NULL,
  `gstamount` varchar(255) NOT NULL,
  `total` varchar(255) NOT NULL,
  `finalrate` varchar(255) NOT NULL,
  `paymentdue` varchar(255) NOT NULL,
  `totalpaid` varchar(255) NOT NULL,
  `invoice` varchar(100) NOT NULL,
  `business` varchar(255) NOT NULL,
  `timestamp` varchar(100) NOT NULL,
  `remarks` varchar(255) NOT NULL,
  `customer` varchar(255) NOT NULL,
  `batch` varchar(100) NOT NULL,
  `beat` varchar(100) NOT NULL,
  `uom` varchar(20) DEFAULT NULL,
  `freighta` int(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`id`, `product`, `hsn`, `utc`, `qty`, `mrp`, `baserate`, `amount`, `dis`, `gst`, `gstamount`, `total`, `finalrate`, `paymentdue`, `totalpaid`, `invoice`, `business`, `timestamp`, `remarks`, `customer`, `batch`, `beat`, `uom`, `freighta`) VALUES
(1, '1', '63454634234', '5', '4', '39363.00', '17857.14', '16555', '10', '12', '', '66666', '4666', '66666.00', '', '155998577334', '2', '1559985773', '', '22', 'A1', '2', NULL, 0),
(2, '17', '19059020', '40', '1', '30', '22.88', '915.254', '0', '18', '164.74', '1079.9972', '27.00', '1080.00', '', '156008272234', '1', '1560082722', '10', '13', 'A1', '1', NULL, 0),
(3, '17', '19059020', '40', '1', '30', '22.88', '915.20', '0', '18', '164.74', '1079.94', '27', '1079.94', '', '156008345134', '1', '1560083451', '1', '13', 'A1', '1', NULL, 0),
(4, '1', '63454634234', '5', '1', '39363.00', '17857.14', '17857.14', '50', '12', '1071.43', '10000.00', '100000.00', '10000.00', '', '19-20-0000004', '1', '1565169832', '0', '16', 'A1', '3', '1', 0),
(5, '1', '63454634234', '5', '3', '39363.00', '17857.14', '53571.42', '50', '12', '3214.29', '30000.00', '30000.00', '30000.00', '', '19-20-0000005', '4', '1565170466', '10.870886440678', '15', 'A1', '2', 'Cases', 0),
(6, '1', '63454634234', '5', '1', '39363.00', '17857.14', '89285.70', '50', '12', '5357.14', '49999.99', '50000', '55599.43', '', '19-20-0000006', '2', '1565266551', '0', '21', 'A1', '1', 'Boxes', 0),
(7, '17', '19059020', '74564', '1', '30', '4793.22', '4793.22', '1', '18', '854.15', '5599.44', '5600', '55599.43', '', '19-20-0000007', '1', '1565266551', '0', '21', '795A', '1', 'Cases', 0),
(8, '1', '63454634234', '5', '1', '39363.00', '17857.14', '89285.70', '52', '12', '5142.86', '48000.00', '48000', '48027.00', '', '19-20-0000008', '1', '1565266868', '0', '16', 'A1', '3', 'Boxes', 0),
(9, '17', '19059020', '40', '1', '30', '22.88', '22.88', '0', '18', '4.12', '27.00', '27', '48027.00', '', '19-20-0000008', '1', '1565266868', '0', '16', 'A1', '3', 'Cases', 0);

-- --------------------------------------------------------

--
-- Table structure for table `subcategory`
--

CREATE TABLE `subcategory` (
  `id` int(11) NOT NULL,
  `categoryid` varchar(255) DEFAULT NULL,
  `subcategory` varchar(255) DEFAULT NULL,
  `creationDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updationDate` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subcategory`
--

INSERT INTO `subcategory` (`id`, `categoryid`, `subcategory`, `creationDate`, `updationDate`) VALUES
(1, '1', 'Headphones', '2019-04-12 21:03:39', '19-04-2019 09:11:36 PM'),
(3, '2', 'Living Room Furniture', '2019-04-12 21:04:52', NULL),
(5, '1', 'Smartphones', '2019-04-12 21:05:22', NULL),
(6, '1', 'E-books', '2019-04-12 21:05:35', NULL),
(7, '4', 'Trenchcoats', '2019-04-12 21:22:26', '17-04-2019 05:37:22 PM'),
(8, '5', 'Biscuits', '2019-04-14 05:14:37', NULL),
(9, '7', 'Hair Oil', '2019-04-14 06:09:03', NULL),
(10, '8', 'cream', '2019-05-09 11:49:41', NULL),
(11, '9', 'Bathing Soaps', '2019-05-09 11:52:38', NULL);

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
  `shippingPincode` varchar(255) DEFAULT NULL,
  `billingAddress` longtext,
  `district` varchar(50) NOT NULL,
  `billingState` varchar(255) DEFAULT NULL,
  `billingCity` varchar(255) DEFAULT NULL,
  `billingPincode` varchar(255) DEFAULT NULL,
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
(1, 'Supplier A', 'Suiter Company', 'suppliera@mail.com', '324234234', 34234234, 2346435345, NULL, '4534534534,JAKSjkasjkdmAS,EKJrker324		', NULL, NULL, NULL, '							', 'Karnataka', 'Bengaluru', NULL, '234234', '35243', '45345', '435345', '345345', 'Admin', 324908209348, 'Goldman Sachs', 'NYC', 'Business Account Name', '342342345662342', '546354345', '2019-04-12 21:55:06', NULL),
(2, 'Supplier B', 'Apple Company', 'supplierb@mail.com', '324234234', 34234234, 2346435345, NULL, '4534534534,JAKSjkasjkdmAS,EKJrker324		', NULL, NULL, NULL, '							', 'Karnataka', 'Bengaluru', NULL, '234234', '35243', '45345', '435345', '345345', 'Admin', 324908209348, 'Goldman Sachs', 'NYC', 'Business Account Name', '342342345662342', '546354345', '2019-04-12 21:55:42', NULL),
(3, 'GODREJ', 'SHAH AGENCIES', 'SHAH@GMAIL.COM', 'SHARIF', 9999999999, 0, NULL, 'NELLORE				', NULL, NULL, NULL, 'ATMAKUR					', 'NELLORE', 'ANDHRA PRADESH', NULL, '524322', 'NA', '', 'NA', 'NA', 'SIRAJ', 9999999999, 'na', 'na', 'na', 'na', 'na', '2019-05-09 12:14:37', NULL),
(4, 'GODREJ', 'SHAH AGENCIES', 'SHAH@SHAH.COM', 'SHARIFF', 1234567890, 987654321, NULL, 'NA			', NULL, NULL, NULL, 'ATMAKUR						', 'NELLORE', 'ANDHRA PRADESH', NULL, '524322', 'NA', 'NA', 'NA', 'NA', 'NA', 0, 'NA', 'NA', 'NA', 'NA', 'NA', '2019-05-09 12:19:02', NULL),
(5, 'Chase Nicholson Trading', 'Haley Cohen', 'jyny@mailinator.com', 'Hollee Burnett', 0, 0, NULL, '', NULL, NULL, NULL, 'Id quia et sunt velit ex modi', 'Corrupti cumque a o', 'Aut atque qui iure i', NULL, 'Quos eum exercitatio', 'Cupiditate sunt ill', 'Et et est ipsum dolo', 'Est accusantium mole', 'Laborum expedita sun', 'Paloma Richmond', 73453454353454353, 'Reece Contreras', 'Molestias in rerum s', 'Candace Buckley', '7193453453', 'Omnis dolor iusto ve', '2019-06-07 12:30:24', NULL),
(6, 'Chandler and Copeland Co', 'Steven Hines', 'niru@mailinator.net', 'Leah Howe', 456456, 456456345, NULL, '', NULL, NULL, NULL, 'Provident in similique facere ea ipsum culpa ea labore libero itaque deserunt', 'Iure sunt qui aspern', 'Voluptas sit dolore', NULL, 'Labore atque quia te', 'Omnis blanditiis qui', 'Ratione architecto n', 'Ut iste est veniam ', 'In consequat Sunt a', 'Samantha Rosales', 7345234235, 'Colorado Ferguson', 'Voluptate rerum aliq', 'Nero House', '884', 'Adipisicing aut volu', '2019-06-07 12:30:34', NULL),
(7, 'Burris Brennan LLC', 'Steven Kirby', 'deratitoj@mailinator.com', 'Rhea Valencia', 345345, 345345435, NULL, '', NULL, NULL, NULL, 'Minim aliquip quos et debitis qui et aut blanditiis ex qui sint fugit accusantium et nisi ut', 'Excepteur ab quia se', 'Illum ea voluptatem', NULL, '3345', 'Doloremque dolorem r', 'Ut qui labore exerci', 'Doloremque distincti', 'Qui odio laborum Qu', 'Howard Bryant', 34534543, 'Hilda Chapman', 'Molestias eiusmod el', 'Aspen Trujillo', '529', 'Officia quaerat nost', '2019-06-07 12:30:52', NULL),
(8, 'Byrd Oneal Inc', 'Irene Rowe', 'calah@mailinator.com', 'Genevieve Phelps', 0, 0, NULL, '', NULL, NULL, NULL, 'Nulla est qui officiis dolor quasi eligendi in fugiat voluptas non quo ut tenetur placeat voluptatum', 'Nesciunt dolores cu', 'Minim id ut impedit', NULL, 'Qui laborum Iste ma', 'Minim assumenda est ', 'Fuga Non harum null', 'Id veritatis aut hic', 'Delectus ipsum ea ', 'Katell Browning', 0, 'Mona Dillard', 'Quo ut facilis est a', 'Ryder Butler', '738', 'Ut temporibus in eu ', '2019-06-08 14:01:19', NULL),
(9, 'Griffith Hunter Plc', 'Burton Small', 'polav@mailinator.com', 'Gary Jarvis', 0, 0, NULL, '', NULL, NULL, NULL, 'Possimus obcaecati sit suscipit porro natus sit nisi in vero sunt voluptatem nobis quisquam repudiandae qui', 'Alias corrupti est', 'Aut nulla nihil comm', NULL, 'Irure ea anim except', 'Distinctio Vel nisi', 'Ea excepturi exceptu', 'Eveniet dolore maio', 'Non dolorem voluptat', 'Amos Mcleod', 0, 'Arsenio Wall', 'Incidunt accusantiu', 'Jonas Church', '568', 'Duis rerum excepteur', '2019-06-08 14:01:23', NULL),
(11, 'Mcneil Vasquez LLC', 'Alfreda Melton', 'hekuq@mailinator.com', 'Roth Donaldson', 0, 0, NULL, '', NULL, NULL, NULL, 'Corporis reiciendis omnis dignissimos hic est excepteur incidunt hic neque sed ad hic natus quam in iure ut quia earum', 'Aliquid eiusmod sed ', 'Sunt magni consequat', NULL, 'Non in deserunt nobi', 'Dolore quis voluptas', 'Dolore ducimus volu', 'Et consequuntur est ', 'Est suscipit libero ', 'Lev Velazquez', 0, 'Scott Benjamin', 'Corporis eum invento', 'Herman Shelton', '225', 'Laborum omnis eaque ', '2019-06-08 14:01:34', NULL),
(12, 'Workman and Franks LLC', 'Rudyard Cross', 'xytafyfir@mailinator.com', 'Imelda Molina', 0, 0, NULL, '', NULL, NULL, NULL, 'Et elit occaecat esse sunt velit', 'Corporis laboriosam', 'Reprehenderit aut mo', NULL, 'Assumenda minus in i', 'Incidunt doloribus ', 'Pariatur Aspernatur', 'Aut exercitationem e', 'Magni laboris non co', 'Guy Maddox', 0, 'Maxwell Nicholson', 'Praesentium sint ma', 'Abbot Howe', '330', 'Id eos minim eos a', '2019-06-08 14:01:44', NULL);

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
(1, '12%GST', '6', '6', '12'),
(2, '5% GST', '2.5', '2.5', '5'),
(3, '6% GST', '3', '3', '6'),
(4, '18 % GST', '9', '9', '18');

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
(1, 'Pices', '2019-04-12 21:23:28', '19-04-2019 09:20:38 PM'),
(2, 'Cases', '2019-04-12 21:23:31', NULL),
(3, 'Boxes', '2019-04-12 21:23:35', NULL),
(4, 'UNITS', '2019-05-09 11:47:07', '09-05-2019 05:21:53 PM');

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
  `shippingPincode` varchar(255) DEFAULT NULL,
  `billingAddress` longtext,
  `billingState` varchar(255) DEFAULT NULL,
  `billingCity` varchar(255) DEFAULT NULL,
  `billingPincode` varchar(255) DEFAULT NULL,
  `gstin` varchar(255) DEFAULT NULL,
  `fssai` varchar(255) DEFAULT NULL,
  `pan` varchar(255) DEFAULT NULL,
  `aadharno` varchar(255) DEFAULT NULL,
  `birthdate` date DEFAULT NULL,
  `beat` varchar(100) NOT NULL,
  `regDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updationDate` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `contactno`, `altcontactno`, `password`, `shippingAddress`, `district`, `rewards`, `shippingState`, `shippingCity`, `shippingPincode`, `billingAddress`, `billingState`, `billingCity`, `billingPincode`, `gstin`, `fssai`, `pan`, `aadharno`, `birthdate`, `beat`, `regDate`, `updationDate`) VALUES
(13, 'Retailer A', 'test@test.com', 324982348, 7434534546, '098f6bcd4621d373cade4e832627b4f6', '3096  Fleming Way, Petersburg, USA', 'District A', '86524.718312349', NULL, NULL, NULL, 'Put Water, 3096  Fleming Way, Petersburg, USA', 'Petersburg', NULL, NULL, '23423423', '23423', '4234234', '234234234', '2019-04-13', '1', '2019-04-12 21:57:54', NULL),
(14, 'Test Retailer B', 'test2@test.com', 324982348, 7434534546, '098f6bcd4621d373cade4e832627b4f6', '3223,Bailey Drive,Iowa City, USA', 'District B ', '4360', NULL, NULL, NULL, 'Iowa Water, 3223,Bailey Drive,Iowa City, USA', 'Iowa', NULL, NULL, '567423', '6786723', '678234', '7834234234', '2019-04-02', '4', '2019-04-12 21:59:30', NULL),
(15, 'CNR', 'CNR@GMAIL.COM', 1234567890, 1234567890, 'e807f1fcf82d132f9bb018ca6738a19f', 'ATMAKUR							', 'NA', '0', NULL, NULL, NULL, 'ATMAKUR							', 'NA', NULL, NULL, 'NA', '', 'NA', 'NA', '0000-00-00', '2', '2019-05-09 12:54:10', NULL),
(16, 'Cretailer', 'jack@jack.com', 11111111, 234, 'd2aefeac9dc661bc98eebd6cc12f0b82', 'yolo ship, china', '4', '0', NULL, NULL, NULL, 'no							', '45', NULL, NULL, '5435', '4534', '53645', '97868768', '2019-06-13', '3', '2019-06-04 12:22:50', NULL),
(17, 'Serena Acevedo', 'suhe@mailinator.net', 0, 0, 'f3ed11bbdb94fd9ebdefbaf646ab94d3', 'Excepteur in ut quia rerum ipsa accusantium pariatur Ipsam dolores id aut mollitia soluta quo sit id tempora', 'Pariatur Anim quis ', '0', NULL, NULL, NULL, 'Possimus omnis ullamco debitis dolor ex sit ab et et eu facilis esse facere itaque placeat nisi officia consequatur aperiam', 'Non eos est nulla s', NULL, NULL, 'Aut odit est blandit', 'Enim atque est ut es', 'Obcaecati autem dolo', 'Maxime ad quas Nam s', '1977-05-01', '1', '2019-06-07 12:29:30', NULL),
(18, 'Shelley Gill', 'gewukilyki@mailinator.com', 0, 0, 'f3ed11bbdb94fd9ebdefbaf646ab94d3', 'Esse aute sunt nihil saepe tempora ex enim', 'Aliquam tempor dolor', '0', NULL, NULL, NULL, 'Ab suscipit ut magni officia fugit temporibus est aliquip possimus sed consequat Eum voluptas', 'Lorem ut esse quia s', NULL, NULL, 'Sit aut veritatis ve', 'Harum velit earum s', 'Id velit est ad sit', 'Voluptatem suscipit', '1973-08-24', '1', '2019-06-07 12:29:45', NULL),
(19, 'Drew Elliott', 'tyjaqa@mailinator.com', 0, 0, 'f3ed11bbdb94fd9ebdefbaf646ab94d3', 'Voluptas tempore aliquam illo ex sunt eos esse nesciunt pariatur Anim non modi dicta', 'Ut ipsum consequatu', '0', NULL, NULL, NULL, 'Ducimus dolorum sunt adipisicing consequat Aute', 'Impedit laboriosam', NULL, NULL, 'Omnis ut voluptate d', 'Officia aperiam ipsa', 'Quisquam eligendi ul', 'Sit enim libero susc', '1983-08-23', '3', '2019-06-07 12:29:53', NULL),
(20, 'Ivana Eaton', 'nekahelaz@mailinator.com', 0, 0, 'f3ed11bbdb94fd9ebdefbaf646ab94d3', 'Rerum laboris saepe consectetur sit laborum quae sunt nulla', 'Enim enim vitae dolo', '0', NULL, NULL, NULL, 'Provident minus irure veniam autem quia pariatur Pariatur Magna quas culpa qui minim', 'Rem ea optio quia p', NULL, NULL, 'Enim qui deserunt be', 'Officia doloremque l', 'Corporis veniam ex ', 'Quia temporibus sunt', '2015-10-13', '4', '2019-06-07 12:29:57', NULL),
(21, 'Angela Mcdowell', 'byva@mailinator.com', 0, 0, 'f3ed11bbdb94fd9ebdefbaf646ab94d3', 'Temporibus autem et officia delectus proident obcaecati nulla possimus quisquam minus ex eveniet eius accusantium tenetur est', 'Saepe enim rerum vel', '0', NULL, NULL, NULL, 'Fugiat soluta doloremque error quisquam est sed inventore quis rerum consequatur molestiae', 'Id minim anim eaque', NULL, NULL, 'Impedit earum id s', 'Magna beatae ducimus', 'Laudantium sint ull', 'Aut quam totam dolor', '2014-03-09', '1', '2019-06-07 12:30:01', NULL),
(22, 'Idona Levine', 'ninubexiz@mailinator.com', 0, 0, 'f3ed11bbdb94fd9ebdefbaf646ab94d3', 'Ut qui ut reprehenderit id et perferendis quas qui et sit non dignissimos aut', 'Dicta voluptatem Un', '0', NULL, NULL, NULL, 'Officiis iure sit labore necessitatibus vel', 'Officia necessitatib', NULL, NULL, 'Voluptatem error dol', 'Voluptates suscipit ', 'Ex necessitatibus is', 'Elit fuga Aut ab l', '1986-11-28', '2', '2019-06-07 12:30:05', NULL);

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
-- Indexes for table `executive`
--
ALTER TABLE `executive`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `business`
--
ALTER TABLE `business`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `executive`
--
ALTER TABLE `executive`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=125;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `ordertrackhistory`
--
ALTER TABLE `ordertrackhistory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `paymentdue`
--
ALTER TABLE `paymentdue`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `purchase`
--
ALTER TABLE `purchase`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `subcategory`
--
ALTER TABLE `subcategory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `taxinfo`
--
ALTER TABLE `taxinfo`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `uom`
--
ALTER TABLE `uom`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
