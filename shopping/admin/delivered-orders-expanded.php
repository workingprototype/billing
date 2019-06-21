
<?php
session_start();
error_reporting(0);
include('include/config.php');
if(strlen($_SESSION['alogin'])==0)
	{
header('location:login');
}
else{
date_default_timezone_set('Asia/Kolkata');// change according timezone
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

	<div class="wrapper">
		<div class="container">
			<div class="row">
			<div class="span9">
					<div class="content">

	<div class="module">
							<div class="module-head">
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
											<th>View Details</th>


										</tr>
									</thead>

<tbody>';

$st='Delivered';
$query=mysqli_query($con,"select  products.id as proid, products.productImage1 as pimg1,orders.orderNumber as orderNumber,count(userid) as countid,users.name as username,users.email as useremail,users.contactno as usercontact,users.shippingAddress as shippingaddress,users.shippingCity as shippingcity,users.shippingState as shippingstate,users.shippingPincode as shippingpincode,products.productName as productname,products.shippingCharge as shippingcharge,orders.quantity as quantity,orders.orderDate as orderdate,products.productPrice as productprice,orders.id as id  from orders join users on  orders.userId=users.id join products on products.id=orders.productId where orders.orderStatus='$st' and orderNumber = '$orderNumber'");
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
											<td>    <button id="myBtn" >Update Order</button>
											</td>
											</tr>';

										$cnt=$cnt+1; } $content.='
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
			</script>
			<style>
			body {font-family: Arial, Helvetica, sans-serif;}

			/* The Modal (background) */
			.modal {
			  display: none; /* Hidden by default */
			  position: fixed; /* Stay in place */
			  z-index: 1; /* Sit on top */
			  padding-top: 100px; /* Location of the box */
			  width: 100%; /* Full width */
			  height: 100%; /* Full height */
			  overflow: auto; /* Enable scroll if needed */
			  background-color: rgb(0,0,0); /* Fallback color */
			  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
			}

			/* Modal Content */
			.modal-content {
			  background-color: #fefefe;
			  margin: auto;
			  padding: 20px;
			  border: 1px solid #888;
			  width: 80%;
			}

			/* The Close Button */
			.close {
			  color: #aaaaaa;
			  float: right;
			  font-size: 28px;
			  font-weight: bold;
			}

			.close:hover,
			.close:focus {
			  color: #000;
			  text-decoration: none;
			  cursor: pointer;
			}
			</style>



			<!-- The Modal -->
			<div id="myModal" class="modal">

			  <!-- Modal content -->
			  <div class="modal-content">
			    <span class="close">&times;</span>
					<div id="myModal" class="full reveal" data-reveal></div>
					<script>
					$("#myBtn").on("click",function(e) {
					  e.preventDefault();


					  $("#myModal")
					    .html(\'<object width="50%" height="50%" type="text/html" align-items="center" data="updateorder.php?oid='.htmlentities($row['id']).'" ></object>\')
					    .foundation("open");

					});
					</script>
			  </div>

			</div>

			<script>
			// Get the modal
			var modal = document.getElementById("myModal");

			// Get the button that opens the modal
			var btn = document.getElementById("myBtn");

			// Get the <span> element that closes the modal
			var span = document.getElementsByClassName("close")[0];

			// When the user clicks the button, open the modal
			btn.onclick = function() {
			  modal.style.display = "block";
			}

			// When the user clicks on <span> (x), close the modal
			span.onclick = function() {
			  modal.style.display = "none";
			}

			// When the user clicks anywhere outside of the modal, close it
			window.onclick = function(event) {
			  if (event.target == modal) {
			    modal.style.display = "none";
			  }
			}
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
