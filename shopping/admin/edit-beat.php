
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
	$beat=mysqli_real_escape_string($con,$_POST['beat']);
	$id=intval($_GET['id']);
$sql=mysqli_query($con,"update beat set beat='$beat',updationDate='$currentTime' where id='$id'");
$_SESSION['msg']="Beat Updated !!";
echo "<meta http-equiv=\"refresh\" content=\"1;url=/billing/beat\"/>";
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
													$content.='	<div class="alert alert-success" style="width:1000px;">
													<button type="button" class="close" data-dismiss="alert">×</button>
													<strong>Well done! </strong>	'.htmlentities($_SESSION['msg']).''.htmlentities($_SESSION['msg']="").'
													</div>';
 }

$content.='
									<br />

			<form class="form-horizontal row-fluid" name="beat" method="post" >';

$id=intval($_GET['id']);
$query=mysqli_query($con,"select * from beat where id='$id'");
while($row=mysqli_fetch_array($query))
{
$content.='
<div class="control-group">
<label class="control-label" for="basicinput">Beat Name</label>
<div class="controls"></br>
<input type="text" placeholder="Enter Beat Name" style="width:1000px;" name="beat" value="'.htmlentities($row['beat']).'" class="form-control" required>
</div>
</div>';
								}
$content.='
	<div class="control-group">
											<div class="controls">
											<br>
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
$page->var['title']="Edit Beat";
$page->render();
?>
