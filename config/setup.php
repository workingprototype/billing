<?php
$sql = file_get_contents('./config/db.sql');
 
$mysqli = new mysqli("localhost", "u306375126_john", "password", "u306375126_bill");
if (mysqli_connect_errno()) { /* check connection */
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}
// dude first this will drop your existing tables.
if ($result = $mysqli->query("SHOW TABLES"))
{
    while($row = $result->fetch_array(MYSQLI_NUM))
    {
        $mysqli->query('DROP TABLE IF EXISTS '.$row[0]);
    }
}

$mysqli->query('SET foreign_key_checks = 1');

//imports the sql file
if ($mysqli->multi_query($sql)) {
    echo "success! Imported the .sql file successfully!";
} else {
   echo "error";
}
$mysqli->close();
?>
