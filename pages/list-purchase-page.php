
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


	<div class="wrapper" style="width: 3200px;">
		<div class="container" style="width: 2900px;">
			<div class="row" style="width: 3000px; overflow-x:auto; overflow-y:hidden;" >


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
											<th width="5%">Vehicle number</th>
											<th width="5%">Delivery Contact</th>
											<th width="5%">Transport</th>
											<th width="5%">Received date</th>
											<th width="5%">Batch</th>
											<th width="5%">Product</th>
											<th width="5%">MRP</th>
											<th width="5%">Qty Case</th>
											<th width="5%">Qty UOM</th>
											<th width="5%">Base Rate Case</th>
											<th width="5%">Base Rate UOM</th>
											<th width="5%">Discount %</th>
											<th width="5%">Discount Amount</th>
											<th width="5%">Net Amount</th>
											<th width="5%">CGST %</th>
											<th width="5%">SGST %</th>
											<th width="5%">CGST Amount</th>
											<th width="5%">SGST Amount</th>
											<th width="5%">Cess</th>
											<th width="5%">Total Amount</th>
											<th width="5%">Margin</th>
											<th width="5%">UOM Selling Price</th>
											<th width="5%">Display Price</th>
											<th width="5%">Display Discount</th>
											<th width="5%">Final Amount</th>
											<th width="5%">Credit Note</th>
											<th width="5%">Logistics</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>

<?php $query=mysqli_query($con,"select business,supplier,invoicedate,invoicenumber,
vehiclenumber,deliveredcontact,
transport,receiveddate,batch,product,mrp,qtycase,qtyuom,baseratecase,
baserateuom,disc,disca,neta,cgst,sgst,cgsta,sgsta,cess,totalamount,margin,
uomsp,dispp,dispd,totalwhole,creditnote,logistic from purchase;");
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
											<td><?php echo htmlentities($row['vehiclenumber']);?></td>
											<td> <?php echo htmlentities($row['deliveredcontact']);?></td>
											<td><?php echo htmlentities($row['transport']);?></td>
											<td> <?php echo htmlentities($row['receiveddate']);?></td>
											<td><?php echo htmlentities($row['batch']);?></td>
											<td> <?php echo htmlentities($row['product']);?></td>
											<td><?php echo htmlentities($row['mrp']);?></td>
											<td><?php echo htmlentities($row['qtycase']);?></td>
											<td><?php echo htmlentities($row['qtyuom']);?></td>
											<td><?php echo htmlentities($row['baseratecase']);?></td>
											<td><?php echo htmlentities($row['baserateuom']);?></td>
											<td><?php echo htmlentities($row['disc']);?></td>
											<td><?php echo htmlentities($row['disca']);?></td>
											<td><?php echo htmlentities($row['neta']);?></td>
											<td><?php echo htmlentities($row['cgst']);?></td>
											<td><?php echo htmlentities($row['sgst']);?></td>
											<td><?php echo htmlentities($row['cgsta']);?></td>
											<td><?php echo htmlentities($row['sgsta']);?></td>
											<td><?php echo htmlentities($row['cess']);?></td>
											<td><?php echo htmlentities($row['totalamount']);?></td>
											<td><?php echo htmlentities($row['margin']);?></td>
											<td><?php echo htmlentities($row['uomsp']);?></td>
											<td><?php echo htmlentities($row['dispp']);?></td>
											<td><?php echo htmlentities($row['dispd']);?></td>
											<td><?php echo htmlentities($row['totalwhole']);?></td>
											<td><?php echo htmlentities($row['creditnote']);?></td>
											<td><?php echo htmlentities($row['logistic']);?></td>
											<td>
											<!-- <a href="edit-purchase.php?id=<?php echo $row['id']?>" ><i class="icon-edit"></i></a> -->
											<a href="purchase?id=<?php echo $row['id']?>&del=delete" onClick="return confirm('Are you sure you want to delete?')">Delete<i class="icon-remove-sign"></i></a></td>
										</tr>
										<?php $cnt=$cnt+1; } ?>

								</table>	<button onclick="location.href = './purchase';"> Return to Billing </button>
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
