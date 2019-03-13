
<?php
session_start();
include('./config/config.php');
{
if(isset($_GET['del']))
		  {
		          mysqli_query($con,"delete from purchase where id = '".$_GET['id']."'");
                  $_SESSION['delmsg']="Purchase deleted !!";
		  }

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Admin | View Purchases</title>
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


							<div class="module-head">
								<h3>Purchase List</h3>
							</div>
							<div class="module-body table">
								<table cellpadding="0" cellspacing="0" border="0" class="datatable-1 table table-bordered table-striped	 display" width="100%">
									<thead>
										<tr>
											<th>#</th>
											<th width="1%">Business</th>
											<th width="5%">Supplier</th>
											<th width="10%">Invoice date</th>
											<th width="5%">Invoice number</th>
											<th width="5%">Delivery Contact</th>
											<th width="5%">Transport</th>
											<th width="5%">Received date</th>
											<th width="5%">Batch</th>
											<th width="5%">Product</th>
											<th width="5%">MRP</th>
											<th width="5%">Total Amount</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>

<?php $query=mysqli_query($con,"select business,supplier,invoicedate,invoicenumber,deliveredcontact,transport,receiveddate,batch,product,mrp,totalamount from purchase;");
$cnt=1;
while($row=mysqli_fetch_array($query))
{
?>
										<tr>
											<td><?php echo htmlentities($cnt);?></td>
											<td><?php echo htmlentities($row['business']);?></td>
											<td><?php echo htmlentities($row['supplier']);?></td>
											<td> <?php echo htmlentities($row['invoicedate']);?></td>
											<td><?php echo htmlentities($row['invoicenumber']);?></td>
											<td> <?php echo htmlentities($row['deliveredcontact']);?></td>
											<td><?php echo htmlentities($row['transport']);?></td>
											<td> <?php echo htmlentities($row['receiveddate']);?></td>
											<td><?php echo htmlentities($row['batch']);?></td>
											<td> <?php echo htmlentities($row['product']);?></td>
											<td><?php echo htmlentities($row['mrp']);?></td>
											<td> <?php echo htmlentities($row['totalamount']);?></td>
											<td>
											<!-- <a href="edit-purchase.php?id=<?php echo $row['id']?>" ><i class="icon-edit"></i></a> -->
											<a href="purchase?id=<?php echo $row['id']?>&del=delete" onClick="return confirm('Are you sure you want to delete?')">Delete<i class="icon-remove-sign"></i></a></td>
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
