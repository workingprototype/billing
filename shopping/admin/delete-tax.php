<script type="text/javascript">
alert("Tax Deleted!");
</script>
<?php
include('include/config.php');
if(isset($_GET['del']))
		  {
		          mysqli_query($con,"delete from taxinfo where id = '".$_GET['id']."'");
                  $_SESSION['delmsg']="Tax deleted !!";
									echo "<meta http-equiv=\"refresh\" content=\"1;url=/billing/addtax\"/>";
									die();
		  }

?>
