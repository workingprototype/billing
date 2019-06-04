
<?php
session_start();
error_reporting(0);
include('include/config.php');
if(strlen($_SESSION['alogin'])==0)
	{
header('location:index.php');
}
else{
date_default_timezone_set('Asia/Kolkata');// change according timezone
$currentTime = date( 'd-m-Y h:i:s A', time () );


if(isset($_POST['submit']))
{
	$category=mysqli_real_escape_string($con,$_POST['category']);
	$subcat=mysqli_real_escape_string($con,$_POST['subcategory']);
	$id=intval($_GET['id']);
$sql=mysqli_query($con,"update subcategory set categoryid='$category',subcategory='$subcat',updationDate='$currentTime' where id='$id'");
$_SESSION['msg']="Sub-Category Updated !!";
echo "<meta http-equiv=\"refresh\" content=\"1;url=/billing/addsubcategory\"/>";

}

$content.='

	<div class="wrapper">
		<div class="container">
			<div class="row">
			<div class="span9">
					<div class="content">

						<div class="module">
							<div class="module-head">
							</div>
							<div class="module-body">';

if(isset($_POST['submit']))
{
												$content.='	<div class="alert alert-success">
												<button type="button" class="close" data-dismiss="alert">×</button>
												<strong>Well done!</strong>	'.htmlentities($_SESSION['msg']).''.htmlentities($_SESSION['msg']="").'
												</div>';
 }

$content.='
									<br />

			<form class="form-horizontal row-fluid" name="Category" method="post" >';

$id=intval($_GET['id']);
$query=mysqli_query($con,"select category.id,category.categoryName,subcategory.subcategory from subcategory join category on category.id=subcategory.categoryid where subcategory.id='$id'");
while($row=mysqli_fetch_array($query))
{
$content.='

<div class="control-group">
<label class="control-label" for="basicinput">Category</label>
<div class="controls">
<select name="category" style="width:500px;" class="form-control" required>
<option value="'.htmlentities($row['id']).'">'.htmlentities($catname=$row['categoryName']).'</option>';
$ret=mysqli_query($con,"select * from category");
while($result=mysqli_fetch_array($ret))
{
echo $cat=$result['categoryName'];
if($catname==$cat)
{
	continue;
}
else{
$content.='
<option value="'.$result['id'].'">'.$result['categoryName'].'</option>';
} }
$content.='
</select>
</div>
</div>




<div class="control-group">
<label class="control-label" for="basicinput">Sub Category Name</label>
<div class="controls">
<input type="text" placeholder="Enter category Name" style="width:1000px;" name="subcategory" value="'.htmlentities($row['subcategory']).'" class="form-control" required>
</div></br>
</div>';


			 }
$content.='
	<div class="control-group">
											<div class="controls"></br>
												<button type="submit" name="submit" class="btn">Update</button>
											</div>
										</div>
									</form>
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
		$page->var['title']="Edit Sub Category";
		$page->render();
		?>
