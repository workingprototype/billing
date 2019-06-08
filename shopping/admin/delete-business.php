<script type="text/javascript">
alert("Business Deleted!");
</script>
<?php
include('include/config.php');
if(isset($_GET['del']))
		  {
				mysqli_query($con,"delete from business where id = '".$_GET['id']."'");
						$_SESSION['delmsg']="Business deleted !!";
				echo "<meta http-equiv=\"refresh\" content=\"1;url=/billing/managebreg\"/>";
									die();
		  }

?>
