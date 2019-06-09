
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
	$shippingAddress=mysqli_real_escape_string($con,$_POST['shippingAddress']);
	$billingAddress=mysqli_real_escape_string($con,$_POST['billingAddress']);
	$district=mysqli_real_escape_string($con,$_POST['district']);
	$billingState=mysqli_real_escape_string($con,$_POST['billingState']);
	$gstin=mysqli_real_escape_string($con,$_POST['gstin']);
	$fssai=mysqli_real_escape_string($con,$_POST['fssai']);
	$pan=mysqli_real_escape_string($con,$_POST['pan']);
	$aadharno=mysqli_real_escape_string($con,$_POST['aadharno']);
	$birthdate=mysqli_real_escape_string($con,$_POST['birthdate']);
	$email=mysqli_real_escape_string($con,$_POST['email']);
	$id=intval($_GET['id']);
$sql=mysqli_query($con,"update users set name='$name',contactno='$contactno',altcontactno='$altcontactno',shippingAddress='$shippingAddress',billingAddress='$billingAddress',
district='$district',billingState='$billingState',gstin='$gstin',fssai='$fssai',
pan='$pan',aadharno='$aadharno',birthdate='$birthdate',email='$email',updationDate='$currentTime' where id='$id'");
$_SESSION['msg']="Retailer Updated !!";
echo "<meta http-equiv=\"refresh\" content=\"1;url=/billing/manageretailerreg\"/>";
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
$query=mysqli_query($con,"select * from users where id='$id'");
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

<label class="control-label" for="basicinput">Shipping Address</label>
<div class="controls"></br>
<input type="text" style="width:1000px;" name="shippingAddress" value="'.htmlentities($row['shippingAddress']).'" class="form-control" required>
</div>

<label class="control-label" for="basicinput">Billing Address</label>
<div class="controls"></br>
<input type="text" style="width:1000px;" name="billingAddress" value="'.htmlentities($row['billingAddress']).'" class="form-control" required>
</div>

<label class="control-label" for="basicinput">District</label>
<div class="controls"></br>
<input type="text" style="width:1000px;" name="district" value="'.htmlentities($row['district']).'" class="form-control" required>
</div>

<label class="control-label" for="basicinput">State</label>
<div class="controls"></br>
<input type="text"style="width:1000px;" name="billingState" value="'.htmlentities($row['billingState']).'" class="form-control" required>
</div>

<label class="control-label" for="basicinput">GSTIN</label>
<div class="controls"></br>
<input type="text" style="width:1000px;" name="gstin" value="'.htmlentities($row['gstin']).'" class="form-control">
</div>

<label class="control-label" for="basicinput">FSSAI</label>
<div class="controls"></br>
<input type="text" style="width:1000px;" name="fssai" value="'.htmlentities($row['fssai']).'" class="form-control">
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


<label class="control-label" for="basicinput">Email for E-Commerce Login</label>
<div class="controls"></br>
<input type="email" style="width:1000px;" name="email" value="'.htmlentities($row['email']).'" class="form-control">
</div>


<label class="control-label" for="basicinput">Beat</label>
<div class="controls"></br>
<select name="beat"  style="width:1000px;" class="form-control" required>
<option value="">Select Beat</option>
'; $query=mysqli_query($con,"select * from beat");
while($row=mysqli_fetch_array($query))
{

$content.='

<option value="'.$row['id'].'">'.$row['beat'].'</option> ';
 }
 	$content.=' }
 </select>
</div>

</br>
<div class="alert alert-warning" role="alert" style="width:50%;">
  Note: E-commerce Login Password can only be changed through the shopping portal.
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
