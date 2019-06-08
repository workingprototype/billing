
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
	$account_name=mysqli_real_escape_string($con,$_POST['account_name']);
	$type=mysqli_real_escape_string($con,$_POST['type']);
	$address=mysqli_real_escape_string($con,$_POST['address']);
	$city=mysqli_real_escape_string($con,$_POST['city']);
	$state=mysqli_real_escape_string($con,$_POST['state']);
	$postal_code=mysqli_real_escape_string($con,$_POST['postal_code']);
	$state_code=mysqli_real_escape_string($con,$_POST['state_code']);
	$mobile=mysqli_real_escape_string($con,$_POST['mobile']);
	$email=mysqli_real_escape_string($con,$_POST['email']);
	$pan=mysqli_real_escape_string($con,$_POST['pan']);
	$gstin=mysqli_real_escape_string($con,$_POST['gstin']);
	$id=intval($_GET['id']);
$sql=mysqli_query($con,"update business set account_name='$account_name',type='$type',
address='$address',city='$city',state='$state',
postal_code='$postal_code',state_code='$state_code',mobile='$mobile',
email='$email',pan='$pan',gstin='$gstin' where id='$id'");
$_SESSION['msg']="Business Updated !!";
echo "<meta http-equiv=\"refresh\" content=\"1;url=/billing/managebreg\"/>";
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

			<form class="form-horizontal row-fluid" name="business" method="post" >';

$id=intval($_GET['id']);
$query=mysqli_query($con,"select * from business where id='$id'");
while($row=mysqli_fetch_array($query))
{
$content.='
<div class="control-group">
<label class="control-label" for="basicinput">Account Name *</label>
<div class="controls"></br>
<input type="text" placeholder="Enter Account Name" style="width:1000px;" name="account_name" value="'.htmlentities($row['account_name']).'" class="form-control" required>
</div>

<label class="control-label" for="basicinput">Group / Type</label>
<div class="controls"></br>
<input type="text" placeholder="Group" style="width:1000px;" name="type" value="'.htmlentities($row['type']).'" class="form-control" required>
</div>

<label class="control-label" for="basicinput">Address</label>
<div class="controls"></br>
<input type="text" placeholder="Address" style="width:1000px;" name="address" value="'.htmlentities($row['address']).'" class="form-control" required>
</div>

<label class="control-label" for="basicinput">City</label>
<div class="controls"></br>
<input type="text" placeholder="City" style="width:1000px;" name="city" value="'.htmlentities($row['city']).'" class="form-control" required>
</div>

<label class="control-label" for="basicinput">State</label>
<div class="controls"></br>
<input type="text" placeholder="State" style="width:1000px;" name="state" value="'.htmlentities($row['state']).'" class="form-control" required>
</div>

<label class="control-label" for="basicinput">Postal Code</label>
<div class="controls"></br>
<input type="text" placeholder="Postal Code" style="width:1000px;" name="postal_code" value="'.htmlentities($row['postal_code']).'" class="form-control" >
</div>

<label class="control-label" for="basicinput">State Code</label>
<div class="controls"></br>
<input type="text" placeholder="State Code" style="width:1000px;" name="state_code" value="'.htmlentities($row['state_code']).'" class="form-control">
</div>

<label class="control-label" for="basicinput">Mobile</label>
<div class="controls"></br>
<input type="text" placeholder="Mobile" style="width:1000px;" name="mobile" value="'.htmlentities($row['mobile']).'" class="form-control">
</div>

<label class="control-label" for="basicinput">Email</label>
<div class="controls"></br>
<input type="text" placeholder="Email" style="width:1000px;" name="email" value="'.htmlentities($row['email']).'" class="form-control">
</div>

<label class="control-label" for="basicinput">PAN Number</label>
<div class="controls"></br>
<input type="text" placeholder="PAN Number" style="width:1000px;" name="pan" value="'.htmlentities($row['pan']).'" class="form-control">
</div>

<label class="control-label" for="basicinput">GSTIN</label>
<div class="controls"></br>
<input type="text" placeholder="GSTN" style="width:1000px;" name="gstin" value="'.htmlentities($row['gstin']).'" class="form-control">
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
$page->var['title']="Edit Business";
$page->render();
?>
