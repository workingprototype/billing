
<?php
include('include/config.php');
if(isset($_GET['del']))
		  {
		          mysqli_query($con,"delete from taxinfo where id = '".$_GET['id']."'");
                  $_SESSION['delmsg']="Tax deleted !!";
									header("Location: /billing/addtax");
									die();
		  }

?>
