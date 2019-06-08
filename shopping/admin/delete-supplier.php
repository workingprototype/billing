<script type="text/javascript">
alert("Supplier Deleted!");
</script>
<?php
include('include/config.php');
if(isset($_GET['del']))
		  {
				mysqli_query($con,"delete from supplier where id = '".$_GET['id']."'");
						$_SESSION['delmsg']="Supplier deleted !!";
				echo "<meta http-equiv=\"refresh\" content=\"1;url=/billing/managesupplierreg\"/>";
									die();
		  }

?>
