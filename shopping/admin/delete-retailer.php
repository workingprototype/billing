<script type="text/javascript">
alert("Retailer Deleted!");
</script>
<?php
include('include/config.php');
if(isset($_GET['del']))
		  {
				mysqli_query($con,"delete from users where id = '".$_GET['id']."'");
						$_SESSION['delmsg']="Retailer deleted !!";
				echo "<meta http-equiv=\"refresh\" content=\"1;url=/billing/manageretailerreg\"/>";
									die();
		  }

?>
