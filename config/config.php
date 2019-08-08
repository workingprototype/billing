<?php
define('DB_SERVER','localhost');
define('DB_USER','u306375126_john');
define('DB_PASS' ,'password');
define('DB_NAME', 'u306375126_bill');
$con = mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME);
// Check connection
if (mysqli_connect_errno())
{
 echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
?>
