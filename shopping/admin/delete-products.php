<script type="text/javascript">
alert("Product Deleted!");
</script>
<?php
include('include/config.php');
if(isset($_GET['del']))
		  {
		          mysqli_query($con,"delete from products where id = '".$_GET['id']."'");
              header("Location: /billing/manageproducts");
                  $_SESSION['delmsg']="Product deleted !!";
									die();
		  }

?>
