
<?php
session_start();
include('config/config.php');
if(strlen($_SESSION['alogin'])==0)
	{
header('location:login');
}
else{

if(isset($_POST['submit']))
{
	$category=mysqli_real_escape_string($con,$_POST['category']);
	$subcat=mysqli_real_escape_string($con,$_POST['subcategory']);
$sql=mysqli_query($con,"insert into subcategory(categoryid,subcategory) values('$category','$subcat')");
$_SESSION['msg']="SubCategory Created !!";

}

$content ='	<div class="wrapper">
		<div class="container">
			<div class="row">

			<div class="span9">
					<div class="content">

						<div class="module">
							<div class="module-body">';
 if(isset($_POST['submit']))
{
$content.='									<div class="alert alert-success" style="width:1000px;">
										<button type="button" class="close" data-dismiss="alert">×</button>
									<strong>Well done! </strong>'.htmlentities($_SESSION['msg']).htmlentities($_SESSION['msg']="").'</div>';
}
if(isset($_GET['del']))
{
$content.='									<div class="alert alert-error" style="width:1000px;">
										<button type="button" class="close" data-dismiss="alert">×</button>
									<strong>Oh snap! </strong> '.htmlentities($_SESSION['delmsg']).htmlentities($_SESSION['delmsg']="").'</div>';
}
 $content.='<br />

			<form class="form-horizontal row-fluid" name="subcategory" method="post" >

<div class="control-group">
<label class="control-label" for="basicinput">Category</label>
<div class="controls"></br>
<select style="width:1000px;"  name="category" class="form-control" required>
<option value="">Select Category</option>';
$query=mysqli_query($con,"select * from category");
while($row=mysqli_fetch_array($query))
{

$content.='<option value="'.$row['id'].'">'.$row['categoryName'].'</option>';
}
$content.='</select>
</div>
</div>


<div class="control-group">
<label class="control-label" for="basicinput">Sub Category Name</label>
<div class="controls"></br>
<input type="text" style="width:1000px;"  placeholder="Enter Sub Category Name"  name="subcategory" class="form-control" required>
</div>
</div>



	<div class="control-group">
											<div class="controls"><br>
												<button type="submit" name="submit" class="btn"style="border-radius: 3px;color: #fff;
		background-color: #5cb85c;
		border-color: #4cae4c;">Create</button>
																								</div>
										</div>
									</form>
							</div>
						</div>


 <div class="module">
							<div class="module-head">
									<h3>Manage Sub Category</h3>
							</div>
							<div class="module-body table">
								<table cellpadding="0" cellspacing="0" border="0" class="datatable-1 table table-bordered table-striped	 display" width="100%">
									<thead>
										<tr>
											<th>#</th>
											<th>Category</th>
											<th>Description</th>
											<th>Creation date</th>
											<th>Last Updated</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>';
$query=mysqli_query($con,"select subcategory.id,category.categoryName,subcategory.subcategory,subcategory.creationDate,subcategory.updationDate from subcategory join category on category.id=subcategory.categoryid");
$cnt=1;
while($row=mysqli_fetch_array($query))
{
	$content.='
										<tr>
											<td>'.htmlentities($cnt).'</td>
											<td>'.htmlentities($row['categoryName']).'</td>
											<td>'.htmlentities($row['subcategory']).'</td>
											<td>'.htmlentities($row['creationDate']).'</td>
											<td>'.htmlentities($row['updationDate']).'</td>
											<td>
											<a href="./shopping/admin/edit-subcategory.php?id='.$row['id'].'" ><i class="icon-edit"></i></a>
											<a href="./shopping/admin/delete-subcategory.php?id='.$row['id'].'&del=delete" onClick="return confirm(\'Are you sure you want to delete?\')"><i class="icon-remove-sign"></i></a></td>
										</tr>';
										$cnt=$cnt+1;
									}
$content.='
								</table>
							</div>
						</div>



					</div><!--/.content-->
				</div><!--/.span9-->
			</div>
		</div><!--/.container-->
	</div>
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
$page->var['title']="Add Sub Category";
$page->render();
?>
