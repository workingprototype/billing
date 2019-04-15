
<?php
include('include/config.php');
if(isset($_GET['del']))
		  {
				mysqli_query($con,"delete from category where id = '".$_GET['id']."'");
					$_SESSION['delmsg']="Category deleted !!";
				echo "<meta http-equiv=\"refresh\" content=\"1;url=/billing/addcategory\"/>";
									die();
		  }

?>
