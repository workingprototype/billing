-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 15, 2019 at 08:06 PM
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
(1, 'South Zone', '2019-04-12 21:48:31', '15-04-2019 03:54:36 PM'),
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
  `timestamp` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `business`
--

INSERT INTO `business` (`id`, `account_name`, `type`, `op_bal`, `dbcr`, `address`, `city`, `state`, `postal_code`, `state_code`, `phone`, `mobile`, `email`, `vat`, `pan`, `gstin`, `aadhar`, `bank_account`, `ifsc_code`, `timestamp`) VALUES
(1, 'Business A', 'Money Maker Group', '15000000', '1000', 'Jerry Street, North Signature Hello Road, Stage 1', 'Bengaluru', 'Karnataka', '501123', '101123', '9500101010', '7570204010', 'businessa@mail.com', '5213423429', '4395893485', '3458345', '345394854835834098', '34058340950348A205934A4', 'ACCERYG234256234', '1555105926'),
(2, 'Business AB', 'Illustrator Group', '35000000', '2000', 'Jerry Street, North Signature Hello Road, Stage 1', 'Paeke', 'Andra Pradesh', '501123', '101123', '9500101010', '7570204010', 'businessa@mail.com', '5213423429', '4395893485', '3458345', '345394854835834098', '34058340950348A205934A4', 'ACCERYG234256234', '1555105969');

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
(1, 'Electronics', 'Electronics is a category of tech.', '2019-04-12 20:31:13', '15-04-2019 02:23:31 PM'),
(2, 'Furniture', 'Furniture is to enhance the home', '2019-04-12 20:31:31', NULL),
(4, 'Men\'s Clothing', 'Men\'s Article of Clothing', '2019-04-12 21:21:49', '15-04-2019 01:24:08 PM'),
(5, 'Food', 'Eatables', '2019-04-14 05:14:06', NULL),
(7, 'Household', 'Household items', '2019-04-14 06:08:52', '15-04-2019 01:10:32 PM');

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
(1, '', '098f6bcd4621d373cade4e832627b4f6', '2019-04-12 22:00:37', '', 'Executive Andromeda', '4356346345', '8456354565', 'gara,East Fort, Thrissur', 'Lays', 'Kerala', '9708967897978', '9789789789', '2019-03-13', 'executive@gmail.com'),
(2, '', '098f6bcd4621d373cade4e832627b4f6', '2019-04-12 22:01:18', '', 'Executive Bojack', '786346345', '976354565', 'hello World,East Tower, Thrissur', 'Lays', 'Kerala', '5467457967897978', '5678789789', '1967-05-13', 'executive2@gmail.com');

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
(38, '1555333197', '[\"New Purchase Added\",\"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.103 Safari/537.36\",\"::1\"]', '2');

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
(3, 13, '2', 1, '2019-04-15 09:44:02', '7me07BfYFw', 'COD', 'in Process'),
(4, 13, '4', 1, '2019-04-15 09:44:02', '7me07BfYFw', 'COD', NULL),
(5, 13, '3', 1, '2019-04-15 15:34:45', '8meMmBfYFw', 'COD', NULL),
(6, 1, '3', 1, '2019-04-15 17:45:56', 'NrRGq2sIlN', 'COD', NULL),
(7, 1, '3', 1, '2019-04-15 17:47:05', 'NrRGq2sIlN', 'COD', NULL),
(8, 1, '17', 1, '2019-04-15 17:48:23', 'l7r7XlfKaM', 'COD', NULL),
(9, 1, '18', 1, '2019-04-15 17:48:23', 'l7r7XlfKaM', 'COD', NULL);

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
(4, '3', '', 'in Process', 'packing', '2019-04-15 16:41:02');

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
(1, '13', '155525544034', '27', '1555255440');

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
(1, '1', '1', '1', 'Bose Quiet Comfort 35 II Wireless Headphone Silver', 'Bose Electronics', '29363.00', '63454634234', '39363.00', '<div id=\"dpx-product-description_feature_div\" style=\"box-sizing: border-box; color: rgb(17, 17, 17); font-family: &quot;Amazon Ember&quot;, Arial, sans-serif;\"><div id=\"descriptionAndDetails\" class=\"a-section a-spacing-extra-large\" style=\"box-sizing: border-box; margin-bottom: 0px;\"><div id=\"productDescription_feature_div\" class=\"feature\" data-feature-name=\"productDescription\" data-cel-widget=\"productDescription_feature_div\" style=\"box-sizing: border-box;\"><div id=\"productDescription_feature_div\" data-feature-name=\"productDescription\" data-template-name=\"productDescription\" class=\"a-row feature\" data-cel-widget=\"productDescription_feature_div\" style=\"box-sizing: border-box; width: 1674px;\"><div id=\"productDescription\" class=\"a-section a-spacing-small\" style=\"box-sizing: border-box; margin: 0.5em 0px 0em 25px; color: rgb(51, 51, 51); overflow-wrap: break-word; font-size: small; line-height: initial;\"><p style=\"box-sizing: border-box; padding: 0px; margin-top: 0em; margin-bottom: 1em; margin-left: 1em;\">Quiet comfort 35 wireless headphones II are engineered with world-class noise cancellation and now theyâ€™re even better. You can control music, send and receive texts, and get answers using just your voice. Just press and hold the action button, and start talking. With QC 35 headphones II, you can be free from wires by connecting easily to your devices with Bluetooth and NFC pairing and voice prompts walk you through the connection. The multi-function button continues to offer access to your phoneâ€™s default virtual assistant, like Siri. Volume-optimized EQ gives you balanced audio performance at any volume, while a noise-rejecting dual-microphone system provides clearer calls, even in noisy environments. They feature up to 20 hours of wireless listening per charge and are designed with premium materials that make them lightweight and comfortable for all-day wear and the Bose Connect app helps you set your preferred level of noise cancellation, unlock more features and access future updates. Get caught with a low battery? The included cable lets you plug in and keep the music playing. Available in black or silver.</p></div></div></div></div></div>', '81B1hwVr9ML._SL1500_.jpg', '81eKatMbk7L._SL1500_.jpg', '71DNFlj7zdL._SL1500_.jpg', '180', 'In Stock', '1', '1\r\n', '1', '2019-04-12 21:34:04', NULL),
(2, '1', '1', '1', 'Sony\'s WH-1000XM3 Wireless Industry Leading Noise Cancellation Headphones with Alexa (Black)', 'Sony Electronics', '26990.00', '87504634234', '29990.00', '<div id=\"dpx-product-description_feature_div\" style=\"box-sizing: border-box; color: rgb(17, 17, 17); font-family: &quot;Amazon Ember&quot;, Arial, sans-serif;\"><div id=\"descriptionAndDetails\" class=\"a-section a-spacing-extra-large\" style=\"box-sizing: border-box; margin-bottom: 0px;\"><div id=\"productDescription_feature_div\" class=\"feature\" data-feature-name=\"productDescription\" data-cel-widget=\"productDescription_feature_div\" style=\"box-sizing: border-box;\"><div id=\"productDescription_feature_div\" data-feature-name=\"productDescription\" data-template-name=\"productDescription\" class=\"a-row feature\" data-cel-widget=\"productDescription_feature_div\" style=\"box-sizing: border-box; width: 1674px;\"><div id=\"productDescription\" class=\"a-section a-spacing-small\" style=\"box-sizing: border-box; margin: 0.5em 0px 0em 25px; color: rgb(51, 51, 51); overflow-wrap: break-word; font-size: small; line-height: initial;\"><ul class=\"a-unordered-list a-vertical a-spacing-none\" style=\"box-sizing: border-box; margin-bottom: 0px; margin-left: 18px; color: rgb(148, 148, 148); font-size: 13px;\"><li style=\"box-sizing: border-box; list-style: disc; overflow-wrap: break-word; margin: 0px;\"><span class=\"a-list-item\" style=\"box-sizing: border-box; color: rgb(17, 17, 17);\">Industry-leading Digital Noise Cancelling lets you listen without distractions with QN1 HD Processor</span></li><li style=\"box-sizing: border-box; list-style: disc; overflow-wrap: break-word; margin: 0px;\"><span class=\"a-list-item\" style=\"box-sizing: border-box; color: rgb(17, 17, 17);\">Quick Attention Mode for effortless conversations without taking your headphones off</span></li><li style=\"box-sizing: border-box; list-style: disc; overflow-wrap: break-word; margin: 0px;\"><span class=\"a-list-item\" style=\"box-sizing: border-box; color: rgb(17, 17, 17);\">Quick charge for 10min charge for 5 hours play back</span></li><li style=\"box-sizing: border-box; list-style: disc; overflow-wrap: break-word; margin: 0px;\"><span class=\"a-list-item\" style=\"box-sizing: border-box; color: rgb(17, 17, 17);\">Battery life up to 30hrs for long listening hours</span></li><li style=\"box-sizing: border-box; list-style: disc; overflow-wrap: break-word; margin: 0px;\"><span class=\"a-list-item\" style=\"box-sizing: border-box; color: rgb(17, 17, 17);\">Sony | Headphones Connect APP for Android /iOS to use Smart Listening technology to control your ambient sound settings</span></li><li style=\"box-sizing: border-box; list-style: disc; overflow-wrap: break-word; margin: 0px;\"><span class=\"a-list-item\" style=\"box-sizing: border-box; color: rgb(17, 17, 17);\">Touch Sensors to play and skip tracks, control volume by a simple tap or swipe on the ear cups</span></li><li style=\"box-sizing: border-box; list-style: disc; overflow-wrap: break-word; margin: 0px;\"><span class=\"a-list-item\" style=\"box-sizing: border-box; color: rgb(17, 17, 17);\">Noise Cancelling Optimizer automatically adjusts to your surroundings and activities</span></li></ul></div></div></div></div></div>', '61TT0ZPDlLL._SL1500_.jpg', '71jG6sNzmLL._SL1500_.jpg', '61Wdwg+R-aL._SL1500_.jpg', '260', 'In Stock', '0', '0', '1', '2019-04-12 21:36:59', NULL),
(3, '4', '7', '3', 'Matrix Men Formal Eco Fleece Sherpa Collar Duster Coat with Pockets', 'Ziaesm', '8177.97', '7323423423', '8377.97', '<h3 class=\"a-spacing-mini\" style=\"box-sizing: border-box; padding: 0px; font-size: 17px; line-height: 1.255; font-family: Arial, sans-serif; color: rgb(17, 17, 17); margin-bottom: 6px !important;\">Quilted Jacket</h3><p style=\"box-sizing: border-box; padding: 0px; margin-bottom: 14px; color: rgb(17, 17, 17); font-family: &quot;Amazon Ember&quot;, Arial, sans-serif;\">Designed to be both functional and fashionable, this modern travel friendly bomber jacket has a stylish flair. The Ben Martin jacket is reliable, especially as the temperatures drop and a light breeze chills the air. Typically casual, this jacket embodies both retro cool and modern style. It is designed to take you from a party setting to the casual ski mountains in high style.</p>', 'Movie-Clothes-Matrix-Neo-Cosplay-Costume-Black-uniform-suit-Trench-Coat-only-Customizable.jpg_640x640.jpg', 'pms-coat-same-as-photo-s-chic-stand-collar-button-thicken-woolen-long-coat-4503005823070_1200x1200.jpg', 'The-Matrix-Cosplay-Customised-Black-Cosplay-Costume-Neo-Trench-Coat-Only-Coat-womens-mens-girls-boys.jpg_640x640.jpg', '20', 'In Stock', '0', '1\r\n', '1', '2019-04-12 21:42:41', NULL),
(4, '1', '5', '3', 'OnePlus 6T (Mirror Black, 8GB RAM, 128GB Storage)', 'OnePlus', '37999.99', '4355435234', '41999.00', '<ul class=\"a-unordered-list a-vertical a-spacing-none\" style=\"box-sizing: border-box; margin-bottom: 0px; margin-left: 18px; color: rgb(148, 148, 148); font-family: &quot;Amazon Ember&quot;, Arial, sans-serif;\"><li style=\"box-sizing: border-box; list-style: disc; overflow-wrap: break-word; margin: 0px;\"><span class=\"a-list-item\" style=\"box-sizing: border-box; color: rgb(17, 17, 17);\">Camera: 16+20 MP Dual rear camera with Optical Image Stabilization, Super slow motion, Nightscape and Studio Lighting | 16 MP front camera</span></li><li style=\"box-sizing: border-box; list-style: disc; overflow-wrap: break-word; margin: 0px;\"><span class=\"a-list-item\" style=\"box-sizing: border-box; color: rgb(17, 17, 17);\">Display:&nbsp;6.41-inch(16.2 cms)&nbsp;Full HD+ Optic AMOLED display with 2340 x 1080 pixels resolution and an 86% screen-to-body ratio</span></li><li style=\"box-sizing: border-box; list-style: disc; overflow-wrap: break-word; margin: 0px;\"><span class=\"a-list-item\" style=\"box-sizing: border-box; color: rgb(17, 17, 17);\">Memory, Storage &amp; SIM: 8GB RAM | 128GB storage | Dual nano SIM with dual standby (4G+4G)</span></li><li style=\"box-sizing: border-box; list-style: disc; overflow-wrap: break-word; margin: 0px;\"><span class=\"a-list-item\" style=\"box-sizing: border-box; color: rgb(17, 17, 17);\">Screen Unlock: In-screen fingerprint sensor. The OnePlus 6T unlocks in 0.34s for a seamless and intuitive unlock experience</span></li><li style=\"box-sizing: border-box; list-style: disc; overflow-wrap: break-word; margin: 0px;\"><span class=\"a-list-item\" style=\"box-sizing: border-box; color: rgb(17, 17, 17);\">Operating System and Processor: OxygenOS based on Android 9.0 Pie with 2.8GHz Qualcomm Snapdragon 845 octa-core processor</span></li><li style=\"box-sizing: border-box; list-style: disc; overflow-wrap: break-word; margin: 0px;\"><span class=\"a-list-item\" style=\"box-sizing: border-box; color: rgb(17, 17, 17);\">Battery : 3700 mAh lithium-polymer battery with Fast Charge technology</span></li><li style=\"box-sizing: border-box; list-style: disc; overflow-wrap: break-word; margin: 0px;\"><span class=\"a-list-item\" style=\"box-sizing: border-box; color: rgb(17, 17, 17);\">Included in the Box: Screen Protector (pre-applied); Translucent Case; OnePlus Fast Charge Type-C Cable; OnePlus Fast Charge Power Adapter; SIM Tray Ejector; Quick Start Guide; Safety Information; OnePlus Type-C to 3.5mm Audio Jack Adapter</span></li></ul>', '51EfDWKl24L._SL1300_.jpg', '51gY+4V-uBL._SL1300_.jpg', '51GmNm5ke0L._SL1300_.jpg', '0', 'In Stock', '0', '1\r\n', '1', '2019-04-12 21:45:32', NULL),
(5, '1', '5', '2', 'Apple iPhone X (64GB) - Silver', 'Apple Inc', '75000.00', '63457354345', '91900.00', '<span style=\"color: rgb(51, 51, 51); font-family: &quot;Amazon Ember&quot;, Arial, sans-serif; font-size: small;\">iPhone X features a 5.8-inch Super Retina display with HDR and True Tone. An all-screen design and a surgical-grade stainless steel band. Charges wirelessly. Resists water and dust. 12MP dual cameras with dual optical image stabilization. TrueDepth camera with Portrait mode and Portrait Lighting. Face ID lets you unlock and use Apple Pay with just a glance. Powered by the A11 Bionic chip, iPhone X supports augmented reality experiences in games and apps. And iOS 12â€”the most advanced mobile operating systemâ€”with powerful new tools that make iPhone more personal than ever.</span><br>', '51R4ZvEJUPL._SL1024_.jpg', '51FKHMP44iL._SL1024_.jpg', '41tDXHpeNHL._SL1024_.jpg', '0', 'In Stock', '0', '1\r\n', '1', '2019-04-12 21:46:50', NULL),
(6, '1', '6', '1', 'All-New Kindle (10th Gen), 6\" Display now with Built-in Light, 4 GB, Wi-Fi (Black)', 'Amazon.com', '7999.00', '456235234234', '7999.00', '<ul class=\"a-unordered-list a-vertical a-spacing-none\" style=\"box-sizing: border-box; margin-bottom: 0px; margin-left: 18px; color: rgb(148, 148, 148); font-family: &quot;Amazon Ember&quot;, Arial, sans-serif;\"><li style=\"box-sizing: border-box; list-style: disc; overflow-wrap: break-word; margin: 0px;\"><span class=\"a-list-item\" style=\"box-sizing: border-box; color: rgb(17, 17, 17);\">Adjustable front light lets you read comfortably for hoursâ€”indoors and outdoors, day and night.</span></li><li style=\"box-sizing: border-box; list-style: disc; overflow-wrap: break-word; margin: 0px;\"><span class=\"a-list-item\" style=\"box-sizing: border-box; color: rgb(17, 17, 17);\">Purpose-built for reading, with a 167 ppi glare-free display that reads like real paper, even in direct sunlight.</span></li><li style=\"box-sizing: border-box; list-style: disc; overflow-wrap: break-word; margin: 0px;\"><span class=\"a-list-item\" style=\"box-sizing: border-box; color: rgb(17, 17, 17);\">Read distraction-free. Highlight passages, look up definitions, translate words, and adjust text sizeâ€”without ever leaving the page.</span></li><li style=\"box-sizing: border-box; list-style: disc; overflow-wrap: break-word; margin: 0px;\"><span class=\"a-list-item\" style=\"box-sizing: border-box; color: rgb(17, 17, 17);\">Select from millions of books including new releases and bestsellers. Holds thousands of titles so you can take your library with you.</span></li><li style=\"box-sizing: border-box; list-style: disc; overflow-wrap: break-word; margin: 0px;\"><span class=\"a-list-item\" style=\"box-sizing: border-box; color: rgb(17, 17, 17);\">Prime members read free with unlimited access to hundreds of books, comics and more.</span></li><li style=\"box-sizing: border-box; list-style: disc; overflow-wrap: break-word; margin: 0px;\"><span class=\"a-list-item\" style=\"box-sizing: border-box; color: rgb(17, 17, 17);\">A single battery charge lasts weeks, not hours.</span></li><li style=\"box-sizing: border-box; list-style: disc; overflow-wrap: break-word; margin: 0px;\"><span class=\"a-list-item\" style=\"box-sizing: border-box; color: rgb(17, 17, 17);\">This device does not support playback of Audible audiobooks.</span></li></ul>', '61MWcLEBkDL._SL1000_.jpg', '717XacHyY9L._SL1000_.jpg', '613qVaBn9vL._SL1000_.jpg', '55', 'In Stock', '0', '1\r\n', '2', '2019-04-12 21:47:58', NULL),
(17, '5', '8', '1', 'Krackjack 200gms', 'Parle', '27', '19059020', '30', '<span style=\"color: rgb(51, 51, 51); font-family: arial; font-size: 16px;\">After a hectic and tiresome day, all we need is a refreshing snack to eat so that we feel fresh. In such a case, Parle krack jack biscuits are a perfect choice. Their crunchiness makes your life crisp and tasty again. The sweet and sour taste of the biscuits will make you forget your worries</span><br>', '12.jpg', '13.jpg', '14.png', '0', 'In Stock', '-35', '1\r\n', '4', '2019-04-14 05:43:17', NULL),
(18, '7', '9', '3', 'Parachute 250ml', 'Parachute', '92', '1513.11.00', '105', '<ul class=\"a-unordered-list a-vertical a-spacing-none\" style=\"box-sizing: border-box; margin-bottom: 0px; margin-left: 18px; color: rgb(148, 148, 148); font-family: &quot;Amazon Ember&quot;, Arial, sans-serif;\"><li style=\"box-sizing: border-box; list-style: disc; overflow-wrap: break-word; margin: 0px;\"><span class=\"a-list-item\" style=\"box-sizing: border-box; color: rgb(17, 17, 17);\">Made from 100% pure coconut oil</span></li><li style=\"box-sizing: border-box; list-style: disc; overflow-wrap: break-word; margin: 0px;\"><span class=\"a-list-item\" style=\"box-sizing: border-box; color: rgb(17, 17, 17);\">Consistent composition and viscosity in every drop of oil</span></li><li style=\"box-sizing: border-box; list-style: disc; overflow-wrap: break-word; margin: 0px;\"><span class=\"a-list-item\" style=\"box-sizing: border-box; color: rgb(17, 17, 17);\">Long lasting freshness</span></li><li style=\"box-sizing: border-box; list-style: disc; overflow-wrap: break-word; margin: 0px;\"><span class=\"a-list-item\" style=\"box-sizing: border-box; color: rgb(17, 17, 17);\">5 Stage Purification process to ensure 100% pure coconut oil every time</span></li><li style=\"box-sizing: border-box; list-style: disc; overflow-wrap: break-word; margin: 0px;\"><span class=\"a-list-item\" style=\"box-sizing: border-box; color: rgb(17, 17, 17);\">Made from the finest quality coconut to ensure best Coconut Oil</span></li><li style=\"box-sizing: border-box; list-style: disc; overflow-wrap: break-word; margin: 0px;\"><span class=\"a-list-item\" style=\"box-sizing: border-box; color: rgb(17, 17, 17);\">Parachute Coconut Oil - 250 ml Flip Top</span></li></ul>', '71OTgymA+ZL._SL1500_.jpg', '71sQ9TFFIJL._SL1500_.jpg', '61hTmsydzFL._SL1500_.jpg', '0', 'In Stock', '20', '0\r\n', '2', '2019-04-14 06:11:04', NULL);

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
  `timestamp` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `purchase`
--

INSERT INTO `purchase` (`id`, `business`, `supplier`, `invoicedate`, `invoicenumber`, `vehiclenumber`, `deliveredcontact`, `transport`, `receiveddate`, `batch`, `product`, `mrp`, `qtycase`, `qtyuom`, `baseratecase`, `baserateuom`, `disc`, `disca`, `neta`, `cgst`, `sgst`, `cgsta`, `sgsta`, `cess`, `totalamount`, `margin`, `uomsp`, `dispp`, `dispd`, `totalwhole`, `creditnote`, `logistic`, `freeproduct`, `timestamp`) VALUES
(1, '1', '1', '2019-04-14', 'A232234234234234', 'K4A5A4464', '867835745', 'Truck', '2019-04-15', 'A1', '17', '30', '5', '40', '857.4', '21.435', '0', '0', '4287', '9', '9', '385.83', '385.83', '0', '5057', '6', '26.8021', '27', '0', '146909.9', '0', '0', '--null--', '1555242181'),
(2, '1', '1', '2019-04-14', 'A232234234234234', 'K4A5A4464', '867835745', 'Truck', '2019-04-15', 'A1', '18', '105', '20', '80', '6754.945', '84.4368125', '0', '0', '135098.9', '2.5', '2.5', '3377.4725', '3377.4725', '0', '141852.9', '4', '92.204385', '95.2', '3.15126', '146909.9', '0', '0', '--null--', '1555242181'),
(3, '1', '1', '2019-04-09', '98765432', 'KL 7 A 5555', '234323456', 'Truck', '2019-04-15', 'A1', '1', '29363.00', '10', '1', '10000', '10000', '', '0', '100000', '6', '6', '6000', '6000', '0', '112000', '0', '11200', '11200', '0', '672000', '100', '50', 'Toshiba Pendrive 8GB', '1555318445'),
(4, '1', '1', '2019-04-09', '98765432', 'KL 7 A 5555', '234323456', 'Truck', '2019-04-15', 'A1', '5', '75000.00', '10', '1', '50000', '50000', '', '0', '500000', '6', '6', '30000', '30000', '0', '560000', '0', '56000', '56000', '0', '672000', '100', '50', '2 Apple Stickers', '1555318445'),
(5, '2', '1', '2019-04-09', '68765453452', 'KL 7 A 5555', '234323456', 'plane', '2019-04-23', 'A2', '1', '29363.00', '1', '2', '52726', '26363', '5', '2636.3', '50089.7', '6', '6', '3005.3819999999996', '3005.3819999999996', '0', '56099.7', '5', '29452.3425', '78777', '5', '56099.7', '500', '500', 'Shampoo', '1555333197');

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
(1, ':8:9::::::::', '');

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
  `beat` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`id`, `product`, `hsn`, `utc`, `qty`, `mrp`, `baserate`, `amount`, `dis`, `gst`, `gstamount`, `total`, `finalrate`, `paymentdue`, `totalpaid`, `invoice`, `business`, `timestamp`, `remarks`, `customer`, `batch`, `beat`) VALUES
(1, '17', '19059020', '40', '1', '30', '22.88135593220339', '915.2542372881356', '0', '18', '164.7457627118644', '1080', '27', '1080', '', '155525544034', '1', '1555255440', '', '13', 'A1', 'North Zone');

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
(1, '1', 'Headphones', '2019-04-12 21:03:39', '15-04-2019 02:27:37 PM'),
(3, '2', 'Living Room Furniture', '2019-04-12 21:04:52', NULL),
(5, '1', 'Smartphones', '2019-04-12 21:05:22', NULL),
(6, '1', 'E-books', '2019-04-12 21:05:35', NULL),
(7, '4', 'Trenchcoat', '2019-04-12 21:22:26', NULL),
(8, '5', 'Biscuits', '2019-04-14 05:14:37', NULL),
(9, '7', 'Hair Oil', '2019-04-14 06:09:03', NULL);

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
(2, 'Supplier B', 'Apple Company', 'supplierb@mail.com', '324234234', 34234234, 2346435345, NULL, '4534534534,JAKSjkasjkdmAS,EKJrker324		', NULL, NULL, NULL, '							', 'Karnataka', 'Bengaluru', NULL, '234234', '35243', '45345', '435345', '345345', 'Admin', 324908209348, 'Goldman Sachs', 'NYC', 'Business Account Name', '342342345662342', '546354345', '2019-04-12 21:55:42', NULL);

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
(1, '12% GST', '6', '6', '12'),
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
(1, 'Cases', '2019-04-12 21:23:28', '15-04-2019 03:02:09 PM'),
(2, 'Boxes', '2019-04-12 21:23:31', NULL),
(3, 'Pieces', '2019-04-12 21:23:35', NULL);

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
  `regDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updationDate` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `contactno`, `altcontactno`, `password`, `shippingAddress`, `district`, `rewards`, `shippingState`, `shippingCity`, `shippingPincode`, `billingAddress`, `billingState`, `billingCity`, `billingPincode`, `gstin`, `fssai`, `pan`, `aadharno`, `birthdate`, `regDate`, `updationDate`) VALUES
(13, 'Retailer A', 'test@test.com', 324982348, 7434534546, '098f6bcd4621d373cade4e832627b4f6', '3096  Fleming Way, Petersburg, USA', 'District A', '0', NULL, NULL, NULL, 'Put Water, 3096  Fleming Way, Petersburg, USA', 'Petersburg', NULL, NULL, '23423423', '23423', '4234234', '234234234', '2019-04-13', '2019-04-12 21:57:54', NULL),
(14, 'Test Retailer B', 'test2@test.com', 324982348, 7434534546, '098f6bcd4621d373cade4e832627b4f6', '3223,Bailey Drive,Iowa City, USA', 'District B ', '0', NULL, NULL, NULL, 'Iowa Water, 3223,Bailey Drive,Iowa City, USA', 'Iowa', NULL, NULL, '567423', '6786723', '678234', '7834234234', '2019-04-02', '2019-04-12 21:59:30', NULL);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `business`
--
ALTER TABLE `business`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `executive`
--
ALTER TABLE `executive`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `ordertrackhistory`
--
ALTER TABLE `ordertrackhistory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `paymentdue`
--
ALTER TABLE `paymentdue`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `purchase`
--
ALTER TABLE `purchase`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `subcategory`
--
ALTER TABLE `subcategory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `taxinfo`
--
ALTER TABLE `taxinfo`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `uom`
--
ALTER TABLE `uom`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;