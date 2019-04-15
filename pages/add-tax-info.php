
<?php
session_start();
include('./config/config.php');
{
date_default_timezone_set('Asia/Kolkata');// change according timezone
$currentTime = date( 'd-m-Y h:i:s A', time () );


if(isset($_POST['submit']))
{
$taxname=mysqli_real_escape_string($con,$_POST['taxname']);
$cgst=mysqli_real_escape_string($con,$_POST['cgst']);
$sgst=mysqli_real_escape_string($con,$_POST['sgst']);
$totalgst=mysqli_real_escape_string($con,$_POST['totalgst']);
$sql=mysqli_query($con,"insert into taxinfo(taxname,cgst,sgst,totalgst) values('$taxname','$cgst','$sgst','$totalgst')");
$_SESSION['msg']="Tax Group Added!";

}

if(isset($_GET['del']))
		  {
		          mysqli_query($con,"delete from taxinfo where id = '".$_GET['id']."'");
                  $_SESSION['delmsg']="Tax deleted !!";
		  }

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Admin| Tax Group</title>
	<link type="text/css" href="./shopping/admin/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link type="text/css" href="./shopping/admin/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
	<link type="text/css" href="./shopping/admin/css/theme.css" rel="stylesheet">
	<link type="text/css" href="./shopping/admin/images/icons/css/font-awesome.css" rel="stylesheet">
	<link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600' rel='stylesheet'>
</head>
<body>


	<div class="wrapper">
		<div class="container">
			<div class="row">

			<div class="span9">
					<div class="content">

						<div class="module">
							<div class="module-head">
								<h3>Tax Group</h3>
							</div>
							<div class="module-body">

									<?php if(isset($_POST['submit']))
{?>
									<div class="alert alert-success">
										<button type="button" class="close" data-dismiss="alert">×</button>
									<strong>Well done!</strong>	<?php echo htmlentities($_SESSION['msg']);?><?php echo htmlentities($_SESSION['msg']="");?>
									</div>
<?php } ?>


									<?php if(isset($_GET['del']))
{?>
									<div class="alert alert-error">
										<button type="button" class="close" data-dismiss="alert">×</button>
									<strong>Oh snap!</strong> 	<?php echo htmlentities($_SESSION['delmsg']);?><?php echo htmlentities($_SESSION['delmsg']="");?>
									</div>
<?php } ?>

									<br />

			<form class="form-horizontal row-fluid" name="taxinfo" method="post" >

<div class="control-group">
<label class="control-label" for="basicinput">Add Tax Group</label>
<div class="controls">
<input type="text" placeholder=" e.g: 14 % Special Tax"  name="taxname" class="span8 tip" required><br><br>
<div id="the-parent" class="input-prepend input-append">

	<label for="basicinput">Total GST</label>	<input type="text" id="total" onblur="findTotal()" placeholder="Total GST"  name="totalgst" class="span8 tip" required value="0"> <span class="add-on">%</span>
</br></br>

<label for="basicinput">CGST</label><input type="text" placeholder="CGST" id="cgst"  name="cgst" class="span8 tip" value="0"  required readonly><span class="add-on">%</span><br><br>

<label for="basicinput">SGST</label><input type="text" placeholder="SGST" id="sgst" name="sgst" class="span8 tip"  value="0"  required readonly> <span class="add-on">%</span>	<br><br>
</div>
</div>
</div>
	<div class="control-group">
											<div class="controls">
												<button type="submit" name="submit" class="btn" style="border-radius: 3px;color: #fff;
    background-color: #5cb85c;
    border-color: #4cae4c;">Add</button>
												  <button onclick="location.href = './sales';"> Return to Billing </button>
											</div>
										</div>
									</form>
							</div>
						</div>

						<script type="text/javascript">
					window.findTotal = function() {
						num1 = document.getElementById("total").value;
						value = num1 / 2;{
						document.getElementById("cgst").value = value;
						document.getElementById("sgst").value = value;
					}
						}
						    </script>
 <div class="module">
							<div class="module-head">
								<h3>Manage Tax Groups</h3>
							</div>
							<div class="module-body table">
								<table cellpadding="0" cellspacing="0" border="0" class="datatable-1 table table-bordered table-striped	 display" width="100%">
									<thead>
										<tr>
											<th>#</th>
											<th>Tax Name</th>
											<th>CGST (%)</th>
											<th>SGST (%)</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>

<?php $query=mysqli_query($con,"select * from taxinfo");
$cnt=1;
while($row=mysqli_fetch_array($query))
{
?>
										<tr>
											<td><?php echo htmlentities($cnt);?></td>
											<td><?php echo htmlentities($row['taxname']);?></td>
											<td><?php echo htmlentities($row['cgst']);?></td>
											<td> <?php echo htmlentities($row['sgst']);?></td>
											<td>
											<a href="./shopping/admin/edit-tax-info.php?id=<?php echo $row['id']?>" ><i class="icon-edit"></i></a>
											<a href="./shopping/admin/delete-tax.php?id=<?php echo $row['id']?>&del=delete" onClick="return confirm('Are you sure you want to delete?')"><i class="icon-remove-sign"></i></a></td>
										</tr>
										<?php $cnt=$cnt+1; } ?>

								</table>
							</div>
						</div>



					</div><!--/.content-->
				</div><!--/.span9-->
			</div>
		</div><!--/.container-->
	</div><!--/.wrapper-->
	<script src="./shopping/admin/scripts/jquery-1.9.1.min.js" type="text/javascript"></script>
	<script src="./shopping/admin/scripts/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
	<script src="./shopping/admin/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="./shopping/admin/scripts/flot/jquery.flot.js" type="text/javascript"></script>
	<script src="./shopping/admin/scripts/datatables/jquery.dataTables.js"></script>
	<script>
		$(document).ready(function() {
			$('.datatable-1').dataTable();
			$('.dataTables_paginate').addClass("btn-group datatable-pagination");
			$('.dataTables_paginate > a').wrapInner('<span />');
			$('.dataTables_paginate > a:first-child').append('<i class="icon-chevron-left shaded"></i>');
			$('.dataTables_paginate > a:last-child').append('<i class="icon-chevron-right shaded"></i>');
		} );
	</script>
</body>
<?php } ?>
