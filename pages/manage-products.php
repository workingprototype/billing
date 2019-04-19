
<?php
// session_start();
include('config/config.php');
// if(strlen($_SESSION['alogin'])==0)
// 	{
// header('location:index.php');
// }
// else
{
date_default_timezone_set('Asia/Kolkata');
$currentTime = date( 'd-m-Y h:i:s A', time () );


$content='

	<div class="wrapper">
		<div class="container">
			<div class="row">
			<div class="span9">
					<div class="content">

	<div class="module">
							<div class="module-head">
								<h3>Manage Products</h3>
							</div>
							<div class="module-body table"> ';
if(isset($_GET['del']))
{
$content='
									<div class="alert alert-error">
										<button type="button" class="close" data-dismiss="alert">×</button>
									<strong>Oh snap!</strong>'.htmlentities($_SESSION['delmsg']).''.htmlentities($_SESSION['delmsg']="").'
									</div> ';
}
$content='
									<br />


								<table cellpadding="0" cellspacing="0" border="0" class="datatable-1 table table-bordered table-striped	 display" width="100%">
									<thead>
										<tr>
											<th>#</th>
											<th>Product Name</th>
											<th>Category </th>
											<th>Subcategory</th>
											<th>Company Name</th>
											<th>Product Creation Date</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>
';
$query=mysqli_query($con,"select products.*,category.categoryName,subcategory.subcategory from products join category on category.id=products.category join subcategory on subcategory.id=products.subCategory");
$cnt=1;
while($row=mysqli_fetch_array($query))
{
	$content.='
										<tr>
											<td>'.htmlentities($cnt).'</td>
											<td>'.htmlentities($row['productName']).'</td>
											<td>'.htmlentities($row['categoryName']).'</td>
											<td> '.htmlentities($row['subcategory']).'</td>
											<td>'.htmlentities($row['productCompany']).'</td>
											<td>'.htmlentities($row['postingDate']).'</td>
											<td>
											<a href="./shopping/admin/edit-managed-products-page.php?id='.$row['id'].'" ><i class="icon-edit"></i></a>
											<a href="./shopping/admin/delete-products.php?id='.$row['id'].'&del=delete" onClick="return confirm(\'Are you sure you want to delete?\')"><i class="icon-remove-sign"></i></a></td>
										</tr>';
										$cnt=$cnt+1; }
										$content.='

								</table>
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
					</script>';
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
					$page->var['title']="Manage Products";
					$page->render();
					?>
