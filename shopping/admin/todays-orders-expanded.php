
<?php
session_start();
error_reporting(0);
include('include/config.php');
if(strlen($_SESSION['alogin'])==0)
	{
header('location:login');
}
else{
date_default_timezone_set('Asia/Kolkata');
$currentTime = date( 'd-m-Y h:i:s A', time () );

$orderNumber=$_GET['orderNumber'];
$content.='
	<script language="javascript" type="text/javascript">
var popUpWin=0;
function popUpWindow(URLStr, left, top, width, height)
{
 if(popUpWin)
{
if(!popUpWin.closed) popUpWin.close();
}
popUpWin = open(URLStr,\'popUpWin\', \'toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=yes,resizable=no,copyhistory=yes,width=\'+600+\',height=\'+600+\',left=\'+left+\', top=\'+top+\',screenX=\'+left+\',screenY=\'+top+\'\');
}

</script>
</head>
<body>


	<div class="wrapper">
		<div class="container">
			<div class="row">

			<div class="span9">
					<div class="content">

	<div class="module">
							<div class="module-head" width="160px;">
							</div>
							<div class="module-body table">';
	if(isset($_GET['del']))
{
								$content.='	<div class="alert alert-error">
										<button type="button" class="close" data-dismiss="alert">×</button>
									<strong>Oh snap!</strong> 	'. htmlentities($_SESSION['delmsg']).''.htmlentities($_SESSION['delmsg']="").'
									</div>';
 }

					$content.='				<br />


								<table cellpadding="0" cellspacing="0" border="0" class="datatable-1 table table-bordered table-striped	 display" >
									<thead>
										<tr>
											<th>#</th>
											<th>Unique Order Number</th>
											<th>Name</th>
											<th>Product Name</th>
										<th class="cart-description item">Image</th>
											<th width="50">Email /Contact no</th>
											<th>Shipping Address</th>
											<th>Qty </th>
											<th>Amount </th>
											<th>Order Date</th>
											<th>Action</th>


										</tr>
									</thead>

<tbody>';

 $f1="00:00:00";
$from=date('Y-m-d')." ".$f1;
$t1="23:59:59";
$to=date('Y-m-d')." ".$t1;
$query=mysqli_query($con,"select products.id as proid, products.productImage1 as pimg1,orders.orderNumber as orderNumber, users.name as username,users.email as useremail,users.contactno as usercontact,users.shippingAddress as shippingaddress,users.shippingCity as shippingcity,users.shippingState as shippingstate,users.shippingPincode as shippingpincode,products.productName as productname,products.shippingCharge as shippingcharge,orders.quantity as quantity,orders.orderDate as orderdate,products.productPrice as productprice,orders.id as id  from orders join users on  orders.userId=users.id join products on products.id=orders.productId where orders.orderDate Between '$from' and '$to' and orderNumber = '$orderNumber'");
$cnt=1;
while($row=mysqli_fetch_array($query))
{
$content.='
										<tr>
											<td>'.htmlentities($cnt).'</td>
											<td>'.htmlentities($row['orderNumber']).'</td>
											<td>'.htmlentities($row['username']).'</td>
											<td>'.htmlentities($row['productname']).'</td>
											<td class="cart-image">
												<a class="entry-thumbnail">
												    <img src="productimages/'.$row['proid'].'/'.$row['pimg1'].'" alt="" width="70" height="70">
												</a>
											</td>
											<td>'.htmlentities($row['useremail']).'/'.htmlentities($row['usercontact']).'</td>
											<td>'.htmlentities($row['shippingaddress'].",".$row['shippingcity'].",".$row['shippingstate']."-".$row['shippingpincode']).'</td>
											<td>'.htmlentities($row['quantity']).'</td>
											<td>₹'.htmlentities($row['quantity']*$row['productprice']+$row['shippingcharge']).'</td>
											<td>'.htmlentities($row['orderdate']).'</td>
											<td>    <a href="updateorder.php?oid='.htmlentities($row['id']).'" title="Update order" target="_blank"><i class="icon-external-link"></i></a>
											</td>
											</tr>';
$cnt=$cnt+1; }
$content.='
										</tbody>
								</table>
							</div>
						</div>

						</div><!--/.content-->
					</div><!--/.span9-->
				</div>
			</div><!--/.container-->
			</div>


			<link type="text/css" href="images/icons/css/font-awesome.css" rel="stylesheet">
			<script src="scripts/jquery-1.9.1.min.js" type="text/javascript"></script>
			<script src="scripts/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
			<script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
			<script src="scripts/flot/jquery.flot.js" type="text/javascript"></script>
			<script src="scripts/datatables/jquery.dataTables.js"></script>
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
			require_once "../../classes/page-class.php";
			require_once "../../classes/sidebar-class.php";
			require_once "../../classes/top-navigation-class.php";
			require_once "../../classes/footer-class.php";
			$page = new Page;
			$sidebar = new Sidebar;
			$footer = new Footer;
			$navbar = new TopNav;
			$page->var['navbar']=$navbar->echo();
			$page->var['sidebar']=$sidebar->echo();
			$page->var['footer']=$footer->echo();
			$page->var['content']=$content;
			$page->var['title']=("Order Number: " . $orderNumber);
			$page->render();
			?>
