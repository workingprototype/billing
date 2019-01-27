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
/**
$sql = "CREATE TABLE IF NOT EXISTS `Users`
( `id` INT(4) NOT NULL AUTO_INCREMENT ,
`fullname` VARCHAR(50) NOT NULL ,
`username` VARCHAR(50) NOT NULL ,
`password` VARCHAR(50) NOT NULL ,
`status` INT(2) NOT NULL DEFAULT '0' ,
PRIMARY KEY (`id`))
ENGINE = InnoDB CHARSET=utf8 COLLATE utf8_general_ci;";

if ($conn->query($sql) === TRUE) {
    echo "Table Users created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}
*/

$sql = "CREATE TABLE IF NOT EXISTS `Business`
( `id` INT NOT NULL AUTO_INCREMENT ,
`account_name` VARCHAR(100) NOT NULL ,
`group` INT(3) NOT NULL ,
`op_bal` INT(30) NOT NULL ,
`dbcr` INT(2) NOT NULL ,
`address` TEXT NOT NULL ,
`city` VARCHAR(100) NOT NULL ,
`state` VARCHAR(100) NOT NULL ,
`postal_code` VARCHAR(15) NOT NULL ,
`state_code` VARCHAR(100) NOT NULL ,
`phone` VARCHAR(15) NOT NULL ,
`mobile` VARCHAR(15) NOT NULL ,
`email` VARCHAR(150) NOT NULL ,
`vat` VARCHAR(100) NOT NULL ,
`gstn` VARCHAR(100) NOT NULL ,
`pan` VARCHAR(100) NOT NULL ,
`aadhar` INT(2) NOT NULL DEFAULT '0' ,
`bank_account` VARCHAR(100) NOT NULL ,
`ifsc_code` VARCHAR(100) NOT NULL ,
`timestamp` INT(20) NOT NULL ,
PRIMARY KEY (`id`))
ENGINE = InnoDB CHARSET=utf8 COLLATE utf8_general_ci;";

if ($conn->query($sql) === TRUE) {
    echo "<br>Table Business created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

$conn->close();
 ?>
