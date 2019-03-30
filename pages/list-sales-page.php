
<?php
session_start();
include('config/config.php');
if(strlen($_SESSION['alogin'])==0)
	{
header('location:login');
}
else{  
if(isset($_GET['del']))
		  {
		          mysqli_query($con,"delete from sales where id = '".$_GET['id']."'");
                  $_SESSION['delmsg']="Sales deleted !!";
		  }

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Admin | View Sales</title>
	<link type="text/css" href="./shopping/admin/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link type="text/css" href="./shopping/admin/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
	<link type="text/css" href="./shopping/admin/css/theme.css" rel="stylesheet">
	<link type="text/css" href="./shopping/admin/images/icons/css/font-awesome.css" rel="stylesheet">
	<link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600' rel='stylesheet'>
</head>
<body>


	<div class="wrapper" style="width: 3200px;">
		<div class="container" style="width: 2900px;">
			<div class="row" style="width: 3000px; overflow-x:auto; overflow-y:hidden;" >
							<div class="module-head">
								<h3>Sales List</h3>
							</div>
							<div class="module-body table">
								<table cellpadding="0" cellspacing="0" border="0" class="datatable-1 table table-bordered table-striped	 display" width="100%">
									<thead>
										<tr>
											<th width="1%">#</th>
											<th width="1%">Business</th>
											<th width="1%">Customer</th>
											<th width="1%">Product</th>
											<th width="5%">HSN</th>
											<th width="5%">UTC</th>
											<th width="5%">Quantity</th>
											<th width="5%">MRP</th>
											<th width="5%">Base Rate</th>
											<th width="5%">Amount</th>
											<th width="5%">Discount</th>
											<th width="5%">GST %</th>
											<th width="5%">GST Amount</th>
											<th width="5%">Total</th>
											<th width="5%">Final Rate</th>
											<th width="5%">Invoice</th>
											<th width="5%">Batch</th>
											<th width="5%"> Action</th>
										</tr>
									</thead>
									<tbody>

	<?php $query=mysqli_query($con,"select business.account_name as businessname, users.name as customername,products.productName as pname,hsn,utc,qty,mrp,baserate,amount,dis,gst,gstamount,total,finalrate,invoice,batch from sales INNER JOIN business ON sales.business = business.id INNER JOIN users ON sales.customer = users.id INNER JOIN products ON sales.product = products.id ;");
$cnt=1;
while($row=mysqli_fetch_array($query))
{
?>
										<tr>
											<td><?php echo htmlentities($cnt);?></td>
											<td><?php echo htmlentities($row['businessname']);?></td>
											<td><?php echo htmlentities($row['customername']);?></td>
											<td><?php echo htmlentities($row['pname']);?></td>
											<td><?php echo htmlentities($row['hsn']);?></td>
											<td> <?php echo htmlentities($row['utc']);?></td>
											<td><?php echo htmlentities($row['qty']);?></td>
											<td> <?php echo htmlentities($row['mrp']);?></td>
											<td><?php echo htmlentities($row['baserate']);?></td>
											<td> <?php echo htmlentities($row['amount']);?></td>
											<td><?php echo htmlentities($row['dis']);?></td>
											<td><?php echo htmlentities($row['gst']);?></td>
											<td> <?php echo htmlentities($row['gstamount']);?></td>
											<td><?php echo htmlentities($row['total']);?></td>
											<td><?php echo htmlentities($row['finalrate']);?></td>
											<td> <?php echo htmlentities($row['invoice']);?></td>
											<td><?php echo htmlentities($row['batch']);?></td>
											<td>
											<!-- <a href="edit-sales.php?id=<?php echo $row['id']?>" ><i class="icon-edit"></i></a> -->
											<a href="sales?id=<?php echo $row['id']?>&del=delete" onClick="return confirm('Are you sure you want to delete?')">Delete<i class="icon-remove-sign"></i></a></td>
										</tr>
										<?php $cnt=$cnt+1; } ?>

								</table>
							</div>	<button onclick="location.href = './purchase';"> Return to Billing </button>
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
