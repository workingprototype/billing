
<?php
include('include/config.php');
if(isset($_GET['del']))
		  {
				mysqli_query($con,"delete from beat where id = '".$_GET['id']."'");
						$_SESSION['delmsg']="Beat deleted !!";
				echo "<meta http-equiv=\"refresh\" content=\"1;url=/billing/beat\"/>";
									die();
		  }

?>
