<?php
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
$page->var['title']="Create New Supplier Account";

session_start();
error_reporting(0);
include('./config/config.php');
// Code user Registration
if(isset($_POST['submit']))
{
$name=$_POST['fullname'];
$email=$_POST['emailid'];
$contactno=$_POST['contactno'];
$altcontactno=$_POST['altcontactno'];
$shippingAddress=$_POST['shippingAddress'];
$billingAddress=$_POST['billingAddress'];
$query=mysqli_query($con,"insert into supplier(name,email,contactno,altcontactno,shippingAddress,billingAddress) values('$name','$email','$contactno','$altcontactno','$shippingAddress','$billingAddress')");
if($query)
{
	echo "<script>alert('Supplier successfully registered');</script>";
}
else{
echo "<script>alert('Not registered. Something went wrong.');</script>";
}
}
$page->var['content']='

<script>
function userAvailability() {
$("#loaderIcon").show();
jQuery.ajax({
url: "./shopping/check_availability.php",
data:\'email=\'+$("#email").val(),
type: "POST",
success:function(data){
$("#user-availability-status1").html(data);
$("#loaderIcon").hide();
},
error:function (){}
});
}
</script>
<!-- create a new account -->
<div  class="col-md-6 col-sm-6">
	<form  class="register-form outer-top-xs" role="form" method="post" name="register" onSubmit="return valid();">
    <span style="color:red;" >'.htmlentities($_SESSION['errmsg']).htmlentities($_SESSION['errmsg']="").'
	  </span>
<div class="form-group">
	    	<label class="info-title" for="fullname">Full Name <span>*</span></label>
	    	<input type="text" class="form-control unicase-form-control text-input" id="fullname" name="fullname" required="required">
</div>


<div class="form-group">
	    	<label class="info-title" for="exampleInputEmail2">Email Address <span>*</span></label>
	    	<input type="email" class="form-control unicase-form-control text-input" id="email" onBlur="userAvailability()" name="emailid" required >
	    	       <span id="user-availability-status1" style="font-size:12px;"></span>
</div>

<div class="form-group">
	    	<label class="info-title" for="contactno">Contact No. <span>*</span></label>
	    	<input type="text" class="form-control unicase-form-control text-input" id="contactno" name="contactno" maxlength="10" required >
</div>
<div class="form-group">
      	    	<label class="info-title" for="altcontactno">Alternative Contact No. <span>*</span></label>
      	    	<input type="text" class="form-control unicase-form-control text-input" id="altcontactno" name="altcontactno" maxlength="10">
</div>

<div class="form-group">
				    	<label class="info-title" for="shippingAddress">Shipping Address <span>*</span></label>
				    	<textarea class="form-control unicase-form-control text-input" id="shippingAddress" name="shippingAddress" maxlength="300" required >
							</textarea>
</div>
<div class="form-group">
				    	<label class="info-title" for="billingAddress">Contact/Billing Address <span>*</span></label>
				    	<textarea class="form-control unicase-form-control text-input" id="billingAddress" name="billingAddress" maxlength="300" required >
							</textarea>
</div>

	<button type="submit" name="submit" class="btn-upper btn btn-primary checkout-page-button" id="submit">Register Supplier</button>
	</form>

</div>
';

$page->render();

?>
