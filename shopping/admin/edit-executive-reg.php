
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
	$name=mysqli_real_escape_string($con,$_POST['name']);
	$contactno=mysqli_real_escape_string($con,$_POST['contactno']);
	$altcontactno=mysqli_real_escape_string($con,$_POST['altcontactno']);
	$Address=mysqli_real_escape_string($con,$_POST['Address']);
	$district=mysqli_real_escape_string($con,$_POST['district']);
	$billingState=mysqli_real_escape_string($con,$_POST['billingState']);
	$pan=mysqli_real_escape_string($con,$_POST['pan']);
	$aadharno=mysqli_real_escape_string($con,$_POST['aadharno']);
	$birthdate=mysqli_real_escape_string($con,$_POST['birthdate']);
	$email=mysqli_real_escape_string($con,$_POST['email']);
	$id=intval($_GET['id']);
$sql=mysqli_query($con,"update executive set name='$name',contactno='$contactno',altcontactno='$altcontactno',Address='$Address',
district='$district',billingState='$billingState',pan='$pan',aadharno='$aadharno',birthdate='$birthdate',email='$email',updationDate='$currentTime' where id='$id'");
$_SESSION['msg']="Executive Info Updated !!";
echo "<meta http-equiv=\"refresh\" content=\"1;url=/billing/manageexecutivereg\"/>";
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

			<form class="form-horizontal row-fluid" name="supplier" method="post" >';

$id=intval($_GET['id']);
$query=mysqli_query($con,"select * from executive where id='$id'");
while($row=mysqli_fetch_array($query))
{
$content.='
<div class="control-group">

<label class="control-label" for="basicinput">Name</label>
<div class="controls"></br>
<input type="text" style="width:1000px;" name="name" value="'.htmlentities($row['name']).'" class="form-control" required>
</div>

<label class="control-label" for="basicinput">Contact no</label>
<div class="controls"></br>
<input type="text" style="width:1000px;" name="contactno" value="'.htmlentities($row['contactno']).'" class="form-control" required>
</div>

<label class="control-label" for="basicinput">Alt Contact no</label>
<div class="controls"></br>
<input type="text" style="width:1000px;" name="altcontactno" value="'.htmlentities($row['altcontactno']).'" class="form-control" required>
</div>

<label class="control-label" for="basicinput">Address</label>
<div class="controls"></br>
<input type="text" style="width:1000px;" name="Address" value="'.htmlentities($row['Address']).'" class="form-control" required>
</div>

<label class="control-label" for="basicinput">District</label>
<div class="controls"></br>
<input type="text" style="width:1000px;" name="district" value="'.htmlentities($row['district']).'" class="form-control" required>
</div>

<label class="control-label" for="basicinput">State</label>
<div class="controls"></br>
<input type="text"style="width:1000px;" name="billingState" value="'.htmlentities($row['billingState']).'" class="form-control" required>
</div>

<label class="control-label" for="basicinput">PAN Number</label>
<div class="controls"></br>
<input type="text" style="width:1000px;" name="pan" value="'.htmlentities($row['pan']).'" class="form-control">
</div>

<label class="control-label" for="basicinput">Aadhar Number</label>
<div class="controls"></br>
<input type="text" style="width:1000px;" name="aadharno" value="'.htmlentities($row['aadharno']).'" class="form-control">
</div>


<label class="control-label" for="basicinput">Birthdate</label>
<div class="controls"></br>
<input type="date" style="width:1000px;" name="birthdate" value="'.htmlentities($row['birthdate']).'" class="form-control">
</div>


<label class="control-label" for="basicinput">Email for App Login</label>
<div class="controls"></br>
<input type="email" style="width:1000px;" name="email" value="'.htmlentities($row['email']).'" class="form-control">
</div>

</br>
<div class="alert alert-warning" role="alert" style="width:50%;">
  Note: App Login Password can only be changed through the App.
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
$page->var['title']="Edit Executive Info";
$page->render();
?>