-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 28, 2019 at 08:14 PM
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
(17, 'Speaker', '', '2019-02-26 22:37:31', NULL);

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
(1, 4, '3', 1, '2019-02-27 00:03:13', 'COD', 'Delivered'),
(2, 4, '6', 1, '2019-02-27 00:03:13', 'COD', NULL),
(3, 4, '1', 1, '2019-02-27 00:03:58', 'COD', NULL),
(4, 4, '2', 1, '2019-02-27 00:03:58', 'COD', NULL),
(5, 4, '3', 1, '2019-02-27 00:03:58', 'COD', NULL),
(6, 4, '6', 1, '2019-02-27 00:03:58', 'COD', NULL);

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
(1, 1, 'in Process', 'as', '2019-02-27 00:38:46'),
(2, 1, 'Delivered', 'fone', '2019-02-27 00:41:09');

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
(1, 16, 19, '123 Lights', 'Edison', 120, 234, '<h3>123123</h3>', '1.jpeg', '2.jpeg', '45.jpg', 2, 'In Stock', '2019-02-26 23:32:29', NULL),
(2, 17, 23, '123 Lights', '636435', 345345, 345345, '5345345', '64.jpg', '234.jpg', 'SndLinkC2Bk-large.jpg', 345, 'In Stock', '2019-02-26 23:45:55', NULL),
(3, 16, 19, '123 Lights', '636435', 345345, 345345, '5345345', 'download.jpg', '5.jpg', '1.jpeg', 345, 'In Stock', '2019-02-26 23:46:11', NULL),
(4, 17, 21, '123 Lights', '636435', 345345, 345345, '5345345', 'download.jpg', '5.jpg', '1.jpeg', 345, 'In Stock', '2019-02-26 23:50:44', NULL),
(5, 16, 20, '8567567', '345', 345345, 7345, '3457', 'download.jpg', '5.jpg', '1.jpeg', 234234, 'Out of Stock', '2019-02-26 23:50:59', NULL),
(6, 17, 23, 'fsdfsddfffd385627563247', '345sdf', 0, 0, '3457', 'download.jpg', '5.jpg', '1.jpeg', 234234, 'Out of Stock', '2019-02-26 23:51:16', NULL),
(7, 16, 19, '13', '32423', 534, 423, '<br>', '6.jpg', '5.jpg', '1.jpeg', 435, 'Out of Stock', '2019-02-27 01:05:57', NULL),
(8, 17, 21, '13', '32423', 534, 423, '<br>', '6.jpg', '5.jpg', '1.jpeg', 435, 'Out of Stock', '2019-02-27 01:06:08', NULL),
(9, 16, 19, '13', '32423', 534, 423, '<br>', '6.jpg', '5.jpg', '1.jpeg', 435, 'Out of Stock', '2019-02-27 01:06:15', NULL),
(10, 17, 22, '25234', '32423', 534, 423, '<br>', '6.jpg', '5.jpg', '1.jpeg', 435, 'Out of Stock', '2019-02-27 01:06:24', NULL),
(11, 16, 20, 'sdf2', 'sdff', 534, 423, 'sdf', '6.jpg', '5.jpg', '1.jpeg', 435, 'In Stock', '2019-02-27 01:06:37', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `purchase`
--

CREATE TABLE `purchase` (
  `id` int(11) NOT NULL,
  `business` varchar(50) NOT NULL,
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

INSERT INTO `purchase` (`id`, `business`, `remarks`, `batch`, `timestamp`, `productid`, `productname`, `productcost`, `producttax`, `quantity`, `totalcost`, `invoice`) VALUES
(6, 'Business A', '', '', 1551377322, 1, '', 120, 5, 1, 126, '44534remarks=dsf'),
(7, 'Business A', '', '', 1551377322, 3, '', 345345, 5, 1, 362612, '44534remarks=dsf'),
(8, 'Business A', '', '', 1551377325, 1, '', 120, 5, 1, 126, '44534remarks=dsf'),
(9, 'Business A', '', '', 1551377325, 3, '', 345345, 5, 1, 362612, '44534remarks=dsf'),
(10, 'Business A', '', '', 1551377364, 1, '', 120, 5, 1, 126, '4qwdasca5443564534remarks=5'),
(11, 'Business A', '', '', 1551377364, 3, '', 345345, 5, 1, 362612, '4qwdasca5443564534remarks=5'),
(12, 'Business A', '', '', 1551377364, 6, '', 0, 5, 1, 0, '4qwdasca5443564534remarks=5'),
(13, 'Business A', '', '', 1551377365, 1, '', 120, 5, 1, 126, '4qwdasca5443564534remarks=5'),
(14, 'Business A', '', '', 1551377365, 3, '', 345345, 5, 1, 362612, '4qwdasca5443564534remarks=5'),
(15, 'Business A', '', '', 1551377365, 6, '', 0, 5, 1, 0, '4qwdasca5443564534remarks=5');

-- --------------------------------------------------------

--
-- Table structure for table `retailer`
--

CREATE TABLE `retailer` (
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
-- Dumping data for table `retailer`
--

INSERT INTO `retailer` (`id`, `name`, `email`, `contactno`, `altcontactno`, `password`, `shippingAddress`, `shippingState`, `shippingCity`, `shippingPincode`, `billingAddress`, `billingState`, `billingCity`, `billingPincode`, `regDate`, `updationDate`) VALUES
(5, 'Adarsh C', 'adarshcool97@gmail.com', 9400503664, 23423, '289dff07669d7a23de0ef88d2f7129e7', '1/B,Kaizen Gayatri Apartments,Keeramkulangara,East Fort, Thrissur', NULL, NULL, NULL, '1/B,Kaizen Gayatri Apartments,Keeramkulangara,East Fort, Thrissur', NULL, NULL, NULL, '2019-02-28 19:06:23', NULL),
(6, 'Adarsh C', 'adarshcool97@gmail.com', 9400503664, 23423, '202cb962ac59075b964b07152d234b70', '1/B,Kaizen Gayatri Apartments,Keeramkulangara,East Fort, Thrissur', NULL, NULL, NULL, '1/B,Kaizen Gayatri Apartments,Keeramkulangara,East Fort, Thrissur', NULL, NULL, NULL, '2019-02-28 19:06:55', NULL),
(7, 'Adarsh C', 'adarshcool97@gmail.com', 9400503664, 23423, '202cb962ac59075b964b07152d234b70', '1/B,Kaizen Gayatri Apartments,Keeramkulangara,East Fort, Thrissur', NULL, NULL, NULL, '1/B,Kaizen Gayatri Apartments,Keeramkulangara,East Fort, Thrissur', NULL, NULL, NULL, '2019-02-28 19:08:28', NULL),
(8, 'Adarsh C', 'adarshcool97@gmail.com', 7008163289, 9400503664, '79c318bf85ee49ec7d43630eea149bfb', 'Door No.601,6th Floor, 1&2, opposite Anand Krishna Residency, 12th Cross Road, Maruthi Nagar, BTM 1st Stage', NULL, NULL, NULL, 'Door No.601,6th Floor, 1&2, opposite Anand Krishna Residency, 12th Cross Road, Maruthi Nagar, BTM 1st Stage', NULL, NULL, NULL, '2019-02-28 19:08:48', NULL);

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
(23, 17, 'battery', '2019-02-26 23:45:35', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
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
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`id`, `name`, `email`, `contactno`, `altcontactno`, `password`, `shippingAddress`, `shippingState`, `shippingCity`, `shippingPincode`, `billingAddress`, `billingState`, `billingCity`, `billingPincode`, `regDate`, `updationDate`) VALUES
(5, 'Adarsh C', 'adarshcool97@gmail.com', 9400503664, 9400503664, '202cb962ac59075b964b07152d234b70', '1/B,Kaizen Gayatri Apartments,Keeramkulangara,East Fort, Thrissur', NULL, NULL, NULL, '1/B,Kaizen Gayatri Apartments,Keeramkulangara,East Fort, Thrissur', NULL, NULL, NULL, '2019-02-28 19:13:26', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `contactno` bigint(11) DEFAULT NULL,
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

INSERT INTO `users` (`id`, `name`, `email`, `contactno`, `password`, `shippingAddress`, `shippingState`, `shippingCity`, `shippingPincode`, `billingAddress`, `billingState`, `billingCity`, `billingPincode`, `regDate`, `updationDate`) VALUES
(4, 'test', 'test@test.com', 123435, 'f925916e2754e5e03f75dd58a5733251', 'Thrissur', 'Kerala', 'Thrissur', 234234, 'Thrissur', 'Kerala', 'Thrissur', 234234, '2019-02-22 15:05:21', NULL);

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
-- Indexes for table `retailer`
--
ALTER TABLE `retailer`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `ordertrackhistory`
--
ALTER TABLE `ordertrackhistory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `purchase`
--
ALTER TABLE `purchase`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `retailer`
--
ALTER TABLE `retailer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `subcategory`
--
ALTER TABLE `subcategory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
