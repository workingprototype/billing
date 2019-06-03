<?php
define('APP_NAME', 'FMCG Application');  //Name of the Application
define('APP_TITLE', 'FMCG Demo'); // Name to show on the title bar of the browser
define('APP_ROOT', 'http://localhost/billing/');
define('DB_SERVER','localhost');
define('DB_USER','john_constantine');
define('DB_PASS' ,'imbatmanbitch');
define('DB_NAME', 'smcg_database');
$con = mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME);
// Check connection
if (mysqli_connect_errno())
{
 echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
?>
