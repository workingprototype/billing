<script type="text/javascript">
alert("Subcategory Deleted!");
</script>
<?php
include('include/config.php');
if(isset($_GET['del']))
		  {
				mysqli_query($con,"delete from subcategory where id = '".$_GET['id']."'");
					$_SESSION['delmsg']="Subcategory deleted !!";
				echo "<meta http-equiv=\"refresh\" content=\"1;url=/billing/addsubcategory\"/>";
									die();
		  }

?>
