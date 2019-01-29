//
* This file contains the integrity check of the application.
*/
<?php
$files = "./index.php"; // computes the index file
$a = md5_file($files); //  the MD5 hash of the index file computed & is stored in variable: a
if($a!="51a976402446047799b99613e5b43dc2"){ // The application won't run if the generated hash ID isn't the same as the predefined hashID.
  die;
}
 ?>
