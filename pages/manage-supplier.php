
<?php
session_start();
include('config/config.php');
if(strlen($_SESSION['alogin'])==0)
	{
header('location:login');
}
else{
date_default_timezone_set('Asia/Kolkata');// change according timezone
$currentTime = date( 'd-m-Y h:i:s A', time () );



if(isset($_GET['del']))
		  {
		          mysqli_query($con,"delete from supplier where id = '".$_GET['id']."'");
                  $_SESSION['delmsg']="Supplier deleted !!";
									logify("Supplier Deleted");
		  }


$content='	<div class="wrapper">
		<div class="container">
			<div class="row">

			<div class="span9">
					<div class="content">

						<div class="module">

							<div class="module-body">';
if(isset($_POST['submit']))
{
	$content.='
									<div class="alert alert-success" style="width:1000px;">
										<button type="button" class="close" data-dismiss="alert">×</button>
									<strong>Well done!</strong>	'.htmlentities($_SESSION['msg']).''.htmlentities($_SESSION['msg']="").'
									</div>';
}
if(isset($_GET['del']))
{
	$content.='
									<div class="alert alert-error" style="width:1000px;">
										<button type="button" class="close" data-dismiss="alert">×</button>
									<strong>Oh snap!</strong> 	'.htmlentities($_SESSION['delmsg']).''.htmlentities($_SESSION['delmsg']="").'
									</div>';
									}
									$content.='
									<br />


							</div>
						</div>


 <div class="module" style="overflow:auto;">
							<div class="module-head">

							</div>
							<div class="module-body table">
								<table cellpadding="0" cellspacing="0" border="0" class="datatable-1 table table-bordered table-striped	 display" width="100%">
									<thead>
										<tr>
											<th>#</th>
											<th>Product Company</th>
											<th>Firm Name</th>
											<th>Email Address</th>
											<th>Contact Name [Full Name]</th>
											<th>Contact No.</th>
											<th>Alternative Contact No.</th>
											<th>Contact / Billing Address</th>
											<th>District</th>
											<th>State</th>
											<th>Pincode</th>
											<th>GSTIN</th>
											<th>FSSAI</th>
											<th>PAN</th>
											<th>Aadhar No</th>
											<th>Executive Name: </th>
											<th>Executive Mobile:</th>
											<th>Bank Name:</th>
											<th>Bank City:</th>
											<th>Account Name:</th>
											<th>Account Number:</th>
											<th>IFSC Code:</th>
											<th>Registration date</th>
											<th>Last Updated</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>
';
$query=mysqli_query($con,"select * from supplier");
$cnt=1;
while($row=mysqli_fetch_array($query))
{
	$content.='
										<tr>
											<td>'.htmlentities($cnt).'</td>
											<td>'.htmlentities($row['productcompany']).'</td>
											<td>'.htmlentities($row['firmname']).'</td>
											<td>'.htmlentities($row['email']).'</td>
											<td>'.htmlentities($row['name']).'</td>
											<td>'.htmlentities($row['contactno']).'</td>
											<td>'.htmlentities($row['altcontactno']).'</td>
											<td>'.htmlentities($row['billingAddress']).'</td>
											<td>'.htmlentities($row['district']).'</td>
											<td>'.htmlentities($row['billingState']).'</td>
											<td>'.htmlentities($row['billingPincode']).'</td>
											<td>'.htmlentities($row['gstin']).'</td>
											<td>'.htmlentities($row['fssai']).'</td>
											<td>'.htmlentities($row['pan']).'</td>
											<td>'.htmlentities($row['aadharno']).'</td>
											<td>'.htmlentities($row['execname']).'</td>
											<td>'.htmlentities($row['execmobile']).'</td>
											<td>'.htmlentities($row['bankname']).'</td>
											<td>'.htmlentities($row['bankcity']).'</td>
											<td>'.htmlentities($row['accountname']).'</td>
											<td>'.htmlentities($row['accountnumber']).'</td>
											<td>'.htmlentities($row['ifsccode']).'</td>
											<td>'.htmlentities($row['regDate']).'</td>
											<td> '.htmlentities($row['updationDate']).'</td>
											<td>
											<a href="./shopping/admin/edit-supplier.php?id='.$row['id'].'" ><i class="icon-edit"></i></a>
											<a href="./shopping/admin/delete-supplier.php?id='.$row['id'].'&del=delete" onClick="return confirm(\'Are you sure you want to delete?\')"><i class="icon-remove-sign"></i></a></td>
										</tr>';
										$cnt=$cnt+1; }

								$content.='</table>
							</div>
						</div>



					</div><!--/.content-->
				</div><!--/.span9-->
			</div>
		</div><!--/.container-->
	</div><!--/.wrapper-->
	<link type="text/css" href="./shopping/admin/images/icons/css/font-awesome.css" rel="stylesheet">
	<script src="./shopping/admin/scripts/jquery-1.9.1.min.js" type="text/javascript"></script>
	<script src="./shopping/admin/scripts/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
	<script src="./shopping/admin/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="./shopping/admin/scripts/flot/jquery.flot.js" type="text/javascript"></script>
	<script src="./shopping/admin/scripts/datatables/jquery.dataTables.js"></script>
	<script>
		$(document).ready(function() {
			$(\'.datatable-1\').dataTable();
			$(\'.dataTables_paginate\').addClass("btn-group datatable-pagination");
			$(\'.dataTables_paginate > a\').wrapInner(\'<span />\');
			$(\'.dataTables_paginate > a:first-child\').append(\'<i class="icon-chevron-left shaded"></i>\');
			$(\'.dataTables_paginate > a:last-child\').append(\'<i class="icon-chevron-right shaded"></i>\');
		} );
	</script>
	';
}
require_once "./classes/page-class.php";
require_once "./classes/sidebar-class.php";
require_once "./classes/top-navigation-class.php";
require_once "./classes/footer-class.php";
$page = new Page;
$sidebar = new Sidebar;
$footer = new Footer;
$navbar = new TopNav;
$page->var['navbar']=$navbar->echo();
$page->var['sidebar']=$sidebar->echo();
$page->var['footer']=$footer->echo();
$page->var['content']=$content;
$page->var['title']="Manage Supplier Info";
$page->render();
?>
