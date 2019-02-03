<?php
// Create connection
$conn = new mysqli(SQL_HOST, SQL_USERNAME, SQL_PASSWORD);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create database
$sql = "CREATE DATABASE IF NOT EXISTS ".SQL_DBN;
if ($conn->query($sql) === TRUE) {
    echo "Database created successfully<br> \n";
} else {
    echo "Error creating database: " . $conn->error;
}

$conn->close();
$conn = new mysqli(SQL_HOST, SQL_USERNAME, SQL_PASSWORD, SQL_DBN);

$sql = "CREATE TABLE IF NOT EXISTS `users`
( `id` INT(4) NOT NULL AUTO_INCREMENT ,
`fullname` VARCHAR(50) NOT NULL ,
`username` VARCHAR(50) NOT NULL ,
`email` VARCHAR(50) NOT NULL,
`password` VARCHAR(50) NOT NULL ,
`role` VARCHAR(50) NOT NULL,
`status` INT(2) NOT NULL DEFAULT '0' ,
PRIMARY KEY (`id`))
ENGINE = InnoDB CHARSET=utf8 COLLATE utf8_general_ci;";

if ($conn->query($sql) === TRUE) {
    echo "Table users created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

$sql="INSERT INTO `users` (`id`, `fullname`, `username`, `email`, `password`, `role`, `status`) VALUES
(1, 'Mr. Michale Smith II', 'tbecker', 'margaretta.buckridge@example.net', 'ward', 'Leonardo', '1'),
(2, 'Melody O\'Keefe', 'ambrose.russel', 'davion97@example.org', 'murphy', 'Vern', '1'),
(3, 'Dawson Kassulke MD', 'xmiller', 'delpha29@example.org', 'kshlerin', 'Milton', '1'),
(4, 'Prof. Donnell Bogisich', 'hosea20', 'willow19@example.org', 'tillman', 'Marvin', '1'),
(5, 'Wilfrid White MD', 'vklein', 'hlang@example.org', 'toy', 'Oscar', '1'),
(6, 'Kayli Boyer', 'fkohler', 'wwhite@example.org', 'spinkanader', 'Oscar', '1'),
(7, 'Hershel Zieme', 'courtney56', 'carolanne75@example.com', 'fisherschumm', 'Darwin', '1'),
(8, 'Christine Rodriguez', 'murray.kraig', 'abernathy.alanna@example.org', 'nitzschecarter', 'Carter', '1'),
(9, 'Toby Bins DDS', 'dare.abbie', 'bert.corkery@example.net', 'weimannrohan', 'Cortez', '1'),
(10, 'Dr. Monserrat D\'Amore MD', 'reichel.milford', 'giuseppe22@example.org', 'okuneva', 'Jessie', '1'),
(11, 'Myrl Jacobi', 'eric27', 'yfisher@example.net', 'kingleannon', 'Aric', '1'),
(12, 'Therese Moore', 'marquardt.jimmie', 'demarco.wintheiser@example.com', 'walker', 'Jovan', '1'),
(13, 'Betsy Gleason', 'odietrich', 'bhomenick@example.org', 'yost', 'Jameson', '1'),
(14, 'Eliseo Zboncak', 'angelo62', 'ndickens@example.com', 'sipes', 'Erik', '1'),
(15, 'Kole Hammes', 'ctromp', 'brycen53@example.net', 'runolfsdottir', 'Ralph', '1'),
(16, 'Georgianna Kautzer', 'herzog.asia', 'ybode@example.com', 'towne', 'Wilson', '1'),
(17, 'Anabelle Hermann', 'roel76', 'trinity20@example.org', 'schummvon', 'Donnie', '1');";
if ($conn->query($sql) === TRUE) {
    echo "<br>Data dumped for users successful";
} else {
    echo "Error dumping data" . $conn->error;
}


$sql = "CREATE TABLE IF NOT EXISTS `products` (
  `pid` int(10) NOT NULL,
  `pname` varchar(500) NOT NULL,
  `pbrand` varchar(100) NOT NULL,
  `punit` varchar(50) NOT NULL,
  `pcategory` varchar(200) NOT NULL,
  `psubcategory` varchar(200) NOT NULL,
  `psku` varchar(5000) NOT NULL,
  `pquantity` varchar(100) NOT NULL,
  `pweight` varchar(500) NOT NULL,
  `ptaxapplicable` varchar(500) NOT NULL,
  `cgstgroup` varchar(5) NOT NULL,
  `sgstgroup` varchar(5) NOT NULL,
  `igstgroup` varchar(5) NOT NULL,
  -- `ptype` varchar(500) NOT NULL,
  `pamountexcludingtax` varchar(500) NOT NULL,
  `pamountincludingtax` varchar(500) NOT NULL,
  `pmarginamount` varchar(500) NOT NULL,
  `psellingprice` varchar(500) NOT NULL,
  `ptimestamp` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6),
  PRIMARY KEY (`pid`))
 ENGINE=InnoDB DEFAULT CHARSET=latin1;";

if ($conn->query($sql) === TRUE) {
    echo "<br>Table products created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}


$sql="INSERT INTO `products` (`pid`, `pname`, `pbrand`, `punit`, `pcategory`, `psubcategory`, `psku`, `pquantity`, `pweight`,
  `ptaxapplicable`, `cgstgroup`, `sgstgroup`, `igstgroup`, `pamountexcludingtax`, `pamountincludingtax`, `pmarginamount`, `psellingprice`, `ptimestamp`)  VALUES
(0, 'd', 'v', 'l', 'c', 'l', '5', '1082.1906154', '7', 't', '1', '6', '5', '8', '', '9', '4', '1997-06-21 00:00:00.000000'),
(1, 'r', 'n', 'c', 'z', 'q', '4', '82.73686', '1', 'r', '5', '2', '7', '9', '6', '7', '4', '2013-07-24 00:00:00.000000'),
(5, 'c', 'j', 'q', 'h', 'f', '4', '935015.16088797', '8', 'h', '3', '8', '8', '7', '', '3', '2', '1990-08-07 00:00:00.000000'),
(8, 't', 'y', 'u', 'o', 'u', '9', '72.90589', '1', 'm', '9', '8', '8', '1', '1', '1', '6', '2000-09-03 00:00:00.000000'),
(6, 'r', 'm', 'e', 'q', 'y', '', '446736518', '3', 'g', '4', '3', '6', '3', '2', '7', '3', '1990-02-14 00:00:00.000000'),
(7, 'g', 'a', 'a', 'u', 'x', '4', '2.682881', '6', 'e', '2', '', '', '1', '4', '9', '2', '1996-04-11 00:00:00.000000'),
(9, 'c', 'z', 'u', 'g', 'x', '1', '4365750.9051724', '7', 'k', '8', '1', '5', '8', '1', '4', '2', '1983-03-14 00:00:00.000000'),
(10, 'j', 'r', 'c', 'z', 'x', '4', '988558.71922', '8', 'd', '4', '7', '7', '7', '1', '4', '1', '1993-01-07 00:00:00.000000'),
(11, 'c', 'n', 'n', 'p', 'l', '4', '', '4', 'd', '4', '4', '2', '4', '3', '3', '5', '2017-03-08 00:00:00.000000'),
(39, 'i', 'v', 'm', 'm', 'b', '9', '16743.2', '3', 'k', '2', '5', '7', '2', '', '3', '3', '1986-02-11 00:00:00.000000'),
(41, 'd', 'n', 'w', 'l', 'a', '4', '4180.9753', '2', 'k', '5', '4', '9', '8', '4', '1', '2', '2011-03-20 00:00:00.000000'),
(65, 's', 'c', 's', 'p', 'h', '', '41138942', '8', 'h', '3', '6', '1', '5', '7', '9', '8', '1999-08-20 00:00:00.000000'),
(69, 's', 'f', 'e', 'k', 'i', '5', '438135.17', '5', 'y', '2', '1', '2', '1', '5', '2', '6', '1970-06-04 00:00:00.000000'),
(75, 'd', 'c', 'b', 'y', 'l', '4', '33.9873', '7', 'q', '8', '3', '6', '6', '6', '3', '8', '2004-08-31 00:00:00.000000'),
(83, 'o', 'j', 'm', 'j', 'v', '3', '10.475', '7', 'e', '7', '1', '1', '3', '8', '9', '5', '1978-08-31 00:00:00.000000'),
(90, 'y', 'h', 't', 'l', 'r', '7', '', '9', 's', '2', '8', '1', '3', '9', '1', '3', '1988-09-18 00:00:00.000000'),
(93, 'p', 'v', 'l', 'r', 'r', '1', '36470.103761091', '2', 'i', '1', '6', '8', '8', '5', '8', '2', '1978-11-07 00:00:00.000000'),
(107, 't', 'i', 'k', 'a', 'm', '2', '210825.250657', '6', 'r', '3', '5', '4', '4', '8', '6', '6', '1972-10-01 00:00:00.000000'),
(227, 'v', 'o', 'e', 'o', 'g', '7', '1537.92936919', '6', 't', '1', '1', '8', '3', '9', '2', '7', '2003-05-31 00:00:00.000000');";
if ($conn->query($sql) === TRUE) {
    echo "<br>Data dumped for products successful";
} else {
    echo "Error dumping data" . $conn->error;
}

$sql = "CREATE TABLE IF NOT EXISTS `business`
( `id` INT NOT NULL AUTO_INCREMENT ,
`account_name` VARCHAR(100) NOT NULL ,
`type` VARCHAR(20) NOT NULL ,
`op_bal` INT(30) NOT NULL ,
`dbcr` VARCHAR(20) NOT NULL ,
`address` TEXT NOT NULL ,
`city` VARCHAR(100) NOT NULL ,
`state` VARCHAR(100) NOT NULL ,
`postal_code` VARCHAR(15) NOT NULL ,
`state_code` VARCHAR(100) NOT NULL ,
`phone` VARCHAR(15) NOT NULL ,
`mobile` VARCHAR(15) NOT NULL ,
`email` VARCHAR(150) NOT NULL ,
`vat` VARCHAR(100) NOT NULL ,
`pan` VARCHAR(100) NOT NULL ,
`gstin` VARCHAR(100) NOT NULL ,
`aadhar` INT(20) NOT NULL DEFAULT '0' ,
`bank_account` VARCHAR(100) NOT NULL ,
`ifsc_code` VARCHAR(100) NOT NULL ,
`timestamp` INT(20) NOT NULL ,
PRIMARY KEY (`id`))
ENGINE = InnoDB CHARSET=utf8 COLLATE utf8_general_ci;";

if ($conn->query($sql) === TRUE) {
    echo "<br>Table business created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

$conn->close();
 ?>
