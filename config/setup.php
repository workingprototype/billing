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
    echo "<br>Data dumped for users successfully";
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
  `CGST` varchar(5) NOT NULL,
  `SGST` varchar(5) NOT NULL,
  `IGST` varchar(5) NOT NULL,
  `ptype` varchar(500) NOT NULL,
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
