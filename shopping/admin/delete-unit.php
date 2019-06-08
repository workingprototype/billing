<script type="text/javascript">
alert("Unit of Measurement deleted !!");
</script>
<?php
include('include/config.php');
if(isset($_GET['del']))
		  {
				mysqli_query($con,"delete from uom where id = '".$_GET['id']."'");
						$_SESSION['delmsg']="Unit of Measurement deleted !!";
				echo "<meta http-equiv=\"refresh\" content=\"1;url=/billing/adduom\"/>";
									die();
		  }

?>
