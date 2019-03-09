-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 10, 2019 at 12:41 AM
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
(1, 'asd124124123213123123123123213', '234', 345, '435', '345', '34', 'Kerala', '680005', '345', '435', '435', '234@as.vb', '345', '345', '435435', 435, '435', '435', 1551387055);

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
(18, 'Phone', 'Phones of All types', '2019-02-28 23:30:51', NULL);

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

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `category` int(11) NOT NULL,
  `subCategory` int(11) DEFAULT NULL,
  `productName` varchar(255) DEFAULT NULL,
  `productCompany` varchar(255) DEFAULT NULL,
  `productPrice` int(11) DEFAULT NULL,
  `productPriceBeforeDiscount` int(11) DEFAULT NULL,
  `productDescription` longtext,
  `productImage1` varchar(255) DEFAULT NULL,
  `productImage2` varchar(255) DEFAULT NULL,
  `productImage3` varchar(255) DEFAULT NULL,
  `shippingCharge` int(11) DEFAULT NULL,
  `productAvailability` varchar(255) DEFAULT NULL,
  `postingDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updationDate` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category`, `subCategory`, `productName`, `productCompany`, `productPrice`, `productPriceBeforeDiscount`, `productDescription`, `productImage1`, `productImage2`, `productImage3`, `shippingCharge`, `productAvailability`, `postingDate`, `updationDate`) VALUES
(55, 16, 20, 'Hello Lights', 'Lights Infotech', 150, 200, '<span style=\"color: rgb(34, 34, 34); font-family: arial, sans-serif; font-size: small;\">Light is electromagnetic radiation within a certain portion of the electromagnetic spectrum. The word usually refers to visible light, which is the visible spectrum that is visible to the human eye and is responsible for the sense of sight.</span>', '1.jpeg', '2.jpeg', '45.jpg', 10, 'In Stock', '2019-02-28 23:49:43', NULL),
(56, 16, 20, 'Wow Lights', 'Lights Infotech', 350, 400, '<span style=\"color: rgb(34, 34, 34); font-family: arial, sans-serif; font-size: small;\">This new light is electromagnetic radiation within a certain portion of the electromagnetic spectrum. The word usually refers to visible light, which is the visible spectrum that is visible to the human eye and is responsible for the sense of sight.</span>', '4.jpg', '5.jpg', '6.jpg', 60, 'In Stock', '2019-02-28 23:50:29', NULL),
(57, 17, 21, 'Bose Speakers', 'Bose Electronics', 49000, 50000, '<span style=\"color: rgb(34, 34, 34); font-family: arial, sans-serif; font-size: small;\">Bose Corporation is a privately held American corporation, based in Framingham, Massachusetts, that designs, develops and sells audio equipment. Founded in 1964 by Amar Bose, the company sells its products throughout the world.</span><br>', '234.jpg', 'SndLinkC2Bk-large.jpg', '3.jpg', 1500, 'In Stock', '2019-02-28 23:51:17', NULL),
(58, 17, 23, 'Tesla battery', 'Tesla Electronics', 45000, 50000, '<span style=\"color: rgb(34, 34, 34); font-family: arial, sans-serif; font-size: small;\">An electric battery is a device consisting of one or more electrochemical cells with external connections provided to power electrical devices such as flashlights, smartphones, and electric cars. When a battery is supplying electric power, its positive terminal is the cathode and its negative terminal is the anode</span><br>', '4ed4df68-6be6-4a65-8453-dec1b44beb56_1.90ee7b670f0743206e97fbc4af3b99c2.jpeg', '105605.jpg', 'download (1).jpg', 1500, 'In Stock', '2019-02-28 23:52:52', NULL),
(59, 17, 23, 'Tesla battery', 'Tesla Electronics', 45000, 50000, '<span style=\"color: rgb(34, 34, 34); font-family: arial, sans-serif; font-size: small;\">An electric battery is a device consisting of one or more electrochemical cells with external connections provided to power electrical devices such as flashlights, smartphones, and electric cars. When a battery is supplying electric power, its positive terminal is the cathode and its negative terminal is the anode</span><br>', '4ed4df68-6be6-4a65-8453-dec1b44beb56_1.90ee7b670f0743206e97fbc4af3b99c2.jpeg', '105605.jpg', 'download (1).jpg', 1500, 'In Stock', '2019-02-28 23:54:20', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `purchase`
--

CREATE TABLE `purchase` (
  `id` int(11) NOT NULL,
  `business` varchar(50) NOT NULL,
  `supplier` int(11) NOT NULL,
  `remarks` text NOT NULL,
  `batch` varchar(50) NOT NULL,
  `timestamp` int(11) NOT NULL,
  `productid` int(11) NOT NULL,
  `productname` varchar(200) NOT NULL,
  `productcost` int(11) NOT NULL,
  `producttax` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `totalcost` int(11) NOT NULL,
  `invoice` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `purchase`
--

INSERT INTO `purchase` (`id`, `business`, `supplier`, `remarks`, `batch`, `timestamp`, `productid`, `productname`, `productcost`, `producttax`, `quantity`, `totalcost`, `invoice`) VALUES
(6, 'Business A', 0, '', '', 1551377322, 1, '', 120, 5, 1, 126, '44534remarks=dsf'),
(7, 'Business A', 0, '', '', 1551377322, 3, '', 345345, 5, 1, 362612, '44534remarks=dsf'),
(8, 'Business A', 0, '', '', 1551377325, 1, '', 120, 5, 1, 126, '44534remarks=dsf'),
(9, 'Business A', 0, '', '', 1551377325, 3, '', 345345, 5, 1, 362612, '44534remarks=dsf'),
(10, 'Business A', 0, '', '', 1551377364, 1, '', 120, 5, 1, 126, '4qwdasca5443564534remarks=5'),
(11, 'Business A', 0, '', '', 1551377364, 3, '', 345345, 5, 1, 362612, '4qwdasca5443564534remarks=5'),
(12, 'Business A', 0, '', '', 1551377364, 6, '', 0, 5, 1, 0, '4qwdasca5443564534remarks=5'),
(13, 'Business A', 0, '', '', 1551377365, 1, '', 120, 5, 1, 126, '4qwdasca5443564534remarks=5'),
(14, 'Business A', 0, '', '', 1551377365, 3, '', 345345, 5, 1, 362612, '4qwdasca5443564534remarks=5'),
(15, 'Business A', 0, '', '', 1551377365, 6, '', 0, 5, 1, 0, '4qwdasca5443564534remarks=5'),
(16, 'Business A', 0, '', '', 1551387022, 5, '', 345345, 5, 1, 362612, '4523remarks=234'),
(17, 'Business A', 0, '', '', 1551387306, 1, '', 120, 5, 1, 126, '245remarks=234'),
(18, 'Business A', 0, '', '', 1551391265, 1, '', 120, 5, 1, 126, '234234remarks=ASd'),
(19, 'Business A', 0, '', '', 1551391378, 1, '', 120, 5, 1, 126, '234234remarks=ASd'),
(20, 'Business A', 0, '', '', 1551391379, 1, '', 120, 5, 1, 126, '234234remarks=ASd'),
(21, 'Business A', 0, '', '', 1551391400, 1, '', 120, 5, 1, 126, '234234remarks=New Purchase'),
(22, 'Business A', 0, '', '', 1551391400, 6, '', 0, 5, 1, 0, '234234remarks=New Purchase'),
(23, 'Business A', 0, '', '', 1551392054, 2, '', 345345, 5, 1, 362612, '3423remarks=233sadf'),
(24, 'Business A', 0, '', '', 1551392097, 6, '', 0, 5, 1, 0, '67remarks=fgh'),
(25, 'Business A', 0, '', '', 1551392128, 6, '', 0, 5, 1, 0, '67remarks=fgh'),
(26, 'Business A', 0, '', '', 1551392136, 3, '', 345345, 5, 1, 362612, 'sadremarks=a'),
(27, 'Business A', 0, '', '', 1551392174, 2, '', 345345, 5, 1, 362612, 'remarks=aaaaaaaaaaaaaaaaaaaaa'),
(28, 'Business A', 0, '', '', 1551966466, 55, '', 150, 5, 1, 158, 'remarks='),
(29, 'Business A', 0, '', '', 1551966466, 0, '', 0, 0, 0, 0, 'remarks='),
(30, 'Business A', 0, '', '', 1551966466, 57, '', 49000, 5, 1, 51450, 'remarks='),
(31, 'Business A', 0, '', '', 1551966466, 58, '', 45000, 5, 1, 47250, 'remarks=');

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `id` int(11) NOT NULL,
  `productid` int(11) NOT NULL,
  `timestamp` int(11) NOT NULL,
  `batch` varchar(100) NOT NULL,
  `price` int(11) NOT NULL,
  `tax` int(11) NOT NULL,
  `discount` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `business` int(11) NOT NULL,
  `customer` int(11) NOT NULL,
  `remarks` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`id`, `productid`, `timestamp`, `batch`, `price`, `tax`, `discount`, `quantity`, `business`, `customer`, `remarks`) VALUES
(3, 3, 1551383329, '', 345345, 5, 0, 1, 0, 7, ''),
(4, 1, 1551383644, '3', 120, 5, 0, 1, 0, 7, ''),
(5, 1, 1551385029, '', 120, 5, 0, 1, 0, 7, ''),
(6, 1, 1551385046, '', 120, 5, 0, 1, 0, 6, ''),
(7, 3, 1551385046, '', 345345, 5, 0, 1, 0, 6, ''),
(8, 6, 1551385046, '', 0, 5, 0, 1, 0, 6, ''),
(9, 1, 1551385049, '', 120, 5, 0, 1, 0, 6, ''),
(10, 3, 1551385049, '', 345345, 5, 0, 1, 0, 6, ''),
(11, 6, 1551385049, '', 0, 5, 0, 1, 0, 6, ''),
(12, 1, 1551385049, '', 120, 5, 0, 1, 0, 6, ''),
(13, 3, 1551385049, '', 345345, 5, 0, 1, 0, 6, ''),
(14, 6, 1551385049, '', 0, 5, 0, 1, 0, 6, ''),
(15, 1, 1551385083, '', 120, 5, 0, 1, 0, 7, ''),
(16, 3, 1551385083, '', 345345, 5, 0, 1, 0, 7, ''),
(17, 6, 1551385083, '', 0, 5, 0, 1, 0, 7, ''),
(18, 9, 1551385083, '', 534, 5, 0, 1, 0, 7, ''),
(19, 1, 1551385904, '', 120, 5, 0, 1, 0, 7, ''),
(20, 3, 1551385904, '', 345345, 5, 0, 1, 0, 7, ''),
(21, 6, 1551385904, '', 0, 5, 0, 1, 0, 7, ''),
(22, 9, 1551385904, '', 534, 5, 0, 1, 0, 7, ''),
(23, 1, 1551386999, '', 120, 5, 0, 1, 0, 9, 'sd'),
(24, 10, 1551390317, '', 534, 5, 0, 1, 0, 10, ''),
(25, 4, 1551391702, '', 345345, 5, 0, 1, 0, 11, '345'),
(26, 1, 1551391948, '', 120, 5, 0, 1, 0, 11, '234'),
(27, 1, 1551391999, '', 120, 5, 0, 1, 0, 10, 'asd'),
(28, 5, 1551392005, '', 345345, 5, 0, 1, 0, 11, 'asd'),
(29, 5, 1551392330, '', 345345, 5, 0, 1, 0, 11, 'assssssssssssssssssssssssssssssssssss'),
(30, 1, 1551392503, '', 120, 5, 0, 6, 0, 10, 'sdf'),
(31, 6, 1551392503, '', 0, 5, 0, 7, 0, 10, 'sdf');

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
(26, 20, 'Chota Boxes', '70', '2019-03-09 23:41:01', NULL);

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
  `shippingState` varchar(255) DEFAULT NULL,
  `shippingCity` varchar(255) DEFAULT NULL,
  `shippingPincode` int(11) DEFAULT NULL,
  `billingAddress` longtext,
  `billingState` varchar(255) DEFAULT NULL,
  `billingCity` varchar(255) DEFAULT NULL,
  `billingPincode` int(11) DEFAULT NULL,
  `regDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updationDate` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `contactno`, `altcontactno`, `password`, `shippingAddress`, `shippingState`, `shippingCity`, `shippingPincode`, `billingAddress`, `billingState`, `billingCity`, `billingPincode`, `regDate`, `updationDate`) VALUES
(12, 'Test Retailer', 'test@test.com', 8838564345, 8798564345, 'f925916e2754e5e03f75dd58a5733251', 'Delhi', NULL, NULL, NULL, 'Delhi							', NULL, NULL, NULL, '2019-03-01 00:06:33', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
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
-- AUTO_INCREMENT for table `business`
--
ALTER TABLE `business`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ordertrackhistory`
--
ALTER TABLE `ordertrackhistory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `purchase`
--
ALTER TABLE `purchase`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `subcategory`
--
ALTER TABLE `subcategory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `subuom`
--
ALTER TABLE `subuom`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

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
