<script type="text/javascript">
alert("Executive Info Deleted!");
</script>
<?php
include('include/config.php');
if(isset($_GET['del']))
		  {
				mysqli_query($con,"delete from executive where id = '".$_GET['id']."'");
						$_SESSION['delmsg']="Executive Info deleted !!";
				echo "<meta http-equiv=\"refresh\" content=\"1;url=/billing/manageexecutivereg\"/>";
									die();
		  }

?>
