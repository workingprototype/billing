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

$sql = "CREATE TABLE IF NOT EXISTS `products` (
  `pid` int(10) NOT NULL AUTO_INCREMENT,
  `pname` varchar(500) NOT NULL,
  `pbrand` varchar(100) NOT NULL,
  `punit` varchar(50) NOT NULL,
  `pcategory` varchar(200) NOT NULL,
  `psubcategory` varchar(200) NOT NULL,
  `psku` varchar(5000) NOT NULL,
  `pquantity` varchar(100) NOT NULL,
  `pweight` varchar(500) NOT NULL,
  `ptaxapplicable` varchar(500) NOT NULL,
  `cgstbrowser` varchar(5) NOT NULL,
  `sgstbrowser` varchar(5) NOT NULL,
  `igstbrowser` varchar(5) NOT NULL,
  `pamountexcludingtax` varchar(500) NOT NULL,
  `pamountincludingtax` varchar(500) NOT NULL,
  `pmarginamount` varchar(500) NOT NULL,
  `psellingprice` varchar(500) NOT NULL,
  `ptimestamp` timestamp(6) NOT NULL,
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
